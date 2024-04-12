
DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
    UserID NUMERIC CONSTRAINT PASSENGERID_PK PRIMARY KEY NOT NULL,
    username TEXT NOT NULL,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    phone_number TEXT NOT NULL,
    Country TEXT NOT NULL,
    Adress TEXT NOT NULL,
    Zip_code TEXT NOT NULL,
    Cidade TEXT,
    description TEXT,
    password TEXT NOT NULL,
    isAdmin BOOLEAN NOT NULL DEFAULT false,
    isSeller BOOLEAN NOT NULL DEFAULT false

);

DROP TABLE IF EXISTS Categories;
CREATE TABLE Categories (
    category_id INTEGER PRIMARY KEY,
    category_name TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS Sizes;
CREATE TABLE Sizes (
    size_id INTEGER PRIMARY KEY,
    size_value TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS Conditions;
CREATE TABLE Conditions (
    condition_id INTEGER PRIMARY KEY,
    condition_value TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS Item;
CREATE TABLE Item (
    ItemID NUMERIC CONSTRAINT ITEM_PK PRIMARY KEY NOT NULL,
    brand TEXT NOT NULL,
    model TEXT NOT NULL,
    item_name TEXT NOT NULL,
    description TEXT,
    price NUMERIC NOT NULL,
    seller_id NUMERIC NOT NULL REFERENCES Users(UserID) ON DELETE CASCADE,
    size_id NUMERIC REFERENCES Sizes(SizeID) ON DELETE CASCADE,
    condition_id NUMERIC NOT NULL REFERENCES Conditions(condition_id) ON DELETE CASCADE,
    category_id NUMERIC NOT NULL REFERENCES Categories(category_id) ON DELETE CASCADE,
    transaction_id NUMERIC REFERENCES Transactions(transaction_id) ON DELETE CASCADE,
    shopping_cart_id NUMERIC NOT NULL REFERENCES ShoppingCarts(shopping_cart_id) ON DELETE CASCADE

);

DROP TABLE IF EXISTS Transactions;
CREATE TABLE Transactions (
    transaction_id INTEGER PRIMARY KEY,
    buyer_id INTEGER NOT NULL REFERENCES Users(user_id) ON DELETE CASCADE,
    seller_id INTEGER NOT NULL REFERENCES Users(user_id) ON DELETE CASCADE,
    total_value NUMERIC NOT NULL,
    transaction_date TEXT NOT NULL
);

DROP TABLE IF EXISTS Messages;
CREATE TABLE Messages (
    message_id INTEGER PRIMARY KEY,
    message_text TEXT NOT NULL,
    sent_at TEXT,
    sender_id NUMERIC NOT NULL REFERENCES Users(user_id),
    receiver_id NUMERIC NOT NULL REFERENCES Users(user_id)
);

DROP TABLE IF EXISTS ShoppingCarts;
CREATE TABLE ShoppingCarts (
    shopping_cart_id NUMERIC NOT NULL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES Users(UserID)
);