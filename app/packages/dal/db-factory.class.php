<?php

class DBFactory {

    private $server = "localhost";
    private $user = "root";
    private $pwd = "";
    private $db = "db-todo-list";
    private $conn;
    private $query;
	
	public function __construct () {
	}

    public function connect () {
		$this->conn = mysql_connect($this->server, $this->user, $this->pwd);
		
		if (!$this->conn) {
			throw new Exception('Database, Connect [ ' . mysql_error($this->conn) . ' ]');
		}
		
		$select = mysql_select_db($this->db, $this->conn);
		
		if (!$select) {
			throw new Exception('Database, Select [ ' . mysql_error($this->conn) . ' ]');
		}
	}

    public function closeConnection () {
		if (!mysql_close($this->conn)) {
			throw new Exception('Database, Close [ ' . mysql_error($this->conn) . ' ]');
		}
	}

    public function commit () {
		$result = mysql_query('commit', $this->conn);
		
		if (!$result) {
			throw new Exception('Database, Commit [ ' . mysql_error($this->conn) . ' ]');
		}
		
		$this->closeConnection();
		
		return true;
	}

    public function rollback () {
		$result = mysql_query('rollback', $this->conn);
		
		if (!$result) {
			throw new Exception('Database, Rollback [ ' . mysql_error($this->conn) . ' ]');
		}
		
		$this->closeConnection();
		
		return true;
	}

    public function executeSingleQuery ($close = true) {
		$result = mysql_query($this->query, $this->conn);
		
		if (!$result) {
			throw new Exception('Database, Single Query [ ' . mysql_error($this->conn) . ' ]');
		}
		
		if ($row = mysql_fetch_object($result)) {
			mysql_free_result($result);
			
			if ($close) {
				$this->closeConnection();
			}
			
		    return $row;
		}
		
		return null;
	}

    public function executeQuery ($close = true) {
		$result = mysql_query($this->query, $this->conn);
		
		if (!$result) {
			throw new Exception('Database, Query [ ' . mysql_error($this->conn) . ' ]');
		}
		
		$array = array();
		
		while ($row = mysql_fetch_object($result)) {
		    $array[] = $row;
		}

		mysql_free_result($result);
		
		if ($close) {
			$this->closeConnection();
		}
		
		return $array;
	}

    public function getConnection () {
        return $this->conn;
    }

    public function getQuery () {
        return $this->query;
    }

    public function setQuery ($query) {
        return $this->query = $query;
    }

}

?>