<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Dashboard;
use App\Models\Task;
use App\Models\UserToPrimaryDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dashboard_id)
    {

        return view("taskForm" , compact("dashboard_id" ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        if (\Auth::user()==null)
        {
            return view("home");
        }

            $task=new Task();
            $task->user_id= \Auth::user()->id;
            $task->dashboard_id=$request->dashboard_id;
            $task->title=$request->title;
        $task->severity=$request->severity;
            $task->contents=$request->contents;

            if ($task->save())
            {
                return redirect()->route("dashboard");
            }
            else{
                return "error";
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
        $task = Task::find(intval($id));

        if (\Auth::user()->id != $task->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not authorized.']);
        }
        return view('taskEditForm', compact('task'));
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
        $task = Task::find(intval($id));

        if (\Auth::user()->id != $task->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not authorized.']);
        }
        $task->title=$request->title;
        $task->contents=$request->contents;
        if($task->save()) {
            return redirect()->route('dashboard');
        }
        return "Error.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find(intval($id));
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if(\Auth::user()->id != $task->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        if($task->delete()){
            return redirect()->route('dashboard')->with(['success' => true,
                'message_type' => 'success',
                'message' => 'Pomyślnie skasowano']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Wystąpił błąd podczas kasowania']);

    }
}
