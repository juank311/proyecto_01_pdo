<?php 

$host = "localhost";
$usuario = "root";
$password = "";
$db = "crud";


//configuracion de la ruta dsn

$dsn = "mysql:host=".$host.";dbname=".$db;

//configuracion de la pdo

$pdo = new PDO($dsn, $usuario, $password);

$query = $pdo->query("SELECT * FROM usuarios");

while ($fila = $query->fetch(PDO::FETCH_OBJ)) {
    echo $fila->name_user;
    echo "<br>";
}



//ejemplo de consulta especificando un nombre indirecto 
echo "<br>";
$nombre = "Esteban";

$query2 = "SELECT * FROM usuarios WHERE name_user = :name_user";

$stmt = $pdo->prepare($query2);

$stmt->execute([':name_user' => $nombre]);

$tabla_usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);

//var_dump($tabla_usuarios);


foreach ($tabla_usuarios as $key) {
    echo $key->name_user;
}
//print_r($tabla_usuarios['0']['1']);

?>

<?php
echo "<br>";
echo "<br>";
echo "<br>";
//ejemplo para acceder a un solo registro mediante el ID
echo "ejemplo para acceder a un solo registro mediante el ID";
echo "<br>";
$id = 18;

$query8 = "SELECT * FROM usuarios WHERE id = :id";

$stmt = $pdo->prepare($query8);

$stmt->execute([':id'=> $id]);

if (isset($stmt)) {
    $fila = $stmt->fetch(PDO:: FETCH_OBJ);

    echo $fila->name_user;
}else {
    echo "no se encontraron registros";
}

//contar filas con rowcount
echo "<br>";
echo "<br>";
echo "ejemplo contar filas con rowcount";
echo "<br>";
echo "<br>";

$id = "18";

$query10 = "SELECT * FROM usuarios WHERE id = :id";

$stmt = $pdo->prepare($query10);

$stmt->execute([':id'=> $id]);

$total_usuarios = $stmt->rowCount();

echo "<br>";

echo $total_usuarios;


//escribir en la base de datos
echo "<br>";
echo "<br>";
echo "ejemplo escribir en la base de datos";
echo "<br>";
echo "<br>";








?>