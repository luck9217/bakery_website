-- Quick Test Queries for Luca's Loaves Database
-- Run these in PHPMyAdmin SQL tab to verify database is working

-- 1. Check if database exists
SHOW DATABASES LIKE 'lucas_loaves';

-- 2. Select database
USE lucas_loaves;

-- 3. Show all tables
SHOW TABLES;

-- 4. Check products (should return 4 breads)
SELECT product_id, name, price FROM products WHERE is_active = TRUE;

-- 5. Check jobs (should return 2 jobs)
SELECT job_id, title, employment_type FROM jobs WHERE is_open = TRUE;

-- 6. Check bread class (should return 1 class)
SELECT class_id, name, price_ex_gst, gst_rate, schedule FROM bread_classes;

-- 7. Check product details
SELECT * FROM products;

-- 8. Check job details
SELECT * FROM jobs;

-- Expected Results:
-- Products: 4 rows (Sourdough White, Rye, Spelt, Seeded)
-- Jobs: 2 rows (Retail Assistant, Baker Assistant)
-- Bread Classes: 1 row (Sourdough Bread Making Class)

-- If you see the expected results above, your database is working correctly! ✅
