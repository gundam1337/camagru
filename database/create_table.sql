DROP TABLE IF EXISTS `users`;

create table users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL UNIQUE,
    pssword VARCHAR(255) NOT NULL,
    email varchar(320) NOT NULL,
    is_activated tinyint(1) DEFAULT 0,
    activation_code varchar(255) NOT NULL
);

INSERT INTO
    `users` (
        `user_name`,
        `pssword`,
        `email`,
        `is_activated` ,
        `activation_code`
    )
VALUES
    (
        'omarderkaoui',
        '38d8cae2b451f2e926b7bbf27319bd3a',
        'omarderkaoui@gmail.com',
        '1',
        'e48e13207341b6bffb7fb1622282247b'
    );

INSERT INTO
    `users` (
        `user_name`,
        `pssword`,
        `email`,
        `is_activated`,
        `activation_code`
    )
VALUES
    (
        'omarkhatabi',
        'be9abe9c6bf3706d12afb72e80bd7e30',
        'omarderkhetabi@gmail.com',
        '1',
        'b6417f112bd27848533e54885b66c288'
    );