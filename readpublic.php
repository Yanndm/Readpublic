<?php
try {
    $conn = new PDO('mysql:dbname=semaine_intensive;host=localhost', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());//connexion à la bdd
}

?>

<?php

$sql =" SELECT 
           id,
           competence,
           intitulé,
           resumé,
           dateStart,
           datefinish
           FROM
            annonce
            ;";  //increment stocke tout les donnée de la table annonce


$stmt = $conn->prepare($sql); //Commence à récuperer ce qu'il y a dans $sql
$stmt->execute();

?>




    <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :?>
        <h1>Annonce n°<?=$row["id"]?></h1>
        <p>intitulé:<?=$row["intitulé"]?></p>
        <p>Date de début:<?=$row["dateStart"]?></p>
        <p>Date de fin:<?=$row["datefinish"]?></p>
        <p>Résumé:<?=$row["resumé"]?></p>
        <p>Compétences:<?=$row["competence"]?></p>
    <?php endwhile;?>


