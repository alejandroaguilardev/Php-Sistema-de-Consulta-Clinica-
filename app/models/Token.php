<?php
	class Token {
        private $db;

        public function __construct(){
            $this->db = new DataBase;
        }

         public function getRecord($data)
         {
            $this->db->query("SELECT * FROM token WHERE token = :token AND fecha < :fecha  AND status = :status ORDER BY id DESC");
            $this->db->bind(':token', $data['token']);
            $this->db->bind(':fecha', FECHA_TOKEN);
            $this->db->bind(':status', 'active');
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }

        public function insertRecord($data)
        {
            $this->db->query("INSERT INTO token ( dni, token, fecha) VALUES (:dni, :token, :fecha)");
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':token', $data['token']);
            $this->db->bind(':fecha', FECHA);           
           if($this->db->execute()){return true;}else{return false;}
        }



        public function updateRecord($data)
        {
            $this->db->query("UPDATE token SET  status = :status WHERE dni = :dni");
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':status', 'inactive');
           if($this->db->execute()){return true;}else{return false;}
        }

    }