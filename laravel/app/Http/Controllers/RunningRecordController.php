<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRunningRecordRequest;
use App\Models\RunningRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RunningRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $yearMonth = $request->input('year_month', now()->format('Y/m'));
        list($currentYear, $currentMonth) = explode('/', $yearMonth);

        $user_id = Auth::user()->id;
        $runningRecords = RunningRecord::where('user_id', $user_id)->get();
        $totalDistance = $runningRecords->sum('distance');
        $thisMonthDistance = $runningRecords->where('date', '>=', \Carbon\Carbon::create($currentYear, $currentMonth)->startOfMonth())
                                            ->where('date', '<=', \Carbon\Carbon::create($currentYear, $currentMonth)->endOfMonth())
                                            ->sum('distance');

        return view('dashboard', compact('runningRecords', 'totalDistance', 'thisMonthDistance', 'currentYear', 'currentMonth'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $date = $request->input('date', now()->toDateString());
        return view('running_records.create', compact('date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRunningRecordRequest $request)
    {
        $user_id = Auth::user()->id;
        $request->merge(['user_id' => $user_id]);
        $runningRecord = RunningRecord::createRunningRecord($request->all());

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(RunningRecord $runningRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RunningRecord $runningRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RunningRecord $runningRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RunningRecord $runningRecord)
    {
        //
    }
}
