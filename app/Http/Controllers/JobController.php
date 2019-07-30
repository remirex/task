<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Job;
use App\Notifications\HrNotification;
use App\Notifications\ModeratorNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
        $allJobs = Job::all()->sortByDesc('created_at');

        return view('publish-job', compact('allJobs'));
    }

    public function storeJob(JobRequest $jobRequest)
    {
        $validation = $jobRequest->validated();

        if ($validation) {
            $input = $jobRequest->all();
        }

        $data = [
            'title' => $input['title'],
            'email' => $input['email'],
            'description' => $input['description'],
            'usr_id' => Auth::user()->id
        ];

        $job = new Job();
        $job->fill($data)->save();

        $jobByUser = Job::where('usr_id', '=', Auth::user()->id)->get();

        if (count($jobByUser) == 1) {

            // notify hr manager
            Notification::route('mail', $input['email'])
                ->notify(new HrNotification());

            // notify job moderator
            $emailModerator = User::where('role', 'moderator')->value('email');
            Notification::route('mail', $emailModerator)
                ->notify(new ModeratorNotification($jobRequest));

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
