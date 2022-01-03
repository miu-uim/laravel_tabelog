<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RestaurantLog;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class RestaurantLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth_id = Auth::id();
        $query = DB::table('restaurant_logs');

        $query->select('id', 'url', 'name', 'location', 'gone', 'gone_date', 'created_at')->where('user_id', $auth_id);
        $logs = $query->paginate(20);
        return view('logs.index', compact('logs'));
    }

    // public function select()
    // {

    //     // dd($auth_id);
    //     // $logs = DB::table('restaurant_logs')->where('user_id', $auth_id)->first();
    //     // $logs = RestaurantLog::find($auth_id);
    //     $query = DB::table('restaurant_logs');

    //     $logs = $query->paginate(20);
    //     return view('logs.select', compact('logs'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('logs.create');
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
        $log = new RestaurantLog();

        $auth_id = Auth::id();
        // dd($auth_id);

        $log->user_id = $auth_id;
        $log->url = $request->input('url');
        $log->name = $request->input('name');
        $log->location = $request->input('location');
        if ($request->input('gone')) {
            $log->gone = $request->input('gone');
        }
        $log->gone_date = $request->input('gone_date');

        $log->save();
        return redirect('logs/index');
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
        $log = RestaurantLog::find($id);

        return  view(
            'logs.show',
            compact('log')
        );
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
