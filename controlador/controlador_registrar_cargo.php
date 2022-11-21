<?php 
if(!empty($_POST["btnregistrar"])){
    if (!empty($_POST["txtnombre"])) {
        $nombre=$_POST["txtnombre"];
        $verificarNombre=$conexion->query("select count(*) as 'total' from cargo where nombre='$nombre'");
        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "el cargo <?= $nombre?> ya existe ",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else {
            $sql=$conexion->query("insert into cargo(nombre)values('$nombre')");
            if ($sql==true) { ?>
                <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Coreccto",
                        type: "success",
                        text: "Cargo registrado correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php } else {?>
                <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "No se registro el cargo",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php }   
        }
    } else { ?>
        <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "los campos estan vacios",
                        styling: "bootstrap3"
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