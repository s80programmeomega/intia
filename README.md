# INTIA INSURANCE MANAGEMENT SYSTEM

## 📋 Project Overview

Intia Insurance is a comprehensive web application built with Laravel 12, Blade templating, and Bootstrap 5 for managing insurance operations across multiple branches. The system allows administrators and agents to efficiently manage branches, customers, and insurance policies.

### Business Context
- **Head Office**: Main administrative center in Yaoundé
- **Branch Offices**: Intia-Douala and Intia-Yaounde
- **Purpose**: Centralized management of customer information and insurance policies across all locations

---

## ✨ Features

### Core Functionality
- ✅ **Branch Management**: Create, view, edit, and delete branch offices
- ✅ **Customer Management**: Full CRUD operations for customer records
- ✅ **Policy Management**: Manage insurance policies (Auto, Health, Life, Property)
- ✅ **User Authentication**: Secure login system with role-based access (Admin/Agent)
- ✅ **Dashboard**: Real-time statistics and quick access to all modules
- ✅ **Relationship Tracking**: Link customers to branches and policies

### Policy Types Supported
- Auto Insurance
- Health Insurance
- Life Insurance
- Property Insurance

### Policy Statuses
- Active
- Expired
- Cancelled

---

## 🛠️ Technology Stack

### Backend
- **Framework**: Laravel 12.x
- **PHP Version**: ^8.2
- **Database**: SQLite (default) - easily switchable to MySQL/PostgreSQL
- **Authentication**: Laravel Breeze

### Frontend
- **CSS Framework**: Bootstrap 5.3.8
- **JavaScript**: Alpine.js 3.4.2
- **Build Tool**: Vite 7.0.7
- **Additional**: Tailwind CSS 3.1.0 (for auth pages)

### Development Tools
- **Testing**: Pest PHP 3.8
- **Code Quality**: Laravel Pint 1.24
- **Local Development**: Laravel Sail 1.41
- **Logging**: Laravel Pail 1.2.2

---

## 📦 System Requirements

- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.x
- NPM >= 9.x
- SQLite3 (or MySQL/PostgreSQL)
- Git

---

## 🚀 Installation Guide

### Step 1: Clone the Repository
```bash
git clone https://github.com/s80programmeomega/intia
cd intia
```

### Step 2: Install PHP Dependencies
```bash
composer install
```

### Step 3: Install Node Dependencies
```bash
npm install
```

### Step 4: Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 5: Database Setup
```bash
# Create SQLite database file (if not exists)
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### Step 6: Build Frontend Assets
```bash
npm run build
```

### Step 7: Start Development Server
```bash
# Option 1: Simple server
php artisan serve

# Option 2: Full development environment (recommended)
composer run dev
```

Visit: `http://localhost:8000`

---

## 👤 Default Login Credentials

After seeding the database, use these credentials:

- **Email**: `admin@intia.com`
- **Password**: `admin`
- **Role**: Admin
- **Branch**: Head Office

---

## 📊 Database Schema

### Tables Overview

#### 1. branches
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | string | Branch name (unique) |
| location | string | Branch location |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

#### 2. customers
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | string | Customer full name |
| email | string | Email address (unique) |
| phone | string | Phone number |
| address | text | Physical address |
| date_of_birth | date | Date of birth |
| branch_id | bigint | Foreign key to branches |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

#### 3. policies
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| policy_number | string | Unique policy identifier |
| customer_id | bigint | Foreign key to customers |
| type | enum | Auto, Health, Life, Property |
| coverage_amount | decimal(12,2) | Coverage amount |
| premium_amount | decimal(10,2) | Premium amount |
| start_date | date | Policy start date |
| end_date | date | Policy end date |
| status | enum | Active, Expired, Cancelled |
| branch_id | bigint | Foreign key to branches |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

#### 4. users
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | string | User full name |
| email | string | Email address (unique) |
| role | enum | Admin or Agent |
| branch_id | bigint | Foreign key to branches (nullable) |
| password | string | Hashed password |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

### Relationships
- Branch → hasMany → Customers
- Branch → hasMany → Policies
- Branch → hasMany → Users
- Customer → belongsTo → Branch
- Customer → hasMany → Policies
- Policy → belongsTo → Customer
- Policy → belongsTo → Branch
- User → belongsTo → Branch

---

## 📁 Project Structure

