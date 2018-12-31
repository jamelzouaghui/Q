<?php

namespace App\Entity;

use App\Repository\PanelEntityRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="PanelEntityRepository")
 */
class PanelEntity {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $corpeOne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $corpeToo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $corpeThree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $verbatim;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q4;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $q5;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteGlobale;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $moyenneEvaluation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $solution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $application;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $distribution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $recommandation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $refuseDiscussion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tranchaAge;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $civility;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statut;

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;

        return $this;
    }

    public function getSociete() {
        return $this->societe;
    }

    public function setSociete(string $societe) {
        $this->societe = $societe;

        return $this;
    }

    public function getTaille() {
        return $this->taille;
    }

    public function setTaille(string $taille) {
        $this->taille = $taille;

        return $this;
    }

    public function getCorpeOne() {
        return $this->corpeOne;
    }

    public function setCorpeOne(string $corpeOne) {
        $this->corpeOne = $corpeOne;

        return $this;
    }

    public function getCorpeToo() {
        return $this->corpeToo;
    }

    public function setCorpeToo(string $corpeToo) {
        $this->corpeToo = $corpeToo;

        return $this;
    }

    public function getCorpeThree() {
        return $this->corpeThree;
    }

    public function setCorpeThree(string $corpeThree) {
        $this->corpeThree = $corpeThree;

        return $this;
    }

    public function getVerbatim() {
        return $this->verbatim;
    }

    public function setVerbatim(string $verbatim) {
        $this->verbatim = $verbatim;

        return $this;
    }

    public function getQ1() {
        return $this->q1;
    }

    public function setQ1(int $q1) {
        $this->q1 = $q1;

        return $this;
    }

    public function getQ2() {
        return $this->q2;
    }

    public function setQ2(int $q2) {
        $this->q2 = $q2;

        return $this;
    }

    public function getQ3() {
        return $this->q3;
    }

    public function setQ3(int $q3) {
        $this->q3 = $q3;

        return $this;
    }

    public function getQ4() {
        return $this->q4;
    }

    public function setQ4(int $q4) {
        $this->q4 = $q4;

        return $this;
    }

    public function getQ5() {
        return $this->q5;
    }

    public function setQ5(int $q5) {
        $this->q5 = $q5;

        return $this;
    }

    public function getNoteGlobale() {
        return $this->noteGlobale;
    }

    public function setNoteGlobale(int $noteGlobale) {
        $this->noteGlobale = $noteGlobale;

        return $this;
    }

    public function getMoyenneEvaluation() {
        return $this->moyenneEvaluation;
    }

    public function setMoyenneEvaluation(int $moyenneEvaluation) {
        $this->moyenneEvaluation = $moyenneEvaluation;

        return $this;
    }

    public function getClassification() {
        return $this->classification;
    }

    public function setClassification(string $classification) {
        $this->classification = $classification;

        return $this;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function setMarque(string $marque) {
        $this->marque = $marque;

        return $this;
    }

    public function getSolution() {
        return $this->solution;
    }

    public function setSolution(string $solution) {
        $this->solution = $solution;

        return $this;
    }

    public function getApplication() {
        return $this->application;
    }

    public function setApplication(string $application) {
        $this->application = $application;

        return $this;
    }

    public function getDistribution() {
        return $this->distribution;
    }

    public function setDistribution(string $distribution) {
        $this->distribution = $distribution;

        return $this;
    }

    public function getDepartement() {
        return $this->departement;
    }

    public function setDepartement(string $departement) {
        $this->departement = $departement;

        return $this;
    }

    public function getRegion() {
        return $this->region;
    }

    public function setRegion(string $region) {
        $this->region = $region;

        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getRecommandation() {
        return $this->recommandation;
    }

    public function setRecommandation(int $recommandation) {
        $this->recommandation = $recommandation;

        return $this;
    }

    public function getRefuseDiscussion() {
        return $this->refuseDiscussion;
    }

    public function setRefuseDiscussion(int $refuseDiscussion) {
        $this->refuseDiscussion = $refuseDiscussion;

        return $this;
    }

    public function getSource() {
        return $this->source;
    }

    public function setSource(string $source) {
        $this->source = $source;

        return $this;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setEtat(int $etat) {
        $this->etat = $etat;

        return $this;
    }

    public function getTranchaAge() {
        return $this->tranchaAge;
    }

    public function setTranchaAge(int $tranchaAge) {
        $this->tranchaAge = $tranchaAge;

        return $this;
    }

    public function getCivility() {
        return $this->civility;
    }

    public function setCivility(int $civility) {
        $this->civility = $civility;

        return $this;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut(int $statut) {
        $this->statut = $statut;

        return $this;
    }

}
