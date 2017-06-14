<?php

require_once("db-factory.class.php");
require_once("../bl/todo.class.php");

class TodoDAO {

    public function selectTodos () {
        try {
            $array = null;

            $conn = new DBFactory();
            $query =
                "select * " .
                "from todos;";

            $conn->connect();
            $conn->setQuery($query);

            $array = $conn->executeQuery(true);

            return $array;

        } catch (Exception $ex) {
            throw $ex;
        }
	}

    public function selectTodoByCode ($todoObj) {
        try {
            $array = null;

            $conn = new DBFactory();
            $query =
                "select * " .
                "from todos " .
                "where code = " . $todoObj->getCode() . ";";

            $conn->connect();
            $conn->setQuery($query);

            $array = $conn->executeQuery(true);

            return $array;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function insertTodo ($todoObj) {
        try {
            $conn = new DBFactory();
            $query =
                "insert " .
                "into todos (description, goal) " .
                "values (" .
                    "'" . addslashes($todoObj->getDescription()) . "', " .
                    "'" . addslashes($todoObj->getGoal()) . "'" .
                ");";

            $conn->connect();
            $conn->setQuery($query);
            $conn->executeSingleQuery(true);

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function updateTodoByCode ($todoObj) {
        try {
            $conn = new DBFactory();
            $query =
                "update todos " .
                "set description = '" . addslashes($todoObj->getDescription()) . "', " .
                "    goal = '" . addslashes($todoObj->getGoal()) . "' " .
                "where code = " . $todoObj->getCode() . ";";

            $conn->connect();
            $conn->setQuery($query);
            $conn->executeSingleQuery(true);

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function deleteTodoByCode ($todoObj) {
        try {
            $conn = new DBFactory();
            $query =
                "delete " .
                "from todos " .
                "where code = " . $todoObj->getCode() . ";";

            $conn->connect();
            $conn->setQuery($query);
            $conn->executeSingleQuery(true);

        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}

?>