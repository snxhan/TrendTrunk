create table products
( id int(5) unsigned not null auto_increment primary key,
  name varchar(20) not null,
  category varchar(20) not null,
  price decimal(20,2) not null
);

create table sales
( product_id int(5) unsigned not null auto_increment primary key,
  revenue decimal(20, 2) unsigned default null,    
  quantity int(10) unsigned default null   
);

create table users
(  username varchar(20) not null,
   password varchar(128) not null
);

