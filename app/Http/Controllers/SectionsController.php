<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sections =  sections::all();
        return view('sections.sections', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_name_ar' => ['required', 'max:255', function ($attribute, $value, $fail) {
                if (sections::where('section_name->ar', $value)->exists()) {
                    $fail('اسم القسم مسجل مسبقا');
                }
            }],
            'section_name_en' => 'required|max:255',
        ], [
            'section_name_ar.required' => 'يرجي ادخال اسم القسم بالعربي',
            'section_name_en.required' => 'يرجي ادخال اسم القسم بالانجليزي',
        ]);

        $section = new sections([
            'description' => $request->description,
            'Created_by' => Auth::user()->name,
        ]);
        $section->setTranslation('section_name', 'ar', $request->section_name_ar);
        $section->setTranslation('section_name', 'en', $request->section_name_en);
        $section->save();

        session()->flash('Add', 'تم اضافة القسم بنجاح ');
        return redirect('/sections');
    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'section_name_ar' => ['required', 'max:255', function ($attribute, $value, $fail) use ($id) {
                if (sections::where('section_name->ar', $value)->where('id', '!=', $id)->exists()) {
                    $fail('اسم القسم مسجل مسبقا');
                }
            }],
            'section_name_en' => 'required|max:255',
            'description' => 'required',
        ], [
            'section_name_ar.required' => 'يرجي ادخال اسم القسم بالعربي',
            'section_name_en.required' => 'يرجي ادخال اسم القسم بالانجليزي',
            'description.required' => 'يرجي ادخال البيانات',
        ]);

        $section = sections::find($id);
        $section->setTranslation('section_name', 'ar', $request->section_name_ar);
        $section->setTranslation('section_name', 'en', $request->section_name_en);
        $section->description = $request->description;
        $section->save();

        session()->flash('edit', 'تم تعديل القسم بنجاج');
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        sections::find($id)->delete();
        session()->flash('delete', 'تم حذف القسم بنجاح');
        return redirect('/sections');
    }
}
