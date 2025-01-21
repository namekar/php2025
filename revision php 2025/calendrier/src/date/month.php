<?php
namespace App\date;
    class Month {
        private $months =['january','february','march','april','may','june','july','august','september','october','november','december'];
        private $month;
        private $year;
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
        public function toString():string{
            return $this->months[$this->month -1] . ' '. $this->year;
        }
        public function getWeeks():int{
            $start = new \DateTime("{$this->year}-{$this->month}-01");
            $end = (clone $start)->modify('+1 month -1 day');
            var_dump($start,$end);
        }
    }










?>