<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function blog()
     {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('blog.index', compact('posts'));
     }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('dashboard.blog.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //if has category store the category
        if ($request->category) {
            $category = Category::create([
                'title' => $request->category,
            ]);
        }

        //store image using image intervention
        if ($request->has('image')) {
            $imagePath = request('image')->store('posts', 'public');

            // Load the image
            $image = Image::make(public_path("storage/{$imagePath}"));

            // Resize the image to fit within 990x512 without cropping
            $image->resize(990, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save the modified image
            $image->save(public_path("storage/{$imagePath}"));
        }

        //store the post
        Post::create([
            'title' => $request->title,
            'body' => $request->content,
            'category_id' => isset($request->category) && $category ? $category->id : $request->category_id,
            'image' => $request->has('image') ? $imagePath : null,
        ]);

        //redirect
        return redirect()->route('blog.posts')->with('message', "Post created successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $ogTitle = $post->title;
        $ogDescription = $post->body;
        $ogImage = $post->image;

        $categories = Category::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //randomize the posts and remove the current post
        $posts = $posts->shuffle()->reject(function ($value, $key) use ($post) {
            return $value->id == $post->id;
        });

        //increment the views
        $post->increment('views');

        return view('blog.show', compact('post', 'categories', 'posts', 'ogTitle', 'ogDescription', 'ogImage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //post
        $post = Post::find($id);

        //categories
        $categories = Category::orderBy('id', 'desc')->get();

        return view('dashboard.blog.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        //validate the data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //if has category store the category
        if ($request->category) {
            $category = Category::create([
                'title' => $request->category,
            ]);
        }

        //store image using image intervention
        if ($request->has('image')) {
            $imagePath = request('image')->store('posts', 'public');

            // Load the image
            $image = Image::make(public_path("storage/{$imagePath}"));

            // Resize the image to fit within 990x512 without cropping
            $image->resize(990, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save the modified image
            $image->save(public_path("storage/{$imagePath}"));
        }

        //store the post
        Post::find($id)->update([
            'title' => $request->title,
            'body' => $request->content,
            'category_id' => isset($request->category) && $category ? $category->id : $request->category_id,
            //'image' => $request->has('image') ? $imagePath : null,
        ]);

        //update the post with the image
        $post = Post::find($id);
        if ($request->has('image')) {
            $post->image = $imagePath;
            $post->save();
        } else {
            $post->image = $post->image;
            $post->save();
        }

        //redirect
        return redirect()->route('blog.posts')->with('message', "Post updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect()->route('blog.posts')->with('message', "Post deleted successfully.");
    }
}
