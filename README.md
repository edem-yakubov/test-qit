## Test Assignment: Senior PHP / Node.js Engineer

### Objective:

To evaluate your ability to architect and implement modular, maintainable backend services
using both PHP and Node.js. The focus is on clean code, RESTful API design, separation of
concerns, and inter-service communication.

### Task Overview:

Build a simple Order Management System composed of two services:

* A Product Service written in Node.js (used Node.js)
  * GET /products — return a list of available products
  * GET /products/:id — return a single product by ID
  * Products can be stored in memory (example fields: id, name, price)

* An Order Service written in PHP (Used Laravel)
  * POST /orders
    * Accepts productId and quantity
    * Makes a request to the Product Service to fetch the product price
    * Calculates totalPrice and stores the order in memory
    * Returns the created order: orderId, productId, quantity, totalPrice,
    createdAt
  * GET /orders — returns the list of orders


## USE:
### Docker:
```bash
docker compose build
docker compose up 
```

### Without Docker:
```bash
# For Node.js Product Service
cd node-product-service &&
npm install &&
npm run start
```

```bash
# For PHP Order Service
cd php-order-service &&
cp .env.example .env &&
composer install &&
php artisan migrate &&
php artisan serve
```


Used Node.js version: 22.9
Used PHP version: 8.4

### Notes:
Used SQL Lite for both services.
I dont use any security to communicate between services, to keep it simple. Otherwise it can be implemented with some token or use VPC.