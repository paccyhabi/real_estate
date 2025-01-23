<?php include 'modal.php';
include 'simple_modal.php';
?>
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <script src="../lib/common-scripts.js"></script>
    <script src="../table/js/jquery.dataTables.min.js"></script>
    <script src="../table/js/dataTables.bootstrap4.min.js"></script>
    <script src="../table/js/script.js"></script>
    <script src="server.js"></script>
    <script src="../table/js/printThis.js">
        </script>

  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script type="text/javascript">

    $(document).ready(function() {
      var unique_id = $.gritter.add({
        title: 'Hello',
        text: 'Thanks for coming back in this system.',
        image: '',
        sticky: false,
        time: 8000,
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>