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
   /*     $posts= DB::table('posts')
        ->orderBy('id')
        ->chunk(150, function($posts) {
            //chunk() - retrives data in smaller more managable chunks rather then
            // getting all data and chunking it afterwards
            foreach ($posts as $post) {
                echo $post->title;
            }
        });

        dd($posts);
     */

       // lazy()
       $posts=  DB::table('posts')
       ->orderBy('id')
       ->lazy()->each(function($post) { //it brings back a lazy collection, better preformace    
           echo $post->title;
       });

       dd($posts);

         // lazilyById()  //used by retrivning a single record by id without a retriving all data from db
         DB::table('posts')
         ->where('id', 1)
         ->lazyById()
         ->first();
    
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
        //
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
