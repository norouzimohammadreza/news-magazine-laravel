@props([
    'usersCount',
    'adminsCount',
    'allUser',
])
<div class="col-sm-6 col-lg-3">
    <a href="{{route('user.index')}}" class="text-decoration-none">
        <div class="card text-white bg-juicy-orange mb-3">
            <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-users">

                    </i> {{__('dashboard.users')}}</span> <span class="badge badge-pill right">{{$usersCount}}</span></div>
            <div class="card-body">
                <section class="d-flex justify-content-between align-items-center font-12">
                    <span class=""><i class="fas fa-users-cog"></i> {{__('dashboard.admins')}} <span class="badge badge-pill mx-1">{{$adminsCount}}</span></span>
                    <span class=""><i class="fas fa-user"></i> {{__('dashboard.all_users')}} <span class="badge badge-pill mx-1">{{$allUser}}</span></span>
                </section>
            </div>
        </div>
    </a>
</div>
