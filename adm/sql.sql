drop table if exists conteudo;
create table conteudo(
	id int not null auto_increment primary key,
        id_paginas int not null,
	titulo varchar(50),
	conteudo blob not null,
	inicio timestamp not null,
	fim timestamp
);
drop table if exists paginas;
create table paginas(
	id int not null auto_increment primary key,
	titulo varchar(50),
        src varchar(50)
);
alter table conteudo
add constraint fk_conteudo_pagina
foreign key (id_paginas)
references paginas(id);
/*conteudofim*/
/*fotosinicio*/
drop table if exists categoriafotos;

/*fotosfim*/
/*bannersinicio*/
drop table if exists categoriabanners;
create table categoriabanners(
	id int not null auto_increment primary key,
	titulo varchar(50)
);
drop table if exists banners;
create table banners(
	id int not null auto_increment primary key,
	id_categoria int not null,
	titulo varchar(50),
	descricao varchar(50),
	src  varchar(50)
);
alter table banners
add constraint fk_banners
foreign key (id_categoria)
references categoriabanners(id);
/*bannersfim*/
/*patrocinadoresinicio*/
drop table if exists categoriapatrocinadores;
create table categoriapatrocinadores(
	id int not null auto_increment primary key,
	titulo varchar(50)
);
drop table if exists patrocinadores;
create table patrocinadores(
	id int not null auto_increment primary key,
	id_categoria int not null,
	titulo varchar(50),
	descricao varchar(50),
	src  varchar(50)
);
alter table patrocinadores
add constraint fk_patrocinadores
foreign key (id_categoria)
references categoriapatrocinadores(id);
/*patrocinadoresfim*/
/*videosfim*/
drop table if exists categoriavideos;
create table categoriavideos(
	id int not null auto_increment primary key,
	titulo varchar(50)
);
drop table if exists videos;
create table videos(
	id int not null auto_increment primary key,
	id_categoria int not  null,
	titulo varchar(50),
	descricao varchar(50),
	src  blob
);
alter table videos
add constraint fk_videos
foreign key (id_categoria)
references categoriavideos(id);
/*videosfim*/
create table comentarios(
    id int not null auto_increment primary key,
    titulo varchar(50),
    descricao blob,
    data_cadastro timestamp not null,
    exibir boolean
);
create table contato(
    id int not null auto_increment primary key,
    nome varchar(50),
    email varchar(50),
    ativo boolean,
    data_cadastro datetime
);
create table contagem(
    id int not null auto_increment primary key,
    ip varchar(50),
    data_cadastro Date
);
create table fotospaginas(
    id int not null auto_increment primary key,
    id_paginas int not null,
    titulo varchar(50),
    descricao varchar(50),
    src  varchar(50)
);
alter table fotospaginas
add constraint fk_fotospaginas
foreign key (id_paginas)
references paginas(id);
insert into usuario (nome,login,senha) values ('adm','adm','adm');
insert into usuario (nome,login,senha) values ('root','root','root');


create table comentarios(
id Integer not null primary key auto_increment,
titulo varchar(50) not null,
descricao varchar (50) not null,
exebir boolean,
data_cadastro date,
id_paginas Integer not null,
id_categoria_fotos Integer
);