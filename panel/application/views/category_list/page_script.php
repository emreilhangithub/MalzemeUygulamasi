
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="<?php echo base_url("assets/js/third_pary/bootstrap-switch.min.js"); ?>" >
	
</script>



<script>

    $(document).ready(function () {


        // Bootstrap Toggle init
        $('.toggle_check').bootstrapToggle();

        // isActive Change

        $('.toggle_check').change(function () {

            var isActive = $(this).prop('checked');
            var base_url = $(".base_url").text();
            var id       = $(this).attr("dataID");
            $.post(base_url + "category/isActiveSetter", {id: id, isActive: isActive}, function (response) {});

        })


    })

</script>
assets/
  <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url("assets/js/jquery-1.8.3.min.js"); ?>"></script>
   <script src="<?php echo base_url("assets/js/jquery.nicescroll.js"); ?>" type="text/javascript"></script>
   <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
   <script src="<?php echo base_url("assets/js/jquery.blockui.js"); ?>"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo base_url("assets/uniform/jquery.uniform.min.js"); ?>"></script>
   <script type="text/javascript" src="<?php echo base_url("assets/data-tables/jquery.dataTables.js"); ?>"></script>
   <script type="text/javascript" src="<?php echo base_url("assets/data-tables/DT_bootstrap.js"); ?>"></script>


   <!--common script for all pages-->
   <script src="<?php echo base_url("assets/js/common-scripts.js"); ?>"></script>

   <!--script for this page only-->
   <script src="<?php echo base_url("assets/js/editable-table.js"); ?>"></script>

   <!-- END JAVASCRIPTS -->
   <script>
       jQuery(document).ready(function() {
           EditableTable.init();
       });
   </script>