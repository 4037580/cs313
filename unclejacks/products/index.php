<?php
require ($_SERVER['DOCUMENT_ROOT'].'/databases.php');
require ($_SERVER['DOCUMENT_ROOT'].'/unclejacks/model/images_db.php');
require ($_SERVER['DOCUMENT_ROOT'].'/unclejacks/model/products_db.php');
require ($_SERVER['DOCUMENT_ROOT'].'/unclejacks/model/categories_db.php');
$db = unclejacksdb();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'grid_products';
    }
}
switch ($action) {
  case 'cancel':
  case 'grid_products':
    $products = get_products();
    include('product_grid.php');
    break;
  case 'product':
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $product_id = filter_var($product_id, FILTER_VALIDATE_INT);
    $product = get_product($product_id);
    $images = get_images_by_product($product_id);
    include('product_view.php');
    break;
  case 'add_product_form':
    $categories = get_categories();
    include('product_add.php');
    break;
  case 'ADD PRODUCT':
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($category_id, FILTER_VALIDATE_INT);
    $product_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $product_price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $product_price = filter_var($product_price, FILTER_VALIDATE_FLOAT);
    $product_description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    if ($category_id == NULL || $category_id == FALSE ||
      $product_name == NULL || $product_price == NULL || $product_price == FALSE) {
      $message = "Invalid product data. Check all fields and try again.";
      $categories = get_categories();
      include('product_add.php');
    } else {
        $product_id = add_product($product_name, $product_price, $product_description, $category_id);
        add_image($product_id);
        header("Location: .?action=grid_products");
    }
    break;
  case 'edit_product_form':
    $categories = get_categories();
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $product_id = filter_var($product_id, FILTER_VALIDATE_INT);
    $product = get_product($product_id);
    include('product_edit.php');
    break;
  case 'UPDATE':
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $product_id = filter_var($product_id, FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($category_id, FILTER_VALIDATE_INT);
    $product_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $product_price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $product_price = filter_var($product_price, FILTER_VALIDATE_FLOAT);
    $product_description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    if ($category_id == NULL || $category_id == FALSE ||
      $product_name == NULL || $product_price == NULL || $product_price == FALSE) {
      $message = "Invalid product data. Check all fields and try again.";
      $categories = get_categories();
      $product['product_id'] = $product_id;
      $product['category_id'] = $category_id;
      $product['product_name'] = $product_name;
      $product['product_price'] = $product_price;
      $product['product_description'] = $product_description;
      include('product_edit.php');
    } else {
        $product_id = edit_product($product_id, $product_name, $product_price, $product_description, $category_id);
        header("Location: .?action=grid_products");
    }
    break;
  case 'delete_product':
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $product_id = filter_var($product_id, FILTER_VALIDATE_INT);
    delete_image_by_product($product_id);
    delete_product($product_id);
    header("Location: .?action=grid_products");
    break;
  }
