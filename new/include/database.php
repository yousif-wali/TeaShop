<?php
interface IDatabaseConnection {
    public function getConnection();
}
class DB {
    private $con;
    public function __construct(IDatabaseConnection $con) {
        $this->con = $con->getConnection();
    }
    public function query($sql, $params = []) {
    $stmt = $this->con->prepare($sql);
    if (!$stmt) {
        throw new Exception('Failed to prepare SQL statement: ' . $this->con->error);
    }
    if (count($params) > 0) {
        $types = '';
        $values = [];
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= 'i';
            } elseif (is_float($param)) {
                $types .= 'd';
            } elseif (is_string($param)) {
                $types .= 's';
            } else {
                $types .= 'b';
            }
            $values[] = $param;
        }
        $stmt->bind_param($types, ...$values);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = [];
    if (strpos($sql, 'SELECT') === 0 || strpos($sql, 'CALL') === 0) {
            if(strpos($sql, 'view') > 0 || strpos($sql, 'get') > 0 || strpos($sql, 'count') > 0 || strpos($sql, 'login') > 0){
                while ($row = $result->fetch_assoc()) {           
                    foreach ($row as $key => $value) {
                        $row[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE);
                    }
                    $rows[] = $row;           
                }

            }
        
    } elseif (strpos($sql, 'INSERT') === 0) {
        $rows = mysqli_insert_id($this->con);
    } elseif (strpos($sql, 'UPDATE') === 0 || strpos($sql, 'DELETE') === 0) {
        $rows = mysqli_affected_rows($this->con);
    }
    return $rows;
}

}

class MySQLiConnection implements IDatabaseConnection {
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct($host, $user, $pass, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function getConnection() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            throw new Exception('Failed to connect to database: ' . mysqli_connect_error());
        }
        return $con;
    }
}
?>