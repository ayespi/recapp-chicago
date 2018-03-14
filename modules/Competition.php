<?php

require('../../../__CONNECT/recapp_houston-connect.php');
include_once('./Competitor.php');
include_once('./Compute.php');
include_once('./File.php');
include_once('./Team.php');
include_once('./Week.php');
include_once('./WeighIn.php');

class Competition{
  
  public $connection;
  public $database  = 'recapp_houston';
  public $table     = 'competitions';
  public $name;
  public $location;
  public $details;
  public $contact;

  public function __construct($connection){
    $this->connection = $connection;
    $this->createTable();
  }

  public function addCompetition(){
    $sql = "";
    $result = mysql_query($this->connection, $sql);
  }

  public function addCompetitor($data){
    $Competitor = new Competitor($this->connection);
    $Competitor->add($data);
  }

  public function addMultipleCompetitors($data){
    $Competitor = new Competitor($this->connection);
    $Competitor->addMultiple($data);
  }

  public function addTeam($data){
    $Team = new Team($this->connection);
    $Team->add($data);
  }

  public function addTeamLeader($team_id, $data){
    $Team = new Team($this->connection);
    $Team->addLeader($team_id, $data);
  }

  public function addWeighIn($data){
    $WeighIn = new WeighIn($this->connection);
    $WeighIn->add($data);
  }

  public function addWeek($data){
    $Week = new Week($this->connection);
    $Week->add($data);
  }

  public function createCompetition($data){
    $this->name       = $data['competition_name'];
    $this->location   = $data['competition_location'];
    $this->details    = $data['competition_details'];
    $this->contact    = $data['competition_contact'];
    $this->addCompetition();
  }

  public function createTable(){
    $sql = "CREATE TABLE IF NOT EXISTS `".$this->database."`.`".$this->table."` (
      `competition_ID` INT NOT NULL AUTO_INCREMENT,
      `competition_name` VARCHAR(50) NOT NULL,
      `competition_location` VARCHAR(50) NOT NULL,
      `competition_details` TEXT NOT NULL,
      `competition_contact` VARCHAR(50) NOT NULL,
      `competition_date_entered` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`competition_ID`)
    ) ENGINE = InnoDB;";
    $result = mysqli_query($this->connection, $sql);

    if($result){
      $this->welcomeMessage();
    }

  }

  public function selectTeam($id){
    $Team = new Team($this->connection);
    return $Team->getTeamByID($id);
  }

  public function welcomeMessage(){
    echo("<script> alert('Competition Object Created...'); </script>");
  }
}

$Competition = new Competition($connection);
?>