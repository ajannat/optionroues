<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// sudo apt install composer
// composer require phpmailer/phpmailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients    // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    // if(isset($_POST['submitForm'])){
        $prenom=$_POST['prenom'];
        $marque=$_POST['marque'];
        $modele=$_POST['modele'];
        $annee=$_POST['annee'];
        $numero=$_POST['numero'];
        $revisionDate=$_POST['revisionDate'];
        $kilometer=$_POST['kilometer'];
        if(!empty($_POST['pneusMauvais'])) $pneus=$_POST['pneusMauvais'];
        if(!empty($_POST['pneusBon'])) $pneus=$_POST['pneusBon'];
        if(!empty($_POST['pneusExcellent'])) $pneus=$_POST['pneusExcellent'];
        if(!empty($_POST['plaquettesMauvais'])) $plaquettes=$_POST['plaquettesMauvais'];
        if(!empty($_POST['plaquettesBon'])) $plaquettes=$_POST['plaquettesBon'];
        if(!empty($_POST['plaquettesExcellent'])) $plaquettes=$_POST['plaquettesExcellent'];
        if(!empty($_POST['signalisationMauvais'])) $signalisation=$_POST['signalisationMauvais'];
        if(!empty($_POST['signalisationBon'])) $signalisation=$_POST['signalisationBon'];
        if(!empty($_POST['signalisationExcellent'])) $signalisation=$_POST['signalisationExcellent'];
        
        $serviceslist = $_POST['services'];
        $services = implode (", ", $serviceslist);
        
        $autre=$_POST['autre'];
        if(!empty($autre)) $services.=', '.$autre;
        $travaux=$_POST['travaux'];
        $egalement=$_POST['egalement'];
        $postal=$_POST['postal'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];

        $response = "Nom et prénom: ".$prenom."<br>"
                    ."Marque du véhicule: ".$marque."<br>"
                    ."Modèle du véhicule: ".$modele."<br>"
                    ."Année du véhicule: ".$annee."<br>"
                    ."Numéro de série de véhicule inscrit sur la carte grise: ".$numero."<br>"
                    ."Date de la dernière révision: ".$revisionDate."<br>"
                    ."Kilométrage du véhicule: ".$kilometer."<br>"
                    ."État du véhicule: <br>"
                    ."Pneus: ".$pneus."<br>"
                    ."Plaquettes: ".$plaquettes."<br>"
                    ."Signalisation: ".$signalisation."<br>"
                    ."Type de prestation désirée: ".$services."<br>"
                    ."Pour les travaux plus important, la réparation a lieu dans notre atelier. Nous récupérons le véhicule ou la pièce, et une fois la prestation terminée, nous vous livrons directement votre bien. Choisir: ".$travaux."<br>"
                    ."Nous proposons également une prestation forfait assistance weekend (courses moto, motocross, autres...). Seriez-vous intéressé par cette prestation et connaître le prix du forfait? ".$egalement."<br>"
                    ."Ville et code postal: ".$postal."<br>"
                    ."Numéro de téléphone: ".$phone."<br>"
                    ."Adresse e-mail: ".$email."<br>";
    // }
    $mail->setFrom($email, $prenom);
    $mail->addAddress('salome.bastrios@gmail.com', 'Salome Bastrios'); 
    $mail->addReplyTo($email, $prenom);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Formulaire demande de devis '.$prenom;
    $mail->Body    = $response;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $result = $mail->send(); 
    echo $result;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>