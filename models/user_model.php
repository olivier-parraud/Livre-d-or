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
    // Exclure les utilisateurs supprimés
    $query = "SELECT * FROM users WHERE id = ? AND deleted_at IS NULL LIMIT 1";
    return db_select_one($query, [$id]);
}



/**
 * Met à jour un utilisateur
 */
function update_user($id, $first_name, $last_name, $email)
{

    $first_name = mb_convert_case(trim($first_name), MB_CASE_TITLE, 'UTF-8');
    $last_name = mb_convert_case(trim($last_name), MB_CASE_TITLE, 'UTF-8');
    $query = "UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
    return db_execute($query, [$first_name, $last_name, $email, $id]);
}

/**
 * Met à jour le mot de passe d'un utilisateur
 */
function update_user_password($id, $password)
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE users SET password_hash = ? WHERE id = ?";
    return db_execute($query, [$hashed_password, $id]);
}



/**
 * Compte le nombre total d'utilisateurs (non supprimés)
 */
function count_users()
{
    // Compter uniquement les utilisateurs non supprimés
    $query = "SELECT COUNT(*) as total FROM users WHERE deleted_at IS NULL";
    $result = db_select_one($query);
    return $result['total'] ?? 0;
}

/**
 * Vérifie si un email existe déjà (parmi les utilisateurs non supprimés)
 */
function email_exists($email, $exclude_id = null)
{
    // Vérifier uniquement parmi les utilisateurs non supprimés
    $query = "SELECT COUNT(*) as count FROM users WHERE email = ? AND deleted_at IS NULL";
    $params = [$email];

    if ($exclude_id) {
        $query .= " AND id != ?";
        $params[] = $exclude_id;
    }

    $result = db_select_one($query, $params);
    return $result['count'] > 0;
}

/**
 * Récupère tous les utilisateurs
 */
function get_all_users($limit = null, $offset = 0)
{
    // Exclure les utilisateurs supprimés (soft delete)
    $query = "SELECT id, first_name, last_name, email, created_at FROM users WHERE deleted_at IS NULL ORDER BY created_at DESC";

    if ($limit !== null) {
        $query .= " LIMIT $offset, $limit";
    }

    return db_select($query);
}

//Crée un nouvel utilisateur
 
