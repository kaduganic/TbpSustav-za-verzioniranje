<?php ?>
<html>
    <head>
        <meta charset="utf-8"> 
        <title><?php echo $naziv; ?></title>

        <link rel="stylesheet" type="text/css" href="css/tbp.css">
        
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">


        <script type="text/javascript" language="javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
      
        <script type="text/javascript" language="javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#Tablicaostale').dataTable();
            });
        </script>
    </head>
    <body>
        <header>

            <h3>
                <a href="pocetna.php">
                    <img src="./img/dokumenti.png" alt="Stack Overflow" align="left"/><br></a>
                Sustav za verzioniranje
            </h3>
        </header>

        <?php
        $crud::$trenutni = $korisnik->get_ime();
        if (!in_array($aktivnaSkripta, $preskociSesija)) {
            $crud::kreirajOkomitiMeni();
        }
        ?>

