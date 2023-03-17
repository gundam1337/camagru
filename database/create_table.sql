DROP TABLE IF EXISTS `users`;

create table users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL UNIQUE,
    pssword VARCHAR(255) NOT NULL,
    email varchar(320) NOT NULL,
    is_activated tinyint(1) DEFAULT 0,
    activation_code varchar(255) NOT NULL
);
