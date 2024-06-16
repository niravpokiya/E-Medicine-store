 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `absent_days` int(11) DEFAULT NULL,
  `leaves` int(11) DEFAULT NULL,
  `half_leaves` int(11) DEFAULT NULL,
  `Remaining_leaves` int(11) NOT NULL,
  `annual_salary` int(11) DEFAULT NULL,
  `loss_of_pay` int(11) DEFAULT NULL,
  `total_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `employees` (`id`, `name`, `absent_days`, `leaves`, `half_leaves`, `Remaining_leaves`, `annual_salary`, `loss_of_pay`, `total_salary`) VALUES
(1, 'Rudra Prajapati(Manager)', 0, 0, 0, 12, 1000000, 0, NULL),
(2, 'Nirav Pokiya', 2, 2, 0, 10, 800000, 0, NULL),
(3, 'Jay Shah', 2, 0, 3, 11, 600000, 0, NULL),
(4, 'Vraj Patel', 1, 0, 2, 11, 550000, 0, NULL),
(5, 'Nishant Arora', 2, 1, 2, 10, 500000, 0, NULL),
(6, 'Parth Rao', 3, 2, 2, 9, 500000, 0, NULL),
(7, 'Ryomen Sukuna', 14, 13, 2, 0, 600000, 3000, NULL),
(8, 'Harit Patel', 36, 35, 2, 0, 500000, 36000, NULL);
DELIMITER $$
CREATE TRIGGER `for_Remaining_leaves` BEFORE INSERT ON `employees` FOR EACH ROW BEGIN
SET NEW.`Remaining_leaves`= 12-(NEW.`leaves` + 0.5 * NEW.`half_leaves`);
IF NEW.`Remaining_leaves` < 0 THEN
SET  NEW.`Remaining_leaves`= 0;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_absent` BEFORE INSERT ON `employees` FOR EACH ROW BEGIN
SET NEW.`absent_days`=NEW.`leaves` + 0.5*NEW.`half_leaves`;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `lossofpay` BEFORE INSERT ON `employees` FOR EACH ROW BEGIN
 IF NEW.`Remaining_leaves` < 1 THEN
 SET NEW.`loss_of_pay`= 1500 * ( (NEW.`leaves`+ 0.5*NEW.`half_leaves`)- 12);
 ELSE
 SET  NEW.`loss_of_pay`= 0;
 END IF;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_absent` BEFORE UPDATE ON `employees` FOR EACH ROW BEGIN
SET NEW.`absent_days`=NEW.`leaves` + 0.5*NEW.`half_leaves`;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_lossofpay` BEFORE UPDATE ON `employees` FOR EACH ROW BEGIN
 IF NEW.`Remaining_leaves` < 1 THEN
 SET NEW.`loss_of_pay`= 1500 * ( (NEW.`leaves`+ 0.5*NEW.`half_leaves`)- 12);
 ELSE
 SET  NEW.`loss_of_pay`= 0;
 END IF;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_remainingleaves` BEFORE UPDATE ON `employees` FOR EACH ROW BEGIN 
 SET NEW.Remaining_leaves=12 - (0.5* NEW.`half_leaves`+NEW.`leaves`);
IF NEW.`Remaining_leaves` < 0 THEN
SET  NEW.`Remaining_leaves`= 0;
END IF;
END
$$
DELIMITER ;

  

CREATE TABLE `password` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass_word` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

 

INSERT INTO `password` (`id`, `name`, `pass_word`) VALUES
(1, 'employees', 'emp@1234');

 
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

 
ALTER TABLE `password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

 