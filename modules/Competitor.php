<?php
require('../../../__CONNECT/recapp_chicago-connect.php');
class Competitor{
  /******************************** 
   * Competitor Object Properties 
   ********************************/
    public $connection;
    public $database  = 'recapp_chicago';
    public $table     = 'competitors';
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $team_id;
    public $team_name;

  /******************************** 
   * Competitor Object Constructor 
   ********************************/
    public function __construct($connection){
      $this->connection = $connection;
      $this->create_table();
    }

  /******************************** 
   * Competitor Object Methods 
   ********************************/

// *** Create Competitors Table ***
    public function create_table(){
      $sql = "CREATE TABLE IF NOT EXISTS `".$this->database."`.`".$this->table."` ( ";
      $sql .= "`competitor_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , ";
      $sql .= "`competitor_firstname` VARCHAR(100) NOT NULL , ";
      $sql .= "`competitor_lastname` VARCHAR(100) NOT NULL , ";
      $sql .= "`competitor_email` VARCHAR(100) NULL , ";
      $sql .= "`competitor_phone` VARCHAR(20) NULL , ";
      $sql .= "`competitor_team_ID` INT UNSIGNED NOT NULL DEFAULT '0', ";
      $sql .= "`competitor_team_name` VARCHAR(100) NULL , ";
      $sql .= "`competitor_date_entered` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
      $sql .= "UNIQUE (`competitor_ID`, `competitor_team_ID`),";
      $sql .= "PRIMARY KEY (`competitor_ID`)";
      $sql .= ") ENGINE = InnoDB;";

      // echo('<pre>');
      // echo($sql);
      // echo('</pre>');

      $result = mysqli_query($this->connection, $sql);
      if(!$result){
        echo('There was a problem creating the COMPETITORS table!!!<br>');
      }
    }

}

$Competitor = new Competitor($connection);

?>