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
	category TEXT NOT NULL
	FOREIGN KEY (creator) REFERENCES user (username)ON DELETE CASCADE
);
INSERT INTO toDoList(idList, creator, title, category) VALUES (1,'user3','list1','category1');
INSERT INTO toDoList(idList, creator, title, category) VALUES (2,'user5','list2','category1');
INSERT INTO toDoList(idList, creator, title, category) VALUES (3,'user1','list3','category1');
INSERT INTO toDoList(idList, creator, title, category) VALUES (4,'user2','list4','category2');
INSERT INTO toDoList(idList, creator, title, category) VALUES (5,'user4','list5','category2');
INSERT INTO toDoList(idList, creator, title, category) VALUES (6,'user2','list6','category2');

CREATE TABLE itemList
(
	idItem INTEGER PRIMARY KEY AUTOINCREMENT,
	idList INTEGER NOT NULL,
	item TEXT NOT NULL, 
	done BOOLEAN NOT NULL DEFAULT FALSE,
	dueDate TEXT NOT NULL
	assignedTo INTEGER NOT NULL

	FOREIGN KEY (idList) REFERENCES todoList(idList)ON DELETE CASCADE
);

INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (1,1,'item1',1, '2018-12-31','user1');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (2,1,'item2',0, '2018-12-31','user2');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (3,1,'item3',0, '2018-12-31','user2');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (4,2,'item1',0, '2018-12-01','user3');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (5,2,'item2',0, '2018-12-01','user2');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (6,2,'item3',1, '2018-12-01','user1');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (7,2,'item4',0, '2018-11-31','user2');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (8,2,'item5',1, '2018-11-31','user2');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (9,2,'item6',1, '2018-11-31','user4');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (10,3,'item1',0, '2018-11-01','user3');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (11,3,'item2',0, '2018-11-01','user5');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (12,3,'item3',0, '2018-11-01','user2');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (13,3,'item4',0, '2018-10-31','user1');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (14,3,'item5',1, '2018-10-31','user5');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (15,4,'item1',0, '2018-10-31','user1');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (16,4,'item2',0, '2018-10-01','user4');
INSERT INTO itemList(idItem, idList, item, done, dueDate,assignedTo) VALUES (17,5,'item1',0, '2018-10-01','user3');

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