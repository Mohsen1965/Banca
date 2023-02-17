<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230209160245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_roles DROP FOREIGN KEY FK_54FCD59F88987678');
        $this->addSql('ALTER TABLE user_roles DROP FOREIGN KEY FK_54FCD59F9D86650F');
        $this->addSql('DROP INDEX IDX_54FCD59F9D86650F ON user_roles');
        $this->addSql('DROP INDEX IDX_54FCD59F88987678 ON user_roles');
        $this->addSql('ALTER TABLE user_roles ADD user_id INT NOT NULL, ADD role_id INT NOT NULL, DROP user_id_id, DROP role_id_id');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59FD60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('CREATE INDEX IDX_54FCD59FA76ED395 ON user_roles (user_id)');
        $this->addSql('CREATE INDEX IDX_54FCD59FD60322AC ON user_roles (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_roles DROP FOREIGN KEY FK_54FCD59FA76ED395');
        $this->addSql('ALTER TABLE user_roles DROP FOREIGN KEY FK_54FCD59FD60322AC');
        $this->addSql('DROP INDEX IDX_54FCD59FA76ED395 ON user_roles');
        $this->addSql('DROP INDEX IDX_54FCD59FD60322AC ON user_roles');
        $this->addSql('ALTER TABLE user_roles ADD user_id_id INT NOT NULL, ADD role_id_id INT NOT NULL, DROP user_id, DROP role_id');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59F88987678 FOREIGN KEY (role_id_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59F9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_54FCD59F9D86650F ON user_roles (user_id_id)');
        $this->addSql('CREATE INDEX IDX_54FCD59F88987678 ON user_roles (role_id_id)');
    }
}
