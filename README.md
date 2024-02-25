# Roadways_management_system

# NTC Roadways Management System README

## Overview
The NTC Roadways Management System is a comprehensive web application developed for the Nottingham Transport Council (NTC). It facilitates various administrative tasks such as inserting new vehicles, adding people, auditing, recording fines, and more. This system is designed to streamline the operations of the NTC, making the management of roadways more efficient.

## System Requirements
- PHP-enabled server environment
- MySQL Database Server
- MySQL Workbench (for database setup and management)

## Installation Guide

### Step 1: System Configuration
Ensure that your system is set up with a PHP server and MySQL. These should be properly installed and running before proceeding with the project setup.

### Step 2: Database Setup
Using MySQL Workbench, create the database schema as per the provided ER diagram. This will involve creating tables for vehicles, people, incidents, fines, and other necessary entities.

### Step 3: Configuring the Web Application
- Locate the `config.php` file within the project directory.
- Edit this file to include your database connection details (host, username, password, database name).
- This file also initiates a session to record the user's history, essential for auditing purposes.

### Step 4: Accessing the Web Application
Navigate to the `home.php` page in your web browser. You can log in either as an administrator or a police officer, with each role having different access levels as defined in the project documentation.

### Step 5: Using the Application
- Follow the user interface prompts to add vehicles, people, and record incidents.
- Use the designated SQL queries for each operation as documented in the coursework requirements.
- Admin users have the ability to add fines and create new police user accounts.

### Step 6: Auditing and Security
The system includes an audit feature that tracks all operations performed within the website. It's recommended to review the audit logs periodically to ensure system integrity.

## Additional Notes
- For password changes and other user-specific actions, refer to the provided SQL queries in the technical documentation.
- Consider implementing additional validations and security measures to protect sensitive data and prevent unauthorized access.

## Conclusion
This README provides a basic overview and installation guide for the NTC Roadways Management System. For detailed usage instructions and troubleshooting, refer to the full technical documentation provided with the coursework.

---


Please ensure you follow the system configuration steps closely and have all the necessary software components installed before attempting to set up the web application.
