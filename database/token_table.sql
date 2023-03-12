DROP TABLE `password_reset_temp`;

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES 
('user4@example.com', MD5('random_key1'), '2023-03-25 06:00:00'),
('user5@example.com', MD5('random_key2'), '2023-03-30 18:00:00'),
('user6@example.com', MD5('random_key3'), '2023-04-01 00:00:00'),
('user7@example.com', MD5('random_key4'), '2023-04-05 12:00:00'),
('user8@example.com', MD5('random_key5'), '2023-04-10 23:59:59'),
('user9@example.com', MD5('random_key6'), '2023-04-15 00:00:00'),
('user10@example.com', MD5('random_key7'), '2023-04-20 12:00:00'),
('user11@example.com', MD5('random_key8'), '2023-04-25 23:59:59'),
('user12@example.com', MD5('random_key9'), '2023-04-30 00:00:00'),
('user13@example.com', MD5('random_key10'), '2023-05-05 12:00:00');