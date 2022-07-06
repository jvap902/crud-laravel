use laravel;

drop table if exists livros;
create table livros(
    id int not null auto_increment,
    titulo varchar(200) not null,
    autor varchar(200) not null,
    primary key (id)
);
