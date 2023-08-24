<?php

/**
 * @var \App\View\AppView $this
 * @var \CakeLte\View\Helper\CakeLteHelper $this->CakeLte
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') . ' | ' . strip_tags($this->CakeLte->getConfig('app-name')) ?></title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- daterange picker -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/daterangepicker/daterangepicker.css') ?>
    <!-- iCheck for checkboxes and radio inputs -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>
    <!-- Bootstrap Color Picker -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>
    <!-- Select2 -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/select2/css/select2.min.css') ?>
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>
    <!-- Bootstrap4 Duallistbox -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') ?>
    <!-- BS Stepper -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/bs-stepper/css/bs-stepper.min.css') ?>
    <!-- dropzonejs -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/dropzone/min/dropzone.min.css') ?>
    <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
    <?= $this->Html->css('CakeLte.style') ?>
    <?= $this->element('layout/css') ?>
    <?= $this->fetch('css') ?>
</head>

<body class="hold-transition <?= $this->CakeLte->getBodyClass() ?>">
    <div class="wrapper">
       <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <?= $this->Html->image('CakeLte./AdminLTE/dist/img/avatar.png', array('class' => 'animation__shake', 'alt' => 'User Image','height'=>'60','width'=>'60')) ?>
        <!-- <img class="animation__shake" src="dist/img/avata.png" alt="loading..." height="60" width="60"> -->
      </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?= $this->CakeLte->getHeaderClass() ?>">
            <?= $this->element('header/main') ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?= $this->CakeLte->getSidebarClass() ?>">
            <!-- Brand Logo -->
            <a href="<?= $this->Url->build('/') ?>" class="brand-link">
                <?= $this->Html->image($this->CakeLte->getConfig('app-logo'), ['alt' => $this->CakeLte->getConfig('app-name') . ' logo', 'class' => 'brand-image']) ?>
                <span class="brand-text font-weight-light"><?= $this->CakeLte->getConfig('app-name') ?></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <?= $this->element('sidebar/main') ?>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <?= $this->element('content/header') ?>
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <?= $this->element('aside/main') ?>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <?= $this->element('footer/main') ?>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
    <!-- Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>

    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bs-stepper/js/bs-stepper.min.js') ?>

    <!-- Select2 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/select2/js/select2.full.min.js') ?>
<!-- Bootstrap4 Duallistbox -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ?>

    <!-- InputMask -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/moment/moment.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min.js') ?>
    <!-- date-range-picker -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/daterangepicker/daterangepicker.js') ?>
    <!-- bootstrap color picker -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>
    <!-- Bootstrap Switch -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>
    <!-- BS-Stepper -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bs-stepper/js/bs-stepper.min.js') ?>
    <!-- dropzonejs -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/dropzone/min/dropzone.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>
    <?= $this->element('layout/script') ?>
    <?= $this->fetch('script') ?>

    <script>
  $(function () {

    //state dropdown 
    var formUrl = "<?php echo $this->Url->build(['controller' => 'Employees', 'action' => 'ajax']); ?>";
        //get the value of state of origing
        var state_id = $('#state-of-origin-id').val();

        $('#state-of-origin-id').change(function(e) {
            var stateId = $('#state-of-origin-id option:selected').val();
            e.preventDefault()

            console.log(stateId)
            //make an api call to locals controller and return the related locals 
            //serialize form data 
            var formData = stateId;
            //get form action 

            //change the value to loading...
            $('#local-id').html(`<option value="-1">Loading...</option>`);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: formUrl,
                data: {
                    data: stateId
                },
                beforeSend: function(xhr) { // Add this line
                    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                    //console.log(xhr);
                },
                success: function(status) {
                    //remove the value loading on success                
                    $('#local-id option[value="-1"]').remove();
                    $.each(status, function(key, value) {
                        $("#local-id").append($('<option></option>').val(value.id).html(value.name));
                        //set slected value from employee data 
                        $("#local-id option[value='<?php echo $employee->local_id ?>']").attr('selected', 'selected');
                    });
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr);
                    console.log(textStatus);
                    console.log(error);
                }
            });

        });
        
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()

    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

</body>

</html>