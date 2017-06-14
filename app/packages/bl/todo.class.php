<?php

class Todo {

    private $code;
    private $description;
    private $goal;

    public function __construct ($code, $description, $goal) {
        $this->code = $code;
        $this->description = $description;
        $this->goal = $goal;
    }

    public function getCode () {
        return $this->code;
    }

    public function getDescription () {
        return $this->description;
    }

    public function getGoal () {
        return $this->goal;
    }

    public function setCode ($code) {
        $this->code = $code;
    }

    public function setDescription ($description) {
        $this->description = $description;
    }

    public function setGoal ($goal) {
        $this->goal = $goal;
    }

}

?>