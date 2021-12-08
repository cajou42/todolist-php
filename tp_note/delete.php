<?php session_start(); ?>

<?php
$path = "mysql:host=localhost:3306;dbname=user";
$user = "root";
$password = "root";
try{
    $pdo = new PDO($path,$user,$password);
}catch(PDOExceception $e){
    echo $e -> getMessage();
    die();
}
?>

<?php
if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM todo WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute(); 
    $stmt->close();
}
?>