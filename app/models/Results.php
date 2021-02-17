<?php
    class Results {
        private $db;

        public function __construct(){
            $this->db = new DataBase;
        }

        public function getRecords($data)
        {
            $this->db->query("SELECT r.idresult, r.iduser, u.name,u.dni, r.pdf, r.description, r.company, c.name company_name, r.create_at  FROM `results` r  INNER JOIN `users` u ON (r.iduser = u.iduser)  INNER JOIN `users` c ON (r.company = c.iduser)  WHERE  r.status = :status ORDER BY r.create_at desc");
            $this->db->bind(':status', "active");
            return $this->db->setRecords($data['fetch']);
        }
        function getRecord($data)
        {
            $this->db->query("SELECT * FROM results WHERE idresult =:idresult AND status = :status LIMIT 1");
            $this->db->bind(':idresult', $data['idresult']);
            $this->db->bind(':status', "active");
            if($record=$this->db->setRecord($data['fetch'])){ 
                return $record;
            }else{
                return false;
            }
        }
        public function getRecordVeriId($data)
        {
            $this->db->query("SELECT * FROM results WHERE idresult =:idresult AND status = :status AND iduser = :iduser LIMIT 1");
            $this->db->bind(':idresult', $data['idresult']);
            $this->db->bind(':status', "active");
            $this->db->bind(':iduser', $data['sesion']);
            if($record=$this->db->setRecord($data['fetch'])){ 
                return $record;
            }else{
                return false;
            }
        }

        public function getRecordVeriIdRef($data)
        {
            $this->db->query("SELECT * FROM results WHERE idresult =:idresult AND status = :status AND company = :company LIMIT 1");
            $this->db->bind(':idresult', $data['idresult']);
            $this->db->bind(':status', "active");
            $this->db->bind(':company', $data['sesion']);
            if($record=$this->db->setRecord($data['fetch'])){ 
                return $record;
            }else{
                return false;
            }
        }
        public function getRecordUser($data)
        {
            $this->db->query("SELECT r.idresult, r.iduser, u.name,u.dni, r.pdf, r.description, r.company, c.name company_name, r.create_at  FROM `results` r  INNER JOIN `users` u ON (r.iduser = u.iduser)  INNER JOIN `users` c ON (r.company = c.iduser)  WHERE  r.status = :status AND r.iduser = :iduser ORDER BY create_at desc");
            $this->db->bind(':status', "active");
            $this->db->bind(':iduser', $data['iduser']);
            return $this->db->setRecords($data['fetch']);
        }
        public function getRecordUserDias($data)
        {
            $fecha = date('Y-m-d');
             $this->db->query("SELECT r.idresult, r.iduser, u.name,u.dni, r.pdf, r.description, r.company, c.name company_name, r.create_at  FROM `results` r  INNER JOIN `users` u ON (r.iduser = u.iduser)  INNER JOIN `users` c ON (r.company = c.iduser)  WHERE  r.status = :status AND r.iduser = :iduser AND r.create_at >= DATE_SUB(' $fecha', INTERVAL 15 DAY)  ORDER BY r.create_at desc");

            $this->db->bind(':status', "active");
            $this->db->bind(':iduser', $data['iduser']);
            return $this->db->setRecords($data['fetch']);
        }
        public function getRecordPacientes($data)
        {
            $this->db->query("SELECT r.idresult, r.iduser, u.name,u.dni, r.pdf, r.description, r.company, c.name company_name, r.create_at  FROM `results` r  INNER JOIN `users` u ON (r.iduser = u.iduser)  INNER JOIN `users` c ON (r.company = c.iduser)  WHERE  r.status = :status AND r.iduser = :iduser ORDER BY create_at desc");
            $this->db->bind(':status', "active");
            $this->db->bind(':iduser', $data['iduser']);
            return $this->db->setRecords($data['fetch']);
        }


        public function getRecordsEmpleados($data)
        {
            $this->db->query("SELECT r.idresult, r.iduser, u.name,u.dni, r.pdf, r.description, r.company, c.name company_name, r.create_at  FROM `results` r  INNER JOIN `users` u ON (r.iduser = u.iduser)  INNER JOIN `users` c ON (r.company = c.iduser)  WHERE  r.status = :status AND r.company = :company ORDER BY create_at desc");
            $this->db->bind(':status', "active");
            $this->db->bind(':company', $data['company']);
            return $this->db->setRecords($data['fetch']);
        }

        public function insertRecord($data)
        {
            $this->db->query("INSERT INTO results ( description, pdf,  iduser, company) VALUES (:description, :pdf, :iduser, :company)");
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':iduser', $data['user']);
            $this->db->bind(':company', $data['company']);
            if($data['pdf']!=null){ $this->db->bind(':pdf', "pdf/".$data['user']."/".$data['rand'].$data['pdf']);}else{ $this->db->bind(':pdf', $data['pdf']);}
           
           if($this->db->execute()){return true;}else{return false;}
        }

        public function updateRecord($data)
        {
           $sql="UPDATE results SET  description = :description, iduser = :iduser, company = :company";
                if($data['pdf']!=null){$sql.=",pdf = :pdf";}
           $sql.=" WHERE idresult =:idresult";
            
            $this->db->query($sql);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':iduser', $data['user']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':idresult', $data['idresult']);
            if($data['pdf']!=null){ $this->db->bind(':pdf', "pdf/".$data['user']."/".$data['rand'].$data['pdf']);}
            if($this->db->execute()){return true;}else{return false;}
        }

        public function deleteRecord($data)
        {
            $this->db->query("UPDATE results SET  status = :status WHERE idresult = :idresult");
            $this->db->bind(':idresult', $data['idresult']);
            if($data['status']=='active'){$this->db->bind(':status', "inactive");}
            else{$this->db->bind(':status', "active");}
           if($this->db->execute()){return true;}else{return false;}
        }

    }