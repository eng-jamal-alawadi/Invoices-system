<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name' => 'required|unique:sections|max:255',
            'description' => 'required',
       ],[
            'name.required' => 'يجب إدخال إسم القسم',
            'name.unique' => 'هذا الإسم موجود بالفعل',
            'name.max' => 'أقصى عدد للحروف هو 255',
            'description.required' => 'يجب إدخال وصف القسم',

        ]);

        $section = new Section();
        $section->name = $request->name;
        $section->description = $request->description;
        $section->created_by = auth()->user()->name;
        $section->save();
        session()->flash('Add', 'تم اضافة القسم بنجاح');
        return redirect()->route('sections.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request  )
    {

        $id = $request->id;
        $request->validate([
            'name' => 'required|max:255|unique:sections,name,'.$id,
            'description' => 'required',
       ],[
            'name.required' => 'يجب إدخال إسم القسم',
            'name.max' => 'أقصى عدد للحروف هو 255',
            'description.required' => 'يجب إدخال وصف القسم',

        ]);
        $section = Section::find($id);
        $section->update([
            'name' => $request->name,
            'description' => $request->description,

        ]);
        session()->flash('Update', 'تم تعديل القسم بنجاح');
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $section = Section::find($id);
        $section->delete();
        session()->flash('Delete', 'تم حذف القسم بنجاح');
        return redirect()->route('sections.index');
    }
}
