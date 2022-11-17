DROP TABLE IF EXISTS `users`;
create table users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL UNIQUE,
    pssword VARCHAR(255) NOT NULL,
    email varchar(320) NOT NULL
);

INSERT INTO `users` (`user_name`, `pssword`, `email`) VALUES ('omarderkaoui','38d8cae2b451f2e926b7bbf27319bd3a', 'omarderkaoui@gmail.com');