<?php
include("www/blocks/bd.php");
require_once 'www/blocks/testField.php';

if(isset($_POST['firstname'])){$name=$_POST['firstname'];}
if(isset($_POST['agree'])){$agree=$_POST['agree'];}
if(isset($_POST['lastname'])){$lastname=$_POST['lastname'];}
if(isset($_POST['country'])){$country=$_POST['country'];}
if(isset($_POST['ptoken'])){$ptoken=$_POST['ptoken'];}
if(isset($_POST['email'])){$email=$_POST['email']; }
if(isset($_POST['ethereum'])){$ethereum=$_POST['ethereum'];}

/*echo "<pre>";
echo print_r($_POST);
echo "</pre>";*/



$test = new testField();

$united = [];

if($test->forname($name)){array_push($united, $name);}else{unset($name);}
if($test->forname($agree)){array_push($united, $agree);}else{unset($agree);}
if($test->forname($lastname)){array_push($united, $lastname);}else{unset($lastname);}
if($test->forname($country)){array_push($united, $country);}else{unset($country);}
if($test->forEmail($email)){array_push($united, $email);}else{unset($email);}
if($test->forEther($ethereum)){array_push($united, $ethereum);}else{unset($ethereum);}



if($test->forToken($ptoken)){
    $new_ptoken = $test->forToken($ptoken); 
    array_push($united, $new_ptoken);   
}else{
    unset($ptoken);
}


/*echo "<pre>";
echo print_r($united);
echo "</pre>";*/

/*echo "<pre>";
echo print_r($_POST);
echo "</pre>";*/


$cont = count($united);




/*if(preg_match('/^[a-zа-яё]{1}[a-zа-яё]*[a-zа-яё\d]{1}$/i', $name)){

	echo $name;
}else{
	echo "Absent";
}*/




if($cont == 7)
{
    $result = $pdo->query("INSERT INTO records (name, lastname, email, country, token, etherad, agree)
    VALUES ('$name', '$lastname', '$email', '$country', '$new_ptoken', '$ethereum', '$agree') ");
    if($result)
    {
    	echo "<p><h3 style='color:#05ee52; text-align: center;'>Success</h3></p>";
    	
    }
    else{ echo "<p>Something wrong</p>";} 
}
else{
    echo "<p><h3 style='color:#f85606; text-align: center;'>Fail</h3></p>";
    
}




















?>