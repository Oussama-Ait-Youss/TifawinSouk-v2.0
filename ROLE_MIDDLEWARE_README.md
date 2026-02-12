# Role-Based Middleware System

This project now includes a role-based middleware system that separates access between admin and user roles.

## What was implemented:

### 1. User Model Updates
- Added `role()` relationship to the User model
- Added helper methods:
  - `isAdmin()` - Returns true if user has admin role
  - `isUser()` - Returns true if user has user role

### 2. Middleware Classes
- **AdminMiddleware** (`app/Http/Middleware/AdminMiddleware.php`)
  - Protects routes that require admin privileges
  - Redirects to home page with error message if user is not admin
  
- **UserMiddleware** (`app/Http/Middleware/UserMiddleware.php`)
  - Protects routes that require user privileges
  - Redirects to home page with error message if user is not a regular user

### 3. Middleware Registration
- Registered middleware aliases in `bootstrap/app.php`:
  - `admin` -> `AdminMiddleware`
  - `user` -> `UserMiddleware`

### 4. Route Protection
Updated `routes/web.php` with role-based route groups:

#### Admin Routes (Protected by 'admin' middleware)
- `/admin/dashboard` - Admin dashboard
- `/admin/products/*` - All product management routes
- `/admin/category/*` - All category management routes  
- `/admin/fournisseurs/*` - All supplier management routes

#### User Routes (Protected by 'user' middleware)
- `/user/*` - User-specific routes (placeholder for future features)

#### Public Auth Routes
- `/profile` - Accessible by any authenticated user
- `/products` - Public product listing

### 5. Database Setup
- Roles table seeded with 'admin' and 'user' roles
- Admin user created via artisan command

## Usage Examples:

### Accessing Admin Routes
```php
// Only admins can access these routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('/admin/products', ProductController::class);
});
```

### Accessing User Routes
```php
// Only regular users can access these routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/orders', [UserController::class, 'orders']);
    Route::get('/user/wishlist', [UserController::class, 'wishlist']);
});
```

### Checking User Roles in Controllers/Views
```php
// In controllers
if (auth()->user()->isAdmin()) {
    // Admin logic
}

// In Blade views
@if (auth()->user()->isAdmin())
    <admin-only-content>
@endif
```

## Creating Admin Users
Use the artisan command to create admin users:
```bash
php artisan app:create-admin-user
```

## Testing the System
1. Admin users can access all admin routes (`/admin/*`)
2. Regular users will be redirected if they try to access admin routes
3. Unauthenticated users are redirected to login page
4. All users can access public routes like `/products`

The middleware system ensures proper role separation and protects sensitive admin functionality from unauthorized access.
