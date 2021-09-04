-- MySQL dump 10.13  Distrib 5.7.35, for Linux (x86_64)
--
-- Host: localhost    Database: sugbodoc
-- ------------------------------------------------------
-- Server version	5.7.35-0ubuntu0.18.04.1

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
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accountant`
--

LOCK TABLES `accountant` WRITE;
/*!40000 ALTER TABLE `accountant` DISABLE KEYS */;
INSERT INTO `accountant` VALUES (84,'uploads/mr_accountant.jpg','Mr Accountant','accountant@rygel.biz','Gen Maxilom, Cebu City','+639616327980',NULL,'787','466'),(85,'uploads/Erick-Sanchez-Accountant.jpg','Erick Sanchez','acct1.rygeltech@gmail.com','Nasipit Talamban','+639150332656',NULL,'810','466'),(86,'uploads/Jhea-Manatad-Accountant.jpg','Jhea Manatad','acct2.rygeltech@gmail.com','Camputhaw Capitol Cebu City','+639150332656',NULL,'811','466'),(87,'uploads/Joy-Paredes-Mandaue-Accountant.jpg','Joy Paredes','acct1.mandaue@mailinator.com','Mabolo Cebu City','+639150883542',NULL,'844','477'),(88,'uploads/Felex_Choi-Mandaue-Accountant.jpg','Felex Choi','acct2.mandaue@mailinator.com','Pitos Cebu City','+639325801252',NULL,'845','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alloted_bed`
--

