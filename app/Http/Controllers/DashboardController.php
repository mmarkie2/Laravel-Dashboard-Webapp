<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()==null)
        {
            return view("home");
        }

        $user_to_primary_dashboard=DB::table('user_to_primary_dashboards') ->where('user_id', '=',  \Auth::user()->id)->get();
      if(sizeof( $user_to_primary_dashboard)==1)
      {
          $isDashboard=true;
        $dashboard_id=$user_to_primary_dashboard[0]->dashboard_id;
        $dashboard=Dashboard::find($dashboard_id);
          $tasks = DB::table('tasks')->where("dashboard_id","=",$dashboard_id)->get();
          return view("dashboard", compact("tasks", "dashboard"));
      }
      else{
          return view("dashboardChose");
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dashboard=new Dashboard();
        return view("dashboardForm" , compact("dashboard"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DashboardRequest $request)
    {
        if (\Auth::user()==null)
        {
            return view("home");
        }
        $dashboard=new Dashboard();
        $dashboard->user_id= \Auth::user()->id;
        $dashboard->name=$request->name;
        if ($dashboard->save())
        {
            return redirect()->route("dashboardChose");
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
