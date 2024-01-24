<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124123706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite ADD user_link_id INT NOT NULL');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_54928197F5A91C7B FOREIGN KEY (user_link_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_54928197F5A91C7B ON actualite (user_link_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE actualite DROP CONSTRAINT FK_54928197F5A91C7B');
        $this->addSql('DROP INDEX IDX_54928197F5A91C7B');
        $this->addSql('ALTER TABLE actualite DROP user_link_id');
    }
}
