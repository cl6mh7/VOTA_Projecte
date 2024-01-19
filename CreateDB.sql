
CREATE DATABASE VOTE;
USE VOTE;




CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    zipcode INT NOT NULL,
    token INT NOT NULL
);



CREATE TABLE poll (
    poll_id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    user_id INT,
    start_date DATETIME,
    end_date DATETIME,
    poll_state ENUM('active','blocked','not_started','finished') ,
    question_visibility ENUM('public','private','hidden') ,
    results_visibility ENUM('public','private','hidden') ,
    poll_link varchar(255) DEFAULT NULL,
    path_image varchar(255) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);


CREATE TABLE poll_options (
    option_id INT AUTO_INCREMENT PRIMARY KEY,
    option_text TEXT NOT NULL,
    poll_id INT NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    path_image varchar(255) DEFAULT NULL,
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id)
);



CREATE TABLE user_guest (
    guest_email VARCHAR(255) PRIMARY KEY
);



CREATE TABLE user_vote (
    vote_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    poll_id INT NOT null,
    option_id INT,
    user_type ENUM('registered', 'guest') NOT NULL,
    guest_email VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id),
    FOREIGN KEY (option_id) REFERENCES poll_options(option_id),
    FOREIGN KEY (guest_email) REFERENCES user_guest(guest_email)
);



CREATE TABLE invitation (
    invitation_id INT AUTO_INCREMENT PRIMARY KEY,
    poll_id INT NOT NULL,
    guest_email VARCHAR(255),
    sent_date DATETIME,
    FOREIGN KEY (guest_email) REFERENCES user_guest(guest_email),
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id)
);



CREATE TABLE IF NOT EXISTS pais (
  id int(11) NOT NULL AUTO_INCREMENT,
  paisnombre varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=247 ;
