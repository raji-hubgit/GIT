--
-- Table creation for table `employee_tbl`
--

CREATE TABLE IF NOT EXISTS `employee_tbl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Age` int NOT NULL,
  `Office` varchar(255) NOT NULL,
  `Joined_Date` Date,
  `Salary` int NOT NULL, 
  `Email` varchar(255) NOT NULL,
  `Phone_Number` BIGINT NOT NULL,  
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Zip` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`Name`, `Age`,`Office`,`Joined_Date`,`Salary`,`Email`,`Phone_Number`,`City`,`Country`,`Zip`) VALUES
('Alex' , 32,'HCl','2012-09-09','61000','alex@hcl.com',9085643789,'Chennai','India',600015),
('William' , 39,'USAA','2000-09-09','31000','wills@usaa.com',435678239,'USA','USA',4536),
('Lisa' , 41,'Statestreet','2007-09-11','41000','lisa@ss.com',435678089,'Canada','USA',23015),
('Meera' , 50,'TCS','2017-02-01','27750','meera@tcs.com',9085643789,'Chennai','India',600004),
('Dev' , 53,'Infosys','2012-09-09','45000','dev@infosys.com',8978641234,'Fiji','Australia',6015),
('Richard' , 22,'Infosys','2017-03-03','49000','richard@infosys.com',7889673789,'Afghan','Afghanisthan',45615),
('Donald' , 29,'HCl','2012-09-09','35000','donald@hcl.com',9876543219,'Colombo','Sri Lanka',345615),
('Andrew' , 33,'USAA','2017-02-01','40000','andrew@usaa.com',7867655443,'mexico','mexico',234),
('Harsh' , 50,'Ziffity','2012-09-09','31000','harsh@ziffity.com',7689543212,'Chennai','India',600015),
('Susen' , 20,'USAA','2021-02-01','31000','susen@usaa.com',9078563412,'london','england',615),
('Hedrick' , 48,'TCS','2012-09-09','41000','hedrick@tcs.com',9085643789,'paris','France',60015);

