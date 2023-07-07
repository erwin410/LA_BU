<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230707094551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, ordinateur_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_42C84955828317CA (ordinateur_id), INDEX IDX_42C84955DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateur (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955828317CA');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955DDEAB1A3');
        $this->addSql('DROP TABLE reservation');
    }
}
