<?php

    include("connect_db.php");

    $reponse = array(
        "message"=>"Une erreur inhabituelle a ete rencontree",
        "type"=>"danger"
    );

    $email = $_POST['email']; 
    $password = sha1($_POST['password']);

    if ($email == "" || $password == ""){

        $reponse = array(
            "message"=>"Toutes les informations sont obligatoires.",
            "type"=>"danger"
        );

    }else{


        $stmt = $conn->prepare("SELECT id, name, email FROM student WHERE email=:email and password=:password");
        $stmt->execute(['email' => $email, 'password' => $password]); 
        $student = $stmt->fetch();
    
        if (isset($student['id']) && isset($student['name']) && isset($student['email'])){
    

            $stmt = $conn->prepare("SELECT COUNT(*) FROM attendance WHERE iduser=:iduser and datesign=:datesign");
            $stmt->execute(['iduser' => $student['id'], 'datesign' => date("Y-m-d")]); 
            $nbre_connexion = $stmt->fetch()[0];

            if($nbre_connexion == 0){

                $sql = "INSERT INTO attendance (iduser, datesign, time) VALUES (?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$student['id'], date("Y-m-d"), date("H:i:s")]);
        
                $reponse = array(
                    "message"=>"Hello " . $student['name'] . ", Vous etes actuellement connecte",
                    "type"=>"success"
                );

            }elseif ($nbre_connexion == 1){

                $reponse = array(
                    "message"=>"Desole " . $student['name'] . ", Vous avez atteint votre cota journalier de connexion",
                    "type"=>"danger"
                );

            }
        
        }
        else{
    
            $reponse = array(
                "message"=>"Les informations renseignees sont incorrectes",
                "type"=>"danger"
            );
        
        }
    }

    echo json_encode($reponse);

?>