<?php 

//See programm on tabelite loomiseks. Kopeeri lopus olevad tulbad sql vaartuseks ning jooksuta serveris. 
//Loob Mysqli tabelid


$host = "localhost";
$user="root";
$pw = "";
$db = "questbook";

$conn = new mysqli($host,$user,$pw,$db);
if($conn ->connect_error){die("Couldnt connect to DB <br>".$conn->connect_error);}

$sql = "INSERT INTO photo_id () VALUES ()";

/*
"create table rates(
user_id		VARCHAR(30), 
rate	integer,
pic_id	integer,
ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY	(user_id)
)";
*/


if($conn->query($sql)===TRUE){echo "Data saved succesfully";
} else{echo "Error saving data <br>".$conn->error;}


/*
//mysql --user=st2014 --password=progress st2014 
//Eelmalda lopukomentaarid!

"create table user(
username VARCHAR(30),
email VARCHAR(40),
ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
password VARCHAR(20), -- password on meil lahtiselt, mis päris rakenduses ei sobiks
PRIMARY KEY (username))"; // username on nüüd alati unikaalne, kahte rida sama usernamega baas ei luba

-- see on fotode jaoks
"create table photos(
id		integer AUTO_INCREMENT, --pildi ID
user_id integer, --Et iga pilt oleks ka kasutajaga sunkroonis
name VARCHAR(80),
description VARCHAR(1000), --Natuke pikem kirjeldus!
suffix 	VARCHAR(10), -- see, mis tyypi fail on, kas jpg voi gif
ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id))";


--path VARCHAR(80);   


create table comments(
id		integer AUTO_INCREMENT,
pic_id integer, --Et ikka oigele pildile annad komentaari
text	VARCHAR(80),
users_id	integer,
ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY	(id)
);
create table rates(
user_id		integer AUTO_INCREMENT, --Kes andis hinde. 
rate	integer,
pic_id	integer,
ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY	(id)
);
*/
// --/Mihkel.Tiganik/public_html/kass.jpg -- siin on pildifail

// --NOT NULL AUTO_INCREMENT, ?>