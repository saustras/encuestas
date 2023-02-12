<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Examen Online </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <script>
    $(function() {
        $(document).on('scroll', function() {
            console.log('scroll top : ' + $(window).scrollTop());
            if ($(window).scrollTop() >= $(".logo").height()) {
                $(".navbar").addClass("navbar-fixed-top");
            }

            if ($(window).scrollTop() < $(".logo").height()) {
                $(".navbar").removeClass("navbar-fixed-top");
            }
        });
    });
    </script>
</head>

<body style="background:#eee;">
    <div class="header">
        <div class="row">
            <div class="col-lg-6">
                <span class="logo">Encuesta online</span>
            </div>
            <?php
      include_once 'dbConnection.php';
      session_start();
      $email = $_SESSION['email'];
      if (!(isset($_SESSION['email']))) {
        header("location:index.php");
      } else {
        $name = $_SESSION['name'];;

        include_once 'dbConnection.php';
        echo '<span class="pull-right top title1" ><span class="log1">&nbsp;&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Cerrar Sesión</button></a></span>';
      } ?>

        </div>
    </div>
    <!-- admin start-->

    <!--navigation menu-->
    <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dash.php?q=0"><b>Panel de Control</b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>><a href="dash.php?q=0">Inicio<span
                                class="sr-only">(current)</span></a></li>
                    <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="dash.php?q=1">Usuarios</a></li>
                    <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="dash.php?q=2">Calificaciones</a>
                    </li>
                    <li class="dropdown <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo 'active"'; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Encuesta<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="dash.php?q=4">Agregar encuesta</a></li>
                            <li><a href="dash.php?q=5">Eliminar encuesta</a></li>

                        </ul>
                    </li>
                    <li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out"
                                aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Cerrar Sesión</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--navigation menu closed-->
    <div class="container">
        <!--container start-->
        <div class="row">
            <div class="col-md-12">
                <!--home start-->

                <?php if (@$_GET['q'] == 0) {

          $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Temática</b></td><td><b>Total de Preguntas</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $eid = $row['eid'];
            $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
            $rowcount = mysqli_num_rows($q12);
            if ($rowcount == 0) {
              echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td>
	<td><b><a href="examenAdmin.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Examen</b></span></a></b></td></tr>';
            } else {
              echo '<tr style="color:#99cc32"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td>
	<td><b><a href="examenAdmin.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:red"><span </b></td></tr>';
            }
          }
          $c = 0;
          echo '</table></div></div>';
        }
        //ranking start
        if (@$_GET['q'] == 2) {
          $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
          echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Posición</b></td><td><b>Nombre</b></td><td><b>Género</b></td><td><b>Calificación</b></td></tr>';
          $c = 0;
          while ($row = mysqli_fetch_array($q)) {
            $e = $row['email'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
              $name = $row['name'];
              $gender = $row['gender'];
            }
            $c++;
            echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $s . '</td><td>';
          }
          echo '</table></div></div>';
        }

        ?>
                <!--home closed-->
                <!--users start-->
                <?php if (@$_GET['q'] == 1) {

          $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Nombre</b></td><td><b>Género</b></td><td><b>Correo Electrónico</b></td><td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $gender = $row['gender'];
            $email = $row['email'];

            echo '<tr><td>' . $c++ . '</td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $email . '</td>
	<td><a title="Delete User" href="update.php?demail=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        } ?>
                <!--user end-->

                <!--add quiz start-->
                <?php
        if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
          echo ' 
    <div class="row">
    <span class="title1" style="margin-left:40%;font-size:30px;"><b>Detalles del examen</b></span><br /><br />
    <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
    <fieldset>


    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="name" name="name" placeholder="Ingrese el título del encuesta" class="form-control input-md" type="text" required>
        
      </div>
    </div>



    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="total"></label>  
      <div class="col-md-12">
      <input id="total" name="total" placeholder="Ingrese el número total de preguntas" class="form-control input-md" type="number" required>
        
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="desc"></label>  
      <div class="col-md-12">
      <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Escribe una descripción acá..." required></textarea>  
      </div>
    </div>


    <div class="form-group">
      <label class="col-md-12 control-label" for=""></label>
      <div class="col-md-12"> 
        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Enviar" class="btn btn-primary"/>
      </div>
    </div>

    </fieldset>
    </form></div>';
        }
        ?>
                <!--add quiz end-->

                <!--add quiz step2 start-->
                <?php
        if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
          echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Ingrese los detalles  de las pregunta</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';

          for ($i = 1; $i <= @$_GET['n']; $i++) {
            echo '<b>Pregunta número&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
      <div class="form-group">
        <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
        <div class="col-md-12">
        <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Escribe la pregunta número ' . $i . ' acá..."></textarea>  
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-12 control-label" for="' . $i . '1"></label>  
        <div class="col-md-12">
        <input id="' . $i . '1" name="' . $i . '1" placeholder="Ingresa la opción a" class="form-control input-md" type="text">
          
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-12 control-label" for="' . $i . '2"></label>  
        <div class="col-md-12">
        <input id="' . $i . '2" name="' . $i . '2" placeholder="Ingresa la opción b" class="form-control input-md" type="text">
          
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-12 control-label" for="' . $i . '3"></label>  
        <div class="col-md-12">
        <input id="' . $i . '3" name="' . $i . '3" placeholder="Ingresa la opción c" class="form-control input-md" type="text">
          
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-12 control-label" for="' . $i . '4"></label>  
        <div class="col-md-12">
        <input id="' . $i . '4" name="' . $i . '4" placeholder="Ingresa la opción d" class="form-control input-md" type="text">
          
        </div>
      </div>
      <br />
      <b>Escoge la respuesta correcta</b>:<br/>
      <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Escoge la respuesta correcta " class="form-control input-md" >
        <option value="a">Seleccione la respuesta a la pregunta ' . $i . '</option>
        <option value="a">option a</option>
        <option value="b">option b</option>
        <option value="c">option c</option>
        <option value="d">option d</option> </select><br /><br />';
          }

          echo '<div class="form-group">
        <label class="col-md-12 control-label" for=""></label>
        <div class="col-md-12"> 
          <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Enviar" class="btn btn-primary"/>
        </div>
      </div>

      </fieldset>
      </form></div>';
        }
        ?>
                <!--add quiz step 2 end-->

                <!--remove quiz-->
                <?php if (@$_GET['q'] == 5) {

          $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
          echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Temática</b></td><td><b>Total de Preguntas</b></td<td></td></tr>';
          $c = 1;
          while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $eid = $row['eid'];
            echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid=' . $eid . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
          }
          $c = 0;
          echo '</table></div></div>';
        }
        ?>


            </div>
            <!--container closed-->
        </div>
    </div>
</body>

</html>
