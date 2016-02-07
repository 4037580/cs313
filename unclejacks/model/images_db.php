<?php
/*IMAGE FUNCTIONS*/

//add image
function add_image($product_id, $image_url = null, $image_alt = null) {
    global $db;
    if ($image_url && $image_alt) {
      $query = 'INSERT INTO images (image_url, image_alt,product_id)
                VALUES (:image_url, :image_alt, :product_id)';
    } else {
      $query = 'INSERT INTO images (product_id) VALUES (:product_id)';
    }
    $statement = $db->prepare($query);
    if ($image_url && $image_alt) {
      $statement->bindValue(':image_url', $image_url);
      $statement->bindValue(':image_alt', $image_alt);
    }
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

//get image
function get_image($image_id) {
    global $db;
    $query = 'SELECT * FROM images
              INNER JOIN products using(product_id)
              WHERE image_id = :image_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":image_id", $image_id);
    $statement->execute();
    $image = $statement->fetch();
    $statement->closeCursor();
    return $image;
}

//get image by product
function get_images_by_product($product_id) {
    global $db;
    $query = 'SELECT * FROM images
              WHERE product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $images = $statement->fetchAll();
    $statement->closeCursor();
    return $images;
}

//delete image
function delete_image($image_id) {
    global $db;
    $query = 'DELETE FROM images
              WHERE image_id = :image_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':image_id', $image_id);
    $statement->execute();
    $statement->closeCursor();
}

//delete image
function delete_image_by_product($product_id) {
    global $db;
    $query = 'DELETE FROM images
              WHERE product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

//edit image
function edit_image($image_id, $image_url, $image_alt, $product_id) {
    global $db;
    $query = 'UPDATE images 
                 SET image_url = :image_url
                   , image_alt = :image_alt
                   , product_id = :product_id
               WHERE image_id = :image_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':image_id', $image_id);
    $statement->bindValue(':image_url', $image_url);
    $statement->bindValue(':image_alt', $image_alt);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $statement->closeCursor();
}
?>