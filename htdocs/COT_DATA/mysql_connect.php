<?php

$con = mysql_connect("localhost","root","");
if(!mysql_select_db("futures", $con))
{
	mysql_query("CREATE DATABASE futures",$con);
	mysql_select_db("futures", $con);
	mysql_select_db("my_db", $con);
	mysql_query("CREATE TABLE dx
(
date DATE,
symbol TINYTEXT,
open FLOAT,
high FLOAT,
low FLOAT,
close FLOAT,
volume INT,
interest INT,
cotlc_L INT,
cotlc_S INT,
cotlc_C INT
)",$con);
if(!mysql_query("ALTER TABLE dx ADD UNIQUE (date)",$con))
	die(mysql_error());
}

?>