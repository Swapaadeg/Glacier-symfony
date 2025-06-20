<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250620072206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE cones (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces ADD cones_id INT DEFAULT NULL, ADD ingredient_special VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces ADD CONSTRAINT FK_E07C5E76C51EC17A FOREIGN KEY (cones_id) REFERENCES cones (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E07C5E76C51EC17A ON glaces (cones_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces DROP FOREIGN KEY FK_E07C5E76C51EC17A
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE cones
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_E07C5E76C51EC17A ON glaces
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces DROP cones_id, DROP ingredient_special
        SQL);
    }
}
