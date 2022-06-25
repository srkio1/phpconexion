<?php

header("Access-Control-Allow-Origin: *");
include './conexion.php';

if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM todos WHERE user_id = '$user_id'";
    $result = mysqli_query($conexion, $sql);
    
    $todos = [];
    while ($row[] = mysqli_fetch_assoc($result)) {
        $todos = $row;
    }
    echo json_encode($todos);
}else {
    $data = [
        'success' => false,
        'message' => 'Faltan datos'
    ];
    echo json_encode($data);
}