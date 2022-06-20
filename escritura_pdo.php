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

$name_insert = "Camilo";
$last_name_insert = "Patiño";
$phone_insert = "55555555555";
$email_insert = "patiño@hotmail.com";


$query_insert = "INSERT INTO usuarios(name_user, last_name_user, phone_user, email_user) VALUES(:name_user, :last_name_user, :phone_user, :email_user)";

$stmt = $pdo->prepare($query_insert);

$stmt->execute(['name_user' => $name_insert,'last_name_user' => $last_name_insert, 'phone_user' => $phone_insert, 'email_user' => $email_insert]);

echo "Registro exitoso a la base de datos"; 


?>