@push('styles')
<link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="{{asset('backend')}}/plugins/editors/markdown/simplemde.min.css">
@endpush
<div>
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Add New Appointment <i class="far fa-comment-dots"></i></h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form wire:submit.prevent="createAppointment">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-0">
                                <label for="client">Client</label>
                                <select class="form-control" id="client_id" wire:model.defer="state.client_id">
                                    <option>Select client</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">

                        </div>
                        <div class="form-group mb-0">
                            <label for="date">Date</label>
                            <div wire:ignore class="input-group date" id="appointDate" data-target-input="nearest" data-appointmentdate="@this">
                                <input type="text" wire:model.defer="state.date" class="form-control datetimepicker-input" id="appointDateInput" data-target="#appointDate" />
                                <div class="input-group-append" data-target="#appointDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">


                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <div wire:ignore class="input-group date" id="appointTime" data-target-input="nearest" data-appointmenttime="@this">
                                    <input type="text" wire:model.defer="state.time" class="form-control datetimepicker-input" id="appointTimeInput" data-target="#appointTime" />
                                    <div class="input-group-append" data-target="#appointTime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                                <label for="time">Appointment End Time</label>
                                <input wire:model.defer="state.appointment_end_time" id="appointmentTime" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." readonly="readonly">
                            </div>

                        </div>
                    </div>
                    <div wire:ignore class="form-group mb-0">
                        <label for="note">Note</label>
                        <textarea wire:model.defer="state.note" data-note="@this" class="form-control" id="note" rows="10">
                        </textarea>
                    </div>
                    <a href="#" class="btn btn-secondary mt-3 mb-0">
                        Cancel
                    </a>
                    <button id="submit" type="submit" class="btn btn-primary mt-3 mb-0">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{asset('backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>

<!-- <script src="{{asset('backend')}}/plugins/flatpickr/custom-flatpickr.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<script>
    $(document).ready(function() {

        // $('form').submit(function() {
        //     let date = $(this).data('appointmentdate');
        //     eval(date).set('state.date', $('#appointDateInput').val());
        //     let time = $(this).data('appointmenttime');
        //     eval(time).set('state.time', $('#appointTimeInput').val());
        // })
        $('#appointDate').datetimepicker({
            format: 'L'
        });

        $('#appointTime').datetimepicker({
            format: 'LT'
        });

        $('#appointDate').on('change.datetimepicker', function(e) {
            document.querySelector('#submit').addEventListener('click', () => {
                let date = $(this).data('appointmentdate');
                eval(date).set('state.date', $('#appointDateInput').val());
            });

        })
        $('#appointTime').on('change.datetimepicker', function(e) {
            document.querySelector('#submit').addEventListener('click', () => {
                let time = $(this).data('appointmenttime');
                eval(time).set('state.time', $('#appointTimeInput').val());
            });

        })
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