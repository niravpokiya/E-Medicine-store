-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 06:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `Medicine_id` int(11) NOT NULL,
  `Medicine_name` varchar(50) NOT NULL,
  `Diseases` varchar(75) NOT NULL,
  `Price_per_piece` double NOT NULL,
  `selling_price` double NOT NULL,
  `total_stock` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`Medicine_id`, `Medicine_name`, `Diseases`, `Price_per_piece`, `selling_price`, `total_stock`, `in_stock`) VALUES
(1, 'Paracetamol', 'Fever', 52.5, 150, 100, 500),
(2, 'Ibuprofen', 'Pain and Inflammation', 83.75, 130, 800, 800),
(3, 'Amoxicillin', 'Bacterial Infections', 45.2, 80.99, 200, 200),
(4, 'Lisinopril', 'Hypertension', 21.8, 60, 400, 400),
(5, 'Omeprazole', 'Acid Reflux', 40, 55, 600, 600),
(6, 'Ciprofloxacin', 'Bacterial Infections', 54.8, 78, 240, 240),
(7, 'Metformin', 'Type 2 Diabetes', 31.25, 55, 600, 600),
(8, 'Loratadine', 'Allergies', 22, 38, 400, 400),
(9, 'Doxycycline', 'Bacterial Infections', 13.5, 20, 320, 320),
(10, 'Gabapentin', 'Neuropathic Pain', 54.3, 70, 480, 480),
(11, 'Atorvastatin', 'Cholesterol Management', 52.75, 95, 720, 720),
(12, 'Clonazepam', 'Anxiety', 13.2, 54, 280, 280),
(13, 'Meloxicam', 'Arthritis', 12.9, 22, 360, 360),
(14, 'Hydrochlorothiazide', 'Hypertension', 11.6, 23, 440, 440),
(15, 'Cephalexin', 'Bacterial Infections', 63, 91, 240, 240),
(16, 'Naproxen', 'Pain and Inflammation', 82.5, 112, 400, 400),
(17, 'Escitalopram', 'Depression', 73.8, 105, 200, 200),
(18, 'Furosemide', 'Edema', 10.9, 20, 480, 480),
(19, 'Sertraline', 'Depression', 43.4, 64, 280, 280),
(20, 'Amlodipine', 'Hypertension', 12.2, 23, 520, 520),
(21, 'Albuterol', 'Asthma', 54.5, 72, 160, 160),
(22, 'Fluoxetine', 'Depression', 13.1, 26, 360, 360),
(23, 'Losartan', 'Hypertension', 32.4, 51, 400, 400),
(24, 'Ondansetron', 'Nausea', 95, 151, 120, 120),
(25, 'Trazodone', 'Insomnia', 93.6, 183, 320, 320),
(26, 'Simvastatin', 'Cholesterol Management', 92.6, 185, 440, 440),
(27, 'Metoprolol', 'Hypertension', 92.1, 207, 560, 560),
(28, 'Ranitidine', 'Acid Reflux', 52.8, 77, 280, 280),
(29, 'Carvedilol', 'Heart Failure', 33.7, 67, 240, 240),
(30, 'Duloxetine', 'Depression', 43.2, 90, 200, 200),
(31, 'Levothyroxine', 'Hypothyroidism', 51.5, 115, 400, 400),
(32, 'Warfarin', 'Blood Thinning', 52.3, 115, 480, 480),
(33, 'Bupropion', 'Depression', 35.3, 50, 280, 280),
(34, 'Pregabalin', 'Neuropathic Pain', 54.4, 90, 160, 160),
(35, 'Venlafaxine', 'Depression', 93.9, 154, 240, 240),
(36, 'Mirtazapine', 'Depression', 52.7, 155, 360, 360),
(37, 'Hydroxyzine', 'Anxiety', 12, 40, 440, 440),
(38, 'Lisinopril', 'Hypertension', 81.8, 142, 320, 320),
(39, 'Budesonide', 'Asthma', 124.1, 385, 200, 200),
(40, 'Citalopram', 'Depression', 123, 345, 280, 280),
(41, 'Fluticasone', 'Allergies', 200.2, 397, 400, 400),
(42, 'Montelukast', 'Asthma', 280.5, 407, 360, 360),
(43, 'Prednisone', 'Inflammation', 151.7, 297, 480, 480),
(44, 'Tamsulosin', 'Enlarged Prostate', 300.2, 585, 240, 240),
(45, 'Vitamin D', 'Supplement', 18, 28, 600, 600),
(46, 'Esomeprazole', 'Acid Reflux', 54.3, 85, 160, 160),
(47, 'Tramadol', 'Pain Management', 83.8, 135, 280, 280);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`Medicine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `Medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
