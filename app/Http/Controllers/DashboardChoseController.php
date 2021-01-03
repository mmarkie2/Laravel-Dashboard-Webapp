<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardChoseRequest;
use App\Http\Requests\DashboardRequest;
use App\Models\Dashboard;
use App\Models\UserToPrimaryDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
        $querry=DB::table('user_to_primary_dashboards')
            ->where('user_id', '=',  \Auth::user()->id)->get();
        if( $querry->isEmpty())
        {
            $userToPrimaryDashboard=new UserToPrimaryDashboard();
            $userToPrimaryDashboard->user_id= \Auth::user()->id;
            $userToPrimaryDashboard->dashboard_id=$request->dashboard_id;
            if ($userToPrimaryDashboard->save())
            {
                return redirect()->route("dashboard");
            }
            else{
                return "error";
            }
        }
        else
        {
           $id= $querry[0]->id;
          $this-> update($request,$id);
        }


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


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DashboardChoseRequest $request, $id)
    {
        $userToPrimaryDashboard= UserToPrimaryDashboard::find($id);
        if(   $userToPrimaryDashboard->user_id== \Auth::user()->id )

        {
            $userToPrimaryDashboard->dashboard_id=$request->dashboard_id;
            if ($userToPrimaryDashboard->save())
            {

                return redirect()->route("dashboardChose");
            }
            else{
                return "error";
            }

        }
        else{
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not authorized.']);
        }
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
