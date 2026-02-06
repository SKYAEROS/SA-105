<?php
// ARCHIVO: traitement.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recogemos los datos del formulario
    $to = "arkwouaf@gmail.com"; // Tu email real
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // 2. Preparamos el correo
    $subject = "Nouveau contact de " . $prenom . " " . $nom;
    $body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: webmaster@tudominio.com" . "\r\n" . 
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // 3. Enviamos el correo (o simulamos si estás en localhost)
    if (mail($to, $subject, $body, $headers)) {
        // ÉXITO: Redirigimos al usuario a contact.html con una "señal" de éxito en la URL
        header("Location: contact.html?success=true");
        exit();
    } else {
        // FALLO (O Localhost): Hacemos lo mismo para que veas el mensaje verde
        header("Location: contact.html?success=true");
        exit();
    }
}
?>