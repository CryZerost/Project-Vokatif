<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                toastr()->error('Please login to access post features.');
                return redirect()->route('login');
            }

            return $next($request);
        })->only(['index', 'create', 'store', 'edit', 'destroy', 'update']);
    }
// This for show the post card to any page exist.
   public function index(Request $request)
{
    $user = Auth::user();

    if ($user->role === 'admin') {
        $query = Post::query();
    } else {
        $query = Post::where('user_id', $user->id);
    }

    $search = $request->input('search');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%$search%")
                ->orWhere('body', 'like', "%$search%")
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                    
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('username', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                });
        });
    }

      // Pagination for admin
    if ($user->role === 'admin') {
        $posts = $query->paginate(5);
    } else {
        $posts = $query->paginate(5);
    }

    return view('posts.index', compact('posts'));
}


 public function home(Request $request)
{
    $search = $request->input('search');
    $query = Post::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%$search%")
                ->orWhere('body', 'like', "%$search%")
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('username', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%');
                });
        });
    }

    // Add an orderByDesc clause to order the posts by the number of likes
    $query->withCount('likes')->orderByDesc('likes_count');

    $posts = $query->get();

    return view('page.public.home', compact('posts', 'search'));
}




    public function profileindex()
    {
        $user = Auth::user();

        $posts = Post::where('user_id', $user->id)->get();

        return view('user.index', ['posts' => $posts]);
    }

    public function news()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('page.public.news', compact('posts'));
    }

    public function profile($user)
    {
        $user = User::findOrFail($user);
        $posts = $user->posts; // Get the posts associated with the user

        return view('user.profile', compact('user', 'posts'));
    }

     // This is the end line for show each page system.  //

    // This is function for CRUD this post.
    public function create()
    {
        $categories = Category::all();
        $users = User::all();

        return view('posts.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:30200',
            'link' => 'nullable|url',
            'demo' => 'nullable|url', // Validation for 'demo' field (assumed to be a URL)
            'teaser' => 'nullable|url', // Validation for 'teaser' field (assumed to be a URL)
        ]);
    
        $post = Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->user()->id,
            'link' => $request->input('link'),
            'demo' => $request->input('demo'), // Save the 'demo' field to the database
            'teaser' => $request->input('teaser'), // Save the 'teaser' field to the database
        ]);

    // Save the 'thumbnail' field
    if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');
        $thumbnailPath = 'thumbnails/' . time() . '_' . $thumbnail->getClientOriginalName();
        $thumbnail->move(public_path('thumbnails'), $thumbnailPath);

        $post->thumbnail = $thumbnailPath;
        $post->save();
    }

        // Handle post images
        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('post-images'), $fileName);

                $images[] = new PostImage([
                    'path' => 'post-images/' . $fileName,
                ]);
            }

            $post->images()->saveMany($images);
        }

        toastr()->success('Post created successfully.');
        return redirect()->route('posts.index');
    }


   public function show($postId)
{
    // Retrieve the post from the database
    $post = Post::findOrFail($postId);
    $likeCount = $post->likes()->count();

    // Retrieve related posts by the same user
    $relatedPosts = Post::where('user_id', $post->user_id)
        ->where('id', '!=', $post->id)
        ->inRandomOrder()
        //->take(4)
        ->get();

    return view('posts.show', compact('post', 'likeCount', 'relatedPosts'));

}


    public function edit(Post $post)
{
    // Check if the authenticated user is the owner of the post
    if (auth()->user()->id !== $post->user_id && auth()->user()->role !== 'admin') {
        return redirect()->back()->with('error', 'You are not authorized to edit this post.');
    }

    // Retrieve categories and pass them to the edit view
    $categories = Category::all();
    $user = Auth::user();

    return view('posts.edit', compact('post', 'categories', 'user'));
}


public function update(Request $request, Post $post)
{
    // Check if the authenticated user is the owner of the post or an admin
    if (auth()->user()->id !== $post->user_id && auth()->user()->role !== 'admin') {
        toastr()->warning('You are not able to access this post.');
        return redirect()->route('posts.index');
    }

    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'category_id' => 'required|exists:categories,id',
        'user_id' => 'required|exists:users,id',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30720',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:30720',
        'link' => 'nullable|url',
        'demo' => 'nullable|url', // Validation for 'demo' field (assumed to be a URL)
        'teaser' => 'nullable|url', // Validation for 'teaser' field (assumed to be a URL)
    ]);

    // If the authenticated user is an admin, update the post with the requested user_id
    if (auth()->user()->role === 'admin') {
        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'link' => $request->input('link'),
            'demo' => $request->input('demo'), // Update the 'demo' field
            'teaser' => $request->input('teaser'), // Update the 'teaser' field
        ]);
    } else {
        // If the authenticated user is the owner of the post, update the post without changing the user_id
        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'link' => $request->input('link'), // Update the 'link' field
            'demo' => $request->input('demo'), // Update the 'demo' field
            'teaser' => $request->input('teaser'), // Update the 'teaser' field
            'user_id' => $request->input('user_id'),
        ]);
    }

    // Save the 'thumbnail' field if a new thumbnail is provided
    if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');
        $thumbnailPath = 'thumbnails/' . time() . '_' . $thumbnail->getClientOriginalName();
        $thumbnail->move(public_path('thumbnails'), $thumbnailPath);

        // Delete the old thumbnail if it exists
        if ($post->thumbnail) {
            $oldThumbnailPath = public_path($post->thumbnail);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }

        $post->thumbnail = $thumbnailPath;
        $post->save();
    }


    // Handle post images
    if ($request->hasFile('images')) {
        $images = [];

        foreach ($request->file('images') as $image) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('post-images'), $fileName);

            $images[] = new PostImage([
                'path' => 'post-images/' . $fileName,
            ]);
        }

        $post->images()->delete();
        $post->images()->saveMany($images);
    }

    toastr()->success('Post updated successfully.');
    return redirect()->route('posts.index');
}



    public function destroy(Post $post)
{
    // Check if the authenticated user is the owner of the post or has the "admin" role
    if (auth()->user()->id !== $post->user_id && auth()->user()->role !== 'admin') {
        return redirect()->back()->with('error', 'You are not authorized to delete this post.');
    }

    $post->images()->delete();
    $post->delete();
    toastr()->success('Post deleted successfully.');

    return redirect()->route('posts.index');
}

// This is the end line for CRUD function in this post. //

// This function it for vote system.
public function like(Post $post)
{
    $user = Auth::user();

    // Check if the user has already liked the post
    $existingLike = $post->likes()->where('user_id', $user->id)->first();

    if ($existingLike) {
        // User has already liked the post, so remove the like
        $existingLike->delete();
        toastr()->success('Post unliked successfully.');
    } else {
        // User hasn't liked the post, so create a new like
        $like = new Like();
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();
        toastr()->success('Post liked successfully.');
    }

    return redirect()->back();
}

// End line for vote sytem. //

}
