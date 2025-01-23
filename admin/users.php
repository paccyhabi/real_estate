
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>list of users</h2>
        <div class="row mt">
          <div class="col-lg-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#users"><i class="fa fa-plus"></i> Add new Staff</button>
            <div class="form-panel">
                <div class="table table-responsive">
        <table class="table  table-striped table-hover table-bordered" id="data">
  <thead>
                                            <tr>
                                                <th>
                                                    #N<sup>O</sup>
                                                </th>
                                                <th>
                                                    Names
                                                </th>
                                                <th>
                                                    phone
                                                </th>
                                                <th>
                                                    Photo
                                                </th>
                                                <th>
                                                    email
                                                </th>
                                                <th>
                                                    Position
                                                </th>

                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
      $querya=$conn->query("SELECT * FROM `teams` order by team_id DESC");
       $i=1;
      while($row=mysqli_fetch_array($querya)){
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
        <td><?php echo $row['phone']; ?></td>
      
           <td><a href="<?php echo $row['photo']; ?>" target="_blank"><img src="<?php echo $row['photo']; ?>" width="50" height="50"></a></td>
           <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['position']; ?></td>
          

        <td><a href="users?remove=<?php echo $row['team_id'];?>" class="btn btn-danger" onclick="return confirm('Are you Sure To Remove this file from your Folder??')"> <i class="fa fa-trash-o"></i> Remove</a></td>
            <?php
$i++;
}
if (isset($_GET['remove'])) {
    $id=$_GET['remove'];
    $del=$conn->query("DELETE FROM teams where team_id='$id'");
    if ($del) {
    ?>
    <script>
        window.alert('DELETED Successifully')
        window.location.href='users'
    </script>
    <?php
  }  
}

            ?>
</tr></tbody></table></div></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
