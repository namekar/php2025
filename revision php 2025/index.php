<?php
    class weather {
        public static $tempConditions = ['cold','mild','warm'];
        public static function celsiusToFarenheit($c){
            return $c * 9 / 5 + 32;

        }
        public static function determineTempConditions($f){
            if ($f < 40 ){
                return self::$tempConditions[0];
            }else if ($f < 70){
                return self::$tempConditions[1];
            }else {
                return self::$tempConditions[2];
            }

        }
    }
    //print_r (weather::$tempConditions);
    //echo weather::celsiusToFarenheit(20);
    echo weather::determineTempConditions(10);
    












    /*class User{
        public $username;
        public $email;
        public function addFriend(){
            return "$this->username added a new friend";
        
        }
        public $role = 'member';
        public function __construct($username, $email){
            $this->username = $username;
            $this->email = $email;


        }
        //destruct method
        public function __destruct(){
            echo "the user $this->username was removed";
        }
        //clone
        public function __clone(){
            $this->username = $this->username . '(cloned)<br>';

        }

        //getter
        public function getEmail(){
            return $this->email;
            
        }
        //setter
        public function setEmail($email){
            if (strpos($email,'@')>-1){
                $this->email = $email;
            }
            else{
                echo 'enter a valid email';
            }
        }
    }    
    class AdminUser extends User{
        public $level;
        public $role = 'admin'; 
        public function __construct($username, $email, $level){
            $this->level = $level;
            parent::__construct($username, $email);
        }

    }



    $userOne = new User('mario','mario@gmail.com');
    $userTwo = new User(username: 'luigi',email:'lu@gmail.com');
    $userThree = new AdminUser(username: 'lord',email:'cho@gmail.com',level:'5');
    //echo $userThree->username. '<br>';
    //echo $userThree->email.'<br>';
    $userFour = clone $userOne;
    //echo $userOne-> username . '<br>';
    //echo $userOne-> email . '<br>';
    //echo $userTwo-> username . '<br>';
    //echo $userTwo-> email . '<br>';
    //echo 'the class is ' . get_class($userOne). '<br>';
    //echo $userOne->addFriend() . '<br>';
    //all the properties in an array
    //print_r(get_class_vars('User'));
    //print_r(get_class_methods('User'));
    //$userOne->setEmail('yoshi@then.com');
    //echo $userOne->role . '<br>';
    //echo $userThree->role . '<br>';
    //echo $userFour->username.'<br>';*/


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>