<?php
namespace App\date;

use PDO;
class Events{
    public function getEventsBetween (\DateTime $start, \DateTime $end):array{
        $pdo = new PDO('mysql:host=localhost;dbname=tuto_calendar','root','ichigovastelord',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

        ]);
        $sql = "SELECT * FROM events WHERE start_ BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND
        '{$end->format('Y-m-d 23:59:59')}'";
        return [];

    }
}
?>