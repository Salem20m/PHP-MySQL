<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostsController extends Controller
{

    public function index()
    {
        return view('posts/index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {


        $posts = DB::table('posts')
            ->where('id', 7)
            ->get();



        $posts = DB::table('posts')
            ->whereBetween('id', [1,99])
            ->get();

        $posts = DB::table('posts')
            ->where('id', 12)
            ->delete();

        $posts = DB::table('posts')
            ->where('id', 11)
            ->update(['title' => 'My New Title', 'body' => 'My New Body']);

        $posts = DB::table('posts')->get();

        dd($posts);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
