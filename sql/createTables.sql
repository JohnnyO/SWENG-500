
CREATE  TABLE IF NOT EXISTS `mydb`.`Analyst` (
  `analystid` INT NOT NULL ,
  `name` VARCHAR(256) NULL ,
  `company` VARCHAR(256) NULL ,
  PRIMARY KEY (`analystid`) )
ENGINE = InnoDB

CREATE  TABLE IF NOT EXISTS `mydb`.`PredictionAccuracy` (
  `analystid` INT NOT NULL ,
  `week` INT NOT NULL ,
  `position` VARCHAR(3) NOT NULL ,
  `accuracy` FLOAT NULL ,
  `accuracyType` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`analystid`, `week`, `position`, `accuracyType`) ,
  INDEX `FK1_idx` (`analystid` ASC) ,
  CONSTRAINT `FK1`
    FOREIGN KEY (`analystid` )
    REFERENCES `mydb`.`Analyst` (`analystid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB


CREATE  TABLE IF NOT EXISTS `mydb`.`Prediction` (
  `analystid` INT NOT NULL ,
  `playerid` INT NOT NULL ,
  `week` INT NOT NULL ,
  `position` VARCHAR(3) NOT NULL ,
  `rankOrder` INT NOT NULL ,
  PRIMARY KEY (`analystid`, `playerid`, `week`, `position`, `rankOrder`) ,
  INDEX `FK1_idx` (`analystid` ASC) ,
  INDEX `FK2_idx` (`playerid` ASC) ,
  CONSTRAINT `FK1`
    FOREIGN KEY (`analystid` )
    REFERENCES `mydb`.`Analyst` (`analystid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK2`
    FOREIGN KEY (`playerid` )
    REFERENCES `mydb`.`Player` (`playerid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB


CREATE  TABLE IF NOT EXISTS `mydb`.`Player` (
  `playerid` INT NOT NULL ,
  `name` VARCHAR(256) NULL ,
  `team` VARCHAR(256) NULL ,
  `position` VARCHAR(3) NULL ,
  PRIMARY KEY (`playerid`) )
ENGINE = InnoDB

CREATE  TABLE IF NOT EXISTS `mydb`.`ActualResult` (
  `playerid` INT NOT NULL ,
  `position` VARCHAR(3) NOT NULL ,
  `week` INT NOT NULL ,
  `rank` INT NOT NULL ,
  PRIMARY KEY (`playerid`, `position`, `week`, `rank`) ,
  INDEX `FK1_idx` (`playerid` ASC) ,
  CONSTRAINT `FK1`
    FOREIGN KEY (`playerid` )
    REFERENCES `mydb`.`Player` (`playerid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
