<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Acceso</title>
</head>
<body>
    <br><br><br>
    <h4>ACCESO AL SISTEMA</h4>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="email">Usuario:</label>
            <input type="email" name="email" required>
            <br><br>
            <label for="password">Contraseña:</label>
            <input type="password"  name="password" required>
            <br><br>
            <input type="checkbox" name="recordar">
            <label>Recordarme en este equipo</label>
            <br><br>
            <input type="submit" name="enviar" value="ENVIAR">
        </div>
    </form>

    <?php
    $autenticar = false;
    if (isset($_POST["enviar"])) {
        try {
            $base = new PDO("mysql:host=localhost;dbname=datos", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM datos_usuario WHERE usuario = :login AND password = :password";
            $resultado = $base->prepare($sql);

            $login = htmlentities(addslashes($_POST["email"]));
            $password = htmlentities(addslashes($_POST["password"]));

            $resultado->bindValue(":login", $login);
            $resultado->bindValue(":password", $password);
            $resultado->execute();

            $numero_registro = $resultado->rowCount();

            if ($numero_registro != 0) {
                // Validar si el usuario se ha autenticado correctamente
                $autenticar = true;
                // Se inicia la sesión si el usuario está registrado
                session_start();
                $_SESSION["usuario"] = $_POST["email"];
                header("location:pagina_inicio.php");
            } else {
                // header("location:form_acceso.php");
                echo "LOS DATOS DE USUARIO SON INCORRECTOS";
            }

            if (isset($_POST["recordar"])) {
                // Crear la cookie por 15 días
                setcookie("datos_usuario", $_POST["correo"], time() + 1296000);
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
            
    ?>
</body>
</html>
