<?php

namespace App\Http\Controllers;

use App\Models\JobEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FrontendJobController extends Controller
{
    public function index()
    {
        return view("job-form.index");
    }

    public function store(Request $request)
    {

        $validator = $this->validate_request($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->upload_file($request);
        $data = JobEnquiry::create($data);
        Session::flash('success', "Job Enquiry Submitted Successfully");
        return redirect()->back()->with('Success', "Job Enquiry Submitted Successfully");
    }

    protected function validate_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => ['required', 'string', 'min:2', 'max:100', 'regex:/^[a-zA-Z\s\.\'-]+$/'],
            'email'            => ['required', 'email:rfc,dns', 'max:255'],
            'phone_number'     => ['required', 'string', 'regex:/^[0-9\+\-\s\(\)]{10,15}$/'],
            'qualification'    => ['required', 'string', 'max:255'],
            'position_applied' => ['required', 'string', 'max:255'],
            'message'          => ['required', 'string', 'max:3000'],
            'resume_file'      => ['nullable', 'file', 'mimes:pdf', 'max:5120'], // Max 5MB
        ], [
            'name.regex'           => 'Please enter a valid full name containing only letters.',
            'email.email'          => 'Please enter a valid email address.',
            'phone_number.regex'   => 'Please enter a valid phone number (10 to 15 digits).',
            'resume_file.mimes'    => 'The resume must be a PDF file.',
            'resume_file.max'      => 'The resume file size must not exceed 5 MB.',
        ]);

        return $validator;
    }

    protected function upload_file(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('resume_file')) {
            $file = $request->file('resume_file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $folder_path = 'assets/enquiry-manager/resumes';
            $file->storeAs($folder_path, $file_name, 'public');
            $data['resume_file_path'] = $folder_path . '/' . $file_name;
        }

        return $data;
    }
}
