
create table books (
	title		varchar(50),
	author		varchar(20),
	isbn		bigint,
	category	varchar(20),
	price		numeric,
	publisher	varchar(30),
	qty			integer default 100,
	primary key (isbn)
);

create table reviews (
	isbn 	bigint,
	num 	integer,
	info 	varchar(500),
	foreign key (isbn) references books(isbn),
	primary key (isbn, num)
);

create table customer (
	uname	varchar(15),
	pin		integer,
	fname	varchar(10),
	lname	varchar(10),
	address	varchar(30),
	city	varchar(15),
	stt		varchar(12),
	zip		integer,
	ccard	varchar(15),
	cnum	bigint,
	expir	varchar(5),
	primary key (uname)
);

create table admin (
	uname		varchar(15),
	password	varchar(15),
	primary key(uname)
);

create table ordered (
	uname	varchar(15),
	isbn	bigint,
	foreign key (isbn) references books(isbn),
	foreign key (uname) references customer(uname),
	primary key (uname, isbn)
);







