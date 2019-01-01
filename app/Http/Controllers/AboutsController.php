<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;


class AboutsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', [
            'only' => [
                'index', 'create', 'store', 'show','edit', 'update', 'delete'
                ]
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.abouts.index');        
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
        $abouts = About::findOrFail($id);
        return view('admin.abouts.show', compact('abouts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = About::findOrFail($id);
        if(Auth::user()->role == 'admin') {
            return view('admin.abouts.edit', compact('abouts'));
        } 
        return abort(401);  
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
        $abouts = About::findOrFail($id);    
        if(Auth::user()->role == 'admin') {
            // validasi
            // memanggil method validate yang ada di controller
            $this->validate($request, [
                'about' => 'required|min:5',
                'vision' => 'required|min:5',
                'mission' => 'required|min:5'
            ]);

            $abouts->update($request->all());

            return redirect()->route('admin.abouts.index');
           
        } 

        return abort(401);
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

    public function dataTable()
    {
        $abouts = About::query();
        return DataTables::of($abouts)
            ->addColumn('action', function($abouts) {
                return view('layouts.admin.partials._action', [
                    'model' => $abouts,
                    'show_url' => route('admin.abouts.show', $abouts->id),
                    'edit_url' => route('admin.abouts.edit', $abouts->id),
                    'delete_url' => route('admin.abouts.destroy', $abouts->id),
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
