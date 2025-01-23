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
    $start = $month->getFirstDay()->modify('last monday');
    }catch(Exception $e){
        $month = new App\date\Month();
    }
    ?>
    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1><?php echo $month->toString();?></h1>
    <div>
        <a href="./index.php?month=<?= $month->previousMonth()->month;?>&year=<?= $month->previousMonth()->year;?>" class="btn btn-primary">&lt;</a>
        <a href="./index.php?month=<?= $month->nextMonth()->month;?>&year=<?= $month->nextMonth()->year;?>" class="btn btn-primary">&gt;</a>
    </div>
    </div>
    
    <table class="calendar__table calendar__table--<?=  $month->getWeeks();?>">
        <?php for ($i = 0; $i < $month->getWeeks(); $i++): ?>
        <tr>
            <?php foreach($month->days as $k => $day): 
                 $date = (clone $start)->modify("+" . ($k + $i * 7) . "days");
                ?>
            <td class="<? $month->withinMonth($date) ? '' :''; ?>">
                <?php if ($i === 0):?>
                <div class="calendar__weekday"><?= $day; ?></div>
                <?php endif; ?>
                <div class="calendar__day"><?= $date->format('d'); ?></div>
            </td>
            <?php endforeach; ?>
        </tr>
        <?php  endfor; ?>


    </table>

    
</body>
</html>