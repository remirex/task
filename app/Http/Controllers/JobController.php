<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addJob()
    {
        return view('add-job');
    }

    public function publishJob()
    {
        $allJobs = Job::all();

        return view('publish-job', compact('allJobs'));
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();

        $data = [
            'title' => $input['title'],
            'email' => $input['email'],
            'description' => $input['description'],
            'usr_id' => Auth::user()->id
        ];

        $job = new Job();
        $job->fill($data)->save();

        return redirect()->back();
    }
}
