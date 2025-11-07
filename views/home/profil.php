<div class="hero-buttons">
            <?php if (!is_logged_in()): ?>
                <a href="<?= url('auth/register') ?>" class="btn-pharma btn-primary-pharma">
                    <span>✨</span> Créer un compte
                </a>
                <a href="<?= url('auth/login') ?>" class="btn-pharma btn-secondary-pharma">
                    <span>🔐</span> Se connecter
                </a>
            <?php else: ?>
                <a href="<?= url('produits') ?>" class="btn-pharma btn-primary-pharma">
                    <span>🛒</span> Nos produits
                </a>
            <?php endif; ?>
        </div>