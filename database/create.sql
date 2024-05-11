
    DROP TABLE IF EXISTS Users;
    CREATE TABLE Users (
        username TEXT PRIMARY KEY,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone_number TEXT,
        password TEXT NOT NULL,
        photo_url TEXT DEFAULT 'https://storage.googleapis.com/flutterflow-io-6f20.appspot.com/projects/uni-connect-4nugh7/assets/rpm3muv6rtc6/user_default.jpg',
        Country TEXT,
        Adress TEXT,
        Zip_code TEXT,
        Cidade TEXT,
        description TEXT,
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

    DROP TABLE IF EXISTS Brands;
    CREATE TABLE Brands (
        brand_id INTEGER PRIMARY KEY,
        brand_name TEXT NOT NULL
    );

    DROP TABLE IF EXISTS Conditions;
    CREATE TABLE Conditions (
        condition_id INTEGER PRIMARY KEY,
        condition_value TEXT UNIQUE NOT NULL
    );

    DROP TABLE IF EXISTS Item;
    CREATE TABLE Item (
        ItemID NUMERIC CONSTRAINT ITEM_PK PRIMARY KEY NOT NULL,
        model TEXT NOT NULL,
        item_name TEXT NOT NULL,
        description TEXT,
        price NUMERIC NOT NULL,
        seller NUMERIC NOT NULL REFERENCES Users(username) ON DELETE CASCADE,
        size_id NUMERIC REFERENCES Sizes(SizeID) ON DELETE CASCADE,
        condition_id NUMERIC NOT NULL REFERENCES Conditions(condition_id) ON DELETE CASCADE,
        category_id NUMERIC NOT NULL REFERENCES Categories(category_id) ON DELETE CASCADE,
        transaction_id NUMERIC REFERENCES Transactions(transaction_id) ON DELETE CASCADE,
        shopping_cart_id NUMERIC REFERENCES ShoppingCarts(shopping_cart_id) ON DELETE CASCADE,
        brand_id NUMERIC REFERENCES Brands(brand_id) ON DELETE CASCADE,
        is_sold BOOLEAN NOT NULL DEFAULT false
    );

    DROP TABLE IF EXISTS Transactions;
    CREATE TABLE Transactions (
        transaction_id INTEGER PRIMARY KEY,
        buyer INTEGER NOT NULL REFERENCES Users(username) ON DELETE CASCADE,
        seller INTEGER NOT NULL REFERENCES Users(username) ON DELETE CASCADE,
        item_id INTEGER NOT NULL REFERENCES Item(ItemID) ON DELETE CASCADE,
        total_value NUMERIC NOT NULL,
        transaction_date TEXT NOT NULL,
        card_id INTEGER NOT NULL REFERENCES Cards(card_id) ON DELETE CASCADE
    );



    DROP TABLE IF EXISTS ShoppingCarts;
    CREATE TABLE ShoppingCarts (
        shopping_cart_id NUMERIC NOT NULL PRIMARY KEY,
        userID INTEGER NOT NULL REFERENCES Users(username)
    );
    DROP TABLE IF EXISTS Whishlists;
    CREATE TABLE Whishlists (

        item_id NUMERIC NOT NULL,
        username INTEGER NOT NULL,
        PRIMARY KEY (item_id, username)
    );
    DROP TABLE IF EXISTS Photos;
    CREATE TABLE Photos (
        photo_id INTEGER PRIMARY KEY,
        photo_url TEXT NOT NULL,
        item_id INTEGER NOT NULL REFERENCES Item(ItemID) ON DELETE CASCADE
    );

    DROP TABLE IF EXISTS chats;
    CREATE TABLE chats (
    chat_id INTEGER PRIMARY KEY,
    seller INTEGER NOT NULL REFERENCES Users(username) ON DELETE CASCADE,
    buyer INTEGER NOT NULL REFERENCES Users(username) ON DELETE CASCADE,
    item_id INTEGER NOT NULL REFERENCES Item(ItemID) ON DELETE CASCADE
    );

    DROP TABLE IF EXISTS messages;
    CREATE TABLE messages (
    message_id INTEGER NOT NULL PRIMARY KEY,
    chat_id INTEGER NOT NULL REFERENCES chats(chat_id) ON DELETE CASCADE,
    sender_id INTEGER NOT NULL REFERENCES Users(username) ON DELETE CASCADE,
    message TEXT NOT NULL,
    timestamp TIMESTAMP,
    is_price_proposal BOOLEAN NOT NULL DEFAULT false,
    price_proposal NUMERIC
    );

    DROP TABLE IF EXISTS UserPrices;
    CREATE TABLE UserPrices (
    username INTEGER NOT NULL,
    ItemID INTEGER NOT NULL,
    proposed_price REAL NOT NULL,
    PRIMARY KEY(username, ItemID),
    FOREIGN KEY(username) REFERENCES Users(username),
    FOREIGN KEY(ItemID) REFERENCES Items(ItemID)
    );

    DROP TABLE IF EXISTS Cards;
    CREATE TABLE Cards (
    card_id INTEGER PRIMARY KEY,
    card_number TEXT NOT NULL,
    card_name TEXT NOT NULL,
    username TEXT NOT NULL REFERENCES Users(username) ON DELETE CASCADE,
    expiration_date TEXT NOT NULL,
    cvv TEXT NOT NULL
    );