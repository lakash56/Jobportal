<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function __construct()
    {
        // $this->middleware('employer', ['except' => array('index', 'show', 'apply')]);
        $this->middleware(['employer'], ['except' => [
            'index', 'show', 'apply', 'listAllJobs', 'search'
        ]]);
    }

    //
    public function index()
    {
        $jobs = Job::latest()->limit(10)->where('status', 1)->get();
        $companies = Company::limit(8)->get();
        return view('welcome', compact('jobs', 'companies'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date')
        ]);
        return redirect()->back()->with('message', 'Job Posted Succesfully ');
    }

    public function myjob()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function edit($id)
    {
        $jobs = Job::findOrFail($id);
        return view('jobs.edit', compact('jobs'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $jobs = Job::findOrFail($id);
        $jobs->update($request->all());
        return redirect()->back()->with('message', 'Jobs Sucessfully Updated');
    }

    public function apply(Request $request, $id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application Sent!!');
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    public function listAllJobs()
    {
        //dd('WORKING');

        $jobs = Job::latest()->orderByDesc('created_at')->get();
        $categories = Category::latest()->get();

        return view('jobs.alljobs', compact('jobs', 'categories'));
    }

    public function search(Request $request)
    {

        $title =  $request->input('title');
        $type = $request->input('type');


        $jobs = Job::where('title', 'LIKE', '%' . ucfirst($title) . '%')
        ->where('type' , 'LIKE', '%' . $type . '%' )
        ->get();

        if ($jobs->isEmpty()) {
           abort(404,'data not found');
        }

        $categories = Category::latest()->get();

        return view('jobs.alljobs', compact('jobs', 'categories'));
    }
}
