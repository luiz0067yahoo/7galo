create table slide (
	codigo int auto_increment not null primary key,
	imagem varchar (50) not null,
	link varchar (50) not null
);

create table paginas(
codigo int not null primary key auto_increment,
nome varchar(50) not null,
conteudo blob,
data_inicio DATETIME not null,
data_fim DATETIME
);


create table video (
	codigo int auto_increment not null primary key, 
	titulo varchar (50) not null,
	video blob not null
);
create table usuario (
	codigo int auto_increment not null primary key, 
	usuario varchar (50) not null,
	senha varchar (50) not null
);

create table login (
	codigo int auto_increment not null primary key,
	codigo_usuario int not null,
	hora_inicio time not null,
	hora_fim time,
	data_inicio date not null,
	data_fim date not null
);
insert into USUARIO (USUARIO, SENHA) values('root','root');
	
create table categoria_fotos (
	id int auto_increment not null primary key auto_increment, 
	imagem varchar (100),
	data_cadastro date not null,
	titulo varchar (255)
);

create table fotos(
	id int auto_increment not null primary key auto_increment, 
	id_categoria_fotos int not null,
	foto varchar (100)
);

alter table fotos
add constraint fk_fotos_categoria_fotos
foreign key (id_categoria_fotos)
references categoria_fotos(id);

ALTER TABLE login
ADD CONSTRAINT fk_login_usuario
FOREIGN KEY (codigo_usuario)
REFERENCES usuario(codigo);