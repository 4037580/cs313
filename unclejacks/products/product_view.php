<?php include '../view/header.php'; ?>
    <header>
      <a style="float:right; margin-right:30px; margin-top: 33px;" href=".?action=delete_product&amp;product_id=<?php echo $product['product_id']?>">Delete</a>
      <a style="float:right; margin-right:30px; margin-top: 33px;" href=".?action=edit_product_form&amp;product_id=<?php echo $product['product_id']?>">Edit</a>
      <h1><?php echo $product['product_name']?></h1>
    </header>
    <main>
      <div class="productBig">
            <div class='descriptionBig'>
              <p><?php echo $product['product_description']?></p><br>
              <div class="ratingBig">
                <span>☆</span>
                <span>☆</span>
                <span>☆</span>
                <span>☆</span>
                <span>☆</span>
              </div><br><br>
              <p id="pBig"><b>$<?php echo $product['product_price']?></b></p><br>
              <button class="big">BUY</button>
            </div>
            <figure>
              <img src='<?php echo $images[0]['image_url']?>' alt='<?php echo $images[0]['image_alt']?>'>
              <?php if (sizeof($images) > 1) {?>
              <div class="smallImages">
                <?php array_shift($images);
                foreach ($images as $image) {
                  echo "<img src='{$image['image_url']}' alt='{$image['image_alt']}'>";
                }?>
              </div>
              <?php }?>
            </figure> 
          </div>   
    </main>  
    <?php include '../view/footer.php'; ?>