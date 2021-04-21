<?php

require "../config.php";

class DonDAO
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
         * Select all dons from table don in database
         *
         * @return array
         */
        public function selectDons(?int $donneurID =null)
        {
            try
            {
                $this->open_db(); 
                if($donneurID) {
                    $query=$this->condb->prepare("SELECT * FROM don WHERE donneur_ID = ?");
                    $query->bind_param("i", $donneurID);
                }
                else{
                    $query=$this->condb->prepare("SELECT * FROM don"); 
                }    
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
         * Insert a new don in table don in database
         *
         * @param Don $don
         * @return integer
         */
        public function insertDon(Don $don):int
        {
            try  
            {     
                $this->open_db();  
                $query=$this->condb->prepare("INSERT INTO don (don_name,don_type,donneur_ID) VALUES (?, ?, ?)");
                $donName = $don->getDonName();
                $donType = $don->getDonType();
                $donneur_ID = $don->getDonneurID();
                $query->bind_param("ssi", $donName , $donType , $donneur_ID);  
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
    }