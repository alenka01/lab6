<?php
    /** 
    * Код PHP выносим вверх. Подключение к базе данных выносим в отдельный файл db.php
    * и вставляем файл функцией include
    */

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
  
    
    /* Заводим переменные name и author и присваиваем им пустые значения, на тот случай, если захотим их где-то вывести в html коде. */
    $Имя = "";
    $Фамилия = "";
    $Отчество="";
    $Адрес="";
    $Телефон="";
    $E_mail="";
    $Пароль="";
    $Логин="";


    /* Проверяем, существуют ли переменные $_POST и если существуют, тогда обрабатываем данные POST от пользователя и переопределяем переменные $name и $author, присвоив им отфильтрованные значения от пользователя
    */
    if(isset($_POST['Имя']) && isset($_POST['Фамилия']) && isset($_POST['Отчество']) && isset($_POST['Адрес'])&& isset($_POST['Номер телефона']) && isset($_POST['E-mail']) && isset($_POST['Пароль']) && isset($_POST['Логин'])) {
        
        $ИмяFilter = htmlspecialchars($_POST ['Имя'], ENT_QUOTES, 'UTF-8');
        $ФамилияFilter = htmlspecialchars($_POST ['Фамилия'], ENT_QUOTES, 'UTF-8');
        $ОтчествоFilter = htmlspecialchars($_POST ['Отчество'], ENT_QUOTES, 'UTF-8');
        $АдресFilter = htmlspecialchars($_POST ['Адрес'], ENT_QUOTES, 'UTF-8');
        $ТелефонFilter = htmlspecialchars($_POST ['Номер телефона'], ENT_QUOTES, 'UTF-8');
        $E_mailFilter = htmlspecialchars($_POST ['E-mail'], ENT_QUOTES, 'UTF-8');
        $ПарольFilter = htmlspecialchars($_POST ['Пароль'], ENT_QUOTES, 'UTF-8');
        $ЛогинFilter = htmlspecialchars($_POST ['Логин'], ENT_QUOTES, 'UTF-8');


        $Имя =  $ИмяFilter;
        $Фамилия = $ФамилияFilter;
        $Отчество=$ОтчествоFilter;
        $Адрес=$АдресFilter;
        $Телефон=$ТелефонFilter;
        $E_mail=$E_mailFilter;
        $Пароль=$ПарольFilter;
        $Логин=$ЛогинFilter;


        /**
        * Вставку в базу данных
        */

        $query = "INSERT INTO music VALUES(null, '$Имя', '$Фамилия','$Отчество', '$Адрес','$Телефон', '$E_mail','$Пароль','$Логин')";
        $mysqli->query($query);

    }


?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta http-equiv="Content-Type" content="text/html" />
        <title>Дополнительное образование</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/css.css" rel="stylesheet" />
    </head>
    <button onclick="document.getElementById('id01').style.display='block'">Login</button>

<div id="id01" class="modal-0">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container-0-0">
      <h1>Регистрация</h1>
      <p>Пожалуйста заполните данную форму для создания аккаунта.</p>
      <hr>
      <label for="text"><b>Имя</b></label>
      <input type="text" name="Имя" placeholder="<?php echo $Имя;?>" required>
      <label for="Фамилия"><b>Фамилия</b></label>
      <input type="text" name="Фамилия" placeholder="<?php echo $Фамилия;?>"  required>
      <label for="Отчество"><b>Отчество</b></label>
      <input type="text" name="Отчество" placeholder="<?php echo $Отчество;?>"  required>
      <label for="Адрес"><b>Адрес</b></label>
      <input type="text" placeholder="<?php echo $Адрес;?>" name="Адрес" required>
      <label for="Телефон"><b>Телефон</b></label>
      <input type="text" placeholder="<?php echo $Телефон;?>" name="Номер телефона" required>
      <label for="E-mail"><b>E-mail</b></label>
      <input type="text" placeholder="<?php echo $E_mail;?>" name="E-mail" required>
      <label for="Имя"><b>Логин</b></label>
      <input type="text" name="Имя" placeholder="<?php echo $Имя;?>" required>
      <label for="psw"><b>Пароль</b></label>
      <input type="password" placeholder="<?php echo $Логин;?>" name="Логин" required>

      <label for="psw-repeat"><b>Повтор пароля</b></label>
      <input type="password" placeholder="Повтор пароля" name="psw-repeat" required>

      <label>
        <input type="checkbox" checked="checked-0" name="remember" style="margin-bottom:15px"> Запомнить меня
      </label>

      <div class="clearfix">
        <button type="submit" class="signup">Регистрация</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Отмена</button>
        
      </div>
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>		