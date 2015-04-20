<?php

$con = mysqli_connect('127.0.0.1', 'jstewart', 'Changeme123', 'login');


if (!$con){
     die("Could not connect ");


           }

$query = '
INSERT INTO users (user_id, user_name, user_group_id, user_password_hash, user_email, user_logged_in)
VALUES
	(1,"jstewart",NULL,"$2y$10$xxg5dkz1sScE65jI4y4hXeGGedk/.ouvqbmF8Zb0kok0MWbYLD7tO","jstewart@ansolutions.com",1),
	(3,"test",NULL,"$2y$10$/Vl8NwOyvv2w5nuRbjtfZ.gPibp0c9aGi4nihtYTpNiTZaT091wh.","nj.jstewart@gmail.com",0),
	(4,"test2",NULL,"$2y$10$najh4YeIa/JQtZE14bnyt.m.CG1/X1//RVoYka14ZqWlKDPajOUdu","test@email.com",1)';
$results = mysqli_query($con,$query);
if(!$results){
  echo "fail";
}



?>
