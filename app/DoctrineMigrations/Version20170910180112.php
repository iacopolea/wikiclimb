<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170910180112 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE areas DROP FOREIGN KEY FK_58B0B25CED775E23');
        $this->addSql('DROP INDEX IDX_58B0B25CED775E23 ON areas');
        $this->addSql('ALTER TABLE areas DROP locations_id');
        $this->addSql('ALTER TABLE locations ADD area_id INT DEFAULT NULL, ADD region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABABD0F409C FOREIGN KEY (area_id) REFERENCES areas (id)');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABA98260155 FOREIGN KEY (region_id) REFERENCES regions (id)');
        $this->addSql('CREATE INDEX IDX_17E64ABABD0F409C ON locations (area_id)');
        $this->addSql('CREATE INDEX IDX_17E64ABA98260155 ON locations (region_id)');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3ED775E23');
        $this->addSql('DROP INDEX IDX_A26779F3ED775E23 ON regions');
        $this->addSql('ALTER TABLE regions DROP locations_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE areas ADD locations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE areas ADD CONSTRAINT FK_58B0B25CED775E23 FOREIGN KEY (locations_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_58B0B25CED775E23 ON areas (locations_id)');
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABABD0F409C');
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABA98260155');
        $this->addSql('DROP INDEX IDX_17E64ABABD0F409C ON locations');
        $this->addSql('DROP INDEX IDX_17E64ABA98260155 ON locations');
        $this->addSql('ALTER TABLE locations DROP area_id, DROP region_id');
        $this->addSql('ALTER TABLE regions ADD locations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3ED775E23 FOREIGN KEY (locations_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_A26779F3ED775E23 ON regions (locations_id)');
    }
}
