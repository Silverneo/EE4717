create table FitTastic_Users
(
	customerid int unsigned not null auto_increment primary key,
	name varchar(30) not null,
	contact varchar(20) not null,
	email varchar(30) not null,
	password varchar(40) not null
);