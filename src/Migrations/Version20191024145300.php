<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191024145300 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE department_company ADD test_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE department_company ADD CONSTRAINT FK_F216E1AC1E5D0459 FOREIGN KEY (test_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_F216E1AC1E5D0459 ON department_company (test_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE department_company DROP FOREIGN KEY FK_F216E1AC1E5D0459');
        $this->addSql('DROP INDEX IDX_F216E1AC1E5D0459 ON department_company');
        $this->addSql('ALTER TABLE department_company DROP test_id');
    }
}
