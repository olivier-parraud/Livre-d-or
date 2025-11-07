<div class="pharma-auth-page">
    <div class="auth-background">
        <div class="auth-shape shape-1"></div>
        <div class="auth-shape shape-2"></div>
        <div class="auth-shape shape-3"></div>
    </div>

    <div class="auth-content">
        <!-- Left Side - Branding -->
        <div class="auth-branding">
            <div class="branding-content">
                <div class="brand-logo">
                    <span class="logo-icon">💊</span>
                    <h1>Pharmacie Parraud</h1>
                </div>
                <h2>Bienvenue !</h2>
                <p class="brand-description">
                    Connectez-vous à votre espace personnel pour accéder à vos ordonnances,
                    suivre vos commandes et bénéficier de nos services en ligne.
                </p>
                <div class="brand-features">
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>Renouvellement d'ordonnances</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>Conseils personnalisés</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>Historique de commandes</span>
                    </div>
                </div>
                <div class="brand-owner">
                    <div class="owner-avatar-small">👨‍⚕️</div>
                    <div class="owner-info-small">
                        <strong>Olivier Parraud</strong>
                        <span>Pharmacien Titulaire</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="auth-form-container">
            <div class="auth-card-pharma">
                <div class="auth-header-pharma">
                    <h1>Connexion</h1>
                    <p>Accédez à votre espace personnel</p>
                </div>

                <form method="POST" class="auth-form-pharma" action="<?php echo url('auth/login'); ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

                    <div class="form-group-pharma">
                        <label for="login">
                            <span class="label-icon">👤</span>
                            Identifiant
                        </label>
                        <div class="input-wrapper">
                            <input type="text" id="login" name="login" required
                                value="<?php echo escape(post('login', '')); ?>"
                                placeholder="Votre identifiant"
                                class="input-pharma">
                        </div>
                    </div>

                    <div class="form-group-pharma">
                        <label for="password">
                            <span class="label-icon">🔒</span>
                            Mot de passe
                        </label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" required
                                placeholder="Votre mot de passe"
                                class="input-pharma">
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="checkbox-container">
                            <input type="checkbox" name="remember">
                            <span class="checkbox-label">Se souvenir de moi</span>
                        </label>
                        <a href="#" class="link-forgot">Mot de passe oublié ?</a>
                    </div>

                    <button type="submit" class="btn-submit-pharma">
                        <span class="btn-icon">🔐</span>
                        <span class="btn-text">Se connecter</span>
                    </button>
                </form>

                <div class="auth-divider">
                    <span>ou</span>
                </div>

                <div class="auth-footer-pharma">
                    <p>Pas encore de compte ?</p>
                    <a href="<?php echo url('auth/register'); ?>" class="btn-secondary-auth">
                        <span>✨</span>
                        Créer un compte
                    </a>
                </div>

                <div class="auth-help">
                    <p>💬 Besoin d'aide ? <a href="#">Contactez-nous</a></p>
                </div>
            </div>
        </div>
    </div>
</div>