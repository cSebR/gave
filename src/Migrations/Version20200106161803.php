<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106161803 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, format_id INT NOT NULL, publisher_id INT NOT NULL, category_id INT DEFAULT NULL, cover VARCHAR(255) NOT NULL, back_cover VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, published_date DATETIME NOT NULL, number_of_copies INT NOT NULL, price_ht DOUBLE PRECISION NOT NULL, price_ttc DOUBLE PRECISION NOT NULL, discount_amount DOUBLE PRECISION DEFAULT NULL, discount_type VARCHAR(23) DEFAULT NULL, description LONGTEXT DEFAULT NULL, number_of_pages SMALLINT NOT NULL, ranking DOUBLE PRECISION DEFAULT NULL, isbn10 VARCHAR(255) NOT NULL, isbn13 VARCHAR(255) NOT NULL, asin VARCHAR(255) NOT NULL, dimention VARCHAR(255) DEFAULT NULL, weight VARCHAR(255) DEFAULT NULL, is_available TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_CBE5A331D629F605 (format_id), UNIQUE INDEX UNIQ_CBE5A33140C86FCE (publisher_id), INDEX IDX_CBE5A33112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_author (book_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_9478D34516A2B381 (book_id), INDEX IDX_9478D345F675F31B (author_id), PRIMARY KEY(book_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_theme (book_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_99B7F27116A2B381 (book_id), INDEX IDX_99B7F27159027487 (theme_id), PRIMARY KEY(book_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_line (id INT AUTO_INCREMENT NOT NULL, command_id INT DEFAULT NULL, book_id INT NOT NULL, number INT NOT NULL, INDEX IDX_70BE1A7B33E1689A (command_id), UNIQUE INDEX UNIQ_70BE1A7B16A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction_status (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, billing_address_id INT DEFAULT NULL, shipping_address_id INT DEFAULT NULL, transaction_status_id INT NOT NULL, order_date DATETIME DEFAULT NULL, ship_date DATETIME DEFAULT NULL, is_paid TINYINT(1) NOT NULL, payement_date DATETIME DEFAULT NULL, discount_type VARCHAR(255) DEFAULT NULL, discount_amout DOUBLE PRECISION NOT NULL, total_price_ht DOUBLE PRECISION DEFAULT NULL, toatl_price_ttc DOUBLE PRECISION DEFAULT NULL, delivery_instrucation LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8ECAEAD4A76ED395 (user_id), UNIQUE INDEX UNIQ_8ECAEAD479D0C0E4 (billing_address_id), UNIQUE INDEX UNIQ_8ECAEAD44D4CFF2B (shipping_address_id), UNIQUE INDEX UNIQ_8ECAEAD428D09BFE (transaction_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331D629F605 FOREIGN KEY (format_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33140C86FCE FOREIGN KEY (publisher_id) REFERENCES publisher (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D34516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D345F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_theme ADD CONSTRAINT FK_99B7F27116A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_theme ADD CONSTRAINT FK_99B7F27159027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE command_line ADD CONSTRAINT FK_70BE1A7B33E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE command_line ADD CONSTRAINT FK_70BE1A7B16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD479D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD44D4CFF2B FOREIGN KEY (shipping_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD428D09BFE FOREIGN KEY (transaction_status_id) REFERENCES transaction_status (id)');
        $this->addSql('DROP TABLE editor');
        $this->addSql('DROP TABLE transition_status');
        $this->addSql('ALTER TABLE address ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)');
        $this->addSql('ALTER TABLE credit_card ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE credit_card ADD CONSTRAINT FK_11D627EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_11D627EEA76ED395 ON credit_card (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book_author DROP FOREIGN KEY FK_9478D34516A2B381');
        $this->addSql('ALTER TABLE book_theme DROP FOREIGN KEY FK_99B7F27116A2B381');
        $this->addSql('ALTER TABLE command_line DROP FOREIGN KEY FK_70BE1A7B16A2B381');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD428D09BFE');
        $this->addSql('ALTER TABLE command_line DROP FOREIGN KEY FK_70BE1A7B33E1689A');
        $this->addSql('CREATE TABLE editor (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transition_status (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_author');
        $this->addSql('DROP TABLE book_theme');
        $this->addSql('DROP TABLE command_line');
        $this->addSql('DROP TABLE transaction_status');
        $this->addSql('DROP TABLE command');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('DROP INDEX IDX_D4E6F81A76ED395 ON address');
        $this->addSql('ALTER TABLE address DROP user_id');
        $this->addSql('ALTER TABLE credit_card DROP FOREIGN KEY FK_11D627EEA76ED395');
        $this->addSql('DROP INDEX IDX_11D627EEA76ED395 ON credit_card');
        $this->addSql('ALTER TABLE credit_card DROP user_id');
    }
}
