<?php
if (!empty($_POST["btnentrada"])) {
    if (!empty($_POST["txtci"])) {
        $dni = $_POST["txtci"];
        $consulta = $conexion->query(" select count(*) as 'total' from empleado where dni='$dni' ");
        $id = $conexion->query("select id_empleado from empleado where dni='$dni' ");
        if ($consulta->fetch_object()->total > 0) {
            $fecha = date("Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            
            $consultaFecha = $conexion->query(" select entrada from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1 ");
            $fechaBD = $consultaFecha->fetch_object()->entrada;
           
            
            
            if (substr($fecha,0,10)==substr($fechaBD,0,10)) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Incorrecto",
                            type: "error",
                            text: "ya registraste tu entrada",
                            styling: "bootstrap3"
                        })
                    })
                </script>
                <?php } else {
                $sql = $conexion->query(" insert into asistencia(id_empleado,entrada)values($id_empleado,'$fecha')");
                if ($sql == true) { ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "Correcto",
                                type: "success",
                                text: "hola bienvenido",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
                <?php } else { ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "Incorrecto",
                                type: "error",
                                text: "Error al registrar su entrada",
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
                        title: "Incorrecto",
                        type: "error",
                        text: "el DNI no existe",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php  }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Incorrecto",
                    type: "error",
                    text: "el campo DNI esta vacio",
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
<!-- REGISTRO DE LA SALIDA -->

<?php
if (!empty($_POST["btnsalida"])) {
    if (!empty($_POST["txtci"])) {
        $dni = $_POST["txtci"];
        $consulta = $conexion->query(" select count(*) as 'total' from empleado where dni='$dni' ");
        $id = $conexion->query("select id_empleado from empleado where dni='$dni' ");
        if ($consulta->fetch_object()->total > 0) {
            $fecha = date("Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            $busqueda = $conexion->query("select id_asistencia,entrada from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1");
            

            while ($datos=$busqueda->fetch_object()) {
                $id_asistencia = $datos->id_asistencia;
                $entradaDB = $datos->entrada;
            }
            if (substr($fecha,0,10)!= substr($entradaDB,0,10)) {
                ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Incorrecto",
                            type: "error",
                            text: "primero registrar tu entrada",
                            styling: "bootstrap3"
                        })
                    })
                </script>
           <?php
            } else {
                $consultaFecha = $conexion->query(" select salida from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1 ");
            $fechaBD = $consultaFecha->fetch_object()->salida;

            if (substr($fecha,0,10) == substr($fechaBD,0,10)) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Incorrecto",
                            type: "error",
                            text: "su salida ya esta registrada",
                            styling: "bootstrap3"
                        })
                    })
                </script>
           <?php } else {
                $sql = $conexion->query(" update asistencia set salida='$fecha' where id_asistencia=$id_asistencia ");
                if ($sql == true) { ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "Correcto",
                                type: "success",
                                text: "Adios hasta luego",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
                <?php } else { ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "Incorrecto",
                                type: "error",
                                text: "Error al registrar su salida",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
                <?php }
            }
            }
            


            
            

            
        } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Incorrecto",
                        type: "error",
                        text: "el DNI no existe",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php  }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Incorrecto",
                    type: "error",
                    text: "el campo DNI esta vacio",
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