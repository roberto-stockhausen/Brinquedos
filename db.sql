create database brinquedos_roberto;

use brinquedos_roberto;

create table brinquedos(
    id int auto_increment primary key,
    nome varchar(90) not null,
    categoria varchar(45) not null,
    faixa ENUM('Maiores3', 'Menores3'),
    preco float not null,
    estoque int not null);
