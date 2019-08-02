-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 02:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahal`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon_fee`
--

CREATE TABLE `addon_fee` (
  `id` int(11) NOT NULL,
  `addon_fee_name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `addon_fee_amount` int(11) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addon_fee`
--

INSERT INTO `addon_fee` (`id`, `addon_fee_name`, `details`, `addon_fee_amount`, `committee_year`, `updated_date`) VALUES
(1, 'Marriage Certificate', 'Marriage certificate fee details', 50, '2019-2020', '2019-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `addon_fee_received`
--

CREATE TABLE `addon_fee_received` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `addon_fee_received_name` varchar(255) NOT NULL,
  `addon_fee_received_amount` int(11) NOT NULL,
  `rec_no` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addon_fee_received`
--

INSERT INTO `addon_fee_received` (`id`, `memb_id`, `first_name`, `member_id`, `addon_fee_received_name`, `addon_fee_received_amount`, `rec_no`, `rec_date`, `committee_year`, `updated_date`) VALUES
(1, '4', 'Musthafa MA', 'musthafama84', 'Marriage Certificate', 50, 3, '2019-07-08', '2019-2020', '2019-07-08 06:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `adm_name` varchar(255) NOT NULL,
  `adm_desig` varchar(255) NOT NULL,
  `adm_loc` varchar(255) NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `memb_since` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_photo_name` varchar(255) NOT NULL,
  `adm_photo_path` varchar(255) NOT NULL,
  `adm_photo_type` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adm_members_fee`
--

CREATE TABLE `adm_members_fee` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_members`
--

CREATE TABLE `ad_members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `log_pas` varchar(255) NOT NULL,
  `user_access` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_members`
--

INSERT INTO `ad_members` (`id`, `username`, `log_pas`, `user_access`, `academic_year`) VALUES
(3, 'musthu', 'musthu', 'admin', '2019-2020'),
(4, 'digitalcoorg', 'digitalcoorg', 'swalath_committee', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_date` date NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `first_name`, `member_id`, `subject`, `message`, `sent_date`, `message_time`, `committee_year`) VALUES
(1, 'musthafa', '12345', 'à²µà²¿à²·à²¯', 'à²¨à²¨à²—à³† à²¨à²¾à²¨à³ à²ªà³à²¯à²¾à²®à²¾à²¨ à²ªà²¤à³à²° à²¨à²¾à²¨à³', '2019-07-16', '2019-07-16 11:09:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `att_date` date DEFAULT NULL,
  `academic_year` varchar(255) NOT NULL,
  `taken_by` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `att_count` int(11) NOT NULL,
  `tot_class` int(11) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit`
--

CREATE TABLE `bank_deposit` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `dep_date` date NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_det`
--

CREATE TABLE `bank_det` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `acc_hold` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_withdraw`
--

CREATE TABLE `bank_withdraw` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `towards` varchar(255) NOT NULL,
  `withdraw_date` date NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `shelf_no` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `no_books` int(11) NOT NULL,
  `ad_date` date NOT NULL,
  `spons` varchar(255) NOT NULL,
  `tot_books` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_status`
--

CREATE TABLE `certificate_status` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `certi_id` varchar(255) NOT NULL,
  `status_send_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `committee_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `committee_name`, `first_name`, `member_id`, `mobile`, `designation`, `committee_year`, `added_date`, `updated_date`) VALUES
(2, 'Main Jamaath Committee', 'Musthafa MA', 'musthafama84', '8277021524', 'vise president', '2019-2020', '2019-07-09', '2019-07-09'),
(3, 'Main Jamaath Committee', 'Musthafa', '12345', '8277021524', 'secretary', '2019-2020', '2019-07-22', '2019-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `committee_name`
--

CREATE TABLE `committee_name` (
  `id` int(11) NOT NULL,
  `committee_name` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_name`
--

INSERT INTO `committee_name` (`id`, `committee_name`, `committee_year`, `added_date`, `updated_date`) VALUES
(1, 'Main Jamaath Committee', '2018-2019', '2018-07-20', '2018-07-21'),
(2, 'Majlissunnoor', '2018-2019', '2018-08-05', '2018-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `contact_mahal`
--

CREATE TABLE `contact_mahal` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_date` date NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `non_name` varchar(255) NOT NULL,
  `non_location` varchar(255) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `don_amount` int(11) NOT NULL,
  `don_towards` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `memb_id`, `first_name`, `member_id`, `non_name`, `non_location`, `rec_date`, `rec_no`, `don_amount`, `don_towards`, `mobile`, `updated_date`, `committee_year`) VALUES
(1, '', 'Musthafa MA', 'musthafama84', '', '', '2019-07-08', '54', 300, 'meelad', '8277021524', '2019-07-08 06:03:53', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `evt_name` varchar(255) NOT NULL,
  `evt_date` date NOT NULL,
  `evt_time` time NOT NULL,
  `evt_details` text NOT NULL,
  `evt_mob` varchar(255) NOT NULL,
  `evt_venue` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `evt_name`, `evt_date`, `evt_time`, `evt_details`, `evt_mob`, `evt_venue`, `committee_year`) VALUES
(1, 'asmaahul husna ratheeb function', '2019-07-18', '20:30:00', 'aklsfjlkj', '6556465465', 'masjid', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `towards` varchar(255) NOT NULL,
  `exp_date` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_updated` date NOT NULL,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_name`
--

CREATE TABLE `expense_name` (
  `id` int(11) NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_name`
--

INSERT INTO `expense_name` (`id`, `expense_name`, `committee_year`, `added_date`, `updated_date`) VALUES
(1, 'Current Bill', '2018-2019', '2018-07-24', '2018-07-24'),
(2, 'Staff Salary', '2018-2019', '2018-07-24', '2018-07-24'),
(3, 'swalath committee expense', '2019-2020', '2019-07-21', '2019-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(100) NOT NULL,
  `fac_fname` text NOT NULL,
  `fac_lname` text NOT NULL,
  `fac_email` varchar(50) NOT NULL,
  `fac_dob` varchar(255) NOT NULL,
  `parent_contact` varchar(20) NOT NULL,
  `fac_desig` varchar(50) NOT NULL,
  `class_teach` varchar(255) NOT NULL,
  `fac_dep` varchar(100) NOT NULL,
  `fac_prev_org` varchar(100) NOT NULL,
  `fac_quali` varchar(100) NOT NULL,
  `fac_join` varchar(255) NOT NULL,
  `fac_add` varchar(255) NOT NULL,
  `fac_photo_name` varchar(100) NOT NULL,
  `fac_photo_path` varchar(255) NOT NULL,
  `fac_photo_type` varchar(100) NOT NULL,
  `fac_sex` varchar(10) NOT NULL,
  `fac_adhar_name` varchar(100) NOT NULL,
  `fac_adhar_path` varchar(255) NOT NULL,
  `fac_adhar_type` varchar(50) NOT NULL,
  `fac_id_name` varchar(100) NOT NULL,
  `fac_id_path` varchar(255) NOT NULL,
  `fac_id_type` varchar(50) NOT NULL,
  `staff_pass` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adhaar_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fac_attendance`
--

CREATE TABLE `fac_attendance` (
  `id` int(11) NOT NULL,
  `first_fname` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `taken_by` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `att_date` date NOT NULL,
  `att_count` int(11) NOT NULL,
  `tot_class` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_name`
--

CREATE TABLE `fee_name` (
  `id` int(11) NOT NULL,
  `fee_name` varchar(255) NOT NULL,
  `fee_details` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_name`
--

INSERT INTO `fee_name` (`id`, `fee_name`, `fee_details`, `committee_year`, `updated_date`) VALUES
(1, 'Monthly Fee', 'Monthly fee', '2019-2020', '2019-06-16'),
(2, 'Eid Ul Fitar', 'Eid Ul Fitar', '2019-2020', '2019-06-16'),
(3, 'Old Monthly Fee', 'Old Monthly Fee', '2019-2020', '2019-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `ho_date` date NOT NULL,
  `ho_name` varchar(255) NOT NULL,
  `ho_details` text NOT NULL,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` int(11) NOT NULL,
  `last_updated` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_name`
--

CREATE TABLE `income_name` (
  `id` int(11) NOT NULL,
  `income_name` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_name`
--

INSERT INTO `income_name` (`id`, `income_name`, `committee_year`, `added_date`, `updated_date`) VALUES
(1, 'Swalath Committee Income', '2019-2020', '2019-07-21', '2019-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `avl_quantity` int(11) NOT NULL,
  `ware_stock_loc` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `item_condition` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `letterhead`
--

CREATE TABLE `letterhead` (
  `id` int(11) NOT NULL,
  `lh_title` varchar(255) NOT NULL,
  `lh_desc` longtext NOT NULL,
  `printed_date` date NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `bor_name` varchar(255) NOT NULL,
  `bor_id` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `iss_date` date NOT NULL,
  `recie_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahal_det`
--

CREATE TABLE `mahal_det` (
  `id` int(11) NOT NULL,
  `sch_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  `sch_dise1` varchar(255) NOT NULL,
  `sch_dise2` varchar(255) NOT NULL,
  `sch_dise3` varchar(255) NOT NULL,
  `sch_dise4` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahal_det`
--

INSERT INTO `mahal_det` (`id`, `sch_name`, `location`, `city`, `district`, `state`, `pin`, `phone`, `mob`, `email`, `web`, `sender_id`, `sch_dise1`, `sch_dise2`, `sch_dise3`, `sch_dise4`, `academic_year`) VALUES
(8, 'MOUNATHUL ISLAM', 'KUSHALNAGAR', 'KUSHALNAGAR', 'KODAGU', 'KARNATAKA', 571234, '8277021524', '8277021524', 'support@digitalcoorg.com', 'www.digitalcoorg.com', 'MAZJID', '5437642387', '4798371974', '8797897', '8978979', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `marriage_certificate`
--

CREATE TABLE `marriage_certificate` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `wife_first_name` varchar(255) NOT NULL,
  `wife_dob` date NOT NULL,
  `wife_address` varchar(255) NOT NULL,
  `wife_father_name` varchar(255) NOT NULL,
  `nikah_date` date NOT NULL,
  `nikah_place` varchar(255) NOT NULL,
  `khazi` varchar(255) NOT NULL,
  `valiyy` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `memb_id` varchar(255) NOT NULL,
  `mar_reg_no` varchar(255) NOT NULL,
  `certificate_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marriage_certificate`
--

INSERT INTO `marriage_certificate` (`id`, `first_name`, `member_id`, `dob`, `address`, `father_name`, `wife_first_name`, `wife_dob`, `wife_address`, `wife_father_name`, `nikah_date`, `nikah_place`, `khazi`, `valiyy`, `updated_date`, `memb_id`, `mar_reg_no`, `certificate_no`) VALUES
(1, 'Musthafa', 'non_member', '1986-04-13', 'Ponnathmotte', 'Abdulla', 'Fathima', '1994-02-01', 'Kushalnagar', 'mahin', '2015-12-13', 'Ponnathomotte', 'Shaduli saqafi', 'Father', '2019-06-28 05:01:27', '', '592', '435790'),
(2, 'à²®à³à²¸à³à²¤à²«', 'non_member', '1986-04-13', 'à²ªà³Šà²£à³à²¨à²¤à³à²®à³‹à²Ÿà³à²Ÿà³†', 'à²…à²¬à³à²¦à³à²²à³à²²', 'à²«à²¾à²¤à²¿à²®', '1994-02-01', 'à²•à³à²¶à²¾à²²à²¨à²—à²°', 'à²®à²¾à²¹à³€à²¨à³', '2015-12-13', 'à²ªà³Šà²¨à³à²¨à²¤à³à²®à³Š à²Ÿà³à²Ÿà³†', 'à²¶à²¾à²¦à³à²²à²¿', 'à²¤à²‚à²¦à³†', '2019-07-08 15:11:03', '', '3453245', '2343');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `meeting_type` varchar(255) NOT NULL,
  `meeting_class` varchar(255) NOT NULL,
  `meeting_name` text NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `parent_contact` varchar(20) NOT NULL,
  `committee_year` varchar(30) NOT NULL,
  `father_name` text NOT NULL,
  `mother_name` text NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `photo_type` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `wife_name` varchar(255) NOT NULL,
  `children` varchar(255) NOT NULL,
  `merit_sts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `member_id`, `join_date`, `parent_contact`, `committee_year`, `father_name`, `mother_name`, `photo_name`, `photo_path`, `photo_type`, `address`, `member_type`, `wife_name`, `children`, `merit_sts`) VALUES
(1, 'Musthafa', '12345', '0000-00-00', '8277021524', '2019-2020', '', '', '', '', '', '', 'Main Member', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_fee`
--

CREATE TABLE `member_fee` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `member_fee_amount` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `member_fee_type` varchar(255) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_fee`
--

INSERT INTO `member_fee` (`id`, `memb_id`, `name`, `mobile`, `committee_year`, `member_id`, `member_fee_amount`, `rec_date`, `rec_no`, `month`, `member_fee_type`, `updated_date`) VALUES
(2, '4', 'Musthafa MA', '8277021524', '2019-2020', 'musthafama84', 200, '2019-07-12', '21', 'July', 'Monthly Fee', '2019-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `member_fee_type`
--

CREATE TABLE `member_fee_type` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `member_fee_type_name` varchar(255) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_fee_type`
--

INSERT INTO `member_fee_type` (`id`, `first_name`, `member_id`, `member_type`, `member_fee_type_name`, `fee_amount`, `note`, `added_date`, `committee_year`, `updated_date`) VALUES
(2, 'Musthafa', '12345', 'Main Member', 'Monthly Fee', 300, '', '2019-07-18', '2019-2020', '2019-07-18 06:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `member_type`
--

CREATE TABLE `member_type` (
  `id` int(11) NOT NULL,
  `member_type_name` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_type`
--

INSERT INTO `member_type` (`id`, `member_type_name`, `committee_year`, `updated_date`) VALUES
(3, 'Main Member', '2018-2019', '2018-07-10'),
(4, 'Half Member', '2018-2019', '2018-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `noc_certificate`
--

CREATE TABLE `noc_certificate` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `ashaya` varchar(255) NOT NULL,
  `madh` varchar(255) NOT NULL,
  `mar_date` date NOT NULL,
  `before_married` varchar(255) NOT NULL,
  `mar_no` varchar(255) NOT NULL,
  `wife_exist` varchar(255) NOT NULL,
  `any_problem` varchar(255) NOT NULL,
  `children_how_many` varchar(255) NOT NULL,
  `divorce_since` date NOT NULL,
  `new_comer` varchar(255) NOT NULL,
  `certi_no` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mahal_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noc_certificate`
--

INSERT INTO `noc_certificate` (`id`, `memb_id`, `first_name`, `member_id`, `ashaya`, `madh`, `mar_date`, `before_married`, `mar_no`, `wife_exist`, `any_problem`, `children_how_many`, `divorce_since`, `new_comer`, `certi_no`, `issued_date`, `father_name`, `mother_name`, `mahal_address`) VALUES
(1, '', 'Musthafa', 'Ponnathmotte', 'shafi', 'shafi', '2015-12-13', 'No', 'No', 'Nil', 'No', 'Nil', '0000-00-00', 'Nil', 'Nil', '0000-00-00', 'Abdulla', 'Ayisha', 'Ponnathmotte\r\nCHettalli post\r\nkodagu'),
(2, '', 'Musthafa', 'Ponnathmotte', 'shafi', 'shafi', '2015-12-13', 'No', 'No', 'Nil', 'No', 'Nil', '0000-00-00', 'Nil', 'Nil', '0000-00-00', 'Abdulla', 'Ayisha', 'Ponnathmotte\r\nCHettalli post\r\nkodagu'),
(3, '44', 'K H Muhammad', '394824', 'Sunni', 'Shafi', '2015-12-13', 'No', 'No', 'No', 'No', 'No', '0000-00-00', 'No', '2597234', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(4, '190', 'A H Saleem', '15299724', 'Sunni', 'Shafi', '2019-07-31', 'No', 'NO', 'No', 'no', 'lljk', '0000-00-00', 'jljl', '98549032', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(5, '190', 'A H Saleem', '15299724', 'Sunni', 'Shafi', '2019-07-31', 'No', 'NO', 'No', 'no', 'lljk', '0000-00-00', 'jljl', '98549032', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(6, '190', 'A H Saleem', '15299724', 'Sunni', 'Shafi', '2019-07-31', 'No', 'NO', 'No', 'no', 'lljk', '0000-00-00', 'jljl', '98549032', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(7, '190', 'A H Saleem', '15299724', 'Sunni', 'Shafi', '2019-07-31', 'No', 'NO', 'No', 'no', 'lljk', '0000-00-00', 'jljl', '98549032', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(8, '190', 'A H Saleem', '15299724', 'Sunni', 'Shafi', '2019-07-31', 'No', 'NO', 'No', 'no', 'lljk', '0000-00-00', 'jljl', '98549032', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(9, '190', 'A H Saleem', '15299724', 'Sunni', 'Shafi', '2019-07-31', 'No', 'NO', 'No', 'no', 'lljk', '0000-00-00', 'jljl', '98549032', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(10, '190', 'A H Saleem', '15299724', 'Sunni', 'Shafi', '2019-07-31', 'No', 'NO', 'No', 'no', 'lljk', '0000-00-00', 'jljl', '98549032', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(11, '52', 'B A Muhammad', '1194829', 'jjkhkjh', 'hfghf', '2019-07-05', 'safd', 'gjhgj', 'jgjhg', 'jgjhg', 'kjgkj', '0000-00-00', 'jkg', 'kjhgjk', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(12, '52', 'B A Muhammad', '1194829', 'jjkhkjh', 'hfghf', '2019-07-05', 'safd', 'gjhgj', 'jgjhg', 'jgjhg', 'kjgkj', '0000-00-00', 'jkg', 'kjhgjk', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(13, '52', 'B A Muhammad', '1194829', 'jjkhkjh', 'hfghf', '2019-07-05', 'safd', 'gjhgj', 'jgjhg', 'jgjhg', 'kjgkj', '0000-00-00', 'jkg', 'kjhgjk', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(14, '52', 'B A Muhammad', '1194829', 'jjkhkjh', 'hfghf', '2019-07-05', 'safd', 'gjhgj', 'jgjhg', 'jgjhg', 'kjgkj', '0000-00-00', 'jkg', 'kjhgjk', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(15, '190', 'A H Saleem', '15299724', 'lkjlk', 'jlkjklj', '2019-07-05', 'lkjklj', 'lkjlkj', 'lkjlk', 'jlkjlkj', 'lkj', '0000-00-00', 'lkj', 'lj', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(16, '190', 'A H Saleem', '15299724', 'lkjlk', 'jlkjklj', '2019-07-05', 'lkjklj', 'lkjlkj', 'lkjlk', 'jlkjlkj', 'lkj', '0000-00-00', 'lkj', 'lj', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(17, '190', 'A H Saleem', '15299724', 'lkjlk', 'jlkjklj', '2019-07-05', 'lkjklj', 'lkjlkj', 'lkjlk', 'jlkjlkj', 'lkj', '0000-00-00', 'lkj', 'lj', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234'),
(18, '107', 'Abdu MS', 'abdums75', 'à²¸à³à²¨à³à²¨à²¿', 'à²¶à²¾à²«à²¿', '2019-07-08', 'à²‡à²²à³à²²', 'à²‡à²²à³à²²', 'à²‡à²²à³à²²', 'à²‡à²²à³à²²', 'à²‡à²²à³à²²', '0000-00-00', 'à²‡à²²à³à²²', 'à²‡à²²à³à²²', '0000-00-00', '', '', 'MOUNATHUL ISLAM<br>KUSHALNAGAR,KUSHALNAGAR,KODAGU,571234');

-- --------------------------------------------------------

--
-- Table structure for table `non_teach`
--

CREATE TABLE `non_teach` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(20) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `join_date` date NOT NULL,
  `address` text NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `photo_type` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `adhar_name` varchar(100) NOT NULL,
  `adhar_path` varchar(255) NOT NULL,
  `adhar_type` varchar(50) NOT NULL,
  `id_name` varchar(100) NOT NULL,
  `id_path` varchar(255) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notifi_title` varchar(255) NOT NULL,
  `notifi_desc` text NOT NULL,
  `notifi_date` date NOT NULL,
  `class` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `remarks_title` varchar(255) NOT NULL,
  `remarks_desc` varchar(255) NOT NULL,
  `remarks_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply_applications`
--

CREATE TABLE `reply_applications` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `message_id` varchar(255) NOT NULL,
  `sent_date` date NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_applications`
--

INSERT INTO `reply_applications` (`id`, `memb_id`, `first_name`, `member_id`, `subject`, `message`, `message_id`, `sent_date`, `message_time`, `committee_year`) VALUES
(1, '', 'A H Saleem', '15299724', 'à²…à²°à³à²œà²¿ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³†', 'à²¨à³€à²µà³ à²•à²³à³à²¹à²¿à²¸à²¿à²¦ à²…à²°à³à²œà²¿à²¯à²¨à³à²¨à³ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³†.', '1', '2019-07-05', '2019-07-05 15:12:08', '2019-2020'),
(2, '', 'A H Saleem', '15299724', 'à²«à²¼à³à²¦à³à²¸à²¾à²•à³à²‚à³à²«à²¼à³â€Œà²•à³à²¸à²¡à³ à²…à²°à³à²œà²¿ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³† : à²¨à³€à²µà³ à²•à²³à³à²¹à²¿à²¸à²¿à²¦ à²…à²°à³à²œà²¿à²¯à²¨à³à²¨à³ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³†. ', 'à²…à²°à³à²œà²¿ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³† : à²¨à³€à²µà³ à²•à²³à³à²¹à²¿à²¸à²¿à²¦ à²…à²°à³à²œà²¿à²¯à²¨à³à²¨à³ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³†. à²…à²°à³à²œà²¿ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³† : à²¨à³€à²µà³ à²•à²³à³à²¹à²¿à²¸à²¿à²¦ à²…à²°à³à²œà²¿à²¯à²¨à³à²¨à³ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³†. à²…à²°à³à²œà²¿ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³† : à²¨à³€à²µà³ à²•à²³à³à²¹à²¿à²¸à²¿à²¦ à²…à²°à³à²œà²¿à²¯à²¨à³à²¨à³ à²¸à³à²µà³€à²•à²°à²¿à²¸à²²à²¾à²—à²¿à²¦à³†. ', '2', '2019-07-05', '2019-07-05 15:16:10', '2019-2020'),
(3, '', 'musthafa', '12345', 'à²°à²¿à²ªà³à²²à³ˆ ', 'à²ªà²¾à²®à²¾à²¨ à²ªà²¤à³à²° à²°à³†à²¡à²¿à²¯à²¾à²—à²¿à²¦à³†', '1', '2019-07-16', '2019-07-16 11:10:41', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `reply_messages`
--

CREATE TABLE `reply_messages` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `message_id` varchar(255) NOT NULL,
  `sent_date` date NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_messages`
--

INSERT INTO `reply_messages` (`id`, `memb_id`, `first_name`, `member_id`, `subject`, `message`, `message_id`, `sent_date`, `message_time`, `committee_year`) VALUES
(1, '', 'A H Saleem', '15299724', 'message reply from masjid', 'Hello, Member this is a reply message from masjid', '1', '2019-07-05', '2019-07-05 15:20:35', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `sec_expense`
--

CREATE TABLE `sec_expense` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `towards` varchar(255) NOT NULL,
  `exp_date` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_updated` date NOT NULL,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sec_expense`
--

INSERT INTO `sec_expense` (`id`, `amount`, `towards`, `exp_date`, `added_by`, `last_updated`, `committee_year`) VALUES
(1, 3500, 'swalath committee expense', '2019-07-21', 'digitalcoorg', '2019-07-21', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `sec_income`
--

CREATE TABLE `sec_income` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` int(11) NOT NULL,
  `last_updated` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `committee_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sec_income`
--

INSERT INTO `sec_income` (`id`, `amount`, `source`, `rec_date`, `rec_no`, `last_updated`, `added_by`, `committee_year`) VALUES
(2, 10000, 'Swalath Committee Income', '2019-07-21', 2, '2019-07-21', 'digitalcoorg', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `set_fee`
--

CREATE TABLE `set_fee` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `parent_contact` varchar(20) NOT NULL,
  `section` varchar(255) NOT NULL,
  `sex` text NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `academic_year` varchar(30) NOT NULL,
  `father_name` text NOT NULL,
  `mother_name` text NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `photo_type` varchar(100) NOT NULL,
  `adhaar_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `roll_no`, `blood`, `join_date`, `parent_contact`, `section`, `sex`, `present_class`, `dob`, `academic_year`, `father_name`, `mother_name`, `photo_name`, `photo_path`, `photo_type`, `adhaar_no`, `address`) VALUES
(11, 'Musthu', '111', 'A', '2018-08-02', '8277021524', '', 'male', 'first standard', '2018-08-02', '2018-2019', 'Abdulla M', 'Ayisha', '', 'photo/', '', '6546546464', 'ponnathmotte');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `id` int(11) NOT NULL,
  `memb_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `total_fee_calc`
--

CREATE TABLE `total_fee_calc` (
  `id` int(11) NOT NULL,
  `tot_member` int(11) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `fee_month` varchar(255) NOT NULL,
  `total_fee` int(11) NOT NULL,
  `committee_year` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_documents`
--

CREATE TABLE `uploaded_documents` (
  `id` int(11) NOT NULL,
  `upl_doc_name` varchar(255) NOT NULL,
  `upl_file_name` varchar(255) NOT NULL,
  `upl_file_path` varchar(255) NOT NULL,
  `upl_file_type` varchar(255) NOT NULL,
  `upl_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon_fee`
--
ALTER TABLE `addon_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addon_fee_received`
--
ALTER TABLE `addon_fee_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_members_fee`
--
ALTER TABLE `adm_members_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_members`
--
ALTER TABLE `ad_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_det`
--
ALTER TABLE `bank_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_withdraw`
--
ALTER TABLE `bank_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_status`
--
ALTER TABLE `certificate_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_name`
--
ALTER TABLE `committee_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_mahal`
--
ALTER TABLE `contact_mahal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_name`
--
ALTER TABLE `expense_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `fac_attendance`
--
ALTER TABLE `fac_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_name`
--
ALTER TABLE `fee_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_name`
--
ALTER TABLE `income_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letterhead`
--
ALTER TABLE `letterhead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahal_det`
--
ALTER TABLE `mahal_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriage_certificate`
--
ALTER TABLE `marriage_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_fee`
--
ALTER TABLE `member_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_fee_type`
--
ALTER TABLE `member_fee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_type`
--
ALTER TABLE `member_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noc_certificate`
--
ALTER TABLE `noc_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_teach`
--
ALTER TABLE `non_teach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_applications`
--
ALTER TABLE `reply_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_messages`
--
ALTER TABLE `reply_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_expense`
--
ALTER TABLE `sec_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_income`
--
ALTER TABLE `sec_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_fee`
--
ALTER TABLE `set_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_fee_calc`
--
ALTER TABLE `total_fee_calc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon_fee`
--
ALTER TABLE `addon_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addon_fee_received`
--
ALTER TABLE `addon_fee_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adm_members_fee`
--
ALTER TABLE `adm_members_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_members`
--
ALTER TABLE `ad_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_det`
--
ALTER TABLE `bank_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_withdraw`
--
ALTER TABLE `bank_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_status`
--
ALTER TABLE `certificate_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `committee_name`
--
ALTER TABLE `committee_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_mahal`
--
ALTER TABLE `contact_mahal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_name`
--
ALTER TABLE `expense_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fac_attendance`
--
ALTER TABLE `fac_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_name`
--
ALTER TABLE `fee_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_name`
--
ALTER TABLE `income_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `letterhead`
--
ALTER TABLE `letterhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahal_det`
--
ALTER TABLE `mahal_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marriage_certificate`
--
ALTER TABLE `marriage_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_fee`
--
ALTER TABLE `member_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_fee_type`
--
ALTER TABLE `member_fee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_type`
--
ALTER TABLE `member_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `noc_certificate`
--
ALTER TABLE `noc_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `non_teach`
--
ALTER TABLE `non_teach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply_applications`
--
ALTER TABLE `reply_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reply_messages`
--
ALTER TABLE `reply_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sec_expense`
--
ALTER TABLE `sec_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sec_income`
--
ALTER TABLE `sec_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `set_fee`
--
ALTER TABLE `set_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_fee_calc`
--
ALTER TABLE `total_fee_calc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
