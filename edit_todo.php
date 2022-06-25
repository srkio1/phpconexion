<?php

header("Access-Control-Allow-Origin: *");
include './conexion.php';

if(isset($_POST['id']) && isset($_POST['user_id']) && isset($_POST['title']) && isset($_POST['description'])){
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE todos SET title = '$title', description = '$description' WHERE id = '$id' and  user_id = '$user_id'";
    $result = mysqli_query($conexion, $sql);
    if($result){
        $data = [
            'success' => true,
            'message' => 'Todo actualizado correctamente'
        ];
    }
    else{
        $data = [
            'success' => false,
            'message' => 'Error al actualizar la nota'
        ];
    }
    echo json_encode($data);
}else{
    $data = [
        'success' => false,
        'message' => 'Faltan datos'
    ];
    echo json_encode($data);
}