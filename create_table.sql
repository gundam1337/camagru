DROP TABLE IF EXISTS `users`;
create table users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL UNIQUE,
    pssword VARCHAR(255) NOT NULL,
    email varchar(320) NOT NULL
);

INSERT INTO `users` (`user_name`, `pssword`, `email`) VALUES ('omarderkaoui','38d8cae2b451f2e926b7bbf27319bd3a', 'omarderkaoui@gmail.com');
INSERT INTO `users` (`user_name`, `pssword`, `email`) VALUES ('omarkhatabi','be9abe9c6bf3706d12afb72e80bd7e30', 'omarderkhetabi@gmail.com');