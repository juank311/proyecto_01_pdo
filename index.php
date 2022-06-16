<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>


<?php

// conexion a MYSQL mediante PDO

$host = "localhost";
$usuario = "root";
$password = "";
$db = "crud";

//configuracion de la DSN
$dsn = 'mysql:host='.$host.';dbname='.$db;

//configuracion de la instancia PDO
$pdo = new PDO($dsn, $usuario, $password);

// AGREGAR setatribute de manera global 

$pdo-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


//ya se pueden realizar consultas o querys 

$query = $pdo->query('SELECT * FROM usuarios');



//volcar informacion 

//mediante un while se muestra los datos contenidos en el array creado a partir
// de la informacion extraida mediante el SELECT

?>

<!-- <table class="table table-striped">
    <tbody>
<?php // while ($row = $query->fetch()) : ?>

 
    <tr>
    <td><?php //echo $row['id'];?></td>
    <td><?php //echo $row['name_user'];?></td>
    <td><?php //echo $row['last_name_user'];?></td>
    <td><?php //echo $row['phone_user'];?></td>
    <td><?php //echo $row['email_user'];?></td>

    </tr> 


<?php //  endwhile;  ?>
    <tbody>
</table>
    
</body>
</html> -->


<!-- SEGUNDO EJEMPPLO ESPECIFICANDO EL MODO -->

<table class="table table-striped">
    <tbody>
    <?php while ($row = $query->fetch()) : ?>
        <?php // o la otra opcion.
        
        //  -> while ($row = $query->fetch(PDO::FETCH_OBJ)) : ?>
 
<tr>
<td><?php echo $row->id;?></td>
<td><?php echo $row->name_user;?></td>
<td><?php echo $row->last_name_user;?></td>
<td><?php echo $row->phone_user;?></td>
<td><?php echo $row->email_user;?></td>

</tr> 


<?php   endwhile;  ?>
<tbody>
</table>

</body>
</html> 

<?PHP

echo "<br>";

//variable que llega desde POST o esta definida en el codigo 

$name_user_2 = "Esteban";

//Parametros posicionales
//ejemplo para llamar un nombre que esta en base de datos mediante una variable dada

// se diseña  la ruta de consulta (query)

$query3 = "SELECT * FROM usuarios WHERE name_user = :name_user";

//se prepara la variable que contiene la ruta 
$stmt = $pdo->prepare("$query3");

//se ejecuta el stmt  y se relaciona la anonima con la variable que contiene el dato
$stmt->execute([':name_user' => $name_user_2]);


//se crea una nueva variable que contiene los cambios y se le agrega -> el fetch

$user_2 = $stmt->fetchAll();

//para mostrar con var_dump

foreach ($user_2 as $name_user) {
    echo $name_user->name_user;
};
?>