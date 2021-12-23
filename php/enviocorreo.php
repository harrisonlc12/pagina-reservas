<?php
//Llamado de librerias
  require 'PHPMailer/PHPMailerAutoload.php';
 
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP(); // Protocolo de envío
 
//Configuracion servidor mail
$mail->From = "harrisonlc12347@gmail.com"; //Correo del Remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //Protocolo de seguridad
$mail->Host = "smtp.gmail.com"; // Servidor smtp
$mail->Port = 587; //Puerto de envío
$mail->Username ='martha@serviautec.com'; //Nombre usuario Remitente
$mail->Password = 'martha123'; //Contraseña
$to = "email";
$email_subject = "Reserva hotel — Reservallín";
$email_address = "martha@serviautec.com";
 
//Agregar correo destinatario
$mail->AddAddress($_POST['email']);
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
 
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Correo enviado correctamente");
        </script>';
} else {
    echo'<script type="text/javascript">
           alert("Error en el envío, intentar de nuevo");
        </script>';
}