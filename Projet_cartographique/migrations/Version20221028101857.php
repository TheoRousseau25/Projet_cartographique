<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028101857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE point_interet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, adresse VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longetude DOUBLE PRECISION NOT NULL, ville VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('ALTER TABLE criteres ADD cinema_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE criteres ADD CONSTRAINT FK_E913A5C5B4CB84B6 FOREIGN KEY (cinema_id) REFERENCES point_interet (id)');
        $this->addSql('CREATE INDEX IDX_E913A5C5B4CB84B6 ON criteres (cinema_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE criteres DROP FOREIGN KEY FK_E913A5C5B4CB84B6');
        $this->addSql('CREATE TABLE cinema (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, latitude DOUBLE PRECISION NOT NULL, longetude DOUBLE PRECISION NOT NULL, ville VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE point_interet');
        $this->addSql('DROP INDEX IDX_E913A5C5B4CB84B6 ON criteres');
        $this->addSql('ALTER TABLE criteres DROP cinema_id');
    }
}
