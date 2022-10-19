<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019131022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD catgorie2_id INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFBDD40152 FOREIGN KEY (catgorie2_id) REFERENCES categorie2 (id)');
        $this->addSql('CREATE INDEX IDX_404021BFBDD40152 ON formation (catgorie2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFBDD40152');
        $this->addSql('DROP INDEX IDX_404021BFBDD40152 ON formation');
        $this->addSql('ALTER TABLE formation DROP catgorie2_id');
    }
}