LOCK TABLES `alloted_bed` WRITE;
/*!40000 ALTER TABLE `alloted_bed` DISABLE KEYS */;
INSERT INTO `alloted_bed` VALUES (48,NULL,NULL,'66','16 August 2021 - 02:00 PM','19 August 2021 - 11:00 AM',NULL,NULL,'Ward (Non Aircon)-W01','Ian Dave Colina','466'),(49,NULL,NULL,'73','17 August 2021 - 02:00 PM','19 August 2021 - 11:00 AM',NULL,NULL,'OB Ward-0B01','Jacob Cortes','466'),(50,NULL,NULL,'67','16 August 2021 - 02:10 PM','19 August 2021 - 11:00 AM',NULL,NULL,'Private Room-P01','April Jane Garbo','466'),(51,NULL,NULL,'69','19 August 2021 - 02:00 PM','21 August 2021 - 11:00 AM',NULL,NULL,'Ward (Air Conditioned)-W/AC01','Albert Reyes','466'),(52,NULL,NULL,'75','18 August 2021 - 02:00 PM','20 August 2021 - 11:00 AM',NULL,NULL,'Family Room-F01','Julian Lee','466'),(53,NULL,NULL,'77','17 August 2021 - 02:00 PM','19 August 2021 - 11:00 AM',NULL,NULL,'OB Ward-0B02','Sandra Arcilla','466'),(54,NULL,NULL,'74','19 August 2021 - 02:00 PM','21 August 2021 - 11:00 AM',NULL,NULL,'OB Ward-OB07','Olivia Sanchez','466'),(55,NULL,NULL,'71','19 August 2021 - 02:00 PM','22 August 2021 - 11:00 AM',NULL,NULL,'Presidential Suite-PS01','William Lewis','466'),(56,NULL,NULL,'70','17 August 2021 - 02:00 PM','20 August 2021 - 11:00 AM',NULL,NULL,'Ward (Non Aircon)-W03','Anne Rodriguez','466'),(57,NULL,NULL,'76','19 August 2021 - 02:00 PM','22 August 2021 - 11:00 AM',NULL,NULL,'Pediatric Ward-PW01','Henry Lee','466'),(58,NULL,NULL,'78','19 August 2021 - 02:00 PM','21 August 2021 - 11:00 AM',NULL,NULL,'Ward (Air Conditioned)-W/AC02','Isaac Oporto','466');
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
  `room_id` varchar(500) DEFAULT NULL,
  `live_meeting_link` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=499 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (464,'66','162','1628812800','09:00 AM To 09:20 AM','09:00 AM','09:20 AM','Appointment Requested','08/12/21','1628793118','108','Treated','765','','Ian Dave Colina','Michael Rygel','hms-meeting-5202271-794163-466','https://meet.jit.si/hms-meeting-5202271-794163-466','466'),(465,'62','162','1628812800','10:20 AM To 10:40 AM','10:20 AM','10:40 AM','Complaining of palpitations in the heart every morning upon waking up.','08/12/21','1628793623','124','Pending Confirmation','765','','Mr Patient','Dr. Michael Rygel','hms-meeting-+639171963610-606691-466','https://meet.jit.si/hms-meeting-+639171963610-606691-466','466'),(466,'62','162','1628956800','10:45 PM To 11:00 PM','10:45 PM','11:00 PM','Request for Checkup for fever','08/14/21','1628937509','273','Pending Confirmation','763','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+639171963610-903853-466','https://meet.jit.si/hms-meeting-+639171963610-903853-466','466'),(467,'62','162','1628956800','10:45 PM To 11:00 PM','10:45 PM','11:00 PM','Request for Checkup for fever','08/14/21','1628937516','273','Cancelled','763','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+639171963610-423796-466','https://meet.jit.si/hms-meeting-+639171963610-423796-466','466'),(468,'62','162','1629043200','03:00 PM To 03:15 PM','03:00 PM','03:15 PM','Another request for fever checkup','08/14/21','1628937556','180','Treated','765','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+639171963610-153560-466','https://meet.jit.si/hms-meeting-+639171963610-153560-466','466'),(469,'78','162','1612022400','10:45 PM To 11:00 PM','10:45 PM','11:00 PM','Appointment Requested','08/19/21','1629312638','273','Treated','763','','Isaac Oporto','Dr. Michael Rygel','hms-meeting-+639874563312-232417-466','https://meet.jit.si/hms-meeting-+639874563312-232417-466','466'),(470,'67','175','1561219200',NULL,'','','Difficulty finding words','08/19/21','1629360346','0','Treated','763','','April Jane Garbo','Sunshine Zarga','hms-meeting-+639150446456-502503-466','https://meet.jit.si/hms-meeting-+639150446456-502503-466','466'),(471,'62','162','1629648000','03:30 PM To 03:45 PM','03:30 PM','03:45 PM','Consult for pain in the left elbow after falling from the bed','08/19/21','1629360733','186','Treated','765','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+639616327980-705240-466','https://meet.jit.si/hms-meeting-+639616327980-705240-466','466'),(472,'62','162','1628092800',NULL,'','','Appointment Requested','08/19/21','1629361486','0','Pending Confirmation','763','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+639616327980-464088-466','https://meet.jit.si/hms-meeting-+639616327980-464088-466','466'),(473,'67','175','1629648000',NULL,'','','Appointment Requested','08/19/21','1629361552','0','Treated','804','','April Jane Garbo','Sunshine Zarga','hms-meeting-+639150446456-786297-466','https://meet.jit.si/hms-meeting-+639150446456-786297-466','466'),(474,'68','170','1552579200',NULL,'','','I experience redness of my skin around the joint','08/19/21','1629362193','0','Treated','812','','Joseph Castro','Clark Perez','hms-meeting-09562931921-915950-466','https://meet.jit.si/hms-meeting-09562931921-915950-466','466'),(475,'69','173','1580572800','Not Selected','Not Selected','','Appointment Requested','08/19/21','1629362511','0','Treated','763','','Albert Reyes','Mary Ann Remedio','hms-meeting-09177654321-819453-466','https://meet.jit.si/hms-meeting-09177654321-819453-466','466'),(476,'71','174','1570896000',NULL,'','','I experience fast breathing','08/19/21','1629362796','0','Treated','763','','William Lewis','Peter Ceniza','hms-meeting-09177654321-578363-466','https://meet.jit.si/hms-meeting-09177654321-578363-466','466'),(477,'73','162','1549814400','03:00 PM To 03:15 PM','03:00 PM','03:15 PM','Appointment Requested','08/19/21','1629363073','180','Treated','763','','Jacob Cortes','Dr. Michael Rygel','hms-meeting-9326517433-349340-466','https://meet.jit.si/hms-meeting-9326517433-349340-466','466'),(478,'68','169','1629648000','04:30 PM To 04:45 PM','04:30 PM','04:45 PM','Another request for back pain check up','08/19/21','1629363686','198','Treated','805','','Joseph Castro','Mary Grace Teleron','hms-meeting-+639874563312-495006-466','https://meet.jit.si/hms-meeting-+639874563312-495006-466','466'),(479,'70','171','1623513600','Not Selected','Not Selected','','Double vision in the affected eye','08/19/21','1629364477','0','Treated','763','','Anne Rodriguez','Rose Ann Bergente','hms-meeting-09327416231-429399-466','https://meet.jit.si/hms-meeting-09327416231-429399-466','466'),(480,'72','162','1572192000','03:00 PM To 03:15 PM','03:00 PM','03:15 PM','Complaining abdominal cramps and pains','08/19/21','1629364693','180','Treated','763','','Angela Ariola','Dr. Michael Rygel','hms-meeting-9367416237-265807-466','https://meet.jit.si/hms-meeting-9367416237-265807-466','466'),(481,'75','172','1572710400','Not Selected','Not Selected','','Appointment Requested','08/19/21','1629365250','0','Treated','763','','Julian Lee','Carl Arisgado','hms-meeting-09327416231-346467-466','https://meet.jit.si/hms-meeting-09327416231-346467-466','466'),(482,'67','168','1630598400',NULL,'','','I feel palpitations and chest pain lately','08/19/21','1629365329','0','Treated','804','','April Jane Garbo','Felix Remedio','hms-meeting-09223458791-345391-466','https://meet.jit.si/hms-meeting-09223458791-345391-466','466'),(483,'77','175','1570291200','Not Selected','Not Selected','','Appointment Requested','08/19/21','1629365440','0','Treated','763','','Sandra Arcilla','Sunshine Zarga','hms-meeting-09115647895-363861-466','https://meet.jit.si/hms-meeting-09115647895-363861-466','466'),(484,'74','162','1558195200','10:45 PM To 11:00 PM','10:45 PM','11:00 PM','Another request for my CBC check up','08/19/21','1629365533','273','Treated','763','','Olivia Sanchez','Dr. Michael Rygel','hms-meeting-9326517433-169887-466','https://meet.jit.si/hms-meeting-9326517433-169887-466','466'),(487,'76','168','1564243200','Not Selected','Not Selected','','Appointment Requested','08/24/21','1629777345','0','Pending Confirmation','763','','Henry Lee','Felix Remedio','hms-meeting-09223458791-963165-466','https://meet.jit.si/hms-meeting-09223458791-963165-466','466'),(485,'62','162','1629475200','11:00 PM To 11:15 PM','11:00 PM','11:15 PM','Patient consult for headache','08/21/21','1629526987','276','Pending Confirmation','765','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+639616327980-875308-466','https://meet.jit.si/hms-meeting-+639616327980-875308-466','466'),(486,'62','162','1629648000','04:15 PM To 04:30 PM','04:15 PM','04:30 PM','Request appointment for sharp pain in the left shoulder','08/23/21','1629705691','195','Treated','765','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+639616327980-13489-466','https://meet.jit.si/hms-meeting-+639616327980-13489-466','466'),(496,'68','168','1630598400','06:00 PM To 06:15 PM','06:00 PM','06:15 PM','Need to set appointment for my backpain.','09/03/21','1630662754','216','Confirmed','804','','Joseph Castro','Felix Remedio','hms-meeting-+639615985110-21256-466','https://meet.jit.si/hms-meeting-+639615985110-21256-466','466'),(489,'62','162','1627228800','03:00 PM To 03:15 PM','03:00 PM','03:15 PM','Follow up check up ','08/25/21','1629884075','180','Treated','765','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+63 961 632 7980-775184-466','https://meet.jit.si/hms-meeting-+63 961 632 7980-775184-466','466'),(490,'62','162','1629820800','Not Selected','Not Selected','','Appointment Requested','08/25/21','1629884253','0','Requested','','Yes','Patient Clavio','Dr. Michael Rygel','hms-meeting-+63 961 632 7980-610778-466','https://meet.jit.si/hms-meeting-+63 961 632 7980-610778-466','466'),(491,'62','162','1629820800','Not Selected','Not Selected','','appointment checkup','08/25/21','1629884316','0','Treated','765','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+63 961 632 7980-153280-466','https://meet.jit.si/hms-meeting-+63 961 632 7980-153280-466','466'),(493,'62','162','1629993600','01:40 PM To 02:00 PM','01:40 PM','02:00 PM','Another request for back pain check up','08/27/21','1630054866','164','Pending Confirmation','765','','Patient Clavio','Dr. Michael Rygel','hms-meeting-+63 961 632 7980-664002-466','https://meet.jit.si/hms-meeting-+63 961 632 7980-664002-466','466'),(494,'81','162','1630598400','09:40 AM To 10:00 AM','09:40 AM','10:00 AM','Test Remarks','09/01/21','1630428223','116','Pending Confirmation','763','','Mailinator Patient','Dr. Michael Rygel','hms-meeting-+639176724020-605814-466','https://meet.jit.si/hms-meeting-+639176724020-605814-466','466'),(497,'67','169','1630598400','06:00 PM To 06:15 PM','06:00 PM','06:15 PM','Follow up check up','09/03/21','1630662756','216','Confirmed','805','','April Jane Garbo','Mary Grace Teleron','hms-meeting-+639150446456-589073-466','https://meet.jit.si/hms-meeting-+639150446456-589073-466','466'),(498,'67','168','1630598400','06:15 PM To 06:30 PM','06:15 PM','06:30 PM','','09/03/21','1630664527','219','Confirmed','804','','April Jane Garbo','Felix Remedio','hms-meeting-+639150446456-478942-466','https://meet.jit.si/hms-meeting-+639150446456-478942-466','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoemailtemplate`
--

LOCK TABLES `autoemailtemplate` WRITE;
/*!40000 ALTER TABLE `autoemailtemplate` DISABLE KEYS */;
INSERT INTO `autoemailtemplate` VALUES (59,'Patient Registration Confirmation','Dear {name}, You are registred to {company} as a patient to {doctor}. Regards','patient','Active','466'),(58,'Send Appointment confirmation to Doctor','Dear {name}, You are registered as a doctor in {department}. On behalf of {company}, Welcome!','doctor','Active','466'),(57,'Meeting Schedule Notification To Patient','Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information, please contact {hospital_name} . Regards','meeting_creation','Active','466'),(56,'Appointment creation email to patient','Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot}. Please confirm your appointment. For more information, please contact {hospital_name} Regards','appoinment_creation','Active','466'),(55,'Appointment Confirmation email to patient','Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information, please contact {hospital_name} Regards','appoinment_confirmation','Active','466'),(54,'Payment successful email to patient','Dear {name}, Your payment of {amount} was successful. Thank You. Please contact customer service for further queries.','payment','Active','466'),(102,'Payment successful email to patient','Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.','payment','Active','477'),(103,'Appointment Confirmation email to patient','Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards','appoinment_confirmation','Active','477'),(104,'Appointment creation email to patient','Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards','appoinment_creation','Active','477'),(105,'Meeting Schedule Notification To Patient','Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards','meeting_creation','Active','477'),(106,'Send Appointment confirmation to Doctor','Dear {name}, You are appointed as a doctor in {department} . Thank You {company}','doctor','Active','477'),(107,'Patient Registration Confirmation','Dear {name}, You are registred to {company} as a patient to {doctor}. Regards','patient','Active','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autosmstemplate`
--

LOCK TABLES `autosmstemplate` WRITE;
/*!40000 ALTER TABLE `autosmstemplate` DISABLE KEYS */;
INSERT INTO `autosmstemplate` VALUES (69,'Patient Registration Confirmation','Dear {name}, You are registred to {company} as a patient to {doctor}. Regards','patient','Active','466'),(68,'send appoint confirmation to Doctor','Dear {name}, You are registered as a doctor in {department} . On behalf of {company} Welcome!','doctor','Active','466'),(67,'Meeting Schedule Notification To Patient','Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact {hospital_name}. Regards','meeting_creation','Active','466'),(66,'Appointment creation sms to patient','Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot}. Please confirm your appointment. For more information contact {hospital_name}. Regards','appoinment_creation','Active','466'),(65,'Appointment Confirmation sms to patient','Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards','appoinment_confirmation','Active','466'),(64,'Payment successful sms to patient','Dear {name}, Your payment of {amount} was successful. Thank You. Please contact customer service for further queries. {company}','payment','Active','466'),(112,'Payment successful sms to patient','Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.','payment','Active','477'),(113,'Appointment Confirmation sms to patient','Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards','appoinment_confirmation','Active','477'),(114,'Appointment creation sms to patient','Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards','appoinment_creation','Active','477'),(115,'Meeting Schedule Notification To Patient','Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards','meeting_creation','Active','477'),(116,'send appoint confirmation to Doctor','Dear {name}, You are appointed as a doctor in {department} . Thank You {company}','doctor','Active','477'),(117,'Patient Registration Confirmation','Dear {name}, You are registred to {company} as a patient to {doctor}. Regards','patient','Active','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankb`
--

LOCK TABLES `bankb` WRITE;
/*!40000 ALTER TABLE `bankb` DISABLE KEYS */;
INSERT INTO `bankb` VALUES (72,'O-','[Test]Clinical History: This 62 year-old black female had been worked up by medicine for masses','466'),(71,'O+','0 Bags','466'),(70,'AB-','0 Bags','466'),(69,'AB+','0 Bags','466'),(68,'B-','0 Bags','466'),(67,'B+','0 Bags','466'),(66,'A-','0 Bags','466'),(65,'A+','0 Bags','466'),(153,'A+','0 Bags','477'),(154,'A-','0 Bags','477'),(155,'B+','0 Bags','477'),(156,'B-','0 Bags','477'),(157,'AB+','0 Bags','477'),(158,'AB-','0 Bags','477'),(159,'O+','0 Bags','477'),(160,'O-','0 Bags','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bed`
--

LOCK TABLES `bed` WRITE;
/*!40000 ALTER TABLE `bed` DISABLE KEYS */;
INSERT INTO `bed` VALUES (22,'Ward (Non Aircon)','W01','W01','16 August 2021 - 02:00 PM','19 August 2021 - 11:00 AM',NULL,'Ward (Non Aircon)-W01','466'),(23,'Ward (Non Aircon)','W02','W02',NULL,NULL,NULL,'Ward (Non Aircon)-W02','466'),(24,'Ward (Non Aircon)','W03','W03','17 August 2021 - 02:00 PM','20 August 2021 - 11:00 AM',NULL,'Ward (Non Aircon)-W03','466'),(25,'Neonatal Intensive Care Unit (NICU)','NICU01','NICU01',NULL,NULL,NULL,'Neonatal Intensive Care Unit (NICU)-NICU01','466'),(26,'Ward (Non Aircon)','W04','W04',NULL,NULL,NULL,'Ward (Non Aircon)-W04','466'),(27,'Neonatal Intensive Care Unit (NICU)','NICU02','NICU02',NULL,NULL,NULL,'Neonatal Intensive Care Unit (NICU)-NICU02','466'),(28,'Ward (Non Aircon)','W05','W05',NULL,NULL,NULL,'Ward (Non Aircon)-W05','466'),(29,'Ward (Non Aircon)','W06','W06',NULL,NULL,NULL,'Ward (Non Aircon)-W06','466'),(30,'Ward (Non Aircon)','W07','W07',NULL,NULL,NULL,'Ward (Non Aircon)-W07','466'),(31,'Ward (Non Aircon)','W08','W08',NULL,NULL,NULL,'Ward (Non Aircon)-W08','466'),(32,'Private Room','P01','P01','16 August 2021 - 02:10 PM','19 August 2021 - 11:00 AM',NULL,'Private Room-P01','466'),(33,'Ward (Non Aircon)','W09','W09',NULL,NULL,NULL,'Ward (Non Aircon)-W09','466'),(34,'Superior Private Room','SP01','SP01',NULL,NULL,NULL,'Superior Private Room-SP01','466'),(35,'Superior Private Room','SP02','SP02',NULL,NULL,NULL,'Superior Private Room-SP02','466'),(36,'Ward (Non Aircon)','W10','W10',NULL,NULL,NULL,'Ward (Non Aircon)-W10','466'),(37,'Pediatric Intensive Care Unit (NICU)','PNICU01','PNICU01',NULL,NULL,NULL,'Pediatric Intensive Care Unit (NICU)-PNICU01','466'),(38,'Pediatric Intensive Care Unit (NICU)','PNICU02','PNICU02',NULL,NULL,NULL,'Pediatric Intensive Care Unit (NICU)-PNICU02','466'),(39,'Suite Room','S01','S01',NULL,NULL,NULL,'Suite Room-S01','466'),(40,'Suite Room','S02','S02',NULL,NULL,NULL,'Suite Room-S02','466'),(41,'Presidential Suite','PS01','PS01','19 August 2021 - 02:00 PM','22 August 2021 - 11:00 AM',NULL,'Presidential Suite-PS01','466'),(42,'Presidential Suite','PS02','PS02',NULL,NULL,NULL,'Presidential Suite-PS02','466'),(43,'OB Ward','0B01','0B01','17 August 2021 - 02:00 PM','19 August 2021 - 11:00 AM',NULL,'OB Ward-0B01','466'),(44,'OB Ward','0B02','0B02','17 August 2021 - 02:00 PM','19 August 2021 - 11:00 AM',NULL,'OB Ward-0B02','466'),(45,'OB Ward','OB03','OB03',NULL,NULL,NULL,'OB Ward-OB03','466'),(46,'OB Ward','OB04','OB04',NULL,NULL,NULL,'OB Ward-OB04','466'),(47,'Deluxe Suite Room','OB05','OB05',NULL,NULL,NULL,'Deluxe Suite Room-OB05','466'),(48,'OB Ward','OB06','OB06',NULL,NULL,NULL,'OB Ward-OB06','466'),(49,'OB Ward','OB07','OB07','19 August 2021 - 02:00 PM','21 August 2021 - 11:00 AM',NULL,'OB Ward-OB07','466'),(50,'OB Ward','OB08','OB08',NULL,NULL,NULL,'OB Ward-OB08','466'),(51,'OB Ward','OB09','OB09',NULL,NULL,NULL,'OB Ward-OB09','466'),(52,'OB Ward','OB10','OB10',NULL,NULL,NULL,'OB Ward-OB10','466'),(53,'Ward (Non Aircon)','W11','W11',NULL,NULL,NULL,'Ward (Non Aircon)-W11','466'),(54,'Ward (Non Aircon)','W12','W12',NULL,NULL,NULL,'Ward (Non Aircon)-W12','466'),(55,'Ward (Non Aircon)','W13','W13',NULL,NULL,NULL,'Ward (Non Aircon)-W13','466'),(56,'Ward (Non Aircon)','W14','W14',NULL,NULL,NULL,'Ward (Non Aircon)-W14','466'),(57,'Ward (Non Aircon)','W15','W15',NULL,NULL,NULL,'Ward (Non Aircon)-W15','466'),(58,'Ward (Non Aircon)','W16','W16',NULL,NULL,NULL,'Ward (Non Aircon)-W16','466'),(59,'Ward (Non Aircon)','W17','W17',NULL,NULL,NULL,'Ward (Non Aircon)-W17','466'),(60,'Ward (Non Aircon)','W18','W18',NULL,NULL,NULL,'Ward (Non Aircon)-W18','466'),(61,'Ward (Non Aircon)','W19','W19',NULL,NULL,NULL,'Ward (Non Aircon)-W19','466'),(62,'Ward (Non Aircon)','W20','W20',NULL,NULL,NULL,'Ward (Non Aircon)-W20','466'),(63,'Private Room','P02','P02',NULL,NULL,NULL,'Private Room-P02','466'),(64,'Private Room','P03','P03',NULL,NULL,NULL,'Private Room-P03','466'),(65,'Private Room','P04','PO4',NULL,NULL,NULL,'Private Room-P04','466'),(66,'Private Room','P05','P05',NULL,NULL,NULL,'Private Room-P05','466'),(67,'Private Room','P06','P06',NULL,NULL,NULL,'Private Room-P06','466'),(68,'Private Room','P07','P07',NULL,NULL,NULL,'Private Room-P07','466'),(69,'Private Room','P08','P08',NULL,NULL,NULL,'Private Room-P08','466'),(70,'Private Room','P09','P09',NULL,NULL,NULL,'Private Room-P09','466'),(71,'Private Room','P10','P10',NULL,NULL,NULL,'Private Room-P10','466'),(72,'Superior Private Room','SP03','SP03',NULL,NULL,NULL,'Superior Private Room-SP03','466'),(73,'Superior Private Room','SP04','SP04',NULL,NULL,NULL,'Superior Private Room-SP04','466'),(74,'Superior Private Room','SP05','SP05',NULL,NULL,NULL,'Superior Private Room-SP05','466'),(75,'Superior Private Room','SP06','SP06',NULL,NULL,NULL,'Superior Private Room-SP06','466'),(76,'Superior Private Room','SP07','SP07',NULL,NULL,NULL,'Superior Private Room-SP07','466'),(77,'Superior Private Room','SP08','SP08',NULL,NULL,NULL,'Superior Private Room-SP08','466'),(78,'Superior Private Room','SP09','SP09',NULL,NULL,NULL,'Superior Private Room-SP09','466'),(79,'Superior Private Room','SP10','SP10',NULL,NULL,NULL,'Superior Private Room-SP10','466'),(80,'Ward (Air Conditioned)','W/AC01','W/AC01','19 August 2021 - 02:00 PM','21 August 2021 - 11:00 AM',NULL,'Ward (Air Conditioned)-W/AC01','466'),(81,'Ward (Air Conditioned)','W/AC02','W/AC02','19 August 2021 - 02:00 PM','21 August 2021 - 11:00 AM',NULL,'Ward (Air Conditioned)-W/AC02','466'),(82,'Family Room','F01','F01','18 August 2021 - 02:00 PM','20 August 2021 - 11:00 AM',NULL,'Family Room-F01','466'),(83,'Family Room A','FO2','F02',NULL,NULL,NULL,'Family Room A-FO2','466'),(84,'Premiere Suite Room','PS01','PS01',NULL,NULL,NULL,'Premiere Suite Room-PS01','466'),(85,'Premiere Suite Room','PSO2','PS02',NULL,NULL,NULL,'Premiere Suite Room-PSO2','466'),(86,'Pediatric Ward','PW01','PW01','19 August 2021 - 02:00 PM','22 August 2021 - 11:00 AM',NULL,'Pediatric Ward-PW01','466'),(87,'Pediatric Ward','PW02','PW02',NULL,NULL,NULL,'Pediatric Ward-PW02','466'),(89,'Neonatal Intensive Care Unit (NICU)','Ward07','Conclusions  Current practice generates operative reports that vary widely',NULL,NULL,NULL,'Neonatal Intensive Care Unit (NICU)-Ward07','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bed_category`
--

LOCK TABLES `bed_category` WRITE;
/*!40000 ALTER TABLE `bed_category` DISABLE KEYS */;
INSERT INTO `bed_category` VALUES (15,'Neonatal Intensive Care Unit (NICU) A','Neonatal Intensive Care Unit (NICU) - Sea View/ Mountain View, Air-conditioned Room, Watcher\'s Bed','466'),(16,'Cardiovascular Thoracic Intensive Care Unit (CT-ICU)','Cardiovascular Thoracic Intensive Care Unit (CT-ICU) - Free Wife Access, Dining Set, Couch','466'),(17,'Pediatric Intensive Care Unit (NICU)','Pediatric Intensive Care Unit (NICU) - Air-conditioned Room, Watcher\'s Bed','466'),(18,'Intensive Care Unit (ICU)','Intensive Care Unit (ICU) - Watcher\'s Bed, Private Cr, Hot & Cold Shower','466'),(19,'Presidential Suite','Presidential Suite - TV with Cables, Free Wife Access,','466'),(20,'Suite Room','Sea View / Mountain View, Air-conditioned Room','466'),(21,'Family Room A','TV with Cables, Free Wife Access, Dining Set, Refrigerator, Microwave Oven','466'),(22,'Superior Private Room','Sea View/Mountain View, Air-conditioned Room, Bigger Space','466'),(23,'Private Room','Air-conditioned Room, Watcher\'s Bed, Private Cr, Hot & Cold Shower','466'),(24,'Ward (Non Aircon)','Electric Fan, Common CR, Common Tv, Free Wifi Access, Hot & Cold Shower Room','466'),(25,'OB Ward','OB Ward - Electric Fan, Common CR, Common Tv','466'),(26,'Deluxe Suite Room','Deluxe Suite Room - Sea View/ Mountain View, Air-conditioned Room, Watcher\'s Bed','466'),(27,'CORONARY CARE UNIT (CCU)','CORONARY CARE UNIT (CCU) - Watcher\'s Bed, Private Cr, Hot & Cold Shower','466'),(28,'ISOLATION – LARGE (W/ COMFORT ROOM)','ISOLATION – LARGE (W/ COMFORT ROOM) - Air-conditioned Room, Watcher\'s Bed, Private Cr','466'),(29,'ISOLATION – SMALL','ISOLATION – SMALL - Dining Set, Couch, Mini Kitchen, Refrigerator, Microwave Oven','466'),(30,'Ward (Air Conditioned)','Ward (Air Conditioned) - Air-conditioned Room, Watcher\'s Bed, Private Cr','466'),(31,'Premiere Suite Room','Premiere Suite Room - Watcher\'s Bed, Private Cr, Hot & Cold Shower, TV with Cable','466'),(32,'Pediatric Ward','Pediatric Ward - Electric Fan, Common CR, Common Tv, Free Wifi Access, Hot & Cold Shower Room','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (58,'Cardiology','<p>Description</p>\r\n',NULL,NULL,'466'),(60,'Surgery','<p>Surgeon</p>\r\n',NULL,NULL,'466'),(61,'Pediatrics','<p>Pediatricians</p>\r\n',NULL,NULL,'466'),(62,'Orthopedics','<p>Orthopedists</p>\r\n',NULL,NULL,'466'),(63,'Obstetrics and Gynecology','<p><br />\r\nGynaecologist</p>\r\n',NULL,NULL,'466'),(64,'Neurosurgery','<p>Neurosurgeon</p>\r\n',NULL,NULL,'466'),(65,'Dermatology','<p>Dermatologist</p>\r\n',NULL,NULL,'466'),(66,'Pulmonary','<p>Pulmonologist</p>\r\n',NULL,NULL,'466'),(67,'Rehabilitation Medicine','<p>Physiatry</p>\r\n',NULL,NULL,'466'),(68,'Ophthalmology','<p>Opthalmologist</p>\r\n',NULL,NULL,'466'),(69,'Neurology','<p>Neurologist</p>\r\n',NULL,NULL,'466'),(70,'Anesthesia','<p>Anesthesia</p>\r\n',NULL,NULL,'477'),(71,'Eye, Ear, Nose and Throat','<p>Eye, Ear, Nose and Throat</p>\r\n',NULL,NULL,'477'),(72,'Orthopedics','<p>Orthopedics</p>\r\n',NULL,NULL,'477'),(73,'Psychiatrist','<p>Psychologist</p>\r\n',NULL,NULL,'466'),(74,'Hematology','<p>Hematologist</p>\r\n',NULL,NULL,'466'),(75,'Endocrinology','<p>Endocrinologist</p>\r\n',NULL,NULL,'466'),(76,'OB-GYNs','<p>Obstetrician-Gynecologist</p>\r\n',NULL,NULL,'466'),(77,'Gastroentology','<p>Gastroenterologist</p>\r\n',NULL,NULL,'466'),(78,'Nephrology','<p>Nephrologist</p>\r\n',NULL,NULL,'466'),(79,'Urology','<p>Urologist</p>\r\n',NULL,NULL,'466'),(80,'Otolaryngology','<p>Otolaryngologist</p>\r\n',NULL,NULL,'466'),(81,'Oncology','<p>Oncologist</p>\r\n',NULL,NULL,'477'),(82,'Radiology','<p>Radiologist</p>\r\n',NULL,NULL,'477');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (162,'uploads/Michael-Gelig.jpg','Dr. Michael Rygel','doctor@rygel.biz','Cebu Doctors College','+639176724020','Cardiology','Cardiologist',NULL,NULL,'765','466'),(168,'uploads/Felix-Remedio-CHH-Doctor.jpg','Felix Remedio','doctor1.rygeltech@gmail.com','Pit-os Cebu City','+639562931921','Cardiology','Cardiologist',NULL,NULL,'804','466'),(169,'uploads/Mary-Grace-Teleron-CCH-Doctor.jpg','Mary Grace Teleron','doctor2.rygeltech@gmail.com','Mandaue City','+639981674906','Surgery','Pediatrician',NULL,NULL,'805','466'),(170,'uploads/Clark-Perez-_Mandaue_-_Doctor.jpg','Clark Perez','doctor1.sugbodoc@mailinator.com','239 Bonifacio District','+639177654321','Orthopedics','Orthopedists',NULL,NULL,'816','466'),(171,'uploads/Rose-Ann-Bregente-Mandaue_-Doctor.jpg','Rose Ann Bergente','doctor2.sugbodoc@mailinator.com','Camputhaw Capitol Cebu City','+639150332656','Ophthalmology','Opthalmologist',NULL,NULL,'817','466'),(172,'uploads/Carl-Arisgado-Makati-Doctor.jpg','Carl Arisgado','doctor3.sugbodoc@mailinator.com','Lapu-Lapu City','+639782341561','Neurology','Neurologist',NULL,NULL,'818','466'),(173,'uploads/Mary-Ann-Remedio-Makati-Doctor.jpg','Mary Ann Remedio','doctor4.sugbodoc@mailinator.com','Mandaue City','+639367416237','Dermatology','Dermatologist',NULL,NULL,'819','466'),(174,'uploads/Peter-Ceniza-Manila-Doctor.jpg','Peter Ceniza','doctor5.sugbodoc@mailinator.com','Cadahuan Talamban Cebu City','+639326451723','Pulmonary','Pulmonologist',NULL,NULL,'820','466'),(175,'uploads/Sunshine-Zarga-Manila-Doctor.jpg','Sunshine Zarga','doctor6.sugbodoc@mailinator.com','239 Bonifacio District','+639177654321','Cardiology','Cardiologist',NULL,NULL,'821','466'),(176,'uploads/Alexander-Perez-Sugbodoc.jpg','Alexander Perez','doctor7.sugbodoc@mailinator.com','Lapu - Lapu City','+639915642347','Psychiatrist','Psychologist',NULL,NULL,'826','466'),(177,'uploads/Amelia-Lopez-Sugbodoc2.jpg','Amelia Lopez','doctor8.sugbodoc@mailinator.com','Tintay Talamban Cebu City','+639914324431','Hematology','Hematologist',NULL,NULL,'827','466'),(178,'uploads/Lucas-Reynes-Sugbodoc.jpg','Lucas Reynes','doctor9.sugbodoc@mailinator.com','Tigbao Cebu City','+639435316789','Endocrinology','Endocrinologist',NULL,NULL,'828','466'),(179,'uploads/Untitled-1.jpg','Ava Clarus','doctor10.sugbodoc@mailinator','Banilad Cebu City','+639990667492','OB-GYNs','Obstetrician-Gynecologist',NULL,NULL,'829','466'),(180,'uploads/Benjamin-Abcede-Sugbodoc.jpg','Benjamin Abcede','doctor11.sugbodoc@mailinator.com','Bacayan Cebu City','+639520446457','Gastroentology','Gastroenterologist',NULL,NULL,'830','466'),(181,'uploads/Isabelle-Aguilar-Sugbodoc.jpg','Isabelle Aguilar','doctor12.sugbodoc@mailinator','Hi-way77, Talamban Cebu City','+639613202040','Nephrology','Nephrologist',NULL,NULL,'831','466'),(182,'uploads/Oliver-Alcantara-Sugbodoc.jpg','Oliver Alcantara','doctor13.sugbodoc@mailinator.com','Mango Avenue Cebu City','+639203338010','Urology','Urologist',NULL,NULL,'832','466'),(183,'uploads/Evelyn-Ang-Sugbodoc.jpg','Evelyn Ang','doctor14.sugbodoc@mailinator.com','V-Road Cebu City','+639105233217','Otolaryngology','Otorlaryngologist',NULL,NULL,'833','466'),(184,'uploads/Yam-Pepito-Radiologist.jpg','Faith Aquino','doctor1.mandaue@mailinator.com','Fuente Osmena Cebu City','+639150446456','Oncology','Oncologist',NULL,NULL,'834','477'),(185,'uploads/Reymar-Zanoria-Raddiologist.jpg','Jose Baclayon','doctor2.mandaue@mailinator.com','Guadalupe Cebu City','+639615985110','Radiology','Radiologist',NULL,NULL,'835','477');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor`
--

LOCK TABLES `donor` WRITE;
/*!40000 ALTER TABLE `donor` DISABLE KEYS */;
INSERT INTO `donor` VALUES (19,'Patrick Bautista','O-','25','Male','25-07-2021','09177654321','patrick.bautista@mailinator.com','08/18/21','466'),(20,'Melody Torres','O+','24','Female','02-08-2021','09177654321','melody.torres@mailinator.com','08/18/21','466'),(21,'Maricar Sabay','AB+','38','Female','10-07-2021','09674531734','maricar.sabay@mailinator.com','08/18/21','466'),(22,'Donald Suarez','B+','40','Male','25-06-2021','09326451723','donald.suarez@mailinator.com','08/18/21','466'),(23,'Joseph Castro','AB-','28','Male','28-08-2021','9367416237','joseph.castro@mailinator.com','08/18/21','466'),(24,'April Jane Garbo','B+','23','Female','10-03-2021','09158645782','april.garbo@mailinator.com','08/18/21','466'),(25,'Anne Zamora','A+','36','Female','10-07-2021','09177654321','anne.zamora@mailinator.com','08/18/21','466'),(26,'James Uy','A-','39','Male','26-04-2021','09150332656','james.uy@mailinator.com','08/18/21','466'),(27,'Kim Adolfo','AB+','27','Female','10-03-2021','09156457982','kim.adolfo@mailinator.com','08/18/21','466'),(28,'Mark Ouano','O-','26','Male','25-02-2021','09672415675','maark.ouano@mailinator.com','08/18/21','466'),(29,'[Test]Clinical History: This 62 year-old black female had been worked up by medicine for masses','O-','25','Female','27-08-2021','09150446456','jessicalewis@gmail.com','08/27/21','466'),(30,'Jessica Lewis','O+','[Test]Clin','Female','27-08-2021','09150446456','jessicalewis@gmail.com','08/27/21','466'),(31,'Jessica Lewis','O+','25','Female','27-08-2021','[Test]Clinical History: This 62 year-old black female had been worked up by medicine for masses','jessicalewis@gmail.com','08/27/21','466'),(32,'Jessica Lewis','O+','25','Female','27-08-2021','09150446456','[Test]Clinical History: This 62 year-old black female had been worked up by medicine for masses','08/27/21','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (62,'','1629949944','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(61,'','1629949944','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(60,'','1629949944','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(59,'','1629949944','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(58,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(57,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(56,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(55,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(54,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(53,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(48,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(49,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(50,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(51,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(52,'','1629949943','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','All Patient','763','466'),(63,'','1629950380','<p>{phone} {email}</p>\r\n\r\n<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466'),(64,'','1629950630','<p>{phone} {email}</p>\r\n\r\n<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n\r\n<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n\r\n<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attention so that their content will more predictably contain the most relevant information, an accomplishment that in turn might channel thinking in beneficial directions during performance of the operation. Our objective was to determine how frequently operative reports from university and community hospitals for uncomplicated and complicated (with BDIs) procedures contained a description of the critical findings and key technical steps of the operation. What we address herein is the content of the procedural part of the operative report, not the higher-order skeleton that includes surgeon, estimated blood loss, and disposition of the specimen. In this article, the term&nbsp;<em>operative report</em>&nbsp;adheres to this narrow definition throughout.</p>\r\n\r\n<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13&nbsp;Absent are studies concerning what should be included with regard to achieving the technical goals of the operation and to describing the findings. Also, little attention has been given to the format of the operative report or to its ideal features.</p>\r\n\r\n<p>This research examines the features of operative reports for laparoscopic cholecystectomy, a common operation that (although similar among cases) entails variations in important contextual detail and carries the major risk of bile duct injury (BDI). Techniques to help avoid BDIs have been studied in detail, and the mechanisms by which injuries occur are reasonably well understood.14-16&nbsp;The objectives of operative reports deserve more attentio','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466'),(65,'','1629951018','<p>{phone} {email}</p>\r\n\r\n<p>Results</p>\r\n\r\n<p><strong>Cognitive task analysis</strong></p>\r\n\r\n<p>Cognitive task analysis produced the algorithm in&nbsp;Table 1, which consists of the sequential goals and consequent actions involved in laparoscopic cholecystectomy. There are many sources of information about CTA, but we followed the ideas expressed in the&nbsp;<em>Handbook of Cognitive Task Design</em>17&nbsp;for this work.</p>\r\n\r\n<p><strong>Model operative report elements</strong></p>\r\n\r\n<p>Using CTA as a guide, we judged that the model operative report should include descriptions of the following: (1) retraction of the gallbladder, (2) thorough clearance of the infundibulum bordering the Calot triangle, (3) identification of the cystic duct&ndash;infundibulum junction, (4) clipping and cutting of the cystic duct and cystic artery, (5) separation of the gallbladder from the liver bed, and (6) findings such as inflammatory changes, difficulties encountered, bleeding, and the aforementioned irregular cues. The percentage of cases with each key element is given in&nbsp;Table 2.</p>\r\n\r\n<p><strong>OPERATIVE REPORTS FROM 125 CASES WITHOUT BDIs</strong></p>\r\n\r\n<p>The text of the operative reports in cases without BDIs from university and community hospitals was similar. Thirty-one operative reports (24.8%) contained what was considered to be a minimum of the desired elements (as previously defined). Twenty of 31 described lateral retraction of the infundibulum, so the proportion with all key elements would fall to 16.0% if this criterion was required.</p>\r\n\r\n<p>No mention was made of retracting the gallbladder in 21 cases (16.8%). Cephalad fundus retraction was described in 99 cases (79.2%), and lateral retraction of the gallbladder infundibulum was noted in 58 cases (46.4%). Both steps were described in 57 cases (45.6%).</p>\r\n\r\n<p>Descriptions of the dissection (Table 3) took the following 3 main forms: (1) notation of thorough dissection of the Calot triangle or the gallbladder infundibulum that exposed the cystic duct and artery, (2) an abbreviated account of the dissection, or (3) a simple statement that the cystic duct and artery were exposed.</p>\r\n\r\n<p>Fifty-one operative reports (40.8%) described thorough dissection of the infundibulum bordering the Calot triangle (Table 4), 44 (35.2%) contained an abbreviated description of the dissection, and 30 (24.0%) simply stated that the cystic duct and artery were identified or skeletonized. In 6 cases, the term&nbsp;<em>critical view of safety</em>&nbsp;was used, but there was no further elaboration that clarified what was actually performed in 4 of these cases.</p>\r\n\r\n<p>Variations in descriptions of how the cystic duct and artery were clipped ranged from a statement that they were clipped (16 operative reports [12.8%]) to statements of how many clips were placed on either side of the transection. The number of clips placed was given in 107 operative reports (85.6%). The median number was 6 clips (range, 4-10). Irregular cues were noted in 30 operative reports (24.0%; mean number, 0.5).</p>\r\n\r\n<p><strong>OPERATIVE REPORTS FROM 125 CASES WITH BDIs</strong></p>\r\n\r\n<p>None of the operative reports in cases with BDIs contained what we perceived to be a minimum of the desired elements. The steps to orient the gallbladder were described in 29 operative reports (23.2%), the word &ldquo;retracted&rdquo; was the extent of the description in 36 operative reports (28.8%), &ldquo;cephalad retraction of the fundus&rdquo; was the expression used in 58 operative reports (46.4%), and lateral retraction of the infundibulum was mentioned in 13 operative reports (10.0%). The phrase &ldquo;preferred cephalad retraction of the fundus plus lateral retraction of the infundibulum&rdquo; was used in 12 operative reports (9.6%).</p>\r\n\r\n<p>Five operative reports (4.0%) described thorough dissection of the medial aspect of the infundibulum bordering the Calot triangle. Eighty-one operative reports (64.8%) gave an incomplete account of the dissection. Thirty-nine operative reports (31.2%) simply stated that a dissection was performed and that the cystic duct and artery were identified.</p>\r\n\r\n<p>All the operative reports in cases with BDI stated that the cystic duct was divided. In 36 operative reports (28.8%), the cystic duct was said to have been clipped. In the other 89 operative reports (71.2%), the number of clips on the cystic duct and artery was specified (range, 4-15; median, 6). Irregular cues were reported in 100 operative reports (80.0%; mean number of irregular cues, 1.9).</p>\r\n\r\n<p><strong>Comparison of cases with vs without bdi</strong></p>\r\n\r\n<p>Operative reports for cases with BDI contained fewer key elements than those without BDI, but key elements were missing in most of the uncomplicated cases as well (Table 2). The association of the reported elements with BDI is shown for bivariate (Table 2) and multivariate (Table 4) analyses. On multivariate analysis, adequate dissection within the Calot triangle, identification of the cystic duct&ndash;infundibulum junction, and lateral retraction of the infundibulum correlated with uncomplicated cases. More irregular cues, dissection of the cystic duct&ndash;common bile duct junction, and reports of an extra biliary or tubular structure were seen in BDI cases.</p>\r\n\r\n<p>Irregular cues, noted in 22.2% of cases, were more common in cases with BDI than without BDI (80% vs 24%;&nbsp;<em>P</em>&nbsp;&lt;&nbsp;.001, &chi;2&nbsp;test). Fewer irregular cues were reported in cases without BDI than with BDI (0.4 vs 2.0;&nbsp;<em>P</em>&nbsp;&lt;&nbsp;.001, &chi;2&nbsp;test).</p>\r\n\r\n<p><strong>Multivariate analysis</strong></p>\r\n\r\n<p>On multivariate analysis (Table 4), elements of operative reports that correlated with uncomplicated laparoscopic cholecystectomy were lateral retraction of the infundibulum, thorough dissection of the medial surface of the infundibulum, and identification of the cystic duct&ndash;infundibulum junction. Elements of operative reports that correlated with BDI included absence of these elements, notation of an abnormal or additional bile duct, dissection of the common bile duct&ndash;cystic duct junction, and description of irregular cues.</p>\r\n\r\n<p>Comment</p>\r\n\r\n<p>In today&#39;s world, as the complexity of work increases, so do the cognitive demands on humans within the systems. Simple descriptions of what is manually performed by humans fail to capture important cognitive (abstract) considerations such as the intermediate and higher-order objectives that are meant to be satisfied.</p>\r\n\r\n<p>To elucidate how the human mind functions as it performs complex tasks such as an operation, cognitive psychologists have created a model18&nbsp;in which cognitive activity is divided into 2 levels, an action level and a controlling meta-level (Figure). The executive meta-level guides the action using feedback from the action level so that the goals of the procedure will be met. To do this, the meta-level constructs a dynamic model of the action level and integrates knowledge, goals, strategies, and progress. Accuracy of the model is critical to decision making because the performance of the mind is model based, which might lead to errors if that model was an inaccurate representation of reality. Scarce attentional resources are allocated to features of the operative field based on their perceived priorities. Because the focus of visual attention spans a mere 2.5&deg; and because the progress of the action attracts most of the attention, less important items within the field of view inevitably go unattended.19,20&nbsp;As argued herein, this psychological model of the human mind is an appropriate artifact on which to base improvements in the design of operative reports.</p>\r\n\r\n<p>The increasing complexity of work, coupled with the changing roles of humans in systems, led in recent decades to the development of CTA, hierarchical task analysis, and cognitive task design as superior ways to conceptualize activities because they bring to the fore the meta-level concerns at the heart of procedures.17,21&nbsp;Algorithms depicting such analyses for complex systems are often themselves complex, but this is not the case when CTA is used to describe a laparoscopic cholecystectomy or other operations. It is straightforward in this setting, and the results provide a valuable perspective on the work.</p>\r\n\r\n<p>In addition to providing a more reliable record of an operation, CTA should aid decision making in the operating room. By framing the thinking of the surgeon, it is expected to enhance the chances of the desired result, namely, a complication-free operation. In a useful summary, Stanovich22&nbsp;notes that 2 kinds of rationality are involved in human decision making, epistemic and instrumental. This translates into thinking based on what is true (epistemic) and on what to do (instrumental). The cognitive parts of CTA in&nbsp;Table 1&nbsp;support both. What is true in this case refers to the meta-level model of the anatomy and the significance of disconfirmatory findings (eg, irregular cues). What to do refers to the technical strategy that optimizes the chances of avoiding, for example, misidentification of the common duct for the cystic duct, the error underlying most BDIs (class III injury).14</p>\r\n\r\n<p>Expectations of better results from psychological efforts like this are well supported empirically.23-25&nbsp;Explicit delineation of the goals, which is a central objective of task analysis, greatly increases the chances that they will be attended to and addressed during the performance. The fact that the operation precedes dictation of the operative report is not an obstacle because the desired content of the operative report would be continually rehearsed during training and previous practice if this approach was part of a program that redesigned operative reports.</p>\r\n\r\n<p>Cognitive task analysis as summarized in&nbsp;Table 1&nbsp;','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466'),(66,'','1629954915','<p>{phone} {email}</p>\r\n\r\n<p>Results</p>\r\n\r\n<p><strong>Cognitive task analysis</strong></p>\r\n\r\n<p>Cognitive task analysis produced the algorithm in&nbsp;Table 1, which consists of the sequential goals and consequent actions involved in laparoscopic cholecystectomy. There are many sources of information about CTA, but we followed the ideas expressed in the&nbsp;<em>Handbook of Cognitive Task Design</em>17&nbsp;for this work.</p>\r\n\r\n<p><strong>Model operative report elements</strong></p>\r\n\r\n<p>Using CTA as a guide, we judged that the model operative report should include descriptions of the following: (1) retraction of the gallbladder, (2) thorough clearance of the infundibulum bordering the Calot triangle, (3) identification of the cystic duct&ndash;infundibulum junction, (4) clipping and cutting of the cystic duct and cystic artery, (5) separation of the gallbladder from the liver bed, and (6) findings such as inflammatory changes, difficulties encountered, bleeding, and the aforementioned irregular cues. The percentage of cases with each key element is given in&nbsp;Table 2.</p>\r\n\r\n<p><strong>OPERATIVE REPORTS FROM 125 CASES WITHOUT BDIs</strong></p>\r\n\r\n<p>The text of the operative reports in cases without BDIs from university and community hospitals was similar. Thirty-one operative reports (24.8%) contained what was considered to be a minimum of the desired elements (as previously defined). Twenty of 31 described lateral retraction of the infundibulum, so the proportion with all key elements would fall to 16.0% if this criterion was required.</p>\r\n\r\n<p>No mention was made of retracting the gallbladder in 21 cases (16.8%). Cephalad fundus retraction was described in 99 cases (79.2%), and lateral retraction of the gallbladder infundibulum was noted in 58 cases (46.4%). Both steps were described in 57 cases (45.6%).</p>\r\n\r\n<p>Descriptions of the dissection (Table 3) took the following 3 main forms: (1) notation of thorough dissection of the Calot triangle or the gallbladder infundibulum that exposed the cystic duct and artery, (2) an abbreviated account of the dissection, or (3) a simple statement that the cystic duct and artery were exposed.</p>\r\n\r\n<p>Fifty-one operative reports (40.8%) described thorough dissection of the infundibulum bordering the Calot triangle (Table 4), 44 (35.2%) contained an abbreviated description of the dissection, and 30 (24.0%) simply stated that the cystic duct and artery were identified or skeletonized. In 6 cases, the term&nbsp;<em>critical view of safety</em>&nbsp;was used, but there was no further elaboration that clarified what was actually performed in 4 of these cases.</p>\r\n\r\n<p>Variations in descriptions of how the cystic duct and artery were clipped ranged from a statement that they were clipped (16 operative reports [12.8%]) to statements of how many clips were placed on either side of the transection. The number of clips placed was given in 107 operative reports (85.6%). The median number was 6 clips (range, 4-10). Irregular cues were noted in 30 operative reports (24.0%; mean number, 0.5).</p>\r\n\r\n<p><strong>OPERATIVE REPORTS FROM 125 CASES WITH BDIs</strong></p>\r\n\r\n<p>None of the operative reports in cases with BDIs contained what we perceived to be a minimum of the desired elements. The steps to orient the gallbladder were described in 29 operative reports (23.2%), the word &ldquo;retracted&rdquo; was the extent of the description in 36 operative reports (28.8%), &ldquo;cephalad retraction of the fundus&rdquo; was the expression used in 58 operative reports (46.4%), and lateral retraction of the infundibulum was mentioned in 13 operative reports (10.0%). The phrase &ldquo;preferred cephalad retraction of the fundus plus lateral retraction of the infundibulum&rdquo; was used in 12 operative reports (9.6%).</p>\r\n\r\n<p>Five operative reports (4.0%) described thorough dissection of the medial aspect of the infundibulum bordering the Calot triangle. Eighty-one operative reports (64.8%) gave an incomplete account of the dissection. Thirty-nine operative reports (31.2%) simply stated that a dissection was performed and that the cystic duct and artery were identified.</p>\r\n\r\n<p>All the operative reports in cases with BDI stated that the cystic duct was divided. In 36 operative reports (28.8%), the cystic duct was said to have been clipped. In the other 89 operative reports (71.2%), the number of clips on the cystic duct and artery was specified (range, 4-15; median, 6). Irregular cues were reported in 100 operative reports (80.0%; mean number of irregular cues, 1.9).</p>\r\n\r\n<p><strong>Comparison of cases with vs without bdi</strong></p>\r\n\r\n<p>Operative reports for cases with BDI contained fewer key elements than those without BDI, but key elements were missing in most of the uncomplicated cases as well (Table 2). The association of the reported elements with BDI is shown for bivariate (Table 2) and multivariate (Table 4) analyses. On multivariate analysis, adequate dissection within the Calot triangle, identification of the cystic duct&ndash;infundibulum junction, and lateral retraction of the infundibulum correlated with uncomplicated cases. More irregular cues, dissection of the cystic duct&ndash;common bile duct junction, and reports of an extra biliary or tubular structure were seen in BDI cases.</p>\r\n\r\n<p>Irregular cues, noted in 22.2% of cases, were more common in cases with BDI than without BDI (80% vs 24%;&nbsp;<em>P</em>&nbsp;&lt;&nbsp;.001, &chi;2&nbsp;test). Fewer irregular cues were reported in cases without BDI than with BDI (0.4 vs 2.0;&nbsp;<em>P</em>&nbsp;&lt;&nbsp;.001, &chi;2&nbsp;test).</p>\r\n\r\n<p><strong>Multivariate analysis</strong></p>\r\n\r\n<p>On multivariate analysis (Table 4), elements of operative reports that correlated with uncomplicated laparoscopic cholecystectomy were lateral retraction of the infundibulum, thorough dissection of the medial surface of the infundibulum, and identification of the cystic duct&ndash;infundibulum junction. Elements of operative reports that correlated with BDI included absence of these elements, notation of an abnormal or additional bile duct, dissection of the common bile duct&ndash;cystic duct junction, and description of irregular cues.</p>\r\n\r\n<p>Comment</p>\r\n\r\n<p>In today&#39;s world, as the complexity of work increases, so do the cognitive demands on humans within the systems. Simple descriptions of what is manually performed by humans fail to capture important cognitive (abstract) considerations such as the intermediate and higher-order objectives that are meant to be satisfied.</p>\r\n\r\n<p>To elucidate how the human mind functions as it performs complex tasks such as an operation, cognitive psychologists have created a model18&nbsp;in which cognitive activity is divided into 2 levels, an action level and a controlling meta-level (Figure). The executive meta-level guides the action using feedback from the action level so that the goals of the procedure will be met. To do this, the meta-level constructs a dynamic model of the action level and integrates knowledge, goals, strategies, and progress. Accuracy of the model is critical to decision making because the performance of the mind is model based, which might lead to errors if that model was an inaccurate representation of reality. Scarce attentional resources are allocated to features of the operative field based on their perceived priorities. Because the focus of visual attention spans a mere 2.5&deg; and because the progress of the action attracts most of the attention, less important items within the field of view inevitably go unattended.19,20&nbsp;As argued herein, this psychological model of the human mind is an appropriate artifact on which to base improvements in the design of operative reports.</p>\r\n\r\n<p>The increasing complexity of work, coupled with the changing roles of humans in systems, led in recent decades to the development of CTA, hierarchical task analysis, and cognitive task design as superior ways to conceptualize activities because they bring to the fore the meta-level concerns at the heart of procedures.17,21&nbsp;Algorithms depicting such analyses for complex systems are often themselves complex, but this is not the case when CTA is used to describe a laparoscopic cholecystectomy or other operations. It is straightforward in this setting, and the results provide a valuable perspective on the work.</p>\r\n\r\n<p>In addition to providing a more reliable record of an operation, CTA should aid decision making in the operating room. By framing the thinking of the surgeon, it is expected to enhance the chances of the desired result, namely, a complication-free operation. In a useful summary, Stanovich22&nbsp;notes that 2 kinds of rationality are involved in human decision making, epistemic and instrumental. This translates into thinking based on what is true (epistemic) and on what to do (instrumental). The cognitive parts of CTA in&nbsp;Table 1&nbsp;support both. What is true in this case refers to the meta-level model of the anatomy and the significance of disconfirmatory findings (eg, irregular cues). What to do refers to the technical strategy that optimizes the chances of avoiding, for example, misidentification of the common duct for the cystic duct, the error underlying most BDIs (class III injury).14</p>\r\n\r\n<p>Expectations of better results from psychological efforts like this are well supported empirically.23-25&nbsp;Explicit delineation of the goals, which is a central objective of task analysis, greatly increases the chances that they will be attended to and addressed during the performance. The fact that the operation precedes dictation of the operative report is not an obstacle because the desired content of the operative report would be continually rehearsed during training and previous practice if this approach was part of a program that redesigned operative reports.</p>\r\n\r\n<p>Cognitive task analysis as summarized in&nbsp;Table 1&nbsp;','Patient Id: 66<br> Patient Name: Ian Dave Colina<br> Patient Email: iandave@mailinator.com','763','466'),(67,'Test Subject','1629955153','<p>{phone} {email}</p>\r\n\r\n<p>Results</p>\r\n\r\n<p><strong>Cognitive task analysis</strong></p>\r\n\r\n<p>Cognitive task analysis produced the algorithm in&nbsp;Table 1, which consists of the sequential goals and consequent actions involved in laparoscopic cholecystectomy. There are many sources of information about CTA, but we followed the ideas expressed in the&nbsp;<em>Handbook of Cognitive Task Design</em>17&nbsp;for this work.</p>\r\n\r\n<p><strong>Model operative report elements</strong></p>\r\n\r\n<p>Using CTA as a guide, we judged that the model operative report should include descriptions of the following: (1) retraction of the gallbladder, (2) thorough clearance of the infundibulum bordering the Calot triangle, (3) identification of the cystic duct&ndash;infundibulum junction, (4) clipping and cutting of the cystic duct and cystic artery, (5) separation of the gallbladder from the liver bed, and (6) findings such as inflammatory changes, difficulties encountered, bleeding, and the aforementioned irregular cues. The percentage of cases with each key element is given in&nbsp;Table 2.</p>\r\n\r\n<p><strong>OPERATIVE REPORTS FROM 125 CASES WITHOUT BDIs</strong></p>\r\n\r\n<p>The text of the operative reports in cases without BDIs from university and community hospitals was similar. Thirty-one operative reports (24.8%) contained what was considered to be a minimum of the desired elements (as previously defined). Twenty of 31 described lateral retraction of the infundibulum, so the proportion with all key elements would fall to 16.0% if this criterion was required.</p>\r\n\r\n<p>No mention was made of retracting the gallbladder in 21 cases (16.8%). Cephalad fundus retraction was described in 99 cases (79.2%), and lateral retraction of the gallbladder infundibulum was noted in 58 cases (46.4%). Both steps were described in 57 cases (45.6%).</p>\r\n\r\n<p>Descriptions of the dissection (Table 3) took the following 3 main forms: (1) notation of thorough dissection of the Calot triangle or the gallbladder infundibulum that exposed the cystic duct and artery, (2) an abbreviated account of the dissection, or (3) a simple statement that the cystic duct and artery were exposed.</p>\r\n\r\n<p>Fifty-one operative reports (40.8%) described thorough dissection of the infundibulum bordering the Calot triangle (Table 4), 44 (35.2%) contained an abbreviated description of the dissection, and 30 (24.0%) simply stated that the cystic duct and artery were identified or skeletonized. In 6 cases, the term&nbsp;<em>critical view of safety</em>&nbsp;was used, but there was no further elaboration that clarified what was actually performed in 4 of these cases.</p>\r\n\r\n<p>Variations in descriptions of how the cystic duct and artery were clipped ranged from a statement that they were clipped (16 operative reports [12.8%]) to statements of how many clips were placed on either side of the transection. The number of clips placed was given in 107 operative reports (85.6%). The median number was 6 clips (range, 4-10). Irregular cues were noted in 30 operative reports (24.0%; mean number, 0.5).</p>\r\n\r\n<p><strong>OPERATIVE REPORTS FROM 125 CASES WITH BDIs</strong></p>\r\n\r\n<p>None of the operative reports in cases with BDIs contained what we perceived to be a minimum of the desired elements. The steps to orient the gallbladder were described in 29 operative reports (23.2%), the word &ldquo;retracted&rdquo; was the extent of the description in 36 operative reports (28.8%), &ldquo;cephalad retraction of the fundus&rdquo; was the expression used in 58 operative reports (46.4%), and lateral retraction of the infundibulum was mentioned in 13 operative reports (10.0%). The phrase &ldquo;preferred cephalad retraction of the fundus plus lateral retraction of the infundibulum&rdquo; was used in 12 operative reports (9.6%).</p>\r\n\r\n<p>Five operative reports (4.0%) described thorough dissection of the medial aspect of the infundibulum bordering the Calot triangle. Eighty-one operative reports (64.8%) gave an incomplete account of the dissection. Thirty-nine operative reports (31.2%) simply stated that a dissection was performed and that the cystic duct and artery were identified.</p>\r\n\r\n<p>All the operative reports in cases with BDI stated that the cystic duct was divided. In 36 operative reports (28.8%), the cystic duct was said to have been clipped. In the other 89 operative reports (71.2%), the number of clips on the cystic duct and artery was specified (range, 4-15; median, 6). Irregular cues were reported in 100 operative reports (80.0%; mean number of irregular cues, 1.9).</p>\r\n\r\n<p><strong>Comparison of cases with vs without bdi</strong></p>\r\n\r\n<p>Operative reports for cases with BDI contained fewer key elements than those without BDI, but key elements were missing in most of the uncomplicated cases as well (Table 2). The association of the reported elements with BDI is shown for bivariate (Table 2) and multivariate (Table 4) analyses. On multivariate analysis, adequate dissection within the Calot triangle, identification of the cystic duct&ndash;infundibulum junction, and lateral retraction of the infundibulum correlated with uncomplicated cases. More irregular cues, dissection of the cystic duct&ndash;common bile duct junction, and reports of an extra biliary or tubular structure were seen in BDI cases.</p>\r\n\r\n<p>Irregular cues, noted in 22.2% of cases, were more common in cases with BDI than without BDI (80% vs 24%;&nbsp;<em>P</em>&nbsp;&lt;&nbsp;.001, &chi;2&nbsp;test). Fewer irregular cues were reported in cases without BDI than with BDI (0.4 vs 2.0;&nbsp;<em>P</em>&nbsp;&lt;&nbsp;.001, &chi;2&nbsp;test).</p>\r\n\r\n<p><strong>Multivariate analysis</strong></p>\r\n\r\n<p>On multivariate analysis (Table 4), elements of operative reports that correlated with uncomplicated laparoscopic cholecystectomy were lateral retraction of the infundibulum, thorough dissection of the medial surface of the infundibulum, and identification of the cystic duct&ndash;infundibulum junction. Elements of operative reports that correlated with BDI included absence of these elements, notation of an abnormal or additional bile duct, dissection of the common bile duct&ndash;cystic duct junction, and description of irregular cues.</p>\r\n\r\n<p>Comment</p>\r\n\r\n<p>In today&#39;s world, as the complexity of work increases, so do the cognitive demands on humans within the systems. Simple descriptions of what is manually performed by humans fail to capture important cognitive (abstract) considerations such as the intermediate and higher-order objectives that are meant to be satisfied.</p>\r\n\r\n<p>To elucidate how the human mind functions as it performs complex tasks such as an operation, cognitive psychologists have created a model18&nbsp;in which cognitive activity is divided into 2 levels, an action level and a controlling meta-level (Figure). The executive meta-level guides the action using feedback from the action level so that the goals of the procedure will be met. To do this, the meta-level constructs a dynamic model of the action level and integrates knowledge, goals, strategies, and progress. Accuracy of the model is critical to decision making because the performance of the mind is model based, which might lead to errors if that model was an inaccurate representation of reality. Scarce attentional resources are allocated to features of the operative field based on their perceived priorities. Because the focus of visual attention spans a mere 2.5&deg; and because the progress of the action attracts most of the attention, less important items within the field of view inevitably go unattended.19,20&nbsp;As argued herein, this psychological model of the human mind is an appropriate artifact on which to base improvements in the design of operative reports.</p>\r\n\r\n<p>The increasing complexity of work, coupled with the changing roles of humans in systems, led in recent decades to the development of CTA, hierarchical task analysis, and cognitive task design as superior ways to conceptualize activities because they bring to the fore the meta-level concerns at the heart of procedures.17,21&nbsp;Algorithms depicting such analyses for complex systems are often themselves complex, but this is not the case when CTA is used to describe a laparoscopic cholecystectomy or other operations. It is straightforward in this setting, and the results provide a valuable perspective on the work.</p>\r\n\r\n<p>In addition to providing a more reliable record of an operation, CTA should aid decision making in the operating room. By framing the thinking of the surgeon, it is expected to enhance the chances of the desired result, namely, a complication-free operation. In a useful summary, Stanovich22&nbsp;notes that 2 kinds of rationality are involved in human decision making, epistemic and instrumental. This translates into thinking based on what is true (epistemic) and on what to do (instrumental). The cognitive parts of CTA in&nbsp;Table 1&nbsp;support both. What is true in this case refers to the meta-level model of the anatomy and the significance of disconfirmatory findings (eg, irregular cues). What to do refers to the technical strategy that optimizes the chances of avoiding, for example, misidentification of the common duct for the cystic duct, the error underlying most BDIs (class III injury).14</p>\r\n\r\n<p>Expectations of better results from psychological efforts like this are well supported empirically.23-25&nbsp;Explicit delineation of the goals, which is a central objective of task analysis, greatly increases the chances that they will be attended to and addressed during the performance. The fact that the operation precedes dictation of the operative report is not an obstacle because the desired content of the operative report would be continually rehearsed during training and previous practice if this approach was part of a program that redesigned operative reports.</p>\r\n\r\n<p>Cognitive task analysis as summarized in&nbsp;Table 1&nbsp;','Patient Id: 67<br> Patient Name: April Jane Garbo<br> Patient Email: patient1.rygeltech@gmail.com','763','466'),(68,'test subject 2','1630316511','<p>{phone} {email} test message 2</p>\r\n','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466'),(69,'test','1630316970','<p>{phone} {email}test</p>\r\n','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466'),(70,'test subject 1','1630342561','<p>{phone} test subject 1</p>\r\n\r\n<p>{email}</p>\r\n','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466'),(71,'test subject 2','1630342598','<p>{phone} {email}</p>\r\n\r\n<p>test messag 2</p>\r\n','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466'),(72,'test 6','1630350790','<p>test 6</p>\r\n','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Email: patient@rygel.biz','763','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_settings`
--

LOCK TABLES `email_settings` WRITE;
/*!40000 ALTER TABLE `email_settings` DISABLE KEYS */;
INSERT INTO `email_settings` VALUES (13,'team@sugbodoc.com',NULL,NULL,NULL,'466'),(26,'Admin Email',NULL,NULL,NULL,'477');
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
) ENGINE=MyISAM AUTO_INCREMENT=266 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` VALUES (93,'Medication','1629966461','[Test]Conclusions  Current practice generates operative reports that vary widely','500','763','26/08/21','466'),(94,'Medication','1630128286','Medication','500','763','28/08/21','466'),(95,'Medication','1630128346','Medication for inpatient','300','763','28/08/21','466'),(96,'Food','1630128415','Food for lunch','200','763','28/08/21','466'),(97,'Food','1630128441','Food for breakfast','250','763','28/08/21','466'),(98,'Food','1630128470','Food for dinner','150','763','28/08/21','466'),(99,'Room Sanitation Contract Labor','1630128641','Room Sanitation Contract Labor','1000','763','28/08/21','466'),(100,'Room Sanitation Contract Labor','1630128688','Room Sanitation Contract Labor','1500','763','28/08/21','466'),(101,'Room Sanitation Contract Labor','1630128715','Room Sanitation Contract Labor','1300','763','28/08/21','466'),(102,'Sales & Marketing','1630128787','Sales & Marketing','1000','763','28/08/21','466'),(103,'Sales & Marketing','1630128813','Sales & Marketing','1500','763','28/08/21','466'),(104,'Sales & Marketing','1630128836','Sales & Marketing','2000','763','28/08/21','466'),(105,'Payroll Expense','1630128871','Salary for Cleaner','3500','763','28/08/21','466'),(106,'Payroll Expense','1630128903','Salary for Accountant','5000','763','28/08/21','466'),(107,'Software & Web Services','1630128983','Microsoft Subscription','1880','763','28/08/21','466'),(108,'Software & Web Services','1630129051','Netflix Subscription','300','763','28/08/21','466'),(109,'Software & Web Services','1630129087','Software from Rygel','10000','763','28/08/21','466'),(110,'Professional Fees','1630129198','Lawyer\'s Notarial Fee','300','763','28/08/21','466'),(111,'Professional Fees','1630129284','External Accountant Auditor Fee','15000','763','28/08/21','466'),(112,'Professional Fees','1630129388','Engineer Consultant Fee','3000','763','28/08/21','466'),(113,'Travel Expenses','1630129457','Bus Fare','20','763','28/08/21','466'),(114,'Travel Expenses','1630129530','Jeepney Fare','15','763','28/08/21','466'),(115,'Travel Expenses','1630129571','Plane Fare','1620','763','28/08/21','466'),(116,'Meals','1630129657','Lunch for Consultant','500','763','28/08/21','466'),(117,'Meals','1630129850','Dinner with Executive Team','5000','763','28/08/21','466'),(118,'Meals','1630129917','Dessert for Sales Team','3000','763','28/08/21','466'),(119,'Entertainment / Team Events','1630130038','Rent for Accommodation for Team Outing','3000','763','28/08/21','466'),(120,'Entertainment / Team Events','1630130154','Hotel Lobby Lease for Team Building','5000','763','28/08/21','466'),(236,'Food','1630308161','Food','1000','763','30/08/21','466'),(237,'Food','1630308177','Food','1500','763','30/08/21','466'),(122,'Insurance Expenses','1630130396','Philamlife Insurance for Sales Team','10000','763','28/08/21','466'),(123,'Insurance Expenses','1630130441','AXA Insurance for Accounting Team','20000','763','28/08/21','466'),(124,'Insurance Expenses','1630130479','Medicare for Engineering Team','15000','763','28/08/21','466'),(125,'Office Furniture / Equipment','1630130516','Sofa for Lobby','10000','763','28/08/21','466'),(126,'Office Furniture / Equipment','1630130570','Dining Set for Pantry','5000','763','28/08/21','466'),(127,'Office Furniture / Equipment','1630130597','Office Printer','10000','763','28/08/21','466'),(128,'Office Supplies','1630130624','Bondpaper','2000','763','28/08/21','466'),(129,'Office Supplies','1630130642','Ink','4500','763','28/08/21','466'),(130,'Office Supplies','1630130666','Paper Clips','1000','763','28/08/21','466'),(131,'Telephone / Internet Expense','1630130705','PLDT Fibr','3000','763','28/08/21','466'),(132,'Telephone / Internet Expense','1630130737','Skycable Cable TV','2000','763','28/08/21','466'),(133,'Telephone / Internet Expense','1630130765','Globe Landline','2000','763','28/08/21','466'),(134,'Utilities Expense','1630130801','Water','1000','763','28/08/21','466'),(135,'Utilities Expense','1630130850','Electricity Expense for August','3500','763','28/08/21','466'),(136,'Utilities Expense','1630130884','Electricity Expense for July','3500','763','28/08/21','466'),(137,'Bank Charges','1630130951','Below Minimum Penalty','2000','763','28/08/21','466'),(138,'Bank Charges','1630131045','ATM Withdrawal Fee','15','763','28/08/21','466'),(139,'Bank Charges','1630131140','Interest Charges','10000','763','28/08/21','466'),(140,'Rent Expense','1630131211','Office Rent - June','20000','763','28/08/21','466'),(141,'Rent Expense','1630131239','Office Rent - July','20000','763','28/08/21','466'),(142,'Rent Expense','1630131267','Office Rent - August','20000','763','28/08/21','466'),(143,'Medication','1630133453','Medication','500','763','28/08/21','466'),(144,'Bank Charges','1630302597','Interest Charges','10000','763','30/08/21','466'),(145,'Bank Charges','1630302618','ATM Withdrawal Fee','20','763','30/08/21','466'),(146,'Bank Charges','1630302638','Below Minimum Penalty','3000','763','30/08/21','466'),(147,'Bank Charges','1630303121','Interest Charges','1000','763','30/08/21','466'),(148,'Bank Charges','1630303141','ATM Withdrawal Fee','20','763','30/08/21','466'),(149,'Entertainment / Team Events','1630303242','Karaoke in Ayala for Team Building','4000','763','30/08/21','466'),(150,'Entertainment / Team Events','1630303274','Hotel Lobby Lease for Team Building','5000','763','30/08/21','466'),(151,'Entertainment / Team Events','1630303310','Rent for Accommodation for Team Outing','3500','763','30/08/21','466'),(152,'Entertainment / Team Events','1630303336','Hotel Lobby Lease for Team Building','2500','763','30/08/21','466'),(153,'Entertainment / Team Events','1630303364','Rent for Accommodation for Team Outing','4500','763','30/08/21','466'),(154,'Food','1630303397','Food for lunch','1000','763','30/08/21','466'),(155,'Food','1630303412','Food for dinner','1000','763','30/08/21','466'),(156,'Food','1630303425','Food for breakfast','1000','763','30/08/21','466'),(157,'Food','1630303437','Food','2000','763','30/08/21','466'),(158,'Food','1630303452','Food','1500','763','30/08/21','466'),(159,'Insurance Expenses','1630303488','Medicare for Engineering Team','15000','763','30/08/21','466'),(160,'Insurance Expenses','1630303523','AXA Insurance for Accounting Team','20000','763','30/08/21','466'),(161,'Insurance Expenses','1630303551','Philamlife Insurance for Sales Team','10000','763','30/08/21','466'),(162,'Insurance Expenses','1630303619','Philamlife Insurance for Sales Team','20000','763','30/08/21','466'),(163,'Insurance Expenses','1630303644','Medicare for Engineering Team','10000','763','30/08/21','466'),(164,'Meals','1630303749','Lunch for Consultant','3500','763','30/08/21','466'),(165,'Meals','1630303778','Dessert for Sales Team','2500','763','30/08/21','466'),(166,'Meals','1630303967','Dinner with Executive Team','4500','763','30/08/21','466'),(167,'Meals','1630303996','Lunch for Consultant','2500','763','30/08/21','466'),(168,'Meals','1630304018','Dessert for Sales Team','2500','763','30/08/21','466'),(169,'Medication','1630304093','Medication for outpatient','2000','763','30/08/21','466'),(170,'Medication','1630304107','Medication','1500','763','30/08/21','466'),(171,'Medication','1630304128','Medication','1000','763','30/08/21','466'),(172,'Medication','1630304147','Medication','2500','763','30/08/21','466'),(173,'Medication','1630304161','Medication','1000','763','30/08/21','466'),(174,'Office Furniture / Equipment','1630304217','Office Printer','20000','763','30/08/21','466'),(175,'Office Furniture / Equipment','1630304246','Dining Set for Pantry','10000','763','30/08/21','466'),(176,'Office Furniture / Equipment','1630304281','Sofa for Lobby','10000','763','30/08/21','466'),(177,'Office Furniture / Equipment','1630304311','Office Printer','20000','763','30/08/21','466'),(178,'Office Furniture / Equipment','1630304351','Sofa for Lobby','15000','763','30/08/21','466'),(179,'Office Supplies','1630304391','Ink','10000','763','30/08/21','466'),(180,'Office Supplies','1630304414','Bondpaper','3500','763','30/08/21','466'),(181,'Office Supplies','1630304447','Paperclips','1000','763','30/08/21','466'),(182,'Office Supplies','1630304471','Bondpaper','1500','763','30/08/21','466'),(183,'Office Supplies','1630304503','Ink','5000','763','30/08/21','466'),(184,'Payroll Expense','1630304592','Salary for Cleaner','4000','763','30/08/21','466'),(185,'Payroll Expense','1630304612','Salary for Accountant','5000','763','30/08/21','466'),(186,'Payroll Expense','1630304645','Payroll for Web Designer','4000','763','30/08/21','466'),(187,'Payroll Expense','1630304717','Payroll Expense','3000','763','30/08/21','466'),(188,'Payroll Expense','1630304748','Salary for Cleaner','3500','763','30/08/21','466'),(189,'Professional Fees','1630304789','Engineer Consultant Fee','3000','763','30/08/21','466'),(190,'Professional Fees','1630304814','External Accountant Auditor Fee','15000','763','30/08/21','466'),(191,'Professional Fees','1630304839','Lawyer\'s Notarial Fee','300','763','30/08/21','466'),(192,'Professional Fees','1630304866','Engineer Consultant Fee','3500','763','30/08/21','466'),(193,'Professional Fees','1630304900','Lawyer\'s Notarial Fee','250','763','30/08/21','466'),(194,'Rent Expense','1630304968','Office Rent - July','20000','763','30/08/21','466'),(195,'Rent Expense','1630304989','Office Rent - June','20000','763','30/08/21','466'),(196,'Rent Expense','1630305012','Office Rent - August','20000','763','30/08/21','466'),(197,'Rent Expense','1630305034','Office Rent - October','20000','763','30/08/21','466'),(198,'Rent Expense','1630305068','Office Rent - September','20000','763','30/08/21','466'),(199,'Room Sanitation Contract Labor','1630305193','Room Sanitation Contract Labor','1500','763','30/08/21','466'),(200,'Room Sanitation Contract Labor','1630305211','Room Sanitation Contract Labor','1000','763','30/08/21','466'),(201,'Room Sanitation Contract Labor','1630305227','Room Sanitation Contract Labor','1300','763','30/08/21','466'),(202,'Room Sanitation Contract Labor','1630305245','Room Sanitation Contract Labor','2000','763','30/08/21','466'),(203,'Room Sanitation Contract Labor','1630305257','Room Sanitation Contract Labor','1000','763','30/08/21','466'),(204,'Sales & Marketing','1630305298','Sales & Marketing','2500','763','30/08/21','466'),(205,'Sales & Marketing','1630305451','Sales & Marketing','2000','763','30/08/21','466'),(206,'Sales & Marketing','1630305596','Sales & Marketing','3000','763','30/08/21','466'),(207,'Sales & Marketing','1630305612','Sales & Marketing','1500','763','30/08/21','466'),(208,'Sales & Marketing','1630305632','Sales & Marketing','1500','763','30/08/21','466'),(209,'Software & Web Services','1630305708','Software from Rygel','10000','763','30/08/21','466'),(210,'Software & Web Services','1630305738','Netflix Subscription','800','763','30/08/21','466'),(211,'Software & Web Services','1630305763','Microsoft Subscription','2000','763','30/08/21','466'),(212,'Software & Web Services','1630305784','Netflix Subscription','1000','763','30/08/21','466'),(213,'Software & Web Services','1630305805','Software from Rygel','20000','763','30/08/21','466'),(214,'Telephone / Internet Expense','1630305853','Globe Landline','1899','763','30/08/21','466'),(215,'Telephone / Internet Expense','1630305882','Skycable Cable TV','2000','763','30/08/21','466'),(216,'Telephone / Internet Expense','1630305908','Globe Landline','2000','763','30/08/21','466'),(217,'Telephone / Internet Expense','1630305926','PLDT Fibr','2899','763','30/08/21','466'),(218,'Telephone / Internet Expense','1630305963','Skycable Cable TV','1599','763','30/08/21','466'),(219,'Travel Expenses','1630306009','Plane Fare','1599','763','30/08/21','466'),(220,'Travel Expenses','1630306028','Jeepney Fare','100','763','30/08/21','466'),(221,'Travel Expenses','1630306053','Bus Fare','100','763','30/08/21','466'),(222,'Travel Expenses','1630306075','Taxi Fare','1000','763','30/08/21','466'),(223,'Travel Expenses','1630306108','Motor Fare','150','763','30/08/21','466'),(224,'Utilities Expense','1630306203','Water - August','1000','763','30/08/21','466'),(225,'Utilities Expense','1630306239','Electricity Expense for August','4000','763','30/08/21','466'),(226,'Utilities Expense','1630306275','Electricity Expense for July','3500','763','30/08/21','466'),(227,'Utilities Expense','1630306307','Electricity Expense for September','3500','763','30/08/21','466'),(228,'Utilities Expense','1630306333','Water - July','1000','763','30/08/21','466'),(229,'Bank Charges','1630307685','ATM Withdrawal Fee','50','763','30/08/21','466'),(230,'Bank Charges','1630307707','Interest Charges','10000','763','30/08/21','466'),(231,'Entertainment / Team Events','1630307807','Karaoke in Ayala for Team Building','3000','763','30/08/21','466'),(232,'Entertainment / Team Events','1630307864','Rent for Accommodation for Team Outing','3000','763','30/08/21','466'),(233,'Entertainment / Team Events','1630307898','Hotel Lobby Lease for Team Building','2500','763','30/08/21','466'),(238,'Insurance Expenses','1630308215','AXA Insurance for Accounting Team','20000','763','30/08/21','466'),(239,'Insurance Expenses','1630308237','Medicare for Engineering Team','15000','763','30/08/21','466'),(240,'Meals','1630308285','Dessert for Sales Team','2000','763','30/08/21','466'),(241,'Meals','1630308313','Dinner with Executive Team','3000','763','30/08/21','466'),(242,'Medication','1630308332','Medication','1000','763','30/08/21','466'),(243,'Medication','1630308350','Medication','2000','763','30/08/21','466'),(244,'Office Furniture / Equipment','1630308399','Office Printer','20000','763','30/08/21','466'),(245,'Office Furniture / Equipment','1630308421','Sofa for Lobby','10000','763','30/08/21','466'),(246,'Office Supplies','1630308460','Ink','5000','763','30/08/21','466'),(247,'Office Supplies','1630308487','Bondpaper','2000','763','30/08/21','466'),(248,'Payroll Expense','1630308525','Salary for Cleaner','3500','763','30/08/21','466'),(249,'Payroll Expense','1630308548','Salary for Accountant','4000','763','30/08/21','466'),(250,'Professional Fees','1630308582','Lawyer\'s Notarial Fee','300','763','30/08/21','466'),(251,'Professional Fees','1630308606','External Accountant Auditor Fee','10000','763','30/08/21','466'),(252,'Room Sanitation Contract Labor','1630308624','Room Sanitation Contract Labor','2000','763','30/08/21','466'),(253,'Room Sanitation Contract Labor','1630308642','Room Sanitation Contract Labor','1500','763','30/08/21','466'),(254,'Sales & Marketing','1630308683','Sales & Marketing','1500','763','30/08/21','466'),(255,'Sales & Marketing','1630308696','Sales & Marketing','2000','763','30/08/21','466'),(256,'Software & Web Services','1630308735','Software from Rygel','10000','763','30/08/21','466'),(257,'Software & Web Services','1630308780','Microsoft Subscription','2000','763','30/08/21','466'),(258,'Telephone / Internet Expense','1630308817','PLDT Fibr','3000','763','30/08/21','466'),(259,'Telephone / Internet Expense','1630308847','Globe Landline','2000','763','30/08/21','466'),(260,'Travel Expenses','1630308877','Plane Fare','1299','763','30/08/21','466'),(261,'Travel Expenses','1630308898','Bus Fare','100','763','30/08/21','466'),(262,'Utilities Expense','1630308933','Water - August','1000','763','30/08/21','466'),(263,'Utilities Expense','1630308976','Electricity Expense for August','3500','763','30/08/21','466'),(264,'Payroll Expense','1630317198','Salary for Cleaner','4500','763','30/08/21','466'),(265,'Rent Expense','1630317849','Water - July','3500','763','30/08/21','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_category`
--

LOCK TABLES `expense_category` WRITE;
/*!40000 ALTER TABLE `expense_category` DISABLE KEYS */;
INSERT INTO `expense_category` VALUES (60,'Medication','Medications purchased',NULL,NULL,'466'),(61,'Food','Food bought for patients',NULL,NULL,'466'),(62,'Room Sanitation Contract Labor','Room Sanitation Contract Labor',NULL,NULL,'466'),(63,'Sales & Marketing','Sales & Marketing',NULL,NULL,'466'),(64,'Payroll Expense','Payroll Expense',NULL,NULL,'466'),(65,'Software & Web Services','Software & Web Services',NULL,NULL,'466'),(66,'Professional Fees','Professional Fees',NULL,NULL,'466'),(67,'Travel Expenses','Travel Expenses',NULL,NULL,'466'),(68,'Meals','Meals',NULL,NULL,'466'),(69,'Entertainment / Team Events','Entertainment / Team Events',NULL,NULL,'466'),(70,'Insurance Expenses','Insurance Expenses',NULL,NULL,'466'),(71,'Office Furniture / Equipment','Office Furniture / Equipment',NULL,NULL,'466'),(72,'Office Supplies','Office Supplies',NULL,NULL,'466'),(73,'Telephone / Internet Expense','Telephone / Internet Expense',NULL,NULL,'466'),(74,'Utilities Expense','Utilities Expense',NULL,NULL,'466'),(75,'Bank Charges','Bank Charges',NULL,NULL,'466'),(76,'Rent Expense','Rent Expense',NULL,NULL,'466'),(77,'Research & Development Expenses','Research & Development Expenses',NULL,NULL,'466'),(78,'Interest (Income) / Expense','Interest (Income) / Expense',NULL,NULL,'466'),(79,'Taxes & Licenses','Taxes & Licenses',NULL,NULL,'466'),(80,'Depreciation Expense','Depreciation Expense',NULL,NULL,'466'),(81,'Amortization Expense','Amortization Expense',NULL,NULL,'466');
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
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` VALUES (76,'169','1629388800',NULL,NULL,'466'),(77,'162','1629388800',NULL,NULL,'466'),(78,'162','1629820800',NULL,NULL,'466');
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
) ENGINE=MyISAM AUTO_INCREMENT=478 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (466,'Ryan Michael','admin@rygel.biz',NULL,'F Ramos St, Cebu City','+63323464063','','1000','500','accountant,appointment,lab,bed,department,doctor,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms','763'),(477,'Mandaue Hospital','admin1@mailinator.com',NULL,'Hernan Cortes St, Tipolo, Mandaue City','5202271','80','2500','1000','accountant,appointment,lab,bed,department,doctor,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms','825');
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
  `date` varchar(100) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1954 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab`
--

LOCK TABLES `lab` WRITE;
/*!40000 ALTER TABLE `lab` DISABLE KEYS */;
INSERT INTO `lab` VALUES (1936,NULL,'67','162','1629043200',NULL,'<p>Note:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\" summary=\"Blood Tests\">\r\n	<caption>Hematology</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HEMATOLOGY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ESR</td>\r\n			<td>H</td>\r\n			<td>102</td>\r\n			<td>mm/hr</td>\r\n			<td>&lt; 30</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Complete Blood Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;White Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>4.00 ~ 10.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Remarks:</p>\r\n',NULL,'789','April Jane Garbo','+639150446456','NASIPIT TALAMBAN','Dr. Michael Rygel','16-08-21','466'),(1937,NULL,'62','169','1629216000',NULL,'<p>Note:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\" summary=\"Blood Tests\">\r\n	<caption>Hematology</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HEMATOLOGY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ESR</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mm/hr</td>\r\n			<td>&lt; 30</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Complete Blood Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;White Blood Cells</td>\r\n			<td>H</td>\r\n			<td>11</td>\r\n			<td>10^9/L</td>\r\n			<td>4.00 ~ 10.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Red Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>5.00</td>\r\n			<td>10^12/L</td>\r\n			<td>4.20 ~ 5.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hemoglobin</td>\r\n			<td>&nbsp;</td>\r\n			<td>130</td>\r\n			<td>g/L</td>\r\n			<td>125 ~ 160</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hematocrit</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.37 ~ 0.47</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Volume</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>fL</td>\r\n			<td>78 ~ 100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>pg</td>\r\n			<td>27 ~ 31</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb Conc.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.32 ~ 0.36</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;RBC Distribution Width</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>11.0 ~ 16.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Platelet Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>150 ~ 450</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Relative)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Segmenters / Neutrophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>50.0 ~ 70.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Lymphocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>18.0 ~ 42.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Monocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>2.0 ~ 11.o</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Eosinophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 6.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Basophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bands</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Absolute)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Seg/Neutro Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>1.30 ~ 6.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Lymphocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>1.50 ~ 3.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Monocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Eosinophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Basophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Band Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n',NULL,'763','Patient Clavio','+639616327980','Gen Junquera Ext Cebu City','Mary Grace Teleron','18-08-21','466'),(1938,NULL,'74','162','1629734400',NULL,'<p>Note:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\" summary=\"Blood Tests\">\r\n	<caption>Hematology</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HEMATOLOGY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ESR</td>\r\n			<td>H</td>\r\n			<td>100</td>\r\n			<td>mm/hr</td>\r\n			<td>&lt; 30</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Complete Blood Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;White Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>10.5</td>\r\n			<td>10^9/L</td>\r\n			<td>4.00 ~ 10.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Red Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.35</td>\r\n			<td>10^12/L</td>\r\n			<td>4.20 ~ 5.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hemoglobin</td>\r\n			<td>&nbsp;</td>\r\n			<td>129</td>\r\n			<td>g/L</td>\r\n			<td>125 ~ 160</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hematocrit</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.40</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.37 ~ 0.47</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Volume</td>\r\n			<td>&nbsp;</td>\r\n			<td>85</td>\r\n			<td>fL</td>\r\n			<td>78 ~ 100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb</td>\r\n			<td>&nbsp;</td>\r\n			<td>30</td>\r\n			<td>pg</td>\r\n			<td>27 ~ 31</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb Conc.</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.33</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.32 ~ 0.36</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;RBC Distribution Width</td>\r\n			<td>&nbsp;</td>\r\n			<td>12.2</td>\r\n			<td>%</td>\r\n			<td>11.0 ~ 16.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Platelet Count</td>\r\n			<td>H</td>\r\n			<td>350</td>\r\n			<td>10^9/L</td>\r\n			<td>150 ~ 450</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Relative)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Segmenters / Neutrophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>62.2</td>\r\n			<td>%</td>\r\n			<td>50.0 ~ 70.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Lymphocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>24.9</td>\r\n			<td>%</td>\r\n			<td>18.0 ~ 42.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Monocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>7.2</td>\r\n			<td>%</td>\r\n			<td>2.0 ~ 11.o</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Eosinophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.3</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 6.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Basophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.2</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bands</td>\r\n			<td>&nbsp;</td>\r\n			<td>0..0</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Absolute)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Seg/Neutro Count</td>\r\n			<td>H</td>\r\n			<td>6.47</td>\r\n			<td>10^9/L</td>\r\n			<td>1.30 ~ 6.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Lymphocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>2.45</td>\r\n			<td>10^9/L</td>\r\n			<td>1.50 ~ 3.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Monocyte Count</td>\r\n			<td>H</td>\r\n			<td>0.76</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Eosinophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.75</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Basophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.20</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Band Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.00</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CLINICAL MICROSCOPY</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CLINICAL MICROSCOPY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Routine Urinalysis</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; Physical / Macroscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Color</td>\r\n			<td>Yellow</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Transparency</td>\r\n			<td>Foamy Urine</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; Chemical</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Sp. Gravity</td>\r\n			<td>1.010</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.003 ~ 1.035</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;pH</td>\r\n			<td>5.1</td>\r\n			<td>&nbsp;</td>\r\n			<td>5 ~ 8</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Protein</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Glucose</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bilirubin</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Blood</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Leucocytes</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Nitrite</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Urobilinogen</td>\r\n			<td>&lt; 1</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Ketone</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; Microscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;RBC</td>\r\n			<td>0-2</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;WBC</td>\r\n			<td>0-1</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Epithelial Cells</td>\r\n			<td>MODERATE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bacteria</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Mucus Threads</td>\r\n			<td>RARE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Olivia Sanchez','9326517433','Aviation Rd. Hangar Basak Lapulapu City, 6015','Dr. Michael Rygel','24-08-21','466'),(1939,NULL,'68','170','1629907200',NULL,'<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>HBA1C</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HBA1C</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HbA1c (IE-HPLC)</td>\r\n			<td>6.8</td>\r\n			<td>%</td>\r\n			<td>Normal : &lt; 5.70%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Pre-diabetes : 5.70% ~ 6.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Diabetes : &gt; / = 6.50%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>Note:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\" summary=\"Blood Tests\">\r\n	<caption>Hematology</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HEMATOLOGY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ESR</td>\r\n			<td>H</td>\r\n			<td>105</td>\r\n			<td>mm/hr</td>\r\n			<td>&lt; 30</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Complete Blood Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;White Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>10.15</td>\r\n			<td>10^9/L</td>\r\n			<td>4.00 ~ 10.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Red Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.30</td>\r\n			<td>10^12/L</td>\r\n			<td>4.20 ~ 5.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hemoglobin</td>\r\n			<td>&nbsp;</td>\r\n			<td>137</td>\r\n			<td>g/L</td>\r\n			<td>125 ~ 160</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hematocrit</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.40</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.37 ~ 0.47</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Volume</td>\r\n			<td>&nbsp;</td>\r\n			<td>90</td>\r\n			<td>fL</td>\r\n			<td>78 ~ 100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb</td>\r\n			<td>&nbsp;</td>\r\n			<td>29</td>\r\n			<td>pg</td>\r\n			<td>27 ~ 31</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb Conc.</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.30</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.32 ~ 0.36</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;RBC Distribution Width</td>\r\n			<td>&nbsp;</td>\r\n			<td>13.5</td>\r\n			<td>%</td>\r\n			<td>11.0 ~ 16.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Platelet Count</td>\r\n			<td>H</td>\r\n			<td>322.22</td>\r\n			<td>10^9/L</td>\r\n			<td>150 ~ 450</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Relative)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Segmenters / Neutrophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>53.3</td>\r\n			<td>%</td>\r\n			<td>50.0 ~ 70.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Lymphocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>30</td>\r\n			<td>%</td>\r\n			<td>18.0 ~ 42.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Monocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>6.3</td>\r\n			<td>%</td>\r\n			<td>2.0 ~ 11.o</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Eosinophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>3.0</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 6.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Basophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.3</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bands</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.1</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Absolute)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Seg/Neutro Count</td>\r\n			<td>H</td>\r\n			<td>6.47</td>\r\n			<td>10^9/L</td>\r\n			<td>1.30 ~ 6.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Lymphocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>2.30</td>\r\n			<td>10^9/L</td>\r\n			<td>1.50 ~ 3.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Monocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.75</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Eosinophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.45</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Basophil Count</td>\r\n			<td>H</td>\r\n			<td>O.20</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Band Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.00</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n',NULL,'763','Joseph Castro','09562931921','239 Bonifacio District','Clark Perez','26-08-21','466'),(1940,NULL,'69','173','1629907200',NULL,'<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CLINICAL MICROSCOPY</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CLINICAL MICROSCOPY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Routine Urinalysis</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; Physical / Macroscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Color</td>\r\n			<td>DARK YELLOW</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Transparency</td>\r\n			<td>TURBID</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Chemical</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Sp. Gravity</td>\r\n			<td>1.020</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.003 ~ 1.035</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;pH</td>\r\n			<td>5.0</td>\r\n			<td>&nbsp;</td>\r\n			<td>5 ~ 8</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Protein</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Glucose</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bilirubin</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Blood</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Leucocytes</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Nitrite</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Urobilinogen</td>\r\n			<td>&lt; 1.8</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Ketone</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Microscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;RBC</td>\r\n			<td>0-2</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;WBC</td>\r\n			<td>0-3</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Epithelial Cells</td>\r\n			<td>MANY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bacteria</td>\r\n			<td>ABUNDANT</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Mucus Threads</td>\r\n			<td>RARE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Albert Reyes','09177654321','239 Bonifacio District','Mary Ann Remedio','26-08-21','466'),(1941,NULL,'71','174','1629734400',NULL,'<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CHEMISTRY 1</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>H/L</td>\r\n			<td>REFERENCES RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>CONVENTIONAL UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI UNITS</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fasting Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>100</td>\r\n			<td>mg/dl</td>\r\n			<td>70 ~ 100</td>\r\n			<td>6.35</td>\r\n			<td>mmo l / L</td>\r\n			<td>3.88 ~ 5.54</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Creatinine</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.55</td>\r\n			<td>mg/dl</td>\r\n			<td>0.60 ~ 1.20</td>\r\n			<td>85.1</td>\r\n			<td>umo l / L</td>\r\n			<td>53.04 ~ 106.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uric Acid</td>\r\n			<td>&nbsp;</td>\r\n			<td>5.90</td>\r\n			<td>mg/dl</td>\r\n			<td>F : 2.7 ~ 7.3</td>\r\n			<td>392.3</td>\r\n			<td>umo l / L</td>\r\n			<td>F : 160 ~ 432</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SGPT/ALT</td>\r\n			<td>H</td>\r\n			<td>61</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n			<td>58.00</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sodium</td>\r\n			<td>&nbsp;</td>\r\n			<td>142.80</td>\r\n			<td>meq/L</td>\r\n			<td>135.00 ~</td>\r\n			<td>142.80</td>\r\n			<td>mmo l / L</td>\r\n			<td>135.00 ~ 148.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>143.00</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Potassium</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.34</td>\r\n			<td>meq/L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n			<td>4.34</td>\r\n			<td>mmo l /L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','William Lewis','09177654321','Lapu-Lapu City','Peter Ceniza','24-08-21','466'),(1942,NULL,'76','168','1629734400',NULL,'<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>CHEMISTRY 2</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>REFERENCE RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Conventional Units</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI Units</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lipid Profile</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Cholesterol</td>\r\n			<td>H</td>\r\n			<td>239</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 200</td>\r\n			<td>6.18</td>\r\n			<td>mmo l / L</td>\r\n			<td>&lt; 5.14</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Triglycerides</td>\r\n			<td>&nbsp;</td>\r\n			<td>150</td>\r\n			<td>mg/dl</td>\r\n			<td>10 ~ 150</td>\r\n			<td>1.8</td>\r\n			<td>mmo l / L</td>\r\n			<td>0.11 ~ 1.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;HDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>60</td>\r\n			<td>mg/dl</td>\r\n			<td>F : &gt; 65</td>\r\n			<td>1.6</td>\r\n			<td>mmo l / L</td>\r\n			<td>F : &gt; 1.69</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;LDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>100</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 130</td>\r\n			<td>2.59</td>\r\n			<td>mmo l / L</td>\r\n			<td>&lt; 3.38</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;VLDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>30</td>\r\n			<td>mg/dl</td>\r\n			<td>2.00 ~ 38.00</td>\r\n			<td>1.7</td>\r\n			<td>mmo l / L</td>\r\n			<td>0.05 ~ 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;CHOL/HDL Ratio</td>\r\n			<td>&nbsp;</td>\r\n			<td>3.5</td>\r\n			<td>&nbsp;</td>\r\n			<td>&lt; 3.08</td>\r\n			<td>3.5</td>\r\n			<td>&nbsp;</td>\r\n			<td>&lt; 3.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Capillary Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>130</td>\r\n			<td>mg/dl</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Henry Lee','09223458791','Talamban Cadahuan Cebu City','Felix Remedio','24-08-21','466'),(1943,NULL,'75','172','1629820800',NULL,'<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CHEMISTRY 1</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>H/L</td>\r\n			<td>REFERENCES RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>CONVENTIONAL UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI UNITS</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fasting Blood Sugar</td>\r\n			<td>L</td>\r\n			<td>100</td>\r\n			<td>mg/dl</td>\r\n			<td>70 ~ 100</td>\r\n			<td>5.50</td>\r\n			<td>mmo l / L</td>\r\n			<td>3.88 ~ 5.54</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Creatinine</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.61</td>\r\n			<td>mg/dl</td>\r\n			<td>0.60 ~ 1.20</td>\r\n			<td>80.10</td>\r\n			<td>umo l / L</td>\r\n			<td>53.04 ~ 106.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uric Acid</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.91</td>\r\n			<td>mg/dl</td>\r\n			<td>F : 2.7 ~ 7.3</td>\r\n			<td>323.15</td>\r\n			<td>umo l / L</td>\r\n			<td>F : 160 ~ 432</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SGPT/ALT</td>\r\n			<td>H</td>\r\n			<td>60</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n			<td>30.00</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sodium</td>\r\n			<td>&nbsp;</td>\r\n			<td>132.80</td>\r\n			<td>meq/L</td>\r\n			<td>135.00 ~</td>\r\n			<td>140.1</td>\r\n			<td>mmo l / L</td>\r\n			<td>135.00 ~ 148.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>132.00</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Potassium</td>\r\n			<td>&nbsp;</td>\r\n			<td>3.32</td>\r\n			<td>meq/L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n			<td>3.32</td>\r\n			<td>mmo l /L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>CHEMISTRY 2</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>REFERENCE RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Conventional Units</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI Units</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lipid Profile</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Cholesterol</td>\r\n			<td>L</td>\r\n			<td>125</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 200</td>\r\n			<td>6.18</td>\r\n			<td>mmo l / L</td>\r\n			<td>&lt; 5.14</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Triglycerides</td>\r\n			<td>&nbsp;</td>\r\n			<td>126</td>\r\n			<td>mg/dl</td>\r\n			<td>10 ~ 150</td>\r\n			<td>1.43</td>\r\n			<td>mmo l / L</td>\r\n			<td>0.11 ~ 1.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;HDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>42.10</td>\r\n			<td>mg/dl</td>\r\n			<td>F : &gt; 65</td>\r\n			<td>1.45</td>\r\n			<td>mmo l / L</td>\r\n			<td>F : &gt; 1.69</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;LDL</td>\r\n			<td>H</td>\r\n			<td>182</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 130</td>\r\n			<td>4.38</td>\r\n			<td>mmo l / L</td>\r\n			<td>&lt; 3.38</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;VLDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>25.2</td>\r\n			<td>mg/dl</td>\r\n			<td>2.00 ~ 38.00</td>\r\n			<td>1.05</td>\r\n			<td>mmo l / L</td>\r\n			<td>0.05 ~ 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;CHOL/HDL Ratio</td>\r\n			<td>&nbsp;</td>\r\n			<td>3.08</td>\r\n			<td>&nbsp;</td>\r\n			<td>&lt; 3.08</td>\r\n			<td>3.08</td>\r\n			<td>&nbsp;</td>\r\n			<td>&lt; 3.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Capillary Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>120.00</td>\r\n			<td>mg/dl</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Julian Lee','09327416231','Maximo Patalinghug Avenue','Carl Arisgado','25-08-21','466'),(1944,NULL,'72','162','1629734400',NULL,'<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CLINICAL MICROSCOPY</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CLINICAL MICROSCOPY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Routine Urinalysis</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; Physical / Macroscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Color</td>\r\n			<td>YELLOW</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Transparency</td>\r\n			<td>CLEAR</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Chemical</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Sp. Gravity</td>\r\n			<td>1.015</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.003 ~ 1.035</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;pH</td>\r\n			<td>7.0</td>\r\n			<td>&nbsp;</td>\r\n			<td>5 ~ 8</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Protein</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Glucose</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bilirubin</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Blood</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Leucocytes</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Nitrite</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Urobilinogen</td>\r\n			<td>&lt; 1</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Ketone</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Microscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;RBC</td>\r\n			<td>0-1</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;WBC</td>\r\n			<td>0-3</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Epithelial Cells</td>\r\n			<td>MANY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bacteria</td>\r\n			<td>MODERATE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Mucus Threads</td>\r\n			<td>FEW</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Angela Ariola','9367416237','PS, 318 Victor Vega Street, Cubacub, Mandaue City, 6014','Dr. Michael Rygel','24-08-21','466'),(1945,NULL,'77','175','1629648000',NULL,'<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CHEMISTRY 1</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>H/L</td>\r\n			<td>REFERENCES RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>CONVENTIONAL UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI UNITS</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fasting Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>100</td>\r\n			<td>mg/dl</td>\r\n			<td>70 ~ 100</td>\r\n			<td>6.65</td>\r\n			<td>mmo l / L</td>\r\n			<td>3.88 ~ 5.54</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Creatinine</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.74</td>\r\n			<td>mg/dl</td>\r\n			<td>0.60 ~ 1.20</td>\r\n			<td>65.4</td>\r\n			<td>umo l / L</td>\r\n			<td>53.04 ~ 106.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uric Acid</td>\r\n			<td>&nbsp;</td>\r\n			<td>2.4</td>\r\n			<td>mg/dl</td>\r\n			<td>F : 2.7 ~ 7.3</td>\r\n			<td>357</td>\r\n			<td>umo l / L</td>\r\n			<td>F : 160 ~ 432</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SGPT/ALT</td>\r\n			<td>&nbsp;</td>\r\n			<td>56</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n			<td>56.00</td>\r\n			<td>U/L</td>\r\n			<td>&lt;34</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sodium</td>\r\n			<td>&nbsp;</td>\r\n			<td>135</td>\r\n			<td>meq/L</td>\r\n			<td>135.00 ~</td>\r\n			<td>135</td>\r\n			<td>mmo l / L</td>\r\n			<td>135.00 ~ 148.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>135</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>135</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Potassium</td>\r\n			<td>&nbsp;</td>\r\n			<td>3.4</td>\r\n			<td>meq/L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n			<td>3.6</td>\r\n			<td>mmo l /L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Sandra Arcilla','09115647895','Pitos Cebu City','Sunshine Zarga','23-08-21','466'),(1946,NULL,'73','162','1629734400',NULL,'<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>HBA1C</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HBA1C</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HbA1c (IE-HPLC)</td>\r\n			<td>5.6</td>\r\n			<td>%</td>\r\n			<td>Normal : &lt; 5.70%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Pre-diabetes : 5.70% ~ 6.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Diabetes : &gt; / = 6.50%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>Note:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\" summary=\"Blood Tests\">\r\n	<caption>Hematology</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HEMATOLOGY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ESR</td>\r\n			<td>&nbsp;</td>\r\n			<td>22</td>\r\n			<td>mm/hr</td>\r\n			<td>&lt; 30</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Complete Blood Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;White Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.5</td>\r\n			<td>10^9/L</td>\r\n			<td>4.00 ~ 10.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Red Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.3</td>\r\n			<td>10^12/L</td>\r\n			<td>4.20 ~ 5.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hemoglobin</td>\r\n			<td>&nbsp;</td>\r\n			<td>138</td>\r\n			<td>g/L</td>\r\n			<td>125 ~ 160</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hematocrit</td>\r\n			<td>&nbsp;</td>\r\n			<td>41</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.37 ~ 0.47</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Volume</td>\r\n			<td>&nbsp;</td>\r\n			<td>80</td>\r\n			<td>fL</td>\r\n			<td>78 ~ 100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb</td>\r\n			<td>&nbsp;</td>\r\n			<td>33</td>\r\n			<td>pg</td>\r\n			<td>27 ~ 31</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb Conc.</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.33</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.32 ~ 0.36</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;RBC Distribution Width</td>\r\n			<td>&nbsp;</td>\r\n			<td>13.3</td>\r\n			<td>%</td>\r\n			<td>11.0 ~ 16.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Platelet Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>150</td>\r\n			<td>10^9/L</td>\r\n			<td>150 ~ 450</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Relative)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Segmenters / Neutrophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>51.0</td>\r\n			<td>%</td>\r\n			<td>50.0 ~ 70.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Lymphocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>40</td>\r\n			<td>%</td>\r\n			<td>18.0 ~ 42.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Monocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>8</td>\r\n			<td>%</td>\r\n			<td>2.0 ~ 11.o</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Eosinophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>5.0</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 6.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Basophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.4</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bands</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.4</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Absolute)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Seg/Neutro Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>2.0</td>\r\n			<td>10^9/L</td>\r\n			<td>1.30 ~ 6.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Lymphocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.0</td>\r\n			<td>10^9/L</td>\r\n			<td>1.50 ~ 3.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Monocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.30</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Eosinophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.05</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Basophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.3</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Band Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.00</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n',NULL,'763','Jacob Cortes','9326517433','Aviation Rd. Hangar Basak Lapulapu City, 6015','Dr. Michael Rygel','24-08-21','466'),(1947,NULL,'67','175','1629820800',NULL,'<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CHEMISTRY 1</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>H/L</td>\r\n			<td>REFERENCES RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>CONVENTIONAL UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI UNITS</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fasting Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>99</td>\r\n			<td>mg/dl</td>\r\n			<td>70 ~ 100</td>\r\n			<td>5.6</td>\r\n			<td>mmo l / L</td>\r\n			<td>3.88 ~ 5.54</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Creatinine</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.74</td>\r\n			<td>mg/dl</td>\r\n			<td>0.60 ~ 1.20</td>\r\n			<td>88.42</td>\r\n			<td>umo l / L</td>\r\n			<td>53.04 ~ 106.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uric Acid</td>\r\n			<td>&nbsp;</td>\r\n			<td>2.6</td>\r\n			<td>mg/dl</td>\r\n			<td>F : 2.7 ~ 7.3</td>\r\n			<td>155</td>\r\n			<td>umo l / L</td>\r\n			<td>F : 160 ~ 432</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SGPT/ALT</td>\r\n			<td>&nbsp;</td>\r\n			<td>56</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n			<td>56.00</td>\r\n			<td>U/L</td>\r\n			<td>&lt;34</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sodium</td>\r\n			<td>&nbsp;</td>\r\n			<td>135.00</td>\r\n			<td>meq/L</td>\r\n			<td>135.00 ~</td>\r\n			<td>135</td>\r\n			<td>mmo l / L</td>\r\n			<td>135.00 ~ 148.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>148.00</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Potassium</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.5</td>\r\n			<td>meq/L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n			<td>4.5</td>\r\n			<td>mmo l /L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','April Jane Garbo','+639150446456','NASIPIT TALAMBAN','Sunshine Zarga','25-08-21','466'),(1948,NULL,'70','171','1629907200',NULL,'<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>HBA1C</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HBA1C</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HbA1c (IE-HPLC)</td>\r\n			<td>5.6</td>\r\n			<td>%</td>\r\n			<td>Normal : &lt; 5.70%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Pre-diabetes : 5.70% ~ 6.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Diabetes : &gt; / = 6.50%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CHEMISTRY 1</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>H/L</td>\r\n			<td>REFERENCES RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>CONVENTIONAL UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI UNITS</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fasting Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>99</td>\r\n			<td>mg/dl</td>\r\n			<td>70 ~ 100</td>\r\n			<td>5.6</td>\r\n			<td>mmo l / L</td>\r\n			<td>3.88 ~ 5.54</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Creatinine</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.74</td>\r\n			<td>mg/dl</td>\r\n			<td>0.60 ~ 1.20</td>\r\n			<td>88.42</td>\r\n			<td>umo l / L</td>\r\n			<td>53.04 ~ 106.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uric Acid</td>\r\n			<td>&nbsp;</td>\r\n			<td>2.6</td>\r\n			<td>mg/dl</td>\r\n			<td>F : 2.7 ~ 7.3</td>\r\n			<td>155</td>\r\n			<td>umo l / L</td>\r\n			<td>F : 160 ~ 432</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SGPT/ALT</td>\r\n			<td>&nbsp;</td>\r\n			<td>56</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n			<td>56.00</td>\r\n			<td>U/L</td>\r\n			<td>&lt;34</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sodium</td>\r\n			<td>&nbsp;</td>\r\n			<td>135.00</td>\r\n			<td>meq/L</td>\r\n			<td>135.00 ~</td>\r\n			<td>135</td>\r\n			<td>mmo l / L</td>\r\n			<td>135.00 ~ 148.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>148.00</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Potassium</td>\r\n			<td>&nbsp;</td>\r\n			<td>4.5</td>\r\n			<td>meq/L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n			<td>4.5</td>\r\n			<td>mmo l /L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Anne Rodriguez','09327416231','Mandaue City','Rose Ann Bergente','26-08-21','466'),(1949,NULL,'78','169','1629820800',NULL,'<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CLINICAL MICROSCOPY</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CLINICAL MICROSCOPY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Routine Urinalysis</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; Physical / Macroscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Color</td>\r\n			<td>PALE YELLOW</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Transparency</td>\r\n			<td>SLIGHTLYY CLOUDY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Chemical</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Sp. Gravity</td>\r\n			<td>1.020</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.003 ~ 1.035</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;pH</td>\r\n			<td>5.2</td>\r\n			<td>&nbsp;</td>\r\n			<td>5 ~ 8</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Protein</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Glucose</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bilirubin</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Blood</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Leucocytes</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Nitrite</td>\r\n			<td>NEGATIVE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Urobilinogen</td>\r\n			<td>&lt; 1.0</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Ketone</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Microscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;RBC</td>\r\n			<td>0-2</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;WBC</td>\r\n			<td>0-1</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Epithelial Cells</td>\r\n			<td>MANY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bacteria</td>\r\n			<td>FEW</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Mucus Threads</td>\r\n			<td>RARE</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'763','Isaac Oporto','+639874563312','Banilad Cebu City','Mary Grace Teleron','25-08-21','466'),(1952,NULL,'62','162','1629993600',NULL,'<p><strong>Clinical&nbsp;History:</strong></p>\r\n\r\n<p>This 62 year-old black female had been worked up by&nbsp;medicine&nbsp;for masses in the epigastrium. A liver&nbsp;scan&nbsp;revealed multiple filling defects and an&nbsp;upper GI series&nbsp;revealed an antral&nbsp;lesion&nbsp;which was obstructing the&nbsp;fundus&nbsp;of the stomach.</p>\r\n\r\n<p><strong>Operative Findings:</strong></p>\r\n\r\n<p>Under&nbsp;general anesthesia, with the patient in the&nbsp;supine&nbsp;position, the&nbsp;abdomen&nbsp;was prepped and draped in the usual fashion. An upper midline&nbsp;incision&nbsp;was made and the&nbsp;peritoneal cavity&nbsp;entered. Generalized&nbsp;abdominal&nbsp;exploration&nbsp;revealed multiple large nodules within the substance of both lobes of the liver and a large ulcerating lesion in area of the&nbsp;antrum&nbsp;of the stomach. Multiple nodes along the lesser and greater curvature of the stomach and the subpyloric area were positive clinically for&nbsp;tumor. The stomach was not adherent to the&nbsp;pancreas&nbsp;or any other structures, therefore, a distal gastrectomy was undertaken. The greater and lesser curvatures of the stomach were freed up as was the&nbsp;duodenum, and Payr clamps were placed along the distal stomach just beyond the&nbsp;pylorus, and the distal stump was amputated.</p>\r\n\r\n<p><strong>Procedure Continued:</strong></p>\r\n\r\n<p>This was reflected up and the left gastric&nbsp;arteries&nbsp;were ligated. The stomach was then transected in the usual fashion and the greater curvature tapered using a 2-0 chromic and an inverting&nbsp;suture&nbsp;of 2-0 silk.</p>\r\n',NULL,'763','Patient Clavio','+63 961 632 7980','Gen Junquera Ext Cebu City','Dr. Michael Rygel','27-08-21','466'),(1953,NULL,NULL,'184','1630598400',NULL,'<h1>Pediatric Health History Form &ndash; Initial Visit</h1>\r\n\r\n<h3><strong>&nbsp;</strong></h3>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:100px; width:600px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Child&#39;s Name</strong></p>\r\n\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:200px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>\r\n			<p><strong>Date of Birth&nbsp;</strong></p>\r\n\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:150px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>MOther&#39;s Name</p>\r\n\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:200px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:100px; width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2><strong>Child&rsquo;s Past Medical History</strong></h2>\r\n\r\n<h3><strong>Pregnancy/Neonatal Period</strong></h3>\r\n\r\n<p>Where was your child born? ________________________________ Is the child yours by birth adoption stepchild other Pregnancy complications _________________________________ Delivery by vaginal c-section Reason for c-section ______________________________ Complications ___________________________________ Was your child premature No Yes, born at __________ weeks Complications ___________________________________ Apgar scores 1 minute _________ 5 minutes ______________ Birth weight __________________ Length _________________ Other problems in the newborn period ________________________ _______________________________________________________</p>\r\n\r\n<pre>\r\n&nbsp;</pre>\r\n',NULL,'825',NULL,NULL,NULL,'Faith Aquino','03-09-21','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_category`
--

LOCK TABLES `lab_category` WRITE;
/*!40000 ALTER TABLE `lab_category` DISABLE KEYS */;
INSERT INTO `lab_category` VALUES (35,'Complete blood count (CBC)','Hematology Test','',NULL),(36,'Red blood cell count (RBC)','Hematology Test','',NULL),(37,'Platelet count','Hematology Test','',NULL),(38,'Hematocrit red blood cell volume (HCT)','Hematology Test','',NULL),(39,'Hemoglobin concentration (HB)','Hematology Test','',NULL),(40,'Vitamin B12 Deficiency','Hematology Test','',NULL),(41,'Renal Profiling','Hematology Test','',NULL),(42,'Cholesterol','Hematology Test','',NULL),(43,'Mean Corpuscular Volume','Hematology Test','',NULL),(44,'Lymphocytes','Hematology Test','',NULL),(45,'Monocytes','Hematology Test','',NULL),(46,'ESR','Hematology Test','',NULL),(47,'HbA1c','Hematology Test','',NULL),(48,'Sodium','Hematology Test','',NULL),(49,'Potassium','Hematology Test','',NULL),(50,'Triglycerides','Hematology Test','',NULL),(51,'pH','Routine Urinalysis','',NULL),(52,'Protein','Routine Urinalysis','(70-110)mg/dl',NULL),(53,'Glucose','Routine Urinalysis','',NULL),(54,'Bilirubin','Routine Urinalysis','',NULL),(55,'Blood','Routine Urinalysis','',NULL),(56,'Leucocytes','Routine Urinalysis','',NULL),(57,'Nitrite','Routine Urinalysis','',NULL),(58,'Urobilinogen','Routine Urinalysis','',NULL),(59,'Ketone','Routine Urinalysis','',NULL),(61,'RBC','Routine Urinalysis','',NULL),(62,'WBC','Routine Urinalysis','',NULL),(63,'Epithelial Cells','Routine Urinalysis','',NULL),(64,'Bacteria','Routine Urinalysis','',NULL),(65,'Globulin','Hematology Test','',NULL),(66,'Total Protein','Hematology Test','',NULL),(67,'Lipoprotein','Hematology Test','',NULL),(68,'Albumin','Hematology Test','',NULL),(69,'Calcium','Hematology Test','',NULL),(70,'Mammogram (Digital)','Radiology','',NULL),(71,'Upper Extremity-Shoulder (XRay)','Radiology','',NULL),(106,'Abdomen (XRay)','Radiology','',NULL),(107,'Upper Extremity Left Shoulder (XRay)','Radiology','',NULL),(108,'Lower Extremity Left Foot (XRay)','Radiology','',NULL),(114,'Chest (XRay)','Radiology','',NULL),(113,'Lower Extremity Right Femur Tibia (XRay)','Radiology','',NULL),(115,'Lower Extremity Right Hip (XRay)','Radiology','',NULL),(116,'Lower Extremity Right Knee (XRay)','Radiology','',NULL),(117,'Lower Extremity Left Femur Tibia (XRay)','Radiology','',NULL),(118,'Lower Extremity Left Hip (XRay)','Radiology','',NULL),(120,'Lower Extremity Left Knee (XRay)','Radiology','',NULL),(126,'ECG','ECG','',NULL),(128,'Complete blood count (CBC)','Hematology Test','NA','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorist`
--

LOCK TABLES `laboratorist` WRITE;
/*!40000 ALTER TABLE `laboratorist` DISABLE KEYS */;
INSERT INTO `laboratorist` VALUES (6,'uploads/mr_lab_technician.jpg','Mr Lab Technician','labtech@rygel.biz','Pardo Cebu City','+639171234567',NULL,NULL,'789','466'),(7,'uploads/Donald-Suarez-Lab-Technician.jpg','Donald Suarez','labtechnician1.rygeltech@gmail.com','Camputhaw Capitol Cebu City','+639150332656',NULL,NULL,'808','466'),(8,'uploads/Maricar-Sabay-Lab-Technician.jpg','Maricar Sabay','labtechnician2.rygeltech@gmail.com','Mabolo Cebu City','+639326451723',NULL,NULL,'809','466'),(9,'uploads/Evan-Castro-Lab-Technician.jpg','Evan Castro','labtechnician1.mandaue@mailinator.com','Cadahuan Talamban Cebu City','+639236785425',NULL,NULL,'842','477'),(10,'uploads/Jenny-Sabaricos-Mandaue_-Lab-Technician.jpg','Jenny Sabaricos','labtechnician2.mandaue@mailinator.com','Bulacao Cebu City','+639092675647',NULL,NULL,'843','477');
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (37,'49.145.163.238','doctor1@rygel.biz',1630662423),(38,'49.145.163.238','patient@rygel.biz',1630664154);
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
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_history`
--

LOCK TABLES `medical_history` WRITE;
/*!40000 ALTER TABLE `medical_history` DISABLE KEYS */;
INSERT INTO `medical_history` VALUES (64,'68','Arthritis multiple sites','<p><strong>Arthritis multiple sites</strong></p>\r\n\r\n<p>Arthritis of left shoulder region, likely osteoarthritis. Referral to PT</p>\r\n','Joseph Castro','239 Bonifacio District','09562931921',NULL,'1552579200',NULL,'466'),(65,'68','Arthritis multiple sites','<p><strong>Arthritis multiple sites</strong></p>\r\n\r\n<p>Cervical and bilateral R&gt;L shoulder pain. Change in functional status since onset &ndash; Lives in a 2-level condo 12 steps to 2​nd​ floor. Grade 3 tenderness to palpation in bilateral upper traps, scalenes, suboccipital, levator scaphoid, and splenius cap muscles. Pain rating is 2-3/10. Neck Disability Index &ndash; Pain intensity 2, Personal care 2, Lifting 5, Reading 2, headache 1, work 1, driving 2, sleeping 1, recreation 3. Score 38%. Upper extremity functional scale &ndash; Total score 47/80 with the most affected being overhead activities, grooming hair, driving, fine finger movements, etc. Difficulty with holding his head upright and turning his head. PT 2x per week, for 12 weeks</p>\r\n','Joseph Castro','239 Bonifacio District','09562931921',NULL,'1597161600',NULL,'466'),(66,'71','Pneumonia','<p><strong>Pneumonia</strong></p>\r\n\r\n<p>CT chest without IV contrast. Comparison 06/29/2016 &ndash; Improved pneumonitis in the axillary segment of the right upper lobe and in the lower lobes bilaterally with additional findings as outline above. This imaging study has been named according to a standard nomenclature which is used in this institution&rsquo;s computer systems.</p>\r\n','William Lewis','Lapu-Lapu City','09177654321',NULL,'1570896000',NULL,'466'),(67,'66','Chronic Atrial Fibrillation','<p><strong>Chronic Atrial Fibrillation</strong></p>\r\n\r\n<p>Echo 2D complete with Doppler &ndash; Concentric LVH with normal left ventricular systolic function. Severely dilated left atrium. Mild MR. thickened aortic valve with mild restriction and moderate aortic insufficiency. Moderate to severe TR with pacemaker catheter seen across the tricuspid valve.</p>\r\n','Ian Dave Colina','Cabancalan, Mandaue City','5202271',NULL,'1589731200',NULL,'466'),(68,'66','Chronic Atrial Fibrillation','<p><strong>Chronic Atrial Fibrillation</strong></p>\r\n\r\n<p>Atrial fibrillation, primary.</p>\r\n','Ian Dave Colina','Cabancalan, Mandaue City','5202271',NULL,'1555862400',NULL,'466'),(69,'70','Cataract','<p><strong>Cataract</strong></p>\r\n\r\n<p>Bilateral cataract extraction with lens insertion &ndash; Phacoemulsification with posterior chamber intraocular lens, left eye (first left then right).</p>\r\n','Anne Rodriguez','Mandaue City','09327416231',NULL,'1623513600',NULL,'466'),(70,'70','Cataract','<p><strong>Cataract</strong></p>\r\n\r\n<p>Phacoemulsification with posterior chamber intraocular lens, toric implant, right eye.</p>\r\n','Anne Rodriguez','Mandaue City','09327416231',NULL,'1626537600',NULL,'466'),(71,'77','Sleep Disorder','<p><strong>Sleep Disorder</strong></p>\r\n\r\n<p>Nocturnal polysomnography, for snoring, day-time sleepiness and observed apneas. Concluded moderate obstructive sleep apnea associated with no significant oxygen desaturation. Positional dependency was observed based a sample of non-supine sleep. Severe periodic limb movement disorder was not associated with clinically significant number of arousals.</p>\r\n','Sandra Arcilla','Pitos Cebu City','+63 911 564 7895',NULL,'1570291200',NULL,'466'),(72,'74','Blood Disorder. Recurrent Hematomas','<p><strong>Blood Disorder. Recurrent Hematomas</strong></p>\r\n\r\n<p>X-ray abdomen AP and decubitus or Erect view, for worsening abdominal pain, and ecchymosis on abdomen &ndash; Moderate stool throughout the colon with distention of the hepatic flexure, no infiltrate or effusion. CT abdomen with IV contrast &ndash; Large left sided rectus sheath hematoma with evidence of active bleeding underlying tumor not excluded. Left lower lobe consolidation which may reflect atelectasis or pneumonia. Patient admitted for further care. BP was 207/85 on admission. Hb dropped requiring 2 units of pRBC then stabilized. WBC 8.2, RBC 4.31, hemoglobin 13.0, hematocrit 39.0, RDW 16.1, Segs 76.3&nbsp;</p>\r\n','Olivia Sanchez','Aviation Rd. Hangar Basak Lapulapu City, 6015','+63 932 651 7433',NULL,'1558195200',NULL,'466'),(73,'74','Blood Disorder. Recurrent Hematomas','<p><strong>Blood Disorder. Recurrent Hematomas</strong></p>\r\n\r\n<p>CT scan of the abdomen revealed 11x8 cm rectus sheath hematoma. Unclear which he would develop spontaneously another hematoma. Admitted. WBC 7.3, RBC 3.46, hemoglobin 10.4, hematocrit 32.5,RDW 18.3.</p>\r\n','Olivia Sanchez','Aviation Rd. Hangar Basak Lapulapu City, 6015','9326517433',NULL,'1558886400',NULL,'466'),(74,'74','Blood Disorder. Recurrent Hematomas','<p><strong>Blood Disorder. Recurrent Hematomas</strong></p>\r\n\r\n<p>Returned with development of an abdominal mass following sudden onset of abdominal wall pain. BP 180/85. CT chest and abdomen revealed left rectus sheath hematoma 10.8x8x29, slight increase in size compared to prior. There are areas of high attenuation within the hematoma, suggesting more recent bleeding, though there is no evidence of active extravasation. Stable right adrenal nodule. Indeterminate lesion in the left kidney. Further characterization with pre-and post-contrast CT or MRI is recommended. Peri bronchial thickening and left lowerlobe consolidation. Clinical correlation to exclude pneumonia is recommended. Ectasia/aneurysmal dilation of ascending aorta. EKG showed aFib, paced. Labs &ndash; Creatinine 1.6, albumin 3.3, h/H 10.4/32.5, MCV 93, RDW 18, platelets 388, INR 1.0.&nbsp;</p>\r\n','Olivia Sanchez','Aviation Rd. Hangar Basak Lapulapu City, 6015','9326517433',NULL,'1559491200',NULL,'466'),(75,'69','Basal Cell Carcinoma','<p><strong>Basal Cell Carcinoma</strong></p>\r\n\r\n<p>Inferior lateral right cheek biopsy, basal cell carcinoma.</p>\r\n','Albert Reyes','239 Bonifacio District','09177654321',NULL,'1580572800',NULL,'466'),(76,'69','Basal Cell Carcinoma','<p><strong>Basal Cell Carcinoma</strong></p>\r\n\r\n<p>Right parietal scalp above anterior right ear biopsy revealed &ndash; BCC and adjacent seborrheic keratosis. Note: BCC extends to the base and a peripheral margin. The seborrheic keratosis extends to the opposite peripheral margin. Anterior left frontal scalp- biopsy revealed BCC, the neoplasm extends to the base.</p>\r\n','Albert Reyes','239 Bonifacio District','09177654321',NULL,'1609430400',NULL,'466'),(77,'68','Personal Medical History and Family History','<p><strong>FAMILY HISTORY:</strong></p>\r\n\r\n<p><strong>Father </strong>-&nbsp;heart disease, hypertension and arthritis</p>\r\n\r\n<p><strong>Mother</strong> - heart disease</p>\r\n\r\n<p><strong>Brother</strong> -&nbsp;Diabetes and Parkinson&rsquo;s</p>\r\n\r\n<p><strong>PERSONAL MEDICAL HISTORY</strong></p>\r\n\r\n<p>Arthritis, total right knee replacement, hearing loss, essential tremor, mild cognitive impairment, OSA on CPAP, pseudophakia, bilateral cataract surgery, vitamin B12 deficiency and back pain.</p>\r\n','Joseph Castro','239 Bonifacio District','09562931921',NULL,'1546272000',NULL,'466'),(78,'67','Memory Loss','<p><strong>Memory Loss</strong></p>\r\n\r\n<p>Difficulty finding words, Anomic aphasia</p>\r\n','April Jane Garbo','NASIPIT TALAMBAN','+639150446456',NULL,'1561219200',NULL,'466'),(79,'67','Memory Loss','<p><strong>Memory Loss</strong></p>\r\n\r\n<p>Some difficulty with memory, more forgetful. Brain MRI revealed no acute intracranial process. No enhancing lesions. Chronic small vessel ischemia and involutional changes. MRA revealed no evidence of any significant stenosis. There is development variation of dominant right, small left vertebral arteries as well as what appears to be a congenitally absent A1 segment of the right anterior cerebral artery. No specific Tx recommended.</p>\r\n','April Jane Garbo','NASIPIT TALAMBAN','+639150446456',NULL,'1561910400',NULL,'466'),(80,'67','Memory Loss','<p><strong>Memory Loss</strong></p>\r\n\r\n<p>Mild cognitive impairment with memory loss (Amnestic MCI), MOCA 25/30. Essential tremor. Exam revealed resting tremor present bilaterally, decreased vibration at the toes as well as areflexia at the ankles. TSH and folic acid WNL</p>\r\n','April Jane Garbo','NASIPIT TALAMBAN','+639150446456',NULL,'1609257600',NULL,'466'),(81,'76','Pericarditis','<p><strong>Pericarditis</strong></p>\r\n\r\n<p>Pericarditis, cough chest pain. CXR showed hypoinflation with mild basilar atelectasis. Sed rate 67 (0-20), HGB 11.4 (12.6-17.0). EKG revealed NSR. RBBB.</p>\r\n','Henry Lee','Talamban Cadahuan Cebu City','+63 922 345 8791',NULL,'1564329600',NULL,'466'),(82,'76','Pericarditis','<p><strong>Pericarditis</strong></p>\r\n\r\n<p>Chest pain, palpitation and SOB. Pericardial effusion. CT chest revealed mild pericardial fluid or thickening. No acute airspace disease seen. ANA screen negative. Sed rate 63 (0-20)</p>\r\n','Henry Lee','Talamban Cadahuan Cebu City','09223458791',NULL,'1566662400',NULL,'466'),(83,'76','Pericarditis','<p><strong>Pericarditis</strong></p>\r\n\r\n<p>Acute idiopathic pericarditis, improved. Echo showed impaired relaxation pattern of diastolic filling suggestive of grade I diastolic dysfunction. Estimated LVEF 50-55%. Trivial pericardial effusion. Mildly enlarged right ventricle.</p>\r\n','Henry Lee','Talamban Cadahuan Cebu City','09223458791',NULL,'1572710400',NULL,'466'),(84,'75','Sleep Apnea','<p><strong>Sleep Apnea</strong></p>\r\n\r\n<p>Sleep concern and sleep disordered breathing. Suspected sleep apnea and snoring. Sleep study on 11/06/2017 revealed severe obstructive sleep apnea with AHI of 72.8/hour. No REM sleep was seen on this study. Treatment with CPAP. CPAP titrated to level 12.</p>\r\n','Julian Lee','Maximo Patalinghug Avenue','+63 932 741 6231',NULL,'1572710400',NULL,'466'),(85,'75','Sleep Apnea','<p><strong>Sleep Apnea</strong></p>\r\n\r\n<p>Feeling energized since starting PAP therapy. Data from PAP showed average AHI of 19.2.</p>\r\n','Julian Lee','Maximo Patalinghug Avenue','09327416231',NULL,'1612022400',NULL,'466'),(86,'75','Sleep Apnea','<p><strong>Sleep Apnea</strong></p>\r\n\r\n<p>OSA, on CPAP. Not refreshed after waking up. Issues with mask leakage. Estimated AHI 44.2. Pressure adjusted to 12-18 cm. Instructed on weight loss measures.</p>\r\n','Julian Lee','Maximo Patalinghug Avenue','09327416231',NULL,'1615651200',NULL,'466'),(87,'78','Back Pain','<p><strong>Back Pain</strong></p>\r\n\r\n<p>Chronic midline low back pain w/o sciatica. Lumbar x-ray ordered.</p>\r\n','Isaac Oporto','Banilad Cebu City','+63 987 456 3312',NULL,'1612022400',NULL,'466'),(88,'78','Back Pain','<p><strong>Back Pain</strong></p>\r\n\r\n<p>L-spine x-ray showed multilevel degenerative changes of the lumbar spine. Recommended to continue with PT and Tylenol p.r.n.</p>\r\n','Isaac Oporto','Banilad Cebu City','+639874563312',NULL,'1581436800',NULL,'466'),(89,'72','Gastrointestinal','<p><strong>Gastrointestinal</strong></p>\r\n\r\n<p>Abdominal pain, bloating. Occasional urge incontinence.Dx of diverticulitis of colon. CBC ordered. Hx of colon polyps at 45.</p>\r\n','Angela Ariola','PS, 318 Victor Vega Street, Cubacub, Mandaue City, 6014','9367416237',NULL,'1572192000',NULL,'466'),(90,'72','Gastrointestinal','<p><strong>Gastrointestinal</strong></p>\r\n\r\n<p>Rectal bleeding, blood in morning BM. On Eliquis. Hx of upper GI bleed in the past. Hx of diverticulosis. CBC normal except platelet 148 (150-450).</p>\r\n','Angela Ariola','PS, 318 Victor Vega Street, Cubacub, Mandaue City, 6014','9367416237',NULL,'1605456000',NULL,'466'),(91,'73','Atrial Fibrillation','<p><strong>Atrial Fibrillation</strong></p>\r\n\r\n<p>In AFib when admitted. EKG showed atrial fibrillation. Echo showed EF of 60% without evidence of clot or PFO.</p>\r\n','Jacob Cortes','Aviation Rd. Hangar Basak Lapulapu City, 6015','9326517433',NULL,'1549814400',NULL,'466'),(92,'73','Atrial Fibrillation','<p><strong>Atrial Fibrillation</strong></p>\r\n\r\n<p>EKG showed AF. Borderline criteria for LVH with repolarization abnormality.</p>\r\n','Jacob Cortes','Aviation Rd. Hangar Basak Lapulapu City, 6015','9326517433',NULL,'1549900800',NULL,'466'),(93,'73','Atrial Fibrillation','<p><strong>Atrial Fibrillation</strong></p>\r\n\r\n<p>Echo showed LV size normal. Normal systolic function. Estimated EF 60%. Wall thickness was mildly to moderately increased. Trileaflet aortic valve, mild to&nbsp;moderate calcification. Mildly reduced cuspal separation.Mild to moderate AR. &nbsp;Aortic root was moderately dilated (4.8 cm). Moderate mitral valve annular calcification. Left atrium was moderately dilated. Right atrium mildly dilated.</p>\r\n','Jacob Cortes','Aviation Rd. Hangar Basak Lapulapu City, 6015','9326517433',NULL,'1550073600',NULL,'466'),(94,'67','Personal Medical History and Family History','<p><strong>Family History:</strong></p>\r\n\r\n<p><strong>Father:</strong>&nbsp;heart disease, hypertension and arthritis</p>\r\n\r\n<p><strong>Mother:&nbsp;</strong>Heart disease</p>\r\n\r\n<p><strong>Brother:&nbsp;</strong>Diabetes and Parkinson&rsquo;s</p>\r\n\r\n<p><strong>Personal Medical History:</strong></p>\r\n\r\n<p>Arthritis, total right knee replacement, hearing loss, essential tremor, mild cognitive impairment, OSA on CPAP, pseudophakia, bilateral cataract surgery, vitamin B12 deficiency and back pain.</p>\r\n\r\n<p>&nbsp;</p>\r\n','April Jane Garbo','NASIPIT TALAMBAN','+639150446456',NULL,'1554393600',NULL,'466'),(95,'62','Sharp Pain in the Left Shoulder','<p>Univariate statistics were used to compare differences in sociodemographic and clinical characteristics in patients with pneumonia-related and pneumonia-unrelated mortality. Causes of death as a function of pneumonia severity risk class and timing of death were analyzed using simple descriptive techniques. Categorical variables were analyzed using the &chi;2&nbsp;test, and continuous variables were analyzed using the&nbsp;<em>t</em>&nbsp;test. To analyze time to death for patients with pneumonia-related and pneumonia-unrelated mortality, Kaplan-Meier estimated probabilities were computed. Statistical significance was assessed using the summary log-rank test. Statistical significance was defined as&nbsp;<em>P</em>&le;.05 (2-tailed) for all univariate and multivariate analyses.</p>\r\n\r\n<p>To evaluate risk factors for pneumonia-related, pneumonia-unrelated, and all-cause mortality, baseline patient sociodemographic and clinical characteristics were used as independent variables in 3 Cox proportional hazards regression models, using the 3 mortality outcomes as the respective dependent measures. The baseline variables included all factors composing the Pneumonia Patient Outcomes Research Team severity model, in addition to others that were postulated to have an association with 90-day mortality.10&nbsp;Site of care, severity risk class, intensive care unit status, do not resuscitate status, and symptoms were omitted as potential predictors. All baseline variables that were statistically significant in any of the 3 Cox proportional hazards regression models were then used in a competing-risk Cox proportional hazards regression model with pneumonia-related mortality, pneumonia-unrelated mortality, and survival as the respective dependent measures.12&nbsp;The Kolmogorov-Smirnov test was used to test the statistical significance of the survival curves for pneumonia-related and pneumonia-unrelated mortality in the competing-risk analysis. Univariate statistics were used to compare differences in sociodemographic and clinical characteristics in patients with pneumonia-related and pneumonia-unrelated mortality. Causes of death as a function of pneumonia severity risk class and timing of death were analyzed using simple descriptive techniques. Categorical variables were analyzed using the &chi;2&nbsp;test, and continuous variables were analyzed using the&nbsp;<em>t</em>&nbsp;test. To analyze time to death for patients with pneumonia-related and pneumonia-unrelated mortality, Kaplan-Meier estimated probabilities were computed. Statistical significance was assessed using the summary log-rank test. Statistical significance was defined as&nbsp;<em>P</em>&le;.05 (2-tailed) for all univariate and multivariate analyses.</p>\r\n\r\n<p>To evaluate risk factors for pneumonia-related, pneumonia-unrelated, and all-cause mortality, baseline patient sociodemographic and clinical characteristics were used as independent variables in 3 Cox proportional hazards regression models, using the 3 mortality outcomes as the respective dependent measures. The baseline variables included all factors composing the Pneumonia Patient Outcomes Research Team severity model, in addition to others that were postulated to have an association with 90-day mortality.10&nbsp;Site of care, severity risk class, intensive care unit status, do not resuscitate status, and symptoms were omitted as potential predictors. All baseline variables that were statistically significant in any of the 3 Cox proportional hazards regression models were then used in a competing-risk Cox proportional hazards regression model with pneumonia-related mortality, pneumonia-unrelated mortality, and survival as the respective dependent measures.12&nbsp;The Kolmogorov-Smirnov test was used to test the statistical significance of the survival curves for pneumonia-related and pneumonia-unrelated mortality in the competing-risk analysis.13</p>\r\n\r\n<p>Results</p>\r\n\r\n<p>Of the 2287 patients enrolled in the Pneumonia Patient Outcomes Research Team cohort study, 208 (9%) died within 90 days. Overall, 194 (14%) of the 1343 inpatients and 14 (1%) of the 944 outpatients died within this follow-up period.</p>\r\n\r\n<p><strong>Causes of death</strong></p>\r\n\r\n<p>As shown in&nbsp;Table 1, respiratory failure (38%), sepsis or bacteremia (7%), and cardiac arrhythmia (7%) were the 3 most frequent immediate causes of death. Neurological conditions (29%), lung cancer (13%), and cardiac ischemia (13%) were the 3 most frequent underlying causes of death.</p>\r\n\r\n<p>Death was defined as pneumonia related in 110 (53%) of the 208 deaths. Of the pneumonia-related deaths, pneumonia was the underlying cause of death in 20 patients, the immediate cause of death in 9, and a major contributor to death in 81. Of the pneumonia-unrelated deaths, pneumonia played a minor role in 34 patients, no role in 52, and an unknown role in 12.</p>\r\n\r\n<p>There were distinct differences between the immediate and underlying causes of death for pneumonia-related and pneumonia-unrelated mortality. The most frequent immediate causes of death for pneumonia-related mortality were respiratory failure (50%), pneumonia (8%), multisystem organ failure (6%), and sepsis (6%). In comparison, respiratory failure (26%), sepsis or bacteremia (9%), cardiac arrhythmia (8%), and congestive heart failure (7%) were the leading immediate causes of death for pneumonia-unrelated mortality. The most frequent underlying causes of death for pneumonia-related mortality were neurological conditions (22%), pneumonia (18%), and cerebrovascular accident (13%), compared with lung cancer (19%), other malignancies (17%), and cardiac ischemia (17%) for those with pneumonia-unrelated mortality.</p>\r\n\r\n<p><strong>Factors associated with mortality</strong></p>\r\n\r\n<p>The demographic and clinical factors with significant univariate associations with all-cause 90-day mortality are shown in&nbsp;Table 2. Overall, 85% of all deaths occurred among patients in the 2 highest risk classes; a greater proportion of pneumonia-related deaths also occurred within risk classes IV and V.</p>\r\n\r\n<p>Survival plots and frequency distributions of death over time of pneumonia-related and pneumonia-unrelated mortality are shown in&nbsp;Figure 1&nbsp;and&nbsp;Figure 2. For the 110 pneumonia-related deaths, 45% occurred within 2 weeks and 76% occurred within 30 days of presentation, compared with 8% and 30%, respectively, of the pneumonia-unrelated deaths (<em>P</em>&lt;.001 for both comparisons). The odds of a pneumonia-related death occurring within 30 days of presentation was 7.7 that of a pneumonia-unrelated death. The Kolmogorov-Smirnov test confirmed significantly different patterns in the time to death for those with pneumonia-related and pneumonia-unrelated mortality (<em>P</em>&le;.001).</p>\r\n\r\n<p>As shown in&nbsp;Table 3, 6 factors were independently associated with pneumonia-related mortality only: hypothermia, altered mental status, elevated serum urea nitrogen level, chronic liver disease, white blood cell count less than 4000/&micro;L, and hypoxemia. In addition, 6 factors were associated with pneumonia-unrelated mortality only: dementia, immunosuppression, active cancer, systolic hypotension, male sex, and multilobar infiltrates. Two variables, increasing age and evidence of aspiration, were independently associated with pneumonia-related and pneumonia-unrelated mortality. The magnitude of association for the factors independently associated with pneumonia-related mortality only ranged from a hazard ratio of 1.90 for temperature lower than 36.0&deg;C to 3.88 for chronic liver disease. The magnitude of association for the factors independently associated with pneumonia-unrelated mortality only ranged from 1.59 for male sex to 2.82 for dementia.</p>\r\n','Patient Clavio','Gen Junquera Ext Cebu City','+63 961 632 7980',NULL,'1629648000',NULL,'466'),(96,'62','Sharp Pain in the Left Shoulder','<p>Univariate statistics were used to compare differences in sociodemographic and clinical characteristics in patients with pneumonia-related and pneumonia-unrelated mortality. Causes of death as a function of pneumonia severity risk class and timing of death were analyzed using simple descriptive techniques. Categorical variables were analyzed using the &chi;2&nbsp;test, and continuous variables were analyzed using the&nbsp;<em>t</em>&nbsp;test. To analyze time to death for patients with pneumonia-related and pneumonia-unrelated mortality, Kaplan-Meier estimated probabilities were computed. Statistical significance was assessed using the summary log-rank test. Statistical significance was defined as&nbsp;<em>P</em>&le;.05 (2-tailed) for all univariate and multivariate analyses.</p>\r\n\r\n<p>To evaluate risk factors for pneumonia-related, pneumonia-unrelated, and all-cause mortality, baseline patient sociodemographic and clinical characteristics were used as independent variables in 3 Cox proportional hazards regression models, using the 3 mortality outcomes as the respective dependent measures. The baseline variables included all factors composing the Pneumonia Patient Outcomes Research Team severity model, in addition to others that were postulated to have an association with 90-day mortality.10&nbsp;Site of care, severity risk class, intensive care unit status, do not resuscitate status, and symptoms were omitted as potential predictors. All baseline variables that were statistically significant in any of the 3 Cox proportional hazards regression models were then used in a competing-risk Cox proportional hazards regression model with pneumonia-related mortality, pneumonia-unrelated mortality, and survival as the respective dependent measures.12&nbsp;The Kolmogorov-Smirnov test was used to test the statistical significance of the survival curves for pneumonia-related and pneumonia-unrelated mortality in the competing-risk analysis. Univariate statistics were used to compare differences in sociodemographic and clinical characteristics in patients with pneumonia-related and pneumonia-unrelated mortality. Causes of death as a function of pneumonia severity risk class and timing of death were analyzed using simple descriptive techniques. Categorical variables were analyzed using the &chi;2&nbsp;test, and continuous variables were analyzed using the&nbsp;<em>t</em>&nbsp;test. To analyze time to death for patients with pneumonia-related and pneumonia-unrelated mortality, Kaplan-Meier estimated probabilities were computed. Statistical significance was assessed using the summary log-rank test. Statistical significance was defined as&nbsp;<em>P</em>&le;.05 (2-tailed) for all univariate and multivariate analyses.</p>\r\n\r\n<p>To evaluate risk factors for pneumonia-related, pneumonia-unrelated, and all-cause mortality, baseline patient sociodemographic and clinical characteristics were used as independent variables in 3 Cox proportional hazards regression models, using the 3 mortality outcomes as the respective dependent measures. The baseline variables included all factors composing the Pneumonia Patient Outcomes Research Team severity model, in addition to others that were postulated to have an association with 90-day mortality.10&nbsp;Site of care, severity risk class, intensive care unit status, do not resuscitate status, and symptoms were omitted as potential predictors. All baseline variables that were statistically significant in any of the 3 Cox proportional hazards regression models were then used in a competing-risk Cox proportional hazards regression model with pneumonia-related mortality, pneumonia-unrelated mortality, and survival as the respective dependent measures.12&nbsp;The Kolmogorov-Smirnov test was used to test the statistical significance of the survival curves for pneumonia-related and pneumonia-unrelated mortality in the competing-risk analysis.13</p>\r\n\r\n<p>Results</p>\r\n\r\n<p>Of the 2287 patients enrolled in the Pneumonia Patient Outcomes Research Team cohort study, 208 (9%) died within 90 days. Overall, 194 (14%) of the 1343 inpatients and 14 (1%) of the 944 outpatients died within this follow-up period.</p>\r\n\r\n<p><strong>Causes of death</strong></p>\r\n\r\n<p>As shown in&nbsp;Table 1, respiratory failure (38%), sepsis or bacteremia (7%), and cardiac arrhythmia (7%) were the 3 most frequent immediate causes of death. Neurological conditions (29%), lung cancer (13%), and cardiac ischemia (13%) were the 3 most frequent underlying causes of death.</p>\r\n\r\n<p>Death was defined as pneumonia related in 110 (53%) of the 208 deaths. Of the pneumonia-related deaths, pneumonia was the underlying cause of death in 20 patients, the immediate cause of death in 9, and a major contributor to death in 81. Of the pneumonia-unrelated deaths, pneumonia played a minor role in 34 patients, no role in 52, and an unknown role in 12.</p>\r\n\r\n<p>There were distinct differences between the immediate and underlying causes of death for pneumonia-related and pneumonia-unrelated mortality. The most frequent immediate causes of death for pneumonia-related mortality were respiratory failure (50%), pneumonia (8%), multisystem organ failure (6%), and sepsis (6%). In comparison, respiratory failure (26%), sepsis or bacteremia (9%), cardiac arrhythmia (8%), and congestive heart failure (7%) were the leading immediate causes of death for pneumonia-unrelated mortality. The most frequent underlying causes of death for pneumonia-related mortality were neurological conditions (22%), pneumonia (18%), and cerebrovascular accident (13%), compared with lung cancer (19%), other malignancies (17%), and cardiac ischemia (17%) for those with pneumonia-unrelated mortality.</p>\r\n\r\n<p><strong>Factors associated with mortality</strong></p>\r\n\r\n<p>The demographic and clinical factors with significant univariate associations with all-cause 90-day mortality are shown in&nbsp;Table 2. Overall, 85% of all deaths occurred among patients in the 2 highest risk classes; a greater proportion of pneumonia-related deaths also occurred within risk classes IV and V.</p>\r\n\r\n<p>Survival plots and frequency distributions of death over time of pneumonia-related and pneumonia-unrelated mortality are shown in&nbsp;Figure 1&nbsp;and&nbsp;Figure 2. For the 110 pneumonia-related deaths, 45% occurred within 2 weeks and 76% occurred within 30 days of presentation, compared with 8% and 30%, respectively, of the pneumonia-unrelated deaths (<em>P</em>&lt;.001 for both comparisons). The odds of a pneumonia-related death occurring within 30 days of presentation was 7.7 that of a pneumonia-unrelated death. The Kolmogorov-Smirnov test confirmed significantly different patterns in the time to death for those with pneumonia-related and pneumonia-unrelated mortality (<em>P</em>&le;.001).</p>\r\n\r\n<p>As shown in&nbsp;Table 3, 6 factors were independently associated with pneumonia-related mortality only: hypothermia, altered mental status, elevated serum urea nitrogen level, chronic liver disease, white blood cell count less than 4000/&micro;L, and hypoxemia. In addition, 6 factors were associated with pneumonia-unrelated mortality only: dementia, immunosuppression, active cancer, systolic hypotension, male sex, and multilobar infiltrates. Two variables, increasing age and evidence of aspiration, were independently associated with pneumonia-related and pneumonia-unrelated mortality. The magnitude of association for the factors independently associated with pneumonia-related mortality only ranged from a hazard ratio of 1.90 for temperature lower than 36.0&deg;C to 3.88 for chronic liver disease. The magnitude of association for the factors independently associated with pneumonia-unrelated mortality only ranged from 1.59 for male sex to 2.82 for dementia.</p>\r\n','Patient Clavio','Gen Junquera Ext Cebu City','+63 961 632 7980',NULL,'1629820800',NULL,'466'),(97,'62','Back Pain','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative reports. The resulting designs should also serve as mental guidelines to facilitate learning and to enhance the safety of the operation.</p>\r\n\r\n<p>An operative report is meant to record the essence of an operation, but little effort has been made to determine how successfully operative reports meet this objective. Furthermore,&nbsp;<em>essence</em>&nbsp;has not been defined with any usable specificity. Research on operative reports so far has addressed its usefulness for billing, determination of differences between what residents and attending surgeons dictate, and specific aspects of the operation such as specimen size, incision length, implants, and suture used.1-13</p>\r\n','Patient Clavio','Gen Junquera Ext Cebu City','+63 961 632 7980',NULL,'1629907200',NULL,'466');
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
) ENGINE=MyISAM AUTO_INCREMENT=2908 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine`
--

LOCK TABLES `medicine` WRITE;
/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
INSERT INTO `medicine` VALUES (2878,'Biogesic tab','Analgesics','50','A1','70',78,'Paracetamol','UNILAB, Inc','Adverse Reactions-Allergic skin reactions, GI disturbances, changes in the number of WBC & platelets','01-12-2021','08/12/21','466'),(2879,'Advil softgel 200 mg','Analgesics','8.5','A01','12.75',84,'Ibuprofen','Catalent Australia','Abdominal pain, diarrhea, nausea w/ or w/o vomiting, ','01-08-2022','08/16/21','466'),(2880,'Conjupram FC tab 10 mg','Antidepressants','3.3','AO6','4.95',25,'Escitalopram','Akums Drug','Both genders: Nausea, insomnia, somnolence,','16-09-2022','08/16/21','466'),(2881,'Amicare soln for inj 125 mg/mL','Antibacterials','10','A03','15',120,'Amikacin','Tianjin Pharma','Hearing loss, dizziness or vertigo; reversible nephrotoxicity, acute renal failure','20-08-2022','08/16/21','466'),(2882,'Biolab Streptomycin Sulfate powd for inj 1 g','Antibacterials','416.08','A03','624.12',91,'Streptomycin','Biolab','Fever, skin eruptions, paresthesias of the face & head, conjunctive & renal irritation','15-10-2022','08/16/21','466'),(2883,'Funxion cap 75 mg','Anticonvulsants','37','A04','55.5',994,'Pregabalin','United Lab','Asthenia, body odor, chills, death, sudden death, edema (generalized, face, peripheral)','30-09-2021','08/16/21','466'),(2884,'Clonotril-2 tab 2 mg','Anticonvulsants','11.8','A04','17.7',174,'Clonazepam','Torrent','Drowsiness; sedation, muscle weakness, ataxia. ','25-08-2022','08/16/21','466'),(2885,'Dopezil FC tab 5 mg','Antidementia Agents','71','A05','106.5',476,'Donepezil','Medichem','Asthenia, fungal infection, flu syndrome, malaise, sepsis, face edema, hernia, fever, back pain','20-10-2022','08/16/21','466'),(2886,'Nizoral Cream cream 2%','Antifungals','295','A09','442.5',495,'Ketoconazole','Johnson & Johnson','Irritation & burning sensation. Rarely allergic skin phenomena (contact dermatitis).','25-11-2022','08/16/21','466'),(2887,'Elin Lidocaine Hydrochloride inj 2 %','Anesthetics','65','A02','97.5',140,'Lidocaine','EL Lab','Nervousness, dizziness, blurred vision, nausea, tremor, convulsions, drowsiness.','20-10-2022','08/16/21','466'),(2888,'Alclav FC tab 625 mg','Analgesics, including opioids and non-opioids','35','A03','53',50,'Amoxicillin + Clavulanic Acid','Alkem Lab','Diarrhoea, indigestion, nausea, vomiting, mucocutaneous candidiasis','15-04-2022','08/20/21','466'),(2889,'Abixa FC tab 20 mg','Analgesics, including opioids and non-opioids','255','A05','382',28,'Memantine','Lundbeck','Hallucination, confusion, dizziness, headache, tiredness.','20-08-2022','08/20/21','466'),(2890,'Actimed Celecoxib cap 200 mg','Analgesics, including opioids and non-opioids','100','A01','150',100,'Celecoxib','Endurance','GI disturbances especially diarrhea; exfoliative dermatitis, Stevens-Johnson syndrome','20-08-2022','08/20/21','466'),(2891,'Actimed Cefuroxime FC tab 500 mg','Analgesics, including opioids and non-opioids','630','D02','945',10,'Cefuroxime','Brawn Labs','GI disturbances including diarrhea, nausea & vomiting. ','22-08-2022','08/20/21','466'),(2892,'Celsus Chloramphenicol Eye Drops eye drops 0.5 %','Analgesics, including opioids and non-opioids','100','O01','150',100,'Chloramphenicol','EL Lab','Local irritations w/ itching & burning, angioneurotic edema, urticaria','31-08-2022','08/20/21','466'),(2893,'Esoget DRT delayed release tab 40 mg','Analgesics, including opioids and non-opioids','50.5','G02','75.75',100,'Esomeprazole','Alvita Pharma','Agranulocytosis, pancytopenia; blurred vision; pancreatitis, stomatitis;','28-08-2022','08/20/21','466'),(2894,'Amivan FC tab 5 mg','Analgesics, including opioids and non-opioids','13.5','C01','20.25',30,'Ramipril','ACME','symptomatic hypotension, syncope, palpitations; cough','15-09-2022','08/20/21','466'),(2895,'Actimax cap 200 mg','Analgesics, including opioids and non-opioids','50','B03','75',100,'Cefixime','PSA','Diarrhea, stool changes; pseudomembranous colitis.','28-08-2022','08/20/21','466'),(2896,'Altrox tab 250 mcg','Analgesics, including opioids and non-opioids','21.5','B01','32.25',100,'Alprazolam','Torrent','Drowsiness, sedation, muscle weakness & ataxia.','26-08-2022','08/20/21','466'),(2897,'Anekcin inj 20 mg/mL','Analgesics, including opioids and non-opioids','10','N01','15',200,'Suxamethonium','Harson','Prolonged apnea & resp depression; tachyphylaxis; transient fasciculations','10-09-2022','08/20/21','466'),(2898,'Arcoxia tab 90 mg','Analgesics, including opioids and non-opioids','59.766','A05','89.649',30,'Etoricoxib','Merck Sharp & Dohme','Asthenia/fatigue, dizziness, lower extremity edema, HTN, dyspepsia, heartburn','25-08-2022','08/20/21','466'),(2899,'Neozep','Analgesics, including opioids and non-opioids','10','A20','15',100,'Ibuprofen','Rygel Technology Solutions','[test ] Conclusions  Current practice generates operative reports that vary widely ','26-08-2022','08/26/21','466'),(2900,'[Test]Conclusions  Current practice generates operative reports that vary widely','Analgesics, including opioids and non-opioids','10','A20','15',100,'Ibuprofen','Rygel Technology Solutions','Both genders: Nausea, insomnia, somnolence,','26-08-2022','08/26/21','466'),(2901,'Neozep','Analgesics, including opioids and non-opioids','[Test]Conclusions Current practice generates operative reports that vary widely','A20','15',100,'Ibuprofen','Rygel Technology Solutions','Both genders: Nausea, insomnia, somnolence,','26-08-2022','08/26/21','466'),(2902,'Neozep','Analgesics, including opioids and non-opioids','10','A20','[Test]Conclusions Current practice generates operative reports that vary widely',100,'Ibuprofen','Rygel Technology Solutions','Both genders: Nausea, insomnia, somnolence,','26-08-2022','08/26/21','466'),(2903,'Neozep','Analgesics, including opioids and non-opioids','10','A20','15',0,'Ibuprofen','Rygel Technology Solutions','Both genders: Nausea, insomnia, somnolence,','26-08-2022','08/26/21','466'),(2904,'Neozep','Analgesics, including opioids and non-opioids','10','A20','15',100,'[Test]Conclusions Current practice generates operative reports that vary widely','Rygel Technology Solutions','Both genders: Nausea, insomnia, somnolence,','26-08-2022','08/26/21','466'),(2905,'Neozep','Analgesics, including opioids and non-opioids','10','A20','15',100,'Ibuprofen','[Test]Conclusions Current practice generates operative reports that vary widely','Both genders: Nausea, insomnia, somnolence,','26-08-2022','08/26/21','466'),(2906,'Neozep','Analgesics, including opioids and non-opioids','10','[Test]Conclusions Current practice generates operative reports that vary widely','15',100,'Ibuprofen','Rygel Technology Solutions','Both genders: Nausea, insomnia, somnolence,','26-08-2022','08/26/21','466'),(2907,'Neozep','Analgesics, including opioids and non-opioids','10','A20','15',100,'Ibuprofen','Rygel Technology Solutions','Under general anesthesia, with the patient in the supine position,','27-08-2022','08/27/21','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine_category`
--

LOCK TABLES `medicine_category` WRITE;
/*!40000 ALTER TABLE `medicine_category` DISABLE KEYS */;
INSERT INTO `medicine_category` VALUES (26,'Analgesics, including opioids and non-opioids','Drugs that relieve pain.','466'),(27,'Antacids','Drugs that relieve indigestion and heartburn by neutralizing stomach acid.','466'),(28,'Antianxiety Drugs','Drugs that suppress anxiety and relax muscles ','466'),(29,'Antiarrhythmics','Drugs used to control irregularities of heartbeat.','466'),(30,'Antibacterials, including antibiotics','Drugs used to treat infections.','466'),(31,'Antibiotics','Drugs made from naturally occurring and synthetic substances that combat bacterial infection. ','466'),(32,'Anticoagulants and Thrombolytics','Anticoagulants prevent blood from clotting. Thrombolytics help dissolve and disperse blood clots ','466'),(33,'Anticonvulsants','Drugs that prevent epileptic seizures','466'),(34,'Antidepressants','Mood-lifting drugs','466'),(35,'Antidiarrheals','Drugs used for the relief of diarrhea','466'),(36,'Antidementia Agents','are pharmaceutical agents that may slow the progression ','466'),(37,'Antifungals','Drugs used to treat fungal infections, the most common of which affect the hair','466'),(38,'Anesthetics','A substance that causes lack of feeling or awareness, ','466'),(39,'Antidotes and antitoxins','is a substance that can counteract a form of poisoning. ','466'),(40,'Antiemetics','Drugs used to treat nausea and vomiting.','466'),(41,'Anti-inflammatory agents, including corticosteroids and (NSAIDs)','are medications that relieve or reduce pain.','466'),(42,'Antimigraine agents','are medicines used to prevent or reduce the severity of migraine headaches.','466'),(43,'Antimyasthenic agents','are given by mouth or by injection to treat myasthenia gravis.','466'),(44,'Antimycobacterials','are used for the treatment of mycobacterial infections, including tuberculosis','466'),(45,'Antineoplastics','Acting to prevent, inhibit or halt the development of a neoplasm (a tumor). ','466'),(46,'Antiparasitics','Effective in the treatment of parasites.','466'),(47,'Antiparkinson agents','are medicines that relieve the symptoms of Parkinson\'s disease and other forms of parkinsonism.','466'),(48,'Antipsychotics','Drugs used to treat symptoms of severe psychiatric disorders. ','466'),(49,'Antivirals, including HIV antiretrovirals and direct-acting hepatitis C drugs','An agent that kills a virus or that suppresses its ability to replicate ','466'),(50,'Anxiolytic (anti-anxiety) agents','A drug used to treat symptoms of anxiety, such as feelings of fear, dread','466'),(51,'Bipolar agents','also known as manic depression, is a mental illness that brings severe high and low moods ','466'),(52,'Blood glucose regulators, including insulin and other diabetes medications','involves maintaining blood glucose levels at constant levels in the face of dynamic glucose intake ','466'),(53,'Blood products, including anticoagulants','which is routinely used in surgery and other medical procedures.','466'),(54,'Cardiovascular agents, including beta-blockers and ACE inhibitors','that affect the rate or intensity of cardiac contraction, blood vessel diameter','466'),(55,'Central nervous system agents, including amphetamines','is responsible for processing and controlling most of our bodily functions,','466'),(56,'Dental and oral agents','is a branch of medicine that consists of the study, diagnosis, prevention, ','466'),(57,'Dermatological (skin) agents','Drugs used to treat or prevent skin disorders or for the routine care of skin. ','466'),(58,'Enzyme replacement agent','is a medical treatment whereby replacement enzymes are given to patients who suffer ','466'),(66,'Neuromuscular Blocking Agents','potent muscle relaxants typically only used during surgery to prevent muscle movement.','466'),(67,'Antidementia Agents','[Test] Conclusions  Current practice generates operative reports that vary widely in content','466'),(60,'Genitourinary (genital and urinary tract) agents','is a word that refers to the urinary and genital organs.','466'),(61,'Hormonal agents (adrenal)','are widely used in curative and palliative treatment of hormone-dependent tumors.','466'),(62,'Hormonal agents (pituitary)','is a pea-sized endocrine gland at the base of your brain','466'),(63,'Hormonal agents (prostaglandins)','One of a number of hormone-like substances that participate in a wide range of body functions ','466'),(64,'Ophthalmic (eye) agents','used during surgical procedures involving the eyes. ','466'),(65,'Gastrointestinal agents, including H2 blockers and proton pump inhibitors','Drugs used for their effects on the gastrointestinal system, as to control gastric acidity','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (15,'Staff Assigned to COVID Ward','<p>Attention to all staff assigned to COVID Ward. You are required to undergo testing.</p>\r\n','1628812800','staff','466'),(17,'Back Pain','<p><strong>Conclusions</strong>&nbsp;&nbsp;Current practice generates operative reports that vary wi','1629907200','patient','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nurse`
--

LOCK TABLES `nurse` WRITE;
/*!40000 ALTER TABLE `nurse` DISABLE KEYS */;
INSERT INTO `nurse` VALUES (17,'uploads/mrs_nurse.jpg','Mrs Nurse','nurse@rygel.biz','Gotoc Lapu lapu City','+639163456789',NULL,NULL,NULL,'790','466'),(18,'uploads/Mark-Ouano-Nurse.jpg','Mark Ouano','nurse1.rygeltech@gmail.com','Cadahuan Talamban Cebu City','+639114567389',NULL,NULL,NULL,'806','466'),(19,'uploads/Kim-Adolfo-Nurse.jpg','Kim Adolfo','nurse2.rygeltech@gmail.com','Banilad Cebu City','+639867534521',NULL,NULL,NULL,'807','466'),(20,NULL,'Jessica Lewis','jessicalewis@gmail.com','Clinical History: This 62 year-old black female had been worked up by medicine for masses in the epi','+639177654321',NULL,NULL,NULL,'823','466'),(21,'uploads/Darell-Ouano-Mandaue_-Nurse.jpg','Darell Ouano','nurse1.mandaue@mailinator.com','V1 - Nasipit Talamban Cebu City','+639160334656',NULL,NULL,NULL,'838','477'),(22,'uploads/Zairiel-Zuniga-Mandaue_-Nurse.jpg','Zairel Zuniga','nurse2.mandaue@mailinator.com','Mandaue City','+639223249678',NULL,NULL,NULL,'839','477');
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
INSERT INTO `package` VALUES (80,'Complete Hospital','3000','2500','1000','accountant,appointment,lab,bed,department,doctor,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms','Yes',NULL,NULL);
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
  `ion_user_id` varchar(100) DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `how_added` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (62,'uploads/patient.jpg','Patient Clavio','patient12.sugbodoc@mailinator.com','','Gen Junquera Ext Cebu City','+639616327980','Male','01-08-1998',NULL,'O-','764','158098','07/28/20','1595924679',NULL,'466'),(66,'uploads/Ian-Dave-Colina-Patient.jpg','Ian Dave Colina','patient13.sugbodoc@mailinator.com','162','Cabancalan, Mandaue City','+639176724020','Male','04-08-1993',NULL,'O-','791','240343','08/12/21','1628790667',NULL,'466'),(67,'uploads/April-Jane-Garbo-Patient.jpg','April Jane Garbo','patient1.rygeltech@gmail.com','162,169,168','NASIPIT TALAMBAN','+639150446456','Female','01-08-1992',NULL,'AB-','792','756121','08/16/21','1629087389',NULL,'466'),(68,'uploads/Joseph-Castro-Patient.jpg','Joseph Castro','patient2.rygeltech@gmail.com','162,168','239 Bonifacio District','+639615985110','Male','01-08-1961',NULL,'A+','793','128054','08/16/21','1629087572',NULL,'466'),(69,'uploads/ALBERT.jpg','Albert Reyes','patient1.sugbodoc@mailinator.com','','239 Bonifacio District','+639177654321','Male','01-08-1997',NULL,'O-','794','223234','08/16/21','1629093029',NULL,'466'),(70,'uploads/ANNE.jpg','Anne Rodriguez','patient2.sugbodoc@mailinator.com','162','Mandaue City','+639327416231','Female','28-08-1997',NULL,'O+','795','266820','08/16/21','1629093233',NULL,'466'),(71,'uploads/WILLIAM.jpg','William Lewis','patient3.sugbodoc@mailinator.com','162','Lapu-Lapu City','+639177654321','Male','01-08-2007',NULL,'O-','796','708723','08/16/21','1629093320',NULL,'466'),(72,'uploads/ANGELA.jpg','Angela Ariola','patient4.sugbodoc@mailinator.com','162','PS, 318 Victor Vega Street, Cubacub, Mandaue City, 6014','+639367416237','Female','01-08-1999',NULL,'B-','797','923995','08/16/21','1629093394',NULL,'466'),(73,'uploads/JACOB.jpg','Jacob Cortes','patient5.sugbodoc@mailinator.com','162','Aviation Rd. Hangar Basak Lapulapu City, 6015','+639326517433','Male','18-02-1992',NULL,'A+','798','81156','08/16/21','1629096496',NULL,'466'),(74,'uploads/OLIVIA.jpg','Olivia Sanchez','patient6.sugbodoc@mailinator.com','162','Aviation Rd. Hangar Basak Lapulapu City, 6015','+639326517433','Female','01-08-2005',NULL,'O-','799','315899','08/16/21','1629096565',NULL,'466'),(75,'uploads/JULIAN.jpeg','Julian Lee','patient7.sugbodoc@mailinator.com','162','Maximo Patalinghug Avenue','+639327416231','Female','01-08-1982',NULL,'O-','800','808127','08/16/21','1629096667',NULL,'466'),(76,'uploads/HENRY.jpg','Henry Perez','patient8.sugbodoc@mailinator.com','162','Talamban Cadahuan Cebu City','+639223458791','Male','01-08-1996',NULL,'B+','801','495644','08/16/21','1629096758',NULL,'466'),(77,'uploads/SANDRA.jpg','Sandra Arcilla','patient9.sugbodoc@mailinator.com','162','Pitos Cebu City','+639115647895','Female','24-02-2004',NULL,'AB-','802','252878','08/16/21','1629096919',NULL,'466'),(78,'uploads/ISAAC.jpg','Isaac Oporto','patient10.sugbodoc@mailinator.com','162','Banilad Cebu City','+639874563312','Male','01-08-1995',NULL,'O-','803','285663','08/16/21','1629097005',NULL,'466'),(79,'uploads/images_(2).jpg','Theodore Lee','patient11.sugbodoc@mailinator.com','162','Camputhaw Capitol Cebu City','+639150332656','Male','25-08-2021',NULL,'AB+','822','545496','08/25/21','1629859602',NULL,'466'),(81,'uploads/Grace-Lee-Patient.jpg','Mailina Torres','patient@mailinator.com','162','Nasipit Talamban','+639176724020','Male','01-02-1990',NULL,'O-','824','94142','09/01/21','1630426806',NULL,'466'),(82,'uploads/Michael-Jagdon-Mandaue-Patient.jpg','Michael Jagdon','patient1.mandaue@mailinator.com','185','Urgello Cebu City','+639562931921','Male','14-07-1952',NULL,'A+','836','982368','09/01/21','1630484231',NULL,'477'),(83,'uploads/Untitled-11.png','Ellen Reyes','patient2.mandaue@mailinator.com','184','Lorega Cebu City','+639981674906','Female','25-01-1981',NULL,'A+','837','310689','09/01/21','1630484415',NULL,'477');
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
) ENGINE=MyISAM AUTO_INCREMENT=1683 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_deposit`
--

LOCK TABLES `patient_deposit` WRITE;
/*!40000 ALTER TABLE `patient_deposit` DISABLE KEYS */;
INSERT INTO `patient_deposit` VALUES (1661,'62','2077','1629264471','1000','2077.gp',NULL,'Stripe','763','466'),(1662,'62','2077','1629263774','500',NULL,'Cash',NULL,'763','466'),(1663,'62','2078','1629264037','1666','2078.gp','Cash',NULL,'763','466'),(1664,'62','2077','1629264349','24489',NULL,'Cash',NULL,'763','466'),(1665,'67','2079','1629271858','10300','2079.gp','Cash',NULL,'810','466'),(1666,'68','2080','1629272158','1800','2080.gp','Cash',NULL,'810','466'),(1667,'70','2081','1629272586','','2081.gp','Cash',NULL,'812','466'),(1668,'69','2082','1629272936','3400','2082.gp','Cash',NULL,'812','466'),(1669,'71','2083','1629277252','15000','2083.gp','Cash',NULL,'763','466'),(1670,'72','2084','1629273459','1100','2084.gp','Cash',NULL,'813','466'),(1671,'73','2085','1629273540','5400','2085.gp','Cash',NULL,'813','466'),(1672,'66','2086','1629273649','','2086.gp','Cash',NULL,'811','466'),(1673,'74','2087','1629274026','2520','2087.gp','Cash',NULL,'811','466'),(1674,'75','2088','1630058918','7800','2088.gp','Cash',NULL,'763','466'),(1675,'76','2089','1630056158','3010','2089.gp','Cash',NULL,'763','466'),(1676,'78','2090','1630056081','2500','2090.gp','Cash',NULL,'763','466'),(1677,'77','2091','1630056027','1400','2091.gp','Cash',NULL,'763','466'),(1678,'71','2092','1630054508','45600','2092.gp','Cash',NULL,'763','466'),(1679,'79','2093','1630056774','','2093.gp','Cash',NULL,'763','466'),(1680,'62','2094','1630057024','5000','2094.gp','Cash',NULL,'763','466'),(1681,'67','2095','1630382022','','2095.gp','Cash',NULL,'763','466'),(1682,'66','2086','1630484981','1000',NULL,'Cash',NULL,'763','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_material`
--

LOCK TABLES `patient_material` WRITE;
/*!40000 ALTER TABLE `patient_material` DISABLE KEYS */;
INSERT INTO `patient_material` VALUES (86,'1628792108','August 2011 Complete Blood Count',NULL,'66','Ian Dave Colina','Cabancalan, Mandaue City','5202271','uploads/ian-dave-lab-report.jpg','12-08-21','466'),(90,'1629448111','Cataract Lab Result',NULL,'70','Anne Rodriguez','Mandaue City','09327416231','uploads/Anne-Lab-Result.png','20-08-21','466'),(91,'1629448137','Pneumonia Lab Result',NULL,'71','William Lewis','Lapu-Lapu City','09177654321','uploads/Willliam-Lab-Result.png','20-08-21','466'),(92,'1629448171','Gastrointestinal Lab Result',NULL,'72','Angela Ariola','PS, 318 Victor Vega Street, Cubacub, Mandaue City, 6014','9367416237','uploads/Angela-Lab-Result.png','20-08-21','466'),(93,'1629448201','Memory Loss Lab Result',NULL,'67','April Jane Garbo','NASIPIT TALAMBAN','+639150446456','uploads/April-Lab-Result.png','20-08-21','466'),(94,'1629448265','Arthritis Lab Result',NULL,'68','Joseph Castro','239 Bonifacio District','09562931921','uploads/Joseph-Lab-Result.png','20-08-21','466'),(95,'1629448725','Blood Disorder Lab Result',NULL,'74','Olivia Sanchez','Aviation Rd. Hangar Basak Lapulapu City, 6015','9326517433','uploads/Olivia-Lab_Result.png','20-08-21','466'),(96,'1629448994','Back Pain Lab Result',NULL,'78','Isaac Oporto','Banilad Cebu City','+639874563312','uploads/Isaac-Lab_Result.png','20-08-21','466'),(104,'1629453021','Pericarditis Lab Result',NULL,'76','Henry Lee','Talamban Cadahuan Cebu City','09223458791','uploads/Henry-Lab-Result.png','20-08-21','466'),(98,'1629449608','Sleep Apnea Lab Result',NULL,'75','Julian Lee','Maximo Patalinghug Avenue','09327416231','uploads/Julian-Lab_-Result.jpg','20-08-21','466'),(99,'1629449814','Sleep Disorder Lab Result',NULL,'77','Sandra Arcilla','Pitos Cebu City','09115647895','uploads/Sandra-Lab-Result.jpg','20-08-21','466'),(106,'1629454042','Artial Fibrillation Lab Result',NULL,'73','Jacob Cortes','Aviation Rd. Hangar Basak Lapulapu City, 6015','9326517433','uploads/Jacob-Lab-Result.jpg','20-08-21','466'),(105,'1629453650','Basal Cell Carcinoma Lab Result',NULL,'69','Albert Reyes','239 Bonifacio District','09177654321','uploads/Albert-Lab-Result.png','20-08-21','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (2077,NULL,'62','169','1629226638','26880','0',NULL,NULL,'45','45','26835','Discounted by 450 for Senior Citizens Discount','26611.2','223.8',NULL,'136*3200*others*4,138*2800*others*1,140*4100*others*2,150*3080*others*1','1000','Card','unpaid','763','Patient Clavio','+639616327980','Gen Junquera Ext Cebu City','Mary Grace Teleron','18-08-21','466'),(2078,NULL,'62','168','1629264037','12200','0',NULL,NULL,'100','100','12100','','12078','22',NULL,'143*6100*others*1,144*6100*others*1','1666','Cash','unpaid','763','Patient Clavio','+639616327980','Gen Junquera Ext Cebu City','Felix Remedio','18-08-21','466'),(2079,NULL,'67','169','1629271315','10300','0',NULL,NULL,'0','0','10300','','9307','993',NULL,'137*800*others*2,138*2800*others*2,187*700*diagnostic*1,188*800*diagnostic*1,190*600*diagnostic*1,194*500*others*2','10300','Cash','unpaid','810','April Jane Garbo','+639150446456','NASIPIT TALAMBAN','Mary Grace Teleron','18-08-21','466'),(2080,NULL,'68','169','1629271970','1800','0',NULL,NULL,'0','0','1800','','1337','463',NULL,'187*700*diagnostic*1,190*600*diagnostic*1,194*500*others*1','1800','Cash','unpaid','810','Joseph Castro','09562931921','239 Bonifacio District','Mary Grace Teleron','18-08-21','466'),(2081,NULL,'70','168','1629272586','2200','0',NULL,NULL,'0','0','2200','','2178','22',NULL,'147*1100*others*1,191*1100*diagnostic*1','','Cash','unpaid','812','Anne Rodriguez','09327416231','Mandaue City','Felix Remedio','18-08-21','466'),(2082,NULL,'69','162','1629272936','3400','0',NULL,NULL,'0','0','3400','','3366','34',NULL,'181*800*others*3,189*1000*diagnostic*1','3400','Cash','unpaid','812','Albert Reyes','09177654321','239 Bonifacio District','Dr. Michael Rygel','18-08-21','466'),(2083,NULL,'71','162','1629273121','29900','0',NULL,NULL,'0','0','29900','','29601','299',NULL,'154*13800*others*2,187*700*diagnostic*1,189*1000*diagnostic*1,190*600*diagnostic*1','15000','Cash','unpaid','763','William Lewis','09177654321','Lapu-Lapu City','Dr. Michael Rygel','18-08-21','466'),(2084,NULL,'72','162','1629273459','1100','0',NULL,NULL,'0','0','1100','','822','278',NULL,'192*300*others*1,188*800*diagnostic*1','1100','Cash','unpaid','813','Angela Ariola','9367416237','PS, 318 Victor Vega Street, Cubacub, Mandaue City, 6014','Dr. Michael Rygel','18-08-21','466'),(2085,NULL,'73','168','1629273540','10400','0',NULL,NULL,'0','0','10400','','9851','549',NULL,'146*6500*others*1,194*500*others*1,187*700*diagnostic*1,189*1000*diagnostic*1,191*1100*diagnostic*1,190*600*diagnostic*1','5400','Cash','unpaid','813','Jacob Cortes','9326517433','Aviation Rd. Hangar Basak Lapulapu City, 6015','Felix Remedio','18-08-21','466'),(2086,NULL,'66','169','1629273649','5100','0',NULL,NULL,'0','0','5100','','5049','51',NULL,'136*3200*others*1,188*800*diagnostic*1,147*1100*others*1','','Cash','unpaid','811','Ian Dave Colina','5202271','Cabancalan, Mandaue City','Mary Grace Teleron','18-08-21','466'),(2087,NULL,'74','168','1629274026','2520','0',NULL,NULL,'0','0','2520','','2049.8','470.2',NULL,'194*500*others*1,148*1100*others*1,165*920*others*1','2520','Cash','unpaid','811','Olivia Sanchez','9326517433','Aviation Rd. Hangar Basak Lapulapu City, 6015','Felix Remedio','18-08-21','466'),(2088,NULL,'75','168','1629274122','7800','0',NULL,NULL,'0','0','7800','','7722','78',NULL,'140*4100*others*1,177*2400*others*1,187*700*diagnostic*1,190*600*diagnostic*1','7800','Cash','unpaid','763','Julian Lee','+63 932 741 6231','Maximo Patalinghug Avenue','Felix Remedio','18-08-21','466'),(2089,NULL,'76','169','1629274315','3010','0',NULL,NULL,'300','300','2710','','2356.9','353.1',NULL,'160*720*others*1,164*890*others*1,187*700*diagnostic*1,193*700*others*1','3010','Cash','unpaid','763','Henry Lee','+63 922 345 8791','Talamban Cadahuan Cebu City','Mary Grace Teleron','18-08-21','466'),(2090,NULL,'78','168','1629274394','2500','0',NULL,NULL,'200','200','2300','','2475','-175',NULL,'181*800*others*1,187*700*diagnostic*1,189*1000*diagnostic*1','2500','Cash','unpaid','763','Isaac Oporto','+63 987 456 3312','Banilad Cebu City','Felix Remedio','18-08-21','466'),(2091,NULL,'77','162','1629274464','1400','0',NULL,NULL,'100','100','1300','','941','359',NULL,'180*900*others*1,194*500*others*1','1400','Cash','unpaid','763','Sandra Arcilla','+63 911 564 7895','Pitos Cebu City','Dr. Michael Rygel','18-08-21','466'),(2092,NULL,'71','162','1629276652','45600','0',NULL,NULL,'123','123','45477','','45144','333',NULL,'154*13800*others*3,187*700*diagnostic*1,188*800*diagnostic*1,189*1000*diagnostic*1,190*600*diagnostic*1,191*1100*diagnostic*1','45600','Cash','unpaid','763','William Lewis','+63 917 765 4321','Lapu-Lapu City','Dr. Michael Rygel','18-08-21','466'),(2093,NULL,'79','162','1629964623','6900','0',NULL,NULL,'100','100','6800','Conclusions  Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative re','6831','-31',NULL,'144*6100*others*,172*3000*others*2,180*900*others*1','','Cash','unpaid','763','Theodore Lee','+63 915 033 2656','Camputhaw Capitol Cebu City','Dr. Michael Rygel','26-08-21','466'),(2094,NULL,'62','162','1630056275','9800','0',NULL,NULL,'500','500','9300','','9702','-402',NULL,'136*3200*others*2,187*700*diagnostic*1,189*1000*diagnostic*1,190*600*diagnostic*1,191*1100*diagnostic*1','5000','Cash','unpaid','763','Patient Clavio','+63 961 632 7980','Gen Junquera Ext Cebu City','Dr. Michael Rygel','27-08-21','466'),(2095,NULL,'67','175','1630119293','8000','0',NULL,NULL,'500','500','7500','','7475','25',NULL,'136*3200*others*2,191*1100*diagnostic*1,194*500*others*1','','Cash','unpaid','763','April Jane Garbo','+63 915 044 6456','NASIPIT TALAMBAN','Sunshine Zarga','28-08-21','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentGateway`
--

LOCK TABLES `paymentGateway` WRITE;
/*!40000 ALTER TABLE `paymentGateway` DISABLE KEYS */;
INSERT INTO `paymentGateway` VALUES (27,'Stripe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test','pk_test_mDWBxLJ5nAtaDCIGqdIe8X3P','sk_test_SjgSfcaefNfzzEFb0SNSyPdq','466',NULL),(26,'Pay U Money','Enter Merchant key','Enter Salt',NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,'466',NULL),(25,'PayPal',NULL,NULL,NULL,NULL,'Enter API Username','Enter API Password','Enter API Signature','test',NULL,NULL,'466',NULL),(31,'Paystack',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test',NULL,'Enter Secret Key','466','Enter Public Key'),(67,'PayPal',NULL,NULL,NULL,NULL,'PayPal API Username','PayPal API Password','PayPal API Signature','test',NULL,NULL,'477',NULL),(68,'Pay U Money','Merchant key','Salt',NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,'477',NULL),(69,'Stripe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Publish','Secret','477',NULL),(70,'Paystack',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test',NULL,'secret','477','Public key');
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
) ENGINE=MyISAM AUTO_INCREMENT=198 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_category`
--

LOCK TABLES `payment_category` WRITE;
/*!40000 ALTER TABLE `payment_category` DISABLE KEYS */;
INSERT INTO `payment_category` VALUES (136,'Room Charges - Superior Private Room','Room Charges - Superior Private Room','3200','others',1,NULL,'466'),(137,'Room Charges - Ward (Non Aircon) A','Room Charges - Ward (Non Aircon) A','800','others',1,NULL,'466'),(138,'Room Charges - Private Room','Room Charges - Private Room','2800','others',1,NULL,'466'),(140,'Room Charges - Family Room A','Room Charges - Family Room A','4100','others',1,NULL,'466'),(141,'Room Charges - Suite Room A','Room Charges - Suite Room A','5400','others',1,NULL,'466'),(142,'Room Charges - Presidential Suite','Room Charges - Presidential Suite','12000','others',1,NULL,'466'),(143,'Room Charges - Intensive Care Unit (ICU) A','Room Charges - Intensive Care Unit (ICU) A','6100','others',1,NULL,'466'),(144,'Room Charges - Neonatal Intensive Care Unit (NICU) A','Room Charges - Neonatal Intensive Care Unit (NICU) A','6100','others',1,NULL,'466'),(145,'Room Charges - Pediatric Intensive Care Unit (NICU) B','Room Charges - Pediatric Intensive Care Unit (NICU) B','6100','others',1,NULL,'466'),(146,'Room Charges - Cardiovascular Thoracic Intensive Care Unit (CT-ICU)','Room Charges - Cardiovascular Thoracic Intensive Care Unit (CT-ICU)','6500','others',1,NULL,'466'),(147,'Room Charges - Ward (Pediatric, Surgery and Medicine)','Room Charges - Ward (Pediatric, Surgery and Medicine)','1100','others',1,NULL,'466'),(148,'Room Charges - OB Ward B','Room Charges - OB Ward B','1100','others',1,NULL,'466'),(149,'Room Charges - Regular Private B','Room Charges - Regular Private B','2640','others',1,NULL,'466'),(150,'Room Charges - Regular Private NPR A','Room Charges - Regular Private NPR A','3080','others',1,NULL,'466'),(151,'Room Charges - Suite Room B','Room Charges - Suite Room B','5400','others',1,NULL,'466'),(152,'Room Charges - Deluxe Suite Room','Room Charges - Deluxe Suite Room','9000','others',1,NULL,'466'),(153,'Room Charges - Executive Suite Room','Room Charges - Executive Suite Room','11500','others',1,NULL,'466'),(154,'Room Charges - Premiere Suite Room','Room Charges - Premiere Suite Room','13800','others',1,NULL,'466'),(155,'Room Charges - Medical / Surgical Intensive Care Unit','Room Charges - Medical / Surgical Intensive Care Unit','6785','others',1,NULL,'466'),(156,'Room Charges - Pediatric Intensive Care Unit (NICU) C','Room Charges - Pediatric Intensive Care Unit (NICU) C','6785','others',1,NULL,'466'),(157,'Room Charges - Neonatal Care (Level I) E','Room Charges - Neonatal Care (Level I) E','1000','others',1,NULL,'466'),(158,'Room Charges - Neonatal Care (Level II) D','Room Charges - Neonatal Care (Level II) D','1500','others',1,NULL,'466'),(159,'Room Charges - Neonatal Care (Level III) C','Room Charges - Neonatal Care (Level III) C','4900','others',1,NULL,'466'),(160,'Room Charges - Pediatric Ward A','Room Charges - Pediatric Ward A','720','others',1,NULL,'466'),(161,'Room Charges - Medical Ward','Room Charges - Medical Ward','710','others',1,NULL,'466'),(162,'Room Charges - Female Medical Ward','Room Charges - Female Medical Ward','800','others',1,NULL,'466'),(163,'Room Charges - Ophtha Ward','Room Charges - Ophtha Ward','710','others',1,NULL,'466'),(164,'Room Charges - Pediatric Ward B','Room Charges - Pediatric Ward B','890','others',1,NULL,'466'),(165,'Room Charges - Female OB/ Surgical Ward','Room Charges - Female OB/ Surgical Ward','920','others',1,NULL,'466'),(166,'Room Charges - Isolation Room A','Room Charges - Isolation Room A','950','others',1,NULL,'466'),(167,'Room Charges - Female Ob-gyne Ward','Room Charges - Female Ob-gyne Ward','800','others',1,NULL,'466'),(168,'Room Charges - Female Surgical Ward','Room Charges - Female Surgical Ward','890','others',1,NULL,'466'),(169,'Room Charges - Intensive Care Unit (ICU) B','Room Charges - Intensive Care Unit (ICU) B','4000','others',1,NULL,'466'),(170,'Room Charges - Coronary Care Unit (CCU)','Room Charges - Coronary Care Unit (CCU)','4000','others',1,NULL,'466'),(171,'Room Charges - Pediatric Intensive Care Unit (PICU) A','Room Charges - Pediatric Intensive Care Unit (PICU) A','4000','others',1,NULL,'466'),(172,'Room Charges - Neonatal Intensive Care Unit (NICU) B','Room Charges - Neonatal Intensive Care Unit (NICU) B','3000','others',1,NULL,'466'),(173,'Room Charges - Intermediate Care Unit (INCU) (Private) B','Room Charges - Intermediate Care Unit (INCU) (Private) B','3000','others',1,NULL,'466'),(174,'Room Charges - Intermediate Care Unit (INCU) (Ward) A','Room Charges - Intermediate Care Unit (INCU) (Ward) A','2000','others',1,NULL,'466'),(175,'Room Charges - Suite Room C','Room Charges - Suite Room C','3200','others',1,NULL,'466'),(176,'Room Charges - Semi Suite','Room Charges - Semi Suite','2800','others',1,NULL,'466'),(177,'Room Charges - Family Room B','Room Charges - Family Room B','2400','others',1,NULL,'466'),(178,'Room Charges - Bldg. AB Private Room (Big) A','Room Charges - Bldg. AB Private Room (Big) A','1650','others',1,NULL,'466'),(179,'Room Charges - Bldg. AB Private Room (Big) B','Room Charges - Bldg. AB Private Room (Big) B','1350','others',1,NULL,'466'),(180,'Room Charges - OB Ward (Air-Conditioned) A','Room Charges - OB Ward (Air-Conditioned) A','900','others',1,NULL,'466'),(181,'Room Charges - Ward (Air Conditioned)','Room Charges - Ward (Air Conditioned)','800','others',1,NULL,'466'),(182,'Room Charges - Ward (Non Air Conditioned) A','Room Charges - Ward (Non Air Conditioned) A','600','others',1,NULL,'466'),(183,'Room Charges - Isolation - Large (w/ Comfort Room) C','Room Charges - Isolation - Large (w/ Comfort Room) C','1000','others',1,NULL,'466'),(184,'Room Charges - Isolation - Large D','Room Charges - Isolation - Large D','800','others',1,NULL,'466'),(185,'Room Charges - Isolation - Small B','Room Charges - Isolation - Small B','700','others',1,NULL,'466'),(186,'Room Charges - Nursery','Room Charges - Nursery','600','others',1,NULL,'466'),(187,'Laboratory - Chemistry A','Laboratory - Chemistry A','700','diagnostic',1,NULL,'466'),(188,'Laboratory - Clinical Microscopy','Laboratory - Clinical Microscopy','800','diagnostic',1,NULL,'466'),(189,'Laboratory - Chemistry B','Laboratory - Chemistry B','1000','diagnostic',1,NULL,'466'),(190,'Laboratory - HBA1C','Laboratory - HBA1C','600','diagnostic',1,NULL,'466'),(191,'Laboratory - Hematology','Laboratory - Hematology','1100','diagnostic',1,NULL,'466'),(192,'Video Consult - Standard','Video Consult - Standard Not more than 20 minutes','300','others',90,NULL,'466'),(193,'Video Consult - Long ','Video Consult - Long with Duration of at least 20 minutes to 1 hour','700','others',90,NULL,'466'),(194,'Consultation - Standard (Face to face)','Consultation - Standard (Face to face) with duration of not more than 20 minutes','500','others',90,NULL,'466'),(195,'Room Charges - Suite Room [Test]','Room Charges - Suite Room [Test]','[Test]This 62 year-old black female had been worked up by medicine for masses in the epigastrium.','others',1,NULL,'466'),(197,'Room Charges - Suite Room D','Room Charges - Suite Room D','800','diagnostic',0,NULL,'466');
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacist`
--

LOCK TABLES `pharmacist` WRITE;
/*!40000 ALTER TABLE `pharmacist` DISABLE KEYS */;
INSERT INTO `pharmacist` VALUES (10,'uploads/mr_pharmacist.png','Mr Pharmacist','pharmacist@rygel.biz','Collegepara, Rajbari','+639012345678',NULL,NULL,'767','466'),(11,'uploads/patrick_bautista1.jpg','Patrick Bautista','pharmacist1.cebu@rygel.biz','Barangay Looc, Lapulapu City','+639326451724',NULL,NULL,'814','466'),(12,'uploads/Melody-Torres-Cebu-Pharmacist.jpg','Melody Torres','pharmacist2.cebu@rygel.biz','Mango Ave. Cebu City','+639991607734',NULL,NULL,'815','466'),(13,'uploads/Velma_Cruz-Mandaue-Pharmacist.jpg','Velma Cruz','pharmacist1.mandaue@mailinator.com','Capitol Cebu City','+639170889685',NULL,NULL,'840','477'),(14,'uploads/Francisco_Diaz-Mandaue-Pharmacist.jpg','Francisco Diaz','pharmacist2.mandaue@mailinator.com','San Jose Purok 1 Cebu City','+639324531278',NULL,NULL,'841','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy_expense_category`
--

LOCK TABLES `pharmacy_expense_category` WRITE;
/*!40000 ALTER TABLE `pharmacy_expense_category` DISABLE KEYS */;
INSERT INTO `pharmacy_expense_category` VALUES (65,'Food','[Test]Clinical History: This 62 year-old black female had been worked up by medicine for masses ',NULL,NULL,'466');
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
) ENGINE=MyISAM AUTO_INCREMENT=1993 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy_payment`
--

LOCK TABLES `pharmacy_payment` WRITE;
/*!40000 ALTER TABLE `pharmacy_payment` DISABLE KEYS */;
INSERT INTO `pharmacy_payment` VALUES (1981,NULL,NULL,NULL,'1629186562','350','0',NULL,NULL,'','','350',NULL,NULL,NULL,'2878*70*5*50',NULL,'unpaid','466'),(1982,NULL,NULL,NULL,'1629186591','89.25','0',NULL,NULL,'','','89.25',NULL,NULL,NULL,'2879*12.75*7*8.5',NULL,'unpaid','466'),(1983,NULL,NULL,NULL,'1629186805','700','0',NULL,NULL,'','','700',NULL,NULL,NULL,'2878*70*10*50',NULL,'unpaid','466'),(1984,NULL,NULL,NULL,'1629186860','746.25','0',NULL,NULL,'','','746.25',NULL,NULL,NULL,'2883*55.5*5*37,2879*12.75*9*8.5,2884*17.7*20*11.8',NULL,'unpaid','466'),(1985,NULL,NULL,NULL,'1629187636','2085','0',NULL,NULL,'','','2085',NULL,NULL,NULL,'2887*97.5*5*65,2885*106.5*15*71',NULL,'unpaid','466'),(1986,NULL,NULL,NULL,'1629187754','1327.5','0',NULL,NULL,'','','1327.5',NULL,NULL,NULL,'2886*442.5*3*295',NULL,'unpaid','466'),(1987,NULL,NULL,NULL,'1629187818','1372.5','0',NULL,NULL,'','','1372.5',NULL,NULL,NULL,'2887*97.5*5*65,2886*442.5*2*295',NULL,'unpaid','466'),(1988,NULL,NULL,NULL,'1629187963','180.45','0',NULL,NULL,'','','180.45',NULL,NULL,NULL,'2880*4.95*15*3.3,2884*17.7*6*11.8',NULL,'unpaid','466'),(1989,NULL,NULL,NULL,'1629188005','2551.98','0',NULL,NULL,'','','2551.98',NULL,NULL,NULL,'2882*624.12*4*416.08,2883*55.5*1*37',NULL,'unpaid','466'),(1990,NULL,NULL,NULL,'1629188030','375','0',NULL,NULL,'','','375',NULL,NULL,NULL,'2881*15*25*10',NULL,'unpaid','466'),(1991,NULL,NULL,NULL,'1629188163','1448.5','0',NULL,NULL,'','','1448.5',NULL,NULL,NULL,'2885*106.5*9*71,2878*70*7*50',NULL,'unpaid','466'),(1992,NULL,NULL,NULL,'1629188222','3245.1','0',NULL,NULL,'','','3245.1',NULL,NULL,NULL,'2880*4.95*10*3.3,2881*15*5*10,2882*624.12*5*416.08',NULL,'unpaid','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (101,'1628812800','66','162','<p>Patient has reported allergy of eggs and cheese</p>\r\n','<p>Take normal rest.&nbsp;</p>\r\n\r\n<p>Drink lots of water and medicine to relieve headache</p>\r\n\r\n<p>Tabulate and monitor your temperature&nbsp;</p>\r\n',NULL,NULL,'2878***500mg***1 + 0 + 1***7 days***After Food',NULL,'<p>Patient is complaining of headache every morning.</p>\r\n','Ian Dave Colina','Dr. Michael Rygel','466'),(102,'1629043200','62','162','<p>This is some patient history. Patient has diabetes and chronic pulmonary disorder.&nbsp;</p>\r\n','<p>Take enough rest. Drink medicine.</p>\r\n',NULL,NULL,'2878***1 tab***1 + 0 + 1***7 days or until pain occurs***After meals only',NULL,'<p>Chief complaint of patient is chronic pain in the lower back.</p>\r\n','Patient Clavio','Dr. Michael Rygel','466'),(103,'1629388800','71','174','<p>Atrial fibrillation, arrhythmia, acute myocardial infarction, mitral regurgitation, chronic coron','<p>Drink plenty of fluids to help loosen secretions and bring up phlegm.&nbsp;Drink warm beverages, and use a humidifier to help open your airways and ease your breathing. Contact doctor right away if your breathing gets worse instead of better over time.</p>\r\n',NULL,NULL,'2888***1 tablet***2x Daily***2 Days***After Food',NULL,'<p>X-ray chest PA and lateral for old cough. &nbsp;Comparison 11/12/2011 &ndash; Left-sided dual lead pacemaker. Left lower lobe infiltrate. Bones are osteopenic but intact. Pneumonia also pertinent.</p>\r\n','William Lewis','Peter Ceniza','466'),(104,'1561219200','67','174','<p>Hearing loss, essential tremor, mild cognitive impairment. Mood changes, hallucinations, or unusu','<p>Physical activity increases blood flow to your whole body, including your brain. This might help keep your memory sharp.&nbsp;Eat fruits, vegetables and whole grains. Choose low-fat protein sources, such as fish, beans and skinless poultry.</p>\r\n',NULL,NULL,'2889***1 tablet***3x Daily***7 Days***With / Without Food',NULL,'<p>Some difficulty with memory, more forgetful. Brain MRI revealed no acute intracranial process. No enhancing lesions. Chronic small vessel ischemia and involutional changes. MRA revealed no evidence of any significant stenosis. There is development variation of dominant right, small left vertebral arteries as well as what appears to be a congenitally absent A1 segment of the right anterior cerebral artery. No specific Tx recommended</p>\r\n','April Jane Garbo','Peter Ceniza','466'),(105,'1552579200','68','170','<p>Reactive arthritis of multiple sites, rectus sheath hematoma-left, shoulder pain, allergic rhinit','<p>Regular exercise can help keep your joints flexible. Taken enough rest.</p>\r\n',NULL,NULL,'2890***1 tablet***2x Daily***3Days***After Meals',NULL,'<p>X-ray shoulder, right 2 views, for dislocation, degenerative changes of the right shoulder. No fracture or dislocation seen.</p>\r\n','Joseph Castro','Clark Perez','466'),(106,'1580572800','69','173','<p>Appears as a slightly transparent bump on the skin, though it can take other forms.</p>\r\n','<p>Avoid the sun during the middle of the day.&nbsp;Wear protective clothing. Don&#39;t stay longer in the dusty place.</p>\r\n',NULL,NULL,'2891***1 tablet***1 Daily***20 Days***With / Without Food',NULL,'<p>Right parietal scalp above anterior right ear biopsy revealed &ndash; BCC and adjacent seborrheic keratosis. Note: BCC extends to the base and a peripheral margin. The seborrheic keratosis extends to the opposite peripheral margin. Anterior left frontal scalp- biopsy revealed BCC, the neoplasm extends to the base.</p>\r\n','Albert Reyes','Mary Ann Remedio','466'),(107,'1623513600','70','171','<p>Cataract extract ion, colon surgery, hernia repair, right leg hematoma evacuation, sinus surgery,','<p>Eat yellow and orange veggies and fruits, drink orange juice for reducing the risks for cataract. Taken some rest. Avoid rubbing your eyes.</p>\r\n',NULL,NULL,'2892***2 Drops***3hours***1 Day***Hypersensitivity',NULL,'<p>Bilateral cataract extraction with lens insertion &ndash; Phacoemulsification with posterior chamber intraocular lens, left eye (first left then right).</p>\r\n','Anne Rodriguez','Rose Ann Bergente','466'),(108,'1572192000','72','162','<p>Atrial fibrillation, arrhythmia, acute myocardial infarction, mitral regurgitation, chronic coron','<p>Resting and drinking plenty of fluids. Avoid dairy, grease, spices, as they can aggravate your digestive system. Eat healthy foods.</p>\r\n',NULL,NULL,'2893***1 tablet***1 Daily***8 Days***Empty Stomach',NULL,'<p>Abdominal pain, bloating. Occasional urge incontinence.Dx of diverticulitis of colon. CBC ordered. Hx of colon polyps at 45.</p>\r\n','Angela Ariola','Dr. Michael Rygel','466'),(109,'1549814400','73','162','<p>Atrial fibrillation, arrhythmia, acute myocardial infarction.</p>\r\n','<p>Eat a healthy diet that&#39;s low in salt and solid fats and rich in fruits, vegetables. You should stop smoking, Take your medicines and have a regular check&nbsp; up with your doctor.</p>\r\n',NULL,NULL,'2894***1 tablet***2x Daily***14 Days***With / Without Food',NULL,'<p>In AFib when admitted. EKG showed atrial fibrillation. Echo showed EF of 60% without evidence of clot or PFO.</p>\r\n','Jacob Cortes','Dr. Michael Rygel','466'),(110,'1558195200','74','162','<p>Blood Condition, benign prostatic hyperplasia, bilateral cataracts, near and far sightedness, ESB','<p>Eating a balanced diet recommended by your doctor. Eat a food with iron or vitamin E,and Take a rest</p>\r\n',NULL,NULL,'2895***1 tablet***1 Daily***7 Days***After Food',NULL,'<p>X-ray abdomen AP and decubitus or Erect view, for worsening abdominal pain, and ecchymosis on abdomen &ndash; Moderate stool throughout the colon with distention of the hepatic flexure, no infiltrate or effusion. CT abdomen with IV contrast &ndash; Large left sided rectus sheath hematoma with evidence of active bleeding underlying tumor not excluded. Left lower lobe consolidation which may reflect atelectasis or pneumonia. Patient admitted for further care. BP was 207/85 on admission. Hb dropped requiring 2 units of pRBC then stabilized. WBC 8.2, RBC 4.31, hemoglobin 13.0, hematocrit 39.0, RDW 16.1, Segs 76.3&nbsp;</p>\r\n','Olivia Sanchez','Dr. Michael Rygel','466'),(111,'1572710400','75','172','<p>Mild cognitive impairment, OSA on CPAP, pseudophakia, bilateral.</p>\r\n','<p>Regular exercise, Eat healthy veggies and fruits. Loss weight and if you&#39;re a smoker, look for resources or habit to help you quit. and avoid alcohol and take your medications properly.</p>\r\n',NULL,NULL,'2896***1 tablet***1 Daily***4 Days***With / Without Food',NULL,'<p>Sleep concern and sleep disordered breathing. Suspected sleep apnea and snoring. Sleep study on 11/06/2017 revealed severe obstructive sleep apnea with AHI of 72.8/hour. No REM sleep was seen on this study. Treatment with CPAP. CPAP titrated to level 12.</p>\r\n','Julian Lee','Carl Arisgado','466'),(112,'1564243200','76','168','<p><br />\r\nArthritis, total right knee replacement, hearing loss, essential tremor, mild cognitive i','<p>Avoid dusty place, Take medicine properly. Avoid fatty meals and Take a rest.</p>\r\n',NULL,NULL,'2897***1 tablet***1 Daily***5 Days***After Meals',NULL,'<p>Chest pain, palpitation and SOB. Pericardial effusion. CT chest revealed mild pericardial fluid or thickening. No acute airspace disease seen. ANA screen negative. Sed rate 63 (0-20</p>\r\n','Henry Lee','Felix Remedio','466'),(113,'1560096000','77','175','<p>Mild cognitive impairment, OSA on CPAP, pseudophakia, bilateral. Restless legs syndrome.</p>\r\n','<p>Eat healthy veggies and fruits. Take your medicines, Take a rest and look for resources that make you happy.</p>\r\n',NULL,NULL,'2896***1 tablet***1 Daily***5Days***After Meal',NULL,'<p>Nocturnal polysomnography, for snoring, day-time sleepiness and observed apneas. Concluded moderate obstructive sleep apnea associated with no significant oxygen desaturation. Positional dependency was observed based a sample of non-supine sleep. Severe periodic limb movement disorder was not associated with clinically significant number of arousals.</p>\r\n','Sandra Arcilla','Sunshine Zarga','466'),(114,'1612022400','78','169','<p>Vitamin B12 deficiency and back pain.&nbsp;Arthritis, total right knee replacement, hearing loss,','<p>Exercise properly, Maintain a Healthy Weight and Eat a proper diet. Taken some rest.</p>\r\n',NULL,NULL,'2898***1 tablet***1 Daily***7 Days***With / Without Food',NULL,'<p>Chronic midline low back pain w/o sciatica. Lumbar x-ray ordered.</p>\r\n','Isaac Oporto','Mary Grace Teleron','466'),(115,'1629648000','62','162','<p>Patient has no history of pain in the shoulders</p>\r\n','<p>Take rest and drink medicine. Avoid moving left arm.</p>\r\n',NULL,NULL,'2879***1 tab***2x daily***3 days***After meals until pain subsides',NULL,'<p>Onset of Pain started after the fall on Aug 22, afternoon</p>\r\n','Patient Clavio','Dr. Michael Rygel','466'),(116,'1629648000','67','168','<p>Patient has no history of pain in the ankle</p>\r\n','<p>Take rest and drink medicine. Avoid moving left feet.</p>\r\n',NULL,NULL,'2884***1 tab***2x Daily***3 Days***After Meal',NULL,'<p>Onset of Pain started after the fall on Aug 22, afternoon</p>\r\n','April Jane Garbo','Felix Remedio','466'),(117,'1629648000','68','169','<p>Patient has no history of back pain</p>\r\n','<p>Take a rest and dont take&nbsp;unnecessary movements.</p>\r\n',NULL,NULL,'2879***1 tablet***3x Daily***3 Days***After Eating',NULL,'<p>Onset of Pain started after the fall on Aug 22, afternoon</p>\r\n','Joseph Castro','Mary Grace Teleron','466'),(120,'1629907200','62','162','<p>The patient is no back pain history</p>\r\n','<p>&nbsp;</p>\r\n\r\n<p>Take a rest and dont take&nbsp;unnecessary movements.</p>\r\n',NULL,NULL,'2878***1 tablet***1 Daily***1 week***After Meal',NULL,'<p>Onset of Pain started after the fall on Aug 22, afternoon</p>\r\n','Patient Clavio','Dr. Michael Rygel','466'),(119,'1629907200','62','162','<p>William Lewis, a 14 year old boy, had pneumonia and rush to the hospital because experiences ches','<p>William Lewis, a 14 year old boy, had pneumonia and rush to the hospital because experiences chest pain when he breathes and coughs, fever, sweating, and diarrhea. And the boy was an exam the doctor, got an X-ray. The doctor found that the bacteria was spread in the lung of the patient and they give antibiotics to treat the bacterial, but the antibiotics triggered the body of the boy and run to the emergency room because of experience of fast breathing and led him to death. The cause of death was respiratory and cardiac arrest.</p>\r\n',NULL,NULL,'2879***1 tablet***1 Daily***1 week***After Meal',NULL,'<p>William Lewis, a 14 year old boy, had pneumonia and rush to the hospital because experiences chest pain when he breathes and coughs, fever, sweating, and diarrhea. And the boy was an exam the doctor, got an X-ray. The doctor found that the bacteria was spread in the lung of the patient and they give antibiotics to treat the bacterial, but the antibiotics triggered the body of the boy and run to the emergency room because of experience of fast breathing and led him to death. The cause of death was respiratory and cardiac arrest.</p>\r\n','Patient Clavio','Dr. Michael Rygel','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receptionist`
--

LOCK TABLES `receptionist` WRITE;
/*!40000 ALTER TABLE `receptionist` DISABLE KEYS */;
INSERT INTO `receptionist` VALUES (9,'uploads/mr_receptionist.jpg','Mr Receptionist','receptionist@rygel.biz','Nasipit Talamban','+639123456789',NULL,'770','466'),(10,'uploads/james_uy.jpg','James Uy','receptionist1.rygeltech@gmail.com','Kalubihan Talamban Cebu City','+639875643258',NULL,'812','466'),(11,'uploads/anne_zamora.jpg','Anne Zamora','receptionist2.rygeltech@gmail.com','Mandaue City','+639326451723',NULL,'813','466'),(12,'uploads/Jessa-Ramirez-Mandaue-Receiptionist.jpg','Jessa Ramirez','receptionist1.mandaue@mailinator.com','Campo Cebu City','+639763842534',NULL,'846','477'),(13,'uploads/Ria-Ponting-Mandaue_-Receiptionist.jpg','Ria Ponting','receptionist2.mandaue@mailinator.com','Paradise Cebu City','+639567420832',NULL,'847','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (36,'birth','Julian Lee*800','Julian Lee, 39 year old woman, give birth to a healthy baby boy, with normal delivery on August 25, 2021','Dr. Michael Rygel','25-08-2021','08/25/21','466'),(38,'operation','Angela Ariola*797','We remove a tumor or diseased body part of the patient, The case went smoothly and the patient did well.','Dr. Michael Rygel','25-07-2021','08/25/21','466'),(39,'operation','Olivia Sanchez*799','The donor\'s blood is transferred to a patient, the surgery went smoothly, the patient was returned to the recovery room.','Dr. Michael Rygel','25-07-2021','08/25/21','466'),(46,'expire','William Lewis*796','William Lewis, a 14 year old boy, had pneumonia and rush to the hospital because experiences chest pain when he breathes and coughs, fever, sweating, and diarrhea. And the boy was an exam the doctor, got an X-ray. The doctor found that the bacteria was spread in the lung of the patient and they give antibiotics to treat the bacterial, but the antibiotics triggered the body of the boy and run to the emergency room because of experience of fast breathing and led him to death. The cause of death wa','Peter Ceniza','25-07-2021','08/25/21','466'),(48,'expire','Theodore Lee*822','Conclusions  Current practice generates operative reports that vary widely in content and too often omit important elements. This research suggests that the construction of operative reports should be constrained such that the reports routinely include the fundamental goals of the operation and what was performed to meet them. Cognitive task analysis is based on the ways the mind controls the performance of tasks; it is an excellent method for determining the extra content needed in operative re','Peter Ceniza','26-08-2021','08/26/21','466'),(45,'operation','Anne Rodriguez*795','At the end of the procedure, the surgery was perfect and was seen perfect fit for the patient. The patient was then returned to the recovery room in good condition.','Rose Ann Bergente','25-07-2021','08/25/21','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (11,'Rygel Hospital Information System','SugboDoc Hospital Information System','Nasipit Talamban Cebu City','+639173456789','superadmin@rygel.biz',NULL,'$','english','flat',NULL,NULL,NULL,'',NULL,'PayPal','Twilio','','','superadmin'),(10,'SugboDoc Telehealth','SugboDoc.com','IT Park Cebu City','+639611234567','admin@rygel.biz',NULL,'₱','english','flat','jitsi',NULL,NULL,'uploads/sugbodoc-200x100-border.png',NULL,'Stripe','Twilio','','','466'),(22,'Rygel Hospital Information System','Mandaue Hospital','Hernan Cortes St, Tipolo, Mandaue City','5202271','admin1@mailinator.com',NULL,'$','english','flat',NULL,NULL,NULL,NULL,NULL,NULL,'Twilio',NULL,NULL,'477');
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
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms`
--

LOCK TABLES `sms` WRITE;
/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
INSERT INTO `sms` VALUES (69,'1629957424','{email} \r\nCognitive task analysis\r\nCognitive task analysis produced the algorithm in Table 1, which consists of the sequential goals and consequent actions involved in laparoscopic cholecystectomy. There are many sources of information about CTA, but we followed the ideas expressed in the Handbook of Cognitive Task Design17 for this work.\r\nModel operative report elements\r\nUsing CTA as a guide, we judged that the model operative report should include descriptions of the following: (1) retraction of the gallbladder, (2) thorough clearance of the infundibulum bordering the Calot triangle, (3) identification of the cystic duct–infundibulum junction, (4) clipping and cutting of the cystic duct and cystic artery, (5) separation of the gallbladder from the liver bed, and (6) findings such as inflammatory changes, difficulties encountered, bleeding, and the aforementioned irregular cues. The percentage of cases with each key element is given in Table 2.\r\nOPERATIVE REPORTS FROM 125 CASES WITHOUT BDIs\r\nThe text of the operative reports in cases without BDIs from university and community hospitals was similar. Thirty-one operative reports (24.8%) contained what was considered to be a minimum of the desired elements (as previously defined). Twenty of 31 described lateral retraction of the infundibulum, so the proportion with all key elements would fall to 16.0% if this criterion was required.\r\nNo mention was made of retracting the gallbladder in 21 cases (16.8%). Cephalad fundus retraction was described in 99 cases (79.2%), and lateral retraction of the gallbladder infundibulum was not','Patient Id: 62<br> Patient Name: Patient Clavio<br> Patient Phone: +63 961 632 7980','763','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_settings`
--

LOCK TABLES `sms_settings` WRITE;
/*!40000 ALTER TABLE `sms_settings` DISABLE KEYS */;
INSERT INTO `sms_settings` VALUES (29,'Twilio',NULL,NULL,NULL,NULL,NULL,'763','ACf35706e20d847684b01dd918b3114d34','812657f263cb1015c04190b39186e9df','+13158424589','466'),(28,'MSG91',NULL,NULL,NULL,'Enter_Sender_Number','Enter_Your_MSG91_Auth_Key','763',NULL,NULL,NULL,'466'),(27,'Clickatell','Enter_Your_ClickAtell_Username','','Enter_Your_ClickAtell_Api _Id',NULL,NULL,'763',NULL,NULL,NULL,'466'),(60,'Clickatell','Your ClickAtell Username','Your ClickAtell Password','Your ClickAtell Api Id',NULL,NULL,'1',NULL,NULL,NULL,'477'),(61,'MSG91','Your MSG91 Username',NULL,'Your MSG91 API ID','Sender Number','Your MSG91 Auth Key','1',NULL,NULL,NULL,'477'),(62,'Twilio',NULL,NULL,NULL,NULL,NULL,'1','SID Number','Token Number','Sender Number','477');
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (13,'Hematology','<p>Note:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\" summary=\"Blood Tests\">\r\n	<caption>Hematology</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HEMATOLOGY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ESR</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mm/hr</td>\r\n			<td>&lt; 30</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Complete Blood Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;White Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>4.00 ~ 10.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Red Blood Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^12/L</td>\r\n			<td>4.20 ~ 5.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hemoglobin</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>g/L</td>\r\n			<td>125 ~ 160</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Hematocrit</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.37 ~ 0.47</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Volume</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>fL</td>\r\n			<td>78 ~ 100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>pg</td>\r\n			<td>27 ~ 31</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Mean Corpuscular Hb Conc.</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>0.32 ~ 0.36</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;RBC Distribution Width</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>11.0 ~ 16.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Platelet Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>150 ~ 450</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Relative)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Segmenters / Neutrophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>50.0 ~ 70.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Lymphocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>18.0 ~ 42.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Monocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>2.0 ~ 11.o</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Eosinophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 6.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Basophils</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bands</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>0.0 ~ 5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Diff. Count (Absolute)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Seg/Neutro Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>1.30 ~ 6.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Lymphocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>1.50 ~ 3.50</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Monocyte Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Eosinophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Basophil Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 0.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Absolute Band Count</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>10^9/L</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n','789',NULL,'466'),(14,'HBA1C','<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>HBA1C</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HBA1C</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HbA1c (IE-HPLC)</td>\r\n			<td>&nbsp;</td>\r\n			<td>%</td>\r\n			<td>Normal : &lt; 5.70%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Pre-diabetes : 5.70% ~ 6.40</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Diabetes : &gt; / = 6.50%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n','789',NULL,'466'),(15,'Chemistry 2','<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>CHEMISTRY 2</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>REFERENCE RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Conventional Units</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI Units</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lipid Profile</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Cholesterol</td>\r\n			<td>H</td>\r\n			<td>239</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 200</td>\r\n			<td>6.18</td>\r\n			<td>mmo l / L</td>\r\n			<td>&lt; 5.14</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Triglycerides</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>10 ~ 150</td>\r\n			<td>&nbsp;</td>\r\n			<td>mmo l / L</td>\r\n			<td>0.11 ~ 1.70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;HDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>F : &gt; 65</td>\r\n			<td>&nbsp;</td>\r\n			<td>mmo l / L</td>\r\n			<td>F : &gt; 1.69</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;LDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 130</td>\r\n			<td>&nbsp;</td>\r\n			<td>mmo l / L</td>\r\n			<td>&lt; 3.38</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;VLDL</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>2.00 ~ 38.00</td>\r\n			<td>&nbsp;</td>\r\n			<td>mmo l / L</td>\r\n			<td>0.05 ~ 1.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;CHOL/HDL Ratio</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&lt; 3.08</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&lt; 3.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Capillary Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n','763',NULL,'466'),(16,'Clinical Microscopy','<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CLINICAL MICROSCOPY</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>RESULT</td>\r\n			<td>UNIT</td>\r\n			<td>REFERENCE RANGES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CLINICAL MICROSCOPY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Routine Urinalysis</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; Physical / Macroscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Color</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Transparency</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Chemical</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Sp. Gravity</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>1.003 ~ 1.035</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;pH</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>5 ~ 8</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Protein</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Glucose</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bilirubin</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Blood</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Leucocytes</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Nitrite</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Urobilinogen</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>&lt; 1.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Ketone</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;Microscopic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;RBC</td>\r\n			<td>&nbsp;</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;WBC</td>\r\n			<td>&nbsp;</td>\r\n			<td>/hpf</td>\r\n			<td>0 ~ 5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Epithelial Cells</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Bacteria</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;Mucus Threads</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n','789',NULL,'466'),(17,'Chemistry 1','<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>CHEMISTRY 1</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>TEST</td>\r\n			<td>H/L</td>\r\n			<td>RESULT</td>\r\n			<td>UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>H/L</td>\r\n			<td>REFERENCES RANGES</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CHEMISTRY</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>CONVENTIONAL UNITS</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>SI UNITS</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fasting Blood Sugar</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>70 ~ 100</td>\r\n			<td>&nbsp;</td>\r\n			<td>mmo l / L</td>\r\n			<td>3.88 ~ 5.54</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Creatinine</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>0.60 ~ 1.20</td>\r\n			<td>&nbsp;</td>\r\n			<td>umo l / L</td>\r\n			<td>53.04 ~ 106.08</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uric Acid</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>mg/dl</td>\r\n			<td>F : 2.7 ~ 7.3</td>\r\n			<td>&nbsp;</td>\r\n			<td>umo l / L</td>\r\n			<td>F : 160 ~ 432</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SGPT/ALT</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>U/L</td>\r\n			<td>&lt; 34</td>\r\n			<td>&nbsp;</td>\r\n			<td>U/L</td>\r\n			<td>&lt;34</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sodium</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>meq/L</td>\r\n			<td>135.00 ~</td>\r\n			<td>&nbsp;</td>\r\n			<td>mmo l / L</td>\r\n			<td>135.00 ~ 148.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Potassium</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>meq/L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n			<td>&nbsp;</td>\r\n			<td>mmo l /L</td>\r\n			<td>3.5 ~ 5.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Name:</p>\r\n\r\n<p>PID:</p>\r\n\r\n<p>Clinician:</p>\r\n\r\n<p>&nbsp;</p>\r\n','763',NULL,'466'),(19,'[Test]Clinical History','<p><strong>Clinical&nbsp;History:</strong></p>\r\n\r\n<p>This 62 year-old black female had been worked up by&nbsp;medicine&nbsp;for masses in the epigastrium. A liver&nbsp;scan&nbsp;revealed multiple filling defects and an&nbsp;upper GI series&nbsp;revealed an antral&nbsp;lesion&nbsp;which was obstructing the&nbsp;fundus&nbsp;of the stomach.</p>\r\n\r\n<p><strong>Operative Findings:</strong></p>\r\n\r\n<p>Under&nbsp;general anesthesia, with the patient in the&nbsp;supine&nbsp;position, the&nbsp;abdomen&nbsp;was prepped and draped in the usual fashion. An upper midline&nbsp;incision&nbsp;was made and the&nbsp;peritoneal cavity&nbsp;entered. Generalized&nbsp;abdominal&nbsp;exploration&nbsp;revealed multiple large nodules within the substance of both lobes of the liver and a large ulcerating lesion in area of the&nbsp;antrum&nbsp;of the stomach. Multiple nodes along the lesser and greater curvature of the stomach and the subpyloric area were positive clinically for&nbsp;tumor. The stomach was not adherent to the&nbsp;pancreas&nbsp;or any other structures, therefore, a distal gastrectomy was undertaken. The greater and lesser curvatures of the stomach were freed up as was the&nbsp;duodenum, and Payr clamps were placed along the distal stomach just beyond the&nbsp;pylorus, and the distal stump was amputated.</p>\r\n\r\n<p><strong>Procedure Continued:</strong></p>\r\n\r\n<p>This was reflected up and the left gastric&nbsp;arteries&nbsp;were ligated. The stomach was then transected in the usual fashion and the greater curvature tapered using a 2-0 chromic and an inverting&nbsp;suture&nbsp;of 2-0 silk.</p>\r\n','763',NULL,'466'),(21,'Pediatric Health History Form – Initial Visit','<h1>Pediatric Health History Form &ndash; Initial Visit</h1>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:600px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Child&#39;s Name\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Date of Birth\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Age\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Male\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Female\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mother&#39;s Name\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Father&#39;s Name\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>From filled out by\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Date\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1><br />\r\n<strong>Pregnancy/Neonatal Period<br />\r\nChild&#39;s Past Medical History</strong></h1>\r\n\r\n<p>Where was your child born? _________________________</p>\r\n\r\n<p>Is the child yours by</p>\r\n\r\n<p>☐ birth&nbsp;&nbsp;☐ adoption&nbsp;&nbsp;☐&nbsp;stepchild&nbsp;&nbsp;☐&nbsp;other</p>\r\n\r\n<p><strong>Pregnancy complcations</strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:50px; width:600px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Delivery by&nbsp; &nbsp; &nbsp;☐&nbsp;vaginal&nbsp;<strong>&nbsp;</strong>☐&nbsp;c-section</p>\r\n\r\n<p>Reason for c-section</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:300px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Complications</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:300px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Was your child premature&nbsp;<strong>&nbsp;</strong>☐&nbsp;No&nbsp;&nbsp;☐&nbsp;Yes, born at ________________weeks</p>\r\n\r\n<p>Complications</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:300px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Apgar scores</p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:20px; width:300px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>1 minutes</p>\r\n\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:20px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>\r\n			<p>5 minutes</p>\r\n\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:20px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Birth weight________Length________</p>\r\n\r\n<p>Others problems in the newborn period</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:200px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3><strong>Infancy/Childhood/Adolescence</strong></h3>\r\n\r\n<p>Has your child ever been treated for or diagnosed with: ( explain)</p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:210px; width:600px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>☐ Asthma or reactive airway disease&nbsp;\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>☐ Genetic Syndrome\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>☐ Wheezing or bronchiolitis\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>☐ Seizures\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>☐ Seasonal allergies or eczema\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>☐ Anemia\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>☐ Food allergy\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>☐ Broken bone\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>☐ Recurrrent ear infections\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>☐ Mental retardation or learning disability\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>☐ Pneumonia\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>☐ Depression/anxiety\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>☐ Urinary tract infections\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Other chronic medical conditions</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Has your child ever been hospitalized&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;☐<strong>&nbsp;</strong>No&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;☐<strong>&nbsp;</strong>Yes (explain)</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Previous surgeries and date</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:300px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Previous pediatrician_________________________________________</p>\r\n\r\n<p>Please list any specialist your child is currrently seeing and reason:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3><strong>Medications</strong></h3>\r\n\r\n<p><strong>ALLERGIES</strong><strong> </strong>to medicine/vaccines (list and describe reaction)</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Current medications and dose:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:350px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Vitamins ________________________________________________</p>\r\n\r\n<p>Herbal supplements _______________________________________</p>\r\n\r\n<p>Over-the-counter meds ____________________________________</p>\r\n\r\n<h3><strong>Development/Nutrition</strong></h3>\r\n\r\n<p>At what age did your child:</p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Walk alone\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Sit alone\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Toilet train(day)\r\n			<table border=\"1\" cellpadding=\"','825',NULL,'477'),(22,'Physical Examination Form','<h1><strong>Preparticipation Physical Evaluation</strong></h1>\r\n\r\n<h2><strong>Physical Examination Form</strong></h2>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:600px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Name&nbsp;\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Date of Birth\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3><strong>PHYSICIAN REMINDERS</strong></h3>\r\n\r\n<p>1. Consider additional questions on more sensitive issues</p>\r\n\r\n<ul>\r\n	<li>Do you feel stressed out or under a lot of pressure?</li>\r\n	<li>Do you ever feel sad, hopeless, depressed, or anxious?</li>\r\n	<li>Do you feel safe at your home or residence?</li>\r\n	<li>Have you ever tried cigarettes, chewing tobacco, snuff, or dip?</li>\r\n	<li>During the past 30 days, did you use chewing tobacco, snuff, or dip?</li>\r\n	<li>Do you think alcohol or use any other drugs?</li>\r\n	<li>Have you ever taken anabolic steroids or used any other performance supplement?</li>\r\n	<li>Have you ever taken any supplements to help you gain or lose weight or improve your performance?</li>\r\n	<li>Do you wear a seatbelt, use a helmet and use condoms?</li>\r\n</ul>\r\n\r\n<p>2. Consider reviewing questions on cardiovascular symptoms (questions 5-14)</p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:1000px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>EXAMINATION</strong></td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Height\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Weight\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>☐ Male</td>\r\n			<td>☐ Female</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>BP\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Pulse\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Vision R 20/\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>L 20/\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:100px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Corected&nbsp;☐ Y&nbsp;&nbsp;☐ N</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><strong>MEDICAL</strong></p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td><strong>NORMAL</strong></td>\r\n			<td>&nbsp;</td>\r\n			<td><strong>ABNORMAL FINDINGS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Appearance</p>\r\n\r\n			<ul>\r\n				<li>Marfan stigmata (kyphoscoliosis, high-arched palate, pectus excavatum, arachnodactyly arm span &gt; height, hyperlaxity, myopia, MVP, aortic insufficiency</li>\r\n			</ul>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Eyes/ears/nose/throat</p>\r\n\r\n			<ul>\r\n				<li>Pupils equal</li>\r\n				<li>Hearing</li>\r\n			</ul>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lymph nodes</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Heart</p>\r\n\r\n			<ul>\r\n				<li>Mumurs (auscultation standing, supine, +/- Valsalva)</li>\r\n				<li>Location of point of maximal impulse (PM)</li>\r\n			</ul>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Pulses</p>\r\n\r\n			<ul>\r\n				<li>Simultaneous femoral and radial pulses</li>\r\n			</ul>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lungs</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Abdomen</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Genitourinary (males only)</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Skin</p>\r\n\r\n			<ul>\r\n				<li>HSV, lessions suggestive of MRSA, tinea corporis</li>\r\n			</ul>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Neurologic</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>MUSCULOSKELETAL</strong></td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Neck</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Back</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Shoulder/arm</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Elbow/forearm</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wrist/hand/fingers</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hip/thigh</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Knee</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Leg/ankle</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Foot/toes</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Functional</p>\r\n\r\n			<ul>\r\n				<li>Duck-walk, single leg hop</li>\r\n			</ul>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Consider ECG, echocardiogram, and referral to cardiology for abnormalcardiac history or exam.</p>\r\n\r\n<p>Consider GU exam if in private setting. Having third party present is recommend.</p>\r\n\r\n<p>Consider cognitive evaluation or baseline neuropsychiatric testing if a history of significant concussion.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>☐ Cleared for all sports without restriction</p>\r\n\r\n<p>☐ Cleared for all sports without restriction with reccomendations for further evaluation of treatment for</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>☐ Not cleared</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;☐ Pending further evaluation</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;☐ For any sports</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;☐ For certain sports</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Reason</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Reccommendations</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>I have examined the above-named student and completed the preparticipation physical evaluation. The athlete does not present apparent clinical contraindications to practice and participate in the sport(s) as outlined above. A copyof the physical exam is on record in my office and can be made available to the school at the request of the parents. If conditions arise after the athlete has been cleared for participation, the physician may rescind the clearance until the problem is resolved and the potential consequences are completely explained to the athlete (and parents/guardians).</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Name of physician (print/type)\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Date\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Address\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>Phone\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Signature of physician, MD or DO\r\n			<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:30px; width:250px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;','825',NULL,'477');
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
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_schedule`
--

LOCK TABLES `time_schedule` WRITE;
/*!40000 ALTER TABLE `time_schedule` DISABLE KEYS */;
INSERT INTO `time_schedule` VALUES (108,'162','Friday','09:00 AM','02:00 PM','108','4','466'),(110,'162','Sunday','10:45 PM','11:45 PM','273','3','466'),(111,'162','Saturday','11:00 PM','11:45 PM','276','3','466'),(115,'162','Monday','03:00 PM','06:00 PM','180','3','466'),(114,'162','Tuesday','03:00 PM','06:00 PM','180','3','466'),(116,'169','Monday','04:30 PM','06:00 PM','198','3','466'),(117,'168','Monday','04:30 PM','06:00 PM','198','3','466'),(119,'162','Wednesday','05:45 PM','06:00 PM','213','3','466'),(122,'168','Friday','06:15 PM','07:15 PM','219','3','466'),(121,'169','Friday','06:00 PM','06:15 PM','216','3','466');
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
) ENGINE=MyISAM AUTO_INCREMENT=2334 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_slot`
--

LOCK TABLES `time_slot` WRITE;
/*!40000 ALTER TABLE `time_slot` DISABLE KEYS */;
INSERT INTO `time_slot` VALUES (2240,'162','09:00 AM','09:20 AM','Friday','108','466'),(2241,'162','09:20 AM','09:40 AM','Friday','112','466'),(2242,'162','09:40 AM','10:00 AM','Friday','116','466'),(2243,'162','10:00 AM','10:20 AM','Friday','120','466'),(2244,'162','10:20 AM','10:40 AM','Friday','124','466'),(2245,'162','10:40 AM','11:00 AM','Friday','128','466'),(2246,'162','11:00 AM','11:20 AM','Friday','132','466'),(2247,'162','11:20 AM','11:40 AM','Friday','136','466'),(2248,'162','11:40 AM','12:00 AM','Friday','140','466'),(2249,'162','12:00 AM','12:20 PM','Friday','144','466'),(2250,'162','12:20 PM','12:40 PM','Friday','148','466'),(2251,'162','12:40 PM','01:00 PM','Friday','152','466'),(2252,'162','01:00 PM','01:20 PM','Friday','156','466'),(2253,'162','01:20 PM','01:40 PM','Friday','160','466'),(2254,'162','01:40 PM','02:00 PM','Friday','164','466'),(2308,'162','04:30 PM','04:45 PM','Monday','198','466'),(2309,'162','04:45 PM','05:00 PM','Monday','201','466'),(2307,'162','04:15 PM','04:30 PM','Monday','195','466'),(2273,'162','11:30 PM','11:45 PM','Saturday','282','466'),(2272,'162','11:15 PM','11:30 PM','Saturday','279','466'),(2271,'162','11:00 PM','11:15 PM','Saturday','276','466'),(2270,'162','11:30 PM','11:45 PM','Sunday','282','466'),(2269,'162','11:15 PM','11:30 PM','Sunday','279','466'),(2268,'162','11:00 PM','11:15 PM','Sunday','276','466'),(2267,'162','10:45 PM','11:00 PM','Sunday','273','466'),(2306,'162','04:00 PM','04:15 PM','Monday','192','466'),(2305,'162','03:45 PM','04:00 PM','Monday','189','466'),(2304,'162','03:30 PM','03:45 PM','Monday','186','466'),(2303,'162','03:15 PM','03:30 PM','Monday','183','466'),(2302,'162','03:00 PM','03:15 PM','Monday','180','466'),(2290,'162','03:00 PM','03:15 PM','Tuesday','180','466'),(2291,'162','03:15 PM','03:30 PM','Tuesday','183','466'),(2292,'162','03:30 PM','03:45 PM','Tuesday','186','466'),(2293,'162','03:45 PM','04:00 PM','Tuesday','189','466'),(2294,'162','04:00 PM','04:15 PM','Tuesday','192','466'),(2295,'162','04:15 PM','04:30 PM','Tuesday','195','466'),(2296,'162','04:30 PM','04:45 PM','Tuesday','198','466'),(2297,'162','04:45 PM','05:00 PM','Tuesday','201','466'),(2298,'162','05:00 PM','05:15 PM','Tuesday','204','466'),(2299,'162','05:15 PM','05:30 PM','Tuesday','207','466'),(2300,'162','05:30 PM','05:45 PM','Tuesday','210','466'),(2301,'162','05:45 PM','06:00 PM','Tuesday','213','466'),(2310,'162','05:00 PM','05:15 PM','Monday','204','466'),(2311,'162','05:15 PM','05:30 PM','Monday','207','466'),(2312,'162','05:30 PM','05:45 PM','Monday','210','466'),(2313,'162','05:45 PM','06:00 PM','Monday','213','466'),(2314,'169','04:30 PM','04:45 PM','Monday','198','466'),(2315,'169','04:45 PM','05:00 PM','Monday','201','466'),(2316,'169','05:00 PM','05:15 PM','Monday','204','466'),(2317,'169','05:15 PM','05:30 PM','Monday','207','466'),(2318,'169','05:30 PM','05:45 PM','Monday','210','466'),(2319,'169','05:45 PM','06:00 PM','Monday','213','466'),(2320,'168','04:30 PM','04:45 PM','Monday','198','466'),(2321,'168','04:45 PM','05:00 PM','Monday','201','466'),(2322,'168','05:00 PM','05:15 PM','Monday','204','466'),(2323,'168','05:15 PM','05:30 PM','Monday','207','466'),(2324,'168','05:30 PM','05:45 PM','Monday','210','466'),(2325,'168','05:45 PM','06:00 PM','Monday','213','466'),(2327,'162','05:45 PM','06:00 PM','Wednesday','213','466'),(2330,'168','06:15 PM','06:30 PM','Friday','219','466'),(2329,'169','06:00 PM','06:15 PM','Friday','216','466'),(2331,'168','06:30 PM','06:45 PM','Friday','222','466'),(2332,'168','06:45 PM','07:00 PM','Friday','225','466'),(2333,'168','07:00 PM','07:15 PM','Friday','228','466');
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
) ENGINE=InnoDB AUTO_INCREMENT=848 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','superadmin','$2y$08$DrZL.OPZroucb5KYEmRB/O07BapqS35l63okgCJlTdYL2TyH.WA0O','','superadmin@rygel.biz','','eX0.Bq6nP57EuXX4hJkPHO973e7a4c25f1849d3a',1511432365,'zCeJpcj78CKqJ4sVxVbxcO',1268889823,1630482565,1,'Admin','istrator','ADMIN','0',NULL),(763,'49.145.162.177','Ryan Michael','$2y$08$h5ZsyLuWM8izwhwWlkfDdeylY8jdXwlqhf8C5Tlj.rIP/AL/7W1oO',NULL,'admin@rygel.biz',NULL,NULL,NULL,NULL,1595923316,1630743280,1,NULL,NULL,NULL,NULL,NULL),(764,'49.145.162.177','Patient Clavio','$2y$08$XtkBuGybrwSv/Jqi9j2JBuSkU2srOmbtT9FhkU9RPcOQdwvvsru0q',NULL,'patient12.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1595924679,1629945945,1,NULL,NULL,NULL,NULL,'763'),(765,'49.145.162.177','Dr. Michael Rygel','$2y$08$TpR1zdo5B1Y32h9P2WGAk.7afb/zfospC20wTlAXvQMfcdDq5p8xC',NULL,'doctor@rygel.biz',NULL,'2vkUvHKiiG5050c1ee023a7fbb680a7eb0f204b7',1629040498,NULL,1595924765,1630720955,1,NULL,NULL,NULL,NULL,'763'),(767,'49.145.162.177','Mr Pharmacist','$2y$08$7NA95vFwBNompkFy9nWOAu0V7l954eQsO/JgHSJmEuDAPQqTUDKMe',NULL,'pharmacist@rygel.biz',NULL,NULL,NULL,NULL,1595928739,1629432816,1,NULL,NULL,NULL,NULL,'763'),(770,'49.145.162.177','Mr Receptionist','$2y$08$uQ8hjJRTGAEsshOFkS8acue03e.4h3MXQLwH79837vhqu7SH9U3TK',NULL,'receptionist@rygel.biz',NULL,NULL,NULL,NULL,1595929512,1629948016,1,NULL,NULL,NULL,NULL,'763'),(787,'49.145.162.177','Mr Accountant','$2y$08$GVopabH96MmnQFKKqYCYJOjlr0kgUQUg7GOjsqnJ/.tlcQCfwg0cm',NULL,'accountant@rygel.biz',NULL,NULL,NULL,NULL,1600753981,1630379871,1,NULL,NULL,NULL,NULL,'763'),(789,'49.145.162.177','Mr Lab Technician','$2y$08$B2WZyEiQdFCPndWw8//ZpuFXb7pc00nAiIU8g0S7TJAg5NLK3I5sK',NULL,'labtech@rygel.biz',NULL,NULL,NULL,NULL,1600845967,1629261480,1,NULL,NULL,NULL,NULL,'763'),(790,'49.145.162.177','Mrs Nurse','$2y$08$RYAAuKhOF.zyefUPGwTHp.LH95LMMjO64et98EgHPpmzrbQY2tP82',NULL,'nurse@rygel.biz',NULL,NULL,NULL,NULL,1600846100,1629280720,1,NULL,NULL,NULL,NULL,'763'),(791,'192.168.10.1','Ian Dave Colina','$2y$08$V2A6F4X.KmK1U71iE23cDO9RveVqUCS2SfGxa5DHuNArlyrtpJ8kG',NULL,'patient13.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1628790667,1628876335,1,NULL,NULL,NULL,NULL,'763'),(792,'49.145.162.177','April Jane Garbo','$2y$08$R074gG6CrFHT7PIqIIvTwuj9EoRge9bpepOAsNKU9c4Ds4JGAAZxO',NULL,'patient1.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629087389,1630665648,1,NULL,NULL,NULL,NULL,'763'),(793,'49.145.162.177','Joseph Castro','$2y$08$LK5kc9yyEE.JTIKl5QpMuuOPatinlw3MhCXfxInIXHLIN1/TcOKju',NULL,'patient2.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629087572,1630665660,1,NULL,NULL,NULL,NULL,'763'),(794,'49.145.162.177','Albert Reyes','$2y$08$PH2ubmzlykjN8ec6DzitUeSSW9YA9oqoOPvvLOE.dAVV4wSfgj7he',NULL,'patient1.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629093029,1629793878,1,NULL,NULL,NULL,NULL,'763'),(795,'49.145.162.177','Anne Rodriguez','$2y$08$D38mjHJ.p3fQPDMyGeG3B.EM5FrmJjsXgqzvjvC3GNqSgzlox2RpK',NULL,'patient2.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629093233,1629793912,1,NULL,NULL,NULL,NULL,'763'),(796,'49.145.162.177','William Lewis','$2y$08$DHV6nbo00ziHdXaO9tpwOe.QZ4ZQ5r704tjD7UCABYwWaYHn8pQDG',NULL,'patient3.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629093320,1629794453,1,NULL,NULL,NULL,NULL,'763'),(797,'49.145.162.177','Angela Ariola','$2y$08$IJzA9nOK8zw.Gm.lCu78suXmhZGCx0w415iLCWVO0reMWHWCf3PCm',NULL,'patient4.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629093394,1629794063,1,NULL,NULL,NULL,NULL,'763'),(798,'49.145.162.177','Jacob Cortes','$2y$08$yG3OnpoX6bYcbzUJGYouo.gVkQvB6qCG6KXBWfq.rGgOjHdwEKVHy',NULL,'patient5.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629096496,1629794107,1,NULL,NULL,NULL,NULL,'763'),(799,'49.145.162.177','Olivia Sanchez','$2y$08$DPQ874ZaCgMq4i0BfJ9qieAcQUbol7NUtV9rIDy2Jwz2ytvYRYv.e',NULL,'patient6.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629096565,1629794146,1,NULL,NULL,NULL,NULL,'763'),(800,'49.145.162.177','Julian Lee','$2y$08$upE8BZG1rIXfYzDZwuAdsufIDjrXbIGZI/kUrro3lvhJqRueXczuC',NULL,'patient7.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629096667,1629794171,1,NULL,NULL,NULL,NULL,'763'),(801,'49.145.162.177','Henry Perez','$2y$08$urO7s5oQ3c5JAanUYYjVbeFFPU2Y9RX5IrzRSdHtlbgqrrmn99bcS',NULL,'patient8.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629096758,1629794191,1,NULL,NULL,NULL,NULL,'763'),(802,'49.145.162.177','Sandra Arcilla','$2y$08$3yyRQIKVXtDK9IHeY96vgeUqIawK7FWO1qCugc6lUmApa3XNUv4wS',NULL,'patient9.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629096919,1629794214,1,NULL,NULL,NULL,NULL,'763'),(803,'49.145.162.177','Isaac Oporto','$2y$08$OtcsT8ltDhpLa3OQ5mKppuisJ9Bjefc/3MaTsyrwvjyF8ksOIGkbS',NULL,'patient10.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629097005,1629794236,1,NULL,NULL,NULL,NULL,'763'),(804,'49.145.162.177','Felix Remedio','$2y$08$fujCaGgI4mjukEAbyIswDudYTBxrfS8x4Ddjd257JwehIXsYg92NO',NULL,'doctor1.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629189888,1630662438,1,NULL,NULL,NULL,NULL,'763'),(805,'49.145.162.177','Mary Grace Teleron','$2y$08$GRIyg4sJ5iGXK7VEG02J5.oH4HRg5AQSI5pwER57CABP98LaZhmpa',NULL,'doctor2.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629189991,1630662478,1,NULL,NULL,NULL,NULL,'763'),(806,'49.145.162.177','Mark Ouano','$2y$08$B.x4Nr0.2g6VnmDJcweQY.TuWzzvn0JHHX5o2fO/gcS8UETV9BHOm',NULL,'nurse1.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629190087,1629795197,1,NULL,NULL,NULL,NULL,'763'),(807,'49.145.162.177','Kim Adolfo','$2y$08$vwWMW6p9uOUH99RyH8utP.TZY1OLYmUNI1sn1P0j606QLcIFvJw22',NULL,'nurse2.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629190148,1629795239,1,NULL,NULL,NULL,NULL,'763'),(808,'49.145.162.177','Donald Suarez','$2y$08$22rLaSH9iNfaiE.uhdYv9uirbF1/wwYW4H7e4y5Amba9InMGQttYy',NULL,'labtechnician1.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629190231,1629795479,1,NULL,NULL,NULL,NULL,'763'),(809,'49.145.162.177','Maricar Sabay','$2y$08$JlRByf5RW6c0r4QSaeblW.pZ8vbsfdbGoDD1L0Ove/LbaAcotPlC6',NULL,'labtechnician2.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629190442,1629795504,1,NULL,NULL,NULL,NULL,'763'),(810,'49.145.162.177','Erick Sanchez','$2y$08$VFD1fFFwRDZSdgM8oXAvoeRCkABETXvVOzI7JLlKUAT/iMQbImaSK',NULL,'acct1.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629190520,1630402794,1,NULL,NULL,NULL,NULL,'763'),(811,'49.145.162.177','Jhea Manatad','$2y$08$ZmTC.a37eVEgFhvIkgPGjeNuQaJFC1RufRLLQvcWx4UTOA6mkqHvy',NULL,'acct2.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629190566,1629795536,1,NULL,NULL,NULL,NULL,'763'),(812,'49.145.162.177','James Uy','$2y$08$Oxs6Aqv5sfEikzvHQ7u01.EiAOgEkgU1Ot77U2k7uRy2sfItYOBgK',NULL,'receptionist1.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629190961,1630402773,1,NULL,NULL,NULL,NULL,'763'),(813,'49.145.162.177','Anne Zamora','$2y$08$bju2F6ke03pimPGU42LlY.CAO3VTztl/2IuZFD5.eJ6VrOno0sYu2',NULL,'receptionist2.rygeltech@gmail.com',NULL,NULL,NULL,NULL,1629191002,1629795284,1,NULL,NULL,NULL,NULL,'763'),(814,'49.145.162.177','Patrick Bautista','$2y$08$eE3Msf6NtcIiA1PzC8RPp.KoDP7DXJGVM8b63Kmv8r3A263WDqeti',NULL,'pharmacist1.cebu@rygel.biz',NULL,NULL,NULL,NULL,1629254835,1629794521,1,NULL,NULL,NULL,NULL,'763'),(815,'49.145.162.177','Melody Torres','$2y$08$clQXhGj6mGFlhG0nveQwmekZjQHiuNggrTtYpGpoCEr8EC2f5IfK.',NULL,'pharmacist2.cebu@rygel.biz',NULL,NULL,NULL,NULL,1629254913,1629794591,1,NULL,NULL,NULL,NULL,'763'),(816,'49.145.162.177','Clark Perez','$2y$08$e06wqRMZmnzOiOivtNe/3eoUMWe5/z1Ul/trAcYv8XDUr9k.65E9S',NULL,'doctor1.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629277790,NULL,1,NULL,NULL,NULL,NULL,'763'),(817,'49.145.162.177','Rose Ann Bergente','$2y$08$9.lS12ygXnIGojUTIhyDveuj/SyHfz05mR0tk66X3EGLNYp6KAZQy',NULL,'doctor2.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629277949,NULL,1,NULL,NULL,NULL,NULL,'763'),(818,'49.145.162.177','Carl Arisgado','$2y$08$r2OJgC2SyooOAjJcmS0pZOOnkLILHxTdPKG6Rt9A2rbQng/j2bTWS',NULL,'doctor3.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629278028,NULL,1,NULL,NULL,NULL,NULL,'763'),(819,'49.145.162.177','Mary Ann Remedio','$2y$08$Zgq53j6uYl.XXimqOd6edetHZgFqASJ4rJlRRnaJoufptSyN6c5lC',NULL,'doctor4.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629278103,NULL,1,NULL,NULL,NULL,NULL,'763'),(820,'49.145.162.177','Peter Ceniza','$2y$08$eg5VNDZdHupIe//6mahZfe4nKlnyFAoQnOjLfsNIMssDxpqLEbW4G',NULL,'doctor5.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629278182,NULL,1,NULL,NULL,NULL,NULL,'763'),(821,'49.145.162.177','Sunshine Zarga','$2y$08$w1C0SiU7crgbTw1gCmskt.OuK9Yuw7E1Az2jor1vdcak7c6BDJ6yi',NULL,'doctor6.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629278265,NULL,1,NULL,NULL,NULL,NULL,'763'),(822,'49.145.167.20','Theodore Lee','$2y$08$sY6QugOwXbpJ18BITnuEP./I7C8rnWD1B5WdojsfwfeT5nOsBS/Te',NULL,'patient11.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1629859602,NULL,1,NULL,NULL,NULL,NULL,'763'),(823,'49.145.167.20','Jessica Lewis','$2y$08$4/b4XTLJZTeqXQMHZS49ne.oYys9gItWfHpef.IQSuxYGQKpokI8.',NULL,'jessicalewis@gmail.com',NULL,NULL,NULL,NULL,1630034721,NULL,1,NULL,NULL,NULL,NULL,'763'),(824,'49.145.167.20','Mailina Torres','0',NULL,'patient@mailinator.com',NULL,NULL,NULL,NULL,1630426806,NULL,1,NULL,NULL,NULL,NULL,'763'),(825,'49.145.163.238','Mandaue Hospital','$2y$08$bsRIukOZzZ5LhJc...Z1DOWRmqv8/Lp/hkFGhQxTaL1Hv3b9wRtI6',NULL,'admin1@mailinator.com',NULL,NULL,NULL,NULL,1630462901,1630662052,1,NULL,NULL,NULL,NULL,NULL),(826,'49.145.163.238','Alexander Perez','$2y$08$6TggWf6.o1KrsBt1efeQROnHoG6Nnpwbz3Lunw6cvT41hSgv0uvju',NULL,'doctor7.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1630469396,NULL,1,NULL,NULL,NULL,NULL,'763'),(827,'49.145.163.238','Amelia Lopez','$2y$08$6UBtmJSeY3y3Kd.pRnvDjejtMYdyZCE5yy2vQ/IvJhWntrvvZFt3u',NULL,'doctor8.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1630475485,NULL,1,NULL,NULL,NULL,NULL,'763'),(828,'49.145.163.238','Lucas Reynes','$2y$08$NXOmTiGIwyYcPS1OsBUYDelHSUz16Rw3irTyHJmJqTEcyiwquqjJu',NULL,'doctor9.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1630475718,NULL,1,NULL,NULL,NULL,NULL,'763'),(829,'49.145.163.238','Ava Clarus','$2y$08$DEKQVaWNNK79tbUW6pD4Peb4bckU0.jfaqh8pCGfr1ax/ltc7wNYm',NULL,'doctor10.sugbodoc@mailinator',NULL,NULL,NULL,NULL,1630475877,NULL,1,NULL,NULL,NULL,NULL,'763'),(830,'49.145.163.238','Benjamin Abcede','$2y$08$HCMBwdgUM.ZhbamRDg.sL.EfeBxMunWn92wOIsBH5mHcdZ2Nbsqvi',NULL,'doctor11.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1630476499,NULL,1,NULL,NULL,NULL,NULL,'763'),(831,'49.145.163.238','Isabelle Aguilar','$2y$08$t2OaaMAlrqOIfa8nO4Lm5.O8e6Vr.vlYHEvLYteSBtzzlOcXDYPoC',NULL,'doctor12.sugbodoc@mailinator',NULL,NULL,NULL,NULL,1630476615,NULL,1,NULL,NULL,NULL,NULL,'763'),(832,'49.145.163.238','Oliver Alcantara','$2y$08$wwHOs.kx4yVJNyNRt.aWsOzFtcAwBwJu9JdFJwAzvoBbPmJGD1yc2',NULL,'doctor13.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1630476739,NULL,1,NULL,NULL,NULL,NULL,'763'),(833,'49.145.163.238','Evelyn Ang','$2y$08$wy9QKCZ8oacnMOBkHB6D2.aSDxIRI18QicUXuxgTXzjGTeOajZcUO',NULL,'doctor14.sugbodoc@mailinator.com',NULL,NULL,NULL,NULL,1630476856,NULL,1,NULL,NULL,NULL,NULL,'763'),(834,'49.145.163.238','Faith Aquino','$2y$08$CgQF96EO5KMLrY9QUvnRZuXyWn83F1Fq1Alr0gQ4izLJDTzgcTR6G',NULL,'doctor1.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630483834,1630661896,1,NULL,NULL,NULL,NULL,'825'),(835,'49.145.163.238','Jose Baclayon','$2y$08$bLJCpW1lt.2FSuHVbCkII./gRkPuIu90J1RKg3k5eR/AZIMJegyAC',NULL,'doctor2.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630483968,NULL,1,NULL,NULL,NULL,NULL,'825'),(836,'49.145.163.238','Michael Jagdon','$2y$08$pZLLxD714D0ljz9XKFKtT.VxTUM00caYc8UjhuGDHHW8l7rXozcTi',NULL,'patient1.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630484231,NULL,1,NULL,NULL,NULL,NULL,'825'),(837,'49.145.163.238','Ellen Reyes','$2y$08$LjNmcx73fQyVmydOzFuK.uSmUvp8pAh3yQnxnZDD3NkvTBoqgE95u',NULL,'patient2.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630484415,NULL,1,NULL,NULL,NULL,NULL,'825'),(838,'49.145.163.238','Darell Ouano','$2y$08$kFCf8W49DeOVsXEbhArWP.J5zsgrT3bvW4TCpsg7LGbTaLHXiGBg.',NULL,'nurse1.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630484712,NULL,1,NULL,NULL,NULL,NULL,'825'),(839,'49.145.163.238','Zairel Zuniga','$2y$08$BrvKtv69Vsstmbk2rNY5sOy7e1Oju3.NKA.VtfPwg05VxIUo2ZdX2',NULL,'nurse2.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630484807,NULL,1,NULL,NULL,NULL,NULL,'825'),(840,'49.145.163.238','Velma Cruz','$2y$08$rXdhGWGDiDPkWokIQPtD2.xxfwJhstwixizPRxUtMRh0spzt9XT36',NULL,'pharmacist1.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630484876,NULL,1,NULL,NULL,NULL,NULL,'825'),(841,'49.145.163.238','Francisco Diaz','$2y$08$G.KmyDXFT8ITdZIgoNpwxuqIQlHe5gzYUfIz6lm1uSXhMQFEoEG1q',NULL,'pharmacist2.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630484959,NULL,1,NULL,NULL,NULL,NULL,'825'),(842,'49.145.163.238','Evan Castro','$2y$08$e/NP8q2ke9OTZR0wga1lHOx.hRWGxnB8NvtO1FqOILR6Ps8YRuIIK',NULL,'labtechnician1.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630485213,NULL,1,NULL,NULL,NULL,NULL,'825'),(843,'49.145.163.238','Jenny Sabaricos','$2y$08$Wq17dSVzLnrcGdCMlP9iHOlWoMNabhjPbM2QApf7Cf88jiWyLj3s.',NULL,'labtechnician2.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630485375,NULL,1,NULL,NULL,NULL,NULL,'825'),(844,'49.145.163.238','Joy Paredes','$2y$08$31Jqkb.s10Rh.1xaJ/vVoeUYquQuPAWX6SBYz.QbLHLH7hbdS8ouW',NULL,'acct1.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630485503,NULL,1,NULL,NULL,NULL,NULL,'825'),(845,'49.145.163.238','Felex Choi','$2y$08$jg4MO/cjgSNjSMd0MVGUb.oLWhfg4eH.WcMkT8RcHWHxc8ZGGB2yK',NULL,'acct2.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630485643,NULL,1,NULL,NULL,NULL,NULL,'825'),(846,'49.145.163.238','Jessa Ramirez','$2y$08$Sg1Qvo7qhOhmGjTj5NfaeOZNekHZ9YiM8V5q7HQKKk.Hz78mtRNOS',NULL,'receptionist1.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630485721,NULL,1,NULL,NULL,NULL,NULL,'825'),(847,'49.145.163.238','Ria Ponting','$2y$08$xmp4T3mFuUnc/6jSzUEzT.EV/gVZDphkSNGTcE1Cwbgir1cB7OeMi',NULL,'receptionist2.mandaue@mailinator.com',NULL,NULL,NULL,NULL,1630486170,NULL,1,NULL,NULL,NULL,NULL,'825');
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
) ENGINE=InnoDB AUTO_INCREMENT=850 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(765,763,11),(766,764,5),(767,765,4),(769,767,7),(772,770,10),(789,787,3),(791,789,8),(792,790,6),(793,791,5),(794,792,5),(795,793,5),(796,794,5),(797,795,5),(798,796,5),(799,797,5),(800,798,5),(801,799,5),(802,800,5),(803,801,5),(804,802,5),(805,803,5),(806,804,4),(807,805,4),(808,806,6),(809,807,6),(810,808,8),(811,809,8),(812,810,3),(813,811,3),(814,812,10),(815,813,10),(816,814,7),(817,815,7),(818,816,4),(819,817,4),(820,818,4),(821,819,4),(822,820,4),(823,821,4),(824,822,5),(825,823,6),(826,824,5),(827,825,11),(828,826,4),(829,827,4),(830,828,4),(831,829,4),(832,830,4),(833,831,4),(834,832,4),(835,833,4),(836,834,4),(837,835,4),(838,836,5),(839,837,5),(840,838,6),(841,839,6),(842,840,7),(843,841,7),(844,842,8),(845,843,8),(846,844,3),(847,845,3),(848,846,10),(849,847,10);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-04  8:19:35
