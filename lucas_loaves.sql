--------------------------------------------------------------
-- 0. Start fresh: delete and recreate the database
------------------------------------------------------------
DROP DATABASE IF EXISTS lucas_loaves;

CREATE DATABASE lucas_loaves
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE lucas_loaves;

------------------------------------------------------------
-- 1. PRODUCTS TABLE (4 breads) 
--    Matches the marking guide requirements:
--    - Product name
--    - Price DECIMAL(10,2)
--    - Description
--    - Image URL
------------------------------------------------------------
CREATE TABLE products (
    product_id   INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(100) NOT NULL,
    price        DECIMAL(10,2) NOT NULL,
    description  TEXT NOT NULL,
    image_url    VARCHAR(255) NOT NULL,
    is_active    BOOLEAN NOT NULL DEFAULT TRUE,
    created_at   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
                  ON UPDATE CURRENT_TIMESTAMP
);

-- Insert the four sourdough breads
-- Make sure these image files exist in your "images" folder
INSERT INTO products (name, price, description, image_url) VALUES
('Sourdough White', 7.00,
 'Our standard sourdough.',
 'images/sourdough_white.jpg'),

('Sourdough Rye', 8.00,
 'Sourdough created with 50% rye flour.',
 'images/sourdough_rye.jpg'),

('Sourdough Spelt', 9.00,
 'Sourdough created with 100% spelt flour.',
 'images/sourdough_spelt.jpg'),

('Sourdough Seeded', 9.50,
 'Sourdough including a mixture of yummy seeds.',
 'images/sourdough_seeded.jpg');

------------------------------------------------------------
-- 2. BREAD MAKING CLASS TABLE
--    Also extracted from the database (as required)
--    Includes: name, description, image, price, GST, schedule
------------------------------------------------------------
CREATE TABLE bread_classes (
    class_id      INT AUTO_INCREMENT PRIMARY KEY,
    name          VARCHAR(150) NOT NULL,
    description   TEXT NOT NULL,
    image_url     VARCHAR(255) NOT NULL,
    price_ex_gst  DECIMAL(10,2) NOT NULL,
    gst_rate      DECIMAL(4,2) NOT NULL DEFAULT 0.10,  -- 10% GST
    schedule      VARCHAR(255) NOT NULL,
    created_at    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
                   ON UPDATE CURRENT_TIMESTAMP
);

-- Insert the sourdough bread making class
INSERT INTO bread_classes (name, description, image_url, price_ex_gst, gst_rate, schedule) VALUES
(
 'Sourdough Bread Making Class',
 'First Saturday of every month. 9am to 5pm, with lunch provided. Learn to make your own bread.',
 'images/bread_class.jpg',
 350.00,
 0.10,
 'First Saturday of every month, 9am–5pm'
);

------------------------------------------------------------
-- 3. JOBS TABLE
--    For Careers page and Job Details page
--    All ongoing job opportunities must be extracted from DB
------------------------------------------------------------
CREATE TABLE jobs (
    job_id          INT AUTO_INCREMENT PRIMARY KEY,
    title           VARCHAR(150) NOT NULL,
    location        VARCHAR(150) NOT NULL DEFAULT '123 Pitt Street, Sydney NSW 2000',
    employment_type VARCHAR(50) NOT NULL,  -- e.g. Full-time, Part-time, Casual
    short_summary   TEXT NOT NULL,
    description     TEXT NOT NULL,
    requirements    TEXT NOT NULL,
    is_open         BOOLEAN NOT NULL DEFAULT TRUE,
    created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
                     ON UPDATE CURRENT_TIMESTAMP
);

-- Example jobs (you can edit these texts if your teacher gave you specific ones)
INSERT INTO jobs (title, employment_type, short_summary, description, requirements) VALUES
(
 'Retail Assistant (Front of House)',
 'Part-time',
 'Serve customers, handle payments and keep the shop front clean and welcoming.',
 'You will greet customers, explain our sourdough range, handle POS transactions and help with basic cleaning duties inside the shop.',
 'Friendly personality, basic cash handling skills, weekend availability.'
),
(
 'Baker Assistant',
 'Full-time',
 'Assist Luca in mixing, shaping and baking sourdough loaves.',
 'You will assist with dough preparation, shaping loaves, cleaning the work area and general bakery tasks. Early morning shifts are required.',
 'Interest in baking, ability to work early mornings, good physical fitness.'
);

------------------------------------------------------------
-- 4. JOB APPLICATIONS TABLE
--    For "Apply now" form on Job Details page
--    Stores name, email, and file paths for cover letter and resume
------------------------------------------------------------
CREATE TABLE job_applications (
    application_id    INT AUTO_INCREMENT PRIMARY KEY,
    job_id            INT NOT NULL,
    applicant_name    VARCHAR(150) NOT NULL,
    applicant_email   VARCHAR(150) NOT NULL,
    cover_letter_path VARCHAR(255) NULL,
    resume_path       VARCHAR(255) NULL,
    applied_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_job_applications_job
        FOREIGN KEY (job_id) REFERENCES jobs(job_id)
        ON DELETE CASCADE
);

------------------------------------------------------------
-- 5. ORDERS TABLE
--    For the Cart page: who ordered and when they pick up
------------------------------------------------------------
CREATE TABLE orders (
    order_id        INT AUTO_INCREMENT PRIMARY KEY,
    customer_name   VARCHAR(150) NOT NULL,
    customer_email  VARCHAR(150) NOT NULL,
    pickup_datetime DATETIME NOT NULL,    -- date and time the customer wants to pick up
    status          VARCHAR(50) NOT NULL DEFAULT 'Pending',
    created_at      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

------------------------------------------------------------
-- 6. ORDER ITEMS TABLE
--    Which loaves are in each order (product + quantity + unit price)
------------------------------------------------------------
CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id      INT NOT NULL,
    product_id    INT NOT NULL,
    quantity      INT NOT NULL,
    unit_price    DECIMAL(10,2) NOT NULL,  -- copy price from products at order time
    CONSTRAINT fk_order_items_order
        FOREIGN KEY (order_id) REFERENCES orders(order_id)
        ON DELETE CASCADE,
    CONSTRAINT fk_order_items_product
        FOREIGN KEY (product_id) REFERENCES products(product_id)
        ON DELETE RESTRICT
);
