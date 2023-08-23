create database tasks ; 
use tasks ;
create table tasks (
	id   		int 			primary key  auto_increment not null ,
    task 		varchar(100)  	not null , 
    user_id 	int  			not null) ;
create table users (
	id   		int 			primary key  auto_increment  not null , 
	name 		varchar(50) 	not null , 
	email 		varchar(50)  	not null ,
	password 	varchar(50)  	not null ,
	image 		varchar(255) 	not null 
);

alter table tasks add foreign key(`user_id`) references  users(`id`) ;
