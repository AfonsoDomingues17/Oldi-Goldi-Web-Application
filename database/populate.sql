-- Populate Users table
INSERT INTO Users (username, name, email, phone_number, password, isAdmin, isSeller)
VALUES 
    ('user1', 'User One', 'user1@example.com', '1234567890', 'password1', 'false', 'true'),
    ('user2', 'User Two', 'user2@example.com', '9876543210', 'password2', 'false', 'false'),
    ('admin', 'Admin User', 'admin@example.com', '5555555555', 'adminpassword', 'true', 'false');

-- Populate Categories table
INSERT INTO Categories (category_id, category_name)
VALUES 
    (1, 'Electronics'),
    (2, 'Clothing'),
    (3, 'Books');

-- Populate Sizes table
INSERT INTO Sizes (size_id, size_value)
VALUES 
    (1, 'Small'),
    (2, 'Medium'),
    (3, 'Large');

-- Populate Brands table
INSERT INTO Brands (brand_id, brand_name)
VALUES 
    (1, 'Nike'),
    (2, 'Adidas'),
    (3, 'Apple');

-- Populate Conditions table
INSERT INTO Conditions (condition_id, condition_value)
VALUES 
    (1, 'New'),
    (2, 'Used');

-- Populate Item table
INSERT INTO Item (ItemID, model, item_name, description, price, seller, size_id, condition_id, category_id, brand_id)
VALUES 
    (1, 'Model1', 'Item One', 'Description of item one', 100.00, 'user1', 1, 1, 1, 1),
    (2, 'Model2', 'Item Two', 'Description of item two', 150.00, 'user2', 2, 2, 2, 2);

-- Populate Transactions table
INSERT INTO Transactions (transaction_id, buyer, seller, total_value, transaction_date)
VALUES 
    (1, 'user1', 'user2', 100.00, '2024-04-15'),
    (2, 'user2', 'user1', 150.00, '2024-04-16');

-- Populate Messages table
INSERT INTO Messages (message_id, message_text, sent_at, sender, receiver)
VALUES 
    (1, 'Hello from user1 to user2', '2024-04-15 10:00:00', 'user1', 'user2'),
    (2, 'Hello from user2 to user1', '2024-04-15 10:05:00', 'user2', 'user1');

-- Populate ShoppingCarts table
INSERT INTO ShoppingCarts (shopping_cart_id, userID)
VALUES 
    (1, 'user1'),
    (2, 'user2');
