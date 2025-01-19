<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250119211756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Book (id VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(4096) DEFAULT NULL, isbn VARCHAR(13) NOT NULL, isbn13 VARCHAR(13) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN Book.id IS \'(DC2Type:id)\'');
        $this->addSql('CREATE TABLE Book_Category (id VARCHAR(255) NOT NULL, book_id VARCHAR(255) DEFAULT NULL, category_id VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_55BB263B16A2B381 ON Book_Category (book_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_55BB263B12469DE2 ON Book_Category (category_id)');
        $this->addSql('COMMENT ON COLUMN Book_Category.id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN Book_Category.book_id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN Book_Category.category_id IS \'(DC2Type:id)\'');
        $this->addSql('CREATE TABLE Book_Reader (id VARCHAR(255) NOT NULL, book_id VARCHAR(255) DEFAULT NULL, user_id VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, commentary VARCHAR(4096) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64D8085016A2B381 ON Book_Reader (book_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64D80850A76ED395 ON Book_Reader (user_id)');
        $this->addSql('COMMENT ON COLUMN Book_Reader.id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN Book_Reader.book_id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN Book_Reader.user_id IS \'(DC2Type:id)\'');
        $this->addSql('CREATE TABLE Category (id VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(4096) DEFAULT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN Category.id IS \'(DC2Type:id)\'');
        $this->addSql('CREATE TABLE "User" (id VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "User".id IS \'(DC2Type:id)\'');
        $this->addSql('CREATE TABLE User_Book_Reading_Now (id VARCHAR(255) NOT NULL, user_id VARCHAR(255) DEFAULT NULL, book_id VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9B9217A76ED395 ON User_Book_Reading_Now (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9B921716A2B381 ON User_Book_Reading_Now (book_id)');
        $this->addSql('COMMENT ON COLUMN User_Book_Reading_Now.id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN User_Book_Reading_Now.user_id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN User_Book_Reading_Now.book_id IS \'(DC2Type:id)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE Book_Category ADD CONSTRAINT FK_55BB263B16A2B381 FOREIGN KEY (book_id) REFERENCES Book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE Book_Category ADD CONSTRAINT FK_55BB263B12469DE2 FOREIGN KEY (category_id) REFERENCES Category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE Book_Reader ADD CONSTRAINT FK_64D8085016A2B381 FOREIGN KEY (book_id) REFERENCES Book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE Book_Reader ADD CONSTRAINT FK_64D80850A76ED395 FOREIGN KEY (user_id) REFERENCES "User" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE User_Book_Reading_Now ADD CONSTRAINT FK_E9B9217A76ED395 FOREIGN KEY (user_id) REFERENCES "User" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE User_Book_Reading_Now ADD CONSTRAINT FK_E9B921716A2B381 FOREIGN KEY (book_id) REFERENCES Book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE Book_Category DROP CONSTRAINT FK_55BB263B16A2B381');
        $this->addSql('ALTER TABLE Book_Category DROP CONSTRAINT FK_55BB263B12469DE2');
        $this->addSql('ALTER TABLE Book_Reader DROP CONSTRAINT FK_64D8085016A2B381');
        $this->addSql('ALTER TABLE Book_Reader DROP CONSTRAINT FK_64D80850A76ED395');
        $this->addSql('ALTER TABLE User_Book_Reading_Now DROP CONSTRAINT FK_E9B9217A76ED395');
        $this->addSql('ALTER TABLE User_Book_Reading_Now DROP CONSTRAINT FK_E9B921716A2B381');
        $this->addSql('DROP TABLE Book');
        $this->addSql('DROP TABLE Book_Category');
        $this->addSql('DROP TABLE Book_Reader');
        $this->addSql('DROP TABLE Category');
        $this->addSql('DROP TABLE "User"');
        $this->addSql('DROP TABLE User_Book_Reading_Now');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
