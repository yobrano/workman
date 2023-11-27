<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.index');
    }

    public function  stats(){
        
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
     * @param  \App\Models\Worker\AdminDashboardController  $workerDashboardController
     * @return \Illuminate\Http\Response
     */
    public function show(AdminDashboardController $workerDashboardController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker\AdminDashboardController  $workerDashboardController
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminDashboardController $workerDashboardController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker\AdminDashboardController  $workerDashboardController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminDashboardController $workerDashboardController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker\AdminDashboardController  $workerDashboardController
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminDashboardController $workerDashboardController)
    {
        //
    }
}
