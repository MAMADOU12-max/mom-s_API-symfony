<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921173947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE machines ADD ecoles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE machines ADD CONSTRAINT FK_F1CE8DED1D096F5D FOREIGN KEY (ecoles_id) REFERENCES ecoles (id)');
        $this->addSql('CREATE INDEX IDX_F1CE8DED1D096F5D ON machines (ecoles_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE machines DROP FOREIGN KEY FK_F1CE8DED1D096F5D');
        $this->addSql('DROP INDEX IDX_F1CE8DED1D096F5D ON machines');
        $this->addSql('ALTER TABLE machines DROP ecoles_id');
    }
}
