<?php
$product_shuffle = $product->getData();
shuffle($product_shuffle);
$UniqueBrand = array_unique(array_map(function($pro){return $pro['item_brand'];},$product_shuffle));
if($_SERVER['REQUEST_METHOD'] ==='POST'){
  //add cart method
  if(isset($_POST['special-price-submit'])){
    $Cart->addToCart($_POST['user_id'],$_POST['item_id']);

  }
}
?>
<div class="special-price">
      <h4 class="font-roboto font-size-20">Our Awesome Products</h4>
      <div id="filters" class="button-group text-right">
        
        <button class="btn is-checked" data-filter="*">All Products</button>
        <?php foreach($UniqueBrand as $brand){
          echo '<button class="btn is-checked" data-filter=".'. $brand . '">' .$brand . '</button>';
        } ?>
       
      </div>
      <div class="grid">
        <?php foreach($product_shuffle as $item){ ?>
        <div class="grid-item <?php echo $item['item_brand'] ?> border">
          <!-- 1st product bed -->
          <div class="item m-4" style="width: 200px; ">
            <div class="product font-rubic">
              <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']); ?>">
                <img src="<?php echo $item['item_image'] ?>" class="img-fluid" style="height: 300px;  object-fit:contain;"
                  alt="<?php $item['item_name'] ?? 'Unknown' ?>" /></a>
                  <!--  -->
                  
                  <!--  -->
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
                  <span> <?php echo $item['item_price'] ?? 0?></span>
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

        </div>
        <?php } ?>
        <!-- <div class="grid-item bedsheets border">

          <div class="item m-4" style="width: 200px; ">
            <div class="product font-rubic">
              <a href="#"><img src="./assests/bed1.jpeg" style='height: 300px;  object-fit:contain;' class="img-fluid"
                  alt="bedsheets" /></a>
              <div class="text-center">
                <h6 class="py-3">King Sized Bedsheets</h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="fa-solid fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>

                </div>
                <div class="price py-2">
                  <span>Rs2000</span>
                </div>
                <button type="submit" class="color-second-bg text-white rounded p-2">Add to Cart</button>
              </div>
            </div>


          </div>


        </div> -->
        
      </div>
    </div>