-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: sugboclinic
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accountant`
--

DROP TABLE IF EXISTS `accountant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accountant` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accountant`
--

LOCK TABLES `accountant` WRITE;
/*!40000 ALTER TABLE `accountant` DISABLE KEYS */;
INSERT INTO `accountant` VALUES (84,NULL,'Mr Accountant','accountant@rygel.biz','Gen Maxilom, Cebu City','+639616327980',NULL,'787','466');
/*!40000 ALTER TABLE `accountant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alloted_bed`
--

DROP TABLE IF EXISTS `alloted_bed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alloted_bed` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `number` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `a_time` varchar(100) DEFAULT NULL,
  `d_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `bed_id` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alloted_bed`
--

LOCK TABLES `alloted_bed` WRITE;
/*!40000 ALTER TABLE `alloted_bed` DISABLE KEYS */;
/*!40000 ALTER TABLE `alloted_bed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,  
  `date` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `companyname` varchar(1000) DEFAULT NULL,
  `room_id` varchar(500) DEFAULT NULL,
  `live_meeting_link` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=469 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (464,'66','162','162','1628812800','09:00 AM To 09:20 AM','09:00 AM','09:20 AM','Appointment Requested','08/12/21','1628793118','108','Treated','765','','Ian Dave Colina','Michael Rygel','Alto Industrial Corp','hms-meeting-5202271-794163-466','https://meet.jit.si/hms-meeting-5202271-794163-466','466'),(465,'62','162','162','1628812800','10:20 AM To 10:40 AM','10:20 AM','10:40 AM','Complaining of palpitations in the heart every morning upon waking up.','08/12/21','1628793623','124','Pending Confirmation','765','','Mr Patient','Dr. Michael Rygel','Alto Industrial Corp','hms-meeting-+639171963610-606691-466','https://meet.jit.si/hms-meeting-+639171963610-606691-466','466'),(466,'62','162','162','1628985600','11:30 AM To 11:45 AM','11:30 AM','11:45 AM','REquest for Checkup for fever','08/14/21','1628937509','138','Requested','','Yes','Mr Patient','Dr. Michael Rygel','Alto Industrial Corp','hms-meeting-+639171963610-903853-466','https://meet.jit.si/hms-meeting-+639171963610-903853-466','466'),(467,'62','162','162','1628985600','11:30 AM To 11:45 AM','11:30 AM','11:45 AM','REquest for Checkup for fever','08/14/21','1628937516','138','Requested','','Yes','Mr Patient','Dr. Michael Rygel','Alto Industrial Corp','hms-meeting-+639171963610-423796-466','https://meet.jit.si/hms-meeting-+639171963610-423796-466','466'),(468,'62','162','162','1628985600','12:00 AM To 12:15 PM','12:00 AM','12:15 PM','Another request for fever checkup','08/14/21','1628937556','0','Confirmed','765','','Mr Patient','Dr. Michael Rygel','Alto Industrial Corp','hms-meeting-+639171963610-153560-466','https://meet.jit.si/hms-meeting-+639171963610-153560-466','466');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autoemailshortcode`
--

DROP TABLE IF EXISTS `autoemailshortcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoemailshortcode` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoemailshortcode`
--

LOCK TABLES `autoemailshortcode` WRITE;
/*!40000 ALTER TABLE `autoemailshortcode` DISABLE KEYS */;
INSERT INTO `autoemailshortcode` VALUES (1,'{firstname}','payment'),(2,'{lastname}','payment'),(3,'{name}','payment'),(4,'{amount}','payment'),(52,'{doctorname}','appoinment_confirmation'),(42,'{firstname}','appoinment_creation'),(51,'{name}','appoinment_confirmation'),(50,'{lastname}','appoinment_confirmation'),(49,'{firstname}','appoinment_confirmation'),(48,'{hospital_name}','appoinment_creation'),(47,'{time_slot}','appoinment_creation'),(46,'{appoinmentdate}','appoinment_creation'),(45,'{doctorname}','appoinment_creation'),(44,'{name}','appoinment_creation'),(43,'{lastname}','appoinment_creation'),(26,'{name}','doctor'),(27,'{firstname}','doctor'),(28,'{lastname}','doctor'),(29,'{company}','doctor'),(41,'{doctor}','patient'),(40,'{company}','patient'),(39,'{lastname}','patient'),(38,'{firstname}','patient'),(37,'{name}','patient'),(36,'{department}','doctor'),(53,'{appoinmentdate}','appoinment_confirmation'),(54,'{time_slot}','appoinment_confirmation'),(55,'{hospital_name}','appoinment_confirmation'),(56,'{start_time}','meeting_creation'),(57,'{patient_name}','meeting_creation'),(58,'{doctor_name}','meeting_creation'),(59,'{hospital_name}','meeting_creation');
/*!40000 ALTER TABLE `autoemailshortcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autoemailtemplate`
--

DROP TABLE IF EXISTS `autoemailtemplate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoemailtemplate` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoemailtemplate`
--

LOCK TABLES `autoemailtemplate` WRITE;
/*!40000 ALTER TABLE `autoemailtemplate` DISABLE KEYS */;
INSERT INTO `autoemailtemplate` VALUES (59,'Patient Registration Confirmation','Dear {name}, You are registred to {company} as a patient to {doctor}. Regards','patient','Active','466'),(58,'Send Appointment confirmation to Doctor','Dear {name}, You are registered as a doctor in {department}. On behalf of {company}, Welcome!','doctor','Active','466'),(57,'Meeting Schedule Notification To Patient','Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information, please contact {hospital_name} . Regards','meeting_creation','Active','466'),(56,'Appointment creation email to patient','Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot}. Please confirm your appointment. For more information, please contact {hospital_name} Regards','appoinment_creation','Active','466'),(55,'Appointment Confirmation email to patient','Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information, please contact {hospital_name} Regards','appoinment_confirmation','Active','466'),(54,'Payment successful email to patient','Dear {name}, Your payment of {amount} was successful. Thank You. Please contact customer service for further queries.','payment','Active','466');
/*!40000 ALTER TABLE `autoemailtemplate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autosmsshortcode`
--

DROP TABLE IF EXISTS `autosmsshortcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autosmsshortcode` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autosmsshortcode`
--

LOCK TABLES `autosmsshortcode` WRITE;
/*!40000 ALTER TABLE `autosmsshortcode` DISABLE KEYS */;
INSERT INTO `autosmsshortcode` VALUES (1,'{name}','payment'),(2,'{firstname}','payment'),(3,'{lastname}','payment'),(4,'{amount}','payment'),(55,'{appoinmentdate}','appoinment_confirmation'),(54,'{doctorname}','appoinment_confirmation'),(53,'{name}','appoinment_confirmation'),(52,'{lastname}','appoinment_confirmation'),(51,'{firstname}','appoinment_confirmation'),(50,'{time_slot}','appoinment_creation'),(49,'{appoinmentdate}','appoinment_creation'),(48,'{hospital_name}','appoinment_creation'),(47,'{doctorname}','appoinment_creation'),(46,'{name}','appoinment_creation'),(45,'{lastname}','appoinment_creation'),(44,'{firstname}','appoinment_creation'),(28,'{firstname}','doctor'),(29,'{lastname}','doctor'),(30,'{name}','doctor'),(31,'{company}','doctor'),(43,'{doctor}','patient'),(42,'{company}','patient'),(41,'{lastname}','patient'),(40,'{firstname}','patient'),(39,'{name}','patient'),(38,'{department}','doctor'),(56,'{time_slot}','appoinment_confirmation'),(57,'{hospital_name}','appoinment_confirmation'),(58,'{start_time}','meeting_creation'),(59,'{patient_name}','meeting_creation'),(60,'{doctor_name}','meeting_creation'),(61,'{hospital_name}','meeting_creation');
/*!40000 ALTER TABLE `autosmsshortcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autosmstemplate`
--

DROP TABLE IF EXISTS `autosmstemplate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autosmstemplate` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autosmstemplate`
--

LOCK TABLES `autosmstemplate` WRITE;
/*!40000 ALTER TABLE `autosmstemplate` DISABLE KEYS */;
INSERT INTO `autosmstemplate` VALUES (69,'Patient Registration Confirmation','Dear {name}, You are registred to {company} as a patient to {doctor}. Regards','patient','Active','466'),(68,'send appoint confirmation to Doctor','Dear {name}, You are registered as a doctor in {department} . On behalf of {company} Welcome!','doctor','Active','466'),(67,'Meeting Schedule Notification To Patient','Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact {hospital_name}. Regards','meeting_creation','Active','466'),(66,'Appointment creation sms to patient','Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot}. Please confirm your appointment. For more information contact {hospital_name}. Regards','appoinment_creation','Active','466'),(65,'Appointment Confirmation sms to patient','Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards','appoinment_confirmation','Active','466'),(64,'Payment successful sms to patient','Dear {name}, Your payment of {amount} was successful. Thank You. Please contact customer service for further queries. {company}','payment','Active','466');
/*!40000 ALTER TABLE `autosmstemplate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankb`
--

DROP TABLE IF EXISTS `bankb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bankb` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankb`
--

LOCK TABLES `bankb` WRITE;
/*!40000 ALTER TABLE `bankb` DISABLE KEYS */;
INSERT INTO `bankb` VALUES (72,'O-','0 Bags','466'),(71,'O+','0 Bags','466'),(70,'AB-','0 Bags','466'),(69,'AB+','0 Bags','466'),(68,'B-','0 Bags','466'),(67,'B+','0 Bags','466'),(66,'A-','0 Bags','466'),(65,'A+','0 Bags','466');
/*!40000 ALTER TABLE `bankb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bed`
--

DROP TABLE IF EXISTS `bed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bed` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `last_a_time` varchar(100) DEFAULT NULL,
  `last_d_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `bed_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bed`
--

LOCK TABLES `bed` WRITE;
/*!40000 ALTER TABLE `bed` DISABLE KEYS */;
/*!40000 ALTER TABLE `bed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bed_category`
--

DROP TABLE IF EXISTS `bed_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bed_category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bed_category`
--

LOCK TABLES `bed_category` WRITE;
/*!40000 ALTER TABLE `bed_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `bed_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `x` varchar(10) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (58,'Cardiology','<p>Description</p>\r\n',NULL,NULL,'466');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_type`
--

DROP TABLE IF EXISTS `class_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `x` varchar(10) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_type`
--

LOCK TABLES `class_type` WRITE;
/*!40000 ALTER TABLE `class_type` DISABLE KEYS */;
INSERT INTO `class_type` VALUES (58,'Standard','<p>Description</p>\r\n',NULL,NULL,'466');
/*!40000 ALTER TABLE `class_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnostic_report`
--

DROP TABLE IF EXISTS `diagnostic_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnostic_report` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnostic_report`
--

LOCK TABLES `diagnostic_report` WRITE;
/*!40000 ALTER TABLE `diagnostic_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `diagnostic_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (162,NULL,'Dr. Michael Rygel','doctor@rygel.biz','Cebu Doctors College','+639176724020','Cardiology','Cardiologist',NULL,NULL,'765','466');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `class_type` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (162,NULL,'Alto Industrial Corp','hr@alto.com','MEPZ 1 Lapulapu City','+639171234567','Company Standard','Makers of Paper and Plastic Packaging',NULL,NULL,'765','466');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donor` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `group` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `ldd` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor`
--

LOCK TABLES `donor` WRITE;
/*!40000 ALTER TABLE `donor` DISABLE KEYS */;
/*!40000 ALTER TABLE `donor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `reciepient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_settings`
--

DROP TABLE IF EXISTS `email_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_settings` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_settings`
--

LOCK TABLES `email_settings` WRITE;
/*!40000 ALTER TABLE `email_settings` DISABLE KEYS */;
INSERT INTO `email_settings` VALUES (13,'admin@rygel.biz',NULL,NULL,NULL,'466');
/*!40000 ALTER TABLE `email_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `datestring` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_category`
--

DROP TABLE IF EXISTS `expense_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_category`
--

LOCK TABLES `expense_category` WRITE;
/*!40000 ALTER TABLE `expense_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featured`
--

DROP TABLE IF EXISTS `featured`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featured` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(1000) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featured`
--

LOCK TABLES `featured` WRITE;
/*!40000 ALTER TABLE `featured` DISABLE KEYS */;
INSERT INTO `featured` VALUES (1,'uploads/images.jpg','Dr Carlito Perez','Gynecologist','Visiting Physician at Chong Hua Hospital. Field of Interest is in Infertility, Menopause and Infectious Disease research.'),(2,'uploads/doctor.png','Dr Felix Remedios','Cardiologist','Training officer at Chong Hua Heart Institute. Field of Interest is in Interventional Cardiology, Artery Disease, Hypertension and Dyslipidemia.'),(3,'uploads/download_(2)2.png','Dr Mary Anne Cruz','Pediatrician','Member of Society of Pediatric Critical Care Medicine. Field of Interest is in Dengue Fever and Hemorrhagic Fever.'),(4,'uploads/inlinePreview.jpg','Rygel Hospital Management Syatem','Cardiac Specialized','<p>bfbjfbsjbjsbfjsbf</p>\r\n');
/*!40000 ALTER TABLE `featured` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'superadmin','Super Admin'),(2,'members','General User'),(3,'Accountant','For Financial Activities'),(4,'Doctor',''),(5,'Patient',''),(6,'Nurse',''),(7,'Pharmacist',''),(8,'Laboratorist',''),(10,'Receptionist','Receptionist'),(11,'admin','Administrator');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holidays` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hospital` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `p_limit` varchar(100) DEFAULT NULL,
  `d_limit` varchar(100) DEFAULT NULL,
  `module` varchar(1000) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=477 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (466,'SugboDoc Clinic','admin@rygel.biz',NULL,'F Ramos St, Cebu City','+63323464063','','1000','500','accountant,appointment,lab,bed,department,doctor,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms','763');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab`
--

DROP TABLE IF EXISTS `lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,  
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1936 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab`
--

LOCK TABLES `lab` WRITE;
/*!40000 ALTER TABLE `lab` DISABLE KEYS */;
/*!40000 ALTER TABLE `lab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_category`
--

DROP TABLE IF EXISTS `lab_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `reference_value` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_category`
--

LOCK TABLES `lab_category` WRITE;
/*!40000 ALTER TABLE `lab_category` DISABLE KEYS */;
INSERT INTO `lab_category` VALUES (35,'Complete blood count (CBC)','Hematology Test','',NULL),(36,'Red blood cell count (RBC)','Hematology Test','',NULL),(37,'Platelet count','Hematology Test','',NULL),(38,'Hematocrit red blood cell volume (HCT)','Hematology Test','',NULL),(39,'Hemoglobin concentration (HB)','Hematology Test','',NULL),(40,'Vitamin B12 Deficiency','Hematology Test','',NULL),(41,'Renal Profiling','Hematology Test','',NULL),(42,'Cholesterol','Hematology Test','',NULL),(43,'Mean Corpuscular Volume','Hematology Test','',NULL),(44,'Lymphocytes','Hematology Test','',NULL),(45,'Monocytes','Hematology Test','',NULL),(46,'ESR','Hematology Test','',NULL),(47,'HbA1c','Hematology Test','',NULL),(48,'Sodium','Hematology Test','',NULL),(49,'Potassium','Hematology Test','',NULL),(50,'Triglycerides','Hematology Test','',NULL),(51,'pH','Routine Urinalysis','',NULL),(52,'Protein','Routine Urinalysis','(70-110)mg/dl',NULL),(53,'Glucose','Routine Urinalysis','',NULL),(54,'Bilirubin','Routine Urinalysis','',NULL),(55,'Blood','Routine Urinalysis','',NULL),(56,'Leucocytes','Routine Urinalysis','',NULL),(57,'Nitrite','Routine Urinalysis','',NULL),(58,'Urobilinogen','Routine Urinalysis','',NULL),(59,'Ketone','Routine Urinalysis','',NULL),(61,'RBC','Routine Urinalysis','',NULL),(62,'WBC','Routine Urinalysis','',NULL),(63,'Epithelial Cells','Routine Urinalysis','',NULL),(64,'Bacteria','Routine Urinalysis','',NULL),(65,'Globulin','Hematology Test','',NULL),(66,'Total Protein','Hematology Test','',NULL),(67,'Lipoprotein','Hematology Test','',NULL),(68,'Albumin','Hematology Test','',NULL),(69,'Calcium','Hematology Test','',NULL),(70,'Mammogram (Digital)','Radiology','',NULL),(71,'Upper Extremity-Shoulder (XRay)','Radiology','',NULL),(106,'Abdomen (XRay)','Radiology','',NULL),(107,'Upper Extremity Left Shoulder (XRay)','Radiology','',NULL),(108,'Lower Extremity Left Foot (XRay)','Radiology','',NULL),(114,'Chest (XRay)','Radiology','',NULL),(113,'Lower Extremity Right Femur Tibia (XRay)','Radiology','',NULL),(115,'Lower Extremity Right Hip (XRay)','Radiology','',NULL),(116,'Lower Extremity Right Knee (XRay)','Radiology','',NULL),(117,'Lower Extremity Left Femur Tibia (XRay)','Radiology','',NULL),(118,'Lower Extremity Left Hip (XRay)','Radiology','',NULL),(120,'Lower Extremity Left Knee (XRay)','Radiology','',NULL),(126,'ECG','ECG','',NULL);
/*!40000 ALTER TABLE `lab_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorist`
--

DROP TABLE IF EXISTS `laboratorist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorist`
--

LOCK TABLES `laboratorist` WRITE;
/*!40000 ALTER TABLE `laboratorist` DISABLE KEYS */;
INSERT INTO `laboratorist` VALUES (6,NULL,'Mr Lab Technician','labtech@rygel.biz','Pardo Cebu City','+639171234567',NULL,NULL,'789','466');
/*!40000 ALTER TABLE `laboratorist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manual_email_template`
--

DROP TABLE IF EXISTS `manual_email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manual_email_template` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manual_email_template`
--

LOCK TABLES `manual_email_template` WRITE;
/*!40000 ALTER TABLE `manual_email_template` DISABLE KEYS */;
INSERT INTO `manual_email_template` VALUES (11,'Template','{phone} {email}','email','466');
/*!40000 ALTER TABLE `manual_email_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manual_sms_template`
--

DROP TABLE IF EXISTS `manual_sms_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manual_sms_template` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manual_sms_template`
--

LOCK TABLES `manual_sms_template` WRITE;
/*!40000 ALTER TABLE `manual_sms_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `manual_sms_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manualemailshortcode`
--

DROP TABLE IF EXISTS `manualemailshortcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manualemailshortcode` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manualemailshortcode`
--

LOCK TABLES `manualemailshortcode` WRITE;
/*!40000 ALTER TABLE `manualemailshortcode` DISABLE KEYS */;
INSERT INTO `manualemailshortcode` VALUES (1,'{firstname}','email'),(2,'{lastname}','email'),(3,'{name}','email'),(6,'{address}','email'),(7,'{company}','email'),(8,'{email}','email'),(9,'{phone}','email');
/*!40000 ALTER TABLE `manualemailshortcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manualsmsshortcode`
--

DROP TABLE IF EXISTS `manualsmsshortcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manualsmsshortcode` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manualsmsshortcode`
--

LOCK TABLES `manualsmsshortcode` WRITE;
/*!40000 ALTER TABLE `manualsmsshortcode` DISABLE KEYS */;
INSERT INTO `manualsmsshortcode` VALUES (1,'{firstname}','sms'),(2,'{lastname}','sms'),(3,'{name}','sms'),(4,'{email}','sms'),(5,'{phone}','sms'),(6,'{address}','sms'),(10,'{company}','sms');
/*!40000 ALTER TABLE `manualsmsshortcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_history`
--

DROP TABLE IF EXISTS `medical_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medical_history` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(500) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_history`
--

LOCK TABLES `medical_history` WRITE;
/*!40000 ALTER TABLE `medical_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `medical_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicine` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `box` varchar(100) DEFAULT NULL,
  `s_price` varchar(100) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `generic` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `effects` varchar(100) DEFAULT NULL,
  `e_date` varchar(70) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2879 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine`
--

LOCK TABLES `medicine` WRITE;
/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
INSERT INTO `medicine` VALUES (2878,'Biogesic tab','Analgesics','50','A1','70',100,'Paracetamol','UNILAB, Inc','Adverse Reactions-Allergic skin reactions, GI disturbances, changes in the number of WBC & platelets','01-12-2021','08/12/21','466');
/*!40000 ALTER TABLE `medicine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicine_category`
--

DROP TABLE IF EXISTS `medicine_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicine_category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine_category`
--

LOCK TABLES `medicine_category` WRITE;
/*!40000 ALTER TABLE `medicine_category` DISABLE KEYS */;
INSERT INTO `medicine_category` VALUES (26,'Analgesics','Drugs that relieve pain.','466'),(27,'Antacids','Drugs that relieve indigestion and heartburn by neutralizing stomach acid.','466'),(28,'Antianxiety Drugs','Drugs that suppress anxiety and relax muscles ','466'),(29,'Antiarrhythmics','Drugs used to control irregularities of heartbeat.','466'),(30,'Antibacterials','Drugs used to treat infections.','466'),(31,'Antibiotics','Drugs made from naturally occurring and synthetic substances that combat bacterial infection. ','466'),(32,'Anticoagulants and Thrombolytics','Anticoagulants prevent blood from clotting. Thrombolytics help dissolve and disperse blood clots ','466'),(33,'Anticonvulsants','Drugs that prevent epileptic seizures','466'),(34,'Antidepressants','Mood-lifting drugs','466'),(35,'Antidiarrheals','Drugs used for the relief of diarrhea','466');
/*!40000 ALTER TABLE `medicine_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `topic` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `meeting_id` varchar(100) DEFAULT NULL,
  `meeting_password` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `doctor_ion_id` varchar(100) DEFAULT NULL,
  `patient_ion_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=588 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting`
--

LOCK TABLES `meeting` WRITE;
/*!40000 ALTER TABLE `meeting` DISABLE KEYS */;
/*!40000 ALTER TABLE `meeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting_settings`
--

DROP TABLE IF EXISTS `meeting_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting_settings` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(100) DEFAULT NULL,
  `secret_key` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_settings`
--

LOCK TABLES `meeting_settings` WRITE;
/*!40000 ALTER TABLE `meeting_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `meeting_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `hospital_id` varchar(100) DEFAULT NULL,
  `modules` varchar(1000) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notice` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (15,'Staff Assigned to COVID Ward','<p>Attention to all staff assigned to COVID Ward. You are required to undergo testing.</p>\r\n','1628812800','staff','466'),(16,'dfsdf','<p>sdfsdfd</p>\r\n','1629158400','staff','466');
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nurse` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `z` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nurse`
--

LOCK TABLES `nurse` WRITE;
/*!40000 ALTER TABLE `nurse` DISABLE KEYS */;
INSERT INTO `nurse` VALUES (17,NULL,'Mrs Nurse','nurse@rygel.biz','Juan Luna Ext Cebu City','+639203456789',NULL,NULL,NULL,'790','466');
/*!40000 ALTER TABLE `nurse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ot_payment`
--

DROP TABLE IF EXISTS `ot_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ot_payment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) DEFAULT NULL,
  `doctor_c_s` varchar(100) DEFAULT NULL,
  `doctor_a_s_1` varchar(100) DEFAULT NULL,
  `doctor_a_s_2` varchar(100) DEFAULT NULL,
  `doctor_anaes` varchar(100) DEFAULT NULL,
  `n_o_o` varchar(100) DEFAULT NULL,
  `c_s_f` varchar(100) DEFAULT NULL,
  `a_s_f_1` varchar(100) DEFAULT NULL,
  `a_s_f_2` varchar(11) DEFAULT NULL,
  `anaes_f` varchar(100) DEFAULT NULL,
  `ot_charge` varchar(100) DEFAULT NULL,
  `cab_rent` varchar(100) DEFAULT NULL,
  `seat_rent` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `doctor_fees` varchar(100) DEFAULT NULL,
  `hospital_fees` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `flat_discount` varchar(100) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ot_payment`
--

LOCK TABLES `ot_payment` WRITE;
/*!40000 ALTER TABLE `ot_payment` DISABLE KEYS */;
INSERT INTO `ot_payment` VALUES (85,'451','None','123','None','125','dbdbd','','1000','0','1000','','','','','','1506195494','2000','2000','0','2000','','1000','unpaid','614',NULL);
/*!40000 ALTER TABLE `ot_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `p_limit` varchar(100) DEFAULT NULL,
  `d_limit` varchar(100) DEFAULT NULL,
  `module` varchar(1000) DEFAULT NULL,
  `show_in_frontend` varchar(100) DEFAULT NULL,
  `frontend_order` varchar(100) DEFAULT NULL,
  `set_as_default` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` VALUES (80,'packagename','3000','2500','1000','accountant,appointment,lab,bed,department,doctor,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms','Yes',NULL,NULL);
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `bloodgroup` varchar(100) DEFAULT NULL,
  `class_type` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `how_added` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (62,'uploads/patient.jpg','Mr Patient','patient@rygel.biz',',162','Gen Maxilom Ave Cebu City','+639171963610','Male','01-07-2000',NULL,'O-','58','764','158098','07/28/20','1595924679',NULL,'466'),(66,'uploads/Ian-Dave-Colina-Patient.jpg','Ian Dave Colina','iandave@mailinator.com','162','Cabancalan, Mandaue City','5202271','Male','04-08-1993',NULL,'O-','58','791','240343','08/12/21','1628790667',NULL,'466');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_deposit`
--

DROP TABLE IF EXISTS `patient_deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_deposit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `deposited_amount` varchar(100) DEFAULT NULL,
  `amount_received_id` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `gateway` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1661 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_deposit`
--

LOCK TABLES `patient_deposit` WRITE;
/*!40000 ALTER TABLE `patient_deposit` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_deposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_material`
--

DROP TABLE IF EXISTS `patient_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_material` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_material`
--

LOCK TABLES `patient_material` WRITE;
/*!40000 ALTER TABLE `patient_material` DISABLE KEYS */;
INSERT INTO `patient_material` VALUES (86,'1628792108','August 2011 Complete Blood Count',NULL,'66','Ian Dave Colina','Cabancalan, Mandaue City','5202271','uploads/ian-dave-lab-report.jpg','12-08-21','466');
/*!40000 ALTER TABLE `patient_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2077 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentGateway`
--

DROP TABLE IF EXISTS `paymentGateway`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentGateway` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `merchant_key` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `APIUsername` varchar(100) DEFAULT NULL,
  `APIPassword` varchar(100) DEFAULT NULL,
  `APISignature` varchar(100) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `publish` varchar(1000) DEFAULT NULL,
  `secret` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `public_key` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentGateway`
--

LOCK TABLES `paymentGateway` WRITE;
/*!40000 ALTER TABLE `paymentGateway` DISABLE KEYS */;
INSERT INTO `paymentGateway` VALUES (27,'Stripe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test','pk_test_mDWBxLJ5nAtaDCIGqdIe8X3P','sk_test_SjgSfcaefNfzzEFb0SNSyPdq','466',NULL),(26,'Pay U Money','Enter Merchant key','Enter Salt',NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,'466',NULL),(25,'PayPal',NULL,NULL,NULL,NULL,'Enter API Username','Enter API Password','Enter API Signature','test',NULL,NULL,'466',NULL),(31,'Paystack',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test',NULL,'Enter Secret Key','466','Enter Public Key');
/*!40000 ALTER TABLE `paymentGateway` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_category`
--

DROP TABLE IF EXISTS `payment_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_category`
--

LOCK TABLES `payment_category` WRITE;
/*!40000 ALTER TABLE `payment_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacist`
--

LOCK TABLES `pharmacist` WRITE;
/*!40000 ALTER TABLE `pharmacist` DISABLE KEYS */;
INSERT INTO `pharmacist` VALUES (10,NULL,'Mr Pharmacist','pharmacist@rygel.biz','Maguikay Highway Mandaue City','+639183456789',NULL,NULL,'767','466');
/*!40000 ALTER TABLE `pharmacist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacy_expense`
--

DROP TABLE IF EXISTS `pharmacy_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacy_expense` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy_expense`
--

LOCK TABLES `pharmacy_expense` WRITE;
/*!40000 ALTER TABLE `pharmacy_expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `pharmacy_expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacy_expense_category`
--

DROP TABLE IF EXISTS `pharmacy_expense_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacy_expense_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy_expense_category`
--

LOCK TABLES `pharmacy_expense_category` WRITE;
/*!40000 ALTER TABLE `pharmacy_expense_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `pharmacy_expense_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacy_payment`
--

DROP TABLE IF EXISTS `pharmacy_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacy_payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1981 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy_payment`
--

LOCK TABLES `pharmacy_payment` WRITE;
/*!40000 ALTER TABLE `pharmacy_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `pharmacy_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacy_payment_category`
--

DROP TABLE IF EXISTS `pharmacy_payment_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacy_payment_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy_payment_category`
--

LOCK TABLES `pharmacy_payment_category` WRITE;
/*!40000 ALTER TABLE `pharmacy_payment_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `pharmacy_payment_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `symptom` varchar(100) DEFAULT NULL,
  `advice` varchar(1000) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `dd` varchar(100) DEFAULT NULL,
  `medicine` varchar(1000) DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (101,'1628812800','66','162','<p>Patient has reported allergy of eggs and cheese</p>\r\n','<p>Take normal rest.&nbsp;</p>\r\n\r\n<p>Drink lots of water and medicine to relieve headache</p>\r\n\r\n<p>Tabulate and monitor your temperature&nbsp;</p>\r\n',NULL,NULL,'2878***500mg***1 + 0 + 1***7 days***After Food',NULL,'<p>Patient is complaining of headache every morning.</p>\r\n','Ian Dave Colina','Dr. Michael Rygel','466');
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receptionist`
--

DROP TABLE IF EXISTS `receptionist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receptionist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receptionist`
--

LOCK TABLES `receptionist` WRITE;
/*!40000 ALTER TABLE `receptionist` DISABLE KEYS */;
INSERT INTO `receptionist` VALUES (9,NULL,'Mr Receptionist','receptionist@rygel.biz','Nasipit Talamban','+639123456789',NULL,'770','466');
/*!40000 ALTER TABLE `receptionist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `report_type` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `package` varchar(1000) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (18,'Rygel Itaas','Nasipit Talamban','rygeltech@gmail.com','3464063',NULL,'80','english',NULL,'Approved'),(19,'Michael Ryan','IT Park','rigelig@yahoo.com','5202271',NULL,'80','english',NULL,'Approved');
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(1000) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'uploads/anatomic.png','Ambulance and Emergency Services','We provide specific emergency care depending on the needs of our patient from emergency minor surgeries, and women with obstetrical or gynecological problems'),(2,'uploads/dentistry.png','Imaging Services','We offer various Imaging Services for patients from Bone Mineral Densitometry, CT-Scan, Digital Radiography and Ultrasound'),(3,'uploads/doctor.png','Renal Care','We are well equipped with state of the art dialysis machines, experienced staff nurses and doctors who are able to render dialysis services in an outpatient, inpatient and emergency setting'),(4,'uploads/pulmonary.png','Respiratory Care','Our Respiratory Care unit is equipped with advanced, modern equipment to allow us the best care for the pulmonary, critical care patients'),(5,'uploads/surgery.png','Rehabilitation','We provide full service physical therapy, occupational therapy, speech therapy, rehabilitation clinic designed to implement personalized, maximally effective, comprehensive rehabilitation programs for medical, industrial, sports and other neuromusculoskeletal related injuries'),(6,'uploads/anatomic.png','Outpatient Services','We provide a wide range of health care services for patients who are not admitted, including those needing minor surgical operations and other procedures');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `system_vendor` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `live_appointment_type` varchar(100) DEFAULT NULL,
  `vat` varchar(100) DEFAULT NULL,
  `login_title` varchar(100) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `invoice_logo` varchar(500) DEFAULT NULL,
  `payment_gateway` varchar(100) DEFAULT NULL,
  `sms_gateway` varchar(100) DEFAULT NULL,
  `codec_username` varchar(100) DEFAULT NULL,
  `codec_purchase_code` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (11,'Rygel Hospital Information System','SugboDoc Hospital Information System','Nasipit Talamban Cebu City','+639173456789','superadmin@rygel.biz',NULL,'$','english','flat',NULL,NULL,NULL,'',NULL,'PayPal','Twilio','','','superadmin'),(10,'SugboDoc Telehealth','SugboDoc','IT Park Cebu City','+639611234567','admin@rygel.biz',NULL,'₱','english','flat','jitsi',NULL,NULL,'uploads/sugbodoc-200x1001.png',NULL,'PayPal','Twilio','','','466');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `text1` varchar(500) DEFAULT NULL,
  `text2` varchar(500) DEFAULT NULL,
  `text3` varchar(500) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` VALUES (1,'SugboDoc Hospital management System','uploads/hospital-system.jpg','Welcome To Sugbodoc Hospital','SugboDoc Hospital Management System','Hospital','2','Active'),(2,'SugboDoc Hospital management System','uploads/doctor-typing.jpg','SugboDoc Hospital management System','SugboDoc Hospital management System','SugboDoc Hospital management System','1','Active');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(1600) DEFAULT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms`
--

LOCK TABLES `sms` WRITE;
/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_settings`
--

DROP TABLE IF EXISTS `sms_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_settings` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `api_id` varchar(100) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `authkey` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `sid` varchar(1000) DEFAULT NULL,
  `token` varchar(1000) DEFAULT NULL,
  `sendernumber` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_settings`
--

LOCK TABLES `sms_settings` WRITE;
/*!40000 ALTER TABLE `sms_settings` DISABLE KEYS */;
INSERT INTO `sms_settings` VALUES (29,'Twilio',NULL,NULL,NULL,NULL,NULL,'763','Enter_Twilio_SID','Enter_Twilio_Token_Password','Enter_Sender_Number','466'),(28,'MSG91',NULL,NULL,NULL,'Enter_Sender_Number','Enter_Your_MSG91_Auth_Key','763',NULL,NULL,NULL,'466'),(27,'Clickatell','Enter_Your_ClickAtell_Username','','Enter_Your_ClickAtell_Api _Id',NULL,NULL,'763',NULL,NULL,NULL,'466');
/*!40000 ALTER TABLE `sms_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `template` varchar(10000) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_schedule`
--

DROP TABLE IF EXISTS `time_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_schedule` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(500) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_schedule`
--

LOCK TABLES `time_schedule` WRITE;
/*!40000 ALTER TABLE `time_schedule` DISABLE KEYS */;
INSERT INTO `time_schedule` VALUES (108,'162','Friday','09:00 AM','02:00 PM','108','4','466'),(110,'162','Sunday','10:45 PM','11:45 PM','273','3','466'),(111,'162','Saturday','11:00 PM','11:45 PM','276','3','466'),(112,'162','Monday','12:15 AM','02:15 AM','3','3','466');
/*!40000 ALTER TABLE `time_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_slot`
--

DROP TABLE IF EXISTS `time_slot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_slot` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2282 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_slot`
--

LOCK TABLES `time_slot` WRITE;
/*!40000 ALTER TABLE `time_slot` DISABLE KEYS */;
INSERT INTO `time_slot` VALUES (2240,'162','09:00 AM','09:20 AM','Friday','108','466'),(2241,'162','09:20 AM','09:40 AM','Friday','112','466'),(2242,'162','09:40 AM','10:00 AM','Friday','116','466'),(2243,'162','10:00 AM','10:20 AM','Friday','120','466'),(2244,'162','10:20 AM','10:40 AM','Friday','124','466'),(2245,'162','10:40 AM','11:00 AM','Friday','128','466'),(2246,'162','11:00 AM','11:20 AM','Friday','132','466'),(2247,'162','11:20 AM','11:40 AM','Friday','136','466'),(2248,'162','11:40 AM','12:00 AM','Friday','140','466'),(2249,'162','12:00 AM','12:20 PM','Friday','144','466'),(2250,'162','12:20 PM','12:40 PM','Friday','148','466'),(2251,'162','12:40 PM','01:00 PM','Friday','152','466'),(2252,'162','01:00 PM','01:20 PM','Friday','156','466'),(2253,'162','01:20 PM','01:40 PM','Friday','160','466'),(2254,'162','01:40 PM','02:00 PM','Friday','164','466'),(2278,'162','01:15 AM','01:30 AM','Monday','15','466'),(2277,'162','01:00 AM','01:15 AM','Monday','12','466'),(2276,'162','12:45 AM','01:00 AM','Monday','9','466'),(2275,'162','12:30 AM','12:45 AM','Monday','6','466'),(2274,'162','12:15 AM','12:30 AM','Monday','3','466'),(2273,'162','11:30 PM','11:45 PM','Saturday','282','466'),(2272,'162','11:15 PM','11:30 PM','Saturday','279','466'),(2271,'162','11:00 PM','11:15 PM','Saturday','276','466'),(2270,'162','11:30 PM','11:45 PM','Sunday','282','466'),(2269,'162','11:15 PM','11:30 PM','Sunday','279','466'),(2268,'162','11:00 PM','11:15 PM','Sunday','276','466'),(2267,'162','10:45 PM','11:00 PM','Sunday','273','466'),(2279,'162','01:30 AM','01:45 AM','Monday','18','466'),(2280,'162','01:45 AM','02:00 AM','Monday','21','466'),(2281,'162','02:00 AM','02:15 AM','Monday','24','466');
/*!40000 ALTER TABLE `time_slot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hospital_ion_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=792 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','superadmin','$2y$08$GclRTUhfRYv19X.qFyJ7KegFXr6CZq93.cZtxil5akzCEss1m2UrK','','superadmin@rygel.biz','','eX0.Bq6nP57EuXX4hJkPHO973e7a4c25f1849d3a',1511432365,'zCeJpcj78CKqJ4sVxVbxcO',1268889823,1628910408,1,'Admin','istrator','ADMIN','0',NULL),(763,'49.145.162.177','SugboDoc Clinic','$2y$08$h5ZsyLuWM8izwhwWlkfDdeylY8jdXwlqhf8C5Tlj.rIP/AL/7W1oO',NULL,'admin@rygel.biz',NULL,NULL,NULL,NULL,1595923316,1628931392,1,NULL,NULL,NULL,NULL,NULL),(764,'49.145.162.177','Mr Patient','$2y$08$9nBBXRUaEjneHqyHplrt7OEe1n7eMDLS3C/Ztp7kq6s76gS1fHbrm',NULL,'patient@rygel.biz',NULL,NULL,NULL,NULL,1595924679,1628954554,1,NULL,NULL,NULL,NULL,'763'),(765,'49.145.162.177','Dr. Michael Rygel','$2y$08$fMoSqdFzlemryEACC1LTvuXuNkIpTjkviovMrLfsmuYB0iR9m0Nrq',NULL,'doctor@rygel.biz',NULL,NULL,NULL,NULL,1595924765,1628952639,1,NULL,NULL,NULL,NULL,'763'),(767,'49.145.162.177','Mr Pharmacist','$2y$08$7NA95vFwBNompkFy9nWOAu0V7l954eQsO/JgHSJmEuDAPQqTUDKMe',NULL,'pharmacist@rygel.biz',NULL,NULL,NULL,NULL,1595928739,1600846048,1,NULL,NULL,NULL,NULL,'763'),(770,'49.145.162.177','Mr Receptionist','$2y$08$uQ8hjJRTGAEsshOFkS8acue03e.4h3MXQLwH79837vhqu7SH9U3TK',NULL,'receptionist@rygel.biz',NULL,NULL,NULL,NULL,1595929512,1600753152,1,NULL,NULL,NULL,NULL,'763'),(787,'49.145.162.177','Mr Accountant','$2y$08$GVopabH96MmnQFKKqYCYJOjlr0kgUQUg7GOjsqnJ/.tlcQCfwg0cm',NULL,'accountant@rygel.biz',NULL,NULL,NULL,NULL,1600753981,1600845713,1,NULL,NULL,NULL,NULL,'763'),(789,'49.145.162.177','Mr Laboratorist','$2y$08$B2WZyEiQdFCPndWw8//ZpuFXb7pc00nAiIU8g0S7TJAg5NLK3I5sK',NULL,'laboratorist@rygel.biz',NULL,NULL,NULL,NULL,1600845967,1600845979,1,NULL,NULL,NULL,NULL,'763'),(790,'49.145.162.177','Mrs Nurse','$2y$08$RYAAuKhOF.zyefUPGwTHp.LH95LMMjO64et98EgHPpmzrbQY2tP82',NULL,'nurse@rygel.biz',NULL,NULL,NULL,NULL,1600846100,NULL,1,NULL,NULL,NULL,NULL,'763'),(791,'192.168.10.1','Ian Dave Colina','$2y$08$jr7Z/zGvRWn3ujto99IKL.eM31lsLJBF4RtsROJCtcUsyDsNuRgau',NULL,'iandave@mailinator.com',NULL,NULL,NULL,NULL,1628790667,1628876335,1,NULL,NULL,NULL,NULL,'763'),(800,'192.168.10.1','CEO John Garcia','$2y$08$jr7Z/zGvRWn3ujto99IKL.eM31lsLJBF4RtsROJCtcUsyDsNuRgau',NULL,'hr@company.com',NULL,NULL,NULL,NULL,1628790667,1628876335,1,NULL,NULL,NULL,NULL,'763');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=794 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(765,763,11),(766,764,5),(767,765,4),(769,767,7),(772,770,10),(789,787,3),(791,789,8),(792,790,6),(793,791,5),(802,800,9);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website_settings`
--

DROP TABLE IF EXISTS `website_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `website_settings` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `logo` varchar(1000) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `emergency` varchar(100) DEFAULT NULL,
  `support` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `block_1_text_under_title` varchar(500) DEFAULT NULL,
  `service_block__text_under_title` varchar(500) DEFAULT NULL,
  `doctor_block__text_under_title` varchar(500) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `youtube_id` varchar(100) DEFAULT NULL,
  `skype_id` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `twitter_username` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `website_settings`
--

LOCK TABLES `website_settings` WRITE;
/*!40000 ALTER TABLE `website_settings` DISABLE KEYS */;
INSERT INTO `website_settings` VALUES (1,'Rygel Hospital Information System','uploads/rygel-logo.png','Nasipit, Talamban Cebu City','+63325202271','+63325202271','+63325202271','support@rygel.biz','$','Your Premier Hospital Facility','Changing Lives, Saving Lives for the Community','Care and dedication is the driving force behind our work.','https://www.facebook.com/sugbodoc','https://www.twitter.com/sugbodoc','https://www.google.com/sugbodoc','https://www.youtube.com/sugbodoc','https://www.skype.com/sugbodoc',NULL,'sugbodoc');
/*!40000 ALTER TABLE `website_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sugboclinic'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-14 16:12:11
