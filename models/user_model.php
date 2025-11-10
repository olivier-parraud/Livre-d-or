<?php
// Modèle pour les utilisateurs

/**
 * Récupère un utilisateur par son email
 */
function get_user_by_login($login)
{
    // Exclure les utilisateurs supprimés
    $query = "SELECT * FROM utilisateurs WHERE login = ?";
    return db_select_one($query, [$login]);
}


/**
 * Crée un nouvel utilisateur
 */
function create_user($login, $password)
{

    $login = mb_convert_case(trim($login), MB_CASE_TITLE, 'UTF-8');
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO utilisateurs (login, password) VALUES (?, ?)";

    if (db_execute($query, [$login, $password])) {
        return db_last_insert_id();
    }

    return false;
}




/**
 * Récupère un utilisateur par son ID
 */
function get_user_by_id($id)
{
    $query = "SELECT * FROM utilisateurs WHERE id = ? LIMIT 1";
    return db_select_one($query, [$id]);
}

/**
 * Met à jour le login d'un utilisateur
 */
function update_user_login($id, $new_login)
{
    $new_login = mb_convert_case(trim($new_login), MB_CASE_TITLE, 'UTF-8');
    $query = "UPDATE utilisateurs SET login = ? WHERE id = ?";
    return db_execute($query, [$new_login, $id]);
}

/**
 * Met à jour le mot de passe d'un utilisateur
 */
function update_user_password($id, $hashed_password)
{
    $query = "UPDATE utilisateurs SET password = ? WHERE id = ?";
    return db_execute($query, [$hashed_password, $id]);
}

/**

 * Hash un mot de passe
 */
function hash_password($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}







