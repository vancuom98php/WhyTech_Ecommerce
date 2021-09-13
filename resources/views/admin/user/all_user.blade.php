@extends('admin_layout')

@section('admin_title', 'Admin - User')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Quản lý danh sách user
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                @if (session()->has('notification'))
                    <div class="alert alert-danger" style="font-weight: bold;">
                        {!! session('notification') !!}
                    </div>
                @endif
                @if (session()->has('notification_update-success'))
                    <div class="alert alert-success" style="font-weight: bold;">
                        {!! session('notification_update-success') !!}
                    </div>
                @endif
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th scope="col">Tên hiển thị</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Author</th>
                            <th scope="col">User</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <form action="{{ route('user.assign', ['id' => $admin->admin_id]) }}" method="POST">
                                @csrf
                                <tr>
                                    <td>
                                        <label class="i-checks m-b-none"><input type="checkbox"
                                                name="post[]"><i></i></label>
                                    </td>
                                    <td>{{ $admin->admin_name }}</td>
                                    <td><img width="60px" height="60px" style="border-radius: 50%;"
                                            src="{{ asset($admin->admin_avatar) }}" alt="{{ $admin->admin_name }}"></td>
                                    <td><span class="text-ellipsis">{{ $admin->admin_email }}</span></td>
                                    <td><span class="text-ellipsis">{{ $admin->admin_phone }}</span></td>
                                    <td><input type="radio" name="role_name" value="admin"
                                            {{ $admin->hasRole('admin') ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="role_name" value="author"
                                            {{ $admin->hasRole('author') ? 'checked' : '' }}></td>
                                    <td><input type="radio" name="role_name" value="user"
                                            {{ $admin->hasRole('user') ? 'checked' : '' }}></td>
                                    <td>
                                        <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-hand-lizard"></i></button>
                                        <a href="{{ route('user.delete', ['id' => $admin->admin_id]) }}" id="{{ $admin->admin_id }}" auth_id="{{ Auth::id() }}" class="btn btn-sm btn-danger confirm_delete_user"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        {{ $admins->links() }}
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('backend/js/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/list.js') }}"></script>

@endsection