```
intia/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── BranchController.php      # Branch CRUD operations
│   │       ├── CustomerController.php    # Customer CRUD operations
│   │       └── PolicyController.php      # Policy CRUD operations
│   └── Models/
│       ├── Branch.php                    # Branch model with relationships
│       ├── Customer.php                  # Customer model with relationships
│       ├── Policy.php                    # Policy model with relationships
│       └── User.php                      # User model with authentication
├── database/
│   ├── factories/
│   │   ├── BranchFactory.php            # Branch factory for testing
│   │   ├── CustomerFactory.php          # Customer factory for seeding
│   │   └── PolicyFactory.php            # Policy factory for seeding
│   ├── migrations/
│   │   ├── 2025_11_26_150744_create_branches_table.php
│   │   ├── 2025_11_26_151724_create_customers_table.php
│   │   ├── 2025_11_26_151851_create_policies_table.php
│   │   └── 2025_11_26_152005_add_role_and_branch_to_users_table.php
│   └── seeders/
│       ├── BranchSeeder.php             # Seeds 3 branches
│       ├── CustomerSeeder.php           # Seeds 20 sample customers
│       ├── PolicySeeder.php             # Seeds 30 sample policies
│       └── DatabaseSeeder.php           # Main seeder orchestrator
├── resources/
│   └── views/
│       ├── branches/                    # Branch views (index, create, edit, show)
│       ├── customers/                   # Customer views (index, create, edit, show)
│       ├── policies/                    # Policy views (index, create, edit, show)
│       ├── layouts/
│       │   └── bootstrap.blade.php      # Main Bootstrap layout
│       └── dashboard.blade.php          # Dashboard with statistics
└── routes/
    └── web.php                          # Application routes
```

---

## 🔧 Configuration

### Database Configuration

**SQLite (Default)**
```env
DB_CONNECTION=sqlite
```

**MySQL**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=intia
DB_USERNAME=root
DB_PASSWORD=your_password
```

**PostgreSQL**
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=intia
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### Application Configuration
```env
APP_NAME="Intia Insurance"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

---

## 🎯 Usage Guide

### Managing Branches
1. Navigate to **Branches** from the navigation menu
2. Click **Add Branch** to create a new branch
3. Fill in branch name and location
4. View branch details including customer and policy counts
5. Edit or delete branches as needed

### Managing Customers
1. Navigate to **Customers** from the navigation menu
2. Click **Add Customer** to register a new customer
3. Fill in customer details (name, email, phone, address, DOB, branch)
4. View customer profile with associated policies
5. Edit or delete customer records

### Managing Policies
1. Navigate to **Policies** from the navigation menu
2. Click **Add Policy** to create a new insurance policy
3. Select customer, policy type, coverage details, and dates
4. View policy details including customer information
5. Update policy status (Active, Expired, Cancelled)
6. Edit or delete policies

### Dashboard Overview
- View total counts for branches, customers, and policies
- Quick access links to all modules
- Real-time statistics

---

## 🧪 Testing

### Run Tests
```bash
# Run all tests
php artisan test

# Or using Pest
./vendor/bin/pest
```

### Sample Data
The seeder creates:
- 3 branches (Head Office, Intia-Douala, Intia-Yaounde)
- 20 sample customers
- 30 sample policies
- 1 admin user

---

## 🔒 Security Features

- CSRF protection on all forms
- Password hashing using bcrypt
- Authentication middleware on protected routes
- SQL injection prevention via Eloquent ORM
- XSS protection via Blade templating
- Email validation and unique constraints

---

## 📝 API Routes

### Authentication Routes
- `GET /login` - Login page
- `POST /login` - Authenticate user
- `POST /logout` - Logout user
- `GET /register` - Registration page
- `POST /register` - Register new user

### Resource Routes (Protected)
- `GET /branches` - List all branches
- `GET /branches/create` - Create branch form
- `POST /branches` - Store new branch
- `GET /branches/{id}` - Show branch details
- `GET /branches/{id}/edit` - Edit branch form
- `PUT /branches/{id}` - Update branch
- `DELETE /branches/{id}` - Delete branch

*(Similar routes exist for `/customers` and `/policies`)*

---

## 🐛 Troubleshooting

### Common Issues

**Issue: Database not found**
```bash
# Create SQLite database
touch database/database.sqlite
php artisan migrate
```

**Issue: Permission denied**
```bash
# Fix storage permissions
chmod -R 775 storage bootstrap/cache
```

**Issue: Vite manifest not found**
```bash
# Build assets
npm run build
```

**Issue: Class not found**
```bash
# Clear and regenerate autoload
composer dump-autoload
php artisan optimize:clear
```

---

## 🚀 Deployment

### Production Checklist
1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Run `npm run build`
7. Set proper file permissions
8. Configure web server (Apache/Nginx)
9. Set up SSL certificate
10. Configure database backups

---

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs/12.x)
- [Bootstrap Documentation](https://getbootstrap.com/docs/5.3)
- [Laravel Breeze](https://laravel.com/docs/12.x/starter-kits#laravel-breeze)

---

## 👥 Support

For issues or questions, please contact the development team or create an issue in the repository.

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**Built with ❤️ for Intia Insurance**
