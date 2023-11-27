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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
