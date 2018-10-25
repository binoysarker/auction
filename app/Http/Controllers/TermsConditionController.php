<?php

namespace App\Http\Controllers;

use App\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.CreateTermsCondition');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        // Validation
        $validateData = $this->validate($request, [
          'terms_condition' => 'required |string',
        ]);
        if ($validateData) {
          // store the data in the terms_conditions table
          $termsCondition = new TermsCondition();
          $termsCondition->terms_condition = $request->terms_condition;
          $termsCondition->save();
          return redirect('/admin/edit-terms-condition/'.$termsCondition->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TermsCondition::findOrFail($id);
        return view('back-end.EditTermsCondition',compact('item'))->with('status','Data is Inserted');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $termsCondition = TermsCondition::findOrFail($id);
        $termsCondition->terms_condition = $request->terms_condition;
        $termsCondition->save();
        return redirect()->back()->with('status','Data is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsCondition $termsCondition)
    {
        //
    }
}
