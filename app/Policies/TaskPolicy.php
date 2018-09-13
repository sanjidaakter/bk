<?php

namespace App\Policies;


use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;


class Taskpolicy
{
    use HandlesAuthorization;

    

    public function destroy(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
