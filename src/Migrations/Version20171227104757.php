<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171227104757 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity ADD event_id INT DEFAULT NULL, CHANGE started_at started_at TIME NOT NULL, CHANGE ended_at ended_at TIME NOT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_AC74095A71F7E88B ON activity (event_id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841871F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE speaker ADD CONSTRAINT FK_7B85DB6171F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE sponsor ADD CONSTRAINT FK_818CC9D471F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE sponsor ADD CONSTRAINT FK_818CC9D4C54C8C93 FOREIGN KEY (type_id) REFERENCES sponsor_type (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A71F7E88B');
        $this->addSql('DROP INDEX IDX_AC74095A71F7E88B ON activity');
        $this->addSql('ALTER TABLE activity DROP event_id, CHANGE started_at started_at DATETIME NOT NULL, CHANGE ended_at ended_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841871F7E88B');
        $this->addSql('ALTER TABLE speaker DROP FOREIGN KEY FK_7B85DB6171F7E88B');
        $this->addSql('ALTER TABLE sponsor DROP FOREIGN KEY FK_818CC9D471F7E88B');
        $this->addSql('ALTER TABLE sponsor DROP FOREIGN KEY FK_818CC9D4C54C8C93');
    }
}
