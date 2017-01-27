<?php
$errors = [];

if(!array_key_exists('nom',$_POST) || $_POST['nom'] =='nom'){
    $errors['nom'] = "Vous n'avez pas renseigné votre nom.";
}
if(!array_key_exists('email',$_POST) || $_POST['email'] =='' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Vous n'avez pas renseigné un email valide.";
}
if(!array_key_exists('objet',$_POST) || $_POST['objet'] =='objet'){
    $errors['object'] = "Vous n'avez pas renseigné l'objet.";
}
if(!array_key_exists('message',$_POST) || $_POST['message'] =='message...'){
    $errors['message'] = "Vous n'avez rien écrit.";
}
session_start();
if(!empty($errors)){

    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: envoi_mail.php');

}else{

    $_SESSION['success'] = 1;
    $to = 'app.g1d.2019@gmail.com';
    $message = $_POST['message'];
    $headers = 'From:'.$_POST['email'];
    $nom = 'nom'.$_POST['nom'];
    $object = 'objet :'.$_POST['objet'];

    //mail($to, $subject, $message, $headers);
    $finalMessage = "nom :   " . $_POST['nom'] . "\n";
    $finalMessage .= "email :  " . $_POST['email'] . "\n";
    $finalMessage .= "objet :  " . $_POST['objet'] . "\n";
    $finalMessage .= "message :  " . $_POST['message'] . "\n";

    mail($to, 'Formulaire de contact',  $finalMessage, $headers);
    header('Location: envoi_mail.php');

}