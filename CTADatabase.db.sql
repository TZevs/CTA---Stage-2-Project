CREATE TABLE UserType (
	user_type_id	INTEGER NOT NULL,
	userType_name	TEXT NOT NULL,
	user_permissions	TEXT NOT NULL,
	PRIMARY KEY(user_type_id AUTOINCREMENT)
);
CREATE TABLE CustomerAccounts (
	customer_id	INTEGER NOT NULL,
	user_id	INTEGER NOT NULL,
	first_name	TEXT NOT NULL,
	middle_name	TEXT,
	last_name	TEXT NOT NULL,
	home_address_1	TEXT NOT NULL,
	home_address_2	TEXT,
	city	TEXT NOT NULL,
	postcode	TEXT NOT NULL,
	dob	TEXT NOT NULL,
	suspended	TEXT NOT NULL DEFAULT 'False',
	PRIMARY KEY(customer_id AUTOINCREMENT),
	FOREIGN KEY(user_id) REFERENCES Users(user_id)
);
CREATE TABLE AdminAccounts (
	admin_id	INTEGER NOT NULL,
	user_id	INTEGER NOT NULL,
	first_name	INTEGER NOT NULL,
	last_name	TEXT NOT NULL,
	dob	TEXT NOT NULL,
	start_date	TEXT NOT NULL,
	PRIMARY KEY(admin_id AUTOINCREMENT),
	FOREIGN KEY(user_id) REFERENCES Users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE CurrencyWallets (
	wallet_id	INTEGER NOT NULL,
	customer_id	NUMERIC NOT NULL,
	currency_id	INTEGER NOT NULL,
	amount	NUMERIC NOT NULL,
	frozen	TEXT NOT NULL DEFAULT 'False',
	PRIMARY KEY(wallet_id AUTOINCREMENT),
	FOREIGN KEY(customer_id) REFERENCES CustomerAccounts(customer_id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(currency_id) REFERENCES Currencies(currency_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Currencies (
	currency_id	INTEGER NOT NULL,
	currency_name	TEXT NOT NULL,
	currency_value	NUMERIC NOT NULL,
	currency_sign	TEXT NOT NULL,
	currency_shorthand	TEXT NOT NULL,
	highest_rate	NUMERIC,
	lowest_rate		NUMERIC,
	PRIMARY KEY(currency_id AUTOINCREMENT)
);
CREATE TABLE Users (
	user_id	INTEGER NOT NULL,
	user_type_id	INTEGER NOT NULL,
	username	TEXT NOT NULL UNIQUE,
	user_password	TEXT NOT NULL UNIQUE,
	email_address	INTEGER NOT NULL UNIQUE,
	PRIMARY KEY(user_id AUTOINCREMENT),
	FOREIGN KEY(user_type_id) REFERENCES UserType(user_type_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE InternalTransactions (
	internal_id		INTEGER NOT NULL,
	wallet_id	INTEGER NOT NULL,
	wallet_from	INTEGER NOT NULL,
	wallet_to	INTEGER NOT NULL,
	InTransaction_date	TEXT NOT NULL,
	amount	NUMERIC NOT NULL,
	flagged	TEXT DEFAULT 'False',
	PRIMARY KEY(internal_id AUTOINCREMENT),
	FOREIGN KEY(wallet_id) REFERENCES CurrencyWallets(wallet_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE ExternalTransactions (
	external_id	INTEGER NOT NULL,
	wallet_id	INTEGER NOT NULL,
	card_number	NUMERIC NOT NULL,
	expiry_date	TEXT NOT NULL,
	name_on_card	TEXT NOT NULL,
	security_code	INTEGER NOT NULL,
	reference	TEXT NOT NULL,
	ExTransaction_date	TEXT NOT NULL,
	amount	NUMERIC NOT NULL,
	PRIMARY KEY(external_id AUTOINCREMENT),
	FOREIGN KEY(wallet_id) REFERENCES CurrencyWallets(wallet_id) ON DELETE CASCADE ON UPDATE CASCADE
);
INSERT INTO UserType VALUES (1,'Customer','customer');
INSERT INTO UserType VALUES (2,'Legal Admin','legal');
INSERT INTO UserType VALUES (3,'System Admin','system');
INSERT INTO UserType VALUES (4,'Financial Admin','financial');
INSERT INTO CustomerAccounts VALUES (1,1,'Ryan','Z','Evans','45','Bushwood Road','Sheffield','S34 6TR','23/01/1994','False');
INSERT INTO CustomerAccounts VALUES (2,2,'Tom','P','Summers','23a','Leg Lane','Manchester','M45 7GA','03/05/2000','False');
INSERT INTO AdminAccounts VALUES (1,3,'Paul','Mosley','26/08/1990','01/01/2024');
INSERT INTO AdminAccounts VALUES (2,4,'Clare','Robinson','17/07/1981','01/12/2023');
INSERT INTO AdminAccounts VALUES (3,5,'Peter','Madison','16/11/1995','01/11/2023');
INSERT INTO CurrencyWallets VALUES (1,1,1,12.55,'False');
INSERT INTO CurrencyWallets VALUES (2,1,2,2.34,'False');
INSERT INTO CurrencyWallets VALUES (3,2,1,4,'False');
INSERT INTO CurrencyWallets VALUES (4,2,3,5,'False');
INSERT INTO Currencies VALUES (1,'Great British Pound',1,'£','GBP',NULL,NULL);
INSERT INTO Currencies VALUES (2,'Australian Dollar',1.9348,'$','AUD',1.9905,1.7397);
INSERT INTO Currencies VALUES (3,'Canadian Dollar',1.701,'$','CAD',1.7256,1.6107);
INSERT INTO Users VALUES (1,1,'RYAN-Z','Ryan1234','RyanEvs@gmail.com');
INSERT INTO Users VALUES (2,1,'TOM-P','Tom1234','TomSummer@gmail.com');
INSERT INTO Users VALUES (3,2,'PAUL-M','Paul1234','PaulMos@gmail.com');
INSERT INTO Users VALUES (4,3,'CLARE-R','Clare1234','ClareRob@gmail.com');
INSERT INTO Users VALUES (5,4,'PETER-M','Peter1234','PeterMad@gmail.com');
INSERT INTO ExternalTransactions VALUES (1,1,123456789012345,'03/26','Ryan Evans',123,'Holiday','22/02/2024',20);
INSERT INTO ExternalTransactions VALUES (2,3,6543210987654321,'07/28','Tom Summers',321,'Wedding','22/02/2024',100);
COMMIT;
