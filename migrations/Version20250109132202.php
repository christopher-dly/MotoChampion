<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109132202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actuality (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_4093DDD8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycle_part (id INT AUTO_INCREMENT NOT NULL, caster_angle VARCHAR(255) NOT NULL, caster VARCHAR(255) NOT NULL, wheelbase VARCHAR(255) NOT NULL, front_suspension VARCHAR(255) NOT NULL, rear_suspension VARCHAR(255) NOT NULL, frontbrake VARCHAR(255) NOT NULL, rearbrake VARCHAR(255) NOT NULL, front_wheel VARCHAR(255) NOT NULL, rear_wheel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dimension (id INT AUTO_INCREMENT NOT NULL, wxlx_h VARCHAR(255) NOT NULL, saddle_height VARCHAR(255) NOT NULL, ground_clearance VARCHAR(255) NOT NULL, gas VARCHAR(255) NOT NULL, weight VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, cylinders VARCHAR(255) NOT NULL, bore_x_stroke VARCHAR(255) NOT NULL, volumetric_ratio VARCHAR(255) NOT NULL, announced_power VARCHAR(255) NOT NULL, couple_announced VARCHAR(255) NOT NULL, power_supply VARCHAR(255) NOT NULL, starter VARCHAR(255) NOT NULL, consumption VARCHAR(255) NOT NULL, co2_emissions VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, color1 VARCHAR(255) NOT NULL, color2 VARCHAR(255) NOT NULL, color3 VARCHAR(255) NOT NULL, color4 VARCHAR(255) NOT NULL, color5 VARCHAR(255) NOT NULL, color_action VARCHAR(255) NOT NULL, img_color1 VARCHAR(255) NOT NULL, img_color2 VARCHAR(255) NOT NULL, img_color3 VARCHAR(255) NOT NULL, img_color4 VARCHAR(255) NOT NULL, img_color5 VARCHAR(255) NOT NULL, img_action VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, cylinders VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, warranty_time VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, available_for_trial TINYINT(1) NOT NULL, license VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, message_sender VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE new_vehicle (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technical_sheet (id INT AUTO_INCREMENT NOT NULL, cycle_part_id INT DEFAULT NULL, dimension_id INT DEFAULT NULL, engine_id INT DEFAULT NULL, image_id INT DEFAULT NULL, information_id INT DEFAULT NULL, transmission_id INT DEFAULT NULL, INDEX IDX_68C584864C3EEEA3 (cycle_part_id), INDEX IDX_68C58486277428AD (dimension_id), INDEX IDX_68C58486E78C9C0A (engine_id), INDEX IDX_68C584863DA5256D (image_id), INDEX IDX_68C584862EF03101 (information_id), INDEX IDX_68C5848678D28519 (transmission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, gearbox VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE used_vehicle (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, cylinders VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, warranty_time VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, available_for_trial TINYINT(1) NOT NULL, color VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, kilometers VARCHAR(255) NOT NULL, miles VARCHAR(255) NOT NULL, tax_power VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actuality ADD CONSTRAINT FK_4093DDD8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C584864C3EEEA3 FOREIGN KEY (cycle_part_id) REFERENCES cycle_part (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C58486277428AD FOREIGN KEY (dimension_id) REFERENCES dimension (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C58486E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C584863DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C584862EF03101 FOREIGN KEY (information_id) REFERENCES information (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C5848678D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actuality DROP FOREIGN KEY FK_4093DDD8A76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C584864C3EEEA3');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C58486277428AD');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C58486E78C9C0A');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C584863DA5256D');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C584862EF03101');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C5848678D28519');
        $this->addSql('DROP TABLE actuality');
        $this->addSql('DROP TABLE cycle_part');
        $this->addSql('DROP TABLE dimension');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE new_vehicle');
        $this->addSql('DROP TABLE technical_sheet');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE used_vehicle');
        $this->addSql('DROP TABLE user');
    }
}
