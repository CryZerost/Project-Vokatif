<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role === 'admin') {
                $this->middleware('can:create,App\Models\Category')->only(['create', 'store']);
                $this->middleware('can:update,category')->only(['edit', 'update']);
                $this->middleware('can:delete,category')->only('destroy');
            } else {
                toastr()->error('You are not able to route here.');
                return redirect()->route('home');

            }
            return $next($request);
        })->except(['showCategory','show']);
    }

   public function show(Category $category)
{
    $user = auth()->user();

    if ($user) {
        // User is authenticated, proceed with showing the category
        $categories = Category::all(); // Retrieve all categories
        return view('categories.show', compact('category', 'categories'));
    }

    // User is not authenticated, handle the unauthorized access here
    // For example, you can redirect to the login page
    return redirect()->route('login');
}


    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'route' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Added image validation rule
        ]);

        // Check if the user is an admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Process the image upload if available
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('category_images'), $imageName);
            $imagePath = '/category_images/' . $imageName;
        }

        // Create the category
        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'route' => $request->input('route'),
            'admin_id' => auth()->user()->id,
            'image' => $imagePath,
        ]);

        return redirect()->route('categories.index', $category);
    }

    public function update(Request $request, Category $category)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'route' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Added image validation rule
        ]);

        // Check if the user is an admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Process the image upload if available
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($category->image) {
                $previousImagePath = public_path($category->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('category_images'), $imageName);
            $imagePath = '/category_images/' . $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $imagePath = $category->image;
        }

        // Update the category
        $category->update([
            'name' => $request->input('name'),
            'route' => $request->input('route'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        toastr()->success('Category updated successfully.');
        return redirect()->route('categories.index', $category);
    }

    public function edit(Category $category)
    {
        // Check if the user is an admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('categories.edit', compact('category'));
    }

    public function destroy(Category $category)
    {
        // Check if the user is an admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Delete the category image if it exists
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        // Delete the category
        $category->delete();
        toastr()->success('Category image deleted successfully.');
        return redirect()->route('categories.index', $category);
    }

// ...

    public function index()
    {
        $categories = Category::all();

        // Adjust the image paths based on their location
        $categories->transform(function ($category) {
            if ($category->image) {
                $category->image = asset('category_images/' . basename($category->image));
            }

            return $category;
        });

        return view('categories.index', compact('categories'));
    }

 public function showCategory()
{
    $categories = Category::paginate(6);

    // Adjust the image paths based on their location
    $categories->getCollection()->transform(function ($category) {
        if ($category->image) {
            $category->image = asset('category_images/' . basename($category->image));
            
        }
        
        // Shuffle the posts within the category randomly
        $category->posts = $category->posts->random($category->posts->count());

        return $category;
    });

    return view('page.public.category', compact('categories'));
}






// ...

}
