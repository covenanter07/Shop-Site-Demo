drop database if exists ecom;
create database ecom default character set utf8 collate utf8_general_ci;
grant all on ecom.* to 'staff'@'localhost' identified by 'password';
use ecom;

create table users (
	id int auto_increment primary key, 
	name varchar(191) not null,
	email varchar(191) not null,
	phone int(15) not null,
	password varchar(191)  not null,
    role_as tinyint(4) default '0' not null,
    created_at timestamp default 'current_timestamp()' not null,
	
);
create table categories (
	id int auto_increment primary key, 
	name varchar(191) not null,
	slug varchar(191) not null,
	description mediumtext default null,
    status tinyint(4) default '0' not null,
    popular tinyint(4) default '0' not null,
	image varchar(191)  not null,
	meta_title varchar(191)  not null,
    meta_description mediumtext default null,
    meta_keywords mediumtext default null,
    created_at timestamp default 'current_timestamp()' not null,
);
create table products (
	id int auto_increment primary key, 
	category_id int, 
	name varchar(191) not null,
	slug varchar(191) not null,
    small_description mediumtext not null,
	description mediumtext not null,
	original_price int not null,
	selling_price int not null,
	image varchar(191) not null,
    qty int not null,
    status tinyint(4) not null,
    trending tinyint(4) not null,
	meta_title varchar(191)  not null,
    meta_keywords mediumtext default null,
    meta_description mediumtext default null,
    created_at timestamp default 'current_timestamp()' not null,
);
create table carts (
	id int auto_increment primary key,
	user_id int, 
	prod_id int, 
	prod_qty int, 
    created_at timestamp default 'current_timestamp()' not null,
);
create table orders (
	id int auto_increment primary key,
    tracking_no varchar(191) not null,
	user_id int, 
	name varchar(191) not null,
    email varchar(191) not null,
	phone varchar(191) not null,
	address mediumtext  not null,
    pincode int(191) not null,
	total_price int(191) not null,
    payment_mode varchar(191) not null,
    payment_id varchar(191) default null,
    status tinyint(4) default '0' not null,
    comments varchar(255) default null,
    created_at timestamp default 'current_timestamp()' not null,
);
create table order_items (
	id int auto_increment primary key, 
	order_id int(191) not null, 
	prod_id int(191) not null, 
	qty int(191) not null, 
	price int(191) not null, 
    created_at timestamp default 'current_timestamp()' not null,
	
);
