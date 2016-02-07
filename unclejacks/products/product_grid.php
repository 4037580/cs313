<?php include '../view/header.php'; ?>
  <header>
    <a style="float:right; margin-right:30px; margin-top: 33px;" href=".?action=add_product_form">Add Product</a>
    <h1>Products</h1>
  </header>
  <main>
    <?php foreach ($products as $product): ?>
      <div class="product">
        <a href=".?action=product&amp;product_id=<?php echo $product['product_id']?>"><img src='<?php echo $product['image_url']?>' alt='<?php echo $product['image_alt']?>'></a>
        <div class='description'>
          <a href=".?action=product&amp;product_id=<?php echo $product['product_id']?>"><?php echo $product['product_name']?></a>
          <div class="rating">
            <span>☆</span>
            <span>☆</span>
            <span>☆</span>
            <span>☆</span>
            <span>☆</span>
          </div>
          <p><b>$<?php echo $product['product_price']?></b></p>
        </div>
        <button>BUY</button>
      </div>
    <?php endforeach;?>  
  </main>  
<?php include '../view/footer.php'; ?>