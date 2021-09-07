create database mdurcevic_20_20 default character set utf8;

use mdurcevic_20_20;

create table ontologija(
    sifra int not null primary key auto_increment,
    naziv varchar(255),
    izvodac varchar(255),
    rockZanr varchar(255),
    drzava varchar(255),
    brojPjesama varchar(255)
);


drop table ontologija;

insert into ontologija(naziv, izvodac, rockZanr, drzava, brojPjesama) values 
('Ride the Lighting', 'Metallica', 'trash metal', 'SAD', '8 pjesama'),
('Appetite for Destruction', 'GNR', 'hard rock', 'SAD', '12 pjesama'),
('Use Your Illusion', 'GNR', 'hard rock', 'SAD', '16 pjesama'),
('Nevermind', 'Nirvana', 'grunge', 'SAD', '12 pjesama'),
('Imaginaerum', 'Nightwish', 'symphonic metal', 'Finska', '13 pjesama'),
('Back in Black', 'ACDC', 'heavy metal', 'Australija', '10 pjesama'),
('Bilo jednom u Hrvatskoj', 'MPT', 'christian rock', 'Hrvatska', '12 pjesama');



select * from ontologija;

DELETE FROM ontologija
WHERE sifra = 1;