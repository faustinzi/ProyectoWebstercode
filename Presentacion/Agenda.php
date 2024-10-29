<?php
include_once "../Logica/Library.php";

if(!(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"])||!in_array($_SESSION["Usuario"]->getRol(),["gerente","administrador"])){
    volver();
}

$celdaPago=["impago", "pago", "sin registro"];
$fondos=["red", "green", "grey"];

include_once "alertaAddon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="icon" href="../Assets/imagenes/logo.png">
    <link rel="stylesheet" href="styles/stylesAgenda.css">
    <link rel="stylesheet" href="styles/mobile/mobileAgenda.css" media="(max-width: 1199px)">
</head>
<body>
    <?php 
        include_once "nav.php";
    ?>
    <main class="main1">
    <main class="main2">
        <h1 class="t1M">Agenda de pagos</h1>
        <h2 class="t1M"><?php echo $_GET["Anio"]; ?> <input type="number" id="InputAnio"><button id="BotonAnio">Cambiar</button></h2>
        <section class="sectionMid">
            <table>
                <tr>
                    <th>Usuario</th>
                    <th>Enero</th>
                    <th>Febrero</th>
                    <th>Marzo</th>
                    <th>Abril</th>
                    <th>Mayo</th>
                    <th>Junio</th>
                    <th>Julio</th>
                    <th>Agosto</th>
                    <th>Setiembre</th>
                    <th>Octubre</th>
                    <th>Noviembre</th>
                    <th>Diciembre</th>
                </tr>
                <?php foreach($DBmanager->cargarClientesAgendadosUnAnio_BD($_GET["Anio"]) as $nombreCliente){ ?>
                    <tr>
                        <td><?php echo $nombreCliente; ?></td>
                        <?php for($i=1;$i<=12;$i++){ 
                                if($DBmanager->CargarPagoAgendaClienteMesAnioActivo($nombreCliente, $i, $_GET["Anio"])!=null){
                                    $resultado=$DBmanager->CargarPagoAgendaClienteMesAnioActivo($nombreCliente, $i, $_GET["Anio"]); ?>
                                    <td style="background-color:<?php echo $fondos[$resultado] ?>">
                                        <p><?php echo $celdaPago[$resultado]; ?></p>
                                        <a class="a1" href="../Logica/modificarAgenda.php?Cliente=<?php echo $nombreCliente; ?>&Mes=<?php echo $_GET["Anio"]."-".str_pad($i, 2, '0', STR_PAD_LEFT); ?>&Pago=1&Creado=1"></a>
                                        <a class="a2" href="../Logica/modificarAgenda.php?Cliente=<?php echo $nombreCliente; ?>&Mes=<?php echo $_GET["Anio"]."-".str_pad($i, 2, '0', STR_PAD_LEFT); ?>&Pago=2&Creado=1"></a>
                                        <a class="a3" href="../Logica/modificarAgenda.php?Cliente=<?php echo $nombreCliente; ?>&Mes=<?php echo $_GET["Anio"]."-".str_pad($i, 2, '0', STR_PAD_LEFT); ?>&Pago=3&Creado=1"></a>
                                    </td>
                                <?php }else{ ?>
                                    <td style="background-color:<?php echo $fondos[2] ?>">
                                        <p><?php echo $celdaPago[2]; ?></p>
                                        <a class="a1" href="../Logica/modificarAgenda.php?Cliente=<?php echo $nombreCliente; ?>&Mes=<?php echo $_GET["Anio"]."-".str_pad($i, 2, '0', STR_PAD_LEFT); ?>&Pago=1&Creado=0"></a>
                                        <a class="a2" href="../Logica/modificarAgenda.php?Cliente=<?php echo $nombreCliente; ?>&Mes=<?php echo $_GET["Anio"]."-".str_pad($i, 2, '0', STR_PAD_LEFT); ?>&Pago=2&Creado=0"></a>
                                        <a class="a3" href="../Logica/modificarAgenda.php?Cliente=<?php echo $nombreCliente; ?>&Mes=<?php echo $_GET["Anio"]."-".str_pad($i, 2, '0', STR_PAD_LEFT); ?>&Pago=3&Creado=0"></a>
                                    </td>
                                    <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </section>

        <style>
            td{
                border: 1px black solid;
            }
        </style>
    </main>
    </main>

    <script>
        document.getElementById("BotonAnio").addEventListener("click", function() {
            var anio = document.getElementById("InputAnio").value;
            if (anio) {
                window.location.href = "Agenda.php?Anio=" + anio;
            } else {
                alert("ingrese un año válido.");
            }
        });
    </script>

</body>
</html>