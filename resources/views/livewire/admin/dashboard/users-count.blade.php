<div class="col-lg-3 col-md-6 col-sm-12">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner ">
            <div class="d-flex justify-content-between align-items-center">
                <h3 wire:loading.remove>{{ $usersCount }}</h3>
                <div wire:loading wire:target="getUsersCount">
                    <x-animations.ballbeat />
                </div>
                <select wire:change="getUsersCount($event.target.value)" class="form-control" style="max-width: 150px;">
                    <option value="TODAY">Today</option>
                    <option value="30">30 days</option>
                    <option value="60">60 days</option>
                    <option value="360">360 days</option>
                    <option value="MTD">Mount to Date</option>
                    <option value="YTD">Year to Date</option>
                </select>
            </div>

            <p>Users</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('admin.users')}}" class="small-box-footer">View Appointments<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>