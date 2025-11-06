<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? escape($title) . ' - ' . APP_NAME : APP_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css'); ?>">

</head>

<body>
    <header class="header">

        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-brand">
                    <a href="<?php echo url(); ?>"><?php echo APP_NAME; ?></a>
                </div>

                <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>

                <ul class="nav-menu" id="navMenu">
                    <li><a href="<?php echo url(); ?>">🏠 Accueil</a></li>

                    <?php if (isset($_SESSION["user_id"])): ?>
                        <li><a href=" <?= url('auth/login'); ?>">❤️ Déconnexion ❤️</a></li>
                        <li><a href=" <?= url('profil'); ?>"> Profil </a></li>

                    <?php else: ?>
                        <li><a href="<?= url('auth/register'); ?>"> Inscription </a></li>
                        <li><a href="<?= url('auth/login'); ?>"> Connexion </a></li>
                    <?php endif; ?>


                </ul>
            </div>
        </nav>
    </header>





    <main class="main-content">
        <?php
        // Affichage des messages flash
        $flash_messages = get_flash_messages();
        if (!empty($flash_messages)):
        ?>
            <div class="flash-messages">
                <?php foreach ($flash_messages as $type => $messages): ?>
                    <?php foreach ($messages as $message): ?>
                        <div class="flash-message flash-<?php echo escape($type); ?>">
                            <span><?php echo escape($message); ?></span>
                            <button class="flash-close" onclick="this.parentElement.remove()" title="Fermer">×</button>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php echo $content ?? ''; ?>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div style="max-width: 1200px; margin: 0 auto; padding: 20px; text-align: center; color: #666;">
                <p>&copy; <?php echo date('Y'); ?> <?php ?> - Livre d'or </p>
                <p style="font-size: 0.9em; margin-top: 10px;">
                    Développé avec ❤️ pour Ely |
                    <a href="https://github.com/olivier-parraud" style="color: #667eea;">Github du créateur</a> |
                </p>
            </div>
        </div>
    </footer>

    <script src="<?php echo url('assets/js/app.js'); ?>"></script>
    <script>
        // Menu mobile toggle
        function toggleMobileMenu() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
        }

        // Fermer le menu mobile quand on clique sur un lien
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                const navMenu = document.getElementById('navMenu');
                navMenu.classList.remove('active');
            });
        });

        // Auto-hide flash messages après 5 secondes
        document.querySelectorAll('.flash-message').forEach(message => {
            setTimeout(() => {
                message.style.opacity = '0';
                setTimeout(() => {
                    message.remove();
                }, 300);
            }, 5000);
        });
    </script>
</body>

</html>