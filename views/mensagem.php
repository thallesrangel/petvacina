<?php

if(isset($_SESSION['msg'])){

    switch($_SESSION['msg']) {

        case "id_nao_encontrado":
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Aviso',
                text: 'Não há informações para este ID.'
            })  
            </script>";
                
            
        case "registrado": 
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso ',
                text: 'Registrado com sucesso'
            })  
            </script>";   
            break;

        case "deletado": 
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso ',
                text: 'Registro excluído'
            })  
            </script>";   
            break;

        case "email_ou_senha_incorreto":
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'E-mail ou senha incorreto'
            })  
            </script>";  
            break;

        case "email_utilizado":
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Aviso',
                text: 'E-mail já utilizado'
            })  
            </script>";  
            break;

        case "report_sem_post":
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Aviso',
                text: 'Necessário preencher para gerar o relatório'
            })  
            </script>";

        case "editado_sucesso":
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: 'Registro alterado com sucesso.'
            })  
            </script>";
            
            
    }
}
?>