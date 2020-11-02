<?php 
    abstract class Connection {
        protected $user;
        protected $database;
        protected $password;
        protected $connection;
    
        public function __construct ($user, $database, $password) {
            $this->user = $user;
            $this->database = $database;
            $this->password = $password;
        }

        public function getConnection () {
            return $this->connection;
        }
        
        abstract public function connect () ;
        abstract public function disconnect () ;
    }
?>