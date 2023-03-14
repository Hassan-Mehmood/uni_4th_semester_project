create table customer (
customer_ID int NOT NULL,
full_name varchar (20),
username varchar(20),
Email varchar (30),
password varchar (30),
phone_number numeric (10,2),
PRIMARY KEY (customer_ID)
);

create table orders (
order_id int not null,
customer_ID int,
primary key (order_id),
foreign key (customer_ID) references customer,
order_date_time timestamp,
total_amount decimal (10,2),
payment_type varchar (20)
);



create table menu_item (
item_ID int not null,
primary key (item_ID),
item_name varchar (20),
item_Description varchar (255),
Price numeric (5,2),
item_category varchar (50)
);



create table reservation(
reservation_ID int not null,
custumer_ID int not null,
primary key (reservation_ID),
foreign key (custumer_ID) references customer,
phone_number varchar (20),
table_no int,
party_size int,
reservation timestamp
); 


