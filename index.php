<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-174-129-255-15.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "ddjhaurh263t6a";
$USER = "dmwyzaotqxmuls";
$PASSWORD = "4a457a0e22c03cc08fc8742e0975a87806ef2ffecb31d997be11bcdbcaf673a1";

//$link = pg_connect("host=$HOST dbname=$DBNAME user=$USER password=$PASSWORD sslmode=require");
 $link = pg_connect("dbname=dfa59covq5sufi host=ec2-54-235-250-38.compute-1.amazonaws.com port=5432 user=czeyrakpbpisjn password=79137d4e935c89660933197c13d9eead23ecdf3a7ceec1dc4e0384891bad49c9 sslmode=require");
//$link = pg_connect(getenv("DATABASE_URL"));

// Check connection
if($link === false){
    die("ERROR: Could not connect. ");
}
 else {echo "Connected";}
 
// Escape user inputs for security

$id = pg_escape_string ($link, $_REQUEST['id']);
$name = pg_escape_string ($link, $_REQUEST['name']);
$cat = pg_escape_string ($link, $_REQUEST['cat']);
$date = pg_escape_string ($link, $_REQUEST['date']);
$price = pg_escape_string ($link, $_REQUEST['price']);
$description = pg_escape_string ($link, $_REQUEST['desc']);

echo $id;
echo "";
echo $name;
echo "";
echo $cat;
echo "";
echo $date;
echo "";
echo $price;
echo "";
echo $desc;
echo "";
 
// Attempt insert query execution
$sql = "INSERT INTO Product (Id, Product_Name, Catergory, Date, Price, Descriptions) VALUES ('$id', '$name', '$cat','$date','$price','abc')";
echo $sql;

//$sql2 = "INSERT INTO Product (Id, Product_Name, Catergory, Date, Price, Descriptions) VALUES ('02', 'Me', 'CatX','2019-12-20',11,'abc')";
//INSERT INTO public.product (
//    cat, description, id, name, price, date) VALUES (
//    'kshf'::character varying, 'sdfdg'::character varying, 'ăerw12'::character varying, 'sdsd'::character varying, '123'::character varying, '1233'::character varying)
//     returning id;

$sql3 = 'INSERT INTO public."Product" (
 "id", "name", "cat", "date", "price", "descriptions",) VALUES ('."
'$id'::character varying, '$name'::character varying, '$cat'::character varying, '$date'::character varying, '$price'::character varying, '$description'::character varying)".
 'returning "Id"';
echo $sql3;

$result = pg_query($link, $sql3);
echo $result;

if($result){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}
 
// Close connection

pg_close($link);
?>