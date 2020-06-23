CREATE TABLE status(
   status_id INT,
   status_name VARCHAR(50),
   status_tax DECIMAL(4,2),
   PRIMARY KEY(status_id)
);

CREATE TABLE category(
   cat_id INT,
   cat_name VARCHAR(25),
   cat_primary INT NOT NULL,
   PRIMARY KEY(cat_id),
   FOREIGN KEY(cat_primary) REFERENCES category(cat_id)
);

CREATE TABLE supplier(
   supplier_id INT,
   supplier_lastname VARCHAR(50),
   supplier_firstname VARCHAR(50),
   supplier_address VARCHAR(100),
   supplier_zipcode VARCHAR(10),
   supplier_city VARCHAR(50),
   supplier_name VARCHAR(50),
   supplier_country VARCHAR(50),
   PRIMARY KEY(supplier_id)
);

CREATE TABLE _user(
   user_id INT,
   user_password VARCHAR(50),
   user_email VARCHAR(50),
   user_registrerdate DATE,
   PRIMARY KEY(user_id)
);

CREATE TABLE employee(
   employee_id INT,
   employee_lastname VARCHAR(50),
   employee_firstname VARCHAR(50),
   employee_phone VARCHAR(15),
   employee_address VARCHAR(100),
   employee_status ENUM('stock manager', 'salesperson', 'business salesperson'),
   user_id INT NOT NULL,
   PRIMARY KEY(employee_id),
   FOREIGN KEY(user_id) REFERENCES _user(user_id)
);

CREATE TABLE customer(
   customer_id INT,
   customer_lastname VARCHAR(50),
   customer_firstname VARCHAR(50),
   customer_country VARCHAR(25),
   customer_address VARCHAR(100),
   customer_zipcode VARCHAR(10),
   customer_city VARCHAR(100),
   customer_phone VARCHAR(15),
   customer_companyId INT,
   user_id INT NOT NULL,
   status_id INT NOT NULL,
   PRIMARY KEY(customer_id),
   FOREIGN KEY(user_id) REFERENCES _user(user_id),
   FOREIGN KEY(status_id) REFERENCES status(status_id)
);

CREATE TABLE _order(
   order_id INT,
   order_date DATE,
   order_status ENUM('cart', 'pending', 'paid', 'canceled', 'disputed', 'refunded'),
   order_discount DECIMAL(4,2),
   order_total DECIMAL(10,2),
   customer_id INT NOT NULL,
   PRIMARY KEY(order_id),
   FOREIGN KEY(customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE adress(
   address_id INT,
   address_lastname VARCHAR(50),
   address_firstname VARCHAR(50),
   address_address VARCHAR(100),
   address_zipcode VARCHAR(10),
   address_city VARCHAR(50),
   customer_id INT NOT NULL,
   PRIMARY KEY(address_id),
   FOREIGN KEY(customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE shipping(
   shipping_id INT,
   shipping_date DATE,
   delivery_date DATE,
   quantity_delivered INT,
   order_id INT NOT NULL,
   PRIMARY KEY(shipping_id),
   FOREIGN KEY(order_id) REFERENCES _order(order_id)
);

CREATE TABLE payment(
   payment_id INT,
   payment_date DATE,
   payment_total DECIMAL(10,2),
   order_id INT NOT NULL,
   PRIMARY KEY(payment_id),
   FOREIGN KEY(order_id) REFERENCES _order(order_id)
);

CREATE TABLE product(
   product_id INT,
   product_title VARCHAR(50),
   product_description VARCHAR(255),
   product_isAvailable tinyint(1),
   product_photo VARCHAR(50),
   cat_id INT NOT NULL,
   supplier_id INT NOT NULL,
   PRIMARY KEY(product_id),
   FOREIGN KEY(cat_id) REFERENCES category(cat_id),
   FOREIGN KEY(supplier_id) REFERENCES supplier(supplier_id)
);

CREATE TABLE creditcard(
   creditcard_id INT,
   creditcard_issuer VARCHAR(25),
   creditcard_number INT,
   creditcard_expirationdate DATE,
   customer_id INT NOT NULL,
   PRIMARY KEY(creditcard_id),
   FOREIGN KEY(customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE company(
   company_id INT,
   company_name VARCHAR(50),
   company_businessId INT,
   company_contactname VARCHAR(50),
   customer_id INT NOT NULL,
   PRIMARY KEY(company_id),
   UNIQUE(customer_id),
   FOREIGN KEY(customer_id) REFERENCES customer(customer_id)
);

CREATE TABLE orderdetails(
   order_id INT,
   product_id INT,
   orderdetails_quantity INT,
   orderdetails_unitprice DECIMAL(10,2),
   PRIMARY KEY(order_id, product_id),
   FOREIGN KEY(order_id) REFERENCES _order(order_id),
   FOREIGN KEY(product_id) REFERENCES product(product_id)
);
