  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script>
$(document).ready(function() {
setInterval( function() {
var hours = new Date().getHours();
$(".hours").html(( hours < 10 ? "0" : "" ) + hours);
}, 1000);
setInterval( function() {
var minutes = new Date().getMinutes();
$(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
},1000);
setInterval( function() {
var seconds = new Date().getSeconds();
$(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
},1000);
});
$("input[type=file]").change(function () {
        var fieldVal = $(this).val();

        // Change the node's value by removing the fake path (Chrome)
        fieldVal = fieldVal.replace("C:\\fakepath\\", "");

        if (fieldVal != undefined || fieldVal != "") {
            $(this).next(".custom-file-label").attr('data-content', fieldVal);
            $(this).next(".custom-file-label").text(fieldVal);
        }
    });
</script>
