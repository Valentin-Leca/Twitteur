<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414142548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, twit_id INT DEFAULT NULL, filename VARCHAR(255) NOT NULL, INDEX IDX_C53D045F7A1328EA (twit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reply (id INT AUTO_INCREMENT NOT NULL, twit_id INT NOT NULL, author_id INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_FDA8C6E07A1328EA (twit_id), INDEX IDX_FDA8C6E0F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE twit (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', up_vote INT NOT NULL, INDEX IDX_77F0F3C9F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, registrated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', roles JSON NOT NULL, is_accepted_terms TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F7A1328EA FOREIGN KEY (twit_id) REFERENCES twit (id)');
        $this->addSql('ALTER TABLE reply ADD CONSTRAINT FK_FDA8C6E07A1328EA FOREIGN KEY (twit_id) REFERENCES twit (id)');
        $this->addSql('ALTER TABLE reply ADD CONSTRAINT FK_FDA8C6E0F675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE twit ADD CONSTRAINT FK_77F0F3C9F675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F7A1328EA');
        $this->addSql('ALTER TABLE reply DROP FOREIGN KEY FK_FDA8C6E07A1328EA');
        $this->addSql('ALTER TABLE reply DROP FOREIGN KEY FK_FDA8C6E0F675F31B');
        $this->addSql('ALTER TABLE twit DROP FOREIGN KEY FK_77F0F3C9F675F31B');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE reply');
        $this->addSql('DROP TABLE twit');
        $this->addSql('DROP TABLE `user`');
    }
}
