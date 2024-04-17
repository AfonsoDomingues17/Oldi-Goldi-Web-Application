-- Users
INSERT INTO Users (username, name, email, phone_number, password, photo_url, Country, Adress, Zip_code, Cidade, description, isAdmin, isSeller) VALUES
('user1', 'John Doe', 'john@example.com', '+1234567890', 'password1', NULL, 'USA', '123 Main St', '12345', 'New York', 'Lorem ipsum dolor sit amet', false, true),
('user2', 'Jane Smith', 'jane@example.com', '+1987654321', 'password2', NULL, 'USA', '456 Elm St', '67890', 'Los Angeles', 'Consectetur adipiscing elit', false, false),
('admin', 'Admin User', 'admin@example.com', '+1122334455', 'adminpassword', NULL, 'USA', '789 Oak St', '54321', 'Chicago', 'Admin user with all privileges', true, false);

-- Categories
INSERT INTO Categories (category_id, category_name) VALUES
(1, 'Clothing'),
(2, 'Electronics'),
(3, 'Books');

-- Sizes
INSERT INTO Sizes (size_id, size_value) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large');

-- Brands
INSERT INTO Brands (brand_id, brand_name) VALUES
(1, 'Nike'),
(2, 'Apple'),
(3, 'Penguin Books');

-- Conditions
INSERT INTO Conditions (condition_id, condition_value) VALUES
(1, 'New'),
(2, 'Used'),
(3, 'Refurbished');

-- Item
INSERT INTO Item (ItemID, model, item_name, description, price, seller, size_id, condition_id, category_id, brand_id) VALUES
(1, 'Model1', 'T-Shirt', 'Comfortable cotton T-shirt', 15.99, 'user1', 1, 1, 1, 1),
(2, 'Model2', 'iPhone', 'Latest iPhone model with advanced features', 999.99, 'user2', NULL, 1, 2, 2),
(3, 'Model3', 'Book', 'Bestselling novel by a renowned author', 12.99, 'user1', NULL, 1, 3, 3);

-- Transactions
INSERT INTO Transactions (transaction_id, buyer, seller, total_value, transaction_date) VALUES
(1, 'user2', 'user1', 15.99, '2024-04-17'),
(2, 'user1', 'user2', 999.99, '2024-04-16'),
(3, 'user2', 'user1', 12.99, '2024-04-15');

-- Messages
INSERT INTO Messages (message_id, message_text, sent_at, sender, receiver) VALUES
(1, 'Hello, I am interested in buying this item.', '2024-04-17 10:00:00', 'user2', 'user1'),
(2, 'Sure, let me know if you need any further information.', '2024-04-17 10:05:00', 'user1', 'user2'),
(3, 'Thank you! Will do.', '2024-04-17 10:10:00', 'user2', 'user1');

-- ShoppingCarts
INSERT INTO ShoppingCarts (shopping_cart_id, userID) VALUES
(1, 'user1'),
(2, 'user2');

-- Photos
INSERT INTO Photos (photo_id, photo_url, item_id) VALUES
(1, 'https://content-management-files.canva.com/cdn-cgi/image/f=auto,q=70/2fdbd7ab-f378-4c63-8b21-c944ad2633fd/header_t-shirts2.jpg', 1),
(2, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-card-40-iphone15prohero-202309_FMT_WHH?wid=508&hei=472&fmt=p-jpg&qlt=95&.v=1693086369818', 2),
(3, 'https://m.media-amazon.com/images/I/61u6XmcImHL._AC_UF894,1000_QL80_.jpg', 3);
