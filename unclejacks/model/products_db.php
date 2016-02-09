<?php
//add product
function add_product($product_name, $product_price, $product_description, $category_id) {
    global $db;
    $query = 'INSERT INTO products
                 (product_name, product_price, product_description, category_id)
              VALUES
                 (:product_name, :product_price, :product_description, :category_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_name', $product_name);
    $statement->bindValue(':product_price', $product_price);
    $statement->bindValue(':product_description', $product_description);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $last_id = $db->lastInsertId();
    $statement->closeCursor();
    return $last_id;
    
}

//get product
function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

//get products
function get_products() {
    global $db;
    $query = 'SELECT * 
           , (SELECT image_url FROM images i 
              WHERE p.product_id = i.product_id LIMIT 1) AS "image_url"
           , (SELECT image_alt FROM images i 
              WHERE p.product_id = i.product_id LIMIT 1) AS "image_alt" 
              FROM products p
              ORDER BY product_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    return $results;    
}

//delete product
function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products
              WHERE product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

//edit product
function edit_product($product_id, $product_name, $product_price, $product_description, $category_id) {
    global $db;
    $query = 'UPDATE products 
                 SET product_name = :product_name
                   , product_price = :product_price
                   , product_description = :product_description
                   , category_id = :category_id
               WHERE product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':product_name', $product_name);
    $statement->bindValue(':product_price', $product_price);
    $statement->bindValue(':product_description', $product_description);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

//get products by category
function get_products_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE products.category_id = :category_id
              ORDER BY product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}
?>