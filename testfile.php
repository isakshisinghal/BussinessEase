<?php include 'Mycon.php';
 $con=new Mycon("minor");
  $qu="Select id from worker";
   echo $con->countTotal($qu)+1;
   echo "<br>".$_SERVER['REQUEST_URI'];
    ?>

DELIMITER //
CREATE PROCEDURE check_insert(in cat varchar(200),in iname varchar(200),in idesp varchar(200),in pr varchar(200),in brand varchar(200))
BEGIN
declare cidd int;
SELECT cid into cidd from category where category=cat;
case
when(cidd>0) then 
(
    INSERT INTO items (cid, item_name, item_description, price, company_name) VALUES (cidd, iname, idesp, pr, brand);
);
else
(
    INSERT INTO category (cid, category) VALUES (NULL, cat);
    SELECT cid into cidd from category where category=cat;
    INSERT INTO items (cid, item_name, item_description, price, company_name) VALUES (cidd, iname, idesp, pr, brand);
);
end case;
END //
DELIMITER ;

delimiter //
create trigger total_salary
after insert
on employee
for each row
begin
set employee.total_sal=employee.emp_sal+employee.ta+employee.da;
end //
delimiter ;
