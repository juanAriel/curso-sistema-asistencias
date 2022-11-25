<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtclaveactual"]) and !empty($_POST["txtclavenueva"]) and !empty($_POST["txtid"])) {
        $id = $_POST["txtid"];
        $contraActual = md5($_POST["txtclaveactual"]);
        $contraNueva = md5($_POST["txtclavenueva"]);
        $verificarClaveActual = $conexion->query("select password from usuario where id_usuario=$id");
        if ($verificarClaveActual->fetch_object()->password == $contraActual) {
            $sql = $conexion->query("update usuario set password='$contraNueva' where id_usuario=$id ");
            if ($sql == true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: " Correcto",
                            type: "success",
                            text: "La contraseña fue modificada",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php } else { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: " incorrecto",
                            type: "error",
                            text: "La contraseña no se pudo modificar",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php }
        } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: " incorrecto",
                        type: "error",
                        text: "La contraseña actual es incorrectas",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Error o incorrecto",
                    type: "error",
                    text: "Los campos estan basios",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } ?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php }
?>