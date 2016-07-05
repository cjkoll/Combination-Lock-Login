<?php

/*
 *  Copyright 2016 Chris Koll Tampa Bay Web Design (info@tampabay-webdesign.com).
 *  All rights reserved.
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions are met:
 *  Redistributions of source code must retain the above copyright notice, this
 *  list of conditions and the following disclaimer.
 *  Redistributions in binary form must reproduce the above copyright notice,
 *  this list of conditions and the following disclaimer in the documentation
 *  and/or other materials provided with the distribution.
 *  
 *  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 *  AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 *  IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 *  ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 *  LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 *  CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 *  SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 *  INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 *  CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 *  ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *  POSSIBILITY OF SUCH DAMAGE.
 *  
 */

class Database {

    private $pdo;
    private $sQuery;
    private $settings;
    private $bConnected = false;
    private $log;
    private $parameters;

    public function __construct() {
        $this->log = new Log();
        $this->Connect();
        $this->parameters = array();
    }

    private function Connect() {
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . '';
        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->bConnected = true;
        } catch (PDOException $e) {
            echo $this->ExceptionLog($e->getMessage());
            die();
        }
    }

    public function CloseConnection() {
        $this->pdo = null;
    }

    private function Init($query, $parameters = "") {
        if (!$this->bConnected) {
            $this->Connect();
        }
        try {
            $this->sQuery = $this->pdo->prepare($query);
            $this->bindMore($parameters);
            if (!empty($this->parameters)) {
                foreach ($this->parameters as $param) {
                    $parameters = explode("\x7F", $param);
                    $this->sQuery->bindParam($parameters[0], $parameters[1]);
                }
            }
            $this->succes = $this->sQuery->execute();
        } catch (PDOException $e) {
            echo $this->ExceptionLog($e->getMessage(), $query);
            die();
        }
        $this->parameters = array();
    }

    public function bind($para, $value) {
        $this->parameters[sizeof($this->parameters)] = ":" . $para . "\x7F" . utf8_encode($value);
    }

    public function bindMore($parray) {
        if (empty($this->parameters) && is_array($parray)) {
            $columns = array_keys($parray);
            foreach ($columns as $i => &$column) {
                $this->bind($column, $parray[$column]);
            }
        }
    }

    public function query_class($query, $class, $params = null) {
        $query = trim($query);
        $this->Init($query, $params);
        $rawStatement = explode(" ", $query);
        $statement = strtolower($rawStatement[0]);
        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll(PDO::FETCH_CLASS, $class);
        } else {
            return NULL;
        }
    }

    public function assoc_query($query, $params = null, $fetchmode = PDO::FETCH_ASSOC) {
        $query = trim($query);
        $this->Init($query, $params);
        $rawStatement = explode(" ", $query);
        $statement = strtolower($rawStatement[0]);
        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll($fetchmode);
        } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
            return $this->sQuery->rowCount();
        } else {
            return NULL;
        }
    }

    public function query($query, $params = null, $fetchmode = PDO::FETCH_ASSOC) {
        $query = trim(str_replace("\r", " ", $query));
        $this->Init($query, $params);
        $rawStatement = explode(" ", preg_replace("/\s+|\t+|\n+/", " ", $query));
        $statement = strtolower($rawStatement[0]);
        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll($fetchmode);
        } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
            return $this->sQuery->rowCount();
        } else {
            return NULL;
        }
    }

    public function obj_query($query, $params = null, $fetchmode = PDO::FETCH_OBJ) {
        $query = trim($query);
        $this->Init($query, $params);
        $rawStatement = explode(" ", $query);
        $statement = strtolower($rawStatement[0]);
        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll($fetchmode);
        } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
            return $this->sQuery->rowCount();
        } else {
            return NULL;
        }
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    public function column($query, $params = null) {
        $this->Init($query, $params);
        $Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);
        $column = null;
        foreach ($Columns as $cells) {
            $column[] = $cells[0];
        }
        return $column;
    }

    public function row($query, $params = null, $fetchmode = PDO::FETCH_ASSOC) {
        $this->Init($query, $params);
        return $this->sQuery->fetch($fetchmode);
    }

    public function single($query, $params = null) {
        $this->Init($query, $params);
        return $this->sQuery->fetchColumn();
    }

    private function ExceptionLog($message, $sql = "") {
        $exception = 'Unhandled Exception. <br />';
        $exception .= $message;
        $exception .= "<br /> You can find the error back in the log.";
        if (!empty($sql)) {
            $message .= "\r\nRaw SQL : " . $sql;
        }
        $this->log->write($message);
        return $exception;
    }

}

$db = new Database();
