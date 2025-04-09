<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationForm;
use App\Library\Common;
use App\Models\ApplicationDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApplicationFormController extends Controller
{
    public function storeData(ApplicationForm $request)
    {
        try{

            $requestData = $request->validated();
            $imageName = '';
    
            if ($request->hasFile('resume')) {
                $resume = $request->file('resume');
                $imageName =time().'.'.$resume->extension();
                $fileContent = file_get_contents($resume->getRealPath());
    
                Storage::disk('public')->put('resumes/'.$imageName, ($fileContent));
            }
    
            $requestData['resume'] = $imageName;
            $requestData['status'] = 'A';
            ApplicationDetails::storeResume($requestData);
    
            return redirect('/')->with('success', 'Application Form Submitted Successfully');
            
        } catch(Exception $e) {
            return Common::commonException($e);
        }
    }

    public function applicationData()
    {
        try{
            $data = ApplicationDetails::getAplicationData();
            $statusCode = 301;

            
            if (!empty($data)) {
                $statusCode = 200;
            }

            return view('AppliedUser', ['status_code' => $statusCode,'appliedData' => $data]);
        }catch(Exception $e) {
            return Common::commonException($e);
        }
    }

    public function downloadResume($resume)
    {
        try{
            return Storage::disk('public')->download("resumes/$resume");
        }catch(Exception $e) {
            return Common::commonException($e);
        }
    }

    public function logout()
    {
        try{
            Auth::logout();
            return redirect('/')->with('logout', 'Logout SuccessFully');
        }catch(Exception $e) {
            return Common::commonException($e);
        }
    }

    public function statusUpdate($status, $id)
    {
        try{
            $data = ApplicationDetails::updateAplicationData($id, ['status' => $status]);
            return redirect('/applicationData')->with('success', 'Deleted SuccessFully');

            print_r($status);exit;
        }catch(Exception $e) {
            return Common::commonException($e);
        }
    }
}
