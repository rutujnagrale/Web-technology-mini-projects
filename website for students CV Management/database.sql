CREATE DATABASE book_store;
USE book_store;
CREATE TABLE book(book_id varchar(50), book_title varchar(200), isbn varchar(20), price double(12,2), author varchar(128), type 
varchar(128), image varchar(128), PRIMARY KEY (book_id));
CREATE TABLE users( user_id int not null AUTO_INCREMENT, username varchar(128), password varchar(16), PRIMARY KEY (user_id));
CREATE TABLE customer( customer_id int not null AUTO_INCREMENT, customer_name varchar(128), customer_phone varchar(12), customer_ic 
varchar(14), customer_email varchar(200), customer_address varchar(200), customer_gender varchar(10), user_id int, PRIMARY KEY
(customer_id), CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL ON UPDATE CASCADE);
CREATE TABLE `order`(order_id int not null AUTO_INCREMENT, customer_id int, book_id varchar(50), date_purchase datetime, quantity 
int, total_price double(12,2), status varchar(1), PRIMARY KEY (order_id), CONSTRAINT FOREIGN KEY (book_id) REFERENCES book(book_id) 
ON DELETE SET NULL ON UPDATE CASCADE, CONSTRAINT FOREIGN KEY (customer_id) REFERENCES customer(customer_id) ON DELETE SET NULL ON
UPDATE CASCADE);
CREATE TABLE cart( cart_id int not null AUTO_INCREMENT, customer_id int, book_id varchar(50), price double(12,2), quantity int, 
total_price double(12,2), PRIMARY KEY (cart_id), CONSTRAINT FOREIGN KEY (book_id) REFERENCES book(book_id) ON DELETE SET NULL ON
UPDATE CASCADE, CONSTRAINT FOREIGN KEY (customer_id) REFERENCES customer(customer_id) ON DELETE SET NULL ON UPDATE CASCADE);
INSERT INTO book VALUES ('B-001','Harry Potter and the Sorcerers Stone','123-456-789-1',536,'J. K. 
Rowling','Fantasy','image/harry_potter1.jpg');
INSERT INTO book VALUES ('B-002','The Bucket List','123-456-789-2',2599,'Kath Stathers','Travel','image/t_list.jpg');
INSERT INTO book VALUES ('B-003','The Psychology of Money','123-456-789-3',329,'Morgan Housel','Finance','image/money.jpg');
INSERT INTO book VALUES ('B-004','Energize Your Mind','123-456-789-4',175,'Gaur Gopal Das','Food','image/mind.jpg');
INSERT INTO book VALUES ('B-005','The Monk Who Sold His Ferrari','123-456-789-5',329,'Robin Sharma','Fiction','image/monk.jpg');
INSERT INTO book VALUES ('B-006','THE INDIAN COOKERY COURSE','123-456-789-6',1075.9,'Monisha Bharadwaj ','Food','image/food.jpg');