<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentCount;

class StudentCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_counts = StudentCount::paginate(5);
        $student = StudentCount::first();
        return view('admin_panel.student_counts.index',compact('student_counts','student'));
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
        $request->validate([
            'count' => 'required',
        ]);
        $student_counts = StudentCount::create([
            'count' => $request->count
        ]);
        return redirect('admin/student_counts')->with('status','StudentCount Successful Store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_count = StudentCount::find($id);
        return view('admin_panel.student_counts.show',compact('student_count'));
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
        $request->validate([
            'count' => 'required',
        ]);
        $student = StudentCount::find($id);
        $count = $student->count;
        $student->update([
            'count' => $count+$request->count
        ]);
        // dd($student);
        return redirect('admin/student_counts')->with('status','Add Student Count OK');
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
