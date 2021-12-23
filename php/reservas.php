<?php require("PHPMailer/PHPMailerAutoload.php");

// ADD your Email and Name
$recipientEmail='harrisonlc12347@gmail.com';
$recipientName='Reservallin ';

//collect the POSTed variables into local variables before calling $mail = new mailer
$hotel = $_POST['hotel'];
$habitacion = $_POST['habitacion'];
$adultos = $_POST['adultos'];
$ninos = $_POST['ninos'];
$fechaentrada = $_POST['fechaentrada'];
$fechasalida = $_POST['fechasalida'];
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$Name = '[Reservallin]';
$Subject = 'Nueva Reserva de ' . $hotel;
//Create a new PHPMailer instance
$mail = new PHPMailer(true);

//Set who the message is to be sent from
$mail->setFrom($recipientEmail, $recipientName);
//Set an alternative reply-to address
$mail->addReplyTo($recipientEmail,$recipientName);
//Set who the message is to be sent to
$mail->addAddress($recipientEmail, $nombre );
//Set the subject line
$mail->Subject = $Subject;

//$mail-&gt;AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);
$mail->AddAddress($recipientEmail, $recipientName);

//$mail-&gt;AddAttachment("images/phpmailer.gif"); // attachment
//$mail-&gt;AddAttachment("images/phpmailer_mini.gif"); // attachment

//now make those variables the body of the emails

$mail->Body="
Hotel: $hotel<br/>
Tipo de Habitación: $habitacion <br/>
Adultos: $adultos<br/>
Niños: $ninos<br/>
Fecha de Entrada: $fechaentrada<br/>
Fecha de Salida: $fechasalida<br/>
Nombre: $nombre<br/>
Teléfono: $celular<br/>
Email: $email<br/>
-----------------------";

if(!$mail->Send()) {
	echo '<div class="alert alert-danger" role="alert">Error: '. $mail->ErrorInfo.'</div>';
} else {
	echo '<div class="alert alert-success" role="alert">Gracias, Nos pondremos en contacto contigo..</div>';
}
?>