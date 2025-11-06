<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1><?php e($title); ?></h1>
            <p>Créez votre compte</p>
        </div>

        <form method="POST" class="auth-form">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label for="name">Login</label>
                <input type="text" id="login" name="login" required
                    value="<?php e(post('login', '')); ?>"
                    placeholder="Votre login">
            </div>

            

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    placeholder="Au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required
                    placeholder="Confirmez votre mot de passe">
            </div>

            <button type="submit" class="btn-register">
                <i class="fas fa-user-plus"></i>
                S'inscrire
            </button>
        </form>

        <div class="auth-footer">
            <p>Déjà un compte ?
                <a href="<?php echo url('auth/login'); ?>">Se connecter</a>
            </p>
        </div>
    </div>
</div>