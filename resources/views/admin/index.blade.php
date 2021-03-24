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
        <div class="col-sm-8 cocol-md-8">
            <div class="card text-white bg-gradient-primary">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
<coin-ponent shadow="none" border-radius="5"></coin-ponent>

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
