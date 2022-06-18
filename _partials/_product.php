<main id="main-site">
<?php
$item_id =$_GET['item_id'] ??1;
foreach($product->getData()as $item):
  if($item['item_id']==$item_id):
?>
    <!-- product -->
    <section id="'product" class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <img src="<?php echo $item['item_image'] ?? './assets/bed1.jpeg' ?>" class="img-fluid" alt="<?php echo $item['item_name'] ??'Unknown' ?>">
            <div class="form-row pt-4 font-size-16 font-roboto d-flex " >
              <div class="col m-1">
                  <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
              </div>
              <div class="col m-1">
                  <button type="submit" class="btn btn-warning form-control">Add to Cart</button>
              </div>
          </div>
          </div>
          <div class="col-sm-6">
            <h5 class="font-size-20 font-roboto">
            <?php echo $item['item_name'] ?? 'Unknown'?>
            </h5>
            <div class="d-flex">
              <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
          </div>
          <hr class="m-0">
          <!-- product -->
          <table class="my-3">
            <tr class="font-rubic font-size-14">
              <td>M.R.P</td>
              <td>Rs<strike><?php echo $item['item_price'] *1.35 ?>"></strike></td>
            </tr>
            <tr class="font-rubic font-size-14">
              <td>Deal Price</td>
              <td><?php echo $item['item_price'] ?>"></td>
              <td class="text-danger"><small class="text-danger font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
            </tr>
          </table>
          <!-- product price -->

          <!-- policy -->
          <div id="policy">
            <div class="d-flex">
                <div class="return text-center mr-5">
                    <div class="font-size-20 my-2 color-second">
                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                    </div>
                    <a href="#" class="font-rale font-size-12">Cash on <br> Delivery</a>
                </div>
                <div class="return text-center mr-5">
                    <div class="font-size-20 my-2 color-second">
                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                    </div>
                    <a href="#" class="font-rale font-size-12">PRV <br>Fullfilled</a>
                </div>
              
            </div>
        </div>
        <!-- order details -->
        <div id="order-details " class="font-rale d-flex flex-column text-dark my-4">
          <small>Delivery by : Mar 29  - Apr 1</small>
          <small>Sold by <a href="#">PRV collection </a>(4.5 out of 5 | 18,198 ratings)</small>
          <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
      </div>
      <!-- order details -->
      <div class="col-12 my-3">
        <div class="qty d-flex">
          <h6 class="font-baloo">Qty</h6>
          <div class="px-4 d-flex font-rale">
              <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
              <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
              <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
          </div>
      </div>
          </div>

        </div>
        <div class="col-12">
          <h6>Product Description</h6>
          <hr>
          <p class="font-roboto font-size-14">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam, cum! Neque nesciunt illum veritatis magnam. Vitae fugit in accusantium ab.
          </p>
          <p class="font-roboto font-size-14">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam, cum! Neque nesciunt illum veritatis magnam. Vitae fugit in accusantium ab.
          </p>
        </div>
      </div>
      
    </section>

<?php 
endif;
endforeach;?>
  </main>