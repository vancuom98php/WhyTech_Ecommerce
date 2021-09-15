@extends('admin_layout')

@section('admin_title', 'Admin - Slider')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Liệt kê các slider
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
                <table class="table table-striped b-t b-light" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th scope="col" width="250px">Tên slider</th>
                            <th scope="col" width="250px">Hình ảnh</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col" width="150px">Hiển thị</th>
                            <th scope="col" width="50px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $slider->slider_name }}</td>
                                <td><img src="{{ $slider->slider_image }}" width="150px" height="75px"
                                        alt="{{ $slider->slider_name }}"></td>
                                <td><span class="text-ellipsis">{{ $slider->slider_desc }}</span></td>
                                <td><span class="text-ellipsis">
                                        @if ($slider->slider_status == 0)
                                            <a href="{{ route('slider.inactive', ['id' => $slider->slider_id]) }}"><i
                                                    class="fa-category fa fa-eye-slash"></i></a>
                                        @else
                                            <a href="{{ route('slider.active', ['id' => $slider->slider_id]) }}"><i
                                                    class="fa-category fa fa-eye"></i></a>
                                        @endif
                                    </span></td>
                                <td>
                                    <a href="{{ route('slider.edit', ['id' => $slider->slider_id]) }}"
                                        class="active category-action" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a href="{{ route('slider.delete', ['id' => $slider->slider_id]) }}"
                                        class="active category-action confirm_delete_slider" ui-toggle-class="">
                                        <i class="fas fa-trash-alt text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('backend/js/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/list.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endsection
