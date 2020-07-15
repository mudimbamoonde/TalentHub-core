-- CREATE DATABASE talentHub;
-- use talentHub;

CREATE TABLE employee(
  empID int(10)  primary key auto_increment,
  firstName varchar(100) not null,
  surname varchar(100) not null,
  dob date not null,
  age int(10) not null,
  industry varchar(100),
  field varchar(100),
  careerLevel varchar(100),
  educationLevel varchar(100),
  yearsOfExperience varchar(100),
  natureOfEngagement varchar(100),
  email varchar(100),
  contactNumber varchar(20),
  cv text
)ENGINE=INNODB;


CREATE TABLE employer(
  mpID int(10)  primary key auto_increment,
  companyName varchar(100) not null,
  RegistrationNumber varchar(100) not null,
  email varchar(100),
  contactNumber varchar(20)
)ENGINE=INNODB;

CREATE TABLE foi(
  fid int(100) primary key auto_increment,
  fiedName varchar(200)
)ENGINE=INNODB;

CREATE TABLE sys_accounts(
 accid int(100) primary key auto_increment,
 userID int(10) not null,
 username varchar(100) not null,
 password varchar(150),
 status enum('active','deactive'),
 accountType enum("sysadmin","admin","company","person")
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS sysadmin (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nrc` varchar(200) NOT NULL,
  `accessLevel` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS event(
 eventID int(10) NOT NULL primary key AUTO_INCREMENT,
 eventName varchar(100) not null,
 eventDate varchar(100) not null,
 venue varchar(100),
 eventFrom time,
 eventTo time,
 eventDetails text
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS jobs(
 jobID int(10) NOT NULL primary key auto_increment,
 jobTitle varchar(100) not null,
 company varchar(100) not null,
 jobDetails text,
 jobDue datetime
)ENGINE=INNODB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS app_job(
 appID int(10) NOT NULL primary key auto_increment,
 jobID int(10) not null,
 empID int(10) not null
)ENGINE=InnoDB;