<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningRecord extends Model
{
    protected $fillable = ['user_id', 'date', 'distance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createRunningRecord($data)
    {
        $runningRecord = new RunningRecord();

        // テスト用でuser_idを固定
        $runningRecord->user_id = 1;
        // $runningRecord->user_id = $data['user_id'];
        $runningRecord->date = $data['date'];
        $runningRecord->distance = $data['distance'];
        $runningRecord->save();
        return $runningRecord;
    }
}
