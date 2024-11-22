-- SQL Import File for creating the Donation table

CREATE DATABASE IF NOT EXISTS DonationDB;

USE DonationDB;

CREATE TABLE IF NOT EXISTS Donation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mail VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    type VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    address VARCHAR(200) NOT NULL
);

-- Insert sample data (optional)
INSERT INTO Donation (name, mail, phone, type, quantity, address)
VALUES
    ('Alice Johnson', 'alice.johnson@example.com', '1234567890', 'Clothes', 10, '123 Elm Street, Springfield');
