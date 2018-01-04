<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Datatables -->
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/jszip.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/pdfmake.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/vfs_fonts.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/dataTables.bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/dataTables.buttons.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/buttons.bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/buttons.html5.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/buttons.print.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/dataTables.rowGroup.min.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?=base_url('assets/js/custom.min.js');?>"></script>
<script src="<?=base_url('assets/js/auto.js');?>"></script>
<script src="<?=base_url('assets/vendors/toastr/build/toastr.min.js');?>"></script>
<script src="<?=base_url('assets/vendors/select2/dist/js/select2.min.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendors/datepicker/js/bootstrap-datepicker.min.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendors/moment/min/moment.js');?>"></script>
<script src="<?=base_url('assets/vendors/daterangepicker/daterangepicker.js');?>"></script>
<script>
$(document).ready(function() {
    $('#dtables').DataTable({
       "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                className: 'btn btn-dark',
                buttons: [
                    'excel'
                ]
            }
        ]
    });
    
    $('#otables').DataTable();

    $(".js-select2").select2();
        
    <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php }else if($this->session->flashdata('error')){  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php }else if($this->session->flashdata('warning')){  ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php }else if($this->session->flashdata('info')){  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
});

function getmnbyunit() {
	var x = document.getElementById("myidunit").value;
    window.location = "aksesmn?idunit="+x;
}

function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
</script>
