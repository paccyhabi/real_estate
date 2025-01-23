
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>Property Available</h2>
        <div class="row mt">
          <div class="col-lg-12">
            <a href="addpost"><button class="btn btn-primary"><i class="fa fa-plus"></i> Add new Property</button></a>
            <div class="form-panel">
        <table class="table  table-striped table-hover table-bordered" id="data">
  <thead>
                                            <tr>
                                                <th>
                                                    #N<sup>O</sup>
                                                </th>
                                                <th>
                                                    Product name
                                                </th>

                                                <th>
                                                    Category
                                                </th>

                                                <th>
                                                   Price
                                                </th>
                                                 

                                                <th>
                                                   Kinds
                                                </th>
                                                <th>
                                                   Images
                                                </th>

                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
       $i=1;
       foreach (ltg::property() as $row) {
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['product_name'];?></td>
        <td><?php echo $row['cat_name'];?></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['type']; ?></td>
        <td><a href="<?php echo $row['Image_url']; ?>" title="photo images" target="_blank"><img src="<?php echo $row['Image_url']; ?>" width="60" height="50" ></a></td>

        <td><a href="editpro?pro=<?php echo $row['product_id'];?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a> || <a href="products?remove=<?php echo $row['product_id'];?>" class="btn btn-danger" onclick="return confirm('Are you Sure To Remove this file from your Folder??')"> <i class="fa fa-trash-o"></i> Remove</a></td>
            <?php
$i++;
}
if (isset($_GET['remove'])) {
    $id=$_GET['remove'];
    $del=$conn->query("DELETE FROM product where product_id='$id'");
    if ($del) {
    ?>
    <script>
        window.alert('DELETED Successifully')
        window.location.href='products'
    </script>
    <?php
  }  
}
?>
</tr></tbody></table></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
