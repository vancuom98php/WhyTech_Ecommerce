@extends('admin_layout')

@section('admin_title', 'Admin - Product')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Tất cả bình luận
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
                            <th scope="col" width="120px">Tên người gửi</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Bình luận</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Thời gian bình luận</th>
                            <th scope="col" width="50px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td><span class="text-ellipsis">{{ $comment->comment_name }}</span>
                                </td>
                                <td><span class="text-ellipsis">{{ $comment->comment_phone }}</span></td>
                                <td>
                                    @php
                                        $ratings = $comment->rating;
                                    @endphp
                                    <div class="rating" style="color: #ff9600;">
                                        @for($i = 0; $i < (int)$ratings; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @if($ratings - (int)$ratings > 0)
                                            <i class="fas fa-star-half-alt"></i>
                                        @endif
                                    </div>
                                    {{ $comment->comment_content }}
                                    <br>
                                    @foreach ($comment->commentChildren as $commentChildren)
                                        <div class="show_reply_comment" style="margin-left: 10px; color: #e79d70;">
                                            {{ $commentChildren->comment_name . ': ' . $commentChildren->comment_content }}
                                        </div>
                                    @endforeach
                                    <i class="fa fa-reply reply-icon" onclick="myReply({{ $comment->comment_id }})"></i>
                                    <div id="comment_reply_{{ $comment->comment_id }}" class="comment_reply">
                                        <form action="" method="POST">
                                            @csrf
                                            <textarea
                                                class="form-control input-add comment_content_{{ $comment->comment_id }}"
                                                name="comment_content" id="" rows="3"></textarea>
                                            <br>
                                            <button class="btn btn-info btn-reply" type="button"
                                                data-comment_id="{{ $comment->comment_id }}">Trả lời</button>
                                        </form>
                                    </div>
                                </td>
                                <td><span class="text-ellipsis">
                                        <a href="{{ route('product.detail', ['product_slug' => $comment->product->product_slug]) }}"
                                            target="_blank">
                                            {{ $comment->product->product_name }}
                                        </a>
                                    </span></td>
                                <td><span class="text-ellipsis">{{ $comment->comment_date }}</span></td>
                                <td>
                                    <a href="{{ route('comment.delete', ['id' => $comment->comment_id]) }}"
                                        class="active category-action confirm_delete_comment" ui-toggle-class="">
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
    <script type="text/javascript">
        function myReply(commentId) {
            if (document.getElementById("comment_reply_" + commentId).style.display == "block")
                document.getElementById("comment_reply_" + commentId).style.display = "none";
            else
                document.getElementById("comment_reply_" + commentId).style.display = "block";
        }
    </script>

@endsection
