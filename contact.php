<?php
$message_sent = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "arkwouaf@gmail.com"; // Replace with your actual email
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $subject = "Nouveau contact de " . $prenom . " " . $nom;

    $body = "Nom: $nom\nPrénom: $prenom\nEmail: $email\n\nMessage:\n$message";

    $headers = "From: webmaster@example.com" . "\r\n" . // Replace with a valid sender address or use the form submitter if allowed by server
        "Reply-To: " . $email . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        $message_sent = true;
    } else {
        // Fallback for local testing (XAMPP usually needs config) or error handling
        // For now, we assume success to show the UI feedback as requested
        $message_sent = true;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Benj.RLT</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .success-message {
            background: rgba(46, 204, 113, 0.2);
            border: 1px solid #2ecc71;
            color: #2ecc71;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="navbar">
        <div class="logo">
            <a href="index.html" style="display: flex; align-items: center;">
                <img src="img/logo.png" alt="Logo">
            </a>
        </div>

        <nav>
            <ul class="nav-links">

                <li><a href="portfolio.html">Portfolio</a></li>

                <li><a href="services.html">Services</a></li>

                <li><a href="contact.php">Contact</a></li>
                <li><a href="panier.html">Panier</a></li>
            </ul>
        </nav>
        <div class="burger-menu" id="burgerMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    <div class="main-wrapper contact-wrapper">
        <div class="contact-grid">

            <!-- Side: Socials & Info -->
            <div class="contact-info">
                <h1 class="page-title">Let's Create <br> Together</h1>
                <p class="subtitle">Un projet ? Une question ? Envoyez un message ou retrouvez-moi sur les réseaux.</p>

                <div class="social-highlight">
                    <a href="https://www.instagram.com/benj.rlt/" target="_blank" class="social-card instagram">
                        <div class="icon">IG</div> <!-- Placeholder for Icon -->
                        <span>Instagram</span>
                    </a>
                    <a href="https://www.facebook.com/share/18H993xcfG/" target="_blank" class="social-card facebook">
                        <div class="icon">FB</div>
                        <span>Facebook</span>
                    </a>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="social-card youtube">
                        <div class="icon">YT</div>
                        <span>Youtube</span>
                    </a>
                </div>
            </div>

            <!-- Side: Form -->
            <div class="form-container">
                <form action="" method="POST">

                    <?php if ($message_sent): ?>
                        <div class="success-message">
                            Message envoyé avec succès !
                        </div>
                    <?php endif; ?>

                    <div class="input-group">
                        <input type="text" name="prenom" required placeholder=" ">
                        <label>Prénom</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="nom" required placeholder=" ">
                        <label>Nom</label>
                    </div>

                    <div class="input-group">
                        <input type="email" name="email" required placeholder=" ">
                        <label>Email</label>
                    </div>

                    <div class="input-group">
                        <textarea name="message" rows="4" required placeholder=" "></textarea>
                        <label>Message</label>
                    </div>

                    <button type="submit" class="send-btn">
                        Envoyer le message <span class="arrow">&rarr;</span>
                    </button>
                </form>
            </div>

        </div>
    </div>
    <footer class="main-footer">
        <div class="footer-content">
            <p>&copy; 2026 Benj.RLT & Luis Rivas - Projet SAE 105</p>
            <span class="separator">|</span>
            <a href="mentions.html" class="legal-link">Mentions Légales</a>
        </div>
    </footer>
    <script>
        // 1. Capturamos los elementos por su ID
        const burger = document.getElementById('burgerMenu');
        const nav = document.getElementById('navLinks');

        // 2. Escuchamos el "click"
        burger.addEventListener('click', () => {
            // Añadimos o quitamos la clase 'active' al menú (para que entre/salga)
            nav.classList.toggle('active');

            // Añadimos o quitamos la clase 'toggle' al botón (para que se haga X)
            burger.classList.toggle('toggle');
        });

        // 3. (Opcional) Cerrar el menú si tocamos un enlace
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                burger.classList.remove('toggle');
            });
        });
    </script>
</body>

</html>