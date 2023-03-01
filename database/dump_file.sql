-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: atm
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_balance` int DEFAULT NULL,
  `user_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nemanja94#','5712','Nemanja Damjanovic',1000000,'Active'),(3,'Milorad97@','1603','Milorad Damjanovic',1000000,'Active'),(4,'Vlada72#','1234','Vladan Damjanovic',0,'Active'),(5,'Joca666#','1234','Jovan Zlatkovic',10000,'Active'),(6,'Jelic3#','0789','Stefan Jelic',10000,'Active'),(7,'Mina74@','1234','Michaela Micic',10000,'Active'),(8,'Misa2$','1234','Miodrag Ivanovic',10000,'Active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraw_history`
--

DROP TABLE IF EXISTS `withdraw_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdraw_history` (
  `user_id` varchar(255) NOT NULL,
  `user_last_transaction` int NOT NULL,
  `transaction_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdraw_history`
--

LOCK TABLES `withdraw_history` WRITE;
/*!40000 ALTER TABLE `withdraw_history` DISABLE KEYS */;
INSERT INTO `withdraw_history` VALUES ('',5000,'2023-03-01 11:25:06.000000'),('Milorad97@',5000,'2023-03-01 11:31:18.000000'),('Milorad97@',500,'2023-03-01 11:31:21.000000'),('Milorad97@',5000,'2023-03-01 11:31:24.000000'),('Milorad97@',5000,'2023-03-01 11:32:32.000000'),('Milorad97@',12000,'2023-03-01 11:32:37.000000'),('Vlada72#',5000,'2023-03-01 11:35:48.000000'),('Vlada72#',5000,'2023-03-01 14:28:26.000000'),('Vlada72#',5000,'2023-03-01 14:31:55.000000'),('Vlada72#',5000,'2023-03-01 14:31:58.000000'),('Vlada72#',5000,'2023-03-01 14:41:45.000000'),('Vlada72#',5000,'2023-03-01 14:41:48.000000'),('Vlada72#',5000,'2023-03-01 14:41:53.000000'),('Vlada72#',5000,'2023-03-01 14:41:56.000000'),('Vlada72#',5000,'2023-03-01 14:44:30.000000'),('Vlada72#',5000,'2023-03-01 14:44:32.000000'),('Vlada72#',5000,'2023-03-01 14:45:21.000000'),('Vlada72#',5000,'2023-03-01 14:46:37.000000'),('Vlada72#',5000,'2023-03-01 14:46:42.000000'),('Vlada72#',20000,'2023-03-01 14:47:40.000000'),('Vlada72#',20000,'2023-03-01 14:47:45.000000'),('Vlada72#',5000,'2023-03-01 14:49:00.000000'),('Vlada72#',1049000,'2023-03-01 14:49:39.000000'),('Vlada72#',1049000,'2023-03-01 14:57:35.000000'),('Vlada72#',5000,'2023-03-01 14:57:48.000000'),('Vlada72#',5000,'2023-03-01 14:57:52.000000'),('Vlada72#',5000,'2023-03-01 14:58:18.000000'),('Vlada72#',5000,'2023-03-01 15:01:27.000000'),('Vlada72#',5000,'2023-03-01 15:01:32.000000'),('Vlada72#',5000,'2023-03-01 15:02:47.000000'),('Vlada72#',5000,'2023-03-01 15:02:54.000000'),('Vlada72#',5000,'2023-03-01 15:03:05.000000'),('Vlada72#',5000,'2023-03-01 15:03:10.000000'),('Vlada72#',5000,'2023-03-01 15:04:50.000000'),('Vlada72#',5000,'2023-03-01 15:04:55.000000'),('Vlada72#',5000,'2023-03-01 15:05:01.000000'),('Vlada72#',20000,'2023-03-01 15:08:43.000000'),('Vlada72#',50000,'2023-03-01 15:09:07.000000'),('Vlada72#',60000,'2023-03-01 15:09:28.000000'),('Vlada72#',5000,'2023-03-01 15:10:30.000000'),('Vlada72#',5000,'2023-03-01 15:10:38.000000'),('Vlada72#',60000,'2023-03-01 15:10:42.000000'),('Vlada72#',5000,'2023-03-01 15:11:33.000000'),('Vlada72#',25000,'2023-03-01 15:11:38.000000'),('Vlada72#',50,'2023-03-01 15:13:37.000000'),('Vlada72#',100,'2023-03-01 15:13:40.000000'),('Vlada72#',200,'2023-03-01 15:13:58.000000'),('Vlada72#',12,'2023-03-01 15:17:30.000000'),('Vlada72#',5,'2023-03-01 15:19:34.000000'),('Vlada72#',95,'2023-03-01 15:20:07.000000'),('Vlada72#',100,'2023-03-01 15:20:35.000000');
/*!40000 ALTER TABLE `withdraw_history` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-01 17:25:12
