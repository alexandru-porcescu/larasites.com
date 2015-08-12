<?php

namespace App\Http\Controllers\Admin;

use App\Host;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  name  $string
     * @return Response
     */
    public function show($name)
    {
        $host = Host::where('name', $name)->firstOrFail();

        $submissions = $host
            ->submissions()
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->take(100)
            ->get();

        return view('admin.host.show', compact('host', 'submissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $name
     * @return Response
     */
    public function destroy($name)
    {
        $host = Host::where('name', $name)->firstOrFail();

        $host->delete();

        return redirect()->action('Admin\DashboardController@index');
    }
}
