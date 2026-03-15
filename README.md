# 🚀 Laravel Product Management API

![Laravel](https://img.shields.io/badge/Laravel-10-red)
![PHP](https://img.shields.io/badge/PHP-8-blue)
![REST API](https://img.shields.io/badge/API-REST-green)
![MySQL](https://img.shields.io/badge/Database-MySQL-orange)

A simple **RESTful API** built with Laravel for managing product data.
This project demonstrates backend development concepts including CRUD operations, searching, filtering, sorting, and pagination.

---

# 📌 Features

* Create Product
* Get All Products
* Get Product by ID
* Update Product
* Delete Product
* Search Products by Name
* Filter Products by Price Range
* Sort Products by Price
* Pagination

---

# 🛠 Tech Stack

| Technology | Description                  |
| ---------- | ---------------------------- |
| PHP        | Backend programming language |
| Laravel    | Backend framework            |
| MySQL      | Relational database          |
| REST API   | API architecture             |
| Postman    | API testing tool             |

---

# ⚙️ Installation

### 1 Clone Repository

```
git clone https://github.com/chirasuki/laravel-product-management.git
cd laravel-product-management
```

### 2 Install Dependencies

```
composer install
```

### 3 Setup Environment

Copy `.env` file

```
cp .env.example .env
```

Configure database

```
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=
```

### 4 Generate Application Key

```
php artisan key:generate
```

### 5 Run Migration

```
php artisan migrate
```

### 6 Start Development Server

```
php artisan serve
```

Server will run at

```
http://127.0.0.1:8000
```

---

# 📡 API Endpoints

| Method | Endpoint           | Description        |
| ------ | ------------------ | ------------------ |
| GET    | /api/products      | Get all products   |
| GET    | /api/products/{id} | Get product by ID  |
| POST   | /api/products      | Create new product |
| PUT    | /api/products/{id} | Update product     |
| DELETE | /api/products/{id} | Delete product     |

---

# 🔎 Search Products

Search product by name

```
GET /api/products?search=samsung
```

---

# 💰 Filter by Price

Filter products within price range

```
GET /api/products?min_price=10000&max_price=30000
```

---

# 🔽 Sort Products

Sort by price (low → high)

```
GET /api/products?sort=price_asc
```

Sort by price (high → low)

```
GET /api/products?sort=price_desc
```

---

# 📄 Pagination

```
GET /api/products?page=1
```

Default: **10 products per page**

---

# 🧪 API Example (Postman)

Example API response tested using Postman

![API Example](docs/postman-example.png)

---

# 📂 Project Structure

```
app/
 ├── Http/
 │   └── Controllers/
 │       └── ProductController.php
 └── Models/
     └── Product.php

routes/
 └── api.php
```

---

# 👨‍💻 Author

GitHub
https://github.com/chirasuki

---

# 📜 License

This project is open-source and available under the MIT License.
