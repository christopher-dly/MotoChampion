<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117144605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actuality (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name TINYTEXT NOT NULL, title TINYTEXT NOT NULL, content TEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_4093DDD8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycle_part (id INT AUTO_INCREMENT NOT NULL, caster_angle TINYTEXT DEFAULT NULL, caster TINYTEXT DEFAULT NULL, wheelbase TINYTEXT DEFAULT NULL, rim TINYTEXT DEFAULT NULL, frame TINYTEXT DEFAULT NULL, front_suspension TINYTEXT DEFAULT NULL, rear_suspension TINYTEXT DEFAULT NULL, frontbrake TINYTEXT DEFAULT NULL, rearbrake TINYTEXT DEFAULT NULL, front_wheel TINYTEXT DEFAULT NULL, rear_wheel TINYTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dimension (id INT AUTO_INCREMENT NOT NULL, length INT DEFAULT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, saddle_height INT DEFAULT NULL, ground_clearance INT DEFAULT NULL, gas INT DEFAULT NULL, oil INT DEFAULT NULL, weight INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, type TINYTEXT DEFAULT NULL, cylinders INT DEFAULT NULL, bore_x_stroke TINYTEXT DEFAULT NULL, volumetric_ratio TINYTEXT DEFAULT NULL, announced_power TINYTEXT DEFAULT NULL, couple_announced TINYTEXT DEFAULT NULL, power_supply TINYTEXT DEFAULT NULL, starter TINYTEXT DEFAULT NULL, consumption TINYTEXT DEFAULT NULL, co2_emissions TINYTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, brand TINYTEXT NOT NULL, model TINYTEXT NOT NULL, category TINYTEXT NOT NULL, cylinders INT NOT NULL, price INT NOT NULL, warranty_time TINYTEXT NOT NULL, description TEXT NOT NULL, available_for_trial TINYINT(1) NOT NULL, license JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, message_sender VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE new_vehicle (id INT AUTO_INCREMENT NOT NULL, technical_sheet_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C0C3B7683718C91A (technical_sheet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technical_sheet (id INT AUTO_INCREMENT NOT NULL, cycle_part_id INT DEFAULT NULL, dimension_id INT DEFAULT NULL, engine_id INT DEFAULT NULL, information_id INT DEFAULT NULL, transmission_id INT DEFAULT NULL, INDEX IDX_68C584864C3EEEA3 (cycle_part_id), INDEX IDX_68C58486277428AD (dimension_id), INDEX IDX_68C58486E78C9C0A (engine_id), INDEX IDX_68C584862EF03101 (information_id), INDEX IDX_68C5848678D28519 (transmission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, primary_transmission TINYTEXT DEFAULT NULL, secondary_transmission TINYTEXT DEFAULT NULL, clutch TINYTEXT DEFAULT NULL, command TINYTEXT DEFAULT NULL, gearbox TINYTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE used_vehicle (id INT AUTO_INCREMENT NOT NULL, brand TINYTEXT NOT NULL, model TINYTEXT NOT NULL, category TINYTEXT NOT NULL, cylinders TINYTEXT NOT NULL, price TINYTEXT NOT NULL, warranty_time TINYTEXT NOT NULL, description TINYTEXT NOT NULL, available_for_trial TINYTEXT NOT NULL, color TINYTEXT NOT NULL, image TINYTEXT NOT NULL, year TINYTEXT NOT NULL, kilometers TINYTEXT NOT NULL, miles TINYTEXT NOT NULL, tax_power TINYTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username TINYTEXT NOT NULL, password TINYTEXT NOT NULL, email TINYTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actuality ADD CONSTRAINT FK_4093DDD8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE new_vehicle ADD CONSTRAINT FK_C0C3B7683718C91A FOREIGN KEY (technical_sheet_id) REFERENCES technical_sheet (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C584864C3EEEA3 FOREIGN KEY (cycle_part_id) REFERENCES cycle_part (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C58486277428AD FOREIGN KEY (dimension_id) REFERENCES dimension (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C58486E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C584862EF03101 FOREIGN KEY (information_id) REFERENCES information (id)');
        $this->addSql('ALTER TABLE technical_sheet ADD CONSTRAINT FK_68C5848678D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actuality DROP FOREIGN KEY FK_4093DDD8A76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE new_vehicle DROP FOREIGN KEY FK_C0C3B7683718C91A');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C584864C3EEEA3');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C58486277428AD');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C58486E78C9C0A');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C584862EF03101');
        $this->addSql('ALTER TABLE technical_sheet DROP FOREIGN KEY FK_68C5848678D28519');
        $this->addSql('DROP TABLE actuality');
        $this->addSql('DROP TABLE cycle_part');
        $this->addSql('DROP TABLE dimension');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE new_vehicle');
        $this->addSql('DROP TABLE technical_sheet');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE used_vehicle');
        $this->addSql('DROP TABLE user');
    }
}
