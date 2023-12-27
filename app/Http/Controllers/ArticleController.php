<?php
// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
       $categories = Category::all();
    return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {


//dd($request);



          $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id', // Validate that the selected category ID exists in the 'categories' table
//        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image format and size
    ]);



    $data = $request->all();


 //$data = $request->except('image'); // Exclude the image field for now


    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('article_images', 'public');
        $data['image'] = $imagePath;
    }

    // Add the category_id to the data array
    $data['category_id'] = $request->input('category_id');
//dd($data,$data['image']);
    Article::create($data);



    return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
       

 // Assuming you have an Article model and Category model
    $article = Article::findOrFail($id);
    $categories = Category::all();

    return view('articles.edit', compact('article', 'categories'));


        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
     $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
  //          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image format and size
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete the existing image file
       //     Storage::disk('public')->delete($article->image);

            // Upload the new image file
            $imagePath = $request->file('image')->store('article_images', 'public');
            $data['image'] = $imagePath;
        }

        $article->update($data);

        return redirect()->route('articles.show', $article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
