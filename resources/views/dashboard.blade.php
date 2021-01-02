<html>

@extends("layouts.head")

</html>


@section('main-content')

    <section id="tasks" >
@foreach($tasks as $task)

        <div class="rcorners">
           <div class="title">{{$task->title}}</div>
            <div class="contents">{{$task->contents}}</div>
            <button class="butt">delete</button>
        </div>

@endforeach
    </section>
<style>
    #tasks
    {
        display: flex;
    }

    .rcorners {
        border-radius: 25px;
        border: 2px solid #060705;
        padding: 20px;
        margin:10px;
        width: 200px;
        height: 300px;
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
    }

</style>
@endsection('main-content')
