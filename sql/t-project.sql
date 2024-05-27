-- MySQL Script generated by MySQL Workbench
-- Sat May 25 19:14:50 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE =
        'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Table `t_project`.`gallery`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `t_project`.`gallery`
(
    `id`          INT(11)      NOT NULL AUTO_INCREMENT,
    `title`       VARCHAR(255) NOT NULL,
    `short_desc`  VARCHAR(255) NOT NULL,
    `description` TEXT         NOT NULL,
    `image`       VARCHAR(255) NOT NULL,
    `is_slider`   TINYINT(1)   NOT NULL DEFAULT 0,
    PRIMARY KEY USING BTREE (`id`)
)
    ENGINE = InnoDB
    AUTO_INCREMENT = 19
    DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `t_project`.`contacts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contacts`
(
    `id`           INT          NOT NULL AUTO_INCREMENT,
    `company_name` VARCHAR(255) NULL,
    `address`      VARCHAR(255) NULL,
    `phone`        VARCHAR(255) NULL,
    `email`        VARCHAR(255) NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `t_project`.`specifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `t_project`.`specifications`
(
    `id`          INT          NOT NULL AUTO_INCREMENT,
    `group_name`  VARCHAR(255) NULL,
    `description` TEXT         NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `t_project`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `t_project`.`users`
(
    `id`          INT          NOT NULL AUTO_INCREMENT,
    `username`    VARCHAR(16)  NOT NULL,
    `email`       VARCHAR(255) NOT NULL,
    `password`    VARCHAR(100)  NOT NULL,
    `create_time` TIMESTAMP    NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `email_UNIQUE` (`email` ASC),
    UNIQUE INDEX `username_UNIQUE` (`username` ASC)
);

-- -----------------------------------------------------
-- Table `t_project`.`requests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `t_project`.`requests`
(
    `id`      INT          NOT NULL AUTO_INCREMENT,
    `name`    VARCHAR(255) NULL,
    `email`   VARCHAR(255) NULL,
    `request` VARCHAR(255) NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB;


INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 5 Series High-Line Sport', 'BMW 5 Series High-Line Sport (E39) 2003',
        'BMW 5 Series High-Line Sport (E39) 2003', 'car1.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 5 Series M Sports Package', 'BMW 5 Series M Sports Package (E39) 2002',
        'BMW 5 Series M Sports Package (E39) 2002', 'car2.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 525d Touring (E39)', 'BMW 525d Touring (E39) 2000–03', 'BMW 525d Touring (E39) 2000–03', 'car3.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 525i Sedan', 'BMW 525i Sedan (E39) 2000–03', 'BMW 525i Sedan (E39) 2000–03', 'car4.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 5 Series Sedan UK-spec', 'BMW 5 Series Sedan UK-spec (E39) 2000–03',
        'BMW 5 Series Sedan UK-spec (E39) 2000–03', 'car5.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 5 Series Sedan UK-spec', 'BMW 5 Series Sedan UK-spec (E39) 2000–03',
        'BMW 5 Series Sedan UK-spec (E39) 2000–03', 'car6.jpg', 1);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 540i Touring US-spec', 'BMW 540i Touring US-spec (E39) 2000–04', 'BMW 540i Touring US-spec (E39) 2000–04',
        'car7.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 540i Emergency', 'BMW 540i Emergency (E39) 2000–03', 'BMW 540i Emergency (E39) 2000–03', 'car8.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('AC Schnitzer ACS5 Sport', 'AC Schnitzer ACS5 Sport (E39) 1999–2004', 'AC Schnitzer ACS5 Sport (E39) 1999–2004',
        'car9.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 540i Sedan M Sports Package', 'BMW 540i Sedan M Sports Package (E39) 1998–2002',
        'BMW 540i Sedan M Sports Package (E39) 1998–2002', 'car10.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 523i Touring', 'BMW 523i Touring (E39) 1997–2000', 'BMW 523i Touring (E39) 1997–2000', 'car11.jpg', 1);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 528i Touring', 'BMW 528i Touring (E39) 1997–2000', 'BMW 528i Touring (E39) 1997–2000', 'car12.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 540i Sedan', 'BMW 540i Sedan (E39) 1996–2000', 'BMW 540i Sedan (E39) 1996–2000', 'car13.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 528i Touring', 'BMW 528i Touring (E39) 1997–2000', 'BMW 528i Touring (E39) 1997–2000', 'car14.jpg', 1);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 520i Sedan UK-spec', 'BMW 520i Sedan UK-spec (E39) 1996–2000', 'BMW 520i Sedan UK-spec (E39) 1996–2000',
        'car15.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 528i Sedan US-spec', 'BMW 528i Sedan US-spec (E39) 1996–2000', 'BMW 528i Sedan US-spec (E39) 1996–2000',
        'car16.jpg', 0);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('BMW 540i Sedan US-spec', 'BMW 540i Sedan US-spec (E39) 1996–2003', 'BMW 540i Sedan US-spec (E39) 1996–2003',
        'car17.jpg', 1);
