<?php


    if(isset($_POST['submitForm'])){
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

        echo $response;
    }
?>