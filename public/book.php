<?php include_once '../traitement.php'; ?>
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
               <li><?= $letter; ?></li>
            <?php } ?> 
        </ul>
        <div class="desktop-content">
            <div class="whiskyImg">
                <img src="image/whisky.png" alt="a whisky glass" class="whisky"/>
                <img src="image/empty_whisky.png" alt="an empty whisky glass" class="empty-whisky"/>
            </div>
            <div class="pages">
                <div class="page leftpage">
                    Add a bribe
                    <form action="" method="post">
                        <div>
                            <label for="name">name</label>
                            <input type="text" name="name">
                            <p style="color:red;margin:0;font-size:1.2rem;"><?= $errors['name'] ?? ''; ?></p>
                        </div>
                        <div>
                            <label for="payment">payment</label>
                            <input type="text" name="payment" required> 
                            <p style="color:red;margin:0;font-size:1.2rem;"><?= $errors['payment'] ?? ''; ?></p>
                        </div>
                        <button type="submit" class="btn btn-primary">Pay</button>
                    </form>
                </div>
    
                <div class="page rightpage">
                    <!-- TODO : Display bribes and total paiement -->
                    <div>
                        <table>
                           <thead>
                              <tr>
                                 <th>name</th>
                                 <th>payment</th>
                              </tr> 
                           </thead>
                           <tbody>
                                <?php foreach($bribes as $bribe ){ ?>
                                <tr>
                                    <td> <?= $bribe['name']; ?> </td>
                                    <td> <?= $bribe['payment']; ?>€</td>
                                </tr>
                                <?php  $total += $bribe['payment'];} ?>
                           </tbody>
                        </table>
                        <tfoot>Total of payment : <?= $total; ?> € </tfoot>    
                    </div>
                </div>
            </div>
            <div class="inkpenImg">
                <img src="image/inkpen.png" alt="an ink pen" class="inkpen"/>        
            </div>
        </div>        
    </section>
</main>
</body>
</html>
