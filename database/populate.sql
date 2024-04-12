-- Users
INSERT INTO Users (UserID, username, name, email, phone_number, Country, Adress, Zip_code, Cidade, description, password, isAdmin, isSeller) VALUES
(1, 'john_doe', 'John Doe', 'john@example.com', '123456789', 'USA', '123 Main St', '12345', 'New York', 'Regular user', 'password123', false, false),
(2, 'jane_smith', 'Jane Smith', 'jane@example.com', '987654321', 'Canada', '456 Oak St', '67890', 'Toronto', 'Another user', 'password456', false, false),
(3, 'bob_jackson', 'Bob Jackson', 'bob@example.com', '456123789', 'UK', '789 Elm St', '54321', 'London', 'Admin user', 'password789', true, false),
(4, 'sara_carter', 'Sara Carter', 'sara@example.com', '321654987', 'France', '101 Pine St', '13579', 'Paris', 'Seller user', 'password987', false, true);

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

-- Conditions
INSERT INTO Conditions (condition_id, condition_value) VALUES
(1, 'New'),
(2, 'Used - Like New'),
(3, 'Used - Good');

-- Items
INSERT INTO Item (ItemID, brand, model, item_name, description, price, seller_id, size_id, condition_id, category_id, transaction_id, shopping_cart_id) VALUES
(1, 'Nike', 'Air Force 1', 'Nike Air Force 1 Shoes', 'Classic Nike shoes in white color', 100.00, 4, 2, 1, 1, NULL, 1),
(2, 'Samsung', 'Galaxy S20', 'Samsung Galaxy S20 Smartphone', 'Flagship smartphone with high-end features', 800.00, 4, NULL, 1, 2, NULL, 2),
(3, 'Apple', 'MacBook Pro', 'Apple MacBook Pro Laptop', 'Powerful laptop for professional use', 1500.00, 4, NULL, 1, 2, NULL, 1);

-- Transactions
INSERT INTO Transactions (transaction_id, buyer_id, seller_id, total_value, transaction_date) VALUES
(1, 1, 4, 100.00, '2024-04-10'),
(2, 2, 4, 800.00, '2024-04-11'),
(3, 3, 4, 1500.00, '2024-04-12');

-- Messages
INSERT INTO Messages (message_id, message_text, sent_at, sender_id, receiver_id) VALUES
(1, "Hi, I'm interested in your Nike shoes.", '2024-04-10 08:00:00', 1, 4),
(2, "Sure, they're still available. Would you like to arrange a meeting?", '2024-04-10 08:05:00', 4, 1),
(3, 'Yes, that would be great. How about tomorrow?', '2024-04-10 08:10:00', 1, 4);

-- ShoppingCarts
INSERT INTO ShoppingCarts (shopping_cart_id, user_id) VALUES
(1, 1),
(2, 2),
(3, 3);
