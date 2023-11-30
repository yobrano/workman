<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceGroup;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.group.index');
    }

            /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getServiceGroup(Request $request)
    {
        if ($request->ajax()) {
            $data = ServiceGroup::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =<<<HERADOC
                    <a href="/admin/service/group/$row->id/edit"  class="edit btn btn-success btn-sm">Edit</a>
                    <a  href="/admin/service/group/$row->id/delete" class="delete btn btn-danger btn-sm" onclick="return confirm(Are you sure want to Delete?)">Delete</a>
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
                'group_name' => 'required',
                'group_image' => 'required|mimes:jpeg,png,jpg|max:1048',
                'group_description' => ''
            ]);

            // if(){ 
            //     $fileName = time() . '_' . $request->file->getClientOriginalName();
            //     $filePath = $request->file('file')->storeAs('uploads/schoolslip', $fileName, 'public');}
            $fileName = time() . '_' . $request->file('group_image')->getClientOriginalName();
            $filePath = $request->file('group_image')->storeAs('uploads/service/group', $fileName, 'public');


            $project = ServiceGroup::create([
                'group_name' => $request->group_name,
                'group_image' => $filePath,
                'group_description' =>  $request->group_description
            ]);
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Group Create [{$project->id}] Success");
            return back()->with('message', 'Service Group Created Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Group Create Failed: {$th->getMessage()}");
            return back()->with('error', "Service Group Create Failed");
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
        $project = ServiceGroup::where('id','=',$id)->first();
        // dd($project);
        return view('admin.services.group.update',compact('project'));
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
            // $request->validate([
            //     'group_name' => 'required',
            //     // 'group_image' => 'required|mimes:jpeg,png,jpg|max:1048',
            //     'group_description' => ''
            // ]);

            $group = ServiceGroup::where('id','=',$id)->first();
            if(!is_null($request->file('group_image'))){ 
               $fileName = time() . '_' . $request->file('group_image')->getClientOriginalName();
               $filePath = $request->file('group_image')->storeAs('uploads/service/group', $fileName, 'public');
               $group->group_image = $filePath;
            }
            $group->group_name=$request->group_name;
            $group->group_description=$request->group_description;
            $group->save();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Group Update [{$group->id}] Success");
            return back()->with('message', 'Service Group Updated Successfully');

        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Group Update Failed: {$th->getMessage()}");
            return back()->with('error', "Service Group Update Failed");
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
            ServiceGroup::where('id','=',$id)->delete();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Group Delete [{$id}] Success");
            return back()->with('message', 'Service Group Deleted Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb =  "DELETED";
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Group Delete Failed: {$th->getMessage()}");
            return back()->with('error', "Service Group Delete Failed");
        }
    }
}
