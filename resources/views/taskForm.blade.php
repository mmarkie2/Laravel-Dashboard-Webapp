@extends("layouts.taskFormTemplate")

@section("script")
    <script>
        $( document ).ready(function() {
            $( '#severity' ).val(3)
        });

    </script>
@endsection

@section("form")
    <form role="form" action="{{ route('taskStore', $dashboard_id ) }}" id="task-form"
          method="post" enctype="multipart/form-data"   >
@endsection



