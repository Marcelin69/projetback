<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230710111422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ergonomie (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logiciel (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, salle_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, reserve TINYINT(1) DEFAULT NULL, INDEX IDX_42C84955DC304035 (salle_id), INDEX IDX_42C84955FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, capacite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_ergonomie (salle_id INT NOT NULL, ergonomie_id INT NOT NULL, INDEX IDX_C230D62FDC304035 (salle_id), INDEX IDX_C230D62FD0A4FB17 (ergonomie_id), PRIMARY KEY(salle_id, ergonomie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_logiciel (salle_id INT NOT NULL, logiciel_id INT NOT NULL, INDEX IDX_30113192DC304035 (salle_id), INDEX IDX_30113192CA84195D (logiciel_id), PRIMARY KEY(salle_id, logiciel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_materiel (salle_id INT NOT NULL, materiel_id INT NOT NULL, INDEX IDX_493E79FDC304035 (salle_id), INDEX IDX_493E79F16880AAF (materiel_id), PRIMARY KEY(salle_id, materiel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(50) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FD0A4FB17 FOREIGN KEY (ergonomie_id) REFERENCES ergonomie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_logiciel ADD CONSTRAINT FK_30113192DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_logiciel ADD CONSTRAINT FK_30113192CA84195D FOREIGN KEY (logiciel_id) REFERENCES logiciel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_materiel ADD CONSTRAINT FK_493E79FDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_materiel ADD CONSTRAINT FK_493E79F16880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955DC304035');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FB88E14F');
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FDC304035');
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FD0A4FB17');
        $this->addSql('ALTER TABLE salle_logiciel DROP FOREIGN KEY FK_30113192DC304035');
        $this->addSql('ALTER TABLE salle_logiciel DROP FOREIGN KEY FK_30113192CA84195D');
        $this->addSql('ALTER TABLE salle_materiel DROP FOREIGN KEY FK_493E79FDC304035');
        $this->addSql('ALTER TABLE salle_materiel DROP FOREIGN KEY FK_493E79F16880AAF');
        $this->addSql('DROP TABLE ergonomie');
        $this->addSql('DROP TABLE logiciel');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE salle_ergonomie');
        $this->addSql('DROP TABLE salle_logiciel');
        $this->addSql('DROP TABLE salle_materiel');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
