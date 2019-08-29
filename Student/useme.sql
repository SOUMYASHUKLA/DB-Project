
-- Cname

select Cname from course where CID in 
(select CID from Student_Enrolment where SID=1001);

-- Task Type
select * from Assignment_Mark;

select * from Assignment_Mark where SID =1000 and CID = 'cs215';

-- Marks

-- Overall grade

select avg(Marks) from Assignment_Mark where SID =1000;
select avg(Marks) from Assignment_Mark where SID =1000 and CID='cs215';

select CID,avg(Marks) from Assignment_Mark where SID =1000 GROUP BY CID; 

select * from Assignment_Mark where SID =1000 and CID='cs215';