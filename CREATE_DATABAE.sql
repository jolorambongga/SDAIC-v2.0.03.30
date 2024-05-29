CREATE DATABASE IF NOT EXISTS SDAIC2;

USE SDAIC2;

CREATE TABLE IF NOT EXISTS tbl_Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username VARCHAR(255),
    password VARCHAR(255),
    first_name VARCHAR(255),
    middle_name VARCHAR(255),
    last_name VARCHAR(255),
    contact VARCHAR(20),
    email VARCHAR(255),
    address VARCHAR(255),
    birthday DATE,
    medical_history TEXT,
    history_id INT,
    userAppointmentHistory VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS tbl_Roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    role_name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS tbl_Appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT,
    service_id INT,
    appointment_date DATE,
    appointment_time TIME,
    notes TEXT,
    status VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS tbl_Services (
    service_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    service_name VARCHAR(255),
    description TEXT,
    duration INT,
    cost DECIMAL(10, 2),
    doctor_id INT
);

CREATE TABLE IF NOT EXISTS tbl_Doctors (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    doctor_name VARCHAR(255),
    avail_date VARCHAR(20),
    avail_time VARCHAR(20),
    contact VARCHAR(20),
    email VARCHAR(255),
    address VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS tbl_AppointmentHistory (
    appointment_id INT,
    status_changed_time DATETIME,
    old_status VARCHAR(50),
    new_status VARCHAR(50),
    changed_by VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS tbl_Logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT,
    action VARCHAR(255),
    time_stamp DATETIME,
    device VARCHAR(20),
    browser VARCHAR(20),
    details VARCHAR(255)
);

ALTER TABLE tbl_Appointments
ADD FOREIGN KEY (user_id)
REFERENCES tbl_Users(user_id);

ALTER TABLE tbl_Appointments
ADD FOREIGN KEY (service_id)
REFERENCES tbl_Services(service_id);

ALTER TABLE tbl_Services
ADD FOREIGN KEY (doctor_id)
REFERENCES tbl_Doctors(doctor_id);

ALTER TABLE tbl_AppointmentHistory
ADD FOREIGN KEY (appointment_id)
REFERENCES tbl_Appointments(appointment_id);

ALTER TABLE tbl_Logs
ADD FOREIGN KEY (user_id)
REFERENCES tbl_Users(user_id);