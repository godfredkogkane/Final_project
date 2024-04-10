USE mysql;

DROP DATABASE IF EXISTS Food_ordering_system;

CREATE DATABASE Food_ordering_system;

USE Food_ordering_system;

-- Create the Users Table if it does not exist
CREATE TABLE IF NOT EXISTS Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Firstname VARCHAR(50) NOT NULL,
    Lastname VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Phone VARCHAR(20),
    Pass_word VARCHAR(255) NOT NULL
);

-- Create the Snacks Table
CREATE TABLE IF NOT EXISTS Snacks (
    SnackID INT AUTO_INCREMENT PRIMARY KEY,
    SnackName VARCHAR(100) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Image VARCHAR(255) NOT NULL
);

-- Create the Local Dishes Table
CREATE TABLE IF NOT EXISTS LocalDishes (
    LocalDishID INT AUTO_INCREMENT PRIMARY KEY,
    LocalDishName VARCHAR(100) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Image VARCHAR(255) NOT NULL
);

-- Create the Continental Dishes Table
CREATE TABLE IF NOT EXISTS ContinentalDishes (
    ContinentalDishID INT AUTO_INCREMENT PRIMARY KEY,
    ContinentalDishName VARCHAR(100) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Image VARCHAR(255) NOT NULL
);

-- Create the Feedback Table
CREATE TABLE IF NOT EXISTS Feedback (
    FeedbackID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    Message TEXT NOT NULL,
    _Date DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE
);

-- Create the OrderHistory Table
CREATE TABLE IF NOT EXISTS OrderHistory (
    UserID INT NOT NULL,
    ItemName VARCHAR(100) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    OrderDate DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE
);

-- Populate the Snacks table with prices in Ghana cedis
INSERT INTO Snacks (SnackName, Price, Image) VALUES
('Chocolate', 15.00, '../snack_images/chocolate.jpeg'),
('Chips', 9.00, '../snack_images/chips.jpeg'),
('Coke', 6.00, '../snack_images/coke.jpeg'),
('Juice', 12.00, '../snack_images/juice.jpeg'),
('Pie', 21.00, '../snack_images/pie.jpeg'),
('Plantain', 12.00, '../snack_images/plantain.jpeg'),
('Toffees', 6.00, '../snack_images/toffees.jpeg'),
('Water', 6.00, '../snack_images/water.jpeg'),
('Yogurt', 12.00, '../snack_images/yogurt.jpeg'),
('Biscuit', 9.00, '../snack_images/biscuit.jpeg');

-- Populate the Local Dishes table with records
INSERT INTO LocalDishes (LocalDishName, Price, Image) VALUES
('Waakye', 25.00, '../localDishes_images/waakye.jpeg'),
('Banku and Okro', 35.00, '../localDishes_images/banku.jpg'),
('Kenkey', 30.00, '../localDishes_images/kenkey.jpeg'),
('Ampesi', 25.00, '../localDishes_images/ampesi.jpg'),
('Red Red', 25.00, '../localDishes_images/red red.jpeg'),
('Fufu with Light Soup', 50.00, '../localDishes_images/fufuo.jpeg');

-- Populate the Continental Dishes table with records
INSERT INTO ContinentalDishes (ContinentalDishName, Price, Image) VALUES
('Hamburger', 50.00, '../continentalDishes_images/burger.jpeg'),
('Waffles', 200.00, '../continentalDishes_images/waffles.jpeg'),
('French Fries', 180.00, '../continentalDishes_images/fries.jpeg'),
('Noodles', 35.00, '../continentalDishes_images/noodles.jpeg'),
('Hotdog', 20.00, '../continentalDishes_images/hotdog.jpg'),
('Pasta', 75.00, '../continentalDishes_images/pasta.jpeg'),
('Pizza', 50.00, '../continentalDishes_images/pizza.png'),
('Seafood', 350.00, '../continentalDishes_images/seafood.jpeg'),
('Spring Rolls', 10.00, '../continentalDishes_images/springrolls.jpg');

SELECT * FROM ContinentalDishes;
SELECT * FROM LocalDishes;
SELECT * FROM Snacks;

