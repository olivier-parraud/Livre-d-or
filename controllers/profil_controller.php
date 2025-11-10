<?php
// Contrôleur de profil utilisateur

/**
 * Page de profil
 */
function profil_index()
{
    // Vérifier si l'utilisateur est connecté
    if (!is_logged_in()) {
        set_flash('error', 'Vous devez être connecté pour accéder à votre profil.');
        redirect('auth/login');
        return;
    }

    // Récupérer les informations de l'utilisateur
    $user_id = $_SESSION['users_id'];
    $user = get_user_by_id($user_id);

    if (!$user) {
        set_flash('error', 'Utilisateur introuvable.');
        redirect('home');
        return;
    }

    $data = [
        'title' => 'Mon Profil',
        'user' => $user
    ];

    load_view_with_layout('profil/index', $data);
}

/**
 * Modification du login
 */
function profil_update_login()
{
    if (!is_logged_in()) {
        set_flash('error', 'Vous devez être connecté.');
        redirect('auth/login');
        return;
    }

    if (!is_post()) {
        redirect('profil');
        return;
    }

    $user_id = $_SESSION['users_id'];
    $new_login = clean_input(post('new_login'));
    $password = post('password');

    // Validation
    if (empty($new_login) || empty($password)) {
        set_flash('error', 'Tous les champs sont obligatoires.');
        redirect('profil');
        return;
    }

    if (strlen($new_login) < 3) {
        set_flash('error', 'Le login doit contenir au moins 3 caractères.');
        redirect('profil');
        return;
    }

    // Vérifier le mot de passe actuel
    $user = get_user_by_id($user_id);
    if (!verify_password($password, $user['password'])) {
        set_flash('error', 'Mot de passe incorrect.');
        redirect('profil');
        return;
    }

    // Vérifier si le login existe déjà
    $existing_user = get_user_by_login($new_login);
    if ($existing_user && $existing_user['id'] != $user_id) {
        set_flash('error', 'Ce login est déjà utilisé.');
        redirect('profil');
        return;
    }

    // Mettre à jour le login
    if (update_user_login($user_id, $new_login)) {
        $_SESSION['user_login'] = $new_login;
        set_flash('success', 'Votre login a été modifié avec succès !');
    } else {
        set_flash('error', 'Erreur lors de la modification du login.');
    }

    redirect('profil');
}

/**
 * Modification du mot de passe
 */
function profil_update_password()
{
    if (!is_logged_in()) {
        set_flash('error', 'Vous devez être connecté.');
        redirect('auth/login');
        return;
    }

    if (!is_post()) {
        redirect('profil');
        return;
    }

    $user_id = $_SESSION['users_id'];
    $current_password = post('current_password');
    $new_password = post('new_password');
    $confirm_password = post('confirm_password');

    // Validation
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        set_flash('error', 'Tous les champs sont obligatoires.');
        redirect('profil');
        return;
    }

    if (strlen($new_password) < 6) {
        set_flash('error', 'Le nouveau mot de passe doit contenir au moins 6 caractères.');
        redirect('profil');
        return;
    }

    if ($new_password !== $confirm_password) {
        set_flash('error', 'Les mots de passe ne correspondent pas.');
        redirect('profil');
        return;
    }

    // Vérifier le mot de passe actuel
    $user = get_user_by_id($user_id);
    if (!verify_password($current_password, $user['password'])) {
        set_flash('error', 'Mot de passe actuel incorrect.');
        redirect('profil');
        return;
    }

    // Mettre à jour le mot de passe
    $hashed_password = hash_password($new_password);
    if (update_user_password($user_id, $hashed_password)) {
        set_flash('success', 'Votre mot de passe a été modifié avec succès !');
    } else {
        set_flash('error', 'Erreur lors de la modification du mot de passe.');
    }

    redirect('profil');
}
