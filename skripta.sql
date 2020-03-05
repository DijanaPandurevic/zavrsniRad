drop database if exists zavrsni_rad;
create database zavrsni_rad default character set utf8;
use zavrsni_rad;

create table korisnik(
	sifra 			int not null primary key auto_increment,
	ime				varchar(50) not  null,
	prezime			varchar(50) not  null,
	email			varchar(50) not  null,
	lozinka			char(60) not  null,
	uloga			varchar(20) not  null
);

create table stavka(
	sifra 			int not null primary key auto_increment,
	kiflica			int,
	narudzba		int,
	kolicina		int not null
);

create table kiflica(
	sifra			int not null primary key auto_increment,
	naziv 			varchar(50) not null,
	opis			text not null,
	URL_slika		varchar(200) not null,
	cijena			decimal(18,2) not null
);

create table narudzba(
	sifra 			int not null primary key auto_increment,
	korisnik		int,
	datum_narudzbe	date not null,
	vrijeme_isporuke datetime not null,
	mjesto_dostave	varchar(200),
	napomena		text(200)
);

alter table narudzba add foreign key (korisnik) references korisnik(sifra);
alter table stavka add foreign key (narudzba) references narudzba(sifra);
alter table stavka add foreign key (kiflica) references kiflica(sifra);


insert into korisnik(ime,prezime,email,lozinka,uloga)
values('Dijana','Pandurevic','dijanapandurevic@gmail.com','$2y$10$QHa5VnEZOOD0ixKz/me29OO6ze1XnCgE.fUk0UU3/DWYVugQWfOq2','admin'),
('neki','korisnik','neki@email','$2y$10$QHa5VnEZOOD0ixKz/me29OO6ze1XnCgE.fUk0UU3/DWYVugQWfOq2','user');

insert into narudzba(datum_narudzbe,vrijeme_isporuke)
values('2020-02-22','2020-02-22-18'),
('2020-02-25','2020-02-25-12');

insert into kiflica(naziv,opis,`URL_slika`,cijena)
values('prazne','slane','ggggg','1.00'),
('punjene','sunkaisir','hhhh','1.40');

insert into stavka(kolicina)
values('50'), 
('150');