@extends("layouts.dashboardFormTemplate")

@section("action")
    action="{{ route('dashboardUpdate', $dashboard) }}"
@endsection
@section("put_section")
    <input name="_method" type="hidden" value="PUT">
@endsection


@section("name_text"){{$dashboard->name}}@endsection
