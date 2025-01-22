<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="css/calendar.css">
<body>
    <nav class="navbar navbar-dark bg-primary mb-3">
        <a href="/index.php" class="navbar-brand">Mon calendrier</a>
    </nav>
    <?php
    require '../src/date/month.php';
    try {
    $month = new App\date\Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
    $day = $month->getFirstDay()->modify('last monday');
    }catch(Exception $e){
        $month = new App\date\Month();
    }
    ?>
    <h1><?php echo $month->toString();?></h1>
    
    <table class="calendar__table" calendar__table--<?=  $month->getWeeks();?>>
        <?php for ($i = 0; $i < $month->getWeeks(); $i++): ?>
        <tr>
            <?php foreach($month->days as $day): ?>
            <td>monday<br>
                <div class="calendar__weekday"><?= $day;?></div>
                <div class="calendar__day"><?= $start->format('d');?></div>
            </td>
            <?php endforeach; ?>
            <td>tuesday</td>
            <td>wednesday</td>
            <td>thursday</td>
            <td>friday</td>
            <td>saturday</td>
            <td>sunday</td>
        </tr>
        <?php  endfor; ?>


    </table>

    
</body>
</html>