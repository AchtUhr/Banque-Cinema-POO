
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    include 'Compte.php';
    include 'Client.php'; 

    $clientA = new Client("Watson", "Emma", "1990-01-01", "Londres");
    $compteA1 = new Compte("compte courant", 1000, "EUR", $clientA);
    $compteA2 = new Compte("livret A", 2000, "EUR", $clientA);

    echo $clientA->getInfos();
    echo $compteA1->getInfos();
    echo $compteA2->getInfos();
    echo $compteA1->credit(200);
    echo $compteA1->virement($compteA2, 200);
   
?>
</body>
</html>
