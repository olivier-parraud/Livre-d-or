<!-- Hero Section -->
<section class="pharma-hero" style="min-height: 300px;">
    <div class="hero-overlay">
        
    </div>
    <div class="hero-container">
        <div class="hero-badge">💬 Livre d'Or</div>
        <h1 class="hero-title">Partagez votre avis</h1>
        <p class="hero-subtitle">Votre opinion compte pour nous</p>
        <p class="hero-description">Dites-nous ce que vous pensez de nos services pharmaceutiques</p>
    </div>
</section>

<!-- Formulaire de commentaire -->
<?php if (is_logged_in()): ?>
    <section class="pharma-intro" style="padding: 3rem 0 2rem;">
        <div class="container-pharma">
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="comment-form-card" style="background: linear-gradient(135deg, var(--pharma-primary) 0%, var(--pharma-secondary) 100%); padding: 2.5rem; border-radius: 16px; box-shadow: var(--shadow-lg); margin-bottom: 3rem;">
                    <h2 style="color: white; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; font-size: 1.5rem;">
                        ✍️ Laissez votre avis
                    </h2>
                    <form method="POST" action="<?= url('commentaires/create') ?>">
                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="commentaire" style="display: block; margin-bottom: 0.75rem; font-weight: 600; color: white; font-size: 1.1rem;">
                                Votre commentaire
                            </label>
                            <textarea
                                id="commentaire"
                                name="commentaire"
                                rows="5"
                                class="form-input"
                                style="width: 100%; padding: 1rem; border: 2px solid rgba(255,255,255,0.3); border-radius: 12px; font-size: 1rem; font-family: inherit; resize: vertical; background: white;"
                                required
                                minlength="10"
                                maxlength="1000"
                                placeholder="Partagez votre expérience avec nous... (minimum 10 caractères)"></textarea>
                            <small style="color: rgba(255,255,255,0.9); display: block; margin-top: 0.5rem;">
                                Maximum 1000 caractères
                            </small>
                        </div>

                        <button
                            type="submit"
                            style="padding: 1rem 2.5rem; background: white; color: var(--pharma-primary); border: none; border-radius: 12px; font-weight: 700; font-size: 1.1rem; cursor: pointer; transition: var(--transition); box-shadow: 0 4px 12px rgba(0,0,0,0.2);"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.3)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';">
                            💬 Publier mon avis
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="pharma-intro" style="padding: 3rem 0 2rem;">
        <div class="container-pharma">
            <div style="max-width: 800px; margin: 0 auto;">
                <div style="background: var(--pharma-accent); padding: 2rem; border-radius: 16px; text-align: center; margin-bottom: 3rem; border: 3px solid var(--pharma-primary);">
                    <p style="font-size: 1.2rem; color: var(--pharma-secondary); margin-bottom: 1.5rem; font-weight: 600;">
                        🔒 Vous devez être connecté pour laisser un avis
                    </p>
                    <a href="<?= url('auth/login') ?>" style="display: inline-block; padding: 1rem 2rem; background: var(--pharma-primary); color: white; text-decoration: none; border-radius: 12px; font-weight: 600; transition: var(--transition);">
                        Se connecter
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Liste des commentaires -->
<section class="pharma-services" style="padding-top: 2rem;">
    <div class="container-pharma">
        <div style="max-width: 900px; margin: 0 auto;">
            <div class="section-header-center" style="margin-bottom: 3rem;">
                <h2 class="section-heading">💭 Tous les avis (<?= count($commentaires) ?>)</h2>
                <p class="section-subheading">Découvrez ce que nos clients pensent de nous</p>
            </div>

            <?php if (empty($commentaires)): ?>
                <div style="text-align: center; padding: 4rem 2rem; background: var(--pharma-bg); border-radius: 16px;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">📝</div>
                    <p style="font-size: 1.2rem; color: var(--pharma-text-light);">
                        Aucun avis pour le moment. Soyez le premier à partager votre expérience !
                    </p>
                </div>
            <?php else: ?>
                <div style="display: grid; gap: 2rem;">
                    <?php foreach ($commentaires as $comment): ?>
                        <div class="comment-card" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: var(--shadow-md); border-left: 4px solid var(--pharma-primary); transition: var(--transition);">
                            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--pharma-primary), var(--pharma-secondary)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.3rem;">
                                        <?= strtoupper(substr($comment['login'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <h3 style="color: var(--pharma-primary); margin: 0; font-size: 1.2rem; font-weight: 700;">
                                            <?= escape($comment['login']) ?>
                                        </h3>
                                        <p style="color: var(--pharma-text-light); margin: 0; font-size: 0.9rem;">
                                            📅 <?= date('d/m/Y à H:i', strtotime($comment['date'])) ?>
                                        </p>
                                    </div>
                                </div>

                                <?php if (is_logged_in() && $_SESSION['users_id'] == $comment['id_utilisateur']): ?>
                                    <form method="POST" action="<?= url('commentaires/delete') ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');" style="margin: 0;">
                                        <input type="hidden" name="commentaire_id" value="<?= $comment['id'] ?>">
                                        <button
                                            type="submit"
                                            style="background: var(--pharma-error); color: white; border: none; padding: 0.5rem 1rem; border-radius: 8px; cursor: pointer; font-weight: 600; transition: var(--transition);"
                                            onmouseover="this.style.transform='scale(1.05)';"
                                            onmouseout="this.style.transform='scale(1)';">
                                            🗑️ Supprimer
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>

                            <div style="padding: 1.5rem; background: var(--pharma-bg); border-radius: 12px; margin-top: 1rem; text-align: left;">
                                <p style="color: var(--pharma-text); line-height: 1.8; margin: 0; padding: 0; font-size: 1.05rem; white-space: pre-wrap; text-align: left !important; display: block;">
                                    <?= escape($comment['commentaire']) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    .comment-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .comment-card p {
        text-align: left !important;
    }

    .form-input:focus {
        outline: none;
        border-color: white !important;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
    }
</style>

<style>
    .comment-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .form-input:focus {
        outline: none;
        border-color: white !important;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
    }
</style>