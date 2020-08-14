<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200814091636 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee CHANGE status status enum(\'stock_manager\', \'salesperson\', \'business_salesperson\' )');
        $this->addSql('ALTER TABLE `order` CHANGE status status enum(\'cart\', \'pending\', \'paid\', \'canceled\', \'disputed\', \'refunded\')');
        $this->addSql('ALTER TABLE payment ADD oder_id INT NOT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D65AB5B96 FOREIGN KEY (oder_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_6D28840D65AB5B96 ON payment (oder_id)');
        $this->addSql('ALTER TABLE product CHANGE status status enum(\'in_stock\', \'out_of_stock\', \'discontinued\')');
        $this->addSql('ALTER TABLE shipping ADD order_id INT NOT NULL');
        $this->addSql('ALTER TABLE shipping ADD CONSTRAINT FK_2D1C1724FCDAEAAA FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_2D1C1724FCDAEAAA ON shipping (order_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D65AB5B96');
        $this->addSql('DROP INDEX IDX_6D28840D65AB5B96 ON payment');
        $this->addSql('ALTER TABLE payment DROP oder_id');
        $this->addSql('ALTER TABLE product CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE shipping DROP FOREIGN KEY FK_2D1C1724FCDAEAAA');
        $this->addSql('DROP INDEX IDX_2D1C1724FCDAEAAA ON shipping');
        $this->addSql('ALTER TABLE shipping DROP order_id');
    }
}
