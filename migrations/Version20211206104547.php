<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211206104547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episode CHANGE synopsys synopsis LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA4EC001D1 ON episode (season_id)');
        $this->addSql('ALTER TABLE program ADD year INT NOT NULL, CHANGE poster poster VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_92ED77842B36786B ON program (title)');
        $this->addSql('ALTER TABLE season CHANGE year year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA93EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('CREATE INDEX IDX_F0E45BA93EB8070A ON season (program_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('DROP INDEX IDX_DDAA1CDA4EC001D1 ON episode');
        $this->addSql('ALTER TABLE episode CHANGE synopsis synopsys LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_92ED77842B36786B ON program');
        $this->addSql('ALTER TABLE program DROP year, CHANGE poster poster VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA93EB8070A');
        $this->addSql('DROP INDEX IDX_F0E45BA93EB8070A ON season');
        $this->addSql('ALTER TABLE season CHANGE year year INT NOT NULL');
    }
}
