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
