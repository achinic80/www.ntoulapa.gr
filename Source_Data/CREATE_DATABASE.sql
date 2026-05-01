
--
-- Table structure for table `sil_people`
--
DROP TABLE IF EXISTS `sillogos_people`;
CREATE TABLE IF NOT EXISTS `sillogos_people` (
  `ID` int NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `surname` varchar(120) DEFAULT NULL,
  `fathername` varchar(80) DEFAULT NULL,
  `occupation` varchar(120) DEFAULT NULL,
  `dateofbirth` datetime DEFAULT NULL,
  `dateofrecord` varchar(180) DEFAULT NULL,
  `category` varchar(180) DEFAULT NULL,
  `simetoxiseGS` int ,

  `address1` varchar(180) DEFAULT NULL,
  `zip1` varchar(80) DEFAULT NULL,
  `city1` varchar(80) DEFAULT NULL,
  `phone1` varchar(80) DEFAULT NULL,
  `phone2` varchar(80) DEFAULT NULL,

  `address2` varchar(180) DEFAULT NULL,
  `zip2` varchar(80) DEFAULT NULL,
  `city2` varchar(80) DEFAULT NULL,
  `phone3` varchar(80) DEFAULT NULL,
  `phone4` varchar(80) DEFAULT NULL,
  `telefax/fax` varchar(180) DEFAULT NULL,
  `ipoloipo` varchar(180) DEFAULT NULL,
  `email` varchar(180) DEFAULT NULL,
  `bea` varchar(10) DEFAULT NULL,
  `ebea` varchar(10) DEFAULT NULL,
  `diegrameno` int DEFAULT NULL,
  `dateofdelete` datetime  DEFAULT NULL,
  `apofasidelete` varchar(180) DEFAULT NULL,
  `logsxedio` varchar(180) DEFAULT NULL,
  `notes` LONGTEXT DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='utf8mb4_unicode_ci';


DROP TABLE IF EXISTS `sillogos_kiniseis`;
CREATE TABLE IF NOT EXISTS `sillogos_kiniseis` (
  `ck_ID` int NOT NULL AUTO_INCREMENT,
  `ck_Date` DATETIME NULL, 
  `ck_DateNum` int DEFAULT NULL,    
  `ck_CusSupCode` varchar(8) DEFAULT NULL,
  `ck_Parastatiko` varchar(80) DEFAULT NULL,  
  `ck_Aitiologia` varchar(80) DEFAULT NULL,   
  `ck_Poso` decimal(10,2)   DEFAULT 0,   
  `ck_kk` varchar(80) DEFAULT NULL,   
  `ck_Sale_A` varchar(80) DEFAULT NULL,   
  `ck_CusSup` varchar(80) DEFAULT NULL,   
  `ck_year` int NULL,
  PRIMARY KEY (`ck_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='utf8mb4_unicode_ci';

