<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180907073047 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, birth_date_at DATE DEFAULT NULL, address VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, interest VARCHAR(255) DEFAULT NULL, is_checked TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE account_credit_card (account_id INT NOT NULL, credit_card_id INT NOT NULL, INDEX IDX_C091DBED9B6B5FBA (account_id), INDEX IDX_C091DBED7048FD0F (credit_card_id), PRIMARY KEY(account_id, credit_card_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE credit_card (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, expires_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account_credit_card ADD CONSTRAINT FK_C091DBED9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE account_credit_card ADD CONSTRAINT FK_C091DBED7048FD0F FOREIGN KEY (credit_card_id) REFERENCES credit_card (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE account_credit_card DROP FOREIGN KEY FK_C091DBED9B6B5FBA');
        $this->addSql('ALTER TABLE account_credit_card DROP FOREIGN KEY FK_C091DBED7048FD0F');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE account_credit_card');
        $this->addSql('DROP TABLE credit_card');
    }
}
