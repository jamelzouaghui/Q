<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181227152107 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE panel_entity (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, societe VARCHAR(255) DEFAULT NULL, taille VARCHAR(255) DEFAULT NULL, corpe_one VARCHAR(255) DEFAULT NULL, corpe_too VARCHAR(255) DEFAULT NULL, corpe_three VARCHAR(255) DEFAULT NULL, verbatim VARCHAR(255) DEFAULT NULL, q1 INT DEFAULT NULL, q2 INT DEFAULT NULL, q3 INT DEFAULT NULL, q4 INT DEFAULT NULL, q5 INT DEFAULT NULL, note_globale INT DEFAULT NULL, moyenne_evaluation INT DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, marque VARCHAR(255) DEFAULT NULL, solution VARCHAR(255) DEFAULT NULL, application VARCHAR(255) DEFAULT NULL, distribution VARCHAR(255) DEFAULT NULL, departement VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, recommandation INT DEFAULT NULL, refuse_discussion INT DEFAULT NULL, source VARCHAR(255) DEFAULT NULL, etat INT DEFAULT NULL, trancha_age INT DEFAULT NULL, civility INT DEFAULT NULL, statut INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE panel_entity');
    }
}
