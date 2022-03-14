@props(['id'])

<input {{ $attributes }} type="text" class="form-control datetimepicker-input" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}" onchange="this.dispatchEvent(new InputEvent('input'))" />

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#{{ $id }}').datetimepicker({
            format: 'L'
        });
        // $('#datetimepicker5').on('change.datetimepicker', function(e) {
        //     document.querySelector('#submit').addEventListener('click', () => {
        //         let time_start = $(this).data('appointmenttimestart');
        //         eval(time_start).set('state.appointment_start_time', $('#datetimepicker5').val());
        //     });

        // })
    });
</script>
@endpush