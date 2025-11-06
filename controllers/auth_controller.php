<?php
// Contrôleur d'authentification

/**
 * Page de connexion
 */
function auth_login()
{

    // Rediriger si déjà connecté
    if (is_logged_in()) {
        redirect('home');
    }

    $data = [
        'title' => 'Connexion'
    ];

    if (is_post()) {
        $login = clean_input(post('login'));
        $password = post('password');

        if (empty($login) || empty($password)) {
            set_flash('error', 'Login et mot de passe obligatoires.');
        } else {
            // Rechercher l'utilisateur
            $user = get_user_by_login($login);


            if ($user && verify_password($password, $user['password'])) {
                // Connexion réussie
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_login'] = $user['login'];
                
                $_SESSION['login_time'] = time();

                // Message de bienvenue avec le prénom (première lettre en majuscule)
                $prenom = $user['login'];
                $prenom = ucfirst(strtolower($prenom)); // Première lettre en majuscule, reste en minuscule
                set_flash('success', 'Connexion réussie, bienvenue ' . e($prenom) . ' !');
                redirect('home');
            } else {
                set_flash('error', 'Login ou mot de passe incorrect.');
            }
        }
    }

    load_view_with_layout('auth/login', $data);
}

/**
 * Page d'inscription
 */
function auth_register()
{
    // Rediriger si déjà connecté
    if (is_logged_in()) {
        redirect('home');
    }

    $data = [
        'title' => 'Inscription'
    ];

    if (is_post()) {
        $login = clean_input(post('login'));
        $password = post('password');
        $confirm_password = post('confirm_password');

        // Validation
        if (empty($login) || (empty($password)) || empty($confirm_password)) {
            set_flash('error', 'Tous les champs sont obligatoires.');
        } elseif (
            strlen($password) < 8 ||
            !preg_match('/[a-z]/', $password) ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/[0-9]/', $password)
        ) {
            set_flash('error', 'Le mot de passe doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre.');
        } elseif ($password !== $confirm_password) {
            set_flash('error', 'Les mots de passe ne correspondent pas.');
        } elseif (get_user_by_login($login)) {
            set_flash('error', 'Ce login est déjà utilisée.');
        } else {
            // Créer l'utilisateur
            $user_id = create_user($login, $password);

            if ($user_id) {
                set_flash('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
                redirect('auth/login');
            } else {
                set_flash('error', 'Erreur lors de l\'inscription.');
            }
        }
    }

    load_view_with_layout('auth/register', $data);
}

/**
 * Déconnexion
 */
function auth_logout()
{
    logout();
}
