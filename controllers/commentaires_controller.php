<?php
// Contrôleur des commentaires


/**
 * Page des commentaires (livre d'or)
 */
function commentaires_index()
{
    // Récupérer tous les commentaires
    $commentaires = get_all_commentaires();

    $data = [
        'title' => 'Partagez votre avis',
        'commentaires' => $commentaires
    ];

    load_view_with_layout('commentaires/index', $data);
}

/**
 * Ajouter un commentaire
 */
function commentaires_create()
{
    // Vérifier si l'utilisateur est connecté
    if (!is_logged_in()) {
        set_flash('error', 'Vous devez être connecté pour laisser un avis.');
        redirect('auth/login');
        return;
    }

    if (!is_post()) {
        redirect('commentaires');
        return;
    }

    $commentaire = trim(post('commentaire'));
    $user_id = $_SESSION['users_id'];

    // Validation
    if (empty($commentaire)) {
        set_flash('error', 'Le commentaire ne peut pas être vide.');
        redirect('commentaires');
        return;
    }

    if (strlen($commentaire) < 10) {
        set_flash('error', 'Votre commentaire doit contenir au moins 10 caractères.');
        redirect('commentaires');
        return;
    }

    if (strlen($commentaire) > 1000) {
        set_flash('error', 'Votre commentaire ne peut pas dépasser 1000 caractères.');
        redirect('commentaires');
        return;
    }

    // Créer le commentaire
    if (create_commentaire($user_id, $commentaire)) {
        set_flash('success', '✨ Merci pour votre avis ! Votre commentaire a été publié avec succès.');
    } else {
        set_flash('error', 'Erreur lors de la publication de votre commentaire.');
    }

    redirect('commentaires');
}

/**
 * Supprimer un commentaire
 */
function commentaires_delete()
{
    if (!is_logged_in()) {
        set_flash('error', 'Vous devez être connecté.');
        redirect('auth/login');
        return;
    }

    if (!is_post()) {
        redirect('commentaires');
        return;
    }

    $commentaire_id = (int) post('commentaire_id');
    $user_id = $_SESSION['users_id'];

    // Vérifier que le commentaire appartient à l'utilisateur
    $commentaire = get_commentaire_by_id($commentaire_id);
    
    if (!$commentaire) {
        set_flash('error', 'Commentaire introuvable.');
        redirect('commentaires');
        return;
    }

    if ($commentaire['id_utilisateur'] != $user_id) {
        set_flash('error', 'Vous ne pouvez supprimer que vos propres commentaires.');
        redirect('commentaires');
        return;
    }

    // Supprimer le commentaire
    if (delete_commentaire($commentaire_id)) {
        set_flash('success', 'Votre commentaire a été supprimé.');
    } else {
        set_flash('error', 'Erreur lors de la suppression du commentaire.');
    }

    redirect('commentaires');
}
