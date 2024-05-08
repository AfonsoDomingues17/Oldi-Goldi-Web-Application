INSERT INTO Users (username, name, email, phone_number, password, photo_url, Country, Adress, Zip_code, Cidade, description, isAdmin, isSeller) 
VALUES 
('john_doe', 'John Doe', 'john@example.com', '+1234567890', 'password123', 'https://example.com/photo.jpg', 'USA', '123 Main St', '12345', 'New York', 'I love hiking and photography', false, true),
('jane_smith', 'Jane Smith', 'jane@example.com', '+1987654321', 'qwerty456', 'https://example.com/profile.jpg', 'Canada', '456 Maple Ave', '56789', 'Toronto', 'Passionate about cooking and travel', true, false),
('sam_jones', 'Sam Jones', 'sam@example.com', '+1122334455', 'samspassword', 'https://images.ctfassets.net/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=1200&h=992&fl=progressive&q=70&fm=jpg', 'UK', '789 Oak St', '67890', 'London', 'Tech enthusiast and gamer', false, true),
('lisa_white', 'Lisa White', 'lisa@example.com', '+4433221100', 'lisapass', 'https://example.com/lisa.jpg', 'Australia', '101 Palm St', '45678', 'Sydney', 'Fitness freak and nature lover', false, true),
('mike_brown', 'Mike Brown', 'mike@example.com', '+1555098765', 'mikepass123', NULL, 'Germany', '321 Elm St', '23456', 'Berlin', 'Musician and coffee addict', false, true),
('sara_green', 'Sara Green', 'sara@example.com', '+6667778889', 'green123', 'https://newprofilepic.photo-cdn.net//assets/images/article/profile.jpg?90af0c8', 'France', '543 Birch St', '34567', 'Paris', 'Art enthusiast and traveler', false, true),
('chris_taylor', 'Chris Taylor', 'chris@example.com', '+9876543210', 'taylorpass', 'https://example.com/chris.jpg', 'Brazil', '876 Pine St', '78901', 'Rio de Janeiro', 'Surfer and beach lover', false, true),
('emily_clark', 'Emily Clark', 'emily@example.com', '+1122334455', 'clarkpass', NULL, 'Japan', '234 Cedar St', '34567', 'Tokyo', 'Anime fan and foodie', false, true),
('adam_wilson', 'Adam Wilson', 'adam@example.com', '+1555098765', 'wilson123', NULL, 'Spain', '567 Walnut St', '90123', 'Madrid', 'History buff and language learner', false, true),
('olivia_tan', 'Olivia Tan', 'olivia@example.com', '+6667778889', 'tanpass', 'https://external-preview.redd.it/half-profile-portrait-of-a-young-22-year-old-woman-with-few-v0-0oEj7tQYK6jLKd6dZBL6Nvm6fUyAJbhoLgWBMMnn4TU.jpg?auto=webp&s=77a66a0c543ae960b220fed4660efb4a1de8f98d', 'China', '890 Oak St', '23456', 'Beijing', 'Fashion designer and cat lover', false, true);


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
(10, 'Ralph La');


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
(23457, 'DEF790', 'Womens Casual Shirt', 'Comfortable shirt for everyday wear.', 29.99, 'jane_smith', 5, 1, 1, NULL),
(23458, 'DEF791', 'Mens Summer Shorts', 'Light and airy shorts perfect for summer.', 39.99, 'jane_smith', 4, 1, 1, NULL),
(23459, 'DEF792', 'Unisex Formal Suit', 'Formal suit suitable for office wear.', 99.99, 'jane_smith', 3, 1, 1, NULL),
(23460, 'DEF793', 'Kids Party Dress', 'Stylish dress for kids parties and events.', 49.99, 'jane_smith', 2, 1, 1, NULL),
(23461, 'DEF794', 'Womens Maxi Skirt', 'Long, flowing skirt for a chic look.', 59.99, 'jane_smith', 6, 1, 1, NULL),
(90124, 'YZA891', 'Laptop', 'High-performance laptop for work and play.', 899.99, 'adam_wilson', 10, 2, 2, NULL),
(10124, 'BCD124', 'Bluetooth Speaker', 'Portable speaker with excellent sound quality.', 59.99, 'olivia_tan', 15, 2, 2, NULL),
(11235, 'EFG457', 'Smartphone', 'Latest model smartphone with advanced features.', 699.99, 'john_doe', 20, 2, 2, NULL),
(12345, 'HIJ890', 'Digital Camera', 'High-resolution digital camera for photography.', 499.99, 'jane_smith', 5, 2, 2, NULL),
(13456, 'KLM123', 'Gaming Console', 'Next generation gaming console for immersive gaming.', 399.99, 'sam_jones', 8, 2, 2, NULL),
(34567, 'GHI012', 'Smartphone Case', 'Protective case compatible with iPhone 12 models.', 19.99, 'sam_jones', 6, 1, 2, NULL),
(45678, 'JKL345', 'Cookbook', 'Collection of delicious recipes from around the world.', 29.99, 'lisa_white', NULL, 3, 3, NuLL),
(56789, 'MNO678', 'Garden Table', 'Outdoor table made of weather-resistant materials.', 149.99, 'mike_brown', NULL, 1, 4, NULL),
(67890, 'PQR901', 'Nike dunks', 'Comfortable shoes designed for long-distance running.', 99.99, 'sara_green', 7, 1, 1, 1),
(78901, 'STU234', 'Samsung a12', 'Educational toy for children to enhance creativity.', 39.99, 'chris_taylor', NULL, 1, 2, 3),
(89012, 'VWX567', 'Iphone 14 Pro', 'Gentle cleanser to remove impurities and refresh skin.', 24.99, 'emily_clark', NULL, 1, 2, 2),
(90123, 'YZA890', 'Cannon Camera', 'High-performance battery for various car models.', 129.99, 'adam_wilson', NULL, 1, 2, 7),
(10123, 'BCD123', 'Gold Necklace', 'Exquisite necklace featuring sparkling diamonds.', 999.99, 'olivia_tan', NULL, 1, 9, NULL),
(11234, 'EFG456', 'Rolex Watch', 'Indulgent chocolates crafted from premium cocoa beans.', 19.99, 'john_doe', NULL, 1, 9, 9);


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
(12, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 23457),
(13, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 23458),
(14, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 23459),
(15, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 23460),
(16, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 23461),
(17, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 90124),
(18, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 10124),
(19, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 11235),
(20, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 12345),
(21, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 11234),
(22, 'https://m.media-amazon.com/images/I/71SfVZ6rVeL._AC_SL1500_.jpg', 13456);



