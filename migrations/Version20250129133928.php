<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129133928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actuality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, title VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, username VARCHAR(50) NOT NULL, password VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycle_part (id INT AUTO_INCREMENT NOT NULL, caster_angle DOUBLE PRECISION DEFAULT NULL, caster DOUBLE PRECISION DEFAULT NULL, wheelbase DOUBLE PRECISION DEFAULT NULL, rim VARCHAR(255) DEFAULT NULL, frame VARCHAR(255) DEFAULT NULL, front_suspension VARCHAR(255) DEFAULT NULL, rear_suspension VARCHAR(255) DEFAULT NULL, front_brake VARCHAR(255) DEFAULT NULL, rear_brake VARCHAR(255) DEFAULT NULL, front_wheel VARCHAR(255) DEFAULT NULL, rear_wheel VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dimension (id INT AUTO_INCREMENT NOT NULL, length INT DEFAULT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, saddle_height INT DEFAULT NULL, ground_clearance INT DEFAULT NULL, gas DOUBLE PRECISION DEFAULT NULL, oil DOUBLE PRECISION DEFAULT NULL, weight INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, cylinders INT DEFAULT NULL, bore_x_stroke VARCHAR(50) DEFAULT NULL, volumetric_ratio VARCHAR(50) DEFAULT NULL, announced_power VARCHAR(150) DEFAULT NULL, couple_announced VARCHAR(150) DEFAULT NULL, power_supply VARCHAR(100) DEFAULT NULL, starter VARCHAR(100) DEFAULT NULL, consumption VARCHAR(100) DEFAULT NULL, co2_emissions VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(50) NOT NULL, model VARCHAR(50) NOT NULL, category VARCHAR(50) NOT NULL, cylinders INT NOT NULL, price DOUBLE PRECISION NOT NULL, warranty_time INT NOT NULL, description LONGTEXT NOT NULL, available_for_trial TINYINT(1) NOT NULL, license JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, message_sender VARCHAR(50) NOT NULL, phone_number VARCHAR(20) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE new_vehicle (id INT AUTO_INCREMENT NOT NULL, cycle_part_id INT DEFAULT NULL, dimension_id INT DEFAULT NULL, engine_id INT DEFAULT NULL, information_id INT DEFAULT NULL, transmission_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_C0C3B7684C3EEEA3 (cycle_part_id), INDEX IDX_C0C3B768277428AD (dimension_id), INDEX IDX_C0C3B768E78C9C0A (engine_id), INDEX IDX_C0C3B7682EF03101 (information_id), INDEX IDX_C0C3B76878D28519 (transmission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, primary_transmission VARCHAR(255) DEFAULT NULL, secondary_transmission VARCHAR(255) DEFAULT NULL, clutch VARCHAR(255) DEFAULT NULL, command VARCHAR(255) DEFAULT NULL, gearbox VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE used_vehicle (id INT AUTO_INCREMENT NOT NULL, image_used_vehicle VARCHAR(100) NOT NULL, brand VARCHAR(50) NOT NULL, model VARCHAR(50) NOT NULL, category VARCHAR(50) NOT NULL, cylinders INT NOT NULL, price DOUBLE PRECISION NOT NULL, warranty_time INT NOT NULL, description LONGTEXT NOT NULL, available_for_trial TINYINT(1) NOT NULL, color VARCHAR(50) NOT NULL, year INT NOT NULL, kilometers INT NOT NULL, energy_tax INT NOT NULL, tax_power INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_image (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE new_vehicle ADD CONSTRAINT FK_C0C3B7684C3EEEA3 FOREIGN KEY (cycle_part_id) REFERENCES cycle_part (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE new_vehicle ADD CONSTRAINT FK_C0C3B768277428AD FOREIGN KEY (dimension_id) REFERENCES dimension (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE new_vehicle ADD CONSTRAINT FK_C0C3B768E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE new_vehicle ADD CONSTRAINT FK_C0C3B7682EF03101 FOREIGN KEY (information_id) REFERENCES information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE new_vehicle ADD CONSTRAINT FK_C0C3B76878D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE new_vehicle DROP FOREIGN KEY FK_C0C3B7684C3EEEA3');
        $this->addSql('ALTER TABLE new_vehicle DROP FOREIGN KEY FK_C0C3B768277428AD');
        $this->addSql('ALTER TABLE new_vehicle DROP FOREIGN KEY FK_C0C3B768E78C9C0A');
        $this->addSql('ALTER TABLE new_vehicle DROP FOREIGN KEY FK_C0C3B7682EF03101');
        $this->addSql('ALTER TABLE new_vehicle DROP FOREIGN KEY FK_C0C3B76878D28519');
        $this->addSql('DROP TABLE actuality');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE cycle_part');
        $this->addSql('DROP TABLE dimension');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE new_vehicle');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE used_vehicle');
        $this->addSql('DROP TABLE vehicle_image');
    }
}
