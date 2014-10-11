create table FitTastic_Reservations
(
	reservation_id int unsigned not null auto_increment primary key,
	facility_id int unsigned not null,
	user_id int unsigned not null,
	beg_time datetime not null,
	end_time datetime not null
);