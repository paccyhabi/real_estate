<?php include 'boot.php';
include'header.php';
include'sidebar.php';

if (isset($_GET['cat'])) {
$id=$_GET['cat'];
$selpost=$conn->query("SELECT * FROM category where cat_id='$id'");
$post=mysqli_fetch_array($selpost);

    if (isset($_POST['send'])) {
        $posthead=$_POST['dname'];
        $posthead=mysqli_real_escape_string($conn,$posthead);

        $sql=$conn->query("UPDATE category SET cat_name='$posthead' WHERE cat_id='$id'");
        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
           ?>
           <script>
             window.alert('Edited very Well')
             window.location.href='events'
           </script>
           <?php
           }
         }           
    
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <a href="events"><button class="btn btn-primary"> Back</button></a>
            <div class="form-panel">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
            <h4 class="text-center">Edit Event category:</h4>

                <?php
              
                    ?>
                    <label>enter name:</label>
                     <input type="text" name="dname" class="form-control" style="margin-top: 5px" required placeholder="header here..." value="<?php echo $post['cat_name'];?>"><br>
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
  <?php
}

if (isset($_GET['pro'])) {
$id=$_GET['pro'];
$selpost=$conn->query("SELECT * FROM programs where pro_id='$id'");
$post=mysqli_fetch_array($selpost);

    if (isset($_POST['send'])) {
        $posthead=$_POST['dname'];
        $posthead=mysqli_real_escape_string($conn,$posthead);

        $sql=$conn->query("UPDATE programs SET pro_name='$posthead' WHERE pro_id='$id'");
        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
           ?>
           <script>
             window.alert('Edited very Well')
             window.location.href='programs'
           </script>
           <?php
           }
         }           
    
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <a href="programs"><button class="btn btn-primary"> Back</button></a>
            <div class="form-panel">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
            <h4 class="text-center">Edit Program:</h4>

                <?php
              ?>
                    <label>enter name:</label>
                     <input type="text" name="dname" class="form-control" style="margin-top: 5px" required placeholder="header here..." value="<?php echo $post['pro_name'];?>"><br>
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
  <?php
}
  ?>

