<?php


class usuarioController extends Controller 
{   
    public function registrar() {
        $dados = [];

        $estado = new Estado();
        $dados['estado'] = $estado->getAll();
    
        $this->loadView('usuarioRegistrar', $dados);
    }

    public function pegarcidades() {
        
    	if (isset($_POST['id_estado'])) {
            
    		$idEstado = $_POST['id_estado'];

    		$cidade = new Cidade();

    		$array = $cidade->getCidades($idEstado);

    		echo json_encode($array);
    		exit;
    	}

    }
}
