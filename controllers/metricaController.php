<?php

if(!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class metricaController extends Controller 
{   

    public function index()
    {   
        $breadcrumb = [
			'Início' => '',
			'Métrica do Animal' => 'false',
			'Listagem' => 'false'
        ];

        $animais = new Animal();
        
        // Paginação
        $offset = 0;
        $limit = 10;
        $total = $animais->getTotal();
        // total Paginas
        $dados['paginas'] = ceil($total/$limit);
        // Pagina Atual
        $dados['paginaAtual'] = 1;

        if(!empty($_GET['p'])) {
            $dados['paginaAtual'] = $_GET['p'];
        }

        $offset = ($dados['paginaAtual'] * $limit) - $limit;
        
        //Limitar os link antes depois
        $dados['max_links'] = 1;
        
        $dados['lista'] = $animais->getAllResumido($offset, $limit);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('metricaList', $dados);
    }

    public function detalhes($id)
    {   
        $breadcrumb = [
			'Início' => '',
			'Métrica do Animal' => 'metrica',
			'Detalhes' => 'false'
        ];

        $metrica = new Metrica();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $metrica->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('metricaDetalhes', $dados); 
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Metrica do Animal' => 'metrica',
			'Registrar' => 'false'
        ];

        $dados = [];
        
        $unMetrica = new MetricaUnidade();
        $dados['unMetrica'] = $unMetrica->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('metricaRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {   
        $altura_animal = str_replace(',', '.',str_replace('.', '', $_POST['altura_animal']));
        $id_metrica_unidade_altura = $_POST['id_metrica_unidade_altura'];
        $comprimento_animal = str_replace(',', '.',str_replace('.', '', $_POST['comprimento_animal']));
        $id_metrica_unidade_comprimento = $_POST['id_metrica_unidade_comprimento'];
        $data_medida = implode('-', array_reverse(explode('/', $_POST['data_medicao'])));
        $data_remedida = implode('-', array_reverse(explode('/', $_POST['data_remedicao'])));
     
        $metrica = new Metrica();
         
        if ($metrica->add($idAnimal, $altura_animal, $id_metrica_unidade_altura, $comprimento_animal, $id_metrica_unidade_comprimento, $data_medida, $data_remedida)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."metrica/detalhes/".$idAnimal);
        } 
    }

    public function deletar($idMetricaAnimal)
    {
      if (!empty($idMetricaAnimal)) {
        $metrica = new Metrica();
        $metrica->delete($idMetricaAnimal);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."metrica");
    }
    



    public function editar($idMetricaAnimal)
    {   
        $dados = array();
    
        if (!empty($idMetricaAnimal)) {
            
            $peso = new Metrica();
          
            // Usado para editar
            if (!empty($_POST['id_metrica_animal'])) {
                
                $idMetrica = $_POST['id_metrica_animal'];
                $altura_animal = str_replace(',', '.',str_replace('.', '', $_POST['altura_animal']));
                $id_metrica_unidade_altura = $_POST['id_metrica_unidade_altura'];
                $comprimento_animal = str_replace(',', '.',str_replace('.', '', $_POST['comprimento_animal']));
                $id_metrica_unidade_comprimento = $_POST['id_metrica_unidade_comprimento'];
                $data_medida = implode('-', array_reverse(explode('/', $_POST['data_medicao'])));
                $data_remedida = implode('-', array_reverse(explode('/', $_POST['data_remedicao'])));
        
                $peso->edit($idMetrica, $altura_animal, $id_metrica_unidade_altura, $comprimento_animal, $id_metrica_unidade_comprimento, $data_medida, $data_remedida);
                
                $_SESSION['msg'] = 'editado_sucesso';
                header("Location: ".BASE_URL."metrica");

            } else {
                
                $breadcrumb = [
                    'Início' => '',
                    'Métrica do Animal' => 'metrica',
                    'Editar' => 'false'
                ];

                $dados['info'] = $peso->getEspecificoDado($idMetricaAnimal);
                
                $unMetrica = new MetricaUnidade();
                $dados['unMetrica'] = $unMetrica->getAll();        
                
                if (isset($dados['info'][0]['id_metrica_animal'])) {
                    $this->setBreadCrumb($breadcrumb);
                    $this->loadTemplate("metricaEditar",$dados);
                } else {
                    // Mostrar que não foi encontrado OU JÁ EXCLUÍDO pois não há nada no banco de dados
                }
            }
            
        } else {
            header("Location: ".BASE_URL);
        }
    }

}