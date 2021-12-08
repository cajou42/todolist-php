<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

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

<body>
<?php
    if(isset($_POST['todopost']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $description = $_POST['todo'];
        $query = "INSERT INTO todo (description) VALUES (:description)";
        $datas =[
            'description' => $description,
        ];
        $queryFinal = $pdo->prepare($query);
        $queryFinal->execute($datas);
    }
?>



<?php
    $query = "SELECT * FROM todo";
    $res = $pdo->prepare($query);
    $res->execute();
    $description = $res->fetchAll(PDO::FETCH_ASSOC);
    foreach ($description as $value) { ?>
        <div>
            <?= $value['description'] ?>
            <form method=post>
            <input name="id" value="<?= $value['id']?>"></input>
            <input name="modif" value="enter your modif"></input>
                <button type="submit" name="edit">edit</button>
            </form>
            <form method=post>
                <input name="alu" value="<?= $value['id']?>"></input>
                <button type="submit" name="delete">delete</button>
            <form>
            <input type="checkbox">terminado</input>
        </div>
    <?php } ?>

<?php
if(isset($_POST['delete']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("DELETE FROM `todo` WHERE `todo`.`id` = :id");
    $stmt->execute([
        'id' => $_POST['alu']
    ]);
}
?>

<?php
if(isset($_POST['edit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE `todo` set `todo`.`description` = :modif WHERE `todo`.`id` = :id");
    $stmt->execute([
        'id' => $_POST['id'],
        'modif' => $_POST['modif'],
    ]);
}
?>

    <form method="post" >
        <label>
            enter what in your mind !
            <input type="text" name="todo">
        </label>
        <br>
        <button type="submit" name="todopost">submit</button>
    </form>

    <p>recharger pour après avoir éditer/suprimé pour confirmer
</body>


