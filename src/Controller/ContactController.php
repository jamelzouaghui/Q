<?php

namespace App\Controller;

use App\Entity\PanelEntity;
use App\Form\PanelEntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController {

    /**
     * @Route("/contacts" , name="contacts")
     * 
     */
    public function index(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $panelEntity = $em->getRepository('App\Entity\PanelEntity')->findAll();

        return $this->render('panelEntity/index.html.twig', [
                    'panelEntity' => $panelEntity
                        ]
        );
    }

    /**
     * @Route("/addContact" , name="add-contact")
     * 
     */
    public function addContact(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $contact = new PanelEntity();
        $form = $this->createForm(PanelEntityType::class, $contact);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $emailContact = $em->getRepository('App\Entity\PanelEntity')->findByEmail($email);
            if (!empty($emailContact)) {
                $form->get('email')->addError(new FormError("Cette adresse email est déjà associée à un compte "));
                return $this->render('panelEntity/addContact.html.twig', [
                            'form' => $form->createView()
                                ]
                );
            }

            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('contacts');
        }

        return $this->render('panelEntity/addContact.html.twig', [
                    'form' => $form->createView()
                        ]
        );
    }

    /**
     * @Route("/importContact" , name="import-contact")
     * 
     */
    public function importContact(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $requiredHeaders = array('nom', 'prenom', 'email', 'societe', 'taille', 'corpeOne', 'corpeToo', 'corpeThree', 'verbatim', 'q1', 'q2', 'q3', 'q4', 'q5', 'noteGlobale', 'moyenneEvaluation', 'classification', 'marque', 'solution', 'application', 'distribution', 'departement', 'dateCreation', 'recommandation', 'Opt-out temporaire', 'Opt-out definitif'); //headers we expect

        $fileImport = $request->files->get('FileUpload');


        $delimiters = $this->detectDelimiter($fileImport);

        if ($fileImport->getClientOriginalExtension() !== "csv" || $delimiters != ";" || (fopen($fileImport, "r") === FALSE)) {

            $messageRetour = 'Le format de votre fichier est incorrect';
            $typeMsg = 'sonata_flash_error';
        } else {

            $handle = fopen($fileImport, "r");

            $firstLine = fgetcsv($handle, 0, ";"); //parse to array

            if ($firstLine !== $requiredHeaders) {
                fclose($handle);
                $messageRetour = "L'import a échoué car l'intitulé des colonnes ne correspond pas au template. Vous pouvez le télécharger en dessous du bouton Télécharger";
                $typeMsg = 'sonata_flash_error';
            } else {
                $serviceRetour = $this->clientFromXlsFile($fileImport);
                if ($serviceRetour['NB_lINE'] > 0) {
                    // if ($serviceRetour['NB_NOUVEAUX_CLIENTS'] >= 1) {
                    $nbCltImporte = $serviceRetour['NB_NOUVEAUX_CLIENTS'];
                    if ($serviceRetour['NB_DUPLICATIONS'] > 0) {
                        $nbCltDupliq = $serviceRetour['NB_NOUVEAUX_CLIENTS'];
                        $messageRetour = $nbCltImporte . " contact(s) sont importé(s) avec succès – " . $nbCltDupliq . " lignes ont été ignorées car ces contacts étaient déjà enregistrés";
                        $typeMsg = 'sonata_flash_success';
                    } else {
                        $messageRetour = $nbCltImporte . ' contact(s) sont importé(s)';
                        $typeMsg = 'sonata_flash_success';
                    }

                    // }
                } else {
                    $messageRetour = 'Le fichier importé est vide';
                    $typeMsg = 'sonata_flash_error';
                }
            }
        }

        $this->get('session')->getFlashBag()->add($typeMsg, $messageRetour);
        return $this->redirect($this->generateUrl('contacts'));
    }

    /**
     * @param string $csvFile Path to the CSV file
     * @return string Delimiter
     */
    public function detectDelimiter($csvFile) {
        $delimiters = array(
            ';' => 0,
            ',' => 0,
            ':' => 0,
            " " => 0,
            "\t" => 0,
            "|" => 0
        );

        $handle = fopen($csvFile, "r");
        $firstLine = fgets($handle);
        fclose($handle);
        foreach ($delimiters as $delimiter => &$count) {
            $count = count(str_getcsv($firstLine, $delimiter));
        }

        return array_search(max($delimiters), $delimiters);
    }

    public function clientFromXlsFile($fileImport) {
        $em = $this->getDoctrine()->getManager();
        $clientArrayvalue = array();
        $i = 0;
        $nb_nouveaux_contact = 0;
        $nb_duplications = 0;
        $nb_ligne_ignore = 0;
        $nb_invalid_mail = 0;
        $date = new \DateTime();
        if (($handle = fopen($fileImport, "r")) !== FALSE) {
            fgetcsv($handle);
            $line_number = 0;
            while (($clientArrayvalue = fgetcsv($handle, 0, ";")) !== FALSE) {
                $line_number ++;
                $num = count($clientArrayvalue); // Nombre d'éléments sur la ligne traitée


                $panelEntity{$i} = new PanelEntity();
                if (!empty($clientArrayvalue[0])) {
                    $panelEntity{$i}->setFirstname($clientArrayvalue[0]);
                }
                if (!empty($clientArrayvalue[1])) {
                    $panelEntity{$i}->setLastname($clientArrayvalue[1]);
                }

                $panelEntity{$i}->setEmail($clientArrayvalue[2]);

                if (!empty($clientArrayvalue[3])) {
                    $panelEntity{$i}->setSociete($clientArrayvalue[3]);
                }
                if (!empty($clientArrayvalue[4])) {
                    $panelEntity{$i}->setTaille($clientArrayvalue[4]);
                }
                if (!empty($clientArrayvalue[5])) {
                    $panelEntity{$i}->setCorpeOne($clientArrayvalue[5]);
                }
                if (!empty($clientArrayvalue[6])) {
                    $panelEntity{$i}->setCorpeToo($clientArrayvalue[6]);
                }
                if (!empty($clientArrayvalue[7])) {
                    $panelEntity{$i}->setCorpeThree($clientArrayvalue[7]);
                }
                if (!empty($clientArrayvalue[8])) {
                    $panelEntity{$i}->setVerbatim($clientArrayvalue[8]);
                }
                if (!empty($clientArrayvalue[9])) {
                    $panelEntity{$i}->setQ1($clientArrayvalue[9]);
                }
                if (!empty($clientArrayvalue[10])) {
                    $panelEntity{$i}->setQ2($clientArrayvalue[10]);
                }
                if (!empty($clientArrayvalue[11])) {
                    $panelEntity{$i}->setQ3($clientArrayvalue[11]);
                }
                if (!empty($clientArrayvalue[12])) {
                    $panelEntity{$i}->setQ4($clientArrayvalue[12]);
                }
                if (!empty($clientArrayvalue[13])) {
                    $panelEntity{$i}->setQ5($clientArrayvalue[13]);
                }
                if (!empty($clientArrayvalue[14])) {
                    $panelEntity{$i}->setNoteGlobale($clientArrayvalue[14]);
                }
                $panelEntity{$i}->setMoyenneEvaluation($clientArrayvalue[15]);
                if (!empty($clientArrayvalue[16])) {
                    $panelEntity{$i}->setClassification($clientArrayvalue[16]);
                }
                if (!empty($clientArrayvalue[17])) {
                    $panelEntity{$i}->setMarque($clientArrayvalue[17]);
                }
                if (!empty($clientArrayvalue[18])) {
                    $panelEntity{$i}->setSolution($clientArrayvalue[18]);
                }
                if (!empty($clientArrayvalue[19])) {
                    $panelEntity{$i}->setApplication($clientArrayvalue[19]);
                }
                if (!empty($clientArrayvalue[20])) {
                    $panelEntity{$i}->setDistribution($clientArrayvalue[20]);
                }
                if (!empty($clientArrayvalue[21])) {
                    $panelEntity{$i}->setDepartement($clientArrayvalue[21]);
                }


                $dateCreation = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $clientArrayvalue[22])));
                $panelEntity{$i}->setDateCreation(new \DateTime($dateCreation));

                if (!empty($clientArrayvalue[23])) {
                    if (strtolower($clientArrayvalue[23]) == 'oui') {
                        $recommandation = 1;
                    } elseif (strtolower($clientArrayvalue[23]) == 'non') {
                        $recommandation = 0;
                    }
                    $panelEntity{$i}->setRecommandation($recommandation);
                }

                //$panelEntity{$i}->setSource(utf8_encode($source));

                $em->persist($panelEntity{$i});

                $em->flush();
                $nb_nouveaux_contact ++;
                $i ++;
            }
            fclose($handle);
        }
        $serviceRetour = array(
            "NB_NOUVEAUX_CLIENTS" => $nb_nouveaux_contact,
            "NB_DUPLICATIONS" => $nb_duplications,
            "NB_INVALID_MAIL" => $nb_invalid_mail,
            "NB_LINE_IGNORED" => $nb_ligne_ignore,
            "NB_lINE" => $line_number
        );
        return $serviceRetour;
    }

}
