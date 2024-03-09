<?php
class Track {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  public $pdo = null;
  public $stmt = null;
  public $error = "";
  function __construct () {
    global $host, $db_name, $name, $password;
    $this->pdo = new PDO(
      "mysql:host=".$host.";dbname=".$db_name.";charset=utf8mb4",
      $name, $password, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  // (B) DESTRUCTOR - CLOSE CONNECTION
  function __destruct () {
    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  // (C) HELPER FUNCTION - EXECUTE SQL QUERY
  function query ($sql, $data=null) : void {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) INSERT TRACKING DATA
  function insertTrackingData($driver_pid, $driver_bid, $lng, $lat) {
    $this->query(
      "INSERT INTO `Tracking` (`driver_pid`, `driver_bid`, `track_time`, `track_lng`, `track_lat`) VALUES (?,?,?,?,?)",
      [$driver_pid, $driver_bid, date("Y-m-d H:i:s"), $lng, $lat]
    );
    return true;
  }

  // (E) GET TRACKING DATA
  function getTrackingData ($driver_pid) {
    $this->query(
      "SELECT * FROM `Tracking` WHERE `driver_pid`=?",
      [$driver_pid]
    );
    return $this->stmt->fetchAll();
  }
}

// (F) DATABASE SETTINGS - CHANGE THESE TO YOUR OWN!
$host = 'localhost';
$db_name = 'WT2024';
$name = 'root';
$password = '';

// (G) START!
$_TRACK = new Track();
