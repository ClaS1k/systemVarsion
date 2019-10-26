<?php

function route($method, $urlData, $formData) {
    if ($method === 'POST') {
        $isError=false;
        $content=array();
        if (strlen($formData['name'])<2){
            $content['name']="Имя не указано или слишком короткое!";
            $isError=true;
        }
        if (strlen($formData['surname'])<2){
            $content['surname']="Фамилия не указана или слишком коротка!";
            $isError=true;
        }
        if (strlen($formData['e_mail'])<4){
            $content['e_mail']="Почта не указана!";
            $isError=true;
        }
        if (strlen($formData['password'])<6){
            $content['password']="Пароль не указан!";
            $isError=true;
        }
        if ($isError){
            header('HTTP/1.0 422 Unprocessable entity');
            echo json_encode($content);
            exit();
        }
        $name=$formData['name'];
        $surname=$formData['surname'];
        $e_mail=$formData['e_mail'];
        $password=password_hash($formData['password'], PASSWORD_DEFAULT);
        require "connect_db.php";
        $sql="SELECT * FROM `users` WHERE `email`='$e_mail'";
        if (mysqli_num_rows(mysqli_query($dbc, $sql))>0){
            $content['e_mail']="Почта уже занята!";
            header('HTTP/1.0 422 Unprocessable entity');
            echo json_encode($content);
            exit();
        }
        $sql="SELECT * FROM `users`";
        $user_id=mysqli_num_rows(mysqli_query($dbc, $sql))+1;
        $sql="INSERT INTO `users`(`id`, `name`, `surname`, `email`, `password`) VALUES ('$user_id','$name','$surname','$e_mail','$password')";
        mysqli_query($dbc, $sql);
        header('HTTP/1.0 201 Created');
        $content['status_code']=201;
        $content['status_text']="Succesfull creation";
        echo json_encode($content);
        return;
    }        
}
?>