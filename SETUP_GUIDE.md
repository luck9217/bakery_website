# SETUP GUIDE - Luca's Loaves Website

## Quick Start Guide

### Step 1: Import Database

1. Start XAMPP Control Panel
2. Start Apache and MySQL services
3. Open browser and go to: http://localhost/phpmyadmin
4. Click "New" to create a new database OR the SQL file will create it automatically
5. Click "Import" tab
6. Choose file: `lucas_loaves.sql`
7. Click "Go" to import
8. Database `lucas_loaves` should now be created with all tables and sample data

### Step 2: Verify File Structure

All files should be in: `C:\xampp\htdocs\lucasLoavesTemplate\`

Main pages (in root folder):

- index.php
- aboutUs.php
- careers.php
- contact.php
- jobDetails.php
- products.php
- productDetails.php
- shoppingCart.php
- breadMakingClass.php
- privacy.php
- orderSummary.php
- sitemap.php

### Step 3: Create Upload Folder

1. Create folder: `uploads\applications` inside lucasLoavesTemplate
2. Right-click folder > Properties > Security
3. Make sure "Users" has "Modify" permissions

### Step 4: Add Images (IMPORTANT!)

Add these images to the `images\` folder:

**Required bread images:**

- sourdough_white.jpg
- sourdough_rye.jpg
- sourdough_spelt.jpg
- sourdough_seeded.jpg

**Required page images:**

- bread_class.jpg (for bread making class page)
- bread_hero.jpg (for home page hero section)
- luca_bakery.jpg (for about us page)
- bakeryPhoto.jpg (for contact page)

**Note:** If you don't have images, the site will use placeholder.jpg automatically.

You can use any bread images you find online or create simple images.

### Step 5: Test Database Connection

1. Open browser
2. Go to: http://localhost/lucasLoavesTemplate/
3. You should see the home page with products loaded from database
4. If you see errors, check:
   - Is MySQL running in XAMPP?
   - Is the database imported?
   - Check `Processes\dbConnection.php` for correct credentials

### Step 6: Test All Pages

Visit each page to ensure it works:

- http://localhost/lucasLoavesTemplate/index.php (Home)
- http://localhost/lucasLoavesTemplate/aboutUs.php
- http://localhost/lucasLoavesTemplate/products.php
- http://localhost/lucasLoavesTemplate/careers.php
- http://localhost/lucasLoavesTemplate/breadMakingClass.php
- http://localhost/lucasLoavesTemplate/contact.php
- http://localhost/lucasLoavesTemplate/privacy.php
- http://localhost/lucasLoavesTemplate/sitemap.php

### Step 7: Test Functionality

**Test Shopping Cart:**

1. Go to Products page
2. Click "View Details" on any product
3. Fill in quantity and pickup date/time
4. Click "Add to Cart"
5. Go to Shopping Cart
6. Fill in customer details
7. Click "Proceed to Checkout"
8. Should see Order Summary page

**Test Job Application:**

1. Go to Careers page
2. Click "View Details & Apply" on any job
3. Fill in name and email
4. Upload resume (any PDF/DOC file)
5. Click "Submit Application"
6. Should see confirmation page

**Test Bread Class Registration:**

1. Go to Bread Making Class page
2. Click "Register for Next Class"
3. Should add class to shopping cart

## Common Issues & Solutions

### Issue: "Connection failed" error

**Solution:**

- Make sure MySQL is running in XAMPP
- Check database credentials in `Processes\dbConnection.php`
- Default is: host=localhost, user=root, password=(empty)

### Issue: No products showing

**Solution:**

- Make sure database is imported
- Check that `lucas_loaves` database exists in PHPMyAdmin
- Verify `products` table has 4 records

### Issue: Images not showing

**Solution:**

- Add images to `images\` folder
- Make sure filenames match exactly:
  - sourdough_white.jpg
  - sourdough_rye.jpg
  - sourdough_spelt.jpg
  - sourdough_seeded.jpg
- Placeholder images will show if files are missing

### Issue: File upload errors

**Solution:**

- Create `uploads\applications\` folder
- Set folder permissions to allow write access
- On Windows: Right-click > Properties > Security > Edit > Add "Modify" for Users

### Issue: Shopping cart not working

**Solution:**

- Make sure sessions are enabled in PHP
- Check that `OrderItem.php` exists in `Processes\` folder
- Clear browser cookies and try again

### Issue: Can't access pages

**Solution:**

- Make sure XAMPP Apache is running
- Access via: http://localhost/lucasLoavesTemplate/
- NOT via file:/// (must use web server)

## Database Information

### Tables Created:

1. **products** - 4 sourdough breads
2. **bread_classes** - 1 class record
3. **jobs** - 2 job openings
4. **job_applications** - Empty (will store applications)
5. **orders** - Empty (will store orders)
6. **order_items** - Empty (will store order items)

### Sample Data:

- 4 Products: Sourdough White ($7.00), Rye ($8.00), Spelt ($9.00), Seeded ($9.50)
- 1 Class: Sourdough Bread Making ($350 + GST)
- 2 Jobs: Retail Assistant (Part-time), Baker Assistant (Full-time)

## Features Checklist

✅ Home page with photos and graphics
✅ About Us page with store description
✅ Careers page listing all job opportunities from database
✅ Job Details page with application form (name, email, cover letter, resume)
✅ Products page listing all loaves from database
✅ Product Details page with full product details
✅ Shopping Cart with quantity, pickup date/time selection
✅ Bread Making Class page with registration button
✅ Contact page with business details and Google Maps link
✅ Privacy page (footer link only)
✅ Contemporary design using brown (#c5a880) and black colors
✅ Simple, easily navigable design
✅ Sitemap included
✅ Responsive (mobile-friendly)
✅ Accessible (semantic HTML, ARIA labels)

## Testing Checklist

- [ ] Database imported successfully
- [ ] All pages load without errors
- [ ] Products display from database
- [ ] Job listings display from database
- [ ] Can add products to cart
- [ ] Can checkout and see order summary
- [ ] Can apply for jobs with file upload
- [ ] Can register for bread class
- [ ] All images display (or placeholders)
- [ ] Navigation works on all pages
- [ ] Footer displays correctly
- [ ] Sitemap accessible from footer
- [ ] Privacy policy accessible from footer only
- [ ] Mobile responsive (test on phone or resize browser)

## Next Steps (For Production)

1. **Email Integration:** Add email sending for:

   - Order confirmations
   - Job application receipts
   - Class registration confirmations

2. **Payment Integration:**

   - Integrate real payment gateway (Stripe, PayPal, etc.)
   - Current implementation is simulated only

3. **Security Enhancements:**

   - Add CSRF protection
   - Sanitize all inputs
   - Add reCAPTCHA to forms
   - Implement proper file upload validation

4. **Admin Panel:**

   - Create admin area to manage products
   - Manage job listings
   - View orders and applications

5. **Real Images:**
   - Replace placeholder images with professional photos
   - Optimize images for web (compress, proper size)

## Support

If you encounter issues:

1. Check XAMPP error logs
2. Check browser console for JavaScript errors
3. Verify all files are in correct locations
4. Ensure database is imported correctly

## Credits

- Bootstrap 5.0.0-beta1
- Font Awesome 5
- Google Fonts
- Google Maps API

---

**Setup Date:** November 29, 2025
**Version:** 1.0
**Status:** Ready for Testing
