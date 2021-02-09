<?php 
namespace PHPAPI\Core;

    class Database {
        private $host;
        private $user;
        private $password;
        private $database;
        private $object;
        private $prepare;
    
        public function __construct()
        {
            $this->loadConfig();
            $this->getConnection();
        }
    
        private function loadConfig()
        {
            $path = '../config/database.ini';
    
            if (!file_exists($path)) {
                throw new \Exception('Missing database config file');
            }
    
            $arrayConfig = parse_ini_file($path, true);
            
            if (
                !array_key_exists('database', $arrayConfig) ||
                !array_key_exists('host', $arrayConfig['database']) ||
                !array_key_exists('user', $arrayConfig['database']) ||
                !array_key_exists('password', $arrayConfig['database']) ||
                !array_key_exists('port', $arrayConfig['database']) ||
                !array_key_exists('database', $arrayConfig['database'])
            ) {
                throw new \Exception('Missing config informations');
            }
    
            $this->host = $arrayConfig['database']['host'];
            $this->user = $arrayConfig['database']['user'];
            $this->password = $arrayConfig['database']['password'];
            $this->database = $arrayConfig['database']['database'];
        }
    
        public function getConnection() 
        {
            try {
                $this->object = new \PDO("mysql:host=$this->host;dbname=$this->database;charset=UTF8", $this->user, $this->password);
                // set the PDO error mode to exception
                $this->object->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
              } catch(\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
    
        }

    
    
        public function fetchAll($sql)
        {
            $prepare = $this->object->prepare($sql);
            $prepare->setFetchMode(\PDO::FETCH_ASSOC);
            $this->prepare = $prepare;
            $this->prepare->execute();
            if (!$prepare) {
                return false;
            }
            if (!$this->prepare->execute()) {
                $this->prepare = $prepare;
                return false;
            }
            // set the resulting array to associativ
            foreach($this->prepare->fetchAll() as $v) {
                $arrayAttributes[] = $v;
            }
            return $arrayAttributes;
        }
    
        public function fetchOne($sql, $arrayAttributes = [])
        {
            $prepare = $this->object->prepare($sql);
            $prepare->setFetchMode(\PDO::FETCH_ASSOC);
            $this->prepare = $prepare;
            $this->prepare->execute();
            if (!$prepare) {
                return false;
            }
            if (!$prepare->execute($arrayAttributes)) {
                $this->prepare = $prepare;
                return false;
            }
            $data = $prepare->fetch(\PDO::FETCH_ASSOC);
            return $data;
    
        }

        public function createOne($sql, $arrayAttributes = [])
        {
             $insert = $this->object->prepare($sql);
             
            if($insert->execute($arrayAttributes)){
                        return true;
                        }
                        return false;
        }

        public function updateOne($sql, $arrayAttributes = [])
        {
            $insert = $this->object->prepare($sql);
            if($insert->execute($arrayAttributes)){
                        return $arrayAttributes;
                        }
                        return false;
        }

        
        public function getLast($sql, $arrayAttributes = [])
        {
            $prepare = $this->object->prepare($sql);
            $prepare->setFetchMode(\PDO::FETCH_ASSOC);
            $this->prepare = $prepare;
            $this->prepare->execute();
            if (!$prepare) {
                return false;
            }
            if (!$prepare->execute($arrayAttributes)) {
                $this->prepare = $prepare;
                return false;
            }
            $data = $prepare->fetch(\PDO::FETCH_ASSOC);
            return $data;
    
        }


        public function deleteOne($sql, $id)
        {
          
            $prepare = $this->object->prepare($sql);
            $prepare->bindParam(1, $id);
            $this->prepare = $prepare;
            if (!$prepare) {
                return false;
            }
            $isExecuted = $this->prepare->execute();
            return $isExecuted;
        
        }

        public function search($sql,  $arrayAttributes)
        {

            $prepare = $this->object->prepare($sql);
            $prepare->setFetchMode(\PDO::FETCH_ASSOC);
            $this->prepare = $prepare;
            $this->prepare->execute($arrayAttributes);
            if (!$prepare) {
                return false;
            }
            if (!$this->prepare->execute($arrayAttributes)) {
                $this->prepare = $prepare;
                return false;
            }
            // set the resulting array to associativ
            $array = array();
            foreach($this->prepare->fetchAll() as $v) {
                $array[] = $v;
            }
            return $array;

        }
    
    }  
?>