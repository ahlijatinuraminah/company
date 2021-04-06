create view v_employee as
select e.*, concat(s.fname,' ', s.minit,' ', s.lname) as super_name, d.dname
from employee e LEFT JOIN employee s 
on e.super_ssn = s.ssn
INNER join department d
on e.dno = d.dnumber


CREATE VIEW v_projectworks as
SELECT p.*, w.*, d.*, e.* 
FROM project p, works_on w, department d, employee e 
WHERE p.pnumber = w.pno
and p.dnum = d.dnumber
and w.essn = e.ssn


create view v_user as
SELECT u.*, e.ssn, e.fname,  e.minit, e.lname
FROM user u RIGHT JOIN employee e
ON u.userid = e.userid

SELECT * FROM `project` 
WHERE pnumber not in(
    SELECT pno 
    from works_on
    WHERE essn = '999999999')
	
	SELECT timestampdiff(year, bdate, now()) as age from employee