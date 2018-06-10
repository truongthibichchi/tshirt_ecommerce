create table city (
	cityID int auto_increment,
    cityName varchar(25) unique,
    primary key (cityID)
);

ALTER TABLE city AUTO_INCREMENT = 1;
insert into city (cityName) values ('Hồ Chí Minh'), ('Hà Nội'), ('Hải Phòng'),
 ('Đà Nẵng'), ('Bình Thuận'), ('Bà Rịa - Vũng Tàu'),
 ('Long An'), ('Tiền Giang'), ('Ninh Thuận'),
 ('Daklak'), ('Quảng Ngãi'), ('Thanh Hóa'),
 ('Bình Định'), ('Quảng Nam');
 

create table address (
	addressID int auto_increment,
    address1 varchar(100),
    address2 varchar(100),
    district_ward varchar(20),
    postalCode varchar(10),
    cityID int,
    primary key (addressID),
    foreign key (cityID) references city (cityID)
);
create table userID (
	userID int auto_increment,
    firstName varchar(15),
    lastName varchar(25),
    userName varchar(25) unique,
    email varchar(50) unique,
    paswd varchar(50),
    dateRegister date,
    country varchar(20),
	isVerified boolean,
    addressID int,
    primary key (userID),
    foreign key (addressID) references address (addressID)
);

insert into user values ('Minh', 'Doan Nam', 'minhdn', 'namminhlp@gmail.com','2018-05-15', '3071997', 'Vietnam',1, NULL);
ALTER TABLE user AUTO_INCREMENT = 1;

create table category (
	categoryID int auto_increment,
    categoryName varchar(50),
    baseCost float,
    primary key (categoryID)
);

insert into category values ('T-shirt', 60000);
insert into category values ('Hoodie', 120000);
insert into category values ('Polo-shirt', 700000);

create table design (
	designID int auto_increment,
    designOwner int,
	designName varchar(50),
    designDescript varchar(150),
	linkPicture varchar(50),
    primary key (designID),
    foreign key (designOwner) references user (userID)
);

insert into design values (1,1,'CUTE FRENCH BULLDOG', 'Cute French Bulldog Bulldogs Heroes Dog Lover T Shirt', 'https://www.sunfrog.com/145760209-1190752663.html')

create table product (
	productID int auto_increment,
    designID int,
    categoryID int,
    primary key (productID),
    foreign key (designID) references design (designID),
    foreign key (categoryID) references category (categoryID)
);

insert into product (designID, categoryID) values (1,1);
insert into product (designID, categoryID) values (1,2);

create table size (
	sizeID int auto_increment,
    sizeName varchar(15),
    sizeCode varchar(5),
    primary key (sizeID)
);

alter table size AUTO_INCREMENT = 1;
insert into size (sizeName, sizeCode) values ('small' ,'S');
insert into size (sizeName, sizeCode) values ('medium', 'M');
insert into size (sizeName, sizeCode) values ('large', 'L');
insert into size (sizeName, sizeCode) values ('extra large', 'XL');

create table color (
	colorID int auto_increment,
    colorName varchar(15),
    colorCode varchar(7),
    primary key (colorID)
);

alter table color AUTO_INCREMENT = 1;
insert into color (colorName, colorCode) values ('red','#FF0000');
insert into color (colorName, colorCode) values ('blue','#0000FF');
insert into color (colorName, colorCode) values ('yellow','FFFF00');
insert into color (colorName, colorCode) values ('green','#008000');
insert into color (colorName, colorCode) values ('black', '#000000');
insert into color (colorName, colorCode) values ('white', 'FFFFFF');
insert into color (colorName, colorCode) values ('gray','#808080');


create table product_variant (
	variantID int auto_increment,
    productID int,
    SKU varchar(20) unique,
    inStock int default 0, #ràng buộc không nhỏ hơn 0
    linkPicture varchar(25),
    stt varchar(10) not null, #soldOut, isAvailable ---> Chỗ này viết 1 trigger dựa vào inStock để tính.
    sizeID int,
    colorID int,
    foreign key (productID) references product (productID),
    foreign key (sizeID) references size (sizeID),
    foreign key (colorID) references color (colorID),
	primary key (variantID)
);

#tự tạo mã SKU
alter table product_variant AUTO_INCREMENT = 1;
insert into product_variant(productID,SKU,linkPicture,stt, sizeID, colorID) values 
(1, '1_tshirt_black_S', '/storage/product/1_tshirt_5','isAvailable',1,5),
(1, '1_tshirt_black_M', '/storage/product/1_tshirt_5','isAvailable',2,5),
(1, '1_tshirt_black_L', '/storage/product/1_tshirt_5','isAvailable',3,5);

insert into product_variant(productID,SKU,linkPicture,stt, sizeID, colorID) values 
(2, '2_hoodie_black_S', '/storage/product/2_hoodie_5','isAvailable',1,5),
(2, '2_hoodie_black_M', '/storage/product/2_hoodie_5','isAvailable',2,5),
(2, '2_hoodie_black_L', '/storage/product/2_hoodie_5','isAvailable',3,5);

insert into product_variant(productID,SKU,linkPicture,stt, sizeID, colorID) values 
(2, '2_hoodie_gray_S', '/storage/product/2_hoodie_7','isAvailable',1,7),
(2, '2_hoodie_gray_M', '/storage/product/2_hoodie_7','isAvailable',2,7),
(2, '2_hoodie_gray_L', '/storage/product/2_hoodie_7','isAvailable',3,7);

create table pricelist (
	priceID int auto_increment,
    productID int,
    price float,
    startdate date,
    enddate date,
    foreign key (productID) references product (productID),
    primary key (priceID)
);

# sp: Khi thay đổi giá, phải xóa giá trước đó, kết thúc rồi mời thêm giá tiếp theo.
alter table pricelist AUTO_INCREMENT = 1;
insert into pricelist (productID,price,startdate,enddate,isActive) values (1,150000,current_date(), null)
,(2,220000,current_date(), null);

insert into pricelist (productID,price,startdate,enddate,isActive) values (2,2200000,current_date(), null)
,(2,220000,current_date(), null);

create table product_price (
	whoChange int,
    productID int,
    priceID int,
    startDate date,
    endDate date,
    foreign key (productID) references product (productID),
    foreign key (whoChange) references user (userID),
    foreign key (priceID) references pricelist (priceID),
    primary key (whoChange, productID, priceID)
);

create table sttOrder (
	sttID int auto_increment,
    sttName varchar(10), #onCart, onDraft, onPrinting, onShipping, paid, canceled
    primary key (sttID)
);

alter table sttOrder AUTO_INCREMENT = 1;

insert into sttOrder (sttName) values ('onDraft');
insert into sttOrder (sttName) values ('onShipping');
insert into sttOrder (sttName) values ('paid');
insert into sttOrder (sttName) values ('canceled');


create table payment (
	paymentID int auto_increment,
    paymentType varchar(15),
    primary key (paymentID)
);

create table shipper (
	shipperID int auto_increment,
    companyName varchar(15),
    phone varchar(15),
    PRIMARY key (shipperID)
);

create table saleOrder (
	saleOrderID int auto_increment,
	paymentID int,
    shipperID int,
    customerID int,
    saleTax float,
    orderedDate date,
    deliveringDate date,
	fullfilledDate date,
    deliveringPlace int,
    sttOrder int,
    foreign key (deliveringPlace) references address (addressID),
	foreign key (sttOrder) references sttOrder(sttID),
	foreign key (shipperID) references shipper(shipperID),
	foreign key (paymentID) references payment(paymentID),
	foreign key (customerID) references user (userID),
    primary key (saleOrderID)
);

#Lưu ý nên sửa saleOrderline là khóa chính, kết hợp với 1 saleorder thay vì thiết kế như thế này.
create table saleOrderLine (
    saleOrderID int,
    variantID int,
    quatity int,
	foreign key (variantID) references product_variant(variantID),
    foreign key (saleOrderID) references saleOrder (saleOrderID),
	primary key (saleOrderID, variantID)
);
