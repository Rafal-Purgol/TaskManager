<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $tasks = Task::orderBy('dt_ddl', 'asc')->get();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $i =0;
        $userlist =[];
        $users = DB::table('users')->select('id', 'name')->get();
        foreach ($users as $user =>$key)
        {
            array_push($userlist,
            [   'label' => $users[$i]->name,
                'value' => $users[$i]->id
            ],);
        $i++;
        };

        return view('create', compact('userlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'dt_ddl' => 'required',
            'rspusr' => 'required'
        ]);
        $task = new Task();
        $task -> title = $request->title;
        $task -> dscrpt = $request->dscrpt;
        $task -> dt_ddl = $request->dt_ddl;
        $task -> addusr = Auth::user()->id;
        $task -> rspusr = $request->rspusr;
        $task->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = DB::table('tasks')->where('rspusr', '=', $id)->get();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $statuses = [
        [
            'label' => 'Done',
            'value' => 'true',
        ],
        [
            'label' => 'Not Done',
            'value' => 'false',
        ]
        ];
        return view('edit', compact('statuses','task'));
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
        $task = Task::findOrFail($id);
        $task -> title = $request->title;
        $task -> dscrpt = $request->dscrpt;
        $task -> dt_ddl = $request->dt_ddl;
        $task -> is_com = $request->is_com;
        $task -> rspusr = $request->rspusr;
        $task->save();
        return redirect()->route('index');
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
