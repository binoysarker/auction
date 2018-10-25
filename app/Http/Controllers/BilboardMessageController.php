<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BilboardMessage;

class BilboardMessageController extends Controller
{
    public function index()
    {
      $bilboardMessage = BilboardMessage::all();
      // return $bilboadMessaga;
      return view('back-end.AllBilboardMessage',compact('bilboardMessage'));
    }
    public function create()
    {
      return view('back-end.CreateBilboardMessage');
    }

    public function store(Request $request)
    {
      // return $request;
      $validatedData = $request->validate([
          'bilboard_message' => 'required|string',
      ]);
      if ($validatedData) {
        // store the data in the bilboard_messages table
        $bilboadMessaga = new BilboardMessage();
        $bilboadMessaga->bilboard_message = $request->bilboard_message;
        $bilboadMessaga->save();
        return redirect('/admin/all-bilboard-message')->with('status','Data is Inseted');
      }
    }

    public function edit($id)
    {
      $item = BilboardMessage::findOrFail($id);
      return view('back-end.EditBilboardMessage',compact('item'));
    }
    public function update(Request $request,$id)
    {
      // return $request;
      $bilboadMessaga = BilboardMessage::findOrFail($id);
      $bilboadMessaga->bilboard_message = $request->bilboard_message;
      $bilboadMessaga->save();
      return redirect('/admin/all-bilboard-message')->with('status','Data is updated');
    }
    public function delete($id)
    {
      $bilboadMessaga = BilboardMessage::findOrFail($id);
      $bilboadMessaga->delete();
      return redirect('/admin/all-bilboard-message')->with('status','Data is deleted');
    }
}
