<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210907125811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ecoles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine (id INT AUTO_INCREMENT NOT NULL, keymachine VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variation_masse (id INT AUTO_INCREMENT NOT NULL, machine_id INT DEFAULT NULL, value DOUBLE PRECISION NOT NULL, INDEX IDX_B113D2A9F6B75B26 (machine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variation_temperature (id INT AUTO_INCREMENT NOT NULL, machine_id INT DEFAULT NULL, value DOUBLE PRECISION NOT NULL, INDEX IDX_B807843AF6B75B26 (machine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE variation_masse ADD CONSTRAINT FK_B113D2A9F6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id)');
        $this->addSql('ALTER TABLE variation_temperature ADD CONSTRAINT FK_B807843AF6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation_masse DROP FOREIGN KEY FK_B113D2A9F6B75B26');
        $this->addSql('ALTER TABLE variation_temperature DROP FOREIGN KEY FK_B807843AF6B75B26');
        $this->addSql('DROP TABLE ecoles');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE variation_masse');
        $this->addSql('DROP TABLE variation_temperature');
    }
}
