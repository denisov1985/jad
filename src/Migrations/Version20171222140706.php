<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171222140706 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, is_front_page TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_speaker (event_id INT NOT NULL, speaker_id INT NOT NULL, INDEX IDX_FED272CE71F7E88B (event_id), INDEX IDX_FED272CED04A0F27 (speaker_id), PRIMARY KEY(event_id, speaker_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_sponsor (event_id INT NOT NULL, sponsor_id INT NOT NULL, INDEX IDX_4DB607B71F7E88B (event_id), INDEX IDX_4DB607B12F7FB51 (sponsor_id), PRIMARY KEY(event_id, sponsor_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsor (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_speaker ADD CONSTRAINT FK_FED272CE71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_speaker ADD CONSTRAINT FK_FED272CED04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_sponsor ADD CONSTRAINT FK_4DB607B71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_sponsor ADD CONSTRAINT FK_4DB607B12F7FB51 FOREIGN KEY (sponsor_id) REFERENCES sponsor (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_speaker DROP FOREIGN KEY FK_FED272CE71F7E88B');
        $this->addSql('ALTER TABLE event_sponsor DROP FOREIGN KEY FK_4DB607B71F7E88B');
        $this->addSql('ALTER TABLE event_speaker DROP FOREIGN KEY FK_FED272CED04A0F27');
        $this->addSql('ALTER TABLE event_sponsor DROP FOREIGN KEY FK_4DB607B12F7FB51');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_speaker');
        $this->addSql('DROP TABLE event_sponsor');
        $this->addSql('DROP TABLE speaker');
        $this->addSql('DROP TABLE sponsor');
    }
}
