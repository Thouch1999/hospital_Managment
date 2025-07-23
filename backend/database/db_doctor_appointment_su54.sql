/*
 Navicat Premium Data Transfer

 Source Server         : DATA-SERVICE
 Source Server Type    : MySQL
 Source Server Version : 80200
 Source Host           : localhost:3306
 Source Schema         : db_doctor_appointment_su54

 Target Server Type    : MySQL
 Target Server Version : 80200
 File Encoding         : 65001

 Date: 23/07/2025 13:49:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dpa_appointment
-- ----------------------------
DROP TABLE IF EXISTS `dpa_appointment`;
CREATE TABLE `dpa_appointment`  (
  `appointment_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int UNSIGNED NOT NULL,
  `doctor_id` int UNSIGNED NOT NULL,
  `hospital_id` int UNSIGNED NOT NULL,
  `creation_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`appointment_id`) USING BTREE,
  INDEX `doctor_id`(`doctor_id` ASC) USING BTREE,
  INDEX `hospital_id`(`hospital_id` ASC) USING BTREE,
  INDEX `patient_id`(`patient_id` ASC) USING BTREE,
  CONSTRAINT `dpa_appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `dpa_doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dpa_appointment_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `dpa_hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dpa_appointment_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `dpa_patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_appointment
-- ----------------------------

-- ----------------------------
-- Table structure for dpa_blood_type
-- ----------------------------
DROP TABLE IF EXISTS `dpa_blood_type`;
CREATE TABLE `dpa_blood_type`  (
  `blood_type_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `blood_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`blood_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_blood_type
-- ----------------------------
INSERT INTO `dpa_blood_type` VALUES (1, 'A+');
INSERT INTO `dpa_blood_type` VALUES (2, 'O-');
INSERT INTO `dpa_blood_type` VALUES (3, 'B+');
INSERT INTO `dpa_blood_type` VALUES (4, 'AB-');
INSERT INTO `dpa_blood_type` VALUES (5, 'O+');

-- ----------------------------
-- Table structure for dpa_doctor
-- ----------------------------
DROP TABLE IF EXISTS `dpa_doctor`;
CREATE TABLE `dpa_doctor`  (
  `doctor_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doctor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `doctor_dob` date NULL DEFAULT NULL,
  `doctor_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doctor_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doctor_profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `doctor_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doctor_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender_id` int UNSIGNED NOT NULL,
  `doctor_status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1' COMMENT '1:Active, 0:Inactive',
  `service_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`doctor_id`) USING BTREE,
  INDEX `gender_id`(`gender_id` ASC) USING BTREE,
  INDEX `service_id`(`service_id` ASC) USING BTREE,
  CONSTRAINT `dpa_doctor_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `dpa_gender` (`gender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dpa_doctor_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `dpa_service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_doctor
-- ----------------------------
INSERT INTO `dpa_doctor` VALUES (4, 'DR-65216351', 'Dr.resoun', '2000-11-30', '0998877655', 'totochh9@mail.com', 'pediatrician at National Pediatric Hospital, Toul Kork.', 'Screenshot 2024-09-08 135313.png', '#45, Street 310, Boeung Keng Kang I, Chamkarmon, Phnom Penh', 2, '0', 2);
INSERT INTO `dpa_doctor` VALUES (8, 'DR-03431081', 'Dr.serey', '1970-01-01', '088845453', 'totochh9@mail.com', 'Profile AA', 'doctors-1.jpg', '#45, Street 310, Boeung Keng Kang', 1, '1', 6);
INSERT INTO `dpa_doctor` VALUES (9, 'DR-38738731', 'Dr. Malis Kim', '2025-10-05', '0998877655', 'makra34@gmail.com', 'Profile TT', 'doctors-2.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 1, '1', 2);
INSERT INTO `dpa_doctor` VALUES (10, 'DR-71954717', 'Dr.sereyr', '1970-01-01', '0998877655', 'makra341@gmail.com', 'efarefgersgers', 'doctor-thumb-09.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 2, '0', 1);
INSERT INTO `dpa_doctor` VALUES (11, 'DR-36961570', 'Dr.Sokspat', '1970-01-01', '0998877655', 'sokha@gmail.com', 'Profile www', 'doctor-thumb-06.jpg', '#45, Street 310, Boeung Keng Kang I, Chamkarmon, Phnom Penh', 2, '', 4);
INSERT INTO `dpa_doctor` VALUES (12, 'DR-98926287', 'Dr. Sophat Chhay', '1970-01-01', '012345678', 'sophat.chhay@example.com', 'om	Cardiologist with 10+ years exp.', 'doctors-3.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 1, '1', 2);
INSERT INTO `dpa_doctor` VALUES (13, 'DR-45116318', 'Dr.resoun', '2025-01-05', '0998877655', 'totochh9@mail.com', 'tyyyt5tet', 'patient-thumb-02.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 1, '0', 2);
INSERT INTO `dpa_doctor` VALUES (14, 'DR-79973222', 'Dr.resoun', '1970-01-01', '0998877655', 'sokha@gmail.com', 'fdhsjfgd', 'Screenshot 2025-01-24 111555.png', 'No. 123, Street 456, Sangkat Toul Tompoung', 1, '0', 2);
INSERT INTO `dpa_doctor` VALUES (15, 'DR-03829073', 'Dr.resoun', '2025-06-05', '78769', 'makra34@gmail.com', 'testes', '06bf4007c82d4d8ba587e1d670b86d3f.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 2, '0', 1);
INSERT INTO `dpa_doctor` VALUES (16, 'DR-36641689', 'Dr.sok', '1970-01-01', '0998877655', 'totochh9@mail.com', 'Profile1', '97d6a237f57a4ae9a464fd9c80767317.jpg', '#45, Street 310, Boeung Keng Kang I, Chamkarmon, Phnom Penh', 1, '0', 2);
INSERT INTO `dpa_doctor` VALUES (17, 'DR-61669683', 'Dr.resoun', '1970-01-01', '0998877655', 'makra34@gmail.com', 'tydkdt', 'doctors-4.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 2, '1', 4);
INSERT INTO `dpa_doctor` VALUES (18, 'DR-62142002', 'Dr. Chenda Sun', '1970-01-01', '0998877655', 'makra34@gmail.com', 'r32', 'doctors-1.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 1, '0', 2);
INSERT INTO `dpa_doctor` VALUES (19, 'DR-93556402', 'Dr.sereyr', '1970-01-01', '0998877655', 'makra34@gmail.com', 'yugyu', 'doctors-1.jpg', 'No. 123, Street 456, Sangkat Toul Tompoung', 1, '0', 2);
INSERT INTO `dpa_doctor` VALUES (20, 'DR-92309815', 'Dr. Malis Kim', '1970-01-01', '0998877655', 'totochh9@mail.com', 'ferf', 'f2.jpg', '#45, Street 310, Boeung Keng Kang I, Chamkarmon, Phnom Penh', 1, '0', 2);

-- ----------------------------
-- Table structure for dpa_doctor_schedule
-- ----------------------------
DROP TABLE IF EXISTS `dpa_doctor_schedule`;
CREATE TABLE `dpa_doctor_schedule`  (
  `doctor_id` int UNSIGNED NOT NULL,
  `schedule_id` int UNSIGNED NOT NULL,
  INDEX `doctor_id`(`doctor_id` ASC) USING BTREE,
  INDEX `schedule_id`(`schedule_id` ASC) USING BTREE,
  CONSTRAINT `dpa_doctor_schedule_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `dpa_doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dpa_doctor_schedule_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `dpa_schedule` (`schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_doctor_schedule
-- ----------------------------

-- ----------------------------
-- Table structure for dpa_gender
-- ----------------------------
DROP TABLE IF EXISTS `dpa_gender`;
CREATE TABLE `dpa_gender`  (
  `gender_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `gender_name` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`gender_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_gender
-- ----------------------------
INSERT INTO `dpa_gender` VALUES (1, 'Male');
INSERT INTO `dpa_gender` VALUES (2, 'Female');

-- ----------------------------
-- Table structure for dpa_hospital
-- ----------------------------
DROP TABLE IF EXISTS `dpa_hospital`;
CREATE TABLE `dpa_hospital`  (
  `hospital_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `floor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `room_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hospital_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`hospital_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_hospital
-- ----------------------------
INSERT INTO `dpa_hospital` VALUES (1, 'Hu Zitao', '9X8yWCkqCy', 'Hu Zitao', 'FbBNhp3yDN');
INSERT INTO `dpa_hospital` VALUES (2, 'Hsuan Ho Yin', 'sLrMV13NWn', 'Hsuan Ho Yin', 'xNaQ2wHK7H');
INSERT INTO `dpa_hospital` VALUES (3, 'Tamura Aoshi', 'ITuASvMUIi', 'Tamura Aoshi', '2rqXIyv8bu');
INSERT INTO `dpa_hospital` VALUES (4, 'Su Lu', 'C0v5rF2pPg', 'Su Lu', 'FQmWhBoINg');
INSERT INTO `dpa_hospital` VALUES (5, 'Kelly Rogers', '5cDxJ5kMz9', 'Kelly Rogers', 'NCjaOULNuf');

-- ----------------------------
-- Table structure for dpa_nationality
-- ----------------------------
DROP TABLE IF EXISTS `dpa_nationality`;
CREATE TABLE `dpa_nationality`  (
  `nationality_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nationality_name_kh` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nationality_name_en` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nationality_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_nationality
-- ----------------------------
INSERT INTO `dpa_nationality` VALUES (1, 'ខ្មែរ', 'Khmer');
INSERT INTO `dpa_nationality` VALUES (2, 'ថៃ', 'Thai');
INSERT INTO `dpa_nationality` VALUES (3, 'ចិន', 'Chinese');

-- ----------------------------
-- Table structure for dpa_patient
-- ----------------------------
DROP TABLE IF EXISTS `dpa_patient`;
CREATE TABLE `dpa_patient`  (
  `patient_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `patient_dob` date NULL DEFAULT NULL,
  `age` int NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `nationality_id` int UNSIGNED NOT NULL,
  `blood_type_id` int UNSIGNED NOT NULL,
  `gender_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`patient_id`) USING BTREE,
  INDEX `nationality_id`(`nationality_id` ASC) USING BTREE,
  INDEX `blood_type_id`(`blood_type_id` ASC) USING BTREE,
  INDEX `gender_id`(`gender_id` ASC) USING BTREE,
  CONSTRAINT `dpa_patient_ibfk_1` FOREIGN KEY (`nationality_id`) REFERENCES `dpa_nationality` (`nationality_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dpa_patient_ibfk_2` FOREIGN KEY (`blood_type_id`) REFERENCES `dpa_blood_type` (`blood_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_patient
-- ----------------------------

-- ----------------------------
-- Table structure for dpa_schedule
-- ----------------------------
DROP TABLE IF EXISTS `dpa_schedule`;
CREATE TABLE `dpa_schedule`  (
  `schedule_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `schedule_day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `schedule_date` date NULL DEFAULT NULL,
  `start_time` time NULL DEFAULT NULL,
  `end_time` time NULL DEFAULT NULL,
  PRIMARY KEY (`schedule_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_schedule
-- ----------------------------
INSERT INTO `dpa_schedule` VALUES (1, 'Monday', '2025-05-07', '08:49:43', '16:50:02');
INSERT INTO `dpa_schedule` VALUES (2, 'Tuesday', '2025-05-08', '08:00:00', '16:51:05');
INSERT INTO `dpa_schedule` VALUES (3, 'Wednesdayq', '2025-05-14', '15:53:13', '15:53:15');

-- ----------------------------
-- Table structure for dpa_service
-- ----------------------------
DROP TABLE IF EXISTS `dpa_service`;
CREATE TABLE `dpa_service`  (
  `service_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `service_name_kh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dpa_service
-- ----------------------------
INSERT INTO `dpa_service` VALUES (1, 'Dermatology', 'ផ្នែកជម្ងឺស្បែក');
INSERT INTO `dpa_service` VALUES (2, 'Gynecology', 'ផ្នែកជម្ងឺស្រ្តី');
INSERT INTO `dpa_service` VALUES (3, 'Gastroenterology', 'ផ្នែកជម្ងឺក្រពះនិងពោះវៀន');
INSERT INTO `dpa_service` VALUES (4, 'Obstetrics', 'ផ្នែកពិនិត្យថែទាំគភ៍');
INSERT INTO `dpa_service` VALUES (5, 'Pumonary', 'ផ្នែកជម្ងឺសួត');
INSERT INTO `dpa_service` VALUES (6, 'Ophtalmology', 'ផ្នែកជម្ងឺភ្នែក');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `role_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'admin');
INSERT INTO `role` VALUES (2, 'user');
INSERT INTO `role` VALUES (3, 'employee');
INSERT INTO `role` VALUES (4, 'doctor');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  `role_id` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `role_id`(`role_id` ASC) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin1', '81dc9bdb52d04dc20036dbd8313ed055', '077424634', 'totochh9@gmail.com', '1', 1);
INSERT INTO `user` VALUES (2, 'serey', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, '1', 4);
INSERT INTO `user` VALUES (3, 'sokk', '827ccb0eea8a706c4c34a16891f84e7b', '0987654', 'sok@gmail.com', '1', 1);
INSERT INTO `user` VALUES (4, 'sak', 'b59c67bf196a4758191e42f76670ceba', '0987654', 'sak@gmail.com', '1', 4);

SET FOREIGN_KEY_CHECKS = 1;
