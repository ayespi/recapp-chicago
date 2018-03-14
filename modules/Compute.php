<?php
class Compute{
  public $begin;
  public $previous;
  public $current;

  public function get_overall_weight_loss(){
    return $this->begin - $this->current;
  }

  public function get_weight_loss(){
    return $this->previous - $this->current;
  }

  public function get_overall_weight_loss_percent(){
    return ($this->begin - $this->current) * 100 / $this->begin;
  }

  public function get_weight_loss_percent(){
    return ($this->previous - $this->current) * 100 / $this->previous;
  }

  public function set_begin($begin){
    $this->begin = $begin;
  }

  public function set_previous($previous){
    $this->previous = $previous;
  }

  public function set_current($current){
    $this->current = $current;
  }

}

// $Compute = new Compute;
// echo('<pre>');
// echo($Compute);
// echo('</pre>');
?>