 <?php

// require('../../../controllers/controller.php');
// require('../../../models/crud.php');

// Only process POST reqeusts.
if (isset($_POST["email"])) {
    // Get the form fields and remove whitespace.
   
    

// Set the recipient email address.
    // FIXME: Update this to your desired email address.
    $recipient = $email;

    // Set the email subject.
    $subject = "Recuperar Contraseña ";

    // Build the email content.
    // Build the email content.
    $email_content ='
    <html>
        <style>
            font-family: "Arial", sans-serif;
            font-size: 16px;

            .espacio {
                display:flex;
                width:100%;
                justify-content: space-between;  
            }

            .element1 { margin-right : 20px; float:left; }
            .element2 { float:left; }
        </style>
        <body>';
    $email_content .='<img src="views\img\u3 grande.png" alt="OGA" width=100% height="auto">';
    $email_content.='
    <p width = 100%>
        <strong>Solicitud de Reestablecimiento de contraseña:</strong>'."aqui va la contraseña hash".'
    </p>
    
    <hr></br>';
    }


        // Build the email headers.
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From:info@U3Digital.com" . "\r\n";
       
        print_r($email_content); 
        // Send the email.
        if (mail($recipient, $subject, $email_content, $headers)) {
            echo "success";
        } else {
           echo "error";
        }   

} else {
// Not a POST request, set a 403 (forbidden) response code.
http_response_code(403);
echo "Tuvimos un error favor de intentarlo de nuevo";
}

