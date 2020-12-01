-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Tue Dec  1 15:46:47 2020 
-- * LUN file: F:\tools\uwamp\www\PiR\db\PiR.lun 
-- * Schema: PiR/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database PiR;
use PiR;


-- Tables Section
-- _____________ 

create table buy (
     idClient int not null,
     idPrinter int not null,
     constraint ID_buy_ID primary key (idClient, idPrinter));

create table t_client (
     idClient int not null auto_increment,
     cliFirstName varchar(50) not null,
     cliLastName varchar(50) not null,
     constraint ID_t_client_ID primary key (idClient));

create table t_printer (
     idPrinter int not null auto_increment,
     priBrand varchar(50) not null,
     priModel varchar(100) not null,
     priTechnology char(1) not null,
     priSpeed int not null,
     priCapacity int not null,
     priWeight float(1) not null,
     priResolution int not null,
     priHeight int not null,
     priWidth int not null,
     priDepth int not null,
     priPrice int not null,
     constraint ID_t_printer_ID primary key (idPrinter));


-- Constraints Section
-- ___________________ 

alter table buy add constraint FKbuy_t_p_FK
     foreign key (idPrinter)
     references t_printer (idPrinter);

alter table buy add constraint FKbuy_t_c
     foreign key (idClient)
     references t_client (idClient);


-- Index Section
-- _____________ 

create unique index ID_buy_IND
     on buy (idClient, idPrinter);

create index FKbuy_t_p_IND
     on buy (idPrinter);

create unique index ID_t_client_IND
     on t_client (idClient);

create unique index ID_t_printer_IND
     on t_printer (idPrinter);

