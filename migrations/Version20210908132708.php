<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908132708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation_temperature DROP FOREIGN KEY FK_B807843AF6B75B26');
        $this->addSql('DROP TABLE machine');
        $this->addSql('ALTER TABLE variation_masse ADD date DATE NOT NULL');
        $this->addSql('DROP INDEX IDX_B807843AF6B75B26 ON variation_temperature');
        $this->addSql('ALTER TABLE variation_temperature DROP machine_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE machine (id INT AUTO_INCREMENT NOT NULL, keymachine VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, localisation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE variation_masse DROP date');
        $this->addSql('ALTER TABLE variation_temperature ADD machine_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE variation_temperature ADD CONSTRAINT FK_B807843AF6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id)');
        $this->addSql('CREATE INDEX IDX_B807843AF6B75B26 ON variation_temperature (machine_id)');
    }
}
