<?php

namespace App\Http\Controllers;
use App\Models\PostsBeasiswaInternal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $currentDate = Carbon::now()->toDateString();

    //     $postsbeasiswainternal = PostsBeasiswaInternal::where('start_date', '<=', $currentDate)
    //         ->where('end_date', '>=', $currentDate)
    //         ->latest()
    //         ->paginate(5);

    //     return view('postsbeasiswainternal.index', compact('postsbeasiswainternal'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    public function index()
    {
        $postsbeasiswainternal = PostsBeasiswaInternal::latest()->paginate(5);
    
        return view('postsbeasiswainternal.index', compact('postsbeasiswainternal'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postsbeasiswainternal.create');
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for the image
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        }

        $endDate = Carbon::now()->addDay()->toDateString(); // Set a default value for end_date (1 day from now)

        postsbeasiswainternal::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'start_date' => Carbon::now()->toDateString(), // Set a default value for start_date
            'end_date' => $endDate,
        ]);

        return redirect()->route('postsbeasiswainternal.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(postsbeasiswainternal $postsbeasiswainternal)
    {
        return view('postsbeasiswainternal.show',compact('postsbeasiswainternal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(postsbeasiswainternal $postsbeasiswainternal)
    {
        return view('postsbeasiswainternal.edit',compact('postsbeasiswainternal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostsBeasiswaInternal $postsbeasiswainternal)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $postsbeasiswainternal->image = $imageName; // Update the 'image' column in the 'postsbeasiswainternal' table
        }
    
        $postsbeasiswainternal->title = $request->title;
        $postsbeasiswainternal->content = $request->content;
    
        // Update the 'start_date' if provided
        if ($request->has('start_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $postsbeasiswainternal->start_date = $start_date;
        }
    
        // Update the 'end_date' if provided
        if ($request->has('end_date')) {
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            $postsbeasiswainternal->end_date = $end_date;
        }
    
        $postsbeasiswainternal->save();
    
        return redirect()->route('postsbeasiswainternal.index')->with('success', 'Post updated successfully');
    }    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(postsbeasiswainternal $postsbeasiswainternal)
    {
        $postsbeasiswainternal->delete();
 
        return redirect()->route('postsbeasiswainternal.index')
                        ->with('success','Post deleted successfully');
    }
}