INSERT INTO `gallery` (`title`, `short_desc`, `description`, `image`, `is_slider`)
VALUES ('AC Schnitzer ACS5', 'AC Schnitzer ACS5 (E39) 1996–2000', 'AC Schnitzer ACS5 (E39) 1996–2000', 'car18.jpg', 0);


INSERT INTO `contacts` (`company_name`, `address`, `phone`, `email`)
VALUES ('BMW E39 club', 'Trieda Andreja Hlinku 1, 949 74 Nitra', '+421 123 456 789', 'tikhon.tolypin@student.ukf.sk');


INSERT INTO `specifications` (`group_name`, `description`)
VALUES ('BMW E39 Timeline', '<p>Explore the remarkable journey of the BMW E39 model through the years. This timeline
    showcases the evolution and key modifications of this iconic vehicle:</p>
<details>
    <summary>
        See the BMW E39 Timeline
    </summary>
    <table class="table">
        <tr class="table-light">
            <th>Year</th>
            <th>Milestone</th>
        </tr>
        <tr>
            <td>1995</td>
            <td>Introduction of the BMW E39</td>
        </tr>
        <tr>
            <td>1997</td>
            <td>Facelift: Improved Design and Features</td>
        </tr>
        <tr>
            <td>2000</td>
            <td>Sport Package Addition</td>
        </tr>
        <tr>
            <td>2002</td>
            <td>Final Production Year for the E39 Model</td>
        </tr>
    </table>
</details>');

INSERT INTO `specifications` (`group_name`, `description`)
VALUES ('Technical Specifications', 'Dive into the technical prowess of the BMW E39. Here''s a brief overview of the model along with
a table detailing its various modifications and key specifications:

<h3>BMW E39 Overview</h3>
<p>The BMW E39 is a true embodiment of luxury, performance, and elegance. With its sleek design
    and powerful engines, it has become a classic among BMW enthusiasts.</p>
<details>
    <summary>
        BMW E39 Model Specifications
    </summary>
    <table class="table">
        <tr class="table-light">
            <th>Modification</th>
            <th>Engine</th>
            <th>Power</th>
            <th>Torque</th>
            <th>0-60 mph</th>
        </tr>
        <tr>
            <td><strong>525i</strong></td>
            <td>2.5L</td>
            <td>189 hp</td>
            <td>180 lb-ft</td>
            <td>7.9 sec</td>
        </tr>
        <tr>
            <td><strong>530i</strong></td>
            <td>3.0L</td>
            <td>228 hp</td>
            <td>221 lb-ft</td>
            <td>6.7 sec</td>
        </tr>
        <tr>
            <td><strong>540i</strong></td>
            <td>4.4L</td>
            <td>282 hp</td>
            <td>310 lb-ft</td>
            <td>5.4 sec</td>
        </tr>
        <tr>
            <td><strong>M5</strong></td>
            <td>4.9L</td>
            <td>394 hp</td>
            <td>369 lb-ft</td>
            <td>4.8 sec</td>
        </tr>
    </table>
</details>');

INSERT INTO `specifications` (`group_name`, `description`) VALUE ('Analogues', '<p>Discover other automotive gems that share the spirit of the BMW E39. Here''s a brief overview
    and an HTML table listing counterparts from different manufacturers:</p>
<h3>Analogues Overview</h3>
<p>While the BMW E39 holds a special place in our hearts, we appreciate the beauty and
    performance of similar models from other manufacturers.</p>
<details>
    <summary>Analogues Comparison Table</summary>
    <table class="table">
        <tr class="table-light">
            <th>Model</th>
            <th>Manufacturer</th>
            <th>Engine</th>
            <th>Power</th>
            <th>Torque</th>
            <th>0-60 mph</th>
        </tr>
        <tr>
            <td><strong>Mercedes-Benz E-Class (W210)</strong></td>
            <td>Mercedes-Benz</td>
            <td>Various</td>
            <td>Various</td>
            <td>Various</td>
            <td>Various</td>
        </tr>
        <tr>
            <td><strong>Audi A6 (C5)</strong></td>
            <td>Audi</td>
            <td>Various</td>
            <td>Various</td>
            <td>Various</td>
            <td>Various</td>
        </tr>
        <tr>
            <td><strong>Lexus GS (S160)</strong></td>
            <td>Lexus</td>
            <td>Various</td>
            <td>Various</td>
            <td>Various</td>
            <td>Various</td>
        </tr>
    </table>
</details>');

INSERT INTO `users` (`username`, `email`, `password`)
VALUES ('admin', 'tikhon.tolypin@student.ukf.sk', '$2y$10$h/RVk5a5c0kacy2jZ6Rc4.3oXrgVhzGDtCv2NkoGFCKoT10Dkz/Ty');
-- password: admin

INSERT INTO `requests` (`name`, `email`, `request`)
    VALUES ('Tikhon Tolypin', 'tikhon.tolypin@student.ukf.sk', 'I want to join the club!');

SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;