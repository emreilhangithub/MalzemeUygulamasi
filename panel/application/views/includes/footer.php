 <!-- BEGIN FOOTER -->
   <div id="footer">
       <?php echo date("Y"); ?> &copy; Mustafa Emre İlhan BTI Bilişim Danışmanlık Yazılım.
   </div>
   <!-- END FOOTER -->


<?php 

$this->load->view("includes/include_script");

?>
 <script type="text/javascript">
     $(document).ready(function() {
         $("#add").click(function() {
             $('#mytable tbody>tr:last').clone(true).insertAfter('#mytable tbody>tr:last');
             return false;
         });
     });
 </script>
