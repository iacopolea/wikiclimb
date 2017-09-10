<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170910205320 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE spots ADD location_id INT DEFAULT NULL, ADD area_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spots ADD CONSTRAINT FK_D2BBDDF764D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('ALTER TABLE spots ADD CONSTRAINT FK_D2BBDDF7BD0F409C FOREIGN KEY (area_id) REFERENCES areas (id)');
        $this->addSql('CREATE INDEX IDX_D2BBDDF764D218E ON spots (location_id)');
        $this->addSql('CREATE INDEX IDX_D2BBDDF7BD0F409C ON spots (area_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE spots DROP FOREIGN KEY FK_D2BBDDF764D218E');
        $this->addSql('ALTER TABLE spots DROP FOREIGN KEY FK_D2BBDDF7BD0F409C');
        $this->addSql('DROP INDEX IDX_D2BBDDF764D218E ON spots');
        $this->addSql('DROP INDEX IDX_D2BBDDF7BD0F409C ON spots');
        $this->addSql('ALTER TABLE spots DROP location_id, DROP area_id');
    }
}
