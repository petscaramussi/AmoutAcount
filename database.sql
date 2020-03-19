create database login;
use login;
create table estoque(
orderId int(11) auto_increment primary key,
idUsuario int(10),
foto varchar(400),
nome varchar(300),
preco double(10,10),
qtde int(15),
categoria varchar(100));

create table usuario(
idUsuario int(11) auto_increment primary key,
usuario varchar(200),
senha varchar(32),
nome varchar(40),
horario datetime);
