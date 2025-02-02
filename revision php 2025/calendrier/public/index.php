
    <?php
    require '../src/bootstrap.php';
    require '../views/header.php';
    require '../src/date/month.php';
    require '../src/date/Events.php';
    $pdo = get_pdo();
    $events = new App\date\Events($pdo);
    try {
    $month = new App\date\Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
    $start = $month->getFirstDay();
    $start = $start->format('N') === '1' ? $start : $month->getFirstDay()->modify('last monday');
    }catch(Exception $e){
        $month = new App\date\Month();
    }
    $weeks= $month->getWeeks();
    $end = (clone $start)->modify('+' . (6+7*($weeks-1)) . 'days');

    $events = $events->getEventsBetweenDates($start,$end);
    /*echo '<pre>';
    var_dump($events);
    echo '</pre>';*/
    ?>
    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1><?php echo $month->toString();?></h1>
    <div>
        <a href="./index.php?month=<?= $month->previousMonth()->month;?>&year=<?= $month->previousMonth()->year;?>" class="btn btn-primary">&lt;</a>
        <a href="./index.php?month=<?= $month->nextMonth()->month;?>&year=<?= $month->nextMonth()->year;?>" class="btn btn-primary">&gt;</a>
    </div>
    </div>
    
    <table class="calendar__table calendar__table--<?=  $weeks;?>">
        <?php for ($i = 0; $i < $weeks; $i++): ?>
        <tr>
            <?php foreach($month->days as $k => $day): 
                 $date = (clone $start)->modify("+" . ($k + $i * 7) . "days");
                 $eventsForDay = $events[$date->format("Y-m-d")] ?? [];
                ?>
            <td class="<? $month->withinMonth($date) ? '' :''; ?>">
                <?php if ($i === 0):?>
                <div class="calendar__weekday"><?= $day; ?></div>
                <?php endif; ?>
                <div class="calendar__day"><?= $date->format('d'); ?></div>
                <?php foreach($eventsForDay as $event):?>
                    <div class="calendar__event">
                        <?= (new DateTime($event['start']))->format('H:i') ?> - <a href="./event.php?id=<?= $event['id'];?>"><?= h($event['name']); ?></a>
                    </div>
                <?php endforeach;?>    
            </td>
            <?php endforeach; ?>
        </tr>
        <?php  endfor; ?>


    </table>
    <?php
    require '../views/footer.php';
    ?>

    
