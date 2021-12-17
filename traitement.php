<?php
  require_once 'connec.php';
  $pdo = new PDO(DSN, USER, PASSWORD);
  $query = "SELECT * FROM bribe";
  $statement = $pdo->query($query);
  $bribes = $statement->fetchAll();
  $total = 0;
  $errors = [];

  if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    if (empty($_POST['name']) && empty($_POST['payment'])) {
      $errors['name'] = 'required name';
      $errors['payment'] = 'required payment';
    }
    elseif ($_POST['payment'] <= 0) {
      $errors['payment'] = 'payment should be greater than 0';
    }else{

      $query = "INSERT INTO bribe(name, payment) VALUES(:name, :payment)";
      $stmt = $pdo->prepare($query);
      $stmt->execute([
        ':name' =>$_POST['name'],
        ':payment' => $_POST['payment']
    ]);   
    header('Location: /book.php');
    die();
    }
}
foreach (range('A', 'Z') as $letter) {
  $alphabetical[] = $letter;
}



