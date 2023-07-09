<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028102218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE criteres DROP FOREIGN KEY FK_E913A5C5B4CB84B6');
        $this->addSql('DROP INDEX IDX_E913A5C5B4CB84B6 ON criteres');
        $this->addSql('ALTER TABLE criteres DROP cinema_id');
        $this->addSql('ALTER TABLE point_interet ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE point_interet ADD CONSTRAINT FK_1E559669C54C8C93 FOREIGN KEY (type_id) REFERENCES criteres (id)');
        $this->addSql('CREATE INDEX IDX_1E559669C54C8C93 ON point_interet (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE criteres ADD cinema_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE criteres ADD CONSTRAINT FK_E913A5C5B4CB84B6 FOREIGN KEY (cinema_id) REFERENCES point_interet (id)');
        $this->addSql('CREATE INDEX IDX_E913A5C5B4CB84B6 ON criteres (cinema_id)');
        $this->addSql('ALTER TABLE point_interet DROP FOREIGN KEY FK_1E559669C54C8C93');
        $this->addSql('DROP INDEX IDX_1E559669C54C8C93 ON point_interet');
        $this->addSql('ALTER TABLE point_interet DROP type_id');
    }
}
