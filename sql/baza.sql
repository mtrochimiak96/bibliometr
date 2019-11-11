
CREATE TABLE `article` (
  `id_article` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `doi` INT(11) NOT NULL,
  `minipoint` INT(11),
  `conference` VARCHAR(80),
  `publicdate` DATE,
  `author` INT(11) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_polish_ci;


CREATE TABLE `authors` (
   `id_authors` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
   `name` INT(11) NOT NULL,
   `surname` INT(11) NOT NULL,
   `participation` VARCHAR(10) NOT NULL,
   `numberofarticles` INT(10) NOT NULL,
   PRIMARY KEY (`id_authors`)
);

CREATE TABLE `users` (
     `id_user` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
     `email` VARCHAR(50) NOT NULL,
     `name` VARCHAR(20) NOT NULL,
     `surname` VARCHAR(50) NOT NULL,
     `password` VARCHAR(20),
     `affilation` VARCHAR(50) NOT NULL,
     PRIMARY KEY (`id_user`)
);


