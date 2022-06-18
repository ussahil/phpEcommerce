<?php 

shuffle($product_shuffle);

if($_SERVER['REQUEST_METHOD'] ==='POST'){
  //add cart method
  if(isset($_POST['top-sale-submit'])){
    $Cart->addToCart($_POST['user_id'],$_POST['item_id']);

  }
}
?>
<div id="top-sale">
      <div class="container py-5">
        <h4 class="font-roboto font-size-20">Our Top Products</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
        <?php foreach($product_shuffle as $item){ ?>  
        <div class="item  p-3">
            <div class="product font-rubic">
              <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?>" class="rounded" alt="<?php $item['item_name'] ?? 'Unknown' ?>  " /></a>
              <div class="text-center">
                <h6 class="py-3"><?php echo $item['item_name'] ?? "Unknown" ?></h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>

                </div>
                <div class="price py-2">
                  <span><?php echo $item['item_price']?></span>
                </div>
                <form method='POST'>
                  <input type="hidden" name="item_id"value ='<?php echo $item['item_id'] ?? 1 ; ?>'>
                  <input type="hidden" name="user_id"value ='<?php echo 1; ?>'>
                  
                  <?php
                  if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo "<button type='submit' disabled class='btn btn-success font-size-12'>In the Cart</button>";
                }else{
                    echo '<button type="submit" name="special-price-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                }
                  ?>
                  
                </form>
              </div>
            </div>
          </div>
          <!-- 2nd product -->
          
          <?php }?>
        </div>
        <!-- owl end -->
      </div>
    </div>