<?php

error_reporting(E_ERROR);

require_once("../bl/constant.class.php");
require_once("../bl/message.class.php");
require_once("../bl/todo.class.php");
require_once("../dal/todo-dao.class.php");

$action = $_REQUEST["action"];

if (!isset($action)) {
	echo "ERROR: Action Variable Not Set.";
	die;
}

switch ((int) $action) {
    case 0:
        getTodos();
        break;

    case 1:
        $code = $_REQUEST["code"];
        $todoObj = new Todo ($code, null, null);

        getByCode($todoObj);
        break;

    case 2:
        $description = $_REQUEST["description"];
        $goal = $_REQUEST["goal"];
        $todoObj = new Todo (0, $description, $goal);

        addTodo($todoObj);
        break;

    case 3:
        $code = $_REQUEST["code"];
        $description = $_REQUEST["description"];
        $goal = $_REQUEST["goal"];
        $todoObj = new Todo ($code, $description, $goal);

        updateByCode($todoObj);
        break;
    
    case 4:
        $code = $_REQUEST["code"];
        $todoObj = new Todo ($code, null, null);

        deleteByCode($todoObj);
        break;
}

function getTodos () {
    try {
        $todoDAO = new TodoDAO();
        $message = new Message($todoDAO->selectTodos(), CONSTANTS::STATUS_INFORMATION, CONSTANTS::TITLE_INFORMATION, null, CONSTANTS::SUCCESS_ITEMS_LISTED);
        echo json_encode($message->getJsonData());

    } catch (Exception $ex) {
        $message = new Message(null, CONSTANTS::STATUS_DANGER, CONSTANTS::TITLE_DANGER, $ex->getMessage(), CONSTANTS::FAILURE_ITEMS_LISTED);
        echo json_encode($message->getJsonData());
    }
}

function getByCode ($todoObj) {
    try {
        $todoDAO = new TodoDAO();
        $message = new Message($todoDAO->selectTodoByCode($todoObj), CONSTANTS::STATUS_INFORMATION, CONSTANTS::TITLE_INFORMATION, null, CONSTANTS::SUCCESS_ITEM_LISTED);
        echo json_encode($message->getJsonData());

    } catch (Exception $ex) {
        $message = new Message(null, CONSTANTS::STATUS_DANGER, CONSTANTS::TITLE_DANGER, $ex->getMessage(), CONSTANTS::FAILURE_ITEM_LISTED);
        echo json_encode($message->getJsonData());
    }
}

function addTodo ($todoObj) {
    try {
        $todoDAO = new TodoDAO();
        $todoDAO->insertTodo($todoObj);
        $message = new Message(null, CONSTANTS::STATUS_SUCCESS, CONSTANTS::TITLE_SUCCESS, null, CONSTANTS::SUCCESS_ITEM_ADDED);
        echo json_encode($message->getJsonData());

    } catch (Exception $ex) {
        $message = new Message(null, CONSTANTS::STATUS_DANGER, CONSTANTS::TITLE_DANGER, $ex->getMessage(), CONSTANTS::FAILURE_ITEM_ADDED);
        echo json_encode($message->getJsonData());
    }
}

function updateByCode ($todoObj) {
    try {
        $todoDAO = new TodoDAO();
        $todoDAO->updateTodoByCode($todoObj);
        $message = new Message(null, CONSTANTS::STATUS_SUCCESS, CONSTANTS::TITLE_SUCCESS, null, CONSTANTS::SUCCESS_ITEM_EDITED);
        echo json_encode($message->getJsonData());

    } catch (Exception $ex) {
        $message = new Message(null, CONSTANTS::STATUS_DANGER, CONSTANTS::TITLE_DANGER, $ex->getMessage(), CONSTANTS::FAILURE_ITEM_EDITED);
        echo json_encode($message->getJsonData());
    }
}

function deleteByCode ($todoObj) {
    try {
        $todoDAO = new TodoDAO();
        $todoDAO->deleteTodoByCode($todoObj);
        $message = new Message(null, CONSTANTS::STATUS_SUCCESS, CONSTANTS::TITLE_SUCCESS, null, CONSTANTS::SUCCESS_ITEM_DELETED);
        echo json_encode($message->getJsonData());

    } catch (Exception $ex) {
        $message = new Message(null, CONSTANTS::STATUS_DANGER, CONSTANTS::TITLE_DANGER, $ex->getMessage(), CONSTANTS::FAILURE_ITEM_DELETED);
        echo json_encode($message->getJsonData());
    }
}

?>