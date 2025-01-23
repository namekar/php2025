<?php
namespace App\date;
    class Month {
        public $months =['january','february','march','april','may','june','july','august','september','october','november','december'];
        public $month;
        public $days =['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
        public $year;
        /**
         * Summary of __construct
         * @param int $month
         * @param int $year
         * @throws \Exception
         */
        public function __construct(?int $month = null,?int $year = null) {
            if ($month === null){
                $month = intval(date('m'));
            }
            if ($year === null){
                $year = intval(date('Y'));
            }
            if ($month < 1|| $month >12){
                throw new \Exception("the month $month isn't valid");
            }
            if ($year < 1970 || $year >2025){
                throw new \Exception("the year $year isn't valid");
            }
            $this->month = $month;
            $this->year = $year;
        }
        public function getFirstDay():\DateTime{
            return new \DateTime("{$this->year}-{$this->month}-01");
        }
        public function toString():string{
            return $this->months[$this->month -1] . ' '. $this->year;
        }
        public function getWeeks():int{
            $start = $this->getFirstDay();
            $end = (clone $start)->modify('+1 month -1 day');
            $weeks= intval($end->format('W')) - intval($start->format('W'))+1;
            if ($weeks <0){
                $weeks = intval($end->format('W'));
            }
            return $weeks;
        }
        public function withinMonth(\DateTime $date):bool{
            return $this->getFirstDay()->format('y-m') === $date->format('y-m');
        }
        public function nextMonth(): Month
        {
            $month = $this->month + 1;
            $year = $this->year;
            if ($month >12){
                $month = 1;
                $year += 1;
                
            }
            return new Month($month,$year);
        }
        public function previousMonth(): Month{
            $month = $this->month - 1;
            $year = $this->year;
            if ($month < 1){
                $month = 12;
                $year -= 1;
                
            }
            return new Month($month,$year);
        }
    }









?>