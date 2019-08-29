USE UGMS_DB;

-- Fatima
CREATE TABLE Instructor (
    IID INT(9),
    Fname VARCHAR(20) NOT NULL,
    Lname VARCHAR(20) NOT NULL,
    Contact INT(11) NOT NULL,
    Faculty VARCHAR(20) NOT NULL,
    PRIMARY KEY (IID)
);


CREATE TABLE Course (
    CID VARCHAR(6),
    Cname VARCHAR(50) NOT NULL,
    Faculty VARCHAR(50) NOT NULL,
    PRIMARY KEY (CID)
);


CREATE TABLE Instructor_Enrolment (
    IID INT(9),
    CID VARCHAR(6),
    PRIMARY KEY (IID, CID),
    FOREIGN KEY (IID) REFERENCES Instructor(IID),
    FOREIGN KEY (CID) REFERENCES Course(CID)
);

CREATE TABLE Assignment_Mark (
    Task_Type VARCHAR(30),
    SID INT(9),
    CID VARCHAR(6),
    Marks INT(3),
    PRIMARY KEY (SID, CID),
    FOREIGN KEY (SID) REFERENCES Student(SID),
    FOREIGN KEY (CID) REFERENCES Course(CID)
);

-- Gursimran
CREATE TABLE Student
(
SID INT(9),
Fname VARCHAR(20) NOT NULL,
Lname VARCHAR(20) NOT NULL,
Faculty VARCHAR(20) NOT NULL,
Address VARCHAR(50) NOT NULL,
Contact INTEGER (11) NOT NULL,
DOB DATE NOT NULL,
PRIMARY KEY (SID)
);


CREATE TABLE LoginID
(
LogID INTEGER(3) auto_increment,
UserID VARCHAR(15),
Role VARCHAR(15),
PRIMARY KEY(LogID)
);


CREATE TABLE Student_Auth ( 
UserID VARCHAR(15),
Pwd VARCHAR(20),
SID INT(9),
primary key (UserID),
FOREIGN KEY (SID) REFERENCES Student (SID)
);



CREATE TABLE Instructor_Auth ( 
UserID VARCHAR(15),
Pwd VARCHAR(20),
IID INT(9),
PRIMARY KEY (UserID),
FOREIGN KEY (IID) REFERENCES Instructor (IID)
);


CREATE TABLE Admin
(
	AID INT(9),
    Fname VARCHAR(20) NOT NULL,
    Lname VARCHAR(20) NOT NULL,
    PRIMARY KEY (AID)
);

CREATE TABLE Admin_Auth
(
	UserID VARCHAR(15),
    Pwd VARCHAR(20),
    AID INT(9),
    PRIMARY KEY (UserID),
    FOREIGN KEY (AID) REFERENCES Admin(AID)
);

-- Soumya

CREATE TABLE Student_Enrolment
(
 SID INT(9), 
 CID VARCHAR(6),
 Role VARCHAR(20),
 PRIMARY KEY(SID,CID),
 FOREIGN KEY (SID) REFERENCES Student(SID),
 FOREIGN KEY (CID) REFERENCES Course(CID)
);

CREATE TABLE Grade_Sheet
(
	CID VARCHAR(6),
    SID INT(9),
	Final_Grade INT(3),
    PRIMARY KEY (CID,SID),
    FOREIGN KEY (CID) REFERENCES Course(CID),
    FOREIGN KEY (SID) REFERENCES Student(SID)
);

