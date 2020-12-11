<?php
class Proprietario extends model 
{
    public function add($id_usuario, $nome_proprietario, $sobrenome_proprietario, $data_nascimento, $contato, $email, $endereco_estado, $endereco_cidade, $endereco_bairro, $endereco_rua, $endereco_numero, $endereco_complemento, $endereco_referencia)
    {
        $sql = "INSERT INTO tbproprietario (id_usuario, nome_proprietario, sobrenome_proprietario, data_nascimento, contato, email, id_estado, id_cidade, endereco_bairro, endereco_rua, endereco_numero, endereco_complemento, endereco_referencia, data_registro) 
        VALUES(:id_usuario, :nome_proprietario, :sobrenome_proprietario, :data_nascimento, :contato, :email, :endereco_estado, :endereco_cidade, :endereco_bairro, :endereco_rua, :endereco_numero, :endereco_complemento, :endereco_referencia, :data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $id_usuario);
        $sql->bindValue(':nome_proprietario', $nome_proprietario);
        $sql->bindValue(':sobrenome_proprietario', $sobrenome_proprietario);
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':contato', $contato);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':endereco_estado', $endereco_estado);
        $sql->bindValue(':endereco_cidade', $endereco_cidade);
        $sql->bindValue(':endereco_bairro', $endereco_bairro);
        $sql->bindValue(':endereco_rua', $endereco_rua);
        $sql->bindValue(':endereco_numero', $endereco_numero);
        $sql->bindValue(':endereco_complemento', $endereco_complemento);
        $sql->bindValue(':endereco_referencia', $endereco_referencia);
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

    public function getAllResumido()
    {
        $array = array();
        $sql = "SELECT id_proprietario, nome_proprietario, sobrenome_proprietario, email FROM tbproprietario WHERE id_usuario = ". $_SESSION['id_usuario']." AND flag_excluido = 0 ORDER BY id_proprietario DESC";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAll()
    {
        $array = array();
        $sql = "SELECT a.*, b.*, c.* FROM tbproprietario a
            INNER JOIN tbestado b ON (b.id_estado = a.id_estado)
            INNER JOIN tbcidade c ON (c.id_cidade = a.id_cidade)
        WHERE a.id_usuario = ". $_SESSION['id_usuario']." AND a.flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function delete($id)
    {
        $sql = "UPDATE tbproprietario SET flag_excluido = :flag_excluido WHERE id_proprietario = :id_proprietario";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_proprietario', $id, PDO::PARAM_INT);
        $sql->bindValue(':flag_excluido', '1', PDO::PARAM_INT);
        $sql->execute();
    }

    // Retorna anticio especifico para editar
    public function getEspecificoDado($idProprietario)
    {
        $array = array();
        $sql = "SELECT * FROM tbproprietario WHERE id_proprietario = ".$idProprietario." AND id_usuario = ".$_SESSION['id_usuario']." AND flag_excluido = 0";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function edit($id_proprietario, $nome_fornecedor, $id_fornecedor_tipo)
    {   
        $sql = "UPDATE tbproprietario SET nome_fornecedor = :nome_fornecedor, id_fornecedor_tipo = :id_fornecedor_tipo WHERE id_fornecedor = :id_fornecedor";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_proprietario', $id_fornecedor);
        $sql->bindValue(':nome_fornecedor',$nome_fornecedor);
        $sql->bindValue(':id_fornecedor_tipo', $id_fornecedor_tipo);

  
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