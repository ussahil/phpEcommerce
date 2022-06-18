<?php 
require('./functions.php');

 if(isset($_POST['submit'],$_POST['prod_brand'],$_POST['prod_name'],$_POST['prod_price'])){
  $brand =$_POST['prod_brand'];
  $name =$_POST['prod_name'];
  $price =$_POST['prod_price'];
  
  $fileName = $_FILES['prod_file']['name'];
  $fileTmpName = $_FILES['prod_file']['tmp_name'];
  $fileSize = $_FILES['prod_file']['size'];
  $fileError = $_FILES['prod_file']['error'];
  
  $fileExt = explode('.',$fileName);
  // explode gives an array
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg','jpeg','png');
  if(in_array($fileActualExt,$allowed)){
    if($fileError ==0){
       $fileNameNew = uniqid('',true).'.' . $fileActualExt;
       $fileDestination = '../assets/' . $fileNameNew;

       //func which uploads
       move_uploaded_file($fileTmpName,$fileDestination);
       echo 'Success';
    }
    else{
      echo "There was an error uploading your file";
    }
  }
  else{

    echo '<div class="alert alert-danger" role="alert">
    You cannot upload files of this type  
    </div>';
  }
  if(empty($brand) || empty($name) || empty($price)){
    $error ='All fields are required';
  }
  else{
    $product->newProduct($brand,$name,$price,$fileDestination);
     header('Location: cms.php');
  }


 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>prv Collection</title>
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
                >Products List and Delete<span class="sr-only"
                  >(current)</span
                ></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link color-baby-white" href="user.php"
                >list Users<i class="fas fa-chevron"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-baby-white" href="upload.php"
                >Upload a new product</a
              >
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <?php
    if(isset($error)){
      echo '<div class="alert alert-danger" role="alert">
      ' . $error .'
    </div>';
    }
    ?>
    <main class ='container m-5'>
      <!-- upload to the root folder -->
      <form 
      class ='font-roboto font-size-20 p-2 m-2'
      action = 'upload.php' method='POST' enctype='multipart/form-data'  >
        <div class="form-group m-2  ">
          <label for="exampleInputEmail1">Brand</label>
          <input
            type="text"
            class="form-control"
            id="brand"
            name='prod_brand'
            aria-describedby="emailHelp"
            placeholder="Enter Product Type"
          />

        </div>
        <div class="form-group m-2">
          <label for="exampleInputPassword1">Name</label>
          <input
            type="text"
            class="form-control"
            id="name"
            name='prod_name'
            placeholder="Enter Name"
          />
        </div>
        <div class="form-group m-2">
          <label for="exampleInputPassword1">Price</label>
          <input
            type="text"
            class="form-control"
            id="price"
            name='prod_price'
            placeholder="Enter Price"
          />
        </div>
        <div class="form-group m-2">
          <label for="exampleInputPassword1">File</label>
          <input
            type="file"
            class="form-control"
            id="file"
            name='prod_file'
            placeholder="Enter Name"
          />
        </div>
        
        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
      </form>

     
    </main>

    <?php include('../footer.php');?>
    <!-- footer -->
  </body>
</html>
