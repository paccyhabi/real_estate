

            <div class="modal fade" id="subcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Create new Category</h4>
                    </div>
                    <div class="modal-body">
                     <form action="" id="form" method="POST" enctype="multipart/form-data">
                      <fieldset>
           

                    <label>Add event name..</label>
                     <input type="text" name="subcate" id="event_name" class="form-control" style="margin-top: 5px"  value="" placeholder="type here....."><br>
                   </div>
                   <center><div id="msg"></div>
                   </center>
                   <div class="modal-footer">
                       <button type="button"  name="subcat" id="create" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                    
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>


<div class="modal fade" id="programs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Create Program</h4>
                    </div>
                    <div class="modal-body">
                     <form action="server" id="addclass" method="POST" enctype="multipart/form-data">
                      <fieldset>
           

                    <label>Enter in name</label>
                     <input type="text" name="cls" id="cls" class="form-control" style="margin-top: 5px"  value="" placeholder="type here....."><br>
                   </div>
                   <center><div id="msg"></div>
                   </center>
                   <div class="modal-footer">
                       <button type="submit"  name="subcat" id="addcls" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                    
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>





            <div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Create the new art Create Gallery</h4>
                    </div>
                    <div class="modal-body">
                     <form action="server" id="myform_gallery" method="POST" enctype="multipart/form-data">
                      <fieldset>
           

                    <label>Add Tittle</label>
                     <input type="text" name="title" id="headimage" class="form-control" style="margin-top: 5px"   placeholder="type here....." required><br>

                     <label>Choose Event</label>
                     <select class="form-control"name="event" id="event_category">
                       <option selected disabled>Choose Event</option>
                       <?php
                       foreach (ltg::select_events() as $row) {
                         ?>
                         <option value="<?php echo $row['ev_id'];?>"><?php echo $row['ev_name'];?></option>
                         <?php
                        } 
                       ?>
                     </select><br>

                     <label>Add Photo</label>
                     <input type="file" name="file-input" class="form-control" style="margin-top: 5px" id="files" placeholder="type here....." required><br>

                     <label>About to this image</label>
                     <textarea  name="about" id="about" class="form-control" placeholder="Type here...." required></textarea><br>

                     </div>
                     <div class="modal-footer">
                      
                       <button type="submit"  name="addgallery" id="addphoto" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                    
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>





    <div class="modal fade" id="users">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sign up Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" action="reg_year.php" enctype="multipart/form-data">
                <h5 class="text-center">Please Fill out this Fields</h5>
                <label>Enter in First name</label>
                <input type="text" name="fname" class="form-control" placeholder="........." required="true">

                <label>Enter in Last name</label>
                <input type="text" name="lname" class="form-control" placeholder="......" required="true">


                <label>Enter in E-Mail</label>
                <input type="email" name="email" class="form-control" placeholder="......" required="true">


                <label>Enter in Phone Number</label>
                <input type="number" maxlength="10" minlength="10" name="phone" class="form-control" placeholder="......" required="true">


                 <label>position</label>
                <input type="text" name="position" class="form-control" placeholder="......" required="true">

                <label>Attach Picture</label>
                <input type="file" name="file" class="form-control" placeholder="......" required="true">

                <i style="color: red">Please your pic must not bigger than 5Mb</i><br>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" name="send" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button></form>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div></div></div>


