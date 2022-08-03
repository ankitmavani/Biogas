-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 03:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_as`
--

CREATE TABLE `about_as` (
  `as_id` int(10) NOT NULL,
  `as_title` varchar(30) NOT NULL,
  `as_desc` text NOT NULL,
  `as_image` varchar(30) NOT NULL,
  `as_add_by` varchar(30) NOT NULL,
  `as_date` varchar(30) NOT NULL,
  `as_rank` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_as`
--

INSERT INTO `about_as` (`as_id`, `as_title`, `as_desc`, `as_image`, `as_add_by`, `as_date`, `as_rank`) VALUES
(8, 'About', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1590467096-mtcnry.png', 'mavani ankit', '26 May, 2020', 3),
(9, 'Mission', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1590467133-msn.png', 'mavani ankit', '26 May, 2020', 1),
(11, 'adssad', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.more...', '1590468049-vsn.png', 'mavani ankit', '26 May, 2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `add_by` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `first_name`, `last_name`, `username`, `email`, `password`, `add_by`, `date`) VALUES
(2, 'ankit', 'mavani', 'mavani ankit', 'mavaniankit67@gmail.com', 'd6de412c0e8109da726c16c6cf7d9a34', 'asda', '24 May,2020');

-- --------------------------------------------------------

--
-- Table structure for table `ceo_info`
--

CREATE TABLE `ceo_info` (
  `CEO_id` int(10) NOT NULL,
  `CEO_name` varchar(30) NOT NULL,
  `CEO_image` varchar(30) NOT NULL,
  `CEO_desc` text NOT NULL,
  `CEO_date` varchar(30) NOT NULL,
  `CEO_add_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ceo_info`
--

INSERT INTO `ceo_info` (`CEO_id`, `CEO_name`, `CEO_image`, `CEO_desc`, `CEO_date`, `CEO_add_by`) VALUES
(1, 'Bhart savliya', '1590486707-prfl.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '26 May,2020', 'mavani ankit');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `cer_id` int(10) NOT NULL,
  `cer_name` varchar(30) NOT NULL,
  `cer_image` varchar(30) NOT NULL,
  `cer_date` varchar(30) NOT NULL,
  `cer_add_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`cer_id`, `cer_name`, `cer_image`, `cer_date`, `cer_add_by`) VALUES
(10, 'cre', '1590932094-crty2.jpg', '31 May,2020', 'mavani ankit'),
(11, 'asda', '1590481923-crty2.jpg', '26 May, 2020', 'mavani ankit');

-- --------------------------------------------------------

--
-- Table structure for table `client_project_management`
--

CREATE TABLE `client_project_management` (
  `cpm_id` int(10) NOT NULL,
  `cpm_name` varchar(30) NOT NULL,
  `cpm_image` varchar(30) NOT NULL,
  `cpm_add_by` varchar(30) NOT NULL,
  `cpm_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_project_management`
--

INSERT INTO `client_project_management` (`cpm_id`, `cpm_name`, `cpm_image`, `cpm_add_by`, `cpm_date`) VALUES
(1, 'img1', '1590405338-1.jpg', 'mavani ankit', '25 May, 2020'),
(2, 'img2', '1590405348-2.jpg', 'mavani ankit', '25 May, 2020'),
(3, 'img3', '1590405359-3.jpg', 'mavani ankit', '25 May, 2020'),
(4, 'img4', '1590405369-4.jpg', 'mavani ankit', '25 May, 2020'),
(5, 'img5', '1590405380-5.jpg', 'mavani ankit', '25 May, 2020'),
(6, 'img6', '1590405389-6.jpg', 'mavani ankit', '25 May, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `flow_chart`
--

CREATE TABLE `flow_chart` (
  `fc_id` int(10) NOT NULL,
  `fc_name` varchar(30) NOT NULL,
  `fc_image` varchar(30) NOT NULL,
  `fc_add_by` varchar(30) NOT NULL,
  `fc_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flow_chart`
--

INSERT INTO `flow_chart` (`fc_id`, `fc_name`, `fc_image`, `fc_add_by`, `fc_date`) VALUES
(17, 'img', '1590932324-flowchart1.svg', 'mavani ankit', '31 May, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `inqry`
--

CREATE TABLE `inqry` (
  `in_id` int(10) NOT NULL,
  `in_title` varchar(30) NOT NULL,
  `in_email` varchar(30) NOT NULL,
  `in_phone` int(10) NOT NULL,
  `in_desc` text NOT NULL,
  `in_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_data`
--

CREATE TABLE `list_data` (
  `list_id` int(10) NOT NULL,
  `post` int(10) NOT NULL,
  `list_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(10) NOT NULL,
  `post_title` varchar(30) NOT NULL,
  `post_desc` text NOT NULL,
  `post_image` varchar(30) NOT NULL,
  `post_date` varchar(30) NOT NULL,
  `post_add_by` varchar(30) NOT NULL,
  `post_rank` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_desc`, `post_image`, `post_date`, `post_add_by`, `post_rank`) VALUES
(3, 'Anaerobic Digestion', 'Anaerobic Digestion Is a biochemical process durina which complex organic matter Is decomposed in absence oxygn by various types of anaerobic microorganisms.T processlssimllar 10 1ha1lound In na1ure asin 1he stomach of ruminants such as cows. Anaerobic\" digestion IS apurely bacterial process. In \"a biops ln\"\"\'111auon, outc:om.. of the Anaerobic Dlgesuon process Is the biops and the disemte.If ­ f0< AnWrobic: Dogestion Isa homogenous m11<1ure of m0e lhan one leedstock rypes such asanimal slumesand ganic wastes from food processing factories,it\" \"Is known as \"\"co-digestion• and is more... tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '1590479412-prvn.png', '26 May, 2020', 'mavani ankit', 1),
(4, 'Anaerobic Digestion', 'Anaerobic Digestion Is a biochemical process durina which complex organic matter Is decomposed in absence oxygn by various types of anaerobic microorganisms.T processlssimllar 10 1ha1lound In na1ure asin 1he stomach of ruminants such as cows. Anaerobic\" digestion IS apurely bacterial process. In \"a biops ln\"\"\'111auon, outc:om.. of the Anaerobic Dlgesuon process Is the biops and the disemte.If ­ f0< AnWrobic: Dogestion Isa homogenous m11<1ure of m0e lhan one leedstock rypes such asanimal slumesand ganic wastes from food processing factories,it\" \"Is known as \"\"co-digestion• and is more... tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '1590479442-biogas_plant.png', '26 May, 2020', 'mavani ankit', 3),
(5, 'Anaerobic Digestion', 'Anaerobic Digestion Is a biochemical process durina which complex organic matter Is decomposed in absence oxygn by various types of anaerobic microorganisms.T processlssimllar 10 1ha1lound In na1ure asin 1he stomach of ruminants such as cows. Anaerobic\" digestion IS apurely bacterial process. In \"a biops ln\"\"\'111auon, outc:om.. of the Anaerobic Dlgesuon process Is the biops and the disemte.If ­ f0< AnWrobic: Dogestion Isa homogenous m11<1ure of m0e lhan one leedstock rypes such asanimal slumesand ganic wastes from food processing factories,it\" \"Is known as \"\"co-digestion• and is more... tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '1590479461-anrbc.png', '26 May, 2020', 'mavani ankit', 1),
(6, 'Anaerobic Digestion', 'Anaerobic Digestion Is a biochemical process durina which complex organic matter Is decomposed in absence oxygn by various types of anaerobic microorganisms.T processlssimllar 10 1ha1lound In na1ure asin 1he stomach of ruminants such as cows. Anaerobic\" digestion IS apurely bacterial process. In \"a biops ln\"\"\'111auon, outc:om.. of the Anaerobic Dlgesuon process Is the biops and the disemte.If ­ f0< AnWrobic: Dogestion Isa homogenous m11<1ure of m0e lhan one leedstock rypes such asanimal slumesand ganic wastes from food processing factories,it\" \"Is known as \"\"co-digestion• and is more... tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '1590479489-biogas_plant.png', '26 May, 2020', 'mavani ankit', 3);

-- --------------------------------------------------------

--
-- Table structure for table `services_bio`
--

CREATE TABLE `services_bio` (
  `sb_id` int(10) NOT NULL,
  `sb_name` varchar(30) NOT NULL,
  `sb_image` varchar(30) NOT NULL,
  `sb_add_by` varchar(30) NOT NULL,
  `sb_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_bio`
--

INSERT INTO `services_bio` (`sb_id`, `sb_name`, `sb_image`, `sb_add_by`, `sb_date`) VALUES
(2, 'img1', '1590406247-bio_proj.jpg', 'mavani ankit', '25 May, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `services_machinary`
--

CREATE TABLE `services_machinary` (
  `sm_id` int(10) NOT NULL,
  `sm_title` varchar(30) NOT NULL,
  `sm_desc` text NOT NULL,
  `sm_image` varchar(30) NOT NULL,
  `sm_date` varchar(30) NOT NULL,
  `sm_add_by` varchar(30) NOT NULL,
  `sm_rank` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_machinary`
--

INSERT INTO `services_machinary` (`sm_id`, `sm_title`, `sm_desc`, `sm_image`, `sm_date`, `sm_add_by`, `sm_rank`) VALUES
(11, 'BIO TECHNICAL BACKING', 'Didask technologists can support in producing the optimum biogas quantities by monitoring the biological conditions through various lab tests.', '1590460963-tstng.png', '26 May,2020', 'mavani ankit', 0),
(12, 'BIO TECHNICAL BACKING', 'Didask technologists can support in producing the optimum biogas quantities by monitoring the biological conditions through various lab tests.', '1590461279-tcnclbnk.jpg', '26 May, 2020', 'mavani ankit', 1),
(14, 'SERVICE SUPPORT', 'Didask provides all the necessary service support and maintenance for the biogas plant. Our support team ensures a hassle free operation.\r\nBIO TECHNIC', '1590462564-akshar-logo2.png', '26 May, 2020', 'mavani ankit', 3),
(15, 'CAREFREE PLANT OPERATIONS MANA', 'For those investors who are interested in the returns on investment but would like to keep away from the routine operations didask’s team manages the facilities on behalf of the client.', '1590462881-akshar-logo.png', '26 May, 2020', 'mavani ankit', 3);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_location` varchar(100) NOT NULL,
  `setting_contect` varchar(15) NOT NULL,
  `setting_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_location`, `setting_contect`, `setting_email`) VALUES
(1, '236, Palladium mall, Near shyam mandir, vip road, vesu, surat-asd', '+91 99091 94157', 'aksharbiotech1@gmail.cos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_as`
--
ALTER TABLE `about_as`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ceo_info`
--
ALTER TABLE `ceo_info`
  ADD PRIMARY KEY (`CEO_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`cer_id`);

--
-- Indexes for table `client_project_management`
--
ALTER TABLE `client_project_management`
  ADD PRIMARY KEY (`cpm_id`);

--
-- Indexes for table `flow_chart`
--
ALTER TABLE `flow_chart`
  ADD PRIMARY KEY (`fc_id`);

--
-- Indexes for table `inqry`
--
ALTER TABLE `inqry`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `list_data`
--
ALTER TABLE `list_data`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `services_bio`
--
ALTER TABLE `services_bio`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `services_machinary`
--
ALTER TABLE `services_machinary`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_as`
--
ALTER TABLE `about_as`
  MODIFY `as_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ceo_info`
--
ALTER TABLE `ceo_info`
  MODIFY `CEO_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `cer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_project_management`
--
ALTER TABLE `client_project_management`
  MODIFY `cpm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `flow_chart`
--
ALTER TABLE `flow_chart`
  MODIFY `fc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inqry`
--
ALTER TABLE `inqry`
  MODIFY `in_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `list_data`
--
ALTER TABLE `list_data`
  MODIFY `list_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services_bio`
--
ALTER TABLE `services_bio`
  MODIFY `sb_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services_machinary`
--
ALTER TABLE `services_machinary`
  MODIFY `sm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
