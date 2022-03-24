@push('styles')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('backend')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
<div>
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add New Appointment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add New Appointment</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ url('admin/appointments') }}" class="btn btn-danger mb-2">Cancel</a>
            </div>
        </div>
        <form wire:submit.prevent="createAppointment">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client">Client</label>
                            <select class="form-control @error('client_id') is-invalid @enderror" id="client_id" wire:model.defer="state.client_id">
                                <option>Select client</option>
                                @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Multiple</font>
                                </font>
                            </label>
                            <select class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="23" tabindex="-1" aria-hidden="true">
                                <option>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Alabama</font>
                                    </font>
                                </option>
                                <option>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Alaska</font>
                                    </font>
                                </option>
                                <option>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">California</font>
                                    </font>
                                </option>
                                <option>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Delaware</font>
                                    </font>
                                </option>
                                <option>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Tennessee</font>
                                    </font>
                                </option>
                                <option>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Texas</font>
                                    </font>
                                </option>
                                <option>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Washington</font>
                                    </font>
                                </option>
                            </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--focus" dir="ltr" data-select2-id="24" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                        <ul class="select2-selection__rendered">
                                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select a State" style="width: 492.5px;"></li>
                                        </ul>
                                    </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="appointmentDate">Appointment Date</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <x-datepicker wire:model.defer="state.date" id="appointmentDate" :error="'date'">

                                </x-datepicker>
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="appointmentTime">Appointment Time</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <x-timepicker wire:model.defer="state.time" id="appointmentTime" :error="'time'">

                                </x-timepicker>
                                @error('time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div wire:ignore class="form-group">
                            <label for="note">Note</label>
                            <textarea wire:model.defer="state.note" data-note="@this" class="form-control" id="note" rows="10">
                        </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="client">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" wire:model.defer="state.status">
                                <option value="">Select status</option>
                                <option value="SCHEDULED">Scheduled</option>
                                <option value="CLOSED">Closed</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="submit" type="submit" class="btn btn-primary mt-3 mb-0">
                    Save add appointment
                </button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
<!-- InputMask -->
<script src="{{asset('backend')}}/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- <script src="{{asset('backend')}}/plugins/flatpickr/custom-flatpickr.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<!-- Select2 -->
<script src="{{asset('backend')}}/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#note'))
            .then(editor => {
                document.querySelector('#submit').addEventListener('click', () => {
                    let note = $('#note').data('note');
                    eval(note).set('state.note', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
    })
</script>
@endpush