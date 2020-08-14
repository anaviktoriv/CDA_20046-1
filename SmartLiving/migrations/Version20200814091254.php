<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200814091254 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer_credit_card (customer_id INT NOT NULL, credit_card_id INT NOT NULL, INDEX IDX_129D0CE69395C3F3 (customer_id), INDEX IDX_129D0CE67048FD0F (credit_card_id), PRIMARY KEY(customer_id, credit_card_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_credit_card ADD CONSTRAINT FK_129D0CE69395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer_credit_card ADD CONSTRAINT FK_129D0CE67048FD0F FOREIGN KEY (credit_card_id) REFERENCES credit_card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employee CHANGE status status enum(\'stock_manager\', \'salesperson\', \'business_salesperson\' )');
        $this->addSql('ALTER TABLE `order` CHANGE status status enum(\'cart\', \'pending\', \'paid\', \'canceled\', \'disputed\', \'refunded\')');
        $this->addSql('ALTER TABLE product CHANGE status status enum(\'in_stock\', \'out_of_stock\', \'discontinued\')');
        $this->addSql('ALTER TABLE user ADD customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6499395C3F3 ON user (customer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE customer_credit_card');
        $this->addSql('ALTER TABLE employee CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499395C3F3');
        $this->addSql('DROP INDEX UNIQ_8D93D6499395C3F3 ON user');
        $this->addSql('ALTER TABLE user DROP customer_id');
    }
}
