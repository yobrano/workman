<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Location;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.presets.location.index');
    }
        /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLocations(Request $request)
    {
        if ($request->ajax()) {
            $data = Location::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =<<<JS
                    <a href="/admin/preset/location/$row->id/edit"  class="edit btn btn-success btn-sm">Edit</a>
                    <a  href="/admin/preset/location/$row->id/delete" class="delete btn btn-danger btn-sm" onclick="return confirm(Are you sure want to Delete?)">Delete</a>
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

   
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $user = auth()->user();
            $verb = $request->method();
            $request->validate([
                'location_name' => 'required'
                
            ]);

          
            $project = Location::create([
                'location_name' => ucwords($request->location_name)
            ]);
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Location Create [{$project->id}] Success");
            return back()->with('message', 'Service Location Created Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Location Create Failed: {$th->getMessage()}");
            return back()->with('error', "Service Location Create Failed");
        }
    }

    
    public function show(Location $service)
    {
        //
    }

   
    public function edit($id)
    {
        $project = Location::where('id','=',$id)->first();
        // dd($project);
        return view('admin.presets.location.update',compact('project'));
    }

    
    public function update(Request $request, $id)
    {
        try {
            $user = auth()->user();
            $verb = $request->method();

            $project = Location::where('id','=',$id)->first();
          
            $project->location_name=ucwords($request->location_name);
            $project->save();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Location Update [{$project->id}] Success");
            return back()->with('message', 'Service Location Updated Successfully');

        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Location Update Failed: {$th->getMessage()}");
            return back()->with('error', "Service Location Update Failed");
        }
    }

  
    public function destroy($id)
    {
        try {
            $user = auth()->user();
            $verb = "DELETED";
            Location::where('id','=',$id)->delete();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Location Delete [{$id}] Success");
            return back()->with('message', 'Service Location Deleted Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb =  "DELETED";
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Location Delete Failed: {$th->getMessage()}");
            return back()->with('error', "Service Location Delete Failed");
        }
    }
}
