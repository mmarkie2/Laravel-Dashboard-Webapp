

@extends("layouts.head")

@section("style")
    <style>
        #tasks
        {
            display: flex;
        flex-wrap:wrap;
        }

        .rcorners {
            border-radius: 25px;
            border: 2px solid #060705;
            padding: 20px;
            margin:10px;
            width: 400px;

        }
        .title
        {
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-size: 30px;
            letter-spacing: 2px;
            word-spacing: 2px;
            color: #000000;
            font-weight: normal;
            text-decoration: none solid rgb(68, 68, 68);
            font-style: italic;
            font-variant: normal;
            text-transform: none;
        overflow-wrap: break-word;
        }
        .contents
        {
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-size: 15px;
            letter-spacing: 2px;
            word-spacing: 2px;
            color: #343232;
            font-weight: normal;
            text-decoration: none solid rgb(68, 68, 68);
            font-style: italic;
            font-variant: normal;
            text-transform: none;
        overflow-wrap: break-word;
        }
        textarea {
        resize: none;
        }

#dashboardMenu a,div
{
    margin-right:10px;margin-left:10px;

}
    </style>

@endsection("style")


@section('main-content')
    @auth
    <div id="dashboardMenu" style="font-size:20px; display:flex;flex-direction: row">
        <div >{{$dashboard->name}}</div>
        <a href="{{ route('taskCreate', $dashboard->id) }}" class="btn btn-success" id="addTask"  >add task</a>
        <a href="{{ route('dashboardEdit', $dashboard->id) }}" class="btn btn-primary" id="editDashboard"  >edit dashboard</a>
        <a href="{{ route('dashboardDestroy', $dashboard->id) }}" class="btn btn-danger" id="deleteDashboard"  >delete dashboard</a>
    </div>

    <div id="tasks" >
@foreach($tasks as $task)

        <div class="rcorners">
           <div  class="title">{{$task->title}}</div>
            <div class="contents">{{$task->contents}}</div>
            <a href="{{ route('taskEdit', $task->id) }}" class="btn btn-primary">edit</a>
            <a href="{{ route('taskDestroy', $task->id) }}" class="btn btn-danger" >delete</a>
        </div>

@endforeach
    </div>
    @endauth
    @guest
        <div class="table-container">
            <b>Please login to use all features.</b>
        </div>
    @endguest
@endsection('main-content')
