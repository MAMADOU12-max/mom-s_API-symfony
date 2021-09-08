<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908095209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE machines (id INT AUTO_INCREMENT NOT NULL, keymachine VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE variation_masse DROP FOREIGN KEY FK_B113D2A9F6B75B26');
        $this->addSql('DROP INDEX IDX_B113D2A9F6B75B26 ON variation_masse');
        $this->addSql('ALTER TABLE variation_masse CHANGE machine_id machines_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE variation_masse ADD CONSTRAINT FK_B113D2A9358A8F83 FOREIGN KEY (machines_id) REFERENCES machines (id)');
        $this->addSql('CREATE INDEX IDX_B113D2A9358A8F83 ON variation_masse (machines_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation_masse DROP FOREIGN KEY FK_B113D2A9358A8F83');
        $this->addSql('DROP TABLE machines');
        $this->addSql('DROP INDEX IDX_B113D2A9358A8F83 ON variation_masse');
        $this->addSql('ALTER TABLE variation_masse CHANGE machines_id machine_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE variation_masse ADD CONSTRAINT FK_B113D2A9F6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id)');
        $this->addSql('CREATE INDEX IDX_B113D2A9F6B75B26 ON variation_masse (machine_id)');
    }
}
