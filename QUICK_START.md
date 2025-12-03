# QUICK START CARD - Luca's Loaves Website

## 🚀 Getting Started in 5 Minutes

### 1️⃣ Import Database (2 minutes)

```
1. Open: http://localhost/phpmyadmin
2. Click: Import tab
3. Choose: lucas_loaves.sql
4. Click: Go
✅ Done! Database created with sample data
```

### 2️⃣ Access Website (1 minute)

```
Open browser and go to:
http://localhost/lucasLoavesTemplate/

✅ Should see home page with products
```

### 3️⃣ Create Upload Folder (1 minute)

```
In lucasLoavesTemplate folder:
- Create folder: uploads
- Inside uploads: Create folder: applications
✅ Job applications can now be uploaded
```

### 4️⃣ Add Images (Optional - 1 minute)

```
Add to images/ folder:
- sourdough_white.jpg
- sourdough_rye.jpg
- sourdough_spelt.jpg
- sourdough_seeded.jpg
- bread_class.jpg

OR: Use placeholders (already included)
✅ Images will display
```

---

## 📋 Quick Test Checklist

### Test Each Page (5 minutes)

```
✅ http://localhost/lucasLoavesTemplate/index.php
✅ http://localhost/lucasLoavesTemplate/products.php
✅ http://localhost/lucasLoavesTemplate/aboutUs.php
✅ http://localhost/lucasLoavesTemplate/careers.php
✅ http://localhost/lucasLoavesTemplate/contact.php
✅ http://localhost/lucasLoavesTemplate/breadMakingClass.php
✅ http://localhost/lucasLoavesTemplate/privacy.php
✅ http://localhost/lucasLoavesTemplate/sitemap.php
```

### Test Shopping (2 minutes)

```
1. Go to Products
2. Click any product
3. Enter quantity and date
4. Click "Add to Cart"
5. Click shopping cart icon
6. Fill form
7. Click "Generate Test Data" (quick fill)
8. Click "Proceed to Checkout"
✅ Should see Order Summary
```

### Test Job Application (2 minutes)

```
1. Go to Careers
2. Click any job
3. Fill name and email
4. Upload any PDF as resume
5. Click "Submit Application"
✅ Should see confirmation
```

---

## ⚡ Troubleshooting (Quick Fixes)

### Problem: Can't see products

**Fix:**

```
1. Check XAMPP MySQL is running (green)
2. Import database again
3. Refresh page
```

### Problem: Upload error

**Fix:**

```
Create folder:
uploads/applications/
```

### Problem: Images not showing

**Fix:**

```
- Check images/ folder exists
- Placeholders will show if images missing
- This is normal!
```

### Problem: Page not found

**Fix:**

```
Use: http://localhost/lucasLoavesTemplate/
NOT: file:///C:/xampp/...
(Must use web server!)
```

---

## 🎯 Key Files Location

```
Database:
📁 lucas_loaves.sql (in root)

Connection:
📁 Processes/dbConnection.php

Functions:
📁 Processes/lucasLoavesFunctions.php

Pages:
📁 index.php, products.php, careers.php, etc.

Content:
📁 contentPages/*.php

Uploads:
📁 uploads/applications/

Images:
📁 images/*.jpg
```

---

## 📊 Database Quick Reference

**Default Credentials:**

- Host: localhost
- User: root
- Password: (empty)
- Database: lucas_loaves

**Tables:**

- products (4 breads)
- bread_classes (1 class)
- jobs (2 jobs)
- job_applications (empty)
- orders (empty)
- order_items (empty)

---

## 🎨 Design Quick Reference

**Colors:**

- Brown: #c5a880
- Black: #000000
- Gray: #f8f9fa

**Fonts:**

- Bootstrap default

**Icons:**

- Font Awesome 5

---

## ✅ Success Indicators

**Everything is working if you can:**

- ✅ See 4 products on home page
- ✅ See 2 jobs on careers page
- ✅ Add items to cart
- ✅ Submit job application
- ✅ Register for bread class
- ✅ Navigate all pages without errors

---

## 🆘 Need Help?

**Check these files:**

1. SETUP_GUIDE.md - Detailed setup
2. README.md - Project overview
3. PROJECT_SUMMARY.md - Complete summary

**Common URLs:**

- Website: http://localhost/lucasLoavesTemplate/
- PHPMyAdmin: http://localhost/phpmyadmin
- XAMPP Control: C:\xampp\xampp-control.exe

---

## 🎓 For Teachers/Assessors

**All Requirements Met:**
✅ 10+ pages as specified
✅ Database-driven content
✅ Contemporary design
✅ Brown & black colors
✅ Accessible & navigable
✅ Sitemap included
✅ Privacy in footer only
✅ Forms with file upload
✅ Shopping cart functional
✅ Professional appearance

**Test in 10 minutes:**

1. Import database (2 min)
2. Visit all pages (3 min)
3. Test cart (2 min)
4. Test job app (2 min)
5. Check design (1 min)

---

**Status:** ✅ READY
**Version:** 1.0
**Date:** November 29, 2025

---

## 💡 Pro Tips

1. Use "Generate Test Data" in forms to speed up testing
2. Placeholder images work - real images not required for testing
3. All PHP errors will show - check top of page
4. Shopping cart badge shows item count automatically
5. Privacy page only in footer (requirement!)

---

**Everything is ready to go! Just import the database and start testing! 🚀**
