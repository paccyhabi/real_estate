
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>All Categories</h2>
        <div class="row mt">
          <div class="col-lg-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#subcat"><i class="fa fa-plus"></i> Create new</button> <a href="index"><button class="btn btn-warning"><i class=" fa fa-reply"></i> Back</button></a>
            <div class="form-panel">
        <table class="table  table-striped table-hover table-bordered" id="data">
  <thead>
                                            <tr>
                                                <th>
                                                    #N<sup>O</sup>
                                                </th>
                                                <th>
                                                    Categories
                                                </th>

                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
       $i=1;
       foreach (ltg::select_events() as $row) {
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['cat_name']; ?></td>
        <td><a href="edit_sub?cat=<?php echo $row['cat_id'];?>" class="btn btn-primary" onclick="return confirm('Edit this content')"><i class="fa fa-edit"></i> Edit</a> || <a href="events?remove=<?php echo $row['cat_id'];?>" class="btn btn-danger" onclick="return confirm('Are you Sure To Remove this file from your Folder??')"> <i class="fa fa-trash-o"></i> Remove</a></td>
            <?php
$i++;
}
if (isset($_GET['remove'])) {
    $id=$_GET['remove'];
    $check_exist=$conn->query("SELECT * from product where product.cat_id='$id'");
    if (mysqli_num_rows($check_exist)>0) {
        ?>
        <script>
        window.alert('This event is in use to an other location')
        window.history.back()
    </script>
    <?php
        
    }
    else{
    $del=$conn->query("DELETE FROM category where cat_id='$id'");
    if ($del) {
    ?>
    <script>
        window.alert('DELETED Successifully')
        window.location.href='events'
    </script>
    <?php
  }  
}
}
?>
</tr></tbody></table></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
