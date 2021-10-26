<?php
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
      }

      if(!$user){
        session_start();
        $_SESSION['empty']  = "Task Name is Required";
        header('Location:index.php');

    }else{
        $connection = mysqli_connect('localhost','root','','todo_list');
        $insert = "INSERT INTO todos(username)VALUES('$user')";
        $store = mysqli_query($connection,$insert);
        if($store){
            session_start();
            $_SESSION['output']  = "Stored Succesfully";
            header('Location:index.php');
        }else{
            echo "Not Stored";
        }
    }

?>