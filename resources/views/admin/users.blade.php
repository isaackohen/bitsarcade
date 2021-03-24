<div class="container-fluid">
    <div class="row page-title align-items-center">
        <div class="col-sm-4 col-xl-6">
            <h4 class="mb-1 mt-0">Users</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\User::get() as $user)
                                <tr>
                                    <td><a onclick="redirect('/admin/quickedit/{{ $user->_id }}')" class="btn btn-success p-1 float-right m-1">Quick</a> <a onclick="redirect('/admin/user/{{ $user->_id }}')" class="btn btn-primary m-1 p-1 float-right">Full Edit</a> <a onclick="redirect('/admin/quickedit/{{ $user->_id }}')">{{ $user->name }}</a></td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
