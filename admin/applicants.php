
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>list of New Applicants</h2>
        <div class="row mt">
          <div class="col-lg-12">
           <a href="index"><button class="btn btn-warning"><i class="fa fa-reply"></i> Back</button></a> <a href="../login#sign_up" target="_blank"><button class="btn btn-primary"><i class="fa fa-plus"></i> Regist new</button></a>
            <div class="form-panel">
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
                                                   email
                                                </th>
                                                <th>
                                                   phone number
                                                </th>

                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
     foreach (ltg::users() as $row) {
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
        <td><?php echo $row['user_email']; ?></td>
        <td><?php echo $row['user_phone']; ?></td>
        
        <td><a href="" data-toggle="modal" data-target="#mantain_<?php echo $row['user_id'];?>" class="btn btn-primary"> <i class="fa fa-cogs"></i> Manage</a>

            <?php
            include 'user_modal.php';
$i++;
}
if (isset($_GET['remove'])) {
    $id=$_GET['remove'];
    $del=$conn->query("DELETE FROM users where userid='$id'");
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
</tr></tbody></table></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
