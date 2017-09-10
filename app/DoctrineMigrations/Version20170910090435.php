<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170910090435 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE climbings ADD spot_id INT DEFAULT NULL, ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE climbings ADD CONSTRAINT FK_AAC2AEE12DF1D37C FOREIGN KEY (spot_id) REFERENCES spots (id)');
        $this->addSql('ALTER TABLE climbings ADD CONSTRAINT FK_AAC2AEE164D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_AAC2AEE12DF1D37C ON climbings (spot_id)');
        $this->addSql('CREATE INDEX IDX_AAC2AEE164D218E ON climbings (location_id)');
        $this->addSql('ALTER TABLE nations DROP location');
        $this->addSql('ALTER TABLE regions ADD nation_id INT DEFAULT NULL, DROP location');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3AE3899 FOREIGN KEY (nation_id) REFERENCES nations (id)');
        $this->addSql('CREATE INDEX IDX_A26779F3AE3899 ON regions (nation_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE climbings DROP FOREIGN KEY FK_AAC2AEE12DF1D37C');
        $this->addSql('ALTER TABLE climbings DROP FOREIGN KEY FK_AAC2AEE164D218E');
        $this->addSql('DROP INDEX IDX_AAC2AEE12DF1D37C ON climbings');
        $this->addSql('DROP INDEX IDX_AAC2AEE164D218E ON climbings');
        $this->addSql('ALTER TABLE climbings DROP spot_id, DROP location_id');
        $this->addSql('ALTER TABLE nations ADD location VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3AE3899');
        $this->addSql('DROP INDEX IDX_A26779F3AE3899 ON regions');
        $this->addSql('ALTER TABLE regions ADD location VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, DROP nation_id');
    }
}
