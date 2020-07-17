<?php

    include("connect_db.php");

    $reponse = array(
        "message"=>"Une erreur inhabituelle a ete rencontree",
        "type"=>"danger"
    );

    $name = $_POST['name'];
    $email = $_POST['email']; 
    $password = sha1($_POST['password']);

    if ($name == "" || $email == "" || $password == ""){

        $reponse = array(
            "message"=>"Toutes les informations sont obligatoires.",
            "type"=>"danger"
        );

    }else{


        $stmt = $conn->prepare("SELECT COUNT(*) FROM student WHERE email=:email");
        $stmt->execute(['email' => $email]); 
        $nbre_student = $stmt->fetch()[0];
    
        if ($nbre_student == 0){
    
            $sql = "INSERT INTO student (password, email, name) VALUES (?,?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$password, $email, $name]);
    
            $reponse = array(
                "message"=>"enregistrement effectue avec succes",
                "type"=>"success"
            );
        
        }
        elseif ($nbre_student == 1){
    
            $reponse = array(
                "message"=>"L'utilisateur existe deja dans la base de donnee",
                "type"=>"danger"
            );
        
        }
    }

    echo json_encode($reponse);

?>