
CREATE DATABASE VOTE;
USE VOTE;
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    zipcode INT NOT NULL
);

CREATE TABLE poll (
    poll_id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(user_id)
);

CREATE TABLE poll_options (
    option_id INT AUTO_INCREMENT PRIMARY KEY,
    option_text TEXT NOT NULL,
    poll_id INT NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id)
);
CREATE TABLE user_guest (
    email VARCHAR(255) PRIMARY KEY
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
    FOREIGN KEY (guest_email) REFERENCES user_guest(email)
);



CREATE TABLE invitation (
    invitation_id INT AUTO_INCREMENT PRIMARY KEY,
    guest_email VARCHAR(255),
    poll_id INT NOT NULL,
    sent_date DATETIME,
    accepted ENUM('yes', 'no'),
    FOREIGN KEY (guest_email) REFERENCES user_guest(email),
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id)
);