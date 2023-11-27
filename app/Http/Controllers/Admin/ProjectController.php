<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.projects.index');
    }
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProjects(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =<<<JS
                    <a href="/admin/project/$row->id/edit"  class="edit btn btn-success btn-sm">Edit</a>
                    <a  href="/admin/project/$row->id/delete" class="delete btn btn-danger btn-sm" onclick="return confirm(Are you sure want to Delete?)">Delete</a>
                    JS;
                    
                    // '<a href="/admin/project/' . $row->id . '/edit"  class="edit btn btn-success btn-sm">Edit</a> <a  href="/admin/project/' . $row->id . '/delete" class="delete btn btn-danger btn-sm" onClick="return confirm(Are you sure want to Delete?)">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $user = auth()->user();
            $verb = $request->method();
            $request->validate([
                'project_name' => 'required',
                // 'project_image_path' => 'required',
                'project_detail' => ''
            ]);

            // if(){ 
            //     $fileName = time() . '_' . $request->file->getClientOriginalName();
            //     $filePath = $request->file('file')->storeAs('uploads/schoolslip', $fileName, 'public');}
            $fileName = time() . '_' . $request->file('project_image_path')->getClientOriginalName();
            $filePath = $request->file('project_image_path')->storeAs('uploads/project', $fileName, 'public');


            $project = Project::create([
                'project_name' => $request->project_name,
                'project_image_path' => $filePath,
                'project_detail' =>  $request->project_detail
            ]);
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Create [{$project->id}] Success");
            return back()->with('message', 'Project Created Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Create Failed: {$th->getMessage()}");
            return back()->with('error', "Project Create Failed");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::where('id','=',$id)->first();
        // dd($project);
        return view('admin.projects.update',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = auth()->user();
            $verb = $request->method();

            $project = Project::where('id','=',$id)->first();
            if(!is_null($request->file('project_image_path'))){ 
               $fileName = time() . '_' . $request->file('project_image_path')->getClientOriginalName();
               $filePath = $request->file('project_image_path')->storeAs('uploads/project', $fileName, 'public');
               $project->project_image_path = $filePath;
            }
            $project->project_name=$request->project_name;
            $project->project_detail=$request->project_detail;
            $project->save();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Update [{$project->id}] Success");
            return back()->with('message', 'Project Updated Successfully');

        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Update Failed: {$th->getMessage()}");
            return back()->with('error', "Project Update Failed");
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = auth()->user();
            $verb = "DELETED";
            Project::where('id','=',$id)->delete();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Delete [{$id}] Success");
            return back()->with('message', 'Project Deleted Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb =  "DELETED";
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Delete Failed: {$th->getMessage()}");
            return back()->with('error', "Project Delete Failed");
        }
    }
}
