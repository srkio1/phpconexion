<?php

header("Access-Control-Allow-Origin: *");
include './conexion.php';

if(isset($_POST['id']) && isset($_POST['user_id'])){
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM todos WHERE id = '$id' and  user_id = '$user_id'";
    $result = mysqli_query($conexion, $sql);
    if($result){
        $data = [
            'success' => true,
            'message' => 'Todo eliminado correctamente'
        ];
    }
    else{
        $data = [
            'success' => false,
            'message' => 'Error al eliminar la nota'
        ];
        echo json_encode($data);
    }
}else{
    $data = [
        'success' => false,
        'message' => 'Faltan datos'
    ];
    echo json_encode($data);
}