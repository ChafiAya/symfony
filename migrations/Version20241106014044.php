<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106014044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, id_auteur INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, lieu_naissance DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collect (id INT AUTO_INCREMENT NOT NULL, id_collection INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edition (id INT AUTO_INCREMENT NOT NULL, id_edition INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, id_collection_id INT NOT NULL, id_edition_id INT NOT NULL, id_livre INT NOT NULL, isbn VARCHAR(255) NOT NULL, INDEX IDX_AC634F99EF618798 (id_collection_id), INDEX IDX_AC634F99D1A29A89 (id_edition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99EF618798 FOREIGN KEY (id_collection_id) REFERENCES collect (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99D1A29A89 FOREIGN KEY (id_edition_id) REFERENCES edition (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99EF618798');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99D1A29A89');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE collect');
        $this->addSql('DROP TABLE edition');
        $this->addSql('DROP TABLE livre');
    }
}
