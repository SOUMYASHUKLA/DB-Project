
select * from Student;

-- insert into Student values (1001,'fatima','anwar','cs','a22-ptowers uor','1234567891','1995-01-29');
-- insert into Student values (1002,'aditi','ravi','cs','a25-ptowers uor','1234567811','1995-08-13');

select * from Course;

-- insert into Course values ('cs890','Algorithms','cs');
-- insert into Course values ('cs848','HCC','cs');
-- insert into Course values ('cs215','Web and DB','cs');

SELECT * FROM Student_Enrolment ;

-- insert into Student_Enrolment  values (1000,'cs890','student');
-- insert into Student_Enrolment  values (1000,'cs848','student');
-- insert into Student_Enrolment  values (1001,'cs215','marker');
-- insert into Student_Enrolment  values (1002,'cs215','student');
-- insert into Student_Enrolment  values (1000,'cs215','student');
-- insert into Student_Enrolment  values (1001,'cs848','student');

select CID from Student_Enrolment where SID =1000;

select * from Student_Enrolment where SID =1000;

select * from Assignment_Mark;








