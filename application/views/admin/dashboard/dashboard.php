<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
// print_r($stripe); exit();
?>
<?php init_head(); ?>
<div id="wrapper">
    <!-- <div class="screen-options-area"></div>
    <div class="screen-options-btn">
        <?php //echo _l('dashboard_options'); ?>
    </div> -->
    <div class="content">
        <div class="row">

            <?php $this->load->view('admin/includes/alerts'); ?>

            <?php hooks()->do_action( 'before_start_render_dashboard_content' ); ?>

            <div class="clearfix"></div>

            <div class="col-md-12 mtop30" data-container="top-12">
                <?php render_dashboard_widgets('top-12'); ?>
            </div>

            <?php hooks()->do_action('after_dashboard_top_container'); ?>

            <div class="col-md-6" data-container="middle-left-6">
                <?php render_dashboard_widgets('middle-left-6'); ?>
            </div>
            <div class="col-md-6" data-container="middle-right-6">
                <?php render_dashboard_widgets('middle-right-6'); ?>
            </div>

            <?php hooks()->do_action('after_dashboard_half_container'); ?>

            <?php if($start_role != 1) { ?>
            <div class="col-md-8" data-container="left-8">
                <?php render_dashboard_widgets('left-8'); ?>
            </div>
            <?php }?>

             <?php if($start_role == 1) {?>
            <div class="col-md-8" data-container="left-8">
                <?php render_dashboard_widgets_case('left-8',$start_role); ?>
            </div>
            <?php }?>

            <?php if($start_role != 1) {?>
            <div class="col-md-4" data-container="right-4">
                <?php render_dashboard_widgets('right-4'); ?>
            </div>
            <?php }?>

            <?php if($start_role == 1) {?>
            <div class="col-md-4" data-container="right-4">
                <?php render_dashboard_widgets_case('right-4',$start_role); ?>
            </div>
            <?php }?>

            <div class="clearfix"></div>

            <div class="col-md-4" data-container="bottom-left-4">
                <?php render_dashboard_widgets('bottom-left-4'); ?>
            </div>
             <div class="col-md-4" data-container="bottom-middle-4">
                <?php render_dashboard_widgets('bottom-middle-4'); ?>
            </div>
            <div class="col-md-4" data-container="bottom-right-4">
                <?php render_dashboard_widgets('bottom-right-4'); ?>
            </div>

            <?php hooks()->do_action('after_dashboard'); ?>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(to left, #86e259, #0dbddc, #0099ff)">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" style="text-align: center;">Welcome to dipay</h3>
      </div>
      <div class="modal-body" style="background: red">
        <h4 style="color: white;text-align: center;">You logged in the first time. Please make sure that you complete your profile, that everything work fine on this site!</h4>
        <h4 style="color: white;text-align: center;">Dont forget to fill the payment requirements on stripe in the Editing Profile Page!</h4>
      </div>
    </div>

  </div>
</div>
<script>
    app.calendarIDs = '<?php echo json_encode($google_ids_calendars); ?>';

</script>
<?php init_tail(); ?>
<?php $this->load->view('admin/utilities/calendar_template'); ?>
<?php $this->load->view('admin/dashboard/dashboard_js'); ?>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){

        var stripe0 = '<?php echo json_encode($stripe)?>';
        var stripe = JSON.parse(stripe0);

        console.log(stripe[0].stripe_email);
        // console.log("dashboard")
        if(stripe[0].stripe_email == null || stripe[0].stripe_password == null ) {
            $('#wrapper').css("margin-left","0");
            $('#myModal').modal('show');
        }
        
    });
</script>