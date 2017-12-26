<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171226171749 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity_day DROP FOREIGN KEY FK_9799B71271F7E88B');
        $this->addSql('ALTER TABLE activity_day ADD CONSTRAINT FK_9799B71271F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity_day DROP FOREIGN KEY FK_9799B71271F7E88B');
        $this->addSql('ALTER TABLE activity_day ADD CONSTRAINT FK_9799B71271F7E88B FOREIGN KEY (event_id) REFERENCES activity (id)');
    }
}
