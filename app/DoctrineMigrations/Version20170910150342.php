<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170910150342 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE areas (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE area_region (area_id INT NOT NULL, region_id INT NOT NULL, INDEX IDX_69E900F4BD0F409C (area_id), INDEX IDX_69E900F498260155 (region_id), PRIMARY KEY(area_id, region_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE climbings (id INT AUTO_INCREMENT NOT NULL, spot_id INT DEFAULT NULL, location_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, position_number INT DEFAULT NULL, grade VARCHAR(255) DEFAULT NULL, min_grade VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, author VARCHAR(255) DEFAULT NULL, ranking NUMERIC(5, 4) DEFAULT NULL, length INT DEFAULT NULL, pitches LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', sketch_image VARCHAR(255) DEFAULT NULL, featured_image VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_AAC2AEE16E7E71D9 (position_number), INDEX IDX_AAC2AEE12DF1D37C (spot_id), INDEX IDX_AAC2AEE164D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5D66EBAD5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locations (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rate NUMERIC(10, 2) DEFAULT NULL, approach LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, sketch_image VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, nation_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A26779F3AE3899 (nation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spots (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, bolting VARCHAR(255) DEFAULT NULL, author VARCHAR(255) DEFAULT NULL, ranking NUMERIC(5, 4) DEFAULT NULL, altitude INT DEFAULT NULL, face LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `users` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_1483A5E992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_1483A5E9A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_1483A5E9C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE area_region ADD CONSTRAINT FK_69E900F4BD0F409C FOREIGN KEY (area_id) REFERENCES areas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE area_region ADD CONSTRAINT FK_69E900F498260155 FOREIGN KEY (region_id) REFERENCES regions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE climbings ADD CONSTRAINT FK_AAC2AEE12DF1D37C FOREIGN KEY (spot_id) REFERENCES spots (id)');
        $this->addSql('ALTER TABLE climbings ADD CONSTRAINT FK_AAC2AEE164D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3AE3899 FOREIGN KEY (nation_id) REFERENCES countries (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE area_region DROP FOREIGN KEY FK_69E900F4BD0F409C');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3AE3899');
        $this->addSql('ALTER TABLE climbings DROP FOREIGN KEY FK_AAC2AEE164D218E');
        $this->addSql('ALTER TABLE area_region DROP FOREIGN KEY FK_69E900F498260155');
        $this->addSql('ALTER TABLE climbings DROP FOREIGN KEY FK_AAC2AEE12DF1D37C');
        $this->addSql('DROP TABLE areas');
        $this->addSql('DROP TABLE area_region');
        $this->addSql('DROP TABLE climbings');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE locations');
        $this->addSql('DROP TABLE regions');
        $this->addSql('DROP TABLE spots');
        $this->addSql('DROP TABLE `users`');
    }
}
