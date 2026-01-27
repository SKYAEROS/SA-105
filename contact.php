<?php
$message_sent = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Here we would handle the email sending logic
    // $to = "your-email@example.com";
    // $subject = "Nouveau contact de " . $_POST['prenom'] . " " . $_POST['nom'];
    // mail(...);
    $message_sent = true;
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
            </ul>
        </nav>
    </header>

    <div class="main-wrapper contact-wrapper">
        <div class="contact-grid">

            <!-- Side: Socials & Info -->
            <div class="contact-info">
                <h1 class="page-title">Let's Create <br> Together</h1>
                <p class="subtitle">Un projet ? Une question ? Envoyez un message ou retrouvez-moi sur les réseaux.</p>

                <div class="social-highlight">
                    <a href="https://instagram.com" target="_blank" class="social-card instagram">
                        <div class="icon">IG</div> <!-- Placeholder for Icon -->
                        <span>Instagram</span>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="social-card facebook">
                        <div class="icon">FB</div>
                        <span>Facebook</span>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="social-card youtube">
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

</html>