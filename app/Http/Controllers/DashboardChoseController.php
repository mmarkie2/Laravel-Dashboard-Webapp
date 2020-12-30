<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardChoseRequest;
use App\Http\Requests\DashboardRequest;
use App\Models\Dashboard;
use App\Models\UserToPrimaryDashboard;
use Illuminate\Http\Request;

class DashboardChoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboards=Dashboard::orderBy("created_at","asc")->get();
        return view("dashboardChose", compact("dashboards"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DashboardChoseRequest $request)
    {
        if (\Auth::user()==null)
        {
            return view("home");
        }
        $userToPrimaryDashboard=new UserToPrimaryDashboard();
        $userToPrimaryDashboard->user_id= \Auth::user()->id;
        $userToPrimaryDashboard->dashboard_id=$request->dashboard_id;
        if ($userToPrimaryDashboard->save())
        {
            return redirect()->route("dashboard");
        }
        return "error";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
