# Laravel User Hierarchy API (Without Roles)

This Laravel app provides a user hierarchy system using a `parent_id` structure. Users can view their own subordinates recursively.

---

## 🧬 Project Summary

- Uses `parent_id` in the `users` table to build user trees
- Laravel Sanctum for token-based API authentication
- Admins can see all users under them
- Employees see only their direct and indirect subordinates
- No `roles` column required

---

## ⚙ Setup Instructions

```bash
git clone https://github.com/shekhmanzurelahishadhin/hierarchy-role-permission.git
cd hierarchy-role-permission
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
