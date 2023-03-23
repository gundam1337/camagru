DROP TABLE `password_reset`;

CREATE TABLE `password_reset` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

