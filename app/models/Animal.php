<?php
class Animal extends model 
{
     
    public function add($nome_animal, $identificacao, $data_nascimento, $id_especie, $id_raca, $sexo, $pelagem, $proprietario, $flag_castrado, $flag_filhotes, $numero_microchip, $data_microchip, $local_implatacao)
    {     

        if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
  
          if (in_array($_FILES['arquivo']['type'], $permitidos)) {
              
            $url = md5(time().rand(0,999)). '.jpg';
            
            $maxDimW = 200;
            $maxDimH = 300;

            list($width, $height, $type, $attr) = getimagesize( $_FILES['arquivo']['tmp_name'] );
            
            if ( $width > $maxDimW || $height > $maxDimH ) {
                $target_filename = 'assets/img/galeria/'.$url;
                $fn = $_FILES['arquivo']['tmp_name'];
                $size = getimagesize( $fn );
                $ratio = $size[0]/$size[1];
                if( $ratio > 1) {
                    $width = $maxDimW;
                    $height = $maxDimH/$ratio;
                } else {
                    $width = $maxDimW*$ratio;
                    $height = $maxDimH;
                }
            }

            $src = imagecreatefromstring(file_get_contents($fn));
            $dst = imagecreatetruecolor( $width, $height );
            
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
        
            imagejpeg($dst, $target_filename);

            # Salvando arquivo no servidor
            //move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/img/galeria/'.$url);
          }
        }
        
        $sql = "INSERT INTO tbanimal (id_usuario, nome_animal, identificacao_animal, data_nascimento, id_especie, id_raca, sexo, pelagem, id_proprietario, flag_castrado, flag_filhotes, microchip, data_implantacao, local_implantacao, url, data_registro) 
        VALUES(:id_usuario, :nome_animal, :identificacao_animal, :data_nascimento, :id_especie, :id_raca, :sexo, :pelagem, :id_proprietario, :flag_castrado, :flag_filhotes, :microchip, :data_implantacao, :local_implantacao, :url, :data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $_SESSION['id_usuario']);
        $sql->bindValue(':nome_animal', $nome_animal);
        $sql->bindValue(':identificacao_animal', $identificacao);
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':id_especie', $id_especie);
        $sql->bindValue(':id_raca', $id_raca);
        $sql->bindValue(':sexo', $sexo);
        $sql->bindValue(':pelagem', $pelagem);
        $sql->bindValue(':id_proprietario', $proprietario);
        $sql->bindValue(':flag_castrado', $flag_castrado);
        $sql->bindValue(':flag_filhotes', $flag_filhotes);
        $sql->bindValue(':microchip', $numero_microchip);
        $sql->bindValue(':data_implantacao', $data_microchip);
        $sql->bindValue(':local_implantacao', $local_implatacao);
        $sql->bindValue(':url', $url);
        $sql->bindValue(':data_registro', date('y-m-d')); 

        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }    
    
    public function getEspecifico($id)
    {
        $array = array();
        $sql = "SELECT a.data_nascimento as nascimento_animal, a.*, b.*, c.*, d.* FROM tbanimal a 
            INNER JOIN tbespecie b ON (b.id_especie = a.id_especie)
            INNER JOIN tbproprietario c ON (c.id_proprietario = a.id_proprietario)
            INNER JOIN tbraca d ON (d.id_raca = a.id_raca)
        WHERE id_animal = ".$id." AND a.id_usuario = ".$_SESSION['id_usuario']."";
     
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }


    // Retorna todos os animais so o nome 
    public function getAllResumido($offset, $limit)
    {
        $array = array();
        $sql = "SELECT id_animal, nome_animal, url FROM tbanimal WHERE id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0 LIMIT ".$offset.", ".$limit."";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    // Retonra a quantidade total de registros para paginar
    public function getTotal() 
    {
        $sql = "SELECT count(*) as c FROM tbanimal WHERE id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();

        return $sql['c'];
    }

    public function getAll()
    {
        $array = array();
        $sql = "SELECT * FROM tbanimal WHERE id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function count()
    {
        $array = array();
        $sql = "SELECT count(*) as qtd FROM tbanimal WHERE id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    # Usado em relatório 
	public function listarReport($proprietario)
	{   
        $array = array();
       
		$sql = "SELECT a.*, b.* FROM tbanimal a
			INNER JOIN tbproprietario b ON (b.id_proprietario = a.id_proprietario)
		WHERE a.id_usuario = ".$_SESSION['id_usuario']."
        AND b.id_proprietario IN(".implode(',', $proprietario).") AND a.flag_excluido = 0";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
    }
    
    public function delete($id)
    {
        $sql = "UPDATE tbanimal SET flag_excluido = :flag_excluido WHERE id_animal = :id_animal AND id_usuario = ".$_SESSION['id_usuario']."";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_animal', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }



    // Retorna Métrica especifico para editar
    public function getEspecificoDado($idAnimal)
    {
        $array = array();
        $sql = "SELECT * FROM tbanimal WHERE id_animal = ".$idAnimal." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function edit($idMetrica, $altura_animal, $id_metrica_unidade_altura, $comprimento_animal, $id_metrica_unidade_comprimento, $data_medida, $data_remedida)
    {   
        $sql = "UPDATE tbmetrica_animal SET altura = :altura, id_metrica_unidade_altura = :id_metrica_unidade_altura, comprimento = :comprimento, id_metrica_unidade_comprimento = :id_metrica_unidade_comprimento, data_medida = :data_medida, data_remedida = :data_remedida
        WHERE id_metrica_animal = :id_metrica_animal AND id_usuario = ".$_SESSION['id_usuario']."";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_metrica_animal', $idMetrica);
        $sql->bindValue(':altura',$altura_animal);
        $sql->bindValue(':id_metrica_unidade_altura', $id_metrica_unidade_altura);
        $sql->bindValue(':comprimento',$comprimento_animal);
        $sql->bindValue(':id_metrica_unidade_comprimento', $id_metrica_unidade_comprimento);
        $sql->bindValue(':data_medida',$data_medida);
        $sql->bindValue(':data_remedida',$data_remedida);
  
        if ($sql->execute()) {  
            //$count = $sql->rowCount();
            //echo $count . ' rows updated properly!';
            return true;
        } else {
            return false;
            //print_r($sql->errorInfo());
        }
    }
} 
