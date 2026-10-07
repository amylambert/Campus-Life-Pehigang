-- ============================
-- DATABASE : campus_life
-- ============================
CREATE DATABASE campus_life;
USE campus_life;

-- ============================
-- TABLE : dishes
-- ============================
CREATE TABLE dishes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    ingredients TEXT,
    price INT NOT NULL,
    quantity INT NOT NULL
);
