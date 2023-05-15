<?php
class playerClass{
    public $userName="";
    public $userPass="";
    public $userTeam="";


    public function setPlayer($n, $p,  $t){
        $this->userName = $n;
        $this->userPass = $p;
        $this->userTeam = $t;
    }

    public function getPlayerName(): string{
        return $this->userName;
    }

    public function getPlayerTeam(): string{
        return $this->userTeam;
    }
}