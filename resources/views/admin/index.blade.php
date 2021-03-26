<div class="container-fluid">
    <div class="row page-title align-items-center">
        <div class="col-sm-4 col-xl-6">
            <h4 class="mb-1 mt-0">Stats</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">New users</span>
                            <h2 class="mb-0">{{ \App\User::where('created_at', '>=', \Carbon\Carbon::today())->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Games</span>
                            <h2 class="mb-0">{{ \Illuminate\Support\Facades\DB::table('games')->where('created_at', '>=', \Carbon\Carbon::today())->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Control Events</span>
                            <h2 class="mb-0"><button class="btn btn-warning p-2" onclick="$.request('/admin/start-quiz');">Start Quiz</button>
                            <button class="btn btn-danger m-0 p-2" onclick="$.request('/admin/start-rain');">Start Rain</button>
                            <button class="btn btn-success m-0 p-2" onclick="$.request('/admin/start-premiumrain');">Super Drop</button>
                            <button class="btn btn-info m-0 p-2" onclick="$.request('/admin/discord-promocode');">Discord-code</button>
                            <button class="btn btn-info m-0 p-2" onclick="$.request('/admin/discord-vipcode');">Discord VIP-code</button></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Maintenance Mode</span>
                            <button class="btn btn-danger ml-1 m-0 p-2" onclick="$.request('/admin/artisan-down');">Mode On</button>
                            <button class="btn btn-success m-0 p-2" onclick="$.request('/admin/artisan-up');">Mode Off</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard">
        <div class="spinner-border d-flex ml-auto mr-auto"></div>
    </div>

    <div class="dashboard_games">
        <div class="spinner-border d-flex ml-auto mr-auto mt-3"></div>
    </div>
</div>
