create table FitTastic_Users
(
	user_id int unsigned not null auto_increment primary key,
	name varchar(30) not null,
	contact varchar(20) not null,
	email varchar(30) not null unique,
	password varchar(40) not null
);