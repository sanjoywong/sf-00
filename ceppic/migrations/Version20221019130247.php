<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019130247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD categorie2_id INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF81BA2BEF FOREIGN KEY (categorie2_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_404021BF81BA2BEF ON formation (categorie2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF81BA2BEF');
        $this->addSql('DROP INDEX IDX_404021BF81BA2BEF ON formation');
        $this->addSql('ALTER TABLE formation DROP categorie2_id');
    }
}
