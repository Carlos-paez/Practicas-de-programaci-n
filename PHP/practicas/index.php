<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .baner{
            padding: auto;
            text-align: center;
        }
    </style>

</head>

<body>

    <head>
        <h1>Formulario de registro</h1>
        <hr>
    </head>

    <form action="index.php" method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>

        <br><br>

        <input type="submit" value="Enviar">

    </form>

    <?php
        $Info = !empty($_POST);

        if ($Info ==1)
        {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
        }
    ?>

    <br><hr><br>

    <caption>Datos enviados:</caption>
    <table border='1'>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $edad?></td>
                </tr>
            </tbody>

    </table>

    <br><hr><br>

    <dl>
        <dt>Nombres</dt>
        <dd><?php echo $nombre ?></dd>

        <dt>Edad</dt>
        <dd><?php echo $edad ?></dd>
    </dl>

    <br><hr><br>

    <ol type="I">
        <li>Nombre: <?php echo $nombre ?></li>
        <li>Edad: <?php echo $edad ?></li>
    </ol>

    <br><hr><br>

    <ul>
        <li>Nombre: <?php echo $nombre ?></li>
        <li>Edad: <?php echo $edad ?></li>
    </ul>

</body>
</html>