<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? escape($title) . ' - ' . APP_NAME : APP_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/pharmacie.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>
    <header class="pharma-header">
        <nav class="pharma-navbar">
            <div class="pharma-nav-container">
                <a href="<?php echo url(); ?>" class="pharma-nav-logo">
                    <span class="pharma-logo-icon">💊</span>
                    <span class="pharma-logo-text">Pharmacie Parraud<? ?></span>
                </a>

                <input type="checkbox" id="menu-toggle" class="menu-toggle">
                <label for="menu-toggle" class="menu-toggle-label">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>

                <ul class="pharma-nav-menu">
                    <li><a href="<?php echo url(); ?>" class="pharma-nav-link">🏠 Accueil</a></li>
                    <li><a href="<?= url('commentaires'); ?>" class="pharma-nav-link">💬 Vos Avis</a></li>

                    <?php if (is_logged_in()): ?>
                        <li><a href=" <?= url('profil'); ?>" class="pharma-nav-link">👤 Profil</a></li>
                        <li><a href=" <?= url('auth/deconnexion'); ?>" class="pharma-nav-link pharma-nav-cta">🚪 Déconnexion</a></li>

                    <?php else: ?>
                        <li><a href="<?= url('auth/register'); ?>" class="pharma-nav-link">✍️ Inscription</a></li>
                        <li><a href="<?= url('auth/login'); ?>" class="pharma-nav-link pharma-nav-cta">🔐 Connexion</a></li>
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