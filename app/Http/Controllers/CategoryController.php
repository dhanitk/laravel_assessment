<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $datacategory = DB::table('categories')->paginate(5);
        if ($request->has('keywords')) {
            $data = [
                'title' => 'Category',
                'category' => Category::where('name', 'LIKE', '%' . $request->keywords . '%')->paginate(5),
            ];
        } else {
            $data = [
                'title' => 'Category',
                'category' => Category::paginate(8),
            ];
        }

        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Add Category',
        ];
        
        return view('category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
        ], [
            'name.required' => 'The name field is required bro.',
            'name.min' => 'Huhu. The name must be at least 3 characters.',
        ]);

        $category = new Category([
            'name' => $request->name,
        ]);
        $category->save();

        \Mail::raw('Ada data category ditambahkan! yaitu ' . $category->name, function($message){
            $message->to('dhanitk23@gmail.com', 'Dhani');
            $message->subject('New Data Category!');
        });

        return redirect('category')->with('status', 'Saved new category successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datacategory = DB::table('categories')->where('id', $id)->first();

        $data = [
            'title' => 'Edit Category',
            'category' => $datacategory,
        ];

        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|min:3',
        ], [
            'name.required' => 'The name field is required bro.',
            'name.min' => 'Huhu. The name must be at least 3 characters.',
        ]);

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('category')->with('status', 'Update data category successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::table('categories')->where('id', $id)->delete();

        $category = new Category([
            'name' => $request->name,
        ]);
        
        \Mail::raw('Ada data category dihapus!' . $category->name, function($message){
            $message->to('dhanitk23@gmail.com', 'Dhani');
            $message->subject('Deleted Data Category!');
        });
        
        return redirect('category')->with('status', 'Delete data category successfully!');
    }
}
