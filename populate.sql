insert into books (title, author, isbn, category, price, publisher)
	values ('Database System Concepts 6th ed', 'Silberschatz', '9780073523323', 'Textbook', 133.14, 'Mc-Graw Hill Education');
insert into books (title, author, isbn, category, price, publisher)
	values ('Harry Potter and The Deathly Hallows', 'Rowling', '9780545010221', 'Fantasy', 26.02, 'Scholastic Corporation');
insert into books (title, author, isbn, category, price, publisher)
	values ('Catch-22', 'Heller', '9780684833392', 'Fiction', 17.68, 'Simon & Schuster');

insert into reviews
	values ('9780073523323', 1, 'This book is really good. I learned a lot.');
insert into reviews
	values ('9780545010221', 1, 'I wish every book were this book.');
insert into reviews
	values ('9780684833392', 1, 'Compelling read. Confusing, but very well written.');

insert into customer 
	values ('jkreider', 1234, 'Josh', 'Kreider', '612 Main St', 'Ypsilanti', 'Michigan', 48197, 'Visa', 2124556873498243, '08/20');
insert into customer 
	values ('aclark', 5678, 'Andrew', 'Clark', '404 Market St', 'Detroit', 'Michigan', 48127, 'Master', 3235667984509354, '02/19');
insert into customer 
	values ('rwhite', 9012, 'Ron', 'White', '100 Hollywood Blvd', 'Los Angeles', 'California', 33004, 'Discover', 4346778095610465, '11/18');

insert into admin 
	values ('admin', 'password');
