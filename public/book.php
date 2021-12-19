<?php include_once 'traitement.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/book.css">
    <title>Checkpoint PHP 1</title>
</head>
<body>
<?php include 'header.php'; ?>
<main class="container">
    <section class="desktop">
        <ul class="alphabetical">
           <?php foreach(range('A', 'Z') as $letter) { ?>
              <li><a href="<?= "?letter=".$letter; ?>"><?= $letter; ?></a></li>
           <?php } ?> 
        </ul>
        <img src="image/whisky.png" alt="a whisky glass" class="whisky"/>
        <img src="image/empty_whisky.png" alt="an empty whisky glass" class="empty-whisky"/>
        <div class="pages">
            <div class="page leftpage">
                <p>Add a bribe</p>
                <form action="" method="post">
                    <div class="mb-1">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                        <ul class="error"><?= $errors['name'] ?? ''; ?></ul>
                    </div>
                    <div class="mb-1">
                        <label for="payment" class="form-label">Payment</label>
                        <input type="text" name="payment" class="form-control"> 
                        <ul class="error"><?= $errors['payment'] ?? ''; ?></ul>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Pay!</button>
                    </div>
                </form>
            </div>

            <div class="page rightpage">
                <!-- TODO : Display bribes and total paiement -->
                <p class="title"><?= $_GET['letter'] ?? 'S'; ?></p>
                <div>
                    <table class="table">
                       <tbody>
                            <?php foreach($bribes as $bribe ){ ?>
                            <tr>
                                <td> <?= $bribe['name']; ?> </td>
                                <td> <?= $bribe['payment']; ?>€</td>
                            </tr>
                            <?php  $total += $bribe['payment'];} ?>
                            <tr class="total">
                                <td>Total</td>
                                <td><?= $total."€"; ?></td>
                            </tr>
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
        <img src="image/inkpen.png" alt="an ink pen" class="inkpen"/>        
    </section>
</main>
</body>
</html>
