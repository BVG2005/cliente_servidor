<html>
    <head>
        <h1>Registrar personas</h1>
    </head>
    <body>
        <?php
            if(isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['cuidad']) && isset($_GET['email']) && isset($_GET['telefono']))
            {

                

                $nombre= $_GET['nombre'];
                $apellido = $_GET['apellido'];
                $cuidad = $_GET['cuidad'];
                $email = $_GET['email'];
                $telefono = $_GET['telefono'];

                
                $dbuser = "root";
                $dbpassword = "";

                $conn = new PDO("mysql:host=localhost;dbname=veterinaria", $dbuser, $dbpassword);
                $query = " INSERT INTO `registros` (`id`, `nombre`,`apellido`,`cuidad`,`email`,`telefono`) VALUES (NULL,'$nombre','$apellido','$cuidad','$email','$telefono')";

                
                $q = $conn-> prepare($query);
                $result = $q->execute();

                if($result){
                    ?>
                        <h1>Los datos han sido guardados</h1>
                    <?php
                }

                //cerrar la conexión para la base de datos 
                $conn = null;
            }

        ?>
        <form action="" >
            nombre: <input type="text" name ="nombre"><br></br>
            apellido:<input type="text" name ="apellido"><br></br>
            cuidad: <input type="text" name ="cuidad"><br></br>
            email: <input type="text" name ="email"><br></br>
            telefono: <input type="text" name ="telefono"><br></br>
            <input type="submit" value= "Registar"><br></br>
        </form>
    </body>
</html>