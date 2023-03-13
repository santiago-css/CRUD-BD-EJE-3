CREATE DATABASE `ecommerce`;
USE `ecommerce`;

CREATE TABLE `Tab_Rol` (
    `Rol_Id` INT NOT NULL,
    `Rol_Name` VARCHAR(30),
    PRIMARY KEY (`Rol_Id`)
);

INSERT INTO `Tab_Rol` (`Rol_Id`, `Rol_Name`)
VALUES (1, 'Administrador'), (2, 'Cliente');

CREATE TABLE `Tab_User` (
    `Use_Id` INT NOT NULL AUTO_INCREMENT,
    `Use_Name` VARCHAR(255),
    `Use_Email` VARCHAR(255),
    `Use_Password` VARCHAR(255),
    `Use_Id_Rol` INT NOT NULL,
    PRIMARY KEY (`Use_Id`),
    CONSTRAINT `FK_Rol` FOREIGN KEY (`Use_Id_Rol`) REFERENCES `Tab_Rol` (`Rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Tab_Product` (
    `Pro_Id` INT NOT NULL AUTO_INCREMENT,
    `Pro_Name` VARCHAR(255),
    `Pro_Description` VARCHAR(255),
    `Pro_Cost` DECIMAL,
    PRIMARY KEY (`Pro_Id`)
);

CREATE TABLE `Tab_Payment` (
    `Pay_Id` INT NOT NULL AUTO_INCREMENT,
    `Pay_Id_Use` INT,
    `Pay_Id_Pro` INT,
    `Pay_Date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`Pay_Id`),
    CONSTRAINT `FK_Id_User` FOREIGN KEY (`Pay_Id_Use`) REFERENCES `Tab_User` (`Use_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `FK_Id_Pro` FOREIGN KEY (`Pay_Id_Pro`) REFERENCES `Tab_Product` (`Pro_Id`) ON DELETE CASCADE ON UPDATE CASCADE
);