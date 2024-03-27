CREATE DATABASE loan_db;

USE loan_db;

CREATE TABLE Loan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cust_num VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    no_of_inst INT NOT NULL,
    amt_inst DECIMAL(10, 2) NOT NULL,
    no_of_inst_over INT NOT NULL
);
