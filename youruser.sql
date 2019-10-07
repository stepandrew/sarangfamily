create database youruser;
use youruser;
select database();
drop table Users;
create table user(
ID int auto_increment,
email varchar(50) not null,
password varchar(50) not null,
primary key(ID));

Insert into user( email , password )
values ('an@gmail.com', '1234')
,('s@gmail.com', 's1234');

select * from user;
select email from user;

create table register(
ID int auto_increment,
FirstName varchar(50) not null,
LastName varchar(50) not null,
BirthDay date,
Primary key(ID));

insert into register(FirstName, LastName, BirthDay)
values ('Ann' , 'Mason', '1998-08-01')
,('Perry', 'Floats','1997-12-05');

select * from register;
select * from user where email ='an@gmail.com';
select FirstName, LastName from register;
insert into register(FirstName, LastName, BirthDay)
values ('Anna' , 'Mason', '1999-08-01')
,('Pen', 'Peter','1997-11-05');

select distinct LastName from register;

select * from register 
where LastName='Mason';

select * from register 
where BirthDay like '1997%';

select * from register 
order by LastName, FirstName DESC;

select count(*) from register
where LastName='Mason';

select * from user
join register on register.id = user.id;