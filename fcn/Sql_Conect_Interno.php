<?PHP

//session_start("login");
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

class Dao_ConnectionFactory {

    private $driver = "pgsql";
    private $server = "";
    private $user = "postgres";
    private $pw = "1234";
    private $dbName = "";
    public $connection = null;

    public function createConn() {
        $this->server = $_SESSION['ip'];
        $this->dbName = $_SESSION['banco'];
        
        //echo $_SESSION['ip'].$_SESSION['banco'];
        $db = new PDO($this->driver . ":host=" . $this->server . ";dbname=" . $this->dbName, $this->user, $this->pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public function killConn() {
        if ($this->connection != null) {
            $this->connection = null;
        }
    }

}

?>