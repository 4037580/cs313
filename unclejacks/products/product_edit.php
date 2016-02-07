<?php include '../view/header.php'; ?>
    <header>
        <h1>Edit Product</h1>
    </header>
    <main>
    <form class="table" action="index.php" method="post" id="edit_product_form">
      <input type="hidden" name="product_id" value="<?php echo $product_id?>">
      <table>
        <tr><td class="error" colspan="2"><?php if (isset($message)) {
        echo $message;
    } else echo '&nbsp;'?></td></tr>
        <tr><td><label>Category:</label></td>
            <td><select name="category_id">
                <?php foreach ( $categories as $category ) : ?>
                    <option value="<?php echo $category['category_id']; ?>" <?php if ($category['category_id'] == $product['category_id']) { echo 'selected';}?>>
                        <?php echo $category['category_name']; ?>
                    </option>
                <?php endforeach; ?></select></td></tr>

        <tr><td><label>Name:</label></td>
            <td><input class="box" type="text" name="name" value="<?php echo $product['product_name'];?>" required/></td></tr>

        <tr><td><label>Price:</label></td>
            <td><input class="box" type="text" name="price" value="<?php echo $product['product_price'];?>" required/></td></tr>

        <tr><td><label>Description:</label></td>
            <td><textarea name="description" required><?php echo $product['product_description'];?></textarea></td></tr>

        <tr><td><label>Image:</label></td>
            <td><input type="file" name="upload_image" /></td></tr>

        <tr><td><input type="submit" value="UPDATE" name="action"/></td>
            <td><input type="button" onclick="location.href= 'index.php?action=cancel';" value="CANCEL"/></td></tr>
      </table>
    </form>
</main>
<?php include '../view/footer.php'; ?>