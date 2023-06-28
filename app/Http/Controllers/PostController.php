<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Specify exactly what data you need,
       DB::table('users')->select('name', 'email')->get(); //get() - get arrays of rows

       // Select with alias
       DB::table('posts')
           ->select('title as post_title')
           ->get();

       // Return only one row with specific value
       DB::table('posts')
           ->distinct()
           ->get();

       // Narrow distinct down to one column
       DB::table('posts')
           ->select('is_published')
           ->distinct()
           ->get();

               // first()
        DB::table('posts')->where('id', 2)->first();

        // value()
        DB::table('posts')->where('id', 2)->value('excerpt');

        // find()
        DB::table('posts')->find(1);

            // One Column
            DB::table('posts')->pluck('title');

            // Multiple Columns
            DB::table('posts')->pluck('title','description');

       // using addSelect()
       $posts = DB::table('posts')->select('title');
     
       $added = $posts->addSelect('description')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Update one row
       DB::table('posts')
       ->where('id', 1000)
       ->update([
           'excerpt' => 'Laravel 10',
           'description' => 'Laravel 10'
       ]);

   // Update multiple rows
   DB::table('posts')
       ->where('id', '>', 1000)
       ->update([
           'excerpt' => 'Laravel 10',
           'description' => 'Laravel 10'
       ]);

   // Update multiple conditions
   DB::table('posts')
       ->where('id', 1000)
       ->orWhere('id', 1001)
       ->update([
           'excerpt' => 'Laravel 10x',
           'description' => 'Laravel 10x'
       ]);

   // Increment
   DB::table('posts')
       ->where('min_to_read', 1000)
       ->increment('min_to_read');

   // Decrement
   DB::table('posts')
       ->where('id', 1000)
       ->decrement('min_to_read', 4);

   // Increment or decrement multiple columns
   DB::table('posts')
       ->incrementEach(['min_to_read', 'lines']);

   // updateOrInsert
   DB::table('posts')
       ->updateOrInsert(
           ['excerpt' => 'Laravel 10x'],
           ['id' => 1000]
       );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
