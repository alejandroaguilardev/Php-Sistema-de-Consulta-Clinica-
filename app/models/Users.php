<?php
	class Users {
        private $db;

        public function __construct(){
            $this->db = new DataBase;
        }

        public function getRecords($data)
        {
            $this->db->query("SELECT u.iduser, u.name,u.dni, u.email, u.avatar, u.idrol,u.status, u.create_at, u.update_at, r.name rol FROM `users` u  INNER JOIN `rols` r ON (u.idrol = r.idrol)  WHERE status = :status");
            $this->db->bind(':status', 'active');
            return $this->db->setRecords($data['fetch']);
        }

        public function getRecordsUsers($data)
        {
            $this->db->query("SELECT u.iduser, u.name,u.dni, u.email, u.avatar, u.idrol,u.status, u.create_at, u.update_at, r.name rol FROM `users` u  INNER JOIN `rols` r ON (u.idrol = r.idrol)  WHERE status = :status  AND u.idrol = :idrol");
            $this->db->bind(':status', 'active');
            $this->db->bind(':idrol', 2);
            return $this->db->setRecords($data['fetch']);
        }
        public function count(){
            $this->db->query("SELECT * FROM users WHERE status= :status");
            $this->db->bind(':status', 'active');
            $this->db->setRecords(0);
            return $this->db->rowCount();
        }

         public function getRecord($data)
         {
            $this->db->query("SELECT  u.iduser, u.name,u.dni, u.email, u.avatar, u.idrol,u.status, u.create_at, u.update_at, r.name rol  FROM users u  INNER JOIN `rols` r ON (u.idrol = r.idrol) WHERE dni = :dni AND status = :status");
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':status', 'active');
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }
        public function getRecordID($data)
         {
            $this->db->query("SELECT  u.iduser, u.name,u.dni, u.email, u.avatar, u.idrol,u.status, u.create_at, u.update_at, r.name rol  FROM users u  INNER JOIN `rols` r ON (u.idrol = r.idrol) WHERE iduser = :iduser AND status = :status");
            $this->db->bind(':iduser', $data['iduser']);
            $this->db->bind(':status', 'active');
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }
         public function getRecordIDPass($data)
         {
            $this->db->query("SELECT  password   FROM users  WHERE iduser = :iduser AND status = :status");
            $this->db->bind(':iduser', $data['iduser']);
            $this->db->bind(':status', 'active');
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }
         public function getRecordDNIPass($data)
         {
            $this->db->query("SELECT  password, email  FROM users  WHERE dni = :dni AND status = :status");
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':status', 'active');
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }
        public function getRecordRestore($data)
         {
            $this->db->query("SELECT  u.iduser, u.name,u.dni, u.email, u.avatar, u.idrol,u.status, u.create_at, u.update_at, r.name rol  FROM users u  INNER JOIN `rols` r ON (u.idrol = r.idrol) WHERE email = :email AND status = :status");
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':status', 'active');
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }

         public function getRecordsRols($data)
         {
            $this->db->query("SELECT * FROM rols");
            return $this->db->setRecords($data['fetch']);
        }

        public function insertRecord($data)
        {
            $this->db->query("INSERT INTO users ( name,dni, email, password, idrol, status) VALUES (:name, :dni, :email, :password, :idrol, :status)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':idrol', $data['idrol']);
            $this->db->bind(':status', 'active');
           
           if($this->db->execute()){return true;}else{return false;}
        }


        public function updateRecord($data)
        {
            if(empty($data['password'])){ 
                $this->db->query("UPDATE users SET  dni = :dni, name = :name, email = :email, idrol = :idrol WHERE iduser = :iduser ");
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':dni', $data['dni']);
                $this->db->bind(':idrol', $data['idrol']);
                $this->db->bind(':iduser', $data['iduser']);
            }else{
                $this->db->query("UPDATE users SET  name = :name, dni = :dni, email = :email, password = :password, idrol = :idrol WHERE iduser = :iduser");
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':dni', $data['dni']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':idrol', $data['idrol']);
                $this->db->bind(':iduser', $data['iduser']);
            }
           if($this->db->execute()){return true;}else{return false;}
        }

        public function updateRecordPasswordID($data)
        {
            $this->db->query("UPDATE users SET  password = :password WHERE iduser = :iduser");
            $this->db->bind(':iduser', $data['iduser']);
            $this->db->bind(':password', $data['password']);
           if($this->db->execute()){return true;}else{return false;}
        }

        public function updateRecordPassword($data)
        {
            $this->db->query("UPDATE users SET password = :password WHERE dni = :dni");
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':password', $data['password']);
           if($this->db->execute()){return true;}else{return false;}
        }

        public function deleteRecord($data)
        {
            $this->db->query("UPDATE users SET  status = :status WHERE dni = :dni");
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':status', 'inactive');
           if($this->db->execute()){return true;}else{return false;}
        }

        /*
         *SESION
        */
        public function login ($data)
        {
            $this->db->query("SELECT u.iduser, u.name, u.dni, u.email, r.name rol, u.password , u.idrol FROM `users` u  INNER JOIN `rols` r ON (u.idrol = r.idrol) WHERE u.dni = :dni and u.password =  :password and u.idrol =  :idrol and u.status = :status LIMIT 1");
            $this->db->bind(':dni', $data['dni']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':idrol', $data['rol'], $data['rol']);
            $this->db->bind(':status', 'active');
            if($record=$this->db->setRecord($data['fetch'])){
                return $record;
            }else{
                return false;
            }
        }

        public function restore ($data,$password)
        {
            $this->db->query("UPDATE users SET  password = :password WHERE email = :email ");
            $this->db->bind(':email', $data);
            $this->db->bind(':password', $password);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }