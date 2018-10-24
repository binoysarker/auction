<?php

namespace App\Http\Controllers;
use App\User;
use App\Auction_Item;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('back-end.dashboard');
  }

  public function showAllItems()
  {
    $auction_items = Auction_Item::paginate(10);
    // return $auction_items;
    return view('back-end.AllItems',compact('auction_items'));
  }
  public function createItem()
  {
    return view('back-end.CreateItem');
  }
  public function store(Request $request)
  {
    // return $request->all();
    // Validation
    $validateData = $this->validate($request, [
      'short_desciption' => 'required | max:100',
      'long_description' => 'required',
      'image_file' => 'required',
      'start_date' => 'required|date',
      'end_date' => 'required|date',
      'end_date_time' => 'required',
      'price' => 'required|numeric',
      'current_bid' => 'required|numeric',
    ]);

    if ($validateData) {
      // upload the image
      if ($request->file('image_file')->isValid()) {
        $picName = $request->file('image_file')->getClientOriginalName();
        $picName = uniqid() . '_' . $picName;
        $path = 'uploads' . DIRECTORY_SEPARATOR . 'auction_items' . DIRECTORY_SEPARATOR;
        $destinationPath = "./public/uploads/auction_items"; // upload path
        if (!file_exists($destinationPath)) {
          mkdir($destinationPath, 0777, true);
        }
        $request->file('image_file')->move($destinationPath, $picName);
        // var_dump($destinationPath.$picName);
      }

      // store the data in the auction items table
      $auction_item = new Auction_Item();
      $auction_item->short_desciption = $request->input('short_desciption');
      $auction_item->long_description = $request->input('long_description');
      $auction_item->image_file = $destinationPath."/".$picName;
      $auction_item->start_date = $request->input('start_date');
      $auction_item->end_date = $request->input('end_date');
      $auction_item->end_date_time = $request->input('end_date_time');
      $auction_item->price = $request->input('price');
      if ($request->input('is_featured') != null) {
        $auction_item->is_featured = $request->input('is_featured');
      }
      $auction_item->current_bid = $request->input('current_bid');

      $auction_item->save();
      return redirect('/admin/all-items');
    }

  }

  /**
   * Edit
   */
   public function edit($id)
   {
     $item = Auction_Item::findOrFail($id);
     // return $item;
     return view('back-end.EditItem',compact('item'));
   }
   /**
    * Update Item
    */
    public function update($id,Request $request)
    {
      // return $request->all();
      $auction_item = Auction_Item::findOrFail($id);
      // upload the image
      if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
        // delete previous file and then start upload new file
        unlink($auction_item->image_file);
        $picName = $request->file('image_file')->getClientOriginalName();
        $picName = uniqid() . '_' . $picName;
        $path = 'uploads' . DIRECTORY_SEPARATOR . 'auction_items' . DIRECTORY_SEPARATOR;
        $destinationPath = "./public/uploads/auction_items"; // upload path
        if (!file_exists($destinationPath)) {
          mkdir($destinationPath, 0777, true);
        }
        $request->file('image_file')->move($destinationPath, $picName);
        // var_dump($destinationPath.$picName);
      }

      // store the data in the auction items table
      $auction_item->short_desciption = $request->input('short_desciption');
      $auction_item->long_description = $request->input('long_description');
      if (isset($destinationPath)) {
        $auction_item->image_file = $destinationPath."/".$picName;
      }else {
        $auction_item->image_file = $auction_item->image_file;
      }
      $auction_item->start_date = $request->input('start_date');
      $auction_item->end_date = $request->input('end_date');
      $auction_item->end_date_time = $request->input('end_date_time');
      $auction_item->price = $request->input('price');
      if ($request->input('is_featured') != null) {
        $auction_item->is_featured = $request->input('is_featured');
      }
      $auction_item->current_bid = $request->input('current_bid');

      $auction_item->save();
      return redirect('/admin/all-items');
    }
    /**
     * Delete
     */
     public function delete($id)
     {
       $auction_item = Auction_Item::findOrFail($id);
       $auction_item->delete();
       return redirect('/admin/all-items');
     }

}
