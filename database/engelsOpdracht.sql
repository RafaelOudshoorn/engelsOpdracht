-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema engelsopdracht
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema engelsopdracht
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `engelsopdracht` DEFAULT CHARACTER SET latin1 ;
USE `engelsopdracht` ;

-- -----------------------------------------------------
-- Table `engelsopdracht`.`answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `engelsopdracht`.`answers` (
  `id_answers` INT(11) NOT NULL AUTO_INCREMENT,
  `id_test` INT(11) NOT NULL,
  `id_questions` INT(11) NOT NULL,
  `user_id` VARCHAR(45) NOT NULL,
  `user_answers` VARCHAR(45) NULL DEFAULT NULL,
  `questions` VARCHAR(45) NOT NULL,
  `grade` INT(11) NULL DEFAULT NULL,
  `date_of_test` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_answers`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `engelsopdracht`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `engelsopdracht`.`questions` (
  `id_questions` INT(11) NOT NULL AUTO_INCREMENT,
  `question` TEXT NOT NULL,
  `answer` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_questions`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `engelsopdracht`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `engelsopdracht`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(45) NOT NULL,
  `password` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_name_UNIQUE` (`user_name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `engelsopdracht`.`questions`
-- -----------------------------------------------------
START TRANSACTION;
USE `engelsopdracht`;
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('Have you tried any new restaurants or cafes ....?', 'recently');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('What\'s your .... thing to do in your free time?', 'favorite');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('I have a different .... on this.', 'perspective');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('Let\'s ..... ideas for the upcoming campaign.', 'brainstorm');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('Can you explain this .... to me again?', 'concept');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('The school bus is .... outside.', 'waiting');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('It\'s going to be a .... chilly later.', 'bit');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('Can you send me the .... to that article?', 'link');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('Can you .... any good restaurants in the area?', 'recommend');
INSERT INTO `engelsopdracht`.`questions` (`question`, `answer`) VALUES ('Is it safe to walk .... at night?', 'alone');

COMMIT;


-- -----------------------------------------------------
-- Data for table `engelsopdracht`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `engelsopdracht`;
INSERT INTO `engelsopdracht`.`users` (`user_name`, `password`) VALUES ('guest', '$2y$10$XdcNIDaL3RZfhVOyO/MzP.5e54HJjDe3OAgpLbrMxeH1y/uTSy6I6');

COMMIT;

