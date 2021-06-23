<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Http\Requests\JobPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class JobController extends Controller
{

    public function __construct(){
        $this->middleware('employer',['except'=>array('index','show','apply','listAllJobs','search','searchJobs','homeSearch')]);
    }

    //
    public function index(){
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $companies = Company::limit(8)->get();
        $categories = Category::with('jobs')->get();
        return view('welcome',compact('jobs','companies','categories'));
    }

    public function show($id,Job $job){

        //dd($job->position);
        $data = [];

        $jobBasedOnCategories = Job::latest()
                                ->where('category_id',$job->category_id)
                                ->whereDate('last_date','>',date('Y-m-d'))
                                ->where('id','!=',$job->id)
                                ->where('status',1)
                                ->limit(6)
                                ->get();
        array_push($data,$jobBasedOnCategories);
       $jobBasedOnCompany = Job::latest()
                                ->where('company_id',$job->company_id)
                                ->whereDate('last_date','>',date('Y-m-d'))
                                ->where('id','!=',$job->id)
                                ->where('status',1)
                                ->limit(6)
                                ->get();
        array_push($data,$jobBasedOnCompany);
        /* $jobBasedOnPosition = Job::latest()->where('position','LIKE','%'.$job->position.'%')
                                            ->whereDate('last_date','>',date('Y-m-d'))
                                            ->where('id','!=',$job->id); */
        //dd($jobBasedOnPosition);
        //array_push($data,$jobBasedOnPosition);

        $collection = collect($data);
        $unique = $collection->unique("id");
        $jobRecommendations = $unique->values()->first();
       return view('jobs.show', compact('job','jobRecommendations'));

    }

    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        /* dd($request->all()); */
        Job::create([
            'user_id'=>$user_id,
            'company_id'=> $company_id,
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'category_id'=>request('category'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date'),
            'number_of_vacancy'=>request('no_of_vacancy'),
            'experience_year'=>request('experience_year'),
            'gender'=>request('gender'),
            'salary'=>request('salary')
        ]);
        return redirect()->back()->with('message','Job Posted Succesfully ');
    }

    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function edit($id){
        $jobs = Job::findOrFail($id);
        return view('jobs.edit',compact('jobs'));
    }

    public function update(Request $request,$id){
// dd($request->all(),$jobs);
       $jobs = Job::findOrFail($id);
       $jobs->update($request->all());
       return redirect()->back()->with('message','Jobs Sucessfully Updated');
    }

    public function apply(Request $request,$id){
        $jobId =Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application Sent!!');
    }

    public function applicant(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicants',compact('applicants'));
    }

    public function listAllJobs()
    {
        //dd('WORKING');

        $jobs = Job::latest()->orderByDesc('created_at')->paginate(10);
        $categories = Category::latest()->get();

        return view('jobs.alljobs', compact('jobs', 'categories'));
    }

    public function search(Request $request)
    {
        //front page
        $search= $request->get('search');
        $address= $request->get('address');
            if($search && $address){
                $jobs = Job::where('title', 'LIKE', '%' . ucfirst($search) . '%')
                ->where('type' , 'LIKE', '%' . $search . '%' )
                ->where('category_id' , 'LIKE', '%' . $search . '%' )
                ->where('address','LIKE','%' . $address . '%')
                ->paginate(10);
                return view('jobs.alljobs',compact('jobs'));

            }

        $title =  $request->input('title');
        $type = $request->input('type');
        $category = $request->input('category_id');
        $address = $request->input('address');


        $jobs = Job::where('title', 'LIKE', '%' . ucfirst($title) . '%')
        ->where('type' , 'LIKE', '%' . $type . '%' )
        ->where('category_id' , 'LIKE', '%' . $category . '%' )
        ->where('address','LIKE','%' . $address . '%')
        ->paginate(1);

        if ($jobs->isEmpty()) {
        return redirect()->route('all.jobs')->with('message','No Jobs Foound!!');
        }

        $categories = Category::latest()->get();

        return view('jobs.alljobs', compact('jobs', 'categories'));
    }

    public function searchJobs(Request $request){
        $keyword = $request->get('keyword');
        $users = Job::where('title','like','%'.$keyword.'%')->limit(5)->get();
        return response()->json($users);
    }

    public function homeSearch(Request $request){
        $search= $request->get('search');


                $jobs = Job::where('title', 'LIKE', '%' . ucfirst($search) . '%')
                ->orwhere('type' , 'LIKE', '%' . $search . '%' )
                ->orwhere('category_id' , 'LIKE', '%' . $search . '%' )
                ->orwhere('address','LIKE','%' . $search . '%')
                ->paginate(10);

                $categories = Category::latest()->get();

                if ($jobs->isEmpty()) {
                    return redirect()->route('all.jobs')->with('message','No Jobs Foound!!');
                    }

                return view('jobs.alljobs',compact('jobs','categories'));



    }
}
