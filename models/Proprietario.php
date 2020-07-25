<?php
class Proprietario extends model 
{
    public function add($nome_proprietario, $sobrenome_proprietario, $data_nascimento, $contato, $email, $endereco_estado, $endereco_cidade, $endereco_bairro, $endereco_rua, $endereco_numero, $endereco_complemento, $endereco_referencia)
    {
        $sql = "INSERT INTO tbproprietario (id_usuario, nome_proprietario, sobrenome_proprietario, data_nascimento, contato, email, endereco_estado, endereco_cidade, endereco_bairro, endereco_rua, endereco_numero, endereco_complemento, endereco_referencia, data_registro) 
        VALUES(:id_usuario, :nome_proprietario, :sobrenome_proprietario, :data_nascimento, :contato, :email, :endereco_estado, :endereco_cidade, :endereco_bairro, :endereco_rua, :endereco_numero, :endereco_complemento, :endereco_referencia, :data_registro)";
     
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', 1);
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


    // Retorna todos os animais so o nome 
    public function getAllResumido() {
        $array = array();
        $sql = "SELECT id_proprietario, nome_proprietario, sobrenome_proprietario    FROM tbproprietario";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}