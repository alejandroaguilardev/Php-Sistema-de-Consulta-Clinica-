<?php
	class Company {
        private $db;

        public function __construct(){
            $this->db = new DataBaseDafft;
        }

        public function companyRecord($data)
         {
           	$this->db->query("SELECT * FROM company LIMIT 1");
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }

        public function contactsRecord($data)
         {
           	$this->db->query("SELECT * FROM company_contact LIMIT 1");
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }

        public function networkRecord($data)
         {
           	$this->db->query("SELECT * FROM company_network LIMIT 1");
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }
    }