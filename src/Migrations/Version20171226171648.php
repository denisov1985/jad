<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171226171648 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity_day DROP FOREIGN KEY FK_9799B71281C06096');
        $this->addSql('DROP INDEX IDX_9799B71281C06096 ON activity_day');
        $this->addSql('ALTER TABLE activity_day CHANGE activity_id event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity_day ADD CONSTRAINT FK_9799B71271F7E88B FOREIGN KEY (event_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_9799B71271F7E88B ON activity_day (event_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity_day DROP FOREIGN KEY FK_9799B71271F7E88B');
        $this->addSql('DROP INDEX IDX_9799B71271F7E88B ON activity_day');
        $this->addSql('ALTER TABLE activity_day CHANGE event_id activity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity_day ADD CONSTRAINT FK_9799B71281C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_9799B71281C06096 ON activity_day (activity_id)');
    }
}
