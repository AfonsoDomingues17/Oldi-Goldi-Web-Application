INSERT INTO Users (username, name, email, phone_number, password, photo_url, Country, Adress, Zip_code, Cidade, description, isAdmin, isSeller) 
VALUES 
('john_doe', 'John Doe', 'john@example.com', '+1234567890', 'password123', 'https://example.com/photo.jpg', 'USA', '123 Main St', '12345', 'New York', 'I love hiking and photography', false, true),
('jane_smith', 'Jane Smith', 'jane@example.com', '+1987654321', 'qwerty456', 'https://example.com/profile.jpg', 'Canada', '456 Maple Ave', '56789', 'Toronto', 'Passionate about cooking and travel', true, false),
('sam_jones', 'Sam Jones', 'sam@example.com', '+1122334455', 'samspassword', NULL, 'UK', '789 Oak St', '67890', 'London', 'Tech enthusiast and gamer', false, true),
('lisa_white', 'Lisa White', 'lisa@example.com', '+4433221100', 'lisapass', 'https://example.com/lisa.jpg', 'Australia', '101 Palm St', '45678', 'Sydney', 'Fitness freak and nature lover', false, true),
('mike_brown', 'Mike Brown', 'mike@example.com', '+1555098765', 'mikepass123', NULL, 'Germany', '321 Elm St', '23456', 'Berlin', 'Musician and coffee addict', false, true),
('sara_green', 'Sara Green', 'sara@example.com', '+6667778889', 'green123', NULL, 'France', '543 Birch St', '34567', 'Paris', 'Art enthusiast and traveler', false, true),
('chris_taylor', 'Chris Taylor', 'chris@example.com', '+9876543210', 'taylorpass', 'https://example.com/chris.jpg', 'Brazil', '876 Pine St', '78901', 'Rio de Janeiro', 'Surfer and beach lover', false, true),
('emily_clark', 'Emily Clark', 'emily@example.com', '+1122334455', 'clarkpass', NULL, 'Japan', '234 Cedar St', '34567', 'Tokyo', 'Anime fan and foodie', false, true),
('adam_wilson', 'Adam Wilson', 'adam@example.com', '+1555098765', 'wilson123', NULL, 'Spain', '567 Walnut St', '90123', 'Madrid', 'History buff and language learner', false, true),
('olivia_tan', 'Olivia Tan', 'olivia@example.com', '+6667778889', 'tanpass', 'https://example.com/olivia.jpg', 'China', '890 Oak St', '23456', 'Beijing', 'Fashion designer and cat lover', false, true);


-- Categories
INSERT INTO Categories (category_id, category_name) 
VALUES 
(1, 'Clothing'),
(2, 'Electronics'),
(3, 'Books'),
(4, 'Home & Garden'),
(5, 'Sports'),
(6, 'Toys'),
(7, 'Health & Beauty'),
(8, 'Automotive'),
(9, 'Jewelry'),
(10, 'Food & Beverages');


-- Sizes
INSERT INTO Sizes (size_id, size_value) 
VALUES 
(1, 'Small'),
(2, 'Medium'),
(3, 'Large'),
(4, 'XL'),
(5, 'XXL');
-- Brands
INSERT INTO Brands (brand_id, brand_name) 
VALUES 
(1, 'Nike'),
(2, 'Apple'),
(3, 'Samsung'),
(4, 'IKEA'),
(5, 'Adidas'),
(6, 'Sony'),
(7, 'Cannon'),
(8, 'Honda'),
(9, 'Rolex'),
(10, 'Ralph Lauren');


-- Conditions
INSERT INTO Conditions (condition_id, condition_value) 
VALUES 
(1, 'New'),
(2, 'Used - Like New'),
(3, 'Used - Good'),
(4, 'Used - Fair'),
(5, 'Refurbished');

-- Item
INSERT INTO Item (ItemID, model, item_name, description, price, seller, size_id, condition_id, category_id, brand_id) 
VALUES 
(23456, 'DEF789', 'Womens Dress', 'Elegant evening dress perfect for special occasions.', 79.99, 'jane_smith', 3, 1, 1, NULL),
(34567, 'GHI012', 'Smartphone Case', 'Protective case compatible with iPhone 12 models.', 19.99, 'sam_jones', 6, 1, 2, NULL),
(45678, 'JKL345', 'Cookbook', 'Collection of delicious recipes from around the world.', 29.99, 'lisa_white', NULL, 3, 3, NuLL),
(56789, 'MNO678', 'Garden Table', 'Outdoor table made of weather-resistant materials.', 149.99, 'mike_brown', NULL, 1, 4, NULL),
(67890, 'PQR901', 'Nike dunks', 'Comfortable shoes designed for long-distance running.', 99.99, 'sara_green', 7, 1, 5, 1),
(78901, 'STU234', 'Samsung a12', 'Educational toy for children to enhance creativity.', 39.99, 'chris_taylor', NULL, 1, 6, 3),
(89012, 'VWX567', 'Iphone 14 Pro', 'Gentle cleanser to remove impurities and refresh skin.', 24.99, 'emily_clark', NULL, 1, 7, 2),
(90123, 'YZA890', 'Cannon Camera', 'High-performance battery for various car models.', 129.99, 'adam_wilson', NULL, 1, 8, 7),
(10123, 'BCD123', 'Gold Necklace', 'Exquisite necklace featuring sparkling diamonds.', 999.99, 'olivia_tan', NULL, 1, 9, NULL),
(11234, 'EFG456', 'Rolex Watch', 'Indulgent chocolates crafted from premium cocoa beans.', 19.99, 'john_doe', NULL, 1, 10, 9);


