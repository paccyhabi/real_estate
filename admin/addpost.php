<?php include 'boot.php';
include'header.php';
include'sidebar.php';
    if (isset($_POST['send'])) {
        if (!empty($_POST['summary']) && !empty($_POST['category']) && !empty($_POST['tags'])) {
        $userid=$_SESSION['id'];
        $posthead=$_POST['dname'];
        $postdesc=$_POST['desc'];
        $tags=$_POST['tags'];
        $price=$_POST['price'];
        $category=$_POST['category'];
        $summary=$_POST['summary'];
        $postdesc=mysqli_real_escape_string($conn,$postdesc);
        $posthead=mysqli_real_escape_string($conn,$posthead);
        $category=mysqli_real_escape_string($conn,$category);
        $summary=mysqli_real_escape_string($conn,$summary);

        $checksel=$conn->query("SELECT * FROM product WHERE product_name='$posthead'");
        if (mysqli_num_rows($checksel)>0) {
            ?>
            <script>
                window.alert("Please This post exist")
                window.history.back()
            </script>
            <?php
        }
        else{

$fileInfo = PATHINFO($_FILES["image"]["name"]);
    if (empty($_FILES["image"]["name"])){
        $location=$srow['image'];
        ?>
            <script>
                window.alert('Uploaded photo is empty!');
                window.history.back();
            </script>
        <?php
    }
    else{
        if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "jpeg" OR $fileInfo['extension'] == "png") {
            $newFilename = time() . "." . $fileInfo['extension'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $newFilename);
            $date=date('d - M - Y');
            $location="../img/" . $newFilename;
        $sql=$conn->query("INSERT INTO `product`(`product_name`, `short_desc`, `description`, `cat_id`, `price`, `Image_url`, `type`) VALUES ('$posthead','$summary','$postdesc','$category','$price','$location','$tags')");
      }
    if (!$sql) {
        echo $conn->error;
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
    }
        else{
           ?>
           <script>
             window.alert('Post Added very well')
             window.location.href='products'
           </script>
           <?php            
        } 
    }
}
  }
  else{
    ?><script>
        window.alert("Please enter in  all Inputs")
        window.history.back()
    </script>
    <?php

  }
}
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12">
           <a href="products"> <button class="btn btn-primary"><i class="fa fa-reply"></i> Back</button></a>
            <div class="form-panel">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
            <h4 class="text-center">Uploads property to Site:</h4>

                <?php
              
                ?>
                    <label>Enter Header:</label>
                     <input type="text" name="dname" class="form-control" style="margin-top: 5px" required placeholder="header here..."><br>

                     <label>Enter Price:</label>
                     <input type="number" name="price" class="form-control" style="margin-top: 5px" required placeholder="Price here..."><br>
                          <label>Header Picture:</label>
                      <input type="file" name="image" id="" placeholder="assess" class="form-control" required=""><br>

                     <label>Choose Category:</label>
                      <select class="form-control" name="category" required>
                        <option selected disabled>Select_Category</option>
                        <?php
                        $getcat=$conn->query("SELECT * FROM category");
                        while ($getcate=mysqli_fetch_array($getcat)) {
                          ?>
                          <option value="<?php echo $getcate['cat_id'];?>"><?php echo $getcate['cat_name'];?></option>
                          <?php
                        }

                        ?>

                      </select><br><br>


                     <label>Choose type:</label>
                      <select class="form-control" name="tags" required>
                        <option selected disabled>Select_tags</option>
                         <option value="For sale">for sale</option>
                          <option value="For rent">for rent</option>
                       
                     
                      </select><br><br>

                      <label>Summary</label>
                      <textarea class="form-control" name="summary" required></textarea><br>
                      <label>Explanation</label>
                      <textarea class="form-control" id="summernote" placeholder="andika ubusobanuro kuri iki gitabo" minlength="1" name="desc"></textarea><br>
               <input type="submit" value="Upload" name="send" class="btn btn-primary" style="width: 80%;margin-left: 10px">
            </fieldset>
        </form></div></div></div></section></section>
   <?php include'footer.php';
    include'script.php';
  ?>
  <script src="../summnote/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

