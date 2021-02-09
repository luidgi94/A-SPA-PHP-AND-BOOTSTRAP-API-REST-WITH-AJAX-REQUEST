<?php
    namespace PHPAPI\Classes;

    class Magasin{

        // Connection
        private $conn;
        // Table
        private $db_table = 'magasin';
        // Columns
        private $id;
        private $name;
        private $size;
        private $city;
        private $multi_store;
        private $category;


        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getAllStores(){
            $sqlQuery = "SELECT id, name, size, city, multi_store, category FROM " . $this->db_table . "";
            $data= $this->conn->fetchAll($sqlQuery);
            return $data;
        }

        // CREATE
        public function createStore(){

            $sql= "INSERT INTO  ". $this->db_table ."(name, size, city, multi_store, category) VALUES ( ?, ?, ?, ?, ? )";
            $data = array(
                $this->name,
                $this->size,
                $this->city,
                $this->multi_store,
                $this->category,
                );
            $this->conn->createOne($sql, $data);

        }

        // UPDATE
        public function updateStore($id){

                $sql= "UPDATE  ". $this->db_table ." SET name = ?, size = ?, city = ?, multi_store = ?, category = ? WHERE id = ?";
                $data = array(
                    $this->name,
                    $this->size,
                    $this->city,
                    $this->multi_store,
                    $this->category,
                    $id
                    );
                return $this->conn->updateOne($sql, $data);
        
        }

        // SEARCH
        public function searchStore(){
            
                if( $this->name !=="" && $this->city !== "" ){
                
                      
                        if( $this->size !== "" ){
                                $data = array(
                                        '%'.strtoupper($this->name).'%',
                                        $this->size,
                                        '%'.strtoupper($this->city).'%',
                                        );
                                $sql= "SELECT * FROM ".$this->db_table." WHERE upper(name) LIKE ? AND size >= ? AND upper(city) LIKE ?";
                        }
                        else{
                                $data = array(
                                        '%'.strtoupper($this->name).'%',
                                        '%'.strtoupper($this->city).'%',
                                        );
                                $sql= "SELECT * FROM ".$this->db_table." WHERE upper(name) LIKE ? AND size >= 0 AND upper(city) LIKE ?";     
                        }
                       
                        return $this->conn->search($sql, $data);
        
                        }
                else if( $this->name !=="" && $this->size == "" && $this->city == "" && $this->multi_store == "true &amp;&amp; false" && $this->category == "toutes" ){
                
                $data = array(
                        strtoupper($this->name).'%',
                        );
                        
                $sql= "SELECT * FROM ".$this->db_table." WHERE upper(name) LIKE ? ";
            
                return $this->conn->search($sql, $data);

                }
                else if( $this->name !=="" && $this->size == "" && $this->city !== "" && $this->multi_store == "true &amp;&amp; false" && $this->category == "toutes" ){
                
                        $data = array(
                                strtoupper($this->name).'%',
                                '%'.strtoupper($this->city).'%',
                                );
                                
                        $sql= "SELECT * FROM ".$this->db_table." WHERE upper(name) LIKE ?  AND upper(city) LIKE ?";
                    
                        return $this->conn->search($sql, $data);
        
                }
                else if( $this->name =="" && $this->size == "" && $this->city !== "" ){
                
                        $data = array(
                                '%'.strtoupper($this->city).'%',
                                );
                                
                        $sql= "SELECT * FROM ".$this->db_table." WHERE upper(city) LIKE ?";
                    
                        return $this->conn->search($sql, $data);
        
                }
                else if( $this->name =="" && $this->size == "" && $this->city == "" && $this->multi_store == "true &amp;&amp; false" && $this->category == "toutes"){
                
                        $data = array(
                                $this->category
                                );
                                
                        $sql= "SELECT * FROM ".$this->db_table." ";
                    
                        return $this->conn->search($sql, $data);
        
                }
                else if( $this->name =="" && $this->size == "" && $this->city == "" && $this->multi_store == "true &amp;&amp; false" && $this->category !== "toutes"){
                
                        $data = array(
                                $this->category
                                );
                                
                        $sql= "SELECT * FROM ".$this->db_table." WHERE category LIKE ? ";
                    
                        return $this->conn->search($sql, $data);
        
                }
                else if( $this->name =="" && $this->size == "" && $this->city == "" && $this->multi_store == "true" && $this->category !== "toutes"){
                
                        $data = array(
                                $this->category,
                                $this->multi_store
                                );
                                
                        $sql= "SELECT * FROM ".$this->db_table." WHERE category LIKE ? AND multi_store LIKE ? ";
                    
                        return $this->conn->search($sql, $data);
        
                }
                else if( $this->name ==""  && $this->size == ""  && $this->city == "" && $this->multi_store == "false" && $this->category !== "toutes"){
                
                        $data = array(
                                $this->category,
                                $this->multi_store
                                );
                                
                        $sql= "SELECT * FROM ".$this->db_table." WHERE category LIKE ? AND multi_store LIKE ? ";
                    
                        return $this->conn->search($sql, $data);
        
                }
                else if( $this->name ==""  && $this->size !== ""  && $this->city == "" && $this->multi_store == "true &amp;&amp; false" && $this->category == "toutes"){
                
                        $data = array(
                                $this->size
                                );
                                
                        $sql= "SELECT * FROM ".$this->db_table." WHERE size > ? ";
                    
                        return $this->conn->search($sql, $data);
        
                }
        }

        // DELETE
        function deleteStore(){
            
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            return $this->conn->deleteOne($sqlQuery, $this->getId());
        }

        function getLastStore(){
                $sql= "SELECT * FROM " . $this->db_table . " ORDER BY ID DESC LIMIT 1";
                return $this->conn->getLast($sql);
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of size
         */ 
        public function getSize()
        {
                return $this->size;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
                return $this->city;
        }

        /**
         * Get the value of multi_store
         */ 
        public function getMulti_store()
        {
                return $this->multi_store;
        }

        /**
         * Get the value of category
         */ 
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Set the value of size
         *
         * @return  self
         */ 
        public function setSize($size)
        {
                $this->size = $size;

                return $this;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
                $this->city = $city;

                return $this;
        }

        /**
         * Set the value of multi_store
         *
         * @return  self
         */ 
        public function setMulti_store($multi_store)
        {
                $this->multi_store = $multi_store;

                return $this;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }
?>

