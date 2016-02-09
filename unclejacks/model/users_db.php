<?php
/*USER FUNCTIONS*/

//add user
function add_user($user_name, $user_lastname, $email, $password) {
    global $db;
    $query = 'INSERT INTO products
                 (user_name, user_lastname, email, password)
              VALUES
                 (:user_name, :user_lastname, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $user_name);
    $statement->bindValue(':user_lastname', $user_lastname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

//get user
function get_user($user_id) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

//get users
function get_users() {
    global $db;
    $query = 'SELECT * FROM users
              ORDER BY user_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

//delete user
function delete_user($user_id) {
    global $db;
    $query = 'DELETE FROM products
              WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

//edit user
function edit_user($user_id, $user_name, $user_lastname, $email, $password) {
    global $db;
    $query = 'UPDATE users 
                 SET user_name = :user_name
                   , user_lastname = :user_lastname
                   , email = :email
                   , password = :password
               WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':user_name', $user_name);
    $statement->bindValue(':user_lastname', $image_lastname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

//login user
function login_user($email, $password) {
    global $db;
    $query = 'SELECT user_id, email FROM users
              WHERE email = :email
              AND   password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}
?>