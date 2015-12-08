CREATE TABLE KOMUNIKATY (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Tytul VARCHAR(45) NULL,
  Komunikat VARCHAR(255) NULL,
  PRIMARY KEY(ID)
);

CREATE TABLE PERMISSIONS (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Permission VARCHAR(45) NULL,
  PRIMARY KEY(ID)
);

CREATE TABLE ITEMS (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PHPObjectName VARCHAR(255) NULL,
  PRIMARY KEY(ID)
);

CREATE TABLE BANK (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Money INTEGER UNSIGNED NULL,
  PRIMARY KEY(ID)
);

CREATE TABLE SHOP (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ITEMS_ID INTEGER UNSIGNED NOT NULL,
  Name VARCHAR(255) NULL,
  Price VARCHAR(255) NULL,
  PRIMARY KEY(ID),
  INDEX SHOP_FKIndex1(ITEMS_ID),
  FOREIGN KEY(ITEMS_ID)
    REFERENCES ITEMS(ID)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE PLAYERS (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  BANK_ID INTEGER UNSIGNED NOT NULL,
  Name VARCHAR(255) NULL,
  Level INTEGER UNSIGNED NULL,
  Experience INTEGER UNSIGNED NULL,
  Money INTEGER UNSIGNED NULL,
  Strength INTEGER UNSIGNED NULL,
  Defence INTEGER UNSIGNED NULL,
  Weapon INTEGER UNSIGNED NULL,
  Armor INTEGER UNSIGNED NULL,
  PRIMARY KEY(ID),
  INDEX PLAYERS_FKIndex1(BANK_ID),
  FOREIGN KEY(BANK_ID)
    REFERENCES BANK(ID)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE USERS (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PLAYERS_ID INTEGER UNSIGNED NOT NULL,
  PERMISSIONS_ID INTEGER UNSIGNED NOT NULL,
  Login VARCHAR(255) NULL,
  Pass VARCHAR(255) NULL,
  EMail VARCHAR(255) NULL,
  LastLogout DATETIME NULL,
  PRIMARY KEY(ID),
  INDEX USERS_FKIndex1(PERMISSIONS_ID),
  INDEX USERS_FKIndex2(PLAYERS_ID),
  FOREIGN KEY(PERMISSIONS_ID)
    REFERENCES PERMISSIONS(ID)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(PLAYERS_ID)
    REFERENCES PLAYERS(ID)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE INVENTORY (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ITEMS_ID INTEGER UNSIGNED NOT NULL,
  PLAYERS_ID INTEGER UNSIGNED NOT NULL,
  Name VARCHAR(255) NULL,
  PRIMARY KEY(ID),
  INDEX INVENTORY_FKIndex1(PLAYERS_ID),
  INDEX INVENTORY_FKIndex2(ITEMS_ID),
  FOREIGN KEY(PLAYERS_ID)
    REFERENCES PLAYERS(ID)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(ITEMS_ID)
    REFERENCES ITEMS(ID)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


