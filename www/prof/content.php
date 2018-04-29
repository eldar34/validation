<?php
//Запуск сессий;
session_start();
//если пользователь не авторизован

if (!(isset($_SESSION['Name'])))
{
//идем на страницу авторизации
header("Location: ../../login.html");
exit;
};

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Admin</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/bootstrap.css" rel="stylesheet"> 
</head>

<body>

<?php


include("../blocks/bd.php");

$result4 = $pdo->query("SELECT * FROM records");



$num = 5;



if(!isset($_GET['page'])){
  $page = 1;
}else{

  if(intval($_GET['page'])){
    $page = intval($_GET['page']);
  }else{
    $page = 1;
  }
}



$this_page_first_result = ($page - 1) * $num;







echo <<<HERE


<div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <div class="page-header">
          <div class="alert alert-info" role="alert">
            
            <ul>
              <li><a href="logout.php" class="alert-link">Exit</a>.</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-12  panel panel-default">
          <div "class="panel-heading">
            <h3 class="panel-title"></h3>
          </div>
          <div id="output" class="panel-body">
         <table class="table table-bordered table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Country</th>
      <th>Token</th>
      <th>Ethereum</th>
      <th>Agree</th>
    </tr>
  </thead>
  <tbody>
HERE;

/*Cсоставление запроса*/

$sql = "SELECT * FROM records LIMIT " . $this_page_first_result . ',' . $num;
$result2 = $pdo->query($sql);
$number_of_results = $result4->rowCount();
$number_of_pages = ceil($number_of_results/$num);










while($myrow2 = $result2->fetch()){
   printf("
    <tr>
    <th scope='row'>%s</th>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <tr>

    ", $myrow2['id'], $myrow2['name'], $myrow2['lastName'], $myrow2['email'], $myrow2['country'], $myrow2['token'], 
    $myrow2['etherad'], $myrow2['agree']); 
}





echo "</tbody></table><div class='col-lg-10 col-lg-offset-5'>
 <nav aria-label='Pagi'><ul class='pagination'>";
   
for($page=1;$page<=$number_of_pages;$page++){

echo '<li><a href="content.php?page='. $page .'">' . $page . '</a></li>';

}



    
        
    

echo <<<HERE
              </ul>
            </nav>
            </div>

          </div>
        </div>

        
      </div>
    </div>
    <div class="text-center">
    <a role="button" class="btn btn-success" href="fileCreator.php">Download</a>
    </div>
  </div>

</body>
</html>


HERE;








?>