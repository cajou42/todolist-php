<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>create profile</title>
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

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
    $hash = "@|-°+==00001ddQ";
    $password = md5($password.$hash);
    $conf_password = md5($conf_password.$hash);
    $query = "INSERT INTO user (username, password, conf_password) VALUES (:username, :password, :conf_password)";
    $datas =[
        'username' => $username,
        'password' => $password,
        'conf_password' => $conf_password,
    ];
    $queryFinal = $pdo->prepare($query);
    $queryFinal->execute($datas);
}
?>

<body>
    <form class="formulaire" name="form" method="post">
        <div class="in_formilaire">
            <label>nom
            <input type="text" name="username" required>
            </label>
            <br>
            <label>mot de passe
            <input type="password" name="password" required>
            </label>
            <br>
            <label>confirmation mot de passe
            <input type="password" name="conf_password" required>
            </label>
            <br>
            <button type="submit">submit</button>
        </div>
    </form>
    <a href="/tp_note/login.php">have an account ? login here !</a>
</body>