<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobDetails;
use App\Models\JobDetails as ModelsJobDetails;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    
    public function storeJobDetails(JobDetails $request)
    {
        $requestData = $request->validated();
        $requestData['status'] = 'A';
        ModelsJobDetails::storeJobDetails($requestData);
        return redirect('/applicationData')->with('success', 'Job Details Added Submitted Successfully');
    }

    public function getJobDetails()
    {
        $jobDetails = ModelsJobDetails::jobJobDetails();

        return view('/JobLists', ['jobData' => $jobDetails]);
    }

    public function getSelectedJob($jobId)
    {
        $selJobDetails = ModelsJobDetails::getSelectedJobDetails($jobId);

        return view('/ApplicationForm', ['selectedJob' => $selJobDetails]);
    }

    public function removeSelectedJob($jobId)
    {
        $status = ModelsJobDetails::removeSelectedJob($jobId);

        return redirect('/')->with('success', 'Job Details Removed Successfully');
    }
}
