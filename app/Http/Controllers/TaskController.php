<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Mail\Mailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $users = User::all();

         
        // $myTask =  DB::table('tasks')
        // ->leftJoin('comments','tasks.user_id','=','comments.task_id')
        // ->select('comments.content','comments.created_at')
        // ->where('tasks.user_id',auth()->id())
        // ->get();  
        //return $myTask;      
        return view('tasks.index', compact('tasks','users'));
    }
    public function getMyComments(Request $request,$id)
    {
        // dd($id);
        // dd($request->input(''));
        // // $id=$request->input('id');
        $myTask =  DB::table('comments')
        ->leftJoin('tasks','comments.task_id','=','tasks.id')
        ->select('comments.content','comments.created_at')
        ->where('tasks.user_id',auth()->id())
        ->where('tasks.id',$id)
        ->get(); 
        $tasks=Task::find($id,['description']);
        return view('tasks.commentsTask', compact('myTask','id','tasks'));
        //rerunjson_decode($myTask,true);        
        //return view('task.index',compact('algo'));
    }
    public function save(Request $request)
    {
        //dd($request->all());
        // $request->validate([
        //     'description' => 'required',
        //     'date' => 'required',
        // ]);
        Task::create([
            'description' => $request->input('description'),
            'timeToExecution' => $request->input('timeToExecution'),
            'user_id' => $request->input('user_id'),
            'author_id' => $request->input('author'),
            //'password' => Hash::make($data['password']),
        ]);        
        notify()->success('Task create successfully ⚡️');
        return redirect()->back();//->with('success', 'Usuario creado con exito.');
    }
    // public function myTask()
    // {

    // }
    public function assigTask(Request $request)
    {
        //dd($request->all());
        Comment::create([
            'content'=>$request->input('comment'),
            'task_id'=>$request->input('idTask'),
        ]);
        // $findAuthor = new Comment();
        // $findAuthor->content=$request->input('comment');
        // $findAuthor->task_id=$request->input('idTask');
        // $findAuthor->save();

        $findAuthor=Task::find($request->input('idTask'),['author_id']);
        $usersAuthor=User::findOrFail($findAuthor,['email']);
        SendMail::dispatch($usersAuthor)->delay(now()->addMinutes(1));
        //Mail::to($usersAuthor)->send(new \App\Mail\SendMailable( $findAuthor));
        //dispatch(new SendMail($usersAuthor));
        notify()->success('Task content add successfully ⚡️');
        return redirect()->route('tasks.index');//->with('success', 'Usuario creado con exito.');

    }
}
