

<!-- Bootstrap JavaScript Libraries -->
<script src="assets/js/popper.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>

<!-- JQUERY CDN -->

<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/custom.js"></script>

   

<!-- OWL CAROUSEL -->
<script src="assets/js/owl.carousel.min.js"></script>

 <!-- ALERTIFY JS -->
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



<!-- CART -->
<script src="assets/js/cart.js"></script>

<!-- CAROUSEL -->
<script src="assets/js/owl-carousel.js"></script>
<!-- 
MODAL -->
<script>
  $(document).ready(function(){ 
    $("input[name=payment_mode]").change(function() {
        var test = $(this).val();
        $(".show-hide").hide();
        $("#"+test).show();
    }); 
});
</script>





<script>
  alertify.set('notifier','position', 'top-right');
  <?php if(isset($_SESSION['message'])) { 
   
   ?>
   alertify.success('<?= $_SESSION['message']; ?>');
  <?php 
  unset($_SESSION['message']);

} ?>


</script>


</body>

</html>