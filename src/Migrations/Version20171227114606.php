<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171227114606 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity ADD room_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095AD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id)');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A9C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A54177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_AC74095A54177093 ON activity (room_id)');
        $this->addSql('ALTER TABLE room ADD activities_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B2A4DB562 FOREIGN KEY (activities_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_729F519B2A4DB562 ON room (activities_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AD04A0F27');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A9C24126');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A54177093');
        $this->addSql('DROP INDEX IDX_AC74095A54177093 ON activity');
        $this->addSql('ALTER TABLE activity DROP room_id');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B2A4DB562');
        $this->addSql('DROP INDEX IDX_729F519B2A4DB562 ON room');
        $this->addSql('ALTER TABLE room DROP activities_id');
    }
}
