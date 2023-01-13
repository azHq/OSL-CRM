<div class="crms-title row bg-white">
    <div class="col  p-0">
        <h3 class="page-title m-0">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                {{ $icon }}
            </span> {{ $title }}
        </h3>
    </div>
    <div class="col p-0 text-end">
        <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
            @stack('list')
        </ul>
    </div>
</div>