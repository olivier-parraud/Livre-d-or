<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1><?php e($title); ?></h1>
            <p>Connectez-vous à votre compte</p>
        </div>

        <form method="POST" class="auth-form" action="<?php echo url('auth/login'); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label for="login">Login</label>
                <input type="login" id="login" name="login" required
                    value="<?php echo escape(post('login', '')); ?>"
                    placeholder="Login">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    placeholder="Votre mot de passe">
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i>
                <a href="/livreor/home/index" ></a>
                Se connecter
            </button>
        </form>

        <div class="auth-footer">
            <p>Pas encore de compte ?
                <a href="<?php echo url('/home'); ?>">S'inscrire</a>
            </p>
        </div>
    </div>
</div>