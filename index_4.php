
<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta http-equiv="Content-Type" content="text/html" />
        <title>Дополнительное образование</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/css.css" rel="stylesheet" />
		
    </head>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>		
	<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav1">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand-1" href="index.html">CloVes</a>
                <a class="nav-link-1" href="index_4.html">Вернуться</a>
</div>
		
</nav>
<?php				
function db_connect(){
    static $connection;
    if(!isset($connection)){
        $config=parse_ini_file('../../hw_config.ini');
        $connection =mysqli_connect(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['dbname']
        );
        if($connection === false) {
            echo 'При попытке подключения к БД произошла ошибка, обратитесь к администратору.';
            return false;
        }
    }
    return $connection;
}


 
 ?>
 <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">№
            </th>
            <th class="th-sm">Фамилия
            </th>
            <th class="th-sm">Имя
            </th>
            <th class="th-sm">Отчество
            </th>
            <th class="th-sm">Адрес доставки
            </th>
            <th class="th-sm">Телефон
            </th>
            <th class="th-sm">E-mail
            </th>
          </tr>
        </thead>
        <tbody>
        <?php 
    $connection = db_connect();
    if ($connection !== false){
        $query='SELECT*FROM пользователь;';
        $result=mysqli_query($connection, $query);
        if ($result) {
            while ($row=mysqli_fetch_assoc($result)){
      echo "<tr><td>" . $row["ID"]
        . "</td><td>" . $row["Фамилия"] 
        . "</td><td>" . $row["Имя"]
        . "</td><td>" . $row["Отчество"]
        . "</td><td>" . $row["Адрес доставки"]
        . "</td><td>" . $row["Номер телефона"]
        . "</td><td>" . $row["e-mail"]
        . "</td></tr>"; 
    } 
    echo "</tbody>";

    } 
    return $connection;
} 
  ?> 