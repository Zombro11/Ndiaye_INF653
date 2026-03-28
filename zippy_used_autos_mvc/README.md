# Zippy Used Autos - PHP/MySQL MVC Project

This is a complete starter solution for the Zippy Used Autos midterm project.

## Folder structure
- `index.php` - public homepage
- `admin/` - admin backend
- `controllers/` - page controllers
- `model/` - database functions
- `view/` - HTML/PHP views
- `config/database.php` - PDO connection
- `assets/styles.css` - styling
- `zippyusedautos.sql` - database creation + seed data

## Features included
- Public homepage lists all vehicles
- Default sort: price descending
- Optional sort: year descending
- Filter by one category at a time: make, type, or class
- Admin area at `/admin/`
- Delete vehicles from admin homepage
- Add vehicle page
- Separate admin pages for makes, types, and classes
- Add/delete makes, types, classes
- MVC organization with multiple controllers

## How to run in XAMPP
1. Put the project folder inside `htdocs`
2. Open phpMyAdmin
3. Import `zippyusedautos.sql`
4. Make sure `config/database.php` matches your MySQL username/password
5. Visit:
   - Public: `http://localhost/zippy_used_autos_mvc/`
   - Admin: `http://localhost/zippy_used_autos_mvc/admin/`

## Notes
- If deleting a make/type/class fails, it is usually because vehicles still reference that record through foreign keys.
- The uploaded Excel data was converted into the SQL seed file.
