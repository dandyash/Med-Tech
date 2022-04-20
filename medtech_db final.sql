-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 08:32 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medtech_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `allergy_master`
--

CREATE TABLE `allergy_master` (
  `allergy_id` int(3) NOT NULL,
  `allergy_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allergy_master`
--

INSERT INTO `allergy_master` (`allergy_id`, `allergy_name`) VALUES
(7, 'Dolo'),
(2, 'paracetamol'),
(1, 'Rashes'),
(4, 'Vomiting');

-- --------------------------------------------------------

--
-- Table structure for table `area_master`
--

CREATE TABLE `area_master` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `area_pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_master`
--

INSERT INTO `area_master` (`area_id`, `area_name`, `area_pincode`) VALUES
(1, 'meghani', 380016),
(4, 'nikol', 382350);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_master`
--

CREATE TABLE `clinic_master` (
  `c_id` int(3) NOT NULL,
  `d_id` int(3) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_addr` varchar(100) NOT NULL,
  `c_mor_time` timestamp NULL DEFAULT NULL,
  `c_noon_time` timestamp NULL DEFAULT NULL,
  `old_case_price` int(11) DEFAULT NULL,
  `new_case_price` int(11) DEFAULT NULL,
  `area_id` int(3) NOT NULL,
  `c_auth_certi` varchar(1000) NOT NULL,
  `c_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_master`
--

INSERT INTO `clinic_master` (`c_id`, `d_id`, `c_name`, `c_addr`, `c_mor_time`, `c_noon_time`, `old_case_price`, `new_case_price`, `area_id`, `c_auth_certi`, `c_rating`) VALUES
(1, 2, 'doc1', 'yuhji', '2020-03-11 03:30:00', '2020-03-11 06:30:00', 500, 100, 4, 'yuhijo', 5),
(2, 3, 'doc2', 'dxfgvbhjnk', '2020-03-11 05:30:00', '2020-03-11 16:30:00', 5200, 1000, 4, 'rdtfgyujik', 3),
(4, 4, 'doc3', 'gvhbn', '2020-03-11 04:30:00', '2020-03-10 23:30:00', 1000, 100, 4, '1', 5),
(5, 9, 'nikol123', 'pplplaza', '2020-03-11 05:30:00', '2020-03-10 23:30:00', 200, 300, 4, '01', 5),
(7, 12, 'doc2', 'tbghn', '2020-03-11 05:30:00', '2020-03-10 23:30:00', 100, 200, 1, 'ybunm', 5),
(8, 2, 'clinic', 'dfghbvfd', '2020-03-10 18:30:09', '2020-03-10 18:30:19', 500, 500, 1, 'grid-img2.png', 5),
(9, 2, 'pllp', 'pllp1', '2020-03-10 19:45:00', '2020-03-10 23:30:00', 500, 500, 4, 'grid-img2.png', 5),
(10, 12, 'fkgbkn', 'bchebhfb', '2020-03-10 19:40:00', '2020-03-11 11:45:00', 500, 100, 1, 'grid-img3.png', 5),
(11, 13, 'pllp', 'pllp', '2020-03-11 04:30:00', '2020-03-11 08:30:00', 500, 200, 4, 'slider-image2.jpg', 5),
(13, 9, 'myclinic', 'mantory', '2020-03-11 04:50:00', '2020-03-11 08:30:00', 500, 100, 4, 'qr.jpg', 5),
(14, 9, 'ALL C', 'ALL C M', '2020-03-10 18:30:09', '2020-03-10 18:30:11', 300, 500, 4, '11111', 5),
(15, 9, 'ccc', 'ccce', '2020-03-11 04:30:00', '2020-03-11 07:30:00', 600, 800, 4, 'Chapter 4ens.pdf', 5);

-- --------------------------------------------------------

--
-- Table structure for table `collector_master`
--

CREATE TABLE `collector_master` (
  `col_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `col_auth` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collector_master`
--

INSERT INTO `collector_master` (`col_id`, `u_id`, `col_auth`) VALUES
(1, 1, 'overview 5 sem.docx');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment_master`
--

CREATE TABLE `doctor_appointment_master` (
  `d_a_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `d_id` int(3) NOT NULL,
  `c_id` int(3) NOT NULL,
  `d_a_date` date NOT NULL,
  `d_app_time` time NOT NULL,
  `u_status` int(50) NOT NULL,
  `d_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_appointment_master`
--

INSERT INTO `doctor_appointment_master` (`d_a_id`, `u_id`, `d_id`, `c_id`, `d_a_date`, `d_app_time`, `u_status`, `d_status`) VALUES
(4, 3, 9, 13, '2020-05-01', '00:00:04', 1, 1),
(5, 3, 9, 14, '2020-03-28', '00:00:09', 1, 1),
(6, 3, 9, 15, '2020-03-17', '00:00:00', 1, 1),
(7, 3, 9, 15, '2020-03-25', '00:00:00', 1, 1),
(8, 3, 9, 15, '2020-03-15', '00:00:00', 1, 1),
(9, 3, 9, 15, '2020-03-23', '00:00:00', 1, 1),
(10, 3, 9, 15, '2020-03-17', '00:00:11', 1, 1),
(11, 3, 9, 15, '2020-03-24', '00:00:12', 1, 1),
(12, 3, 9, 15, '2020-03-31', '00:00:12', 1, 1),
(13, 3, 9, 15, '2020-03-27', '12:30:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_feedback_master`
--

CREATE TABLE `doctor_feedback_master` (
  `d_fdbk_id` int(3) NOT NULL,
  `d_fdbk_title` varchar(50) NOT NULL,
  `u_id` int(3) NOT NULL,
  `d_id` int(3) NOT NULL,
  `d_fdbk_time` datetime NOT NULL,
  `description` varchar(300) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_master`
--

CREATE TABLE `doctor_master` (
  `d_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `speci_id` int(3) NOT NULL,
  `d_lic_no` int(11) NOT NULL,
  `d_certi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_master`
--

INSERT INTO `doctor_master` (`d_id`, `u_id`, `speci_id`, `d_lic_no`, `d_certi`) VALUES
(2, 1, 1, 988995524, 'Project details.doc'),
(3, 2, 1, 1, '10'),
(4, 4, 4, 2, 'kkk'),
(8, 7, 4, 2, 'workspace.xml'),
(9, 8, 4, 1, 'book-appointment.php'),
(10, 3, 3, 2, 'book-appointment.php'),
(11, 3, 2, 2, 'change-password.php'),
(12, 9, 2, 2, 'change-password.php'),
(13, 11, 1, 123456, 'grid-img2.png');

-- --------------------------------------------------------

--
-- Table structure for table `dozage_master`
--

CREATE TABLE `dozage_master` (
  `doz_id` int(50) NOT NULL,
  `doz_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dozage_master`
--

INSERT INTO `dozage_master` (`doz_id`, `doz_time`) VALUES
(1, 'Mor'),
(2, 'Noon'),
(3, 'Night'),
(4, 'Mor-noon'),
(5, 'Mor-night'),
(6, 'Mor-noon-night');

-- --------------------------------------------------------

--
-- Table structure for table `doz_days`
--

CREATE TABLE `doz_days` (
  `ddd_id` int(50) NOT NULL,
  `ddd_d` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doz_days`
--

INSERT INTO `doz_days` (`ddd_id`, `ddd_d`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6');

-- --------------------------------------------------------

--
-- Table structure for table `lab_feedback_master`
--

CREATE TABLE `lab_feedback_master` (
  `l_fdbk_id` int(3) NOT NULL,
  `l_fdbk_title` varchar(50) NOT NULL,
  `u_id` int(3) NOT NULL,
  `lab_id` int(3) NOT NULL,
  `lab_fdbk_time` datetime NOT NULL,
  `description` varchar(500) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_master`
--

CREATE TABLE `lab_master` (
  `lab_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `home_service` tinyint(1) NOT NULL,
  `l_mor_time` time NOT NULL,
  `l_noon_time` time NOT NULL,
  `col_id` int(3) NOT NULL,
  `lab_auth_certi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_master`
--

INSERT INTO `lab_master` (`lab_id`, `u_id`, `home_service`, `l_mor_time`, `l_noon_time`, `col_id`, `lab_auth_certi`) VALUES
(1, 1, 0, '09:00:00', '18:00:00', 1, 'overview 5 sem.docx'),
(2, 23, 0, '11:30:00', '05:00:00', 0, 'exam 3.txt');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_master`
--

CREATE TABLE `medicine_master` (
  `med_id` int(50) NOT NULL,
  `med_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_master`
--

INSERT INTO `medicine_master` (`med_id`, `med_name`) VALUES
(1, 'Med1'),
(2, 'Med2');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_store_master`
--

CREATE TABLE `medicine_store_master` (
  `m_s_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `preci_id` int(3) NOT NULL,
  `m_s_timing` datetime NOT NULL,
  `m_s_lic` varchar(1000) NOT NULL,
  `m_is_verfied` tinyint(1) NOT NULL,
  `m_is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_maaster`
--

CREATE TABLE `package_maaster` (
  `pckge_id` int(3) NOT NULL,
  `pckge_name` varchar(100) NOT NULL,
  `lab_id` int(3) NOT NULL,
  `pckge_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_maaster`
--

INSERT INTO `package_maaster` (`pckge_id`, `pckge_name`, `lab_id`, `pckge_price`) VALUES
(1, 'Full Body', 2, 500);

-- --------------------------------------------------------

--
-- Table structure for table `parent_master`
--

CREATE TABLE `parent_master` (
  `parent_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_master`
--

INSERT INTO `parent_master` (`parent_id`, `u_id`) VALUES
(1, 24),
(2, 24),
(3, 24),
(4, 27);

-- --------------------------------------------------------

--
-- Table structure for table `patient_clinic_history_master`
--

CREATE TABLE `patient_clinic_history_master` (
  `p_c_h_id` int(3) NOT NULL,
  `prec_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_lab_history_master`
--

CREATE TABLE `patient_lab_history_master` (
  `p_l_h_id` int(3) NOT NULL,
  `t_result_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pckge_test_master`
--

CREATE TABLE `pckge_test_master` (
  `p_t_id` int(3) NOT NULL,
  `pckge_id` int(3) NOT NULL,
  `t_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pckge_test_master`
--

INSERT INTO `pckge_test_master` (`p_t_id`, `pckge_id`, `t_id`) VALUES
(1, 1, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_master`
--

CREATE TABLE `prescription_master` (
  `prec_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `d_id` int(3) NOT NULL,
  `c_id` int(3) NOT NULL,
  `d_a_id` int(50) NOT NULL,
  `Prescription` varchar(500) NOT NULL,
  `med_id` int(50) NOT NULL,
  `doz_id` int(50) NOT NULL,
  `ddd_id` int(50) NOT NULL,
  `prec_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_master`
--

INSERT INTO `prescription_master` (`prec_id`, `u_id`, `d_id`, `c_id`, `d_a_id`, `Prescription`, `med_id`, `doz_id`, `ddd_id`, `prec_time`) VALUES
(5, 3, 9, 13, 4, 'om2', 1, 2, 2, '2020-03-08 10:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `remark_master`
--

CREATE TABLE `remark_master` (
  `remark_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `d_id` int(3) NOT NULL,
  `preci_id` int(3) NOT NULL,
  `remark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialization_master`
--

CREATE TABLE `specialization_master` (
  `speci_id` int(3) NOT NULL,
  `speci_name` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization_master`
--

INSERT INTO `specialization_master` (`speci_id`, `speci_name`, `qualification`) VALUES
(1, 'Dentist', 'MDS'),
(2, 'MBBS', 'MDS'),
(3, 'ortho', 'mdd'),
(4, 'Homio', 'mzz');

-- --------------------------------------------------------

--
-- Table structure for table `test_appointment_master`
--

CREATE TABLE `test_appointment_master` (
  `t_a_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `lab_id` int(3) NOT NULL,
  `t_id` int(3) NOT NULL,
  `col_id` int(3) NOT NULL,
  `t_a_date` date NOT NULL,
  `u_status` int(3) NOT NULL,
  `l_status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_appointment_master`
--

INSERT INTO `test_appointment_master` (`t_a_id`, `u_id`, `lab_id`, `t_id`, `col_id`, `t_a_date`, `u_status`, `l_status`) VALUES
(1, 3, 1, 1, 1, '2020-02-11', 1, 1),
(2, 23, 2, 5, 1, '2020-02-18', 1, 1),
(3, 3, 2, 5, 1, '2020-02-29', 1, 1),
(4, 24, 2, 5, 1, '2020-03-03', 1, 0),
(11, 3, 2, 4, 1, '2020-03-25', 1, 1),
(12, 3, 2, 4, 1, '2020-03-25', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_master`
--

CREATE TABLE `test_master` (
  `t_id` int(3) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_type_id` int(3) NOT NULL,
  `lab_id` int(3) NOT NULL,
  `t_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_master`
--

INSERT INTO `test_master` (`t_id`, `t_name`, `t_type_id`, `lab_id`, `t_price`) VALUES
(1, 'Blood 1', 1, 1, 1000),
(2, 'RBC', 1, 1, 200),
(3, 'WBC', 1, 1, 500),
(4, 'RBC2', 1, 2, 100),
(5, 'RBC@3', 1, 2, 500);

-- --------------------------------------------------------

--
-- Table structure for table `test_result_master`
--

CREATE TABLE `test_result_master` (
  `t_result_id` int(3) NOT NULL,
  `t_a_id` int(3) NOT NULL,
  `t_range_age` int(3) NOT NULL,
  `max_range` double NOT NULL,
  `min_range` double NOT NULL,
  `t_result` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_type_master`
--

CREATE TABLE `test_type_master` (
  `t_type_id` int(3) NOT NULL,
  `t_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_type_master`
--

INSERT INTO `test_type_master` (`t_type_id`, `t_type_name`) VALUES
(1, 'Blood');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `u_id` int(3) NOT NULL,
  `u_type_id` int(11) NOT NULL,
  `u_img` varchar(1000) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_gender` varchar(6) DEFAULT NULL,
  `u_birthdate` date DEFAULT NULL,
  `u_addr` varchar(100) NOT NULL,
  `u_phn` bigint(10) NOT NULL,
  `u_bg` varchar(5) DEFAULT NULL,
  `allergy_id` int(11) NOT NULL,
  `u_email` varchar(25) NOT NULL,
  `u_pwd` varchar(50) NOT NULL,
  `area_id` int(11) NOT NULL,
  `u_is_verfied` int(11) NOT NULL,
  `u_is_active` int(11) NOT NULL,
  `u_is_autho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`u_id`, `u_type_id`, `u_img`, `u_name`, `u_gender`, `u_birthdate`, `u_addr`, `u_phn`, `u_bg`, `allergy_id`, `u_email`, `u_pwd`, `area_id`, `u_is_verfied`, `u_is_active`, `u_is_autho`) VALUES
(1, 1, 'image', 'name', 'gn', '0000-00-00', 'address', 0, 'bg', 1, 'email', 'password1', 1, 1, 1, 0),
(2, 1, 'jvnd', 'omd', 'male', '2019-10-02', 'tybun', 1111111111, 'b+', 7, 'omd@demo.com', 'omd123', 4, 1, 1, 0),
(3, 2, 'cvbn', 'omp', 'male', '2019-10-09', 'rdtfgyhu', 1111111111, 'b+', 2, 'omp@gmail.com', 'omp123', 4, 1, 1, 0),
(4, 1, 'forgot-password.php', 'abc Doctor', 'female', '2019-10-22', '11 Complex', 1234567890, 'AB-', 4, 'abcdoc@demo.com', 'abcdoc', 1, 1, 1, 0),
(5, 1, '1', 'pat123', 'female', '2019-10-16', 'asdfghjkl', 1000000000, 'O-', 1, 'pat111@gmail.com', 'pat111', 4, 1, 1, 0),
(6, 1, '1', 'pat222', 'female', '2019-10-13', 'xcgh', 1234567890, 'O+', 1, 'pat222@gmail.com', 'pat222', 4, 1, 1, 0),
(7, 1, 'workspace.xml', 'abcdoc1', 'male', '2019-11-04', 'docw', 1000000000, 'A+', 1, 'abcdoc1@demo.com', 'abcdoc1', 1, 1, 1, 1),
(8, 1, 'change-emaild.php', 'doctordon', 'male', '2001-02-05', 'nikol road', 2147483647, 'A+', 4, 'doctordon@demo.com', 'doctordon', 1, 1, 1, 1),
(9, 1, 'appointment-history.php', 'docit', 'male', '2020-01-15', 'lj', 1000000000, 'A-', 1, 'docit@demo.com', 'docit123', 1, 1, 1, 0),
(11, 1, 'grid-img3.png', 'doctordemo', 'male', '2001-02-22', 'qwertyjkmnbvd', 1234567890, 'A+', 1, 'doctor@gmail.com', 'qwerty', 1, 1, 1, 0),
(23, 4, 'Dashboard.jpg', 'Shree lab', NULL, NULL, 'sp ring road', 8951202312, NULL, 1, 'shree@gmail.com', 'shree123', 1, 1, 1, 1),
(24, 2, '1', 'Jignesh', 'male', '1999-02-03', 'meghani', 9632115681, 'B+', 1, 'jignesh@gmail.com', 'jignesh12', 1, 1, 1, 0),
(25, 2, '1', 'suraj', 'male', '2000-05-14', 'uyytyty', 1234567891, 'O+', 1, 'anupkadiya123@gmail.com', '123456', 4, 1, 1, 0),
(26, 2, '1', 'suraj', 'male', '2000-05-14', 'uyytyty', 1234567891, 'O+', 1, 'anupkadiya123@gmail.com', '123456', 4, 1, 1, 0),
(27, 2, '1', 'Ridham', 'male', '2001-06-13', 'gandhinagar', 9855623585, 'B+', 1, 'ridham@gmail.com', 'ridham123', 4, 1, 1, 0),
(28, 5, '1', 'Hostel Warden ', 'male', '1985-06-10', 'sp road ', 9898996084, 'AB-', 1, 'warden@gmail.com', 'warden123', 1, 1, 1, 1),
(29, 6, '#', 'Demo Parent', 'Male', '2020-02-05', 'rthyjukiloujhygtfrdewsaqwdfgrthyjhmngfdsassdgtfh,', 123456789, 'A+', 4, 'parent@demo.com', 'qwerty', 1, 1, 1, 1),
(30, 1, 'eGeneric side.jpg', 'Dr. Shrey', 'male', '2001-05-16', 'Anjali cross road', 7486523153, 'A+', 7, 'jshrey16@gmail.com', 'shrey123', 4, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

CREATE TABLE `user_type_master` (
  `u_type_id` int(3) NOT NULL,
  `u_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`u_type_id`, `u_type_name`) VALUES
(1, 'Doctor'),
(4, 'Lab'),
(6, 'Parent'),
(2, 'Patient'),
(5, 'Warden');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `allergy_master`
--
ALTER TABLE `allergy_master`
  ADD PRIMARY KEY (`allergy_id`),
  ADD KEY `allergy_name` (`allergy_name`);

--
-- Indexes for table `area_master`
--
ALTER TABLE `area_master`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `area_name` (`area_name`),
  ADD KEY `area_pincode` (`area_pincode`);

--
-- Indexes for table `clinic_master`
--
ALTER TABLE `clinic_master`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `c_mor_time` (`c_mor_time`),
  ADD KEY `c_noon_time` (`c_noon_time`),
  ADD KEY `c_addr` (`c_addr`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `c_auth_certi` (`c_auth_certi`),
  ADD KEY `c_rating` (`c_rating`),
  ADD KEY `old_case_price` (`old_case_price`),
  ADD KEY `new_case_price` (`new_case_price`),
  ADD KEY `c_name` (`c_name`);

--
-- Indexes for table `collector_master`
--
ALTER TABLE `collector_master`
  ADD PRIMARY KEY (`col_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `col_auth` (`col_auth`);

--
-- Indexes for table `doctor_appointment_master`
--
ALTER TABLE `doctor_appointment_master`
  ADD PRIMARY KEY (`d_a_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `d_a_date` (`d_a_date`);

--
-- Indexes for table `doctor_feedback_master`
--
ALTER TABLE `doctor_feedback_master`
  ADD PRIMARY KEY (`d_fdbk_id`),
  ADD KEY `d_fdbk_title` (`d_fdbk_title`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `d_fdbk_time` (`d_fdbk_time`),
  ADD KEY `description` (`description`),
  ADD KEY `d_fdbk_rating` (`rating`) USING BTREE;

--
-- Indexes for table `doctor_master`
--
ALTER TABLE `doctor_master`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `speci_id` (`speci_id`),
  ADD KEY `d_lic_no` (`d_lic_no`),
  ADD KEY `d_certi` (`d_certi`);

--
-- Indexes for table `dozage_master`
--
ALTER TABLE `dozage_master`
  ADD PRIMARY KEY (`doz_id`);

--
-- Indexes for table `doz_days`
--
ALTER TABLE `doz_days`
  ADD PRIMARY KEY (`ddd_id`);

--
-- Indexes for table `lab_feedback_master`
--
ALTER TABLE `lab_feedback_master`
  ADD PRIMARY KEY (`l_fdbk_id`),
  ADD KEY `l_fdbk_title` (`l_fdbk_title`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `lab_id` (`lab_id`),
  ADD KEY `lab_fdbk_time` (`lab_fdbk_time`),
  ADD KEY `description` (`description`),
  ADD KEY `rating` (`rating`);

--
-- Indexes for table `lab_master`
--
ALTER TABLE `lab_master`
  ADD PRIMARY KEY (`lab_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `home_service` (`home_service`),
  ADD KEY `l_mor_time` (`l_mor_time`),
  ADD KEY `l_noon_time` (`l_noon_time`),
  ADD KEY `col_id` (`col_id`),
  ADD KEY `lab_auth_certi` (`lab_auth_certi`);

--
-- Indexes for table `medicine_master`
--
ALTER TABLE `medicine_master`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `medicine_store_master`
--
ALTER TABLE `medicine_store_master`
  ADD PRIMARY KEY (`m_s_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `preci_id` (`preci_id`),
  ADD KEY `m_s_timing` (`m_s_timing`),
  ADD KEY `m_s_lic` (`m_s_lic`),
  ADD KEY `m_is_verfied` (`m_is_verfied`),
  ADD KEY `m_is_active` (`m_is_active`);

--
-- Indexes for table `package_maaster`
--
ALTER TABLE `package_maaster`
  ADD PRIMARY KEY (`pckge_id`),
  ADD KEY `pckge_name` (`pckge_name`),
  ADD KEY `lab_id` (`lab_id`),
  ADD KEY `pckge_price` (`pckge_price`);

--
-- Indexes for table `parent_master`
--
ALTER TABLE `parent_master`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `patient_clinic_history_master`
--
ALTER TABLE `patient_clinic_history_master`
  ADD PRIMARY KEY (`p_c_h_id`),
  ADD KEY `prec_id` (`prec_id`);

--
-- Indexes for table `patient_lab_history_master`
--
ALTER TABLE `patient_lab_history_master`
  ADD PRIMARY KEY (`p_l_h_id`),
  ADD KEY `t_result_id` (`t_result_id`);

--
-- Indexes for table `pckge_test_master`
--
ALTER TABLE `pckge_test_master`
  ADD PRIMARY KEY (`p_t_id`),
  ADD KEY `pckge_id` (`pckge_id`),
  ADD KEY `test_id` (`t_id`);

--
-- Indexes for table `prescription_master`
--
ALTER TABLE `prescription_master`
  ADD PRIMARY KEY (`prec_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `Prescription` (`Prescription`),
  ADD KEY `med_id` (`med_id`),
  ADD KEY `doz_id` (`doz_id`),
  ADD KEY `ddd_id` (`ddd_id`),
  ADD KEY `d_a_id` (`d_a_id`);

--
-- Indexes for table `remark_master`
--
ALTER TABLE `remark_master`
  ADD PRIMARY KEY (`remark_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `preci_id` (`preci_id`),
  ADD KEY `remark` (`remark`);

--
-- Indexes for table `specialization_master`
--
ALTER TABLE `specialization_master`
  ADD PRIMARY KEY (`speci_id`),
  ADD KEY `speci_name` (`speci_name`),
  ADD KEY `qualification` (`qualification`);

--
-- Indexes for table `test_appointment_master`
--
ALTER TABLE `test_appointment_master`
  ADD PRIMARY KEY (`t_a_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `lab_id` (`lab_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `col_id` (`col_id`),
  ADD KEY `t_a_date` (`t_a_date`),
  ADD KEY `u_status` (`u_status`),
  ADD KEY `l_status` (`l_status`);

--
-- Indexes for table `test_master`
--
ALTER TABLE `test_master`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_name` (`t_name`),
  ADD KEY `t_type_id` (`t_type_id`),
  ADD KEY `lab_id` (`lab_id`),
  ADD KEY `t_price` (`t_price`);

--
-- Indexes for table `test_result_master`
--
ALTER TABLE `test_result_master`
  ADD PRIMARY KEY (`t_result_id`),
  ADD KEY `t_a_id` (`t_a_id`),
  ADD KEY `t_result` (`t_result`),
  ADD KEY `t_range_age` (`t_range_age`),
  ADD KEY `max_range` (`max_range`),
  ADD KEY `min_range` (`min_range`);

--
-- Indexes for table `test_type_master`
--
ALTER TABLE `test_type_master`
  ADD PRIMARY KEY (`t_type_id`),
  ADD KEY `t_type_name` (`t_type_name`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_type_id` (`u_type_id`),
  ADD KEY `u_img` (`u_img`),
  ADD KEY `u_name` (`u_name`),
  ADD KEY `u_gender` (`u_gender`),
  ADD KEY `u_birthdate` (`u_birthdate`),
  ADD KEY `u_addr` (`u_addr`),
  ADD KEY `u_phn` (`u_phn`),
  ADD KEY `u_bg` (`u_bg`),
  ADD KEY `allergy_id` (`allergy_id`),
  ADD KEY `u_email` (`u_email`),
  ADD KEY `u_pwd` (`u_pwd`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `u_is_verfied` (`u_is_verfied`),
  ADD KEY `u_is_active` (`u_is_active`),
  ADD KEY `u_is_autho` (`u_is_autho`);

--
-- Indexes for table `user_type_master`
--
ALTER TABLE `user_type_master`
  ADD PRIMARY KEY (`u_type_id`),
  ADD KEY `u_type_name` (`u_type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allergy_master`
--
ALTER TABLE `allergy_master`
  MODIFY `allergy_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `area_master`
--
ALTER TABLE `area_master`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clinic_master`
--
ALTER TABLE `clinic_master`
  MODIFY `c_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `collector_master`
--
ALTER TABLE `collector_master`
  MODIFY `col_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_appointment_master`
--
ALTER TABLE `doctor_appointment_master`
  MODIFY `d_a_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor_feedback_master`
--
ALTER TABLE `doctor_feedback_master`
  MODIFY `d_fdbk_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_master`
--
ALTER TABLE `doctor_master`
  MODIFY `d_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dozage_master`
--
ALTER TABLE `dozage_master`
  MODIFY `doz_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doz_days`
--
ALTER TABLE `doz_days`
  MODIFY `ddd_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lab_feedback_master`
--
ALTER TABLE `lab_feedback_master`
  MODIFY `l_fdbk_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_master`
--
ALTER TABLE `lab_master`
  MODIFY `lab_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_master`
--
ALTER TABLE `medicine_master`
  MODIFY `med_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_store_master`
--
ALTER TABLE `medicine_store_master`
  MODIFY `m_s_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_maaster`
--
ALTER TABLE `package_maaster`
  MODIFY `pckge_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent_master`
--
ALTER TABLE `parent_master`
  MODIFY `parent_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_clinic_history_master`
--
ALTER TABLE `patient_clinic_history_master`
  MODIFY `p_c_h_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_lab_history_master`
--
ALTER TABLE `patient_lab_history_master`
  MODIFY `p_l_h_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pckge_test_master`
--
ALTER TABLE `pckge_test_master`
  MODIFY `p_t_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription_master`
--
ALTER TABLE `prescription_master`
  MODIFY `prec_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `remark_master`
--
ALTER TABLE `remark_master`
  MODIFY `remark_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialization_master`
--
ALTER TABLE `specialization_master`
  MODIFY `speci_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_appointment_master`
--
ALTER TABLE `test_appointment_master`
  MODIFY `t_a_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test_master`
--
ALTER TABLE `test_master`
  MODIFY `t_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test_result_master`
--
ALTER TABLE `test_result_master`
  MODIFY `t_result_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_type_master`
--
ALTER TABLE `test_type_master`
  MODIFY `t_type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `u_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_type_master`
--
ALTER TABLE `user_type_master`
  MODIFY `u_type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinic_master`
--
ALTER TABLE `clinic_master`
  ADD CONSTRAINT `clinic_master_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor_master` (`d_id`),
  ADD CONSTRAINT `clinic_master_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area_master` (`area_id`);

--
-- Constraints for table `collector_master`
--
ALTER TABLE `collector_master`
  ADD CONSTRAINT `collector_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`);

--
-- Constraints for table `doctor_appointment_master`
--
ALTER TABLE `doctor_appointment_master`
  ADD CONSTRAINT `doctor_appointment_master_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor_master` (`d_id`),
  ADD CONSTRAINT `doctor_appointment_master_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`),
  ADD CONSTRAINT `doctor_appointment_master_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `clinic_master` (`c_id`);

--
-- Constraints for table `doctor_feedback_master`
--
ALTER TABLE `doctor_feedback_master`
  ADD CONSTRAINT `doctor_feedback_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`),
  ADD CONSTRAINT `doctor_feedback_master_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctor_master` (`d_id`);

--
-- Constraints for table `doctor_master`
--
ALTER TABLE `doctor_master`
  ADD CONSTRAINT `doctor_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`),
  ADD CONSTRAINT `doctor_master_ibfk_2` FOREIGN KEY (`speci_id`) REFERENCES `specialization_master` (`speci_id`);

--
-- Constraints for table `lab_feedback_master`
--
ALTER TABLE `lab_feedback_master`
  ADD CONSTRAINT `lab_feedback_master_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `lab_master` (`lab_id`),
  ADD CONSTRAINT `lab_feedback_master_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`);

--
-- Constraints for table `lab_master`
--
ALTER TABLE `lab_master`
  ADD CONSTRAINT `lab_master_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`);

--
-- Constraints for table `medicine_store_master`
--
ALTER TABLE `medicine_store_master`
  ADD CONSTRAINT `medicine_store_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`),
  ADD CONSTRAINT `medicine_store_master_ibfk_2` FOREIGN KEY (`preci_id`) REFERENCES `prescription_master` (`prec_id`);

--
-- Constraints for table `package_maaster`
--
ALTER TABLE `package_maaster`
  ADD CONSTRAINT `package_maaster_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `lab_master` (`lab_id`);

--
-- Constraints for table `parent_master`
--
ALTER TABLE `parent_master`
  ADD CONSTRAINT `parent_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`);

--
-- Constraints for table `patient_clinic_history_master`
--
ALTER TABLE `patient_clinic_history_master`
  ADD CONSTRAINT `patient_clinic_history_master_ibfk_1` FOREIGN KEY (`prec_id`) REFERENCES `prescription_master` (`prec_id`);

--
-- Constraints for table `patient_lab_history_master`
--
ALTER TABLE `patient_lab_history_master`
  ADD CONSTRAINT `patient_lab_history_master_ibfk_1` FOREIGN KEY (`t_result_id`) REFERENCES `test_result_master` (`t_result_id`);

--
-- Constraints for table `pckge_test_master`
--
ALTER TABLE `pckge_test_master`
  ADD CONSTRAINT `pckge_test_master_ibfk_1` FOREIGN KEY (`pckge_id`) REFERENCES `package_maaster` (`pckge_id`),
  ADD CONSTRAINT `pckge_test_master_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `test_master` (`t_id`);

--
-- Constraints for table `prescription_master`
--
ALTER TABLE `prescription_master`
  ADD CONSTRAINT `prescription_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`),
  ADD CONSTRAINT `prescription_master_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctor_master` (`d_id`),
  ADD CONSTRAINT `prescription_master_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `clinic_master` (`c_id`);

--
-- Constraints for table `remark_master`
--
ALTER TABLE `remark_master`
  ADD CONSTRAINT `remark_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`),
  ADD CONSTRAINT `remark_master_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctor_master` (`d_id`),
  ADD CONSTRAINT `remark_master_ibfk_3` FOREIGN KEY (`preci_id`) REFERENCES `prescription_master` (`prec_id`);

--
-- Constraints for table `test_appointment_master`
--
ALTER TABLE `test_appointment_master`
  ADD CONSTRAINT `test_appointment_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`),
  ADD CONSTRAINT `test_appointment_master_ibfk_2` FOREIGN KEY (`lab_id`) REFERENCES `lab_master` (`lab_id`),
  ADD CONSTRAINT `test_appointment_master_ibfk_3` FOREIGN KEY (`col_id`) REFERENCES `collector_master` (`col_id`),
  ADD CONSTRAINT `test_appointment_master_ibfk_4` FOREIGN KEY (`t_id`) REFERENCES `test_master` (`t_id`);

--
-- Constraints for table `test_master`
--
ALTER TABLE `test_master`
  ADD CONSTRAINT `test_master_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `lab_master` (`lab_id`),
  ADD CONSTRAINT `test_master_ibfk_2` FOREIGN KEY (`t_type_id`) REFERENCES `test_type_master` (`t_type_id`);

--
-- Constraints for table `test_result_master`
--
ALTER TABLE `test_result_master`
  ADD CONSTRAINT `test_result_master_ibfk_1` FOREIGN KEY (`t_a_id`) REFERENCES `test_appointment_master` (`t_a_id`);

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_master_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area_master` (`area_id`),
  ADD CONSTRAINT `user_master_ibfk_3` FOREIGN KEY (`allergy_id`) REFERENCES `allergy_master` (`allergy_id`),
  ADD CONSTRAINT `user_master_ibfk_4` FOREIGN KEY (`u_type_id`) REFERENCES `user_type_master` (`u_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
