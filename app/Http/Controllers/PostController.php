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
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'title' => 'Insert through the DB facade 2',
                'slug' => 'insert-through-the-db-facade-2',
                'excerpt' => 'excerpt',
                'description' => 'description',
                'is_published' => true,
                'min_to_read' => 2,
            ],
            [
                'user_id' => 1,
                'title' => 'Insert through the DB facade 3',
                'slug' => 'insert-through-the-db-facade-3',
                'excerpt' => 'excerpt',
                'description' => 'description',
                'is_published' => true,
                'min_to_read' => 2,
            ]
        ]);

        DB::table('posts')->insertOrIgnore([
            [
                'user_id' => 1,
                'title' => 'X',
                'slug' => 'x',
                'excerpt' => 'excerpt',
                'description' => 'description',
                'is_published' => true,
                'min_to_read' => 2,
            ],
            [
                'user_id' => 1,
                'title' => 'Insert through the DB facade 3',
                'slug' => 'insert-through-the-db-facade-3',
                'excerpt' => 'excerpt',
                'description' => 'description',
                'is_published' => true,
                'min_to_read' => 2,
            ]
        ]);

        // upsert() insert or update a record in database
        $posts = DB::table('posts')->upsert([
            [
                'user_id' => 1,
                'title' => 'X',
                'slug' => 'x',
                'excerpt' => 'Updated excerpt',
                'description' => 'Updated description',
                'is_published' => true,
                'min_to_read' => 2,
            ],
        ], ['title', 'slug']);  
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
