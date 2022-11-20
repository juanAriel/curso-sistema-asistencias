<?php 
if(!empty($_POST["brnmodificar"])){
if (!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtcargo"])) {

    $id=$_POST["txtid"];
    $nombre=$_POST["txtnombre"];
    $apellido=$_POST["txtapellido"];
    $cargo=$_POST["txtcargo"];
   
    $sql = $conexion->query("update empleado set nombre='$nombre', apellido='$apellido', cargo=$cargo where id_empleado=$id");
    if ($sql == true) { ?>
    
    <script>

            $(function notificacion(){
            new PNotify({
                title:"correcto",
                type:"success",
                text:"datos del empleado modificados",
                styling:"bootstrap3"
            })
        })
    </script>
    <?php } else {?>
        <script>
            $(function notificacion(){
            new PNotify({
                title:"Incorrecto",
                type:"error",
                text:"error al modificar empleado",
                styling:"bootstrap3"
            })
        })
    </script>
    <?php }
    
} else { ?>
    <script>
            $(function notificacion(){
            new PNotify({
                title:"Incorrecto",
                type:"error",
                text:"los Campos vacios de empleado",
                styling:"bootstrap3"
            })
        })
    </script>
<?php } ?>
<script>
    setTimeout(() => {
        window.history.replaceState(null,null,window.location.pathname);
    }, 0);
</script>

<?php }
?>