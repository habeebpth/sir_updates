# Organization Coordinator Management System

A simple PHP and MySQL application for managing organization coordinators across 14 districts of Kerala.

## Features
- Add organization name in Malayalam
- Add coordinator details for all 14 Kerala districts
- Save data to MySQL database
- View saved data
- Full Malayalam language support

## Requirements
- PHP 7.0 or higher
- MySQL 5.6 or higher
- Web server (Apache/Nginx) or PHP built-in server

## Installation Steps

### 1. Database Setup
First, create the database and tables:

```bash
mysql -u root -p < database.sql
```

Or manually:
1. Open phpMyAdmin or MySQL command line
2. Run the SQL commands from `database.sql`

### 2. Configure Database Connection
Edit `config.php` and update your database credentials:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');           // Your MySQL username
define('DB_PASS', '');               // Your MySQL password
define('DB_NAME', 'coordinator_db');
```

### 3. File Structure
Place all files in your web server directory:
```
/your-web-directory/
├── index.php          # Main form
├── submit.php         # Form submission handler
├── view.php           # View saved data
├── config.php         # Database configuration
└── database.sql       # Database setup script
```

### 4. Start the Application

**Option A: Using PHP Built-in Server**
```bash
php -S localhost:8000
```
Then open: http://localhost:8000

**Option B: Using Apache/Nginx**
Place files in your web root directory (htdocs, www, or public_html)
Then open: http://localhost/your-directory/

## Usage

### Adding Data
1. Open `index.php` in your browser
2. Enter organization name (സംഘടനയുടെ പേര്)
3. Fill coordinator details for each district
4. Click "സമർപ്പിക്കുക" (Submit)

### Viewing Data
Open `view.php` to see all saved organizations and their coordinators

## Database Structure

### organizations table
- `id` - Auto increment primary key
- `name` - Organization name (VARCHAR 255)
- `created_at` - Timestamp

### coordinators table
- `id` - Auto increment primary key
- `organization_id` - Foreign key to organizations
- `district` - District name (VARCHAR 100)
- `name` - Coordinator name (VARCHAR 255)
- `mobile` - Mobile number (VARCHAR 15)
- `created_at` - Timestamp

## Districts Included
1. തിരുവനന്തപുരം (Thiruvananthapuram)
2. കൊല്ലം (Kollam)
3. പത്തനംതിട്ട (Pathanamthitta)
4. ആലപ്പുഴ (Alappuzha)
5. കോട്ടയം (Kottayam)
6. ഇടുക്കി (Idukki)
7. എറണാകുളം (Ernakulam)
8. തൃശ്ശൂർ (Thrissur)
9. പാലക്കാട് (Palakkad)
10. മലപ്പുറം (Malappuram)
11. കോഴിക്കോട് (Kozhikode)
12. വയനാട് (Wayanad)
13. കണ്ണൂർ (Kannur)
14. കാസർഗോഡ് (Kasaragod)

## Troubleshooting

### MySQL Connection Error
- Check database credentials in `config.php`
- Ensure MySQL service is running
- Verify database `coordinator_db` exists

### Malayalam Text Not Displaying
- Ensure database charset is `utf8mb4`
- Check that tables are created with proper charset

### Permission Errors
- Ensure web server has read access to PHP files
- Check file permissions (644 for files, 755 for directories)

## Security Notes
For production use, consider:
- Using prepared statements (already implemented)
- Adding input validation and sanitization
- Implementing user authentication
- Using HTTPS
- Restricting database user permissions
- Adding CSRF protection
