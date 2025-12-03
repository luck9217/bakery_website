# Luca's Loaves - Artisan Bakery Website

## Overview

This is a complete e-commerce website for Luca's Loaves, an artisan sourdough bakery located in Sydney, Australia.

## Features

### Pages Included:

1. **Home Page** - Features products, hero section, and business highlights
2. **About Us Page** - Store description and company values
3. **Careers Page** - Lists all open job positions from database
4. **Job Details Page** - Shows job details with application form (name, email, cover letter, resume upload)
5. **Products Page** - Displays all bread products from database
6. **Product Details Page** - Full product details with order form
7. **Shopping Cart Page** - Cart with checkout functionality
8. **Bread Making Class Page** - Class details with registration
9. **Contact Page** - Business contact details and Google Maps integration
10. **Privacy Policy Page** - Complete privacy policy (footer link only)
11. **Order Summary Page** - Confirmation page after checkout

### Technical Features:

- **Database-driven**: All products, jobs, and classes loaded from MySQL database
- **Session-based shopping cart**: Using OrderItem class for cart management
- **File uploads**: Job applications accept cover letter and resume uploads
- **Responsive design**: Bootstrap 5 with custom styling
- **Color scheme**: Brown (#c5a880) and Black as per branding
- **Accessibility**: Semantic HTML and ARIA labels
- **Contemporary design**: Clean, modern UI with Font Awesome icons

## Setup Instructions

### 1. Database Setup

1. Open PHPMyAdmin (http://localhost/phpmyadmin)
2. Import the `lucas_loaves.sql` file
3. This will create the database and populate it with sample data

### 2. File Structure

Ensure all files are in the correct locations:

```
lucasLoavesTemplate/
├── index.php
├── aboutUs.php
├── careers.php
├── jobDetails.php
├── products.php
├── productDetails.php
├── shoppingCart.php
├── breadMakingClass.php
├── contact.php
├── privacy.php
├── orderSummary.php
├── lucas_loaves.sql
├── lucaLoaves.js
├── contentPages/
│   ├── content.css
│   ├── contentHome.php
│   ├── contentAboutUs.php
│   ├── contentCareers.php
│   ├── contentJobDetails.php
│   ├── contentProducts.php
│   ├── contentProductDetails.php
│   ├── contentShoppingCart.php
│   ├── contentBreadMakingClass.php
│   ├── contentContact.php
│   ├── contentPrivacy.php
│   ├── contentOrderSummary.php
│   └── contentJobApplicationSent.php
├── templates/
│   ├── template.php
│   └── template.css
├── Processes/
│   ├── dbConnection.php
│   ├── lucasLoavesFunctions.php
│   ├── OrderItem.php
│   ├── processApplyJob.php
│   ├── processBreadClass.php
│   ├── processShoppingCart.php
│   ├── processCheckout.php
│   └── processRemoveItem.php
├── images/
│   ├── sourdough_white.jpg
│   ├── sourdough_rye.jpg
│   ├── sourdough_spelt.jpg
│   ├── sourdough_seeded.jpg
│   ├── bread_class.jpg
│   ├── bread_hero.jpg
│   ├── luca_bakery.jpg
│   ├── bakeryPhoto.jpg
│   └── placeholder.jpg
└── uploads/
    └── applications/
```

### 3. Database Configuration

Update `Processes/dbConnection.php` if your database credentials differ:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lucas_loaves');
```

### 4. Image Setup

Add the following images to the `images/` folder:

- `sourdough_white.jpg` - White sourdough bread
- `sourdough_rye.jpg` - Rye sourdough bread
- `sourdough_spelt.jpg` - Spelt sourdough bread
- `sourdough_seeded.jpg` - Seeded sourdough bread
- `bread_class.jpg` - Bread making class image
- `bread_hero.jpg` - Hero section background
- `luca_bakery.jpg` - About us bakery image
- `bakeryPhoto.jpg` - Contact page bakery image
- `placeholder.jpg` - Fallback image

If images are missing, placeholder images will be used automatically.

### 5. Upload Folder Permissions

Create the uploads folder and set permissions:

```
mkdir uploads/applications
chmod 777 uploads/applications
```

## Database Schema

### Tables:

1. **products** - Stores bread products
2. **bread_classes** - Stores bread making class information
3. **jobs** - Stores job openings
4. **job_applications** - Stores job applications
5. **orders** - Stores customer orders
6. **order_items** - Stores items in each order

## Design Guidelines

### Color Scheme:

- Primary: #c5a880 (Brown/Tan)
- Secondary: #000000 (Black)
- Background: #ffffff (White)
- Accent: #f8f9fa (Light Gray)

### Typography:

- Uses Bootstrap 5 default fonts
- Headings styled with company colors
- Consistent spacing and sizing

### Layout:

- Responsive grid layout
- Mobile-first approach
- Sticky navigation
- Footer with sitemap

## Features by Page

### Home Page

- Hero section with call-to-action
- Featured products grid
- Bread making class promotion
- "Why Choose Us" section

### Products Page

- Grid display of all active products
- Product cards with images and prices
- Direct links to product details

### Product Details Page

- Large product image
- Full description
- Add to cart form with quantity, pickup date/time
- Related features display

### Shopping Cart

- Item list with thumbnails
- Quantity and pickup details
- Remove item functionality
- Customer information form
- Payment information form
- Order total calculation

### Careers Page

- List of all open positions from database
- Employment type badges
- Location information
- "Why Work With Us" section

### Job Details Page

- Full job description
- Requirements
- Application form with file uploads
- Sticky application sidebar

### Bread Making Class Page

- Class details and schedule
- What's included
- Registration form
- YouTube video embed
- Price with GST breakdown

### Contact Page

- Business hours
- Contact information
- Google Maps integration
- Bakery photo

### Privacy Policy Page

- Complete privacy policy
- Organized into sections
- Legal compliance information

## Testing

### Test Data Generation:

- Shopping cart has "Generate Test Data" button
- Automatically fills customer and payment forms
- Useful for testing checkout process

### Sample Data:

The database includes:

- 4 sourdough bread products
- 1 bread making class
- 2 job openings

## Notes

- All prices are in AUD
- GST is included where applicable
- Session-based shopping cart (no database storage)
- File uploads stored in `uploads/applications/`
- Email functionality would need to be implemented for production
- Payment processing is simulated (not real)

## Browser Compatibility

- Chrome (recommended)
- Firefox
- Safari
- Edge
- Mobile browsers

## Dependencies

- PHP 7.0+
- MySQL 5.7+
- Bootstrap 5.0.0-beta1
- Font Awesome 5
- jQuery (for Bootstrap components)

## Support

For questions or issues, contact Luca's Loaves:

- Email: info@lucasloaves.com.au
- Phone: 9000 1234
- Address: 123 Pitt Street, Sydney NSW 2000

---

**Created: November 29, 2025**
**Version: 1.0**
