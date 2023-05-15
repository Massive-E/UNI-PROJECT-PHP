<?php
//require_once('playerClass.php');
//session_start();
//
//
//class board{
//
//    public $red = 0;
//    public $green = 0;
//    public $yellow = 0;
//    public $Max = "";
//
//    public $checkingElements = array();
//    public $checkingList = array();
//    public $boardList= array();
//
//    public function start(){
//        for ($z = 0; $z < 100; $z++) {
//            array_push($this->checkingList, $this->checkingElements );
//            array_push($this->boardList, ""); // pushing no color initially
//        }
//    }
//
//    private function IncreaseColors($person, $flag=false){
//        if ($person->userTeam=="green"){
//            $this->green++;
//        }
//        if ($person->userTeam=="yellow"){
//            $this->yellow++;
//        }
//        if ($person->userTeam=="red"){
//            $this->red++;
//        }
//    }
//
//    // last reaching should own the box not the first, if 2 red then 2 green, then green owns it
//    private function CalculateMaxColor($position){
//
//        if ($this->yellow>= $this->red+1 && $this->yellow >= $this->green+1){
//            $this->Max='yellow';
//        }
//
//        else if ($this->green>= $this->red+1 && $this->green >= $this->yellow+1){
//            $this->Max='green';
//        }
//
//        else if ($this->red>= $this->yellow+1 && $this->red >= $this->green+1){
//            $this->Max='red';
//        }
//
//        $this->boardList[$position]=$this->Max;
//
//    }
//    public function ResetCounts(){
//        $this->red=0;
//        $this->green=0;
//        $this->yellow=0;
//        $this->Max="";
//    }
//
//
//    public function showboxColors($position){
//        print_r($this->checkingList[$position]);
//    }
//
//    public function updatebox($position, $p){
//        array_push($this->checkingList[$position],$p);
//    }
//
//
//    public function updateGame($position, $playerObject){
//
//        $temp= $this->checkingList[$position];
//
//        foreach ($temp as $index=>$person){
//            $this->IncreaseColors($person);
//        }
//        $this->CalculateMaxColor($position);
//
//        echo "<br>$this->green<br>";
//        echo "<br>$this->red<br>";
//        echo "<br>$this->yellow<br>";
//
//
//        $checkingCount=0;
//        foreach ($this->checkingList as $index=> $element) {
//            if ($checkingCount == $position) {
//
//                if (!in_array($playerObject, $element)) {
//                    $this->updatebox($position, $playerObject);
//
//                    $this->IncreaseColors($playerObject);
//                    $this->CalculateMaxColor($position);
//                }
//
//                else {
//                    break;
//                }
//            }
//            $checkingCount++;
//        }
//
//    }
//
//
//
//
//}
//
////session_destroy();
//
//$CurrentPlayer = new playerClass();
//$CurrentPlayer=json_decode($_REQUEST['CurrentPlayer']);
//$boxid=$_REQUEST['id'];
//
//$game = new board();
//$game->start();
//
//if (isset($_SESSION['save'])){
//    $game=unserialize($_SESSION['save']);
//}

?>
<?php

$temp = $_REQUEST['please'];
echo $temp;
echo "yolo bitch";
//        $game->updateGame($boxid, $CurrentPlayer);
////
//        $game->showboxColors($boxid);
////
//        $_SESSION['save']=serialize($game);
//        $game->returnBox($boxid);
//
////        echo "<button id=$boxid onclick='bruh($boxid)' style='color: $this->Max'>_</button>";
//        $game->ResetCounts();

?>