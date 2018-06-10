create table if not exists `options` (
	id int(11) not null auto_increment,
    attrName varchar(50) DEFAULT NULL,
    primary key (id)
);

create table if not exists `option_values` (
	id int(11) not null auto_increment,
    optionID int(11),
    valueName varchar(50),
    foreign key (optionID) references `options` (id),
    primary key (id)
);

create table if not exists `categories` (
	id int(11) auto_increment,
    categoryName varchar(50),
    primary key (id)
);

CREATE TABLE IF NOT EXISTS `images` (
	id int(11) not null auto_increment,
    url varchar(50),
    primary key (id)
);

CREATE TABLE IF NOT EXISTS `products` (
	id int(11) not null auto_increment,
    productName varchar(100),
    productDescript text,
    categoryID int(11),
    defaultImage varchar(50),
    active boolean default 1,
    foreign key (categoryID) references categories(id),
    primary key(id)
);


CREATE TABLE IF NOT EXISTS `pricelist` (
	id int(11) not null auto_increment,
    productID int(11) not null,
    price float,
    startdate datetime,
    enddate datetime,
    primary key(id)
);

alter table `pricelist`
	add constraint fk_product_price foreign key (productID) references `products`(id);



CREATE TABLE IF NOT exists `skus` (
    productID int(11),
    skuCode varchar(15),
    inStock int default 0,
	imageID int(11),
    active boolean default 1,
    haveVariant boolean default 1,
    primary key (skuCode,productID)
)AUTO_INCREMENT = 1;



alter table `skus`
	add constraint fk_product_skus foreign key (productID) references products (id);
    
alter table `skus`
	add constraint fk_image_skus foreign key (imageID) references images (id);
    
CREATE TABLE IF NOT EXISTS `variants` (
    skuCode varchar(15),
	optionID int (11),
    productID int(11),
	valueID int(11),
    foreign key (valueID) references `option_values` (id),
    foreign key (skuCode, productID) references `skus` (skuCode, productID),
    foreign key (optionID) references `options` (id),
    primary key(skuCode, productID, optionID)
);


create table if not exists `city` (
	id int(11) auto_increment,
    cityName varchar(25) unique,
    primary key (id)
);

insert into city (cityName) values ('Hồ Chí Minh'), 
('Hà Nội'), 
('Hải Phòng'),
 ('Đà Nẵng'), 
 ('Bình Thuận'), 
 ('Bà Rịa - Vũng Tàu'),
 ('Long An'), 
 ('Tiền Giang'), 
 ('Ninh Thuận'),
 ('Daklak'), 
 ('Quảng Ngãi'), 
 ('Thanh Hóa'),
 ('Bình Định'), 
 ('Quảng Nam');
 
create table if not exists `user` (
	id int(11) auto_increment,
    firstName varchar(15),
    lastName varchar(20),
	dateRegister datetime,
    email varchar(50) unique,
    paswd varchar(50),
	verified boolean,
    phone varchar(15),
    address varchar(100),
    address2 varchar(50),
    city int(11),
    country varchar(20),
    primary key (id)
);

alter table `user`
	add constraint  fk_city_user foreign key (city) references  city (id);

create table if not exists stt_order (
	id int(11) auto_increment,
    sttName varchar(10), #onCart, onDraft, onPrinting, onShipping, paid, canceled
    primary key (id)
);

alter table stt_Order AUTO_INCREMENT = 1;
insert into stt_Order (sttName) values ('draft');
insert into stt_Order (sttName) values ('shipping');
insert into stt_Order (sttName) values ('paid');
insert into stt_Order (sttName) values ('canceled');

create table if not exists payment_type (
	id int(11) auto_increment,
    `type` varchar(15), #COD, credit Card, Paypal,...
    primary key (id)
);

create table if not exists shipper (
	id int(11) auto_increment,
    companyName varchar(15),
    phone varchar(15),
    PRIMARY key (id)
);

create table if not exists `sale_order` (
	id int(11) auto_increment,
    paymentType int(11),
    shipper int(11),
    customer int(11) default null,
    orderedDate Datetime,
    shippedDate Datetime,
    orderPhone varchar(15),
    orderAddress1 varchar(100),
    orderAddress2 varchar(50),
    orderCity int(11),
    orderCountry varchar(20),
    stt int(11),
    foreign key (stt) references stt_order(id),
    foreign key (paymentType) references payment_type (id),
    foreign key (shipper) references shipper(id),
    foreign key (orderCity) references city (id),
    primary key (id)
);

create table if not exists `order_line` (
	id int(11) auto_increment,
    orderID int(11) not null,
    skus varchar(15) not null,
    quantity int(11),
    foreign key (skus) references `skus` (skuCode),
    foreign key (orderID) references `sale_order`(id),
    primary key (id)
);

INSERT INTO `images` VALUES
(1,'storage/product/1_black.jpg'),
(2,'storage/product/2_black.jpg'),
(3, 'storage/product/2_gray.jpg');

INSERT INTO `options` VALUES
(1,'color'),
(2,'size');

INSERT INTO `option_values` VALUES
(1, 1, 'red'),
(2, 1, 'blue'),
(3, 1, 'green'),
(4, 1, 'black'),
(5, 1, 'white'),
(6, 2, 'S'),
(7, 2, 'M'),
(8, 2, 'L'),
(9, 2, 'XL');

INSERT INTO `categories` VALUES
(1, 'Áo thun'),
(2, 'Áo Polo'),
(3, 'Hoodie');

insert into products (productName, productDescript, categoryID, defaultImage) value 
('Cute Bulldog T-shirt', 'Cute French Bulldog Bulldogs Heroes Dog Lover T Shirt',1,'storage/product/1_black.jpg'),
('Cute Bulldog Hoodie', 'Cute French Bulldog Bulldogs Heroes Dog Lover Hoodie',2, 'storage/product/2_black.jpg');

insert into `skus` (productID, skuCode, inStock, imageID) values
(1, 'TS1_1001',10, 1),
(1, 'TS1_1002',10, 1),
(1, 'TS1_1003',10, 1),
(2, 'HD2_1001',10, 2),
(2, 'HD2_1002',10, 2),
(2, 'HD2_1003',10, 2),
(2, 'HD2_1004',10, 3),
(2, 'HD2_1005',10, 3),
(2, 'HD2_1006',10, 3);

insert into `pricelist` (productID, price,startdate,enddate) values 
(1,150000,current_date(), null)
,(2,220000,current_date(), null);

insert into `variants` ( productID, skuCode, optionID,valueID) values 
(1,'TS1_1001',1,4),
(1,'TS1_1001',2,6), #Đen, S
(1,'TS1_1002',1,4),
(1,'TS1_1002',2,7), #Đen, M
(1,'TS1_1003',1,4),
(1,'TS1_1003',2,8), #Đen XL
(2, 'HD2_1001',1, 4), 
(2, 'HD2_1001',2, 6), #Đen S
(2, 'HD2_1002',1, 4), 
(2, 'HD2_1002',2, 7), #Đen, M
(2, 'HD2_1003',1, 4),
(2, 'HD2_1003',2, 8), #Đen XL
(2, 'HD2_1004',1, 5),
(2, 'HD2_1004',2, 6), #Xám S
(2, 'HD2_1005',1, 5),
(2, 'HD2_1005',2, 6), #Xám M
(2, 'HD2_1006',1, 5),
(2, 'HD2_1006',2, 6); #Xám L


