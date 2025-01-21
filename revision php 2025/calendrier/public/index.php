<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<body>
    <nav class="navbar navbar-dark bg-primary mb-3">
        <a href="/index.php" class="navbar-brand">Mon calendrier</a>
    </nav>
    <?php
    require '../src/date/month.php';
    try {
    $month = new App\date\Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
    }catch(Exception $e){
        $month = new App\date\Month();
    }
    ?>
    <h1><?php echo $month->toString();?></h1>
    <?php $month->getWeeks(); ?>
    <table>

    </table>

    
</body>
</html>