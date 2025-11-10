<?php
// Modèle pour les commentaires

/**
 * Récupère tous les commentaires avec les informations de l'utilisateur
 */
function get_all_commentaires()
{
    $query = "SELECT c.*, u.login 
              FROM commentaires c 
              INNER JOIN utilisateurs u ON c.id_utilisateur = u.id 
              ORDER BY c.date DESC";
    return db_select($query);
}

/**
 * Récupère un commentaire par son ID
 */
function get_commentaire_by_id($id)
{
    $query = "SELECT * FROM commentaires WHERE id = ? LIMIT 1";
    return db_select_one($query, [$id]);
}

/**
 * Crée un nouveau commentaire
 */
function create_commentaire($user_id, $commentaire)
{
    $query = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, NOW())";
    return db_execute($query, [$commentaire, $user_id]);
}

/**
 * Supprime un commentaire
 */
function delete_commentaire($id)
{
    $query = "DELETE FROM commentaires WHERE id = ?";
    return db_execute($query, [$id]);
}

/**
 * Compte le nombre de commentaires
 */
function count_commentaires()
{
    $query = "SELECT COUNT(*) as total FROM commentaires";
    $result = db_select_one($query);
    return $result['total'] ?? 0;
}

/**
 * Récupère les commentaires d'un utilisateur
 */
function get_commentaires_by_user($user_id)
{
    $query = "SELECT * FROM commentaires WHERE id_utilisateur = ? ORDER BY date DESC";
    return db_select($query, [$user_id]);
}
