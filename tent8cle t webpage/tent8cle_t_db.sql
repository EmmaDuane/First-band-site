CREATE DATABASE tent8cle_t_webpage;
USE tent8cle_t_webpage;
CREATE TABLE users (
	username VARCHAR(16) PRIMARY KEY,
    userPassword VARCHAR(20),
    email VARCHAR(50)
);
CREATE TABLE audioUploads (
    submissionID INTEGER AUTO_INCREMENT PRIMARY KEY,
    audioFile VARCHAR(60),
    title VARCHAR(60),
    artist VARCHAR(40),
    genre VARCHAR(12),
);
CREATE TABLE artUploads (
    submissionID INTEGER AUTO_INCREMENT PRIMARY KEY,
    imageFile VARCHAR(60),
    title VARCHAR(60),
    artist VARCHAR(40)
);