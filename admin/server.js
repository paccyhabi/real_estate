 $(document).ready(function() {
      $("#reg_approve").click(function() {
        var fd = new FormData();
        var delay = 2000;
        var status=$('#status').val();
        fd.append('status', status);
        fd.append('roll', $('#roll').val());
        if (status=='') {
          $('#msg').html("<div class='alert alert-danger' style='font-size:16px'> Please Choose Status.</div>");
          $('#status').focus();
          return false;
        }
       
        $.ajax({
          url: 'server.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $('#msg').show()
            $('#msg').html(
           '<img src="../img/Loader.gif" width="50" height="50"/><p style="color:green;font-size:16px"> Please wait... </p>'
       );
       },
          success: function(data)
                   {
                    setTimeout(function() {
                      $('#msg').show()
                    $('#msg').html(data);
                }, delay);
      
             }
        });
      });
    });

