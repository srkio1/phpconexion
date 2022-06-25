<?php

header("Access-Control-Allow-Origin: *");
include './conexion.php';

if(isset($_POST['user_id']) && isset($_POST['title']) && isset($_POST['description'])){
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d');

    $sql = "INSERT INTO todos (user_id, title, description, date)
     VALUES ('$user_id', '$title', '$description', '$date')";
    $result = mysqli_query($conexion, $sql);
    if ($result) {
        $data = [
            'success' => true,
            'message' => 'Todo añadido correctamente'
        ];
    } else {
        $data = [
            'success' => false,
            'message' => 'Error al añadir el todo'
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