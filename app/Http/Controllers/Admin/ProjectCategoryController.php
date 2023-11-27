<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.projects.categories.index');
    }

        /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories(Request $request)
    {
        if ($request->ajax()) {
            $data = ProjectCategory::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =<<<HERADOC
                    <a href="/admin/project/category/$row->id/edit"  class="edit btn btn-success btn-sm">Edit</a>
                    <a  href="/admin/project/category/$row->id/delete" class="delete btn btn-danger btn-sm" onclick="return confirm(Are you sure want to Delete?)">Delete</a>
                    HERADOC;
                    
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
                'category_name' => 'required',
                'category_image' => 'required|mimes:jpeg,png,jpg|max:1048',
                'category_description' => ''
            ]);

            // if(){ 
            //     $fileName = time() . '_' . $request->file->getClientOriginalName();
            //     $filePath = $request->file('file')->storeAs('uploads/schoolslip', $fileName, 'public');}
            $fileName = time() . '_' . $request->file('category_image')->getClientOriginalName();
            $filePath = $request->file('category_image')->storeAs('uploads/project/category', $fileName, 'public');


            $project = ProjectCategory::create([
                'category_name' => $request->category_name,
                'category_image' => $filePath,
                'category_description' =>  $request->category_description
            ]);
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Category Create [{$project->id}] Success");
            return back()->with('message', 'Project Category Created Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Category Create Failed: {$th->getMessage()}");
            return back()->with('error', "Project Category Create Failed");
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
        $project = ProjectCategory::where('id','=',$id)->first();
        // dd($project);
        return view('admin.projects.categories.update',compact('project'));
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

            $project = ProjectCategory::where('id','=',$id)->first();
            if(!is_null($request->file('category_image'))){ 
               $fileName = time() . '_' . $request->file('category_image')->getClientOriginalName();
               $filePath = $request->file('category_image')->storeAs('uploads/project/category', $fileName, 'public');
               $project->category_image = $filePath;
            }
            $project->category_name=$request->category_name;
            $project->category_description=$request->category_description;
            $project->save();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Category Update [{$project->id}] Success");
            return back()->with('message', 'Project Category Updated Successfully');

        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Category Update Failed: {$th->getMessage()}");
            return back()->with('error', "Project Category Update Failed");
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
            ProjectCategory::where('id','=',$id)->delete();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Category Delete [{$id}] Success");
            return back()->with('message', 'Project Category Deleted Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb =  "DELETED";
            activity()->log("User:{$user->id},Verb:{$verb},Message:Project Category Delete Failed: {$th->getMessage()}");
            return back()->with('error', "Project Category Delete Failed");
        }
    }
}
