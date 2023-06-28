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
           // exists() - if exists in db record
           if(DB::table('posts')->where('id', 343543)->exists()) {
            echo 'Woohoo, I found a match';
        } else {
            echo 'Ahh, I have not found a match';
        } 

           // doesntExist() - if does not exists in db record
           if(DB::table('posts')->where('id', 343543)->doesntExist()) {
            echo 'Woohoo, I found a match';
        } else {
            echo 'Ahh, I have not found a match';
        }
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
         // Delete one row
         DB::table('posts')
         ->where('id', 1017)
         ->delete();

         // Delete based on multiple conditions
        DB::table('posts')
        ->where('id', 1014)
        ->where('title', 'x')
        ->delete();

        // Delete all records
        DB::table('posts')
            ->where('id', 1000)
            ->orWhere('id', 1001)
            ->update([
                'excerpt' => 'Laravel 10x',
                'description' => 'Laravel 10x'
            ]);

        // wipe up table
        DB::table('posts')
            ->truncate();
    }
}
