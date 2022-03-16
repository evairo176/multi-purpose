@push('scripts')
<!-- SweetAlert2 -->
<script src="{{asset('backend')}}/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed');

                }
            })
        })
        window.addEventListener('deleted', event => {
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: event.detail.message,
                showConfirmButton: true,
                timer: 2000
            })
        })
    });
</script>
@endpush