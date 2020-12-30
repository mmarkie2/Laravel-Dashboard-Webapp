<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="table-container">
    <div class="title">
        <h3>Chose dashboard:</h3>
    </div>
    @auth
        <table data-toggle="table" id="dashboardsTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Użytkownik</th>
                <th>Data dodania</th>
                <th>Komentarz</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dashboards as $dashboard)
                <tr id={{$dashboard->id}}>
                    <td>{{$dashboard->id}}</td>
                    <td>{{$dashboard->user->name}}</td>
                    <td>{{$dashboard->created_at}}</td>
                    <td>{{$dashboard->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>

        <form role="form"  action="{{ route('dashboardChoseStore') }}"
              method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <input type="number" id="dashboard_id"  name="dashboard_id">
           <button type="submit">Utwórz</button>

        </form>
 <script>
     $(document).ready(function() {
         $('#dashboardsTable').find("tr").on("click", function () {

         });
     });
 </script>
    @endauth
</div>

@guest
    <div class="table-container">
        <b>Zaloguj się aby przejrzeć komentarze.</b>
    </div>
@endguest
</body>
</html>
