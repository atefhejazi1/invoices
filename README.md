# Invoice Management System

## Overview
This is a **Laravel-based Invoice Management System** that helps businesses manage invoices efficiently. It includes features for invoice creation, editing, viewing, and generating PDF reports.

## Features
- User authentication (Login/Register)
- Invoice creation and management
- PDF generation for invoices
- Client management
- Role-based access control
- Reports and statistics

## Installation
### 1. Clone the Repository
```bash
git clone https://github.com/AtefHejazi/invoice-system.git
cd invoice-system
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Configure Environment
Copy the `.env.example` file and update the necessary environment variables:
```bash
cp .env.example .env
```
Then, generate the application key:
```bash
php artisan key:generate
```

### 4. Set Up Database
Create a new database and update `.env` file with the database credentials:
```env
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
Run migrations and seed data:
```bash
php artisan migrate --seed
```

### 5. Run the Application
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` in your browser.

## Usage
- Register or log in as an admin.
- Add clients and create invoices.
- Manage payments and generate reports.
- Download invoices as PDFs.

## Contributing
If you'd like to contribute, feel free to fork this repository and submit a pull request.

## License
This project is licensed under the **MIT License**.

---
**Author:** Atef Hejazi  
**GitHub:** [AtefHejazi](https://github.com/atefhejazi1)
