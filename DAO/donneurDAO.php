<?php

class DonneurDAO
    {
        // set database config for mysql 
        function __construct()  
        {
            $consetup = new Config();
            $this->host = $consetup->host;  
            $this->user = $consetup->user;  
            $this->pass =  $consetup->pass;  
            $this->db = $consetup->db;                                  
        }
        // open connection to database
        public function open_db()  
        {  
            $this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);  
            if ($this->condb->connect_error)   
            {  
                die("Erron in connection: " . $this->condb->connect_error);  
            }  
        }  
        // close database  
        public function close_db()  
        {  
            $this->condb->close();  
        }

        /**
         * Select all donneurs from table donneurs in database
         *
         * @return array
         */
        public function selectDonneurs()
        {
            try
            {  
                $this->open_db();  
                $query=$this->condb->prepare("SELECT * FROM donneur");     
                $query->execute();  
                $res=$query->get_result();     
                $query->close();
                if($res)
                {
                    return $res;
                }             
                $this->close_db();                  
                return [];  
            }  
            catch(Exception $e)  
            {  
                $this->close_db();  
                throw $e;     
            }
        }
        /**
         * Insert a new donneur in table donneur in database
         *
         * @param Donneur $donneur
         * @return integer
         */
        public function insertDonneur(Donneur $donneur):int
        {
            try  
            {     
                $this->open_db();  
                $query=$this->condb->prepare("INSERT INTO donneur (donneur_name,telephone) VALUES (?, ?)");
                $donneurName = $donneur->getDonneurName();
                $teleNumber = $donneur->getTeleNumber();
                $query->bind_param("ss", $donneurName , $teleNumber );  
                $query->execute();  
                $res = $query->get_result();  
                $last_id=$this->condb->insert_id;  
                $query->close();  
                $this->close_db();  
                return $last_id;  
            }  
            catch (Exception $e)   
            {  
                $this->close_db();     
                throw $e;  
            }
        } 

        public function donneurNameFromDonneurID(int $donneurID)
        {
            try
            {  
                $this->open_db();  
                $query=$this->condb->prepare("SELECT donneur_name FROM donneur WHERE donneur_ID =?");  
                $query->bind_param("i", $donneurID ); 
                $query->execute();  
                $res=$query->get_result();     
                $query->close();
                if($res)
                {
                    return $res;
                }             
                $this->close_db();                  
                return [];  
            }  
            catch(Exception $e)  
            {  
                $this->close_db();  
                throw $e;     
            }
        }

        public function donneurIDFromDonneurName(string $donneurName)
        {
            try
            {  
                $this->open_db();  
                $query=$this->condb->prepare("SELECT donneur_ID FROM donneur WHERE donneur_Name =?");  
                $query->bind_param("s", $donneurName ); 
                $query->execute();  
                $res=$query->get_result();     
                $query->close();
                if($res)
                {
                    return $res;
                }             
                $this->close_db();                  
                return [];  
            }  
            catch(Exception $e)  
            {  
                $this->close_db();  
                throw $e;     
            }
        }
    }