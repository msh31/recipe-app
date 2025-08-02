CREATE TABLE `recipes` (
`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
`recipe_name` varchar(100) NOT NULL,
`number_for` int NOT NULL,
`preparation` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `recipes` (`recipe_name`, `number_for`, `preparation`) VALUES ('Macaroni', 4, 'Kook de macaroni volgens de bereidingswijze op de verpakking');
INSERT INTO `recipes` (`recipe_name`, `number_for`, `preparation`) VALUES ('Boerenkool', 6, 'Kook de aardappelen samen met de boerenkool in 1 pan gaar');


CREATE TABLE `ingredients` (
`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
`recipe_id` int NOT NULL,
`ingred_name` varchar(100) NOT NULL,
`amount` int NOT NULL,
`unit` varchar(100) NOT NULL,
FOREIGN KEY (recipe_id) REFERENCES recipes(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `ingredients` (`recipe_id`, `ingred_name`, `amount`, `unit`) VALUES (1, 'macaroni', 400, 'gram');
INSERT INTO `ingredients` (`recipe_id`, `ingred_name`, `amount`, `unit`) VALUES (1, 'groente', 800, 'gram');
INSERT INTO `ingredients` (`recipe_id`, `ingred_name`, `amount`, `unit`) VALUES (1, 'macaroni-kruiden', 1, 'zakje');
INSERT INTO `ingredients` (`recipe_id`, `ingred_name`, `amount`, `unit`) VALUES (1, 'gehakt', 500, 'gram');
INSERT INTO `ingredients` (`recipe_id`, `ingred_name`, `amount`, `unit`) VALUES (2, 'fijngesneden boerenkool', 600, 'gram');
INSERT INTO `ingredients` (`recipe_id`, `ingred_name`, `amount`, `unit`) VALUES (2, 'aardappelen', 3, 'kg');
INSERT INTO `ingredients` (`recipe_id`, `ingred_name`, `amount`, `unit`) VALUES (2, 'spekjes', 300, 'gram');


