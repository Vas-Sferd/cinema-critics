<?php require 'db.php' ?>

<?php

$off = htmlspecialchars($_GET["offset"]);

$query = "SELECT * FROM `screenshot` WHERE public = 1 ORDER BY `date` DESC LIMIT 2 OFFSET " . $off;
$images = $connection->query($query);



?>


<?php foreach ($images as $row) : ?>
    <a href="detailed_page.php?idd=<?= $row['path'] ?>">
        <div class="screenshot">
          <img src="images/<?= $row['path'] ?>">
          Дата добавления: <?= $row['date'] ?>
        </div>
    </a>
<?php
endforeach;
?>
