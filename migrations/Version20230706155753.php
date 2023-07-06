<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706155753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FD0A4FB17');
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FDC304035');
        $this->addSql('ALTER TABLE salle_logiciel DROP FOREIGN KEY FK_30113192DC304035');
        $this->addSql('ALTER TABLE salle_logiciel DROP FOREIGN KEY FK_30113192CA84195D');
        $this->addSql('ALTER TABLE salle_materiel DROP FOREIGN KEY FK_493E79F16880AAF');
        $this->addSql('ALTER TABLE salle_materiel DROP FOREIGN KEY FK_493E79FDC304035');
        $this->addSql('DROP TABLE ergonomie');
        $this->addSql('DROP TABLE logiciel');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE salle_ergonomie');
        $this->addSql('DROP TABLE salle_logiciel');
        $this->addSql('DROP TABLE salle_materiel');
        $this->addSql('ALTER TABLE reservation ADD reserve TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ergonomie (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE logiciel (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salle_ergonomie (salle_id INT NOT NULL, ergonomie_id INT NOT NULL, INDEX IDX_C230D62FDC304035 (salle_id), INDEX IDX_C230D62FD0A4FB17 (ergonomie_id), PRIMARY KEY(salle_id, ergonomie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salle_logiciel (salle_id INT NOT NULL, logiciel_id INT NOT NULL, INDEX IDX_30113192DC304035 (salle_id), INDEX IDX_30113192CA84195D (logiciel_id), PRIMARY KEY(salle_id, logiciel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salle_materiel (salle_id INT NOT NULL, materiel_id INT NOT NULL, INDEX IDX_493E79FDC304035 (salle_id), INDEX IDX_493E79F16880AAF (materiel_id), PRIMARY KEY(salle_id, materiel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FD0A4FB17 FOREIGN KEY (ergonomie_id) REFERENCES ergonomie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_logiciel ADD CONSTRAINT FK_30113192DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_logiciel ADD CONSTRAINT FK_30113192CA84195D FOREIGN KEY (logiciel_id) REFERENCES logiciel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_materiel ADD CONSTRAINT FK_493E79F16880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_materiel ADD CONSTRAINT FK_493E79FDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation DROP reserve');
    }
}