-- Transactions
INSERT INTO Transactions (transaction_id, buyer, seller, total_value, transaction_date) 
VALUES 
(3, 'sam_jones', 'john_doe', 79.99, '2024-04-22'),
(4, 'lisa_white', 'jane_smith', 19.99, '2024-04-23'),
(5, 'mike_brown', 'sam_jones', 149.99, '2024-04-24'),
(6, 'sara_green', 'mike_brown', 99.99, '2024-04-25'),
(7, 'chris_taylor', 'sara_green', 39.99, '2024-04-26'),
(8, 'emily_clark', 'chris_taylor', 24.99, '2024-04-27'),
(9, 'adam_wilson', 'emily_clark', 129.99, '2024-04-28'),
(10, 'olivia_tan', 'adam_wilson', 999.99, '2024-04-29'),
(11, 'john_doe', 'olivia_tan', 19.99, '2024-04-30');


-- Messages
INSERT INTO Messages (message_id, message_text, sent_at, sender, receiver) 
VALUES 
(3, 'Hi John, I would like to purchase the dress. Could you provide more photos?', '2024-04-22 11:00:00', 'sam_jones', 'john_doe'),
(4, 'Sure, I will send you additional photos shortly.', '2024-04-22 11:05:00', 'john_doe', 'sam_jones'),
(5, 'Hi Jane, do you have any other colors available for the dress?', '2024-04-23 12:00:00', 'lisa_white', 'jane_smith'),
(6, 'Yes, we have it in black as well. Would you like to see photos?', '2024-04-23 12:05:00', 'jane_smith', 'lisa_white'),
(7, 'Mike, I am interested in the garden table. Could you confirm the dimensions?', '2024-04-24 13:00:00', 'sara_green', 'mike_brown'),
(8, 'The dimensions are 60" x 36" x 30". Let me know if you need more information.', '2024-04-24 13:05:00', 'mike_brown', 'sara_green'),
(9, 'Chris, can you recommend building blocks suitable for a 5-year-old?', '2024-04-25 14:00:00', 'emily_clark', 'chris_taylor'),
(10, 'Certainly, I suggest our Classic Building Blocks set. It is ideal for that age range.', '2024-04-25 14:05:00', 'chris_taylor', 'emily_clark'),
(11, 'Adam, is the car battery compatible with a Honda Civic?', '2024-04-26 15:00:00', 'adam_wilson', 'adam_wilson'),
(12, 'Yes, it is compatible with various Honda models including the Civic.', '2024-04-26 15:05:00', 'adam_wilson', 'adam_wilson'),
(13, 'Olivia, your necklace design is stunning! Do you offer customization options?', '2024-04-27 16:00:00', 'olivia_tan', 'olivia_tan');


-- ShoppingCarts
INSERT INTO ShoppingCarts (shopping_cart_id, userID) 
VALUES 
(3, 'sam_jones'),
(4, 'lisa_white'),
(5, 'mike_brown'),
(6, 'sara_green'),
(7, 'chris_taylor'),
(8, 'emily_clark'),
(9, 'adam_wilson'),
(10, 'olivia_tan'),
(11, 'john_doe'),
(12, 'jane_smith');

-- Photos
INSERT INTO Photos (photo_id, photo_url, item_id) 
VALUES 
(3, 'https://rukminim2.flixcart.com/image/850/1000/xif0q/dress/h/k/g/l-lw-9102-b-tilton-original-imagjup95gdv5cec.jpeg?q=90&crop=false', 23456),
(4, 'https://www.montblanc.com/variants/images/1647597298488716/A/w2500.jpg', 34567),
(5, 'https://cdn.loveandlemons.com/wp-content/uploads/2023/01/cookbook3.jpg', 45678),
(6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6tJY_1G-vGFKn4TNZDf7qyEc2EliVs5RNcZ5IsUUUKg&s', 56789),
(7, 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/13a7f249-f843-4b7e-b882-b10b40eba036/sapatilhas-dunk-low-retro-5VNlqp.png', 67890),
(8, 'https://m.media-amazon.com/images/I/819stUwa7RL._AC_SL1500_.jpg', 78901),
(9, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-card-40-iphone15prohero-202309_FMT_WHH?wid=508&hei=472&fmt=p-jpg&qlt=95&.v=1693086369818', 89012),
(10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVI9dWrjv1Cs6iGLXBaetE94Ytug3KR56IxR3NzBWffg&s', 90123),
(11, 'https://zoandco.ie/cdn/shop/files/Zo_Co23rdMay0098.jpg?v=1685374882', 10123),
(12, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 11234);

