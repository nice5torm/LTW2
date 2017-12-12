PRAGMA foreign_keys = ON;


CREATE TABLE user
(
	username TEXT NOT NULL UNIQUE PRIMARY KEY,
	password TEXT NOT NULL,
	age INTEGER,
	gender TEXT,
	country TEXT, 
	email TEXT NOT NULL UNIQUE
);


CREATE TABLE toDoList
(
	idList INTEGER PRIMARY KEY AUTOINCREMENT,
	creator INTEGER NOT NULL,
	title TEXT NOT NULL, 
	FOREIGN KEY (creator) REFERENCES user (username)ON DELETE CASCADE
);

INSERT INTO toDoList(idList, creator, title) VALUES (1,'user3','list1'); 
INSERT INTO toDoList(idList, creator, title) VALUES (2,'user5','list2'); 
INSERT INTO toDoList(idList, creator, title) VALUES (3,'user1','list3'); 
INSERT INTO toDoList(idList, creator, title) VALUES (4,'user2','list4'); 
INSERT INTO toDoList(idList, creator, title) VALUES (5,'user4','list5'); 
INSERT INTO toDoList(idList, creator, title) VALUES (6,'user2','list6'); 

CREATE TABLE itemList
(
	idItem INTEGER PRIMARY KEY AUTOINCREMENT,
	idList INTEGER NOT NULL,
	item TEXT NOT NULL, 
	done BOOLEAN NOT NULL DEFAULT FALSE,
	FOREIGN KEY (idList) REFERENCES todoList(idList)ON DELETE CASCADE
);

INSERT INTO itemList(idItem, idList, item, done) VALUES (1,1,'item1',1);
INSERT INTO itemList(idItem, idList, item, done) VALUES (2,1,'item2',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (3,1,'item3',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (4,2,'item1',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (5,2,'item2',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (6,2,'item3',1);
INSERT INTO itemList(idItem, idList, item, done) VALUES (7,2,'item4',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (8,2,'item5',1);
INSERT INTO itemList(idItem, idList, item, done) VALUES (9,2,'item6',1);
INSERT INTO itemList(idItem, idList, item, done) VALUES (10,3,'item1',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (11,3,'item2',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (12,3,'item3',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (13,3,'item4',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (14,3,'item5',1);
INSERT INTO itemList(idItem, idList, item, done) VALUES (15,4,'item1',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (16,4,'item2',0);
INSERT INTO itemList(idItem, idList, item, done) VALUES (17,5,'item1',0);

CREATE TABLE members
(
	idList INTEGER NOT NULL,
	user TEXT NOT NULL,
	PRIMARY KEY (idList,user),
	FOREIGN KEY (idList) REFERENCES todoList(idList)ON DELETE CASCADE,
	FOREIGN KEY (user) REFERENCES user(username)ON DELETE CASCADE
);

INSERT INTO members (idList, user) VALUES (1,'user3');
INSERT INTO members (idList, user) VALUES (2,'user5');
INSERT INTO members (idList, user) VALUES (2,'user3');
INSERT INTO members (idList, user) VALUES (3,'user1');
INSERT INTO members (idList, user) VALUES (4,'user2');
INSERT INTO members (idList, user) VALUES (5,'user4');
INSERT INTO members (idList, user) VALUES (6,'user2');




