<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Requests\applications\applicationrequest;

class ApplicationController extends Controller
{
    //make by Mrvirus
    public function StoreCv(ApplicationRequest $request)
    {
        $application = $request->validated();
        $path = $request->cv_path->store('CV');
        $application['cv_path'] = $path;
    
        $applicationupload = Application::create($application);
        $success['name'] = $applicationupload->full_name;
        $success['success'] = true;
    
        return response()->json($success, 201);
    }
    

    
    public function index()
    {
        $applications = Application::orderBy('created_at', 'desc')->get();

        return $applications->map(function ($app) {
            $app->cv_url = $app->cv_path ? asset('storage/' . $app->cv_path) : null;
            return $app;
        });
    }

    
    public function approve($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        return response()->json(['message' => 'Application approved']);
    }

  
    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return response()->json(['message' => 'Application rejected']);
    }
}
