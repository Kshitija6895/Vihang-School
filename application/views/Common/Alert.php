<!-- Alert Message -->
<div id="alertBox">
    <?php if ($this->session->flashdata("Success")!=null) : ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong>
            <i class="ace-icon fa fa-check"></i>
            Success!
        </strong>
        <?php echo $this->session->flashdata('Success'); ?>
        <br />
    </div>
    <?php endif;
	if ($this->session->flashdata("Error")) : ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong>
            <i class="ace-icon fa fa-times"></i>
            Error!
        </strong>
        <?php echo $this->session->flashdata('Error'); ?>
        <br />
    </div>
    <?php endif; ?>
</div>
<!-- //Alert Message -->
<!-- <script>
setTimeout(function() {
    $('#alertBox').fadeOut('fast');
}, 1000); // <-- time in milliseconds
</script> -->