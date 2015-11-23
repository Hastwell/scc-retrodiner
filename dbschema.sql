---------------------------------------------------
-- ITC240 Retrodiner A9
-- SQL Schema + Sample Data
-- Hastwell
--
-- XXX WARNING - Do not directly paste this into the MySQL command line!
-- XXX           The embedded tabs will make it think you are trying to autocomplete
-- XXX           instead of adding whitespace, leading to dozens of syntax errors.
---------------------------------------------------
CREATE DATABASE scc_retrodiner;
USE scc_retrodiner;

DROP TABLE IF EXISTS inventory;
DROP TABLE IF EXISTS manufacturers;

CREATE TABLE manufacturers
(
	manufacturerID		INT		NOT NULL PRIMARY KEY AUTO_INCREMENT,
	manufacturerName	VARCHAR(60)	NOT NULL,
	manufacturerContactNum	VARCHAR(20)	NOT NULL,
	manufacturerEmail	VARCHAR(60)	NOT NULL
);

TRUNCATE TABLE inventory;
DELETE FROM manufacturers; -- because truncate doesn't work due to the FK constraint. Yet THIS works. No idea why...
INSERT INTO manufacturers VALUES
(1, 'Wairywold Dairy', '(206) 255-1940', 'sales@wairywolddairy.com'),
(2, 'Titan Cone Company', '(914) 935-3434', 'sales@titancones.com'),
(3, 'National Potato Processors', '(444) 439-3941', 'recurringcusts@npp.com'),
(4, 'Hokahola Soda Company', '(319) 714-9724', 'sales@hokahola.com'),
(5, 'Total Resturant Supply', '(342) 343-1001', 'sales@totalresturant.com');

CREATE TABLE inventory
(
	inventoryID		INT		NOT NULL PRIMARY KEY AUTO_INCREMENT,
	manufacturer 		INT		NOT NULL,
	inventoryItemCode	VARCHAR(20)	NOT NULL UNIQUE,
	inventoryProductName	VARCHAR(60)	NOT NULL,
	inventoryQuantity 	INT		NOT NULL,
	
	inventoryUPC		CHAR(12)	NULL, -- UPCs are always 12 characters in size; no point in making this a VARCHAR
	inventoryImagePath	VARCHAR(50)	NULL,
	FOREIGN KEY (manufacturer)	REFERENCES manufacturers(manufacturerID)
);

TRUNCATE TABLE inventory;
INSERT INTO inventory VALUES
(1, 1, 'WWLD M02-1G', 'Milk, 2% (1 Gal)', 14, '590001074002', 'wwldmilk.jpg'),
(2, 1, 'WWLD BM-1G', 'Buttermilk (0.5 Gal)', 5, '590001074013', 'wwldbuttermilk.jpg'),
(3, 1, 'WWLD BTRBKL-20', 'Butter (20 Lbs Bulk)', 9000, '590001192133', 'wwldbutter.gif'),
(4, 3, 'NPP FRIWAF', 'Fries, Waffle (10 lbs)', 26, '947474000047', 'nppwaffries.jpg'),
(5, 3, 'NPP FRISTR', 'Fries, Straight (10 lbs)', 19, '947474000043', 'nppstrfries.jpg'),
(6, 4, 'HHSCWOLA', 'Ultrnew Hoke Syrup (5 gal)', 4, '355555063466', 'hhsc-coke.jpg'),
(7, 4, 'HHSCPEPPR', 'Pepper Doc Syrup (5 gal)', 9, '355555063435', 'hhsc-pepper.jpg'),
(8, 4, 'HHSCWOLALITE', 'Ultaold Hoke Diet Syrup (5 gal)', 2, '355555063313', 'hhsc-cokediet.jpg'),
(9, 4, 'HHSCDEWPEAK', 'Dew Peak Soda Syrup (5 gal)', 12, '355555062812', 'hhsc-dewpeak.jpg'),
(10,3, 'NPP SWEPF', 'Fries, Sweet Potato (4 lbs)', 24, '947474001132', 'nppswfries.jpg'),
(11,2, 'NCC WFFLCNE', 'Waffle Cones (x228/case)', 6, '433412107154', 'ncc-wafflecones.jpg'),
(12,2, 'NCC NORMCONE', 'Regular Cone (x720/case)', 5, '433412107514', 'ncc-normalcone.jpg'),
(13,2, 'NCC CONEBOWL', 'Cone Bowl (x128/case)', 2, '433412103921', 'ncc-conebowl.jpg'),
(14,2, 'NCC SUGARCONE', 'Sugar Cones (x192/case)', 4, '433412167209', 'ncc-sugarcones.jpg'),
(15,5, 'TRS-CUP12','Paper Cup, 12 oz', 113, '671204777777', 'cup12.jpg'),
(16,5, 'TRS-LID12', 'Lid for 12oz Cup', 3224, '671204666666', 'cuplid.jpg'),
(17,5, 'TRS-STRWBND', 'Straws for 12+18 oz cups', 1926, '671204385393', 'straws.jpg'),
(18,5, 'TRS-NAPKINDISP', 'Napkins, Dispenser Type', 19244, '505295113646', 'napkins.jpg'),
(19,5, 'TRS-TRAYMED', 'Food Tray, 2.5lbs', 1244, '505295904904','servetray-25.jpg'),
(20,5, 'TRS-NAPKINDRINK', 'Napkins, Beverage Type', 4095, '505295333666', 'napkin-bev.jpg');
