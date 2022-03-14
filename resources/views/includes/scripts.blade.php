<!-- jQuery -->
<script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend')}}/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="{{asset('backend')}}/plugins/toastr/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        window.addEventListener('show-form', event => {
            $('#form').modal('show');
        })
        window.addEventListener('show-delete-modal', event => {
            $('#confirmationModal').modal('show');
        })
        window.addEventListener('hide-form', event => {
            $('#form').modal('hide');
            // console.log(event.detail);
            toastr.success(event.detail.message, 'Success!');
        })
        window.addEventListener('hide-delete-modal', event => {
            $('#confirmationModal').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })
    });
</script>