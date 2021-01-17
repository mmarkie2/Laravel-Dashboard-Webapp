
@extends("layouts.head")

@section("style")
    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
        }
        .box {
            display: flex;
            justify-content: center;
        }
        .box-footer{
            float: right;
        }
    </style>
@endsection

@section("main-content")
    <div class="table-container">
        <div class="title"> <h3></h3> </div>
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
            <form role="form"  @yield("action") id="task-form"
                  method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                @yield("put_section")
                <div class="box">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">
                            <label><b>Name</b></label> <br>
                            <textarea name="name" id="name" cols="20" rows="3" required>@yield("name_text")</textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer"><button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection






