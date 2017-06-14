<?php

class Message {
    
    private $output;
    private $status;
    private $title;
    private $technical;
    private $user;

    public function __construct ($output, $status, $title, $technical, $user) {
        $this->output = $output;
        $this->status = $status;
        $this->title = $title;
        $this->technical = $technical;
        $this->user = $user;
    }

    function getJsonData(){
        $var = get_object_vars($this);
        
        foreach ($var as &$value) {
            if (is_object($value) && method_exists($value, 'getJsonData')) {
                $value = $value->getJsonData();
            }
        }

        return $var;
    }

    public function getOutput () {
        return $this->output;
    }

    public function getStatus () {
        return $this->status;
    }

    public function getTitle () {
        return $this->title;
    }

    public function getTechnical () {
        return $this->technical;
    }

    public function getUser () {
        return $this->user;
    }

    public function setOutput ($output) {
        $this->output = $output;
    }

    public function setStatus ($status) {
        $this->status = $status;
    }

    public function setTitle ($title) {
        $this->title = $title;
    }

    public function setTechnical ($technical) {
        $this->technical = $technical;
    }

    public function setUser ($user) {
        $this->user = $user;
    }

}

?>