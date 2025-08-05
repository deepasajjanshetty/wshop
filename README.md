<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# wshop Ecommerce Website

A modern ecommerce platform built with Laravel 12 and Vue.js 3 for selling clothing across different categories (Men, Women, Children).

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Features

### Customer Features
- **Product Browsing**: Browse products by category (Men, Women, Children)
- **Product Details**: View detailed product information with size and color options
- **Shopping Cart**: Add, update, remove items and clear cart functionality
- **Checkout Process**: Complete order with shipping information
- **Order Management**: View order history, track order status, and cancel orders
- **Search Functionality**: Search products by name or description
- **Responsive Design**: Mobile-friendly interface with Tailwind CSS
- **User Authentication**: Secure login/registration with Laravel Breeze

### Admin Features
- **Product Management**: Create, edit, delete, and toggle product status
- **Category Management**: Manage product categories
- **Order Management**: View and update order status
- **Inventory Management**: Track stock quantities
- **Featured Products**: Mark products as featured
- **Admin Authentication**: Separate admin login/registration system

## Technology Stack

- **Backend**: Laravel 12 with PHP 8.2+
- **Frontend**: Vue.js 3 with Inertia.js
- **Styling**: Tailwind CSS 3.2+
- **Build Tool**: Vite 6.2+
- **Database**: SQLite (can be configured for MySQL/PostgreSQL)
- **Authentication**: Laravel Breeze with Inertia
- **Development**: Laravel Pail for logging, Laravel Sail for Docker

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd wshop
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

   Or use the development script for full stack:
   ```bash
   composer run dev
   ```

## Database Structure

### Tables
- **users**: User accounts with role-based authentication (customer/admin)
- **categories**: Product categories (Men, Women, Children)
- **products**: Product information with sizes, colors, pricing, and images
- **cart_items**: Shopping cart items for authenticated users
- **orders**: Customer orders with shipping details and status tracking
- **order_items**: Individual items within orders

### Key Features
- **Product Variants**: Support for multiple sizes and colors (JSON storage)
- **Sale Pricing**: Regular and sale price support
- **Stock Management**: Track inventory levels
- **Order Tracking**: Order status management (pending, processing, shipped, delivered, cancelled)
- **Image Management**: Multiple product images with main image designation
- **Cart Persistence**: Shopping cart items stored in database

## Usage

### Customer Journey
1. Browse products by category at `/`
2. View product details and select size/color at `/product/{slug}`
3. Add items to shopping cart (requires authentication)
4. Manage cart at `/cart`
5. Proceed to checkout at `/checkout`
6. Complete order with shipping information
7. View order history at `/orders`
8. Track order status and cancel orders if needed

### Admin Journey
1. Access admin panel at `/admin/login`
2. Register new admin account at `/admin/register`
3. Manage products at `/admin/products`
4. Manage categories at `/admin/categories`
5. View and update orders
6. Monitor inventory levels

## API Endpoints

### Shop Routes
- `GET /` - Homepage with featured products
- `GET /category/{slug}` - Category products
- `GET /product/{slug}` - Product details
- `GET /search` - Product search

### Cart Routes (Authenticated)
- `GET /cart` - View cart
- `POST /cart/add` - Add item to cart
- `PATCH /cart/update` - Update cart item
- `DELETE /cart/remove` - Remove item from cart
- `DELETE /cart/clear` - Clear entire cart
- `GET /cart/count` - Get cart item count

### Order Routes (Authenticated)
- `GET /checkout` - Checkout page
- `POST /orders` - Place order
- `GET /orders` - Order history
- `GET /orders/{id}` - Order details
- `PATCH /orders/{id}/cancel` - Cancel order

### Admin Routes (Admin Only)
- `GET /admin/products` - Product management
- `POST /admin/products` - Create product
- `PUT /admin/products/{id}` - Update product
- `DELETE /admin/products/{id}` - Delete product
- `PATCH /admin/products/{id}/toggle-active` - Toggle product status
- `PATCH /admin/products/{id}/toggle-featured` - Toggle featured status
- `GET /admin/categories` - Category management
- `POST /admin/categories` - Create category
- `PUT /admin/categories/{id}` - Update category
- `DELETE /admin/categories/{id}` - Delete category

## Development

### Available Scripts
- `composer run dev` - Start full development stack (server, queue, logs, vite)
- `npm run dev` - Start Vite development server
- `npm run build` - Build production assets
- `composer test` - Run PHPUnit tests

### Key Components
- **ShopLayout.vue**: Main shop layout with navigation
- **AuthenticatedLayout.vue**: Layout for authenticated users
- **GuestLayout.vue**: Layout for guest users
- **Admin Controllers**: Separate admin namespace for admin functionality
- **Middleware**: Admin middleware for role-based access control

## Customization

### Adding New Categories
1. Create category in admin panel at `/admin/categories`
2. Add products to the category
3. Update navigation if needed

### Product Configuration
- **Sizes**: Configure available sizes in product creation (JSON array)
- **Colors**: Set available colors for each product (JSON array)
- **Pricing**: Set regular and sale prices
- **Images**: Upload multiple product images with main image designation
- **Status**: Toggle product active/inactive status
- **Featured**: Mark products as featured for homepage display

### Styling
- Modify Tailwind CSS classes in Vue components
- Update color scheme in `tailwind.config.js`
- Customize layout in `ShopLayout.vue`

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions, please open an issue in the repository.
