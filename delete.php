<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    if(!$_GET['id']){

        include 'includes/errormessage.php';
         header('Location: viewrecords.php');

    }else{
        $id = $_GET['id'];

        $result = $crud->deleteInvitee($id);
        if($result)
        {
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }

    }
?>

