<?php

$host = "localhost";
$usuario = "root";
$password = "";
$db= "crud";


$dsn = "mysql:host=".$host.";dbname=".$db;

$pdo = new PDO($dsn, $usuario, $password);

//Realizar una consulta 

// $nombre = "Jose";

// $query_consulta = "SELECT * FROM usuarios WHERE name_user = :name_user";

// $stmt = $pdo->prepare($query_consulta);

// $stmt->execute(['name_user' => $nombre]);

// $fila = $stmt->fetchAll(PDO:: FETCH_OBJ);

// foreach ($fila as $key) {
//     echo $key->name_user;
// }

//realizar escrita o un insert en la base de datos 

/* $name_insert = "Camilo";
$last_name_insert = "Patiño";
$phone_insert = "55555555555";
$email_insert = "patiño@hotmail.com";


$query_insert = "INSERT INTO usuarios(name_user, last_name_user, phone_user, email_user) VALUES(:name_user, :last_name_user, :phone_user, :email_user)";

$stmt = $pdo->prepare($query_insert);

$stmt->execute(['name_user' => $name_insert,'last_name_user' => $last_name_insert, 'phone_user' => $phone_insert, 'email_user' => $email_insert]);

echo "Registro exitoso a la base de datos";  */

/* echo "<br>";
echo "<br>";
//segundo metodo para  escritura en PDO
echo "segundo metodo para  escritura en PDO";
echo "<br>";
echo "<br>";

$name_insert = "Camilo";
$last_name_insert = "Patiño";
$phone_insert = "55555555555";
$email_insert = "patiño@hotmail.com";


$query_insert = "INSERT INTO usuarios(name_user, last_name_user, phone_user, email_user) VALUES(:name_user, :last_name_user, :phone_user, :email_user)";

$stmt = $pdo->prepare($query_insert);

$stmt->bindParam(':name_user', $name_insert, PDO::PARAM_STR);
$stmt->bindParam(':last_name_user', $last_name_insert, PDO::PARAM_STR);
$stmt->bindParam(':phone_user', $phone_insert, PDO::PARAM_STR);
$stmt->bindParam(':email_user', $email_insert, PDO::PARAM_STR);

$stmt->execute();

echo "Registro exitoso a la base de datos";  */


/* echo "<br>";
echo "<br>";
//Editar en PDO
echo "Primera forma para editar con PDO";
echo "<br>";
echo "<br>"; */


/* $id = 4;
$name_update = "Pedro Antornio";
$last_name_update = "Paternina";
$phone_update = "22222222222";
$email_update = "pedro@hotmail.com";
 */
 
$query_read_update = "SELECT * FROM usuarios WHERE id = :id";
    $stmt_read_update = $pdo->prepare($query_consulta_update);
    $stmt_read_update->execute(['id' => $id]); 

$query_update = "UPDATE usuarios SET name_user = ?, last_name_user = ?, phone_user = ?, email_user = ?  WHERE id = ?";

$stmt_update = $pdo->prepare($query_update);

$stmt_update->execute([$name_update, $last_name_update, $phone_update, $email_update, $id]);

echo "Registro ".$id. " modificado exitosamente";
 
    $stmt_update->bindParam(1, $name_update);
    $stmt_update->bindParam(2, $last_name_update);
    $stmt_update->bindParam(3, $phone_update);
    $stmt_update->bindParam(4, $email_update);
    $stmt_update->bindParam(5, $id);

$stmt_update->execute();

    echo "<br>";
    echo "<br>";
    //Borrar con PDO
    echo "Borrar con PDO";
    echo "<br>";
    echo "<br>";


$id = 4;

$query_delete = "DELETE FROM usuarios  WHERE id=? ";

$query_delete = $pdo->prepare($query_delete);

$query_delete->execute([$id]);

echo "Usuario " . $id . " borrado correctamente";
 
    echo "<br>";
    echo "<br>";
    //Buscar con PDO
    echo "Buscar  con PDO";
    echo "<br>";
    echo "<br>";

$textoBuscar = "%ju%";

$query_search = "SELECT * FROM usuarios WHERE name_user like ?";

$stmt_search = $pdo->prepare($query_search);

$stmt_search->execute([$textoBuscar]);

$info = $stmt_search->fetchAll();

var_dump($info);











?>