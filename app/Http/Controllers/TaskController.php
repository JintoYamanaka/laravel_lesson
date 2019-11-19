<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;
use App\Task; // ★ 追加

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();

        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        // $tasks = Task::where('folder_id', $current_folder->id)->get();
        $tasks = $current_folder->tasks()->get(); // ★

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }
}
