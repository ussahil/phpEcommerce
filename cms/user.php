<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>prv Collection</title>
    <!-- owl -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
      integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
      integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw="
      crossorigin="anonymous"
    />
    <!-- owl -->
    <!-- bootstra -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="../style.css" />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- require fuctions.php -->
    <?php require('./functions.php');
    ob_start();  ?>
  </head>

  <body>
    <!-- header -->
    <header id="header">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark color-primary-bg">
        <a class="navbar-brand" href="#">PRV CMS</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto font-urban">
            <li class="nav-item active">
              <a class="nav-link color-baby-white" href="cms.php"
                >Products List and Delete<span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link color-baby-white" href="user.php"
                >list Users<i class="fas fa-chevron"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-baby-white" href="upload.php">CRUD operations</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
      <!-- show products -->
      <?php 

$product_shuffle = $product->getData('user');

if($_SERVER['REQUEST_METHOD'] ==='POST'){
  //deleting
  if(isset($_POST['delete-cart-submit'])){
      $deletedrecord= $product->deleteCart($_POST['user_id'],'user','user_id');
      header("Refresh:0");
    }
  }

?>

      <div class="container py-5">
        <h4 class="font-roboto font-size-20">All the Products</h4>
        <hr>
        
        
        
          <table class="table">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($product_shuffle as $item): ?>   
  <tr>
      <!-- <th scope="row">1</th> -->
      <td><?php echo $item['username'] ?></td>
      <td><?php echo $item['password'] ?></td>
      
      <td>
         <form method='POST'>
                  <input type="hidden" name="user_id" value='<?php echo  $item['user_id'] ?? 0; ?>'>
                  <button type="submit" class="btn font-baloo btn-danger px-3 border-right" name='delete-cart-submit'>Delete</button>
          </form>
      </td>
    </tr>
    
  <?php  endforeach;?>
  </tbody>
</table>
        
        <!-- owl end -->
      </div>
    
    </main>
    
    <?php
include('../footer.php');
?>
    <!-- footer -->
  </body>
</html>
