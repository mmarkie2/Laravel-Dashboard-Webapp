<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardChoseRequest;
use App\Http\Requests\DashboardRequest;
use App\Models\Dashboard;
use App\Models\Task;
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

        UserToPrimaryDashboard::updateOrCreate(['user_id'=>\Auth::user()->id],['dashboard_id'=>$request->dashboard_id]);
        return redirect()->route("dashboard");

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $userToPrimaryDashboard = UserToPrimaryDashboard::find(intval($id));
        //Checking if current user is an owner
        if(\Auth::user()->id != $userToPrimaryDashboard->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not authorized.']);
        }
        if($userToPrimaryDashboard->delete()){
            return redirect()->route('dashboard')->with(['success' => true,
                'message_type' => 'success',
                'message' => 'Successful.']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Error']);
    }
}
