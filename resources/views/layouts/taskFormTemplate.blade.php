
@extends("layouts.head")


@section('style')
    <style>

        form{
            width: 100%;
            height: 100%;

            display: flex;
            justify-content: center;
        }
        #inputs {
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        .rcorners {
            border-radius: 25px;
            border: 2px solid #060705;
            padding: 20px;
            margin: 10px;
            width: 200px;
            height: 300px;
        }

        .title {
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

        .contents {
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
    @yield("script")
@endsection

@section('main-content')

    <section id="tasks">
        <div class="table-container">
            <div class="title"><h3>Task</h3></div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-primary ">
                <!-- /.box-header -->
                <!-- form start -->
                @yield("form")
                {{ csrf_field() }}
                <div class="box">
                    <div class="box-body" id="inputs">
                        <div style="visibility:hidden; width:0; height:0" class="form-group{{ $errors->has('dashboard_id')?'has-error':'' }}" >
                            <label><b>dashboard_id</b></label> <br>
                            <textarea name="dashboard_id" id="dashboard_id" cols="20" rows="3"  required>
                                    {{$dashboard_id}}
                                </textarea>
                        </div>

                        <div class="form-group{{ $errors->has('title')?'has-error':'' }}" >
                            <label><b>title</b></label> <br>
                            <textarea name="title" id="title" cols="40" rows="1" required>@yield("title_text")</textarea>
                        </div>
                        <div class="form-group{{ $errors->has('severity')?'has-error':'' }}" >
                            <label><b>severity(1 for most severe)</b></label> <br>
                            <input type="number" name="severity" id="severity"  min="1" max="5"  required>

                        </div>
                        <div class="form-group{{ $errors->has('contents')?'has-error':'' }}" >
                            <label><b>contents</b></label> <br>
                            <textarea name="contents" id="contents" cols="40" rows="10" required>@yield("contents_text")</textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success" id="createTask">Commit</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </section>

@endsection('main-content')
