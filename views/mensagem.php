<?php

if(isset($_SESSION['msg'])){

    switch($_SESSION['msg']) {
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
    }
}
?>