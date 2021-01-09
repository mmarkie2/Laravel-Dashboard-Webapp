

@extends("layouts.head")

@section("style")
<style>
#dashboards
    {
width:50%;
margin:auto;
    }
</style>
@endsection("style")


@section('main-content')
@auth


    <div id="dashboards">
        <div class="title">
            <h3>Chose dashboard:</h3>
        </div>
        @foreach($dashboards as $dashboard)
            <div  id="{{$dashboard->id}}"  class='btn btn-primary btn-lg btn-block' style="margin: 10px">
                {{$dashboard->name}}
            </div>
        @endforeach
            <a href="{{ route('dashboardCreate') }}" class="btn btn-success">add dashboard</a>
    </div>

    <form style="visibility:hidden" role="form"  action="{{ route('dashboardChoseStore') }}"
          method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}

        <input type="number" id="dashboard_id"  name="dashboard_id">
        <button id="dashboardChoseSubmit"  type="submit">send</button>

    </form>
    <script>
        $(document).ready(function() {
            $('#dashboards').find("div").on("click", function () {
                $('#dashboard_id').val(this.id);
                $('#dashboardChoseSubmit').click();
            });
        });
    </script>
@endauth
@guest
    <div class="table-container">
        <b>Please login to use all features.</b>
    </div>
@endguest
@endsection('main-content')
