<?php
 include 'boot.php';
include'header.php';
?>

<?php
include'sidebar.php';

?>
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>List of Post or News</h3>
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <a href="addpost"><button class="btn btn-primary"><i class="fa fa-plus"></i> Add new Post or Event</button></a>
            <a href="index" class="btn btn-warning">Home</a>
            <div class="form-panel">
              <div class="table table-responsive">
        <table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr><th>#</th>
        <th>Event title</th>
        <th>Event Category</th>
        <th>event photo</th>
        <th>Post Date</th>
        <th>Action</th>

    </tr>
  </thead>
  <tbody>
    <?php
      
      $i=1;
      foreach (ltg::select_posts() as $row) {
      ?>
      <tr><td><?php echo $i;?></td>
        <td><?php echo $row['posthead']; ?> </td>
        <td><?php echo $row['ev_name']; ?> </td>

         <td><a href="<?php echo $row['post_photo'];?>" target="_blank"><img src="<?php echo $row['post_photo'];?>" width="50" height="50"></a></td>
        <td><?php echo  date ('d F Y',strtotime($row['date_time'])); ?></td>
        <td>
          <a href="delete?eventdel=<?php echo $row['postid'];?>"><button onclick="return confrim('Are You sure You want to delete this Post')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
        </td>
      </tr>
      <?php
      $i++;
      }
    ?>

  </tbody>
</table>

      </div>
    </div>

  </div>
</section></section>
<?php include'footer.php';
    include'script.php';
  ?>


      