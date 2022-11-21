<?php 
if(!empty($_POST["brnmodificar"])){
    if (!empty($_POST["txtnombre"])) {
        $id=$_POST["txtid"];
        $nombre=$_POST["txtnombre"];
        $verificarNombre=$conexion->query("select count(*) as 'total' from cargo where nombre='$nombre' and id_cargo!=$id ");
        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
            $(function notificacion(){
            new PNotify({
                title:"Incorrecto",
                type:"error",
                text:"El nombre <?= $nombre?> ya existe ",
                styling:"bootstrap3"
            })
        })
    </script>
        <?php } else {
            $sql=$conexion->query("update cargo set nombre='$nombre' where id_cargo=$id");
            if ($sql==true) { ?>
                <script>
            $(function notificacion(){
            new PNotify({
                title:"Correcto",
                type:"success",
                text:"se modifico correctamente ",
                styling:"bootstrap3"
            })
        })
    </script>
            <?php } else { ?>
                <script>
            $(function notificacion(){
            new PNotify({
                title:"Incorrecto",
                type:"error",
                text:"no se pudo modificar ",
                styling:"bootstrap3"
            })
        })
    </script>
           <?php }
            
        }
        
    } else { ?>
        <script>
            $(function notificacion(){
            new PNotify({
                title:"Incorrecto",
                type:"error",
                text:"Campos del nombre estan vacios",
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