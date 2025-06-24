<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624132041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE glaces_toppings (glaces_id INT NOT NULL, toppings_id INT NOT NULL, INDEX IDX_F5B8AD524BB69CFF (glaces_id), INDEX IDX_F5B8AD52BE2B4234 (toppings_id), PRIMARY KEY(glaces_id, toppings_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces_toppings ADD CONSTRAINT FK_F5B8AD524BB69CFF FOREIGN KEY (glaces_id) REFERENCES glaces (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces_toppings ADD CONSTRAINT FK_F5B8AD52BE2B4234 FOREIGN KEY (toppings_id) REFERENCES toppings (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces DROP FOREIGN KEY FK_654DFA6C4BB69CFF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces DROP FOREIGN KEY FK_654DFA6CBE2B4234
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE toppings_glaces
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE toppings_glaces (toppings_id INT NOT NULL, glaces_id INT NOT NULL, INDEX IDX_654DFA6CBE2B4234 (toppings_id), INDEX IDX_654DFA6C4BB69CFF (glaces_id), PRIMARY KEY(toppings_id, glaces_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces ADD CONSTRAINT FK_654DFA6C4BB69CFF FOREIGN KEY (glaces_id) REFERENCES glaces (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces ADD CONSTRAINT FK_654DFA6CBE2B4234 FOREIGN KEY (toppings_id) REFERENCES toppings (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces_toppings DROP FOREIGN KEY FK_F5B8AD524BB69CFF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces_toppings DROP FOREIGN KEY FK_F5B8AD52BE2B4234
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE glaces_toppings
        SQL);
    }
}
