<?php

namespace App;
use App\User;
use App\TaskRepository;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable =['name'];

    /*$user=App\User::find(1);
    foreach($user->tasks as $task)
    {
    	echo $task->name;
    }*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
