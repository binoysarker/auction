<?php

namespace App\Http\Controllers;
use App\User;
use App\News;
use App\Auction_Item;
use Illuminate\Http\Request;

class NewsController extends Controller
{

  public function index()
  {
    $all_news = News::paginate(10);
    return view('back-end.AllNews',compact('all_news'));
  }
  /**
  * Crteate News
  */
  public function create()
  {
    return view('back-end.CreateNews');
  }
  /**
  * Edit News
  */
  public function edit($id)
  {
    $item = News::findOrFail($id);
    return view('back-end.EditNewsItem',compact('item'));
  }

  /**
  * Store News
  */
  public function store(Request $request)
  {
    // return $request->all();
    $news = new News();
    $news->news_text = $request->news_text;
    $news->save();
    return redirect('/admin/all-news');
  }
  /**
  * Store News
  */
  public function update($id,Request $request)
  {
    // return $request->all();
    $news = News::findOrFail($id);
    $news->news_text = $request->news_text;
    $news->save();
    return redirect('/admin/all-news');
  }
  /**
  * Store News
  */
  public function delete($id)
  {
    // return $request->all();
    $news = News::findOrFail($id);
    $news->delete();
    return redirect('/admin/all-news');
  }


}
