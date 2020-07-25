<?php
    class Contatos extends model 
    {
        public function getAll() {
        $array = array();
        $sql = "SELECT * FROM contatos";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
        }

        public function add($nome,$email)
        {
            if($this->emailExistis($email) == false) {
                $sql = "INSERT INTO contatos (nome,email) VALUES(:nome,:email)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();

               return true;

            }  else {
                return false;
            } 
        }

        private function emailExistis($email)
        {
            $sql = "SELECT * from contatos WHERE email = :email";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function delete($id)
        {
            $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }


        public function get($id) {
          
            $array = array();
           
            $sql = "SELECT * FROM contatos WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
     
            return $array;
            
        }

        public function edit($nome, $id)
        {   
            $sql = "UPDATE contatos SET nome = :nome WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome',$nome);
            $sql->bindValue(':id',$id);
            $sql->execute();
        }
    } 
?>