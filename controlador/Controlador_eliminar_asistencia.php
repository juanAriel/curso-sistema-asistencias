<?php
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql = $conexion->query("delete from asistencia where id_asistencia=$id");
    if($sql==true){?>
    <script>
        $(function notificacion(){
            new PNotify({
                title:"correcto",
                type:"success",
                text:"Asistencia eliminada corectamente",
                styling:"bootstrap3"
            })
        })
    </script>
    <?php } else{ ?>
    <script>
        $(function notificacion(){
            new PNotify({
                title:"INCORRECTO",
                type:"error",
                text:"Asistencia eliminada error",
                styling:"bootstrap3"
            })
        })
    </script>
  <?php  } ?>
<script>
    setTimeout(() => {
        window.history.replaceState(null,null,window.location.pathname);
    }, 0);


</script>

 <?php }