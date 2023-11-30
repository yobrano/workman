<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Admin\Location;
use App\Models\ServiceGroup;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index');
    }

    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getServices(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = <<<JS
                    <a href="/admin/service/$row->id/edit"  class="edit btn btn-success btn-sm">Edit</a>
                    <a  href="/admin/service/$row->id/delete" class="delete btn btn-danger btn-sm" onclick="return confirm(Are you sure want to Delete?)">Delete</a>
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
        $location = Location::all('id', 'location_name')->toArray();
        $servicegroup = ServiceGroup::all('id', 'group_name')->toArray();

        return view('admin.services.create', compact(['location', 'servicegroup']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $user = auth()->user();
            $verb = $request->method();
            $request->validate([
                'service_name' => 'required',
                'service_image' => 'required|mimes:jpeg,png,jpg|max:1048',
                'service_detail' => '',
                'service_group' => 'required',
                'location_name' => 'required',
                'service_availability' => '',
                'service_payment_method' => '',
                'service_business_hour' => '',
                'service_email' => '',
                'service_phone' => '',
                'service_employee_no' => '',
                'service_period_of_existence' => ''
            ]);

            // if(){ 
            //     $fileName = time() . '_' . $request->file->getClientOriginalName();
            //     $filePath = $request->file('file')->storeAs('uploads/schoolslip', $fileName, 'public');}
            $fileName = time() . '_' . $request->file('service_image')->getClientOriginalName();
            $filePath = $request->file('service_image')->storeAs('uploads/service', $fileName, 'public');


            $project = Service::create([
                'service_name' => $request->service_name,
                'service_image' =>  $filePath,
                'service_detail' =>  $request->service_detail,
                'service_group' =>  $request->service_group,
                'service_location' =>  $request->location_name,
                'service_availability' =>  $request->service_availability,
                'service_payment_method' =>  $request->service_payment_method,
                'service_business_hour' =>  $request->service_business_hour,
                'service_email' =>  $request->service_email,
                'service_phone' =>  $request->service_phone,
                'service_employee_no' =>  $request->service_employee_no,
                'service_period_of_existence' =>  $request->service_period_of_existence
            ]);
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Create [{$project->id}] Success");
            return back()->with('message', 'Service Created Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Create Failed: {$th->getMessage()}");
            return back()->with('error', "Service Create Failed");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::where('id', '=', $id)->first();
        $location = Location::all('id', 'location_name')->toArray();
        $servicegroup = ServiceGroup::all('id', 'group_name')->toArray();
        // dd($service);
        return view('admin.services.update', compact(['service', 'location', 'servicegroup']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = auth()->user();
            $verb = $request->method();
            $request->validate([
                'service_name' => 'required',
                'service_image' => '',
                'service_detail' => '',
                'service_group' => 'required',
                'location_name' => 'required',
                'service_availability' => '',
                'service_payment_method' => '',
                'service_business_hour' => '',
                'service_email' => '',
                'service_phone' => '',
                'service_employee_no' => '',
                'service_period_of_existence' => ''
            ]);


            $service = Service::where('id', '=', $id)->first();
            if (!is_null($request->file('service_image'))) {
                $fileName = time() . '_' . $request->file('service_image')->getClientOriginalName();
                $filePath = $request->file('service_image')->storeAs('uploads/service', $fileName, 'public');
                $service->service_image = $filePath;
            }
            $service->service_name = $request->service_name;
            $service->service_detail = $request->service_detail;
            $service->service_group = $request->service_group;
            $service->service_location = $request->location_name;
            $service->service_availability = $request->service_availability;
            $service->service_payment_method = $request->service_payment_method;
            $service->service_business_hour = $request->service_business_hour;
            $service->service_email = $request->service_email;
            $service->service_phone = $request->service_phone;
            $service->service_employee_no = $request->service_employee_no;
            $service->service_period_of_existence = $request->service_period_of_existence;
            $service->save();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Update [{$service->id}] Success");
            return back()->with('message', 'Service Updated Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb = $request->method();
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Update Failed: {$th->getMessage()}");
            return back()->with('error', "Service Update Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = auth()->user();
            $verb = "DELETED";
            Service::where('id', '=', $id)->delete();

            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Delete [{$id}] Success");
            return back()->with('message', 'Service Deleted Successfully');
        } catch (\Throwable $th) {
            $user = auth()->user();
            $verb =  "DELETED";
            activity()->log("User:{$user->id},Verb:{$verb},Message:Service Delete Failed: {$th->getMessage()}");
            return back()->with('error', "Service Delete Failed");
        }
    }
}
