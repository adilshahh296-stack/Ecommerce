# OurShopee E-Commerce Platform

A complete e-commerce website built with Laravel, Filament Admin, and Tailwind CSS.

## Features

 **Frontend**
- Product listing with category filtering
- Product detail pages with related products
- Shopping cart with add/remove/update functionality
- Responsive design
- Homepage with featured products

 **Admin Panel (Filament)**
- Product management (CRUD)
- Category management
- Order tracking
- Beautiful admin interface

 **Database**
- User management
- Product catalog
- Order management
- Category organization

## Getting Started

### Prerequisites
- Laravel Herd installed (includes PHP 8.4, Composer, MySQL)
- Node.js (for Tailwind CSS)

### Installation

1. **Start Laravel Herd**
   - Open Laravel Herd application

2. **Navigate to project**
   ```bash
   cd C:\ecommerce
   ```

3. **Run migrations** (if needed)
   ```bash
   php artisan migrate
   ```

4. **Seed sample data** (optional)
   ```bash
   php artisan db:seed
   ```

5. **Start development server**
   ```bash
   php artisan serve
   ```

6. **Open in browser**
   - Frontend: http://127.0.0.1:8000
   - Admin Panel: http://127.0.0.1:8000/admin
   - Admin Login: kakaqasim10@gmail.com / (password you set)

## Project Structure

```
ecommerce/
 app/
    Models/              # Database models
    Http/Controllers/    # Frontend & API controllers
    Filament/            # Admin panel resources
 resources/
    views/               # Blade templates
        welcome.blade.php
        products/
           index.blade.php
           show.blade.php
        cart/
            index.blade.php
 routes/
    web.php              # Frontend routes
 database/
    migrations/          # Database schemas
    seeders/             # Sample data
 public/                  # Static files
```

## Key Routes

| Route | Method | Description |
|-------|--------|-------------|
| `/` | GET | Homepage |
| `/products` | GET | All products |
| `/products/{slug}` | GET | Product detail |
| `/category/{slug}` | GET | Products by category |
| `/cart` | GET | Shopping cart |
| `/cart/{product}/add` | POST | Add to cart |
| `/cart/{product}/remove` | DELETE | Remove from cart |
| `/admin` | GET | Admin dashboard |

## Database Schema

### Products Table
- id, name, slug, description, price, original_price
- stock, image, rating, reviews_count, is_active
- category_id, timestamps

### Categories Table
- id, name, slug, description, image
- is_active, timestamps

### Orders Table
- id, user_id, order_number, status, total
- customer_name, customer_email, shipping_address
- city, postal_code, country, paid_at, shipped_at
- timestamps

### OrderItems Table
- id, order_id, product_id, quantity, price
- timestamps

## Admin Panel Features

Access admin at: http://127.0.0.1:8000/admin

### Manage Products
- Create, edit, delete products
- Set prices and stock levels
- Upload product images
- Manage ratings

### Manage Categories
- Create and organize categories
- Control category visibility
- Add category descriptions

### View Orders
- Track all customer orders
- View order status
- See order details and items

## Customization

### Add More Fields
To add more product fields:
1. Create migration: `php artisan make:migration add_fields_to_products_table`
2. Update the migration
3. Run: `php artisan migrate`
4. Update Product model and Filament resource

### Change Colors/Styling
Edit Tailwind classes in blade files:
- `resources/views/app.blade.php` (navbar colors)
- `resources/views/welcome.blade.php` (hero section)
- Other view files

### Add Payment Integration
Update `CartController` to integrate Stripe/PayPal:
- Create Checkout controller
- Add payment routes
- Handle webhooks

## Commands Reference

```bash
# Generate new model with migration
php artisan make:model ModelName -m

# Create controller
php artisan make:controller ControllerName

# Generate Filament resource
php artisan make:filament-resource ResourceName --generate

# Run migrations
php artisan migrate

# Run seeders
php artisan db:seed --class=SeederName

# Clear cache
php artisan cache:clear

# View Tinker (test code)
php artisan tinker
```

## Troubleshooting

### Port already in use
```bash
php artisan serve --port=9000
```

### Database errors
```bash
php artisan migrate:fresh --seed
```

### Filament not showing
```bash
php artisan cache:clear
php artisan config:clear
```

## Next Steps

1. **Add Payment Gateway**
   - Integrate Stripe or PayPal
   - Create checkout flow

2. **Add User Authentication**
   - User registration/login
   - My Orders page
   - Saved addresses

3. **Add Search & Filters**
   - Product search
   - Price range filtering
   - Advanced filtering

4. **Add Reviews & Ratings**
   - Customer reviews
   - Rating system
   - Review moderation

5. **Email Notifications**
   - Order confirmation
   - Shipping updates
   - Admin notifications

## Support

For issues or questions, check:
- Laravel documentation: https://laravel.com
- Filament documentation: https://filamentphp.com
- Tailwind CSS: https://tailwindcss.com

---

**Built with  using Laravel, Filament, and Tailwind CSS**
