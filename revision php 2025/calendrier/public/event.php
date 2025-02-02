<?php
require '../src/bootstrap.php';

$pdo = get_pdo();
$events = new App\date\Events($pdo);
if (isset($_GET['id'])){
    header('location /404.php');
}
try {
    $event = $events->find($_GET['id']);
} catch (Exception $e){
    e404();
}
require '../views/header.php';
    
?>
<h1><?= h($event->getName());?></h1>
<ul>
    <li>Date: <?=($event->getStart())->format('d/m/y'); ?></li>
    <li>Heure de démarrage: <?=($event->getStart())->format('H:i'); ?></li>
    <li>Heure de fin: <?=($event->getEnd())->format('H:i'); ?></li>
    <li>
        Description:<br>
        <?= h($event->getDescription());?>
    </li>
</ul>

<h1></h1>
<?php require '../views/footer.php';
?>
