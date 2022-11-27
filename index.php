<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/estilos/estilos.css" >
    <title>Pagina de bienvenida</title>

     <!-- pNotify -->
     <link href="public/pnotify/css/pnotify.css" rel="stylesheet" />
        <link href="public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
        <link href="public/pnotify/css/custom.min.css" rel="stylesheet" />
        <!-- pnotify -->
        <script src="public/pnotify/js/jquery.min.js">
        </script>
        <script src="public/pnotify/js/pnotify.js">
        </script>
        <script src="public/pnotify/js/pnotify.buttons.js">
        </script>
</head>
<body>
    <h1>BIENVENIDOS, REGISTRA TU ASISTENCIA</h1>

    <h2 id="fecha"></h2>
    <?php 
    include "modelo/conexion.php";
    include "controlador/controlador_registrar_asistencia.php";
        ?>
    <div class="container">
        <a class="acceso" href="vista/login/login.php">Ingresar al sistema</a>
        <p class="ci">Ingrese su CI</p>
        <form action="" method="POST">
            <input type="text" placeholder="CI del empleado" name="txtci">
            <div class="botones">
                <button class="entrada" type="submit" name="btnentrada" value="ok">Entrada</button>
                <button class="salida" type="submit" name="btnsalida" value="ok">Salida</button>
            </div>
            
        </form>
    </div>

    <script>
        

        setInterval(()=>{
            let fecha=new Date();
            let fechaHora=fecha.toLocaleString();
            document.getElementById("fecha").textContent=fechaHora;
        }, 1000);
    </script>
</body>
</html>