<?php
//Temprory database values
//Set insert_values to 1 to insert values into tables or to 0 to skip

$insert_values = 1;

$create_tb_product_details ="CREATE TABLE IF NOT EXISTS product_details(
    prd_id int(20) NOT NULL,
    prd_name varchar(30) NOT NULL,
    prd_desc varchar(500) NOT NULL,
    prd_price float NOT NULL,
    prd_photo varchar(100) NOT NULL,
    PRIMARY KEY (prd_id)
    )";

$create_tb_details ="CREATE TABLE IF NOT EXISTS details (
    id int(10) NOT NULL AUTO_INCREMENT,
    first_name varchar(20) NOT NULL,
    last_name varchar(20) NOT NULL,
    ph_num varchar(10) NOT NULL,
    pass varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    address varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)
    )";

$create_tb_cart = "CREATE TABLE IF NOT EXISTS cart(
    prd_id int(10) NOT NULL,
    user_id int(10) NOT NULL,
    PRIMARY KEY (prd_id,user_id),
    FOREIGN KEY (prd_id) references product_details(prd_id),
    FOREIGN KEY (user_id) references details(id)
    )";


$create_tb_order_history = "CREATE TABLE IF NOT EXISTS order_history (
    prd_id int(50) NOT NULL,
    user_id int(50) NOT NULL,
    price int(50) NOT NULL,
    date_time datetime NOT NULL,
    PRIMARY KEY (prd_id,user_id),
    FOREIGN KEY (prd_id) references product_details(prd_id),
    FOREIGN KEY (user_id) references details(id)
    )";

$content_details = "INSERT INTO details (id,first_name,last_name,ph_num,pass,email,address) values
(1, 'temp', '1', '9373183839', '1234', 'temp1@gmail.com', 'Of course its temporary :D\r\n')";

$content_product_details = "INSERT INTO product_details VALUES(1, 'Mouse', 'Just a mouse', 80, '../Assets/db_images/g203-hero.jfif');
INSERT INTO product_details VALUES(2, 'Keyboard', 'Just a keyboard', 70, '../Assets/db_images/keyboard.jpg');
INSERT INTO product_details VALUES(3, 'Motherboard', 'Its just a motherboard', 20, '../Assets/db_images/asus-rog-strix-x570-e-gaming-wifi-ii-cropped.jpg');
INSERT INTO product_details VALUES(4, 'RTX 3060ti', 'GIGABYTE Nvidia GeForce RTX™ 3060 Gaming OC 12GB GDDR6 Graphics Card', 700, '../Assets/db_images/3060ti.jpg');
INSERT INTO product_details VALUES(5, 'RX 6700 XT', '192-bit 12GB GDDR6 DP/HDMI Dual Torx 4.0 Fans FreeSync DirectX 12 VR Ready RGB Graphics Card', 600, '../Assets/db_images/rx6700.jpg');
INSERT INTO product_details VALUES(6, 'Ryzen 5 3600 ', 'Desktop Processor 6 Cores up to 4.2 GHz 35MB Cache AM4 Socket (100-000000031)', 200, '../Assets/db_images/Ryzen53600.jpg\r\n');
INSERT INTO product_details VALUES(7, 'Ryzen 9 3900XT', 'Desktop Processor 12 cores 24 Threads 70MB Cache 3.8GHz Upto 4.7GHz AM4 Socket 400 & 500 Series Chipset (100-100000277WOF)', 850, '../Assets/db_images/Ryzen93900.jpg');
INSERT INTO product_details VALUES(8, ' Corsair CV550', ' CV Series, 80 Plus Bronze Certified, 550 Watt Non-Modular Power Supply - Black', 100, '../Assets/db_images/cv550_.jpg');
INSERT INTO product_details VALUES(9, 'Cooler Master MWE 450', 'MWE 450 Bronze V2 230v, 80 Plus Bronze Certified, Non-Modular Power Supply (Black)', 150, '../Assets/db_images/MWE450.jpg');
INSERT INTO product_details VALUES(10, 'Corsair BX500 SSD', '240GB 3D NAND SATA 6.35 cm (2.5-inch) SSD (CT240BX500SSD1)', 40, '../Assets/db_images/BX500.jpg');
INSERT INTO product_details VALUES(11, 'WD SN570 NVMe SSD', 'SN570 NVMe 500GB SSD, Upto 3,500 MB/s Read, with Free 1 Month Adobe Creative Cloud Subscription (WDS500G3B0C)', 80, '../Assets/db_images/SN570.jpg');
INSERT INTO product_details VALUES(12, 'Corsair LPX 8GB RAM', '(1x8GB) DDR4 3200MHZ C16 Desktop RAM (Black)', 40, '../Assets/db_images/LPX8GB.jpg');
INSERT INTO product_details VALUES(13, 'Crucial Ballistix 8GB RAM', 'Crucial Ballistix 3200 MHz DDR4 DRAM Desktop Gaming Memory 8GB CL16 BL8G32C16U4B (Black)\r\n', 30, '../Assets/db_images/CL16.jpg');
INSERT INTO product_details VALUES(14, 'Storite 5-Pack SATA', 'Storite 5-Pack SATA 3 6.0 Gbps Data Cable with Locking Latch for HDD & SSD - (Black, 45 cm)', 10, '../Assets/db_images/storitesata.jpg');";

$content_order_history = "INSERT INTO order_history (prd_id,user_id,price,date_time) values
(1, 1, 80, '2022-02-17 10:02:07')";

$tables_list = [$create_tb_product_details,$create_tb_details,$create_tb_cart,$create_tb_order_history];

$table_entry_list = [$content_details,$content_product_details,$content_order_history];

?>