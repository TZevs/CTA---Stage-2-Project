CREATE TABLE IF NOT EXISTS UserTypes (
	userType_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	userType_name	TEXT NOT NULL,
	user_permissions	TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS Users (
	user_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	userType_id	INTEGER NOT NULL,
	username	TEXT NOT NULL UNIQUE,
	passwords	TEXT NOT NULL UNIQUE,
	email_address	TEXT NOT NULL,
	FOREIGN KEY(userType_id) REFERENCES UserTypes(userType_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS CustomerAccounts (
	customer_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	user_id	INTEGER NOT NULL,
	first_name	TEXT NOT NULL,
	middle_name	TEXT,
	last_name	TEXT NOT NULL,
	home_address_1	TEXT NOT NULL,
	home_address_2	TEXT,
	city	TEXT NOT NULL,
	dob	TEXT NOT NULL,
	postcode	TEXT NOT NULL,
	proof_of_id	TEXT NOT NULL,
	suspended	TEXT NOT NULL DEFAULT 'False',
	FOREIGN KEY(user_id) REFERENCES Users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS Currencies (
	currency_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	currency_name	TEXT NOT NULL,
	exchange_rate	REAL NOT NULL,
	currency_sign	TEXT,
	shorthand	TEXT NOT NULL,
	highest_yr_rate	REAL,
	lowest_yr_rate	REAL
);
CREATE TABLE IF NOT EXISTS CurrencyWallets (
	wallet_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	currency_id	INTEGER NOT NULL,
	amount	REAL NOT NULL,
	frozen	TEXT NOT NULL DEFAULT 'False',
	FOREIGN KEY(currency_id) REFERENCES Currencies(currency_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS CustomerWallets (
	customerWallet_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	customer_id	INTEGER NOT NULL,
	wallet_id	INTEGER NOT NULL,
	FOREIGN KEY(customer_id) REFERENCES CustomerAccounts(customer_id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(wallet_id) REFERENCES CurrencyWallets(wallet_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS Transactions (
	transaction_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	customerWallet_id	INTEGER,
	recipient_name	TEXT,
	account_num	INTEGER,
	sort_code	TEXT,
	IBAN_number	TEXT,
	wallet_from	INTEGER,
	wallet_to	INTEGER,
	currency_from	TEXT,
	currency_to	TEXT,
	reference	TEXT NOT NULL,
	transaction_date	TEXT NOT NULL,
	amount	REAL NOT NULL,
	flagged	TEXT NOT NULL DEFAULT 'False',
	FOREIGN KEY(customerWallet_id) REFERENCES CustomerWallets(customerWallet_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE IF NOT EXISTS AdminAccounts (
	admin_id	INTEGER AUTO_INCREMENT PRIMARY KEY,
	user_id	INTEGER NOT NULL,
	first_name	TEXT NOT NULL,
	last_name	TEXT NOT NULL,
	dob	TEXT NOT NULL,
	start_date	TEXT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

/* User Information */
INSERT INTO Users(user_id,userType_id,username,passwords,email_address) VALUES(1,1,'TOM-P','tom123!','tzevns@gmail.com');
INSERT INTO Users(user_id,userType_id,username,passwords,email_address) VALUES(2,2,'MAGS-T','maggie123!','tzevns@gmail.com');
INSERT INTO Users(user_id,userType_id,username,passwords,email_address) VALUES(3,3,'CLAIRE-M','claire123!','tzevns@gmail.com');
INSERT INTO Users(user_id,userType_id,username,passwords,email_address) VALUES(4,4,'JOE-K','joe123!','tzevns@gmail.com');
INSERT INTO Users(user_id,userType_id,username,passwords,email_address) VALUES(5,1,'NAT-E','nat123!','tzevns@gmail.com');

/* Customer Account Information */
INSERT INTO CustomerAccounts(customer_id,user_id,first_name,middle_name,last_name,home_address_1,home_address_2,city,dob,postcode,proof_of_id,suspended) VALUES(1,1,'Thomas','Mark','Paulson','45 Bank Road','','Leeds','12/03/1980','L34N45','Tom_id.jpg','False');
INSERT INTO CustomerAccounts(customer_id,user_id,first_name,middle_name,last_name,home_address_1,home_address_2,city,dob,postcode,proof_of_id,suspended) VALUES(2,5,'Natalie','Ann','Evans','24 Vale Court','','Sheffield','21/07/1973','S71PT3','Natalie_id.jpg','False'); 

/* Customer Wallet Link Table */
INSERT INTO CustomerWallets(customerWallet_id,customer_id,wallet_id) VALUES(1,1,1);
INSERT INTO CustomerWallets(customerWallet_id,customer_id,wallet_id) VALUES(2,1,2);
INSERT INTO CustomerWallets(customerWallet_id,customer_id,wallet_id) VALUES(3,2,3);
INSERT INTO CustomerWallets(customerWallet_id,customer_id,wallet_id) VALUES(4,2,4);

/* Transaction Inforamtion */
INSERT INTO Transactions(transaction_id,customerWallet_id,recipient_name,IBAN_number,currency_to,currency_from,reference,transaction_date,amount) VALUES(1,1,'Juno Evans','ES 91 2900 0418 45 0200051332','Euro','Great British Pound','Sorviner Payment','25/02/2024',20.50);
INSERT INTO Transactions(transaction_id,customerWallet_id,wallet_from,wallet_to,currency_to,currency_from,reference,transaction_date,amount) VALUES(2,1,1,2,'Canadian Dollar','Great British Pound','Holiday to Canada','25/02/2024',50);

/* Admin Account Information */
INSERT INTO AdminAccounts(admin_id,user_id,first_name,last_name,dob,start_date) VALUES(1,2,'Maggie','Thomson','12/11/1999','12/01/2013');
INSERT INTO AdminAccounts(admin_id,user_id,first_name,last_name,dob,start_date) VALUES(2,3,'Claire','Morgan','10/07/1998','13/02/2014');
INSERT INTO AdminAccounts(admin_id,user_id,first_name,last_name,dob,start_date) VALUES(3,4,'Joe','Killian','12/03/2002','14/03/2015');

/* Currency Information */
INSERT INTO Currencies(currency_id,currency_name,exchange_rate,currency_sign,shorthand) VALUES(1,'Great British Pounds',1,'£','GBP');
INSERT INTO Currencies(currency_id,currency_name,exchange_rate,currency_sign,shorthand,highest_yr_rate,lowest_yr_rate) VALUES(2,'Australian Dollar',1.9283,'$','AUD',1.9905,1.7660);
INSERT INTO Currencies(currency_id,currency_name,exchange_rate,currency_sign,shorthand,highest_yr_rate,lowest_yr_rate) VALUES(3,'Canadian Dollar',1.7040,'$','CAD',1.7256,1.6263);

/* User Type Information */
INSERT INTO UserTypes(userType_id,userType_name,user_permissions) VALUES(1,'Customer','customer');
INSERT INTO UserTypes(userType_id,userType_name,user_permissions) VALUES(2,'Financial Admin','financialAdmin');
INSERT INTO UserTypes(userType_id,userType_name,user_permissions) VALUES(3,'Legal Admin','legalAdmin');
INSERT INTO UserTypes(userType_id,userType_name,user_permissions) VALUES(4,'System Admin','systemAdmin');

/* Wallet Information */
INSERT INTO CurrencyWallets(wallet_id,currency_id,amount) VALUES(1,1,100);
INSERT INTO CurrencyWallets(wallet_id,currency_id,amount) VALUES(2,2,25.50);
INSERT INTO CurrencyWallets(wallet_id,currency_id,amount) VALUES(3,1,50);
INSERT INTO CurrencyWallets(wallet_id,currency_id,amount) VALUES(4,3,10);