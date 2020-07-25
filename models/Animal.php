<?php
class Animal extends model 
{
     
    public function add($nome_animal, $identificacao, $data_nascimento, $id_especie, $raca, $sexo, $pelagem, $proprietario, $numero_microchip, $data_microchip, $local_implatacao)
    {     

        if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
  
          if (in_array($_FILES['arquivo']['type'], $permitidos)) {
              
              $url = md5(time().rand(0,999)). '.jpg';
  
              # Salvando arquivo no servidor
              move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/img/galeria/'.$url);
              # Salvando no banco de dados
          }
        }
        
        $sql = "INSERT INTO tbanimal (id_usuario, nome_animal, identificacao_animal, data_nascimento, id_especie, raca, sexo, pelagem, id_proprietario, microchip, data_implementacao, local_implementacao, url, data_registro) 
        VALUES(:id_usuario, :nome_animal, :identificacao_animal, :data_nascimento, :id_especie, :raca, :sexo, :pelagem, :id_proprietario, :microchip, :data_implementacao, :local_implementacao, :url, :data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', 1);
        $sql->bindValue(':nome_animal', $nome_animal);
        $sql->bindValue(':identificacao_animal', $identificacao);
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':id_especie', 1);
        $sql->bindValue(':raca', $raca);
        $sql->bindValue(':sexo', $sexo);
        $sql->bindValue(':pelagem', $pelagem);
        $sql->bindValue(':id_proprietario', $proprietario);
        $sql->bindValue(':microchip', $numero_microchip);
        $sql->bindValue(':data_implementacao', $data_microchip);
        $sql->bindValue(':local_implementacao', $local_implatacao);
        $sql->bindValue(':url', $url);
        $sql->bindValue(':data_registro', date('y-m-d')); 

        $sql->execute();

        if( $sql ) {
            return true;
        }
    }    
    
    public function getEspecifico($id){
        $array = array();
        $sql = "SELECT a.*, b.*, c.* FROM tbanimal a 
            INNER JOIN tbespecie b ON (b.id_especie = a.id_especie)
            INNER JOIN tbproprietario c ON (c.id_proprietario = a.id_proprietario)
        WHERE id_animal = ".$id."";
     
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }


    // Retorna todos os animais so o nome 
    public function getAllResumido() {
        $array = array();
        $sql = "SELECT id_animal, nome_animal, url FROM tbanimal";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    // Retorna todos os animais
    public function getAll() {
        $array = array();
        $sql = "SELECT * FROM tbanimal";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

} 
