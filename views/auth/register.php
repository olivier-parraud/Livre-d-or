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
                <h2>Rejoignez-nous !</h2>
                <p class="brand-description">
                    Créez votre compte pour profiter de tous nos services en ligne et
                    bénéficier d'un suivi personnalisé par notre équipe de professionnels.
                </p>
                <div class="brand-features">
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>Inscription gratuite et rapide</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>Accès à votre historique</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>Conseils personnalisés</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>Programme de fidélité</span>
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
                    <h1>Inscription</h1>
                    <p>Créez votre compte en quelques secondes</p>
                </div>

                <form method="POST" class="auth-form-pharma">
                    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

                    <div class="form-group-pharma">
                        <label for="login">
                            <span class="label-icon">👤</span>
                            Identifiant
                        </label>
                        <div class="input-wrapper">
                            <input type="text" id="login" name="login" required
                                value="<?php e(post('login', '')); ?>"
                                placeholder="Choisissez un identifiant"
                                class="input-pharma">
                        </div>
                        <small class="field-hint">Votre identifiant unique pour vous connecter</small>
                    </div>

                    <div class="form-group-pharma">
                        <label for="password">
                            <span class="label-icon">🔒</span>
                            Mot de passe
                        </label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" required
                                placeholder="Créez un mot de passe sécurisé"
                                class="input-pharma">
                        </div>
                        <small class="field-hint">Min. 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre</small>
                    </div>

                    <div class="form-group-pharma">
                        <label for="confirm_password">
                            <span class="label-icon">✓</span>
                            Confirmer le mot de passe
                        </label>
                        <div class="input-wrapper">
                            <input type="password" id="confirm_password" name="confirm_password" required
                                placeholder="Confirmez votre mot de passe"
                                class="input-pharma">
                        </div>
                    </div>

                    <div class="form-checkbox">
                        <label class="checkbox-container">
                            <input type="checkbox" name="terms" required>
                            <span class="checkbox-label">
                                J'accepte les <a href="#">conditions d'utilisation</a> et la
                                <a href="#">politique de confidentialité</a>
                            </span>
                        </label>
                    </div>

                    <div class="form-checkbox">
                        <label class="checkbox-container">
                            <input type="checkbox" name="newsletter">
                            <span class="checkbox-label">
                                Je souhaite recevoir les actualités et offres de la pharmacie
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="btn-submit-pharma">
                        <span class="btn-icon">✨</span>
                        <span class="btn-text">Créer mon compte</span>
                    </button>
                </form>

                <div class="auth-divider">
                    <span>ou</span>
                </div>

                <div class="auth-footer-pharma">
                    <p>Vous avez déjà un compte ?</p>
                    <a href="<?php echo url('auth/login'); ?>" class="btn-secondary-auth">
                        <span>🔐</span>
                        Se connecter
                    </a>
                </div>

                <div class="auth-help">
                    <p>💬 Besoin d'aide ? <a href="#">Contactez-nous</a></p>
                </div>
            </div>
        </div>
    </div>
</div>