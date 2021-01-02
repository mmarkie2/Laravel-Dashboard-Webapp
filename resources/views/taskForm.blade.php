<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAI | Komentarze</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
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
</head>
<body>
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
        <form role="form"  action="{{ route('taskStore') }}" id="task-form"
              method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="box">
                <div class="box-body">
                    <div class="form-group{{ $errors->has('dashboard_id')?'has-error':'' }}" id="roles_box">
                        <label><b>dashboard_id</b></label> <br>
                        <textarea name="dashboard_id" id="dashboard_id" cols="20" rows="3" required></textarea>
                    </div>

                    <div class="form-group{{ $errors->has('title')?'has-error':'' }}" id="roles_box">
                        <label><b>title</b></label> <br>
                        <textarea name="title" id="title" cols="20" rows="3" required></textarea>
                    </div>
                    <div class="form-group{{ $errors->has('contents')?'has-error':'' }}" id="roles_box">
                        <label><b>contents</b></label> <br>
                        <textarea name="contents" id="contents" cols="20" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer"><button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
