<?php if(isset($_SESSION["Alerta"]) && $_SESSION["Alerta"]) { ?>
        <script>
            window.onload = function() {
                <?php if(isset($_SESSION["Alerta"]) && $_SESSION["Alerta"]) { ?>
                    alert('<?php echo $_SESSION["Alerta"]; ?>');
                    <?php unset($_SESSION["Alerta"]); // Eliminar la alerta de la sesión después de mostrarla ?>
                <?php } ?>
            };
        </script>
    <?php 
        unset($_SESSION["Alerta"]);
    } ?>