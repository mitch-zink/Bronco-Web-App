DROP DATABASE IF EXISTS bronco;
CREATE DATABASE bronco;
USE bronco; 
  
CREATE TABLE phonebook 
( 
    phoneid      INT             NOT NULL    auto_increment, 
    firstname    VARCHAR(60),
    lastname     VARCHAR(60),
    business     VARCHAR(60), 
    addr1        VARCHAR(60)     NOT NULL, 
    addr2        VARCHAR(60)     DEFAULT NULL, 
    city         VARCHAR(40)     NOT NULL, 
    state        VARCHAR(2)      NOT NULL, 
    zip          VARCHAR(10)     NOT NULL, 
    emailaddress VARCHAR(255)    NOT NULL, 
    phonenumber  VARCHAR(12)     NOT NULL, 
    PRIMARY KEY (phoneid), 
    UNIQUE INDEX emailaddress (emailaddress) 
);

CREATE TABLE parts 
( 
    partid      INT             NOT NULL    auto_increment, 
    itemname    VARCHAR(60)     NOT NULL, 
    itemdesc    VARCHAR(255)    NOT NULL,
    partfamily  VARCHAR(255)    NOT NULL,
    quantity    INT             NOT NULL, 
    comments    VARCHAR(255),
    PRIMARY KEY (partid) 
);

CREATE TABLE transactions
(
    transid      INT             NOT NULL    auto_increment,
    phoneid      INT             NOT NULL,
    partid       INT             NOT NULL,
    date         DATE            NOT NULL,
    price        DECIMAL(10,2)   NOT NULL,
    transtype    VARCHAR(10)     NOT NULL,
    quantity     INT             NOT NULL,
    PRIMARY KEY (transid),
    INDEX phoneid (phoneid),
    INDEX partid (partid)
    /*FOREIGN KEY (phoneid) REFERENCES phonebook (phoneid),
    FOREIGN KEY (partid) REFERENCES parts (partid)*/
);

CREATE TABLE projects 
( 
    projectid       INT           NOT NULL    auto_increment, 
    projectname     VARCHAR(100)  NOT NULL, 
    make            VARCHAR(60)   NOT NULL,
    model           VARCHAR(60)   NOT NULL,
    trim_pkg        VARCHAR(60)   NOT NULL,       
    projectdesc     VARCHAR(255)          ,
    purchprice      DECIMAL(10,2) NOT NULL, 
    purchdate       DATE          NOT NULL, 
    sellprice       DECIMAL(10,2), 
    selldate        DATE,
    projectcomments VARCHAR(255),
    PRIMARY KEY (projectid), 
    UNIQUE INDEX (projectname),
    INDEX projectid (projectid)
);

CREATE TABLE project_parts
(
    partid      INT             NOT NULL,
    projectid   INT             NOT NULL,
    quantity    INT             NOT NULL,
    PRIMARY KEY (partid, projectid),
    INDEX partid (partid),
    INDEX projectid (projectid)
    /*FOREIGN KEY (partid) REFERENCES parts (partid),
    FOREIGN KEY (projectid) REFERENCES projects (projectid)*/  
);
                 
CREATE TABLE workcompleted 
( 
    workid          INT           NOT NULL   auto_increment, 
    projectid       INT           NOT NULL, 
    workname        VARCHAR(60)   NOT NULL, 
    dateperformed   DATE          NOT NULL,
    workdesc        VARCHAR(255)  NOT NULL, 
    workcomments    VARCHAR(255), 
    PRIMARY KEY (workid),
    INDEX projectid (projectid)
    /*FOREIGN KEY (projectid) REFERENCES projects (projectid)*/ 
);
                 
CREATE TABLE files 
( 
    fileid          INT            NOT NULL   auto_increment, 
    projectid       INT            NOT NULL, 
    filename        VARCHAR(60)    NOT NULL, 
    filetype        VARCHAR(60)    NOT NULL, 
    dateadded       DATE           NOT NULL, 
    PRIMARY KEY (fileid),
    INDEX projectid (projectid)
    /* FOREIGN KEY (projectid) REFERENCES projects (projectid)*/
); 

CREATE TABLE users
(
    userid          INT            NOT NULL     auto_increment,
    username        VARCHAR(20)    NOT NULL,
    password        VARCHAR(20)    NOT NULL,
    PRIMARY KEY (userid),
    UNIQUE INDEX (username),
    UNIQUE INDEX (password) 
);


INSERT INTO phonebook (phoneID, firstname, lastname, business, addr1, city, state, zip, emailaddress, phonenumber) 
VALUES (1,'Rock','Strongo', NULL,'105 Ha Dr','Pittsburgh','PA','16066','me@woo.com','8888888888');

INSERT INTO parts (partid, itemname, partfamily, itemdesc, quantity, comments) 
VALUES (1,'muffler', 'exhaust', 'flowmaster', 2 ,'It''s got flooooooow');

INSERT INTO transactions (transid, phoneid, partid, date, price, transtype, quantity)
VALUES (1, 1, 1,'2020-03-02','150.00', 'buy', 2);

INSERT INTO projects (projectid, projectname, make, model, trim_pkg, purchprice, purchdate, sellprice, selldate, projectcomments) 
VALUES (1,'77 Bronco offroad','Ford','Bronco','SLE','67200.00','2019-03-14',NULL,NULL, 'Overall in good condition. Needs new bumper and seats.');

INSERT INTO project_parts (partid, projectid)
VALUES (1, 1);

INSERT INTO workcompleted (workid, projectid, workname, workdesc, workcomments, dateperformed) 
VALUES (1, 1,'Oil change','5qt 5W-20 ','Completed','2019-03-14'); 

INSERT INTO files (fileid, projectid, filename, filetype, dateadded)
VALUES (1, 1, 'bronco.jpg', 'Picture', '2020-03-02');

INSERT INTO users (userid, username, password)
VALUES (1, 'admin', 'admin');

