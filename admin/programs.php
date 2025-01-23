
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>Programs Available</h2>
        <div class="row mt">
          <div class="col-lg-12">
            <a href=""><button class="btn btn-primary"><i class="fa fa-plus"></i> Add new Product</button></a>
            <div class="form-panel">
        <table class="table  table-striped table-hover table-bordered" id="data">
  <thead>
                                            <tr>
                                                <th>
                                                    #N<sup>O</sup>
                                                </th>
                                                <th>
                                                    Event name
                                                </th>

                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
       $i=1;
       foreach (ltg::select_program() as $row) {
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['pro_name']; ?></td>
        <td><a href="edit_sub?pro=<?php echo $row['pro_id'];?>" class="btn btn-primary" onclick="return confirm('Edit this content')"><i class="fa fa-edit"></i> Edit</a> || <a href="programs?remove=<?php echo $row['pro_id'];?>" class="btn btn-danger" onclick="return confirm('Are you Sure To Remove this file from your Folder??')"> <i class="fa fa-trash-o"></i> Remove</a></td>
            <?php
$i++;
}
if (isset($_GET['remove'])) {
    $id=$_GET['remove'];
    $del=$conn->query("DELETE FROM programs where pro_id='$id'");
    if ($del) {
    ?>
    <script>
        window.alert('DELETED Successifully')
        window.location.href='programs'
    </script>
    <?php
  }  
}
?>
</tr></tbody></table></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
