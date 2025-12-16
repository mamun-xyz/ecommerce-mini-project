# E-Commerce Mini Project (Laravel)

This is a technical assessment project built using **Laravel (PHP)** for backend development and **HTML, CSS, Bootstrap** for frontend design.  
The project includes **Category & Product Management**, **multi-image upload using Spatie Media Library**, and a **responsive product listing UI**.

---

## 🚀 Features

### Frontend

-   Responsive design using **Bootstrap 5**
-   Header with navigation (Home, Shop, Contact)
-   Product cards displaying:
    -   Product Image
    -   Product Name
    -   Current Price
    -   Previous (Strike-through) Price
    -   Category Name

### Backend

-   Category CRUD (Create, Read, Update, Delete)
-   Product CRUD with:
    -   Product Name
    -   Product ID (SKU)
    -   Price & Previous Price
    -   Quantity & Alert Quantity
    -   Category relationship
-   Multi-image upload using **Spatie Media Library**
-   Product details page showing all images
-   User authentication system

---

## 🛠️ Technologies Used

-   PHP 8+
-   Laravel 10+
-   MySQL
-   Bootstrap 5
-   Spatie Media Library
-   Blade Template Engine

---

## ⚙️ Installation & Setup Guide

Follow the steps below to run this project locally.

---

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/your-username/your-repository-name.git
cd your-repository-name
```

---

### 2️⃣ Install Dependencies

```bash
composer install
```

---

### 3️⃣ Environment Configuration

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure your database in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

---

### 4️⃣ Database Setup

Create the database in MySQL, then run migrations:

```bash
php artisan migrate
```

---

### 5️⃣ Configure Storage & Media Library

Create the symbolic link for storage:

```bash
php artisan storage:link
```

---

### 6️⃣ Start the Development Server

```bash
php artisan serve
```

The application will be available at: `http://127.0.0.1:8000`

---

## 👤 User Registration & Login

### First Time Setup

After running the application, you need to create a user account:

1. **Register a New Account**

    - Navigate to: `http://127.0.0.1:8000/register`
    - Fill in the registration form:
        - Name
        - Email Address
        - Password
        - Confirm Password
    - Click "Register"

2. **Login to the Application**

    - Navigate to: `http://127.0.0.1:8000/login`
    - Enter your credentials:
        - Email Address
        - Password
    - Click "Login"

3. **Access the Dashboard**
    - After successful login, you will be redirected to the dashboard
    - From here, you can manage:
        - Categories
        - Products
        - Product Images

---

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── CategoryController.php
│   │   └── ProductController.php
│   └── Models/
│       ├── Category.php
│       └── Product.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
│       ├── categories/
│       ├── products/
│       └── layouts/
├── routes/
│   └── web.php
└── public/
    ├── css/
    └── js/
```

---

## 🎯 Key Functionalities

### Category Management

-   ✅ Create new categories
-   ✅ View all categories
-   ✅ Update existing categories
-   ✅ Delete categories

### Product Management

-   ✅ Create new products with:
    -   Product Name
    -   Product ID (SKU)
    -   Current Price
    -   Previous Price (strike-through)
    -   Quantity
    -   Alert Quantity
    -   Category selection
-   ✅ Upload multiple images per product (Spatie Media Library)
-   ✅ View all products
-   ✅ Update product details
-   ✅ Delete products
-   ✅ Product detail page showing all images

### Frontend Features

-   ✅ Responsive product listing page
-   ✅ Product cards with images and pricing
-   ✅ Navigation header
-   ✅ Bootstrap 5 styling

---

## 📋 Database Schema

### Categories Table

| Column     | Type      | Description      |
| ---------- | --------- | ---------------- |
| id         | bigint    | Primary key      |
| name       | string    | Category name    |
| created_at | timestamp | Creation time    |
| updated_at | timestamp | Last update time |

### Products Table

| Column         | Type      | Description               |
| -------------- | --------- | ------------------------- |
| id             | bigint    | Primary key               |
| product_name   | string    | Product name              |
| product_id     | string    | Unique SKU                |
| price          | decimal   | Current price             |
| previous_price | decimal   | Original price (nullable) |
| quantity       | integer   | Stock level               |
| alert_quantity | integer   | Low stock alert threshold |
| category_id    | bigint    | Foreign key to categories |
| created_at     | timestamp | Creation time             |
| updated_at     | timestamp | Last update time          |

---

## 🔧 Troubleshooting

### Common Issues

**Issue: Database connection error**

-   Ensure MySQL is running
-   Verify database credentials in `.env`
-   Confirm the database exists

**Issue: Images not uploading**

-   Run `php artisan storage:link`
-   Check storage folder permissions
-   Verify Spatie Media Library is installed

**Issue: 404 errors**

-   Run `php artisan route:clear`
-   Run `php artisan cache:clear`

---

## 📸 Screenshots / Demo Video

> **Note**: A demonstration video showcasing the key functionalities (CRUD operations, image upload, and front-end design) is available for review.

**Key features demonstrated:**

-   Category CRUD operations
-   Product CRUD operations
-   Multi-image upload functionality
-   Responsive front-end design
-   Product listing and detail pages

---

## 📞 Contact

For any queries or support:

-   **WhatsApp**:017551139

---

## 📄 License

This project is created as a technical assessment and is for demonstration purposes only.

---

## 🙏 Acknowledgments

-   Laravel Framework
-   Bootstrap 5
-   Spatie Media Library
-   All open-source contributors

---

**Made with ❤️ for Technical Assessment**
