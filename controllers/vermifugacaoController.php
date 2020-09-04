<?php
class vermifugacaoController extends Controller 
{   
    public function index() 
    {   
        $breadcrumb = [
			'Início' => '',
			'Vermifugação' => 'false',
			'Listagem' => 'false'
        ];

        $dados = [];

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
        $this->loadTemplate('vermifugacaoList', $dados);
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Vermifugação' => 'vermifugacao',
			'Registrar' => 'false'
        ];

        $dados = [];

        $unPeso = new PesoUnidade();
        $dados['unPeso'] = $unPeso->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('vermifugacaoRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {
        $id_animal = $idAnimal;
        $nome_produto = $_POST['nome_produto'];
        $dose = str_replace(',', '.',str_replace('.', '', $_POST['dose']));
        $peso_animal = $_POST['peso_animal'];
        $id_peso_unidade = $_POST['id_peso_unidade'];
        $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
        $data_prox_dose = implode('-', array_reverse(explode('/', $_POST['data_prox_dose'])));
        $nome_veterinario = $_POST['nome_veterinario'];
        $registro_crmv = $_POST['registro_crmv'];

        $vermifugacao = new Vermifugacao();
         
        if ($vermifugacao->add($id_animal, $nome_produto, $dose, $peso_animal, $id_peso_unidade, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."vermifugacao/detalhes/".$id_animal);
        } 
    }

    public function detalhes($id)
    {   
        $breadcrumb = [
			'Início' => '',
			'Vermifugação' => 'vermifugacao',
			'Detalhes' => 'false'
        ];
        
        $animal = new Animal();
        $vermifugacao = new Vermifugacao();
        
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $vermifugacao->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('vermifugacaoDetalhes', $dados);
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $vermifugacao = new Vermifugacao();
          $vermifugacao->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."vermifugacao");
    }

    public function editar($idVermifugacao)
    {   
        $dados = array();
    
        if (!empty($idVermifugacao)) {
            
            $vermifugacao = new Vermifugacao();
          
            // Usado para editar
            if (!empty($_POST['id_vermifugacao'])) {
                
                $nome_produto = $_POST['nome_produto'];
                $dose = $_POST['dose'];
                $id_peso_unidade = $_POST['id_peso_unidade'];
                $peso = str_replace(',', '.',str_replace('.', '', $_POST['dose']));
                $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
                $data_prox_dose = implode('-', array_reverse(explode('/', $_POST['data_prox_dose'])));
                $nome_veterinario = $_POST['nome_veterinario'];
                $registro_crmv = $_POST['registro_crmv'];

                $vermifugacao->edit($idVermifugacao, $nome_produto, $dose, $peso, $id_peso_unidade, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv);
                
                $_SESSION['msg'] = 'editado_sucesso';
                header("Location: ".BASE_URL."vermifugacao");

            } else {
                
                $breadcrumb = [
                    'Início' => '',
                    'Vermifugação' => 'vermifugacao',
                    'Editar' => 'false'
                ];

                $dados['info'] = $vermifugacao->getEspecificoDado($idVermifugacao);
                
                $unPeso = new PesoUnidade();
                $dados['unPeso'] = $unPeso->getAll();        
                
                if (isset($dados['info'][0]['id_vermifugacao'])) {
                    $this->setBreadCrumb($breadcrumb);
                    $this->loadTemplate('vermifugacaoEditar',$dados);
                }
            }
            
        } else {
            header("Location: ".BASE_URL);
        }
    }
}