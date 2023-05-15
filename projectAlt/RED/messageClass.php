<?php

class messageClass
{
    public $userText="";
    public $userName="";
    public $teamColor="";

    public function setmessage($t, $uN, $tc){

        $this->usertext=$t;
        $this->userName=$uN;
        $this->teamColor=$tc;
    }

    public function getText():string{
        return $this->userText;
    }
    public function getUserName():string{
        return $this->userName;
    }
    public function getTeamColor():string{
        return $this->teamColor;
    }

}