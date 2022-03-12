<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('backend')}}/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="{{asset('backend')}}/bootstrap/js/popper.min.js"></script>
<script src="{{asset('backend')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('backend')}}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('backend')}}/assets/js/app.js"></script>
<script src="{{asset('backend')}}/plugins/toastr/toastr.js"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('backend')}}/assets/js/custom.js"></script>
<script src="{{asset('backend')}}/assets/js/widgets/modules-widgets.js"></script>

<script>
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-bottom-right",
            "progressBar": true,
        }
        window.addEventListener('hide-form', event => {
            $('#form').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })
        window.addEventListener('hide-delete-modal', event => {
            $('#confirmationModal').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })
    });
</script>
<script>
    window.addEventListener('show-form', event => {
        $('#form').modal('show');
    })
    window.addEventListener('hide-form', event => {
        $('#form').modal('hide');
    })
    window.addEventListener('show-delete-modal', event => {
        $('#confirmationModal').modal('show');
    })
</script>
@livewireScripts