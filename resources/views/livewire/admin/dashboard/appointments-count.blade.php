<div class="col-lg-3 col-md-6 col-sm-12">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner ">
            <div class="d-flex justify-content-between align-items-center">
                <h3 wire:loading.remove>{{ $appointmentsCount }}</h3>
                <div wire:loading wire:target="getAppointmensCount">
                    <x-animations.ballbeat />
                </div>
                <select wire:change="getAppointmensCount($event.target.value)" class="form-control" style="max-width: 150px;">
                    <option value="">All</option>
                    <option value="scheduled">Scheduled</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <p>Appointments</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('admin.appointments')}}" class="small-box-footer">View Appointments<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>