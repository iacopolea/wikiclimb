<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170910151131 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3AE3899');
        $this->addSql('DROP INDEX IDX_A26779F3AE3899 ON regions');
        $this->addSql('ALTER TABLE regions CHANGE nation_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_A26779F3F92F3E70 ON regions (country_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3F92F3E70');
        $this->addSql('DROP INDEX IDX_A26779F3F92F3E70 ON regions');
        $this->addSql('ALTER TABLE regions CHANGE country_id nation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3AE3899 FOREIGN KEY (nation_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_A26779F3AE3899 ON regions (nation_id)');
    }
}
