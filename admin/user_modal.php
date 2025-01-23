 <div class="modal fade" id="order_<?php echo $row['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Choose Operation you want</h4>
                    </div>
                    <div class="modal-body">
                     <form action="" id="form" method="post" enctype="multipart/form-data">
                      <fieldset>
           

                    <label>Check</label>
                    <select name="status" id="status" class="form-control">
                      <option selected disabled>Choose Status</option>
                      <option value="1">Approve</option>
                      <option value="2">Cancel</option>
                    </select>
                    <input type="hidden" name="roll" id="roll" value="<?php echo $row['order_id'];?>">
                  </div><center><div id="msg" style="display:none"></div></center>
                  
                    <div class="modal-footer">
                 <button type="button"  name="reg_approve" id="reg_approve" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                    
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>

<div class="modal fade" id="full_<?php echo $row['orderinfo_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Choose Operation you want</h4>
                    </div>
                    <div class="modal-body">
                     <form action="server" id="form" method="post" enctype="multipart/form-data">
                      <fieldset>
           

                    <label>Check</label>
                    <select name="status" id="status_" class="form-control">
                      <option selected disabled>Choose Status</option>
                      <option value="success">Approve</option>
                      <option value="Cancel">Cancel</option>
                      <option value="fail">fail</option>
                    </select>
                    <input type="hidden" name="orderinfo_id" id="orderinfo_id" value="<?php echo $row['orderinfo_id'];?>">
                  </div><center><div id="msg" style="display:none"></div></center>
                  
                    <div class="modal-footer">
                 <button type="submit"  name="reg_approve_order" id="reg_approve_order" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                    
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>
<div class="modal fade" id="feed_<?php echo $row['orderinfo_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Choose Operation you want</h4>
                    </div>
                    <div class="modal-body">
                     <form action="server" id="form" method="post" enctype="multipart/form-data">
                      <fieldset>
           

                    <label>Check</label>
                    <select name="status" id="status_" class="form-control">
                      <option selected disabled>Choose Status</option>
                      <option value="Delived">Approve</option>
                      <option value="Denied">Cancel</option>
                    </select>
                    <input type="hidden" name="orderinfo_id" id="orderinfo_id" value="<?php echo $row['orderinfo_id'];?>">
                  </div><center><div id="msg" style="display:none"></div></center>
                  
                    <div class="modal-footer">
                 <button type="submit"  name="appove_order" id="reg_approve_order" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                    
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>
