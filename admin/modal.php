  <style type="text/css">
  #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
}

#message p {
  padding: 10px 35px;
  font-size: 12px;
}

.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Logging Out....</h4>
                    </div>
                    <div class="modal-body">
                     <p>Dear <b><?php echo $_SESSION['name'];?></b><br>

                    Are you sure to logout from System ?
                     </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a href="logout"><button type="button" class="btn btn-primary"><i class="fa fa-sign-out"></i> Confirm</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="files" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Upload New Documents</h4>
                    </div>
                    <div class="modal-body">
                     <form action="reserve.php" method="POST" enctype="multipart/form-data">
                      <fieldset>
           

                    <label>Enter document name:</label>
                     <input type="text" name="dname" class="form-control" style="margin-top: 5px"><br>
                     
                          <label>attach file:</label>
                      <input type="file" name="file" id="" placeholder="assess" class="form-control" required=""><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a href="logout"><button type="submit"  name="send" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button></a>
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Staff Members Registration</h4>
                      <p>Please fill out all fields because is required</p>
                    </div>
                    <div class="modal-body">
<form role="form" method="POST" action="reg.php" enctype="multipart/form-data">
            <div class="form-group input-group">
                            <span class="input-group-addon">Full Name:</span>
                            <input type="text" style="text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
            <div class="form-group input-group">
                            <span class="input-group-addon">Email:</span>
                            <input type="email"  class="form-control" name="email">
                        </div>
            <div class="form-group input-group">
                            <span  class="input-group-addon">Phone number:</span>
                            <input type="text"  class="form-control" name="phone" maxlength="14" minlength="10">
                        </div>
                        <div class="form-group input-group">
                            <span  class="input-group-addon">add Picture:</span>
                            <input type="file" class="form-control" name="image">
                        </div>
            
                        <div class="form-group input-group">
                            <span class="input-group-addon">Password:</span>
                            <input type="password" id="psw" class="form-control" name="password" required  minlength="8" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
</div>
                            <div id="message">
  <h5>Password must contain the following:</h5>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div><br>
                   
                      <label><p>Select Role of User at <?php echo $_SESSION['school'];?></p></label>
                       <div class="form-group">
                    <input type="radio" name="access"
                    <?php if (isset($access) && $access==3) echo "checked";?>
                    value="3">  Dean of study
                       <br></div>

                    <div class="form-group input-group"> 
                        <input type="radio" name="access"
                    <?php if (isset($access) && $access==6) echo "checked";?>
                    value="6">  Accountant Manager
                    <br></div>

                 <div class="form-group input-group"> 
                        <input type="radio" name="access"
                    <?php if (isset($access) && $access==2) echo "checked";?>
                    value="2">  Discpline assistant
                    <br>

                   </div>
                   <div class="form-group">
                    <input type="radio" name="access"
                    <?php if (isset($access) && $access==4) echo "checked";?>
                    value="4">   Stock Manager
                                    </div>

<div class="form-group">
                    <input type="radio" name="access"
                    <?php if (isset($access) && $access==5) echo "checked";?>
                    value="5">   Teacher
                                    </div>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a href="logout"><button type="submit"  name="regist" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button></a>
                    </div>
                  </fieldset>
                  </form>
                  </div>
                </div>
              </div>
            </div>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}
myInput.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>




