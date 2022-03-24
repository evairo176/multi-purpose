@props(['id','error'])

<input {{ $attributes }} type="text" class="form-control datetimepicker-input @error($error) is-invalid @enderror" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}" onchange="this.dispatchEvent(new InputEvent('input'))" />

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#{{ $id }}').datetimepicker({
            format: " YYYY", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years"
        });

    });
</script>
@endpush