<?php

require_once '../connec.php';

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (($urlPath === '/book.php') && !empty($_GET)) {
    $letter = $_GET['letter'];
    $query = "SELECT * FROM bribe WHERE (name LIKE '$letter%') ORDER BY name DESC";
}
else {
    $query = "SELECT * FROM bribe ORDER BY name DESC";
}

$pdo = new PDO(DSN, USER, PASS);
$statement = $pdo->query($query);
$bribes = $statement->fetchAll(PDO::FETCH_ASSOC);   
$total = 0;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (empty($_POST['name']) && empty($_POST['payment'])) {
        $errors['name'] = 'required name';
        $errors['payment'] = 'required payment';
    }
    elseif ($_POST['payment'] <= 0) {
        $errors['payment'] = 'payment should be greater than 0';
    }
    elseif ($_POST['name'] === "Eliott Ness") {
        $errors['name'] = 'This man is untouchable';
    }
    else {
        $name = trim($_POST['name']);
        $payment = trim($_POST['payment']);
        $query = "INSERT INTO bribe(name, payment) VALUES(:name, :payment)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
        $stmt->bindValue(':payment  ', $payment, \PDO::PARAM_STR);
        $stmt->execute([
          ':name' =>$name,
          ':payment' => $payment
        ]);   
        header('Location: /book.php');
        die();
      }
}






