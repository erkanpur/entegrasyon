CREATE TABLE IF NOT EXISTS marketplaces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marketplace_id INT,
    name VARCHAR(100),
    api_key VARCHAR(255),
    token VARCHAR(255),
    FOREIGN KEY (marketplace_id) REFERENCES marketplaces(id)
);

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marketplace_id INT,
    external_order_id VARCHAR(100),
    status VARCHAR(50),
    shipping_name VARCHAR(100),
    total_price DECIMAL(10,2),
    items_json JSON,
    shipping_json JSON,
    created_at DATETIME,
    sync_date DATETIME,
    FOREIGN KEY (marketplace_id) REFERENCES marketplaces(id)
);

CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_name VARCHAR(255),
    quantity INT,
    price DECIMAL(10,2),
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

CREATE TABLE IF NOT EXISTS shipping_labels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    barcode VARCHAR(100),
    label_pdf VARCHAR(255),
    created_at DATETIME,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT,
    created_at DATETIME
);
