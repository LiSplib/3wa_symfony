<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412105512 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INT NOT NULL, address VARCHAR(255) NOT NULL, zip_code VARCHAR(6) NOT NULL, city VARCHAR(120) NOT NULL, birthday DATE NOT NULL, children INT DEFAULT NULL, registration_date DATE NOT NULL, up_to_date_fee TINYINT(1) NOT NULL, avatar VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherent_animation (adherent_id INT NOT NULL, animation_id INT NOT NULL, INDEX IDX_E085E5E825F06C53 (adherent_id), INDEX IDX_E085E5E83858647E (animation_id), PRIMARY KEY(adherent_id, animation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherent_media (adherent_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_6926BC1025F06C53 (adherent_id), INDEX IDX_6926BC10EA9FDD75 (media_id), PRIMARY KEY(adherent_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adhesion (id INT AUTO_INCREMENT NOT NULL, children INT DEFAULT NULL, age INT DEFAULT NULL, status INT NOT NULL, working_status INT NOT NULL, salary DOUBLE PRECISION NOT NULL, resident INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animation (id INT AUTO_INCREMENT NOT NULL, organized_by_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, title VARCHAR(255) NOT NULL, capacity INT NOT NULL, is_public TINYINT(1) NOT NULL, INDEX IDX_8D5284DC36217ECD (organized_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, pages INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cd (id INT NOT NULL, plages INT NOT NULL, duration TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, written_by_id INT DEFAULT NULL, is_about_id INT DEFAULT NULL, message LONGTEXT NOT NULL, publication_date DATETIME NOT NULL, title VARCHAR(40) NOT NULL, likes INT NOT NULL, INDEX IDX_9474526CAB69C8EF (written_by_id), INDEX IDX_9474526C452EAD5D (is_about_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contributor (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, death_date DATE DEFAULT NULL, biography LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contributor_animation (contributor_id INT NOT NULL, animation_id INT NOT NULL, INDEX IDX_42DED7C07A19A357 (contributor_id), INDEX IDX_42DED7C03858647E (animation_id), PRIMARY KEY(contributor_id, animation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dvd (id INT NOT NULL, format VARCHAR(50) NOT NULL, duration TIME NOT NULL, bonus TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT NOT NULL, office VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal (id INT NOT NULL, periodicite INT NOT NULL, language VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE library (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, contact_mail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `media` (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, support INT NOT NULL, acquisition_date DATETIME NOT NULL, genre VARCHAR(50) NOT NULL, cote VARCHAR(50) NOT NULL, illustration VARCHAR(255) NOT NULL, presentation LONGTEXT NOT NULL, mediaType VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_adherent (media_id INT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_9FB2DED2EA9FDD75 (media_id), INDEX IDX_9FB2DED225F06C53 (adherent_id), PRIMARY KEY(media_id, adherent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_user (media_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_4ED4099AEA9FDD75 (media_id), INDEX IDX_4ED4099AA76ED395 (user_id), PRIMARY KEY(media_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_adherents (id INT AUTO_INCREMENT NOT NULL, has_for_adherent_id INT DEFAULT NULL, has_for_media_id INT DEFAULT NULL, borrowing_date DATE NOT NULL, estimated_return_date DATE NOT NULL, effective_return_date DATE NOT NULL, reservation TINYINT(1) NOT NULL, INDEX IDX_734CCE2DA19C710D (has_for_adherent_id), INDEX IDX_734CCE2D3171C144 (has_for_media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_contributor (id INT AUTO_INCREMENT NOT NULL, has_for_contributor_id INT DEFAULT NULL, has_for_media_id INT DEFAULT NULL, role VARCHAR(50) NOT NULL, INDEX IDX_2D07E500A753E106 (has_for_contributor_id), INDEX IDX_2D07E5003171C144 (has_for_media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE penalty (id INT AUTO_INCREMENT NOT NULL, notification_date DATE NOT NULL, status INT NOT NULL, pending TINYINT(1) NOT NULL, amount DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resource (id INT AUTO_INCREMENT NOT NULL, related_to_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_BC91F41640B4AC4E (related_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suggestion (id INT AUTO_INCREMENT NOT NULL, suggests_id INT DEFAULT NULL, message LONGTEXT NOT NULL, pubication_date DATE NOT NULL, title VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_DD80F31B46EBC77F (suggests_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(40) NOT NULL, last_name VARCHAR(40) NOT NULL, phone_number INT DEFAULT NULL, user_name VARCHAR(40) NOT NULL, userType VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent_animation ADD CONSTRAINT FK_E085E5E825F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent_animation ADD CONSTRAINT FK_E085E5E83858647E FOREIGN KEY (animation_id) REFERENCES animation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent_media ADD CONSTRAINT FK_6926BC1025F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent_media ADD CONSTRAINT FK_6926BC10EA9FDD75 FOREIGN KEY (media_id) REFERENCES `media` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animation ADD CONSTRAINT FK_8D5284DC36217ECD FOREIGN KEY (organized_by_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331BF396750 FOREIGN KEY (id) REFERENCES `media` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cd ADD CONSTRAINT FK_45D68FDABF396750 FOREIGN KEY (id) REFERENCES `media` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CAB69C8EF FOREIGN KEY (written_by_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C452EAD5D FOREIGN KEY (is_about_id) REFERENCES `media` (id)');
        $this->addSql('ALTER TABLE contributor_animation ADD CONSTRAINT FK_42DED7C07A19A357 FOREIGN KEY (contributor_id) REFERENCES contributor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contributor_animation ADD CONSTRAINT FK_42DED7C03858647E FOREIGN KEY (animation_id) REFERENCES animation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dvd ADD CONSTRAINT FK_8325C1DFBF396750 FOREIGN KEY (id) REFERENCES `media` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE journal ADD CONSTRAINT FK_C1A7E74DBF396750 FOREIGN KEY (id) REFERENCES `media` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_adherent ADD CONSTRAINT FK_9FB2DED2EA9FDD75 FOREIGN KEY (media_id) REFERENCES `media` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_adherent ADD CONSTRAINT FK_9FB2DED225F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_user ADD CONSTRAINT FK_4ED4099AEA9FDD75 FOREIGN KEY (media_id) REFERENCES `media` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_user ADD CONSTRAINT FK_4ED4099AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_adherents ADD CONSTRAINT FK_734CCE2DA19C710D FOREIGN KEY (has_for_adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE media_adherents ADD CONSTRAINT FK_734CCE2D3171C144 FOREIGN KEY (has_for_media_id) REFERENCES `media` (id)');
        $this->addSql('ALTER TABLE media_contributor ADD CONSTRAINT FK_2D07E500A753E106 FOREIGN KEY (has_for_contributor_id) REFERENCES contributor (id)');
        $this->addSql('ALTER TABLE media_contributor ADD CONSTRAINT FK_2D07E5003171C144 FOREIGN KEY (has_for_media_id) REFERENCES `media` (id)');
        $this->addSql('ALTER TABLE resource ADD CONSTRAINT FK_BC91F41640B4AC4E FOREIGN KEY (related_to_id) REFERENCES `media` (id)');
        $this->addSql('ALTER TABLE suggestion ADD CONSTRAINT FK_DD80F31B46EBC77F FOREIGN KEY (suggests_id) REFERENCES adherent (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent_animation DROP FOREIGN KEY FK_E085E5E825F06C53');
        $this->addSql('ALTER TABLE adherent_media DROP FOREIGN KEY FK_6926BC1025F06C53');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CAB69C8EF');
        $this->addSql('ALTER TABLE media_adherent DROP FOREIGN KEY FK_9FB2DED225F06C53');
        $this->addSql('ALTER TABLE media_adherents DROP FOREIGN KEY FK_734CCE2DA19C710D');
        $this->addSql('ALTER TABLE suggestion DROP FOREIGN KEY FK_DD80F31B46EBC77F');
        $this->addSql('ALTER TABLE adherent_animation DROP FOREIGN KEY FK_E085E5E83858647E');
        $this->addSql('ALTER TABLE contributor_animation DROP FOREIGN KEY FK_42DED7C03858647E');
        $this->addSql('ALTER TABLE contributor_animation DROP FOREIGN KEY FK_42DED7C07A19A357');
        $this->addSql('ALTER TABLE media_contributor DROP FOREIGN KEY FK_2D07E500A753E106');
        $this->addSql('ALTER TABLE animation DROP FOREIGN KEY FK_8D5284DC36217ECD');
        $this->addSql('ALTER TABLE adherent_media DROP FOREIGN KEY FK_6926BC10EA9FDD75');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331BF396750');
        $this->addSql('ALTER TABLE cd DROP FOREIGN KEY FK_45D68FDABF396750');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C452EAD5D');
        $this->addSql('ALTER TABLE dvd DROP FOREIGN KEY FK_8325C1DFBF396750');
        $this->addSql('ALTER TABLE journal DROP FOREIGN KEY FK_C1A7E74DBF396750');
        $this->addSql('ALTER TABLE media_adherent DROP FOREIGN KEY FK_9FB2DED2EA9FDD75');
        $this->addSql('ALTER TABLE media_user DROP FOREIGN KEY FK_4ED4099AEA9FDD75');
        $this->addSql('ALTER TABLE media_adherents DROP FOREIGN KEY FK_734CCE2D3171C144');
        $this->addSql('ALTER TABLE media_contributor DROP FOREIGN KEY FK_2D07E5003171C144');
        $this->addSql('ALTER TABLE resource DROP FOREIGN KEY FK_BC91F41640B4AC4E');
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F060BF396750');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1BF396750');
        $this->addSql('ALTER TABLE media_user DROP FOREIGN KEY FK_4ED4099AA76ED395');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE adherent_animation');
        $this->addSql('DROP TABLE adherent_media');
        $this->addSql('DROP TABLE adhesion');
        $this->addSql('DROP TABLE animation');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE cd');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contributor');
        $this->addSql('DROP TABLE contributor_animation');
        $this->addSql('DROP TABLE dvd');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE journal');
        $this->addSql('DROP TABLE library');
        $this->addSql('DROP TABLE `media`');
        $this->addSql('DROP TABLE media_adherent');
        $this->addSql('DROP TABLE media_user');
        $this->addSql('DROP TABLE media_adherents');
        $this->addSql('DROP TABLE media_contributor');
        $this->addSql('DROP TABLE penalty');
        $this->addSql('DROP TABLE resource');
        $this->addSql('DROP TABLE suggestion');
        $this->addSql('DROP TABLE `user`');
    }
}
