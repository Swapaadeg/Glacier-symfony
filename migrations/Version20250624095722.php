<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250624095722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE toppings (id INT AUTO_INCREMENT NOT NULL, topping VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE toppings_glaces (toppings_id INT NOT NULL, glaces_id INT NOT NULL, INDEX IDX_654DFA6CBE2B4234 (toppings_id), INDEX IDX_654DFA6C4BB69CFF (glaces_id), PRIMARY KEY(toppings_id, glaces_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces ADD CONSTRAINT FK_654DFA6CBE2B4234 FOREIGN KEY (toppings_id) REFERENCES toppings (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces ADD CONSTRAINT FK_654DFA6C4BB69CFF FOREIGN KEY (glaces_id) REFERENCES glaces (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces DROP FOREIGN KEY FK_654DFA6CBE2B4234
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE toppings_glaces DROP FOREIGN KEY FK_654DFA6C4BB69CFF
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE toppings
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE toppings_glaces
        SQL);
    }
}
