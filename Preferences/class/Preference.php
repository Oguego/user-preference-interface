<?php
class Preference{
    public $idPreference;
    public $preferenceName;

    public function print(){
      echo $this->idPreference . " - " . $this->preferenceName;
    }
}
?>