<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddJob;
use App\Http\Requests\ApplyJob;
use App\Http\Requests\TrackId;
use App\Models\CareerApplication;
use App\Models\CareerJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AddJobController extends Controller
{
    public function addJob(AddJob $request, $id = '') {
        $requestData = $request->validated();
        $requestData['is_active'] = 1;
        $requestData['slug'] = str_replace(' ', '_', strtolower($requestData['title']));

        CareerJobs::updateOrCreate(['id' => $id], $requestData);

        $msg = 'Job Updated SuccessFully';

        if (empty($id)) {
            $msg = 'Job Added SuccessFully';
        }
        return redirect('/admin/dashboard')->with('success', $msg);
        
    }

    public function getJob() {
        $getJob = CareerJobs::where('is_active', 1)
                                ->orderBy('id', 'desc')->paginate(5);

        if (!empty(Auth::user()) && Auth::user()->role == 'Admin') {
            return view('admin/screens/jobs/index', ['job' => $getJob]);
        }
        
        return view('/frontend/screens/home', ['job' => $getJob]);
    }

    public function closeJob($id) {
        $getJob = CareerJobs::where('id', $id)->update(['is_active' => 0]);
        return redirect('/admin/dashboard')->with('success', 'Job Removed SuccessFully');
    }

    public function getAppliedJobs() {
        $appliedJobs = CareerApplication::with('careerJob')->paginate(10);
        return view('admin/screens/applications/index', ['job' => $appliedJobs]);
    }

    public function changeStatus(Request $request, $id) {
        $status = $request->input('status') ?? '';
        CareerApplication::where('id', $id)->update(['status' => $status]);
        return redirect('/admin/appliedJobs')->with('success', 'Status Updated');
    }

    public function showJob($id) {
        $selectedUser = CareerApplication::with('careerJob')->where('id', $id)->First();
        return view('/admin/screens/applications/show', ['user' => $selectedUser]);
    }

    public function edit($id) {
        $getSelJob = CareerJobs::where('id', $id)->First();
        return view('/admin/screens/jobs/edit', ['selJob' => $getSelJob]);
    }

    public function selectedJob($job, $id) {
        
        $getSelJob = CareerJobs::with('skills')->where('id', $id)->First();
        return view('/frontend/screens/apply-job', ['selectedJob' => $getSelJob]);
    }

    public function storeJob(ApplyJob $request) {
        $requestData = $request->validated();
        $requestData['track_id'] = $trackId = rand(100000, 999999);
        $requestData['status'] = 'New';
        $data = CareerApplication::create($requestData);

        return redirect('/')->with('success', "Applied SuccessFully, Your Track Id is <strong> $trackId </strong>");
    }

    public function trackStatus($id) {
        $getData = CareerApplication::with('careerJob')->where('user_id', $id)->get();
        return view('frontend/screens/track-application', ['data' => $getData]);
    }
}
