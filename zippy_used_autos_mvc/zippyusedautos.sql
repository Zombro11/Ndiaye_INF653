
CREATE DATABASE IF NOT EXISTS zippyusedautos;
USE zippyusedautos;

DROP TABLE IF EXISTS vehicles;
DROP TABLE IF EXISTS makes;
DROP TABLE IF EXISTS types;
DROP TABLE IF EXISTS classes;

CREATE TABLE makes (
    make_id INT AUTO_INCREMENT PRIMARY KEY,
    make_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE types (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE vehicles (
    vehicle_id INT AUTO_INCREMENT PRIMARY KEY,
    year INT NOT NULL,
    model VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    type_id INT NOT NULL,
    class_id INT NOT NULL,
    make_id INT NOT NULL,
    CONSTRAINT fk_vehicles_types
        FOREIGN KEY (type_id) REFERENCES types(type_id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_vehicles_classes
        FOREIGN KEY (class_id) REFERENCES classes(class_id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_vehicles_makes
        FOREIGN KEY (make_id) REFERENCES makes(make_id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);


INSERT INTO types (type_id, type_name) VALUES
(1, 'SUV'),
(2, 'Truck'),
(3, 'Sedan'),
(4, 'Coupe');

INSERT INTO classes (class_id, class_name) VALUES
(1, 'Utility'),
(2, 'Economy'),
(3, 'Luxury'),
(4, 'Sports');

INSERT INTO makes (make_id, make_name) VALUES
(1, 'Chevy'),
(2, 'Ford'),
(3, 'Cadillac'),
(4, 'Nissan'),
(5, 'Hyundai'),
(6, 'Dodge'),
(7, 'Infiniti'),
(8, 'Buick');

INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES
(2009, 'Suburban', 18999, 1, 1, 1),
(2011, 'F150', 22999, 2, 1, 2),
(2012, 'Escalade', 24999, 1, 3, 3),
(2018, 'Rogue', 34999, 1, 2, 4),
(2016, 'Sonata', 29999, 3, 2, 5),
(2020, 'Challenger', 49999, 4, 4, 6),
(2015, 'Tahoe', 26999, 1, 1, 1),
(2017, 'QX80', 54999, 1, 3, 7),
(2015, 'Fusion', 19999, 3, 2, 2),
(2014, 'XTS', 19999, 3, 3, 3);
