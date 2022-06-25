<?php

header("Access-Control-Allow-Origin: *");
include './conexion.php';


if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['password']))
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkSQL = "SELECT * FROM users WHERE email = '$email'";
    $check = mysqli_query($conexion, $checkSQL);
    if($check->num_rows > 0)
    {
        $data = [
            'success' => false,
            'message' => 'El correo ya está registrado'
        
        ];
        echo json_encode($data);
    }else
    {

    $sql = "INSERT INTO users (name, contact, address, email, password) VALUES ('$name', '$contact', '$address', '$email', '$password')";
    if (mysqli_query($conexion, $sql))
    {
        $data = [
            'success' => true,
            'message' => 'Usuario registrado correctamente'
        
        ];
    }
    else
    {
        $data = [
            'success' => false,
            'message' => 'Registro fallido'
        
        ];
    }
    echo json_encode($data);
    }
}
else{
    $data = [
        'success' => false,
        'message' => 'Faltan datos'
    ];
    echo json_encode($data);
}
