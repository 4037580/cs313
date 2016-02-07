<?php
//get category name
function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE category_id = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['category_name'];
    return $category_name;
}

//get categories
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY category_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    return $results;    
}

//add category
function add_category($category_name) {
    global $db;
    $query = 'INSERT INTO categories (category_name)
              VALUES (:category_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();    
}

//delete category
function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM categories
              WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

//edit category
function edit_category($category_id, $category_name) {
    global $db;
    $query = 'UPDATE categories 
                 SET category_name = :category_name
               WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}
?>