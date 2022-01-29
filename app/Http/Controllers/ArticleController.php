<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Auth;
class ArticleController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    public function index()
    {
    
        return view('article.index');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
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
            'title'=>'required',
            'content'=>'required',
        ]);

    $articleData = array('title' => $request->title, 'content' =>$request->content,'user_id'=>\Auth::user()->id);
      $article=  Article::create($articleData);
      if (!empty ($request->file('images'))) {
                foreach ($request->file('images') as $image) {
             $imageName = uniqid() .$image->getClientOriginalName();
             $image->move(public_path('article-image'), $imageName);
             $imageob=new Image();
             $imageob->url=$imageName;
             $imageob->article_id=$article->id;
             $imageob->save();
      }
  }
       
               
    
        return redirect()->route('article.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articleDetail', compact('article'));

}
  

    public function edit(Article $article)
    {
        if($article->user_id==Auth::user()->id)
        return view('article.edit',compact('article'));
    }
     public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

  
        $article->update(['title' => $request->title, 'content' =>$request->content]);
        
         $imagearray=[];
        if($request->input('ImageId')!=null){
            $imagearray=$request->input('ImageId');
        }
         $images = Image::whereNotIn('id', $imagearray)->get();
           foreach ($images as $image) {
                File::delete(public_path('article-image/' . $image->url));

                $image->delete();

            }
            if (!empty ($request->file('images'))) {
                foreach ($request->file('images') as $image) {
             $imageName = uniqid() .$image->getClientOriginalName();
             $image->move(public_path('article-image'), $imageName);
             $imageob=new Image();
             $imageob->url=$imageName;
             $imageob->article_id=$article->id;
             $imageob->save();
      }
  }

           
        return redirect()->route('article.index')
                        ->with('success','Blog updated successfully');
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
  
        return redirect()->route('article.index')
                        ->with('success','Article deleted successfully');
    }
}
