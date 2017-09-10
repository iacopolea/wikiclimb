<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170910164902 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE areas ADD locations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE areas ADD CONSTRAINT FK_58B0B25CED775E23 FOREIGN KEY (locations_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_58B0B25CED775E23 ON areas (locations_id)');
        $this->addSql('ALTER TABLE locations DROP location, CHANGE rate rate NUMERIC(5, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE regions ADD locations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3ED775E23 FOREIGN KEY (locations_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_A26779F3ED775E23 ON regions (locations_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE areas DROP FOREIGN KEY FK_58B0B25CED775E23');
        $this->addSql('DROP INDEX IDX_58B0B25CED775E23 ON areas');
        $this->addSql('ALTER TABLE areas DROP locations_id');
        $this->addSql('ALTER TABLE locations ADD location VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE rate rate NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3ED775E23');
        $this->addSql('DROP INDEX IDX_A26779F3ED775E23 ON regions');
        $this->addSql('ALTER TABLE regions DROP locations_id');
    }
}
