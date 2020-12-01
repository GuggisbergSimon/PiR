-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Tue Dec  1 15:30:21 2020 
-- * Schema: MLD/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database PiR;
use PiR;


-- Tables Section
-- _____________ 

create table t_client (
     idClient char(1) not null,
     cliFirstName char(1) not null,
     cliLastName char(1) not null,
     constraint ID_t_client_ID primary key (idClient));

create table buy (
     idClient char(1) not null,
     idPrinter char(1) not null,
     constraint ID_buy_ID primary key (idClient, idPrinter));

create table t_printer (
     idPrinter char(1) not null,
     priBrand char(1) not null,
     priModel char(1) not null,
     priTechnology char(1) not null,
     priSpeed char(1) not null,
     priCapacity char(1) not null,
     priWeight char(1) not null,
     priResolution char(1) not null,
     priHeight char(1) not null,
     priWidth char(1) not null,
     priDepth char(1) not null,
     priPrice char(1) not null,
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

create unique index ID_t_client_IND
     on t_client (idClient);

create unique index ID_buy_IND
     on buy (idClient, idPrinter);

create index FKbuy_t_p_IND
     on buy (idPrinter);

create unique index ID_t_printer_IND
     on t_printer (idPrinter);

