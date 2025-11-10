<!-- Profil Section -->
<section class="pharma-hero" style="min-height: 200px;">
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <h1 class="hero-title">Mon Profil</h1>
        <p class="hero-subtitle">Gérez vos informations personnelles</p>
    </div>
</section>

<!-- Profil Content -->
<section class="pharma-intro">
    <div class="container-pharma">
        <div style="max-width: 800px; margin: 0 auto;">

            <!-- Informations actuelles -->
            <div class="profile-info-card" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: var(--shadow-md); margin-bottom: 2rem;">
                <h2 style="color: var(--pharma-primary); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    👤 Informations du compte
                </h2>
                <div style="display: grid; gap: 1rem;">
                    <div style="padding: 1rem; background: var(--pharma-bg); border-radius: 8px;">
                        <strong style="color: var(--pharma-secondary);">Login actuel :</strong>
                        <p style="font-size: 1.2rem; margin-top: 0.5rem; color: var(--pharma-primary); font-weight: 600;">
                            <?= escape($user['login']) ?>
                        </p>
                    </div>
                    

            <!-- Modifier le login -->
            <div class="profile-card" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: var(--shadow-md); margin-bottom: 2rem;">
                <h2 style="color: var(--pharma-primary); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    ✏️ Modifier mon login
                </h2>
                <form method="POST" action="<?= url('profil/update_login') ?>" style="display: grid; gap: 1.5rem;">
                    <div class="form-group">
                        <label for="new_login" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--pharma-secondary);">
                            Nouveau login
                        </label>
                        <input
                            type="text"
                            id="new_login"
                            name="new_login"
                            class="form-input"
                            style="width: 100%; padding: 0.875rem; border: 2px solid var(--pharma-border); border-radius: 8px; font-size: 1rem; transition: var(--transition);"
                            required
                            minlength="3"
                            placeholder="Entrez votre nouveau login">
                    </div>

                    <div class="form-group">
                        <label for="password" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--pharma-secondary);">
                            Mot de passe actuel (pour confirmer)
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            style="width: 100%; padding: 0.875rem; border: 2px solid var(--pharma-border); border-radius: 8px; font-size: 1rem; transition: var(--transition);"
                            required
                            placeholder="Confirmez avec votre mot de passe">
                    </div>

                    <button
                        type="submit"
                        class="pharma-nav-cta"
                        style="padding: 1rem 2rem; background: var(--pharma-primary); color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: var(--transition);">
                        💾 Enregistrer le nouveau login
                    </button>
                </form>
            </div>

            <!-- Modifier le mot de passe -->
            <div class="profile-card" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: var(--shadow-md);">
                <h2 style="color: var(--pharma-primary); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    🔒 Modifier mon mot de passe
                </h2>
                <form method="POST" action="<?= url('profil/update_password') ?>" style="display: grid; gap: 1.5rem;">
                    <div class="form-group">
                        <label for="current_password" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--pharma-secondary);">
                            Mot de passe actuel
                        </label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            class="form-input"
                            style="width: 100%; padding: 0.875rem; border: 2px solid var(--pharma-border); border-radius: 8px; font-size: 1rem; transition: var(--transition);"
                            required
                            placeholder="Votre mot de passe actuel">
                    </div>

                    <div class="form-group">
                        <label for="new_password" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--pharma-secondary);">
                            Nouveau mot de passe
                        </label>
                        <input
                            type="password"
                            id="new_password"
                            name="new_password"
                            class="form-input"
                            style="width: 100%; padding: 0.875rem; border: 2px solid var(--pharma-border); border-radius: 8px; font-size: 1rem; transition: var(--transition);"
                            required
                            minlength="6"
                            placeholder="Minimum 6 caractères">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--pharma-secondary);">
                            Confirmer le nouveau mot de passe
                        </label>
                        <input
                            type="password"
                            id="confirm_password"
                            name="confirm_password"
                            class="form-input"
                            style="width: 100%; padding: 0.875rem; border: 2px solid var(--pharma-border); border-radius: 8px; font-size: 1rem; transition: var(--transition);"
                            required
                            minlength="6"
                            placeholder="Retapez le nouveau mot de passe">
                    </div>

                    <button
                        type="submit"
                        class="pharma-nav-cta"
                        style="padding: 1rem 2rem; background: var(--pharma-secondary); color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: var(--transition);">
                        🔐 Changer le mot de passe
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<style>
    .form-input:focus {
        outline: none;
        border-color: var(--pharma-primary);
        box-shadow: 0 0 0 3px rgba(0, 168, 150, 0.1);
    }

    button[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    button[type="submit"]:active {
        transform: translateY(0);
    }
</style>