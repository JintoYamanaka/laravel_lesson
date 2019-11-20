<?php

use Illuminate\Database\Seeder;
use App\Folder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $folder_id = Folder::find($id);
        $first_data = Folder::first(); // 1行目だけを取得

        foreach (range(1, 3) as $num) {
            DB::table('tasks')->insert([
                'folder_id' => $first_data->id,
                'title' => "サンプルタスク {$num}",
                'status' => $num,
                'due_date' => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
