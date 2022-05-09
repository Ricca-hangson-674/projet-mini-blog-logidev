CREATE TABLE `nrh_utilisateur` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(255) NOT NULL DEFAULT '0' COLLATE 'utf8_unicode_ci',
	`mot_passe` VARCHAR(255) NOT NULL DEFAULT '0' COLLATE 'utf8_unicode_ci',
	`is_admin` TINYINT(4) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;


CREATE TABLE `nrh_article` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`titre` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`contenu` LONGTEXT NULL COLLATE 'utf8_unicode_ci',
	`date_creation` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`auteur_id` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	INDEX `cle_etrangere_auteur` (`auteur_id`),
	CONSTRAINT `cle_etrangere_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `nrh_utilisateur` (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;


CREATE TABLE `nrh_commentaire` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`contenu` LONGTEXT NULL COLLATE 'utf8_unicode_ci',
	`date_creation` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`auteur_id` INT(11) NOT NULL DEFAULT '0',
	`article_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `cle_etrangere_article` (`article_id`),
	INDEX `cle_etrangere_auteur_1` (`auteur_id`),
	CONSTRAINT `cle_etrangere_article` FOREIGN KEY (`article_id`) REFERENCES `nrh_article` (`id`),
	CONSTRAINT `cle_etrangere_auteur_1` FOREIGN KEY (`auteur_id`) REFERENCES `nrh_utilisateur` (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;

-- admin
insert into nrh_utilisateur(email, mot_passe, is_admin) values
('admin@admin.nrh', '$2y$10$u3lgUhwwdy28FKmFRnIESOonfBv35R3oyOKfR1xzGWozJl7.zaWxm', 1)
;


-- password
insert into nrh_utilisateur(email, mot_passe) values
('joe@email.nrh', '$2y$10$xSGAipgrIIjgdvD0z0eEIOOR5C47VkCNt8tIW5O1z/AfQ2TQd5sm.'),
('jane@email.nrh', '$2y$10$xSGAipgrIIjgdvD0z0eEIOOR5C47VkCNt8tIW5O1z/AfQ2TQd5sm.'),
('test@email.nrh', '$2y$10$xSGAipgrIIjgdvD0z0eEIOOR5C47VkCNt8tIW5O1z/AfQ2TQd5sm.')
;

insert into nrh_article(titre, contenu, date_creation, auteur_id) values
('Titre 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NOW(), 1),
('Titre 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NOW(), 1),
('Titre 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NOW(), 2),
('Titre 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NOW(), 3)
;

insert into nrh_commentaire(contenu, date_creation, auteur_id, article_id) values
('Lorem Ipsum is simply', NOW(), 2, 1),
('dummy text of the printing ', NOW(), 4, 1),
('Lorem Ipsum the printing and typesetting industry', NOW(), 3, 2),
('Lorem Ipsum is simply dummy  industry', NOW(), 4, 2)
;