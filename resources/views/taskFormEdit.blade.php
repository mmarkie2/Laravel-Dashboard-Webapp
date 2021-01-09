@extends("layouts.taskFormTemplate")



@section("form")
    <form role="form" id="comment-form" method="post" enctype="multipart/form-data"
          action="{{ route('taskUpdate', $task) }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">

@endsection

@section("title_text")
{{$task->title}}
@endsection

@section("script")
            <script>
                $(document).ready(function () {
                    $('#severity').val({{$task->severity}})
                });

            </script>
@endsection

@section("contents_text")
{{$task->contents}}
@endsection
