
# 🏦 Money Management System (MMS)

Welcome to the **Money Management System** (MMS)! This application is designed using **PHP** and **MySQL** to help users manage their income, expenses, and investments effortlessly.

## 📚 Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## ⭐ Features

- **Add, edit, and delete transactions**
- **Categorize transactions** as income or expenses
- **View transaction history**
- **Dashboard** for a summary of finances

## ⚙️ Installation

To set up this project, follow these steps:





### Step 1: Download and Install XAMPP

1. **Download XAMPP**
   - Visit the [XAMPP official website](https://www.apachefriends.org/index.html).
   - Download the version suitable for your operating system (Windows, macOS, Linux).

2. **Install XAMPP**
   - Run the downloaded installer.
   - Follow the on-screen instructions to complete the installation.
   - During installation, ensure that **Apache** and **MySQL** are selected.





### Step 2: Start XAMPP Services

1. **Open XAMPP Control Panel**
   - After installation, open the **XAMPP Control Panel**.

2. **Start Services**
   - Click on **Start** next to **Apache** and **MySQL** to run these services. Ensure that both services show a green background indicating they are running.





### Step 3: Clone the Repository

1. **Open Command Prompt**
   - Press `Win + R`, type `cmd`, and hit Enter.

2. **Clone the Repository**
   ```bash
   git clone https://github.com/Deady007/mms.git
   ```

### Step 4: Place the Project in the XAMPP Directory

1. **Move Project Folder**
   - Copy the cloned repository folder (`mms`) into the `htdocs` directory of your XAMPP installation, usually located at:
     ```
     C:\xampp\htdocs

     ```

### Step 5: Database Setup

1. **Open phpMyAdmin**
   - In your web browser, go to:
     ```
     http://localhost/phpmyadmin

     ```

2. **Create a New Database**
   - Click on the **Databases** tab.
   - Enter a name for your database (e.g., `money_management_system`) and click **Create**.

3. **Import the SQL File**
   - Download the SQL file from the `SQL` folder in this repository.
   - Click on the newly created database.
   - Go to the **Import** tab.
   - Click **Choose File** and select the `MMS.sql` file from the `SQL` folder.
   - Click **Go** to execute the import.

### Step 6: Usage

1. **Access the Application**
   - Open your web browser and go to:
     http://localhost/mms



---

Thank you for using the **Money Management System**! We hope you find it helpful in managing your finances! 💰
```
