<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305131339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendrier_cours (id INT AUTO_INCREMENT NOT NULL, id_cours_id INT NOT NULL, date DATETIME NOT NULL, heure_debut DATETIME NOT NULL, heure_fin DATETIME NOT NULL, INDEX IDX_B4DD0DEA2E149425 (id_cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, id_formation_id INT NOT NULL, id_organisme_id INT NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_8F87BF9671C15D5C (id_formation_id), INDEX IDX_8F87BF967E1C4D87 (id_organisme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_cours (classe_id INT NOT NULL, cours_id INT NOT NULL, INDEX IDX_B4BDD8A48F5EA509 (classe_id), INDEX IDX_B4BDD8A47ECF78B0 (cours_id), PRIMARY KEY(classe_id, cours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, id_formateur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, duree INT NOT NULL, difficulte INT NOT NULL CHECK (difficulte <= 5), objectif LONGTEXT NOT NULL, categorie VARCHAR(255) NOT NULL, INDEX IDX_FDCA8C9C369CFA23 (id_formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_classe (cours_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_E007AEFE7ECF78B0 (cours_id), INDEX IDX_E007AEFE8F5EA509 (classe_id), PRIMARY KEY(cours_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, INDEX IDX_717E22E3C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examen (id INT AUTO_INCREMENT NOT NULL, id_cours_id INT NOT NULL, note INT NOT NULL, INDEX IDX_514C8FEC2E149425 (id_cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, INDEX IDX_ED767E4FC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur_organisme (formateur_id INT NOT NULL, organisme_id INT NOT NULL, INDEX IDX_CF0BFF84155D8F51 (formateur_id), INDEX IDX_CF0BFF845DDD38F5 (organisme_id), PRIMARY KEY(formateur_id, organisme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisme_formateur (organisme_id INT NOT NULL, formateur_id INT NOT NULL, INDEX IDX_A41FD0085DDD38F5 (organisme_id), INDEX IDX_A41FD008155D8F51 (formateur_id), PRIMARY KEY(organisme_id, formateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, id_examen_id INT NOT NULL, label VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, nb_point INT NOT NULL, question_ouverte TINYINT(1) NOT NULL, INDEX IDX_B6F7494E85FDD9BD (id_examen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_eleve (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, id_etudiant_id INT NOT NULL, label VARCHAR(255) NOT NULL, correct TINYINT(1) NOT NULL, INDEX IDX_3487E946353B48 (id_question_id), INDEX IDX_3487E94C5F87C54 (id_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_formateur (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, label VARCHAR(255) NOT NULL, correct TINYINT(1) NOT NULL, INDEX IDX_2348165F6353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_ouverte_eleve (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, id_etudiant_id INT NOT NULL, note INT NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_68198EF76353B48 (id_question_id), INDEX IDX_68198EF7C5F87C54 (id_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_ouverte_formateur (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, note INT NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_C6DFE9A76353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, id_cours_id INT NOT NULL, fichier LONGBLOB NOT NULL, lien VARCHAR(255) DEFAULT NULL, INDEX IDX_939F45442E149425 (id_cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi (id INT AUTO_INCREMENT NOT NULL, id_cours_id INT NOT NULL, id_etudiant_id INT NOT NULL, pourcentage INT NOT NULL CHECK (pourcentage <= 100), INDEX IDX_2EBCCA8F2E149425 (id_cours_id), INDEX IDX_2EBCCA8FC5F87C54 (id_etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, photo_profil VARCHAR(255) NOT NULL, `admin` TINYINT(1) NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE calendrier_cours ADD CONSTRAINT FK_B4DD0DEA2E149425 FOREIGN KEY (id_cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF9671C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF967E1C4D87 FOREIGN KEY (id_organisme_id) REFERENCES organisme (id)');
        $this->addSql('ALTER TABLE classe_cours ADD CONSTRAINT FK_B4BDD8A48F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_cours ADD CONSTRAINT FK_B4BDD8A47ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C369CFA23 FOREIGN KEY (id_formateur_id) REFERENCES formateur (id)');
        $this->addSql('ALTER TABLE cours_classe ADD CONSTRAINT FK_E007AEFE7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_classe ADD CONSTRAINT FK_E007AEFE8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE examen ADD CONSTRAINT FK_514C8FEC2E149425 FOREIGN KEY (id_cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE formateur ADD CONSTRAINT FK_ED767E4FC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE formateur_organisme ADD CONSTRAINT FK_CF0BFF84155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formateur_organisme ADD CONSTRAINT FK_CF0BFF845DDD38F5 FOREIGN KEY (organisme_id) REFERENCES organisme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organisme_formateur ADD CONSTRAINT FK_A41FD0085DDD38F5 FOREIGN KEY (organisme_id) REFERENCES organisme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organisme_formateur ADD CONSTRAINT FK_A41FD008155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E85FDD9BD FOREIGN KEY (id_examen_id) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE reponse_eleve ADD CONSTRAINT FK_3487E946353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponse_eleve ADD CONSTRAINT FK_3487E94C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE reponse_formateur ADD CONSTRAINT FK_2348165F6353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponse_ouverte_eleve ADD CONSTRAINT FK_68198EF76353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponse_ouverte_eleve ADD CONSTRAINT FK_68198EF7C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE reponse_ouverte_formateur ADD CONSTRAINT FK_C6DFE9A76353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F45442E149425 FOREIGN KEY (id_cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8F2E149425 FOREIGN KEY (id_cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8FC5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendrier_cours DROP FOREIGN KEY FK_B4DD0DEA2E149425');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF9671C15D5C');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF967E1C4D87');
        $this->addSql('ALTER TABLE classe_cours DROP FOREIGN KEY FK_B4BDD8A48F5EA509');
        $this->addSql('ALTER TABLE classe_cours DROP FOREIGN KEY FK_B4BDD8A47ECF78B0');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C369CFA23');
        $this->addSql('ALTER TABLE cours_classe DROP FOREIGN KEY FK_E007AEFE7ECF78B0');
        $this->addSql('ALTER TABLE cours_classe DROP FOREIGN KEY FK_E007AEFE8F5EA509');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3C6EE5C49');
        $this->addSql('ALTER TABLE examen DROP FOREIGN KEY FK_514C8FEC2E149425');
        $this->addSql('ALTER TABLE formateur DROP FOREIGN KEY FK_ED767E4FC6EE5C49');
        $this->addSql('ALTER TABLE formateur_organisme DROP FOREIGN KEY FK_CF0BFF84155D8F51');
        $this->addSql('ALTER TABLE formateur_organisme DROP FOREIGN KEY FK_CF0BFF845DDD38F5');
        $this->addSql('ALTER TABLE organisme_formateur DROP FOREIGN KEY FK_A41FD0085DDD38F5');
        $this->addSql('ALTER TABLE organisme_formateur DROP FOREIGN KEY FK_A41FD008155D8F51');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E85FDD9BD');
        $this->addSql('ALTER TABLE reponse_eleve DROP FOREIGN KEY FK_3487E946353B48');
        $this->addSql('ALTER TABLE reponse_eleve DROP FOREIGN KEY FK_3487E94C5F87C54');
        $this->addSql('ALTER TABLE reponse_formateur DROP FOREIGN KEY FK_2348165F6353B48');
        $this->addSql('ALTER TABLE reponse_ouverte_eleve DROP FOREIGN KEY FK_68198EF76353B48');
        $this->addSql('ALTER TABLE reponse_ouverte_eleve DROP FOREIGN KEY FK_68198EF7C5F87C54');
        $this->addSql('ALTER TABLE reponse_ouverte_formateur DROP FOREIGN KEY FK_C6DFE9A76353B48');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F45442E149425');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8F2E149425');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8FC5F87C54');
        $this->addSql('DROP TABLE calendrier_cours');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_cours');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cours_classe');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE examen');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formateur_organisme');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE organisme');
        $this->addSql('DROP TABLE organisme_formateur');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE reponse_eleve');
        $this->addSql('DROP TABLE reponse_formateur');
        $this->addSql('DROP TABLE reponse_ouverte_eleve');
        $this->addSql('DROP TABLE reponse_ouverte_formateur');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE suivi');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
