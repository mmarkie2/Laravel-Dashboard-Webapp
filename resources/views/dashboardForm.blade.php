@extends("layouts.dashboardFormTemplate")

@section("action")
    action="{{ route('dashboardStore', $dashboard) }}"
@endsection
