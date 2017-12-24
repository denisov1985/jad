<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171224100657 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE event_speaker');
        $this->addSql('ALTER TABLE speaker ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speaker ADD CONSTRAINT FK_7B85DB6171F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_7B85DB6171F7E88B ON speaker (event_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event_speaker (event_id INT NOT NULL, speaker_id INT NOT NULL, INDEX IDX_FED272CE71F7E88B (event_id), INDEX IDX_FED272CED04A0F27 (speaker_id), PRIMARY KEY(event_id, speaker_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_speaker ADD CONSTRAINT FK_FED272CE71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_speaker ADD CONSTRAINT FK_FED272CED04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speaker DROP FOREIGN KEY FK_7B85DB6171F7E88B');
        $this->addSql('DROP INDEX IDX_7B85DB6171F7E88B ON speaker');
        $this->addSql('ALTER TABLE speaker DROP event_id');
    }
}
