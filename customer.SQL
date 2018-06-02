-- Build all customer tables.
DROP TABLE IF EXISTS customer;
CREATE TABLE customer (
   custid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(10) NOT NULL,
   firstname VARCHAR(30) NOT NULL,
   lastname VARCHAR(30) NOT NULL,
   credential VARCHAR(60) NOT NULL,
   lstupdt_usr VARCHAR(10) NOT NULL,
   lstupdt_ts  TIMESTAMP NOT NULL
);

DROP TABLE IF EXISTS customer_contact;
CREATE TABLE customer_contact (
   custid INT(6) NOT NULL,
   contact_type INT(1) NOT NULL,
   contact VARCHAR(30) NOT NULL,
   lstupdt_usr VARCHAR(10) NOT NULL,
   lstupdt_ts  TIMESTAMP NOT NULL,
   primary key (custid, contact_type)
);

DROP TABLE IF EXISTS customer_address;
CREATE TABLE customer_address (
   custid INT(6) NOT NULL,
   address_type INT(1) NOT NULL,
   street_line1 VARCHAR(30) NOT NULL,
   street_line2 VARCHAR(30),
   city VARCHAR(30) NOT NULL,
   region VARCHAR(30)  NOT NULL,
   postal VARCHAR(30) NOT NULL,
   country VARCHAR(30) NOT NULL,
   lstupdt_usr VARCHAR(10) NOT NULL,
   lstupdt_ts  TIMESTAMP NOT NULL,
   primary key (custid, address_type)
);
