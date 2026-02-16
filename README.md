# unep-skills-portal

A simple staff skills portal (PHP + MySQL) to manage staff profiles (Add/Edit/Delete/List).

## Tech Stack
- PHP (XAMPP)
- MySQL (phpMyAdmin)

## Setup (Local)
1. Install XAMPP and start **Apache** + **MySQL**
2. Copy this project into:
   C:\xampp\htdocs\unep-skills-portal

## Database Setup
1. Open phpMyAdmin: http://localhost/phpmyadmin
2. Create database: `unep_skills_db`
3. Import the SQL file:
   - Click `unep_skills_db`
   - Go to **Import**
   - Choose file: `database/unep_skills_db.sql`
   - Click **Go**

## Run
Open in browser:
http://localhost/unep-skills-portal/

## Pages
- Staff list: `/staff/list.php`
- Add staff: `/staff/create.php`
- Edit staff: `/staff/edit.php?id=1`
- Delete staff: `/staff/delete.php?id=1`
