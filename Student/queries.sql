
select Cname from Course, Student s where c.CID in (Select e.CID from Student_Enrolment e where s.SID = 1000 
and c.cid = e.cid );

select * from course;

select * from Student_Enrolment;

select * from Student;

select cid from Student_Enrolment where sid = 1000;

select Cname from course where CID in 
(select CID from Student_Enrolment where SID=1001);

-- UPDATE Student (Fname,Lname,Faculty,Address,Contact,DOB) SET

UPDATE Student SET Fname='gursimran', Lname='kaur',Faculty='science',Address='asfsfa',Contact=9000000,DOB='2020-11-09'
WHERE SID=5000;

select * from Student;

select * from instructor;


-- insert into Student values (5000,'Gursimran','kaur','cs','GoldenMile road',9876543,'1990-12-11');