<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Posts;
use App\Models\BeasiswaEksternal;

class BlogController extends Controller
{
    public function create($type)
    {
        return view('admin.createBlog', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
        ]);

        // Explode tags
        $tags = $request->tags;
        $tags = json_decode($tags);
        $result = "";
        foreach ($tags as $tag) {
            $result .= $tag->value . " ";
        }

        // Get the thumbnail image
        $file = $request->hasFile('thumbnail');
        $file_name = "";
        if ($file) {
            $newFile = $request->file('thumbnail');
            $file_name = $newFile->store('public/thumbnails');
        }

        $compare = preg_replace("/\s+/", "", $result);
        if ($compare == "Beasiswa") {
            BeasiswaEksternal::insert([
                'id_scholarship' => rand(10000, 100000),
                'title' => $request->title,
                'tags' => $result,
                'caption' => $request->caption,
                'thumbnail' => $file_name,
                'registration_link' => $request->regist,
                'description' => $request->description,
                'created_at' => now()
            ]);
        } else {
            Posts::insert([
                'id_article' => rand(10000, 100000),
                'title' => $request->title,
                'tags' => $result,
                'caption' => $request->caption,
                'thumbnail' => $file_name,
                'description' => $request->description,
                'created_at' => now()
            ]);
        }

        Alert::success('Sukses', 'Dokumen Anda Sudah Diposting.');
        return redirect()->route('home');

    }

    public function show($id_article)
    {
        $post = Posts::where('id_article', $id_article)->first();
        return view('blog.showArticle', compact('post'));
    }

    // ini buat gambar bisa muncul
    public function upload(Request $request)
    {
        $imgpath = $request->file('file')->store('public/thumbnails');
        return response()->json(['location' => "/storage/thumbnails/$imgpath"]);
    }

    public function delete($id_article)
    {
        $post = Posts::where('id_article', $id_article)->first();
        if ($post) {
            $post->delete();
            Alert::success('Sukses', 'Dokumen berhasil dihapus.');
        } else {
            Alert::error('Error', 'Dokumen tidak ditemukan.');
        }
        return redirect()->route('home');

    }

    // make edit function for editBlog.blade.php
    public function edit($id_article)
    {
        $blog = Posts::where('id_article', $id_article)->first();
        return view('admin.editBlog', compact('blog'));
    }    

    public function update(Request $request, $id_article)
    {
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
        ]);
    
        // Explode tags
        $tags = $request->tags;
        $tags = json_decode($tags);
    
        // Provide a default value if $tags is null
        if ($tags === null) {
            $tags = [];
        }
    
        $result = "";
        foreach ($tags as $tag) {
            $result .= $tag->value . " ";
        }
    
        // Get the thumbnail image
        $file = $request->hasFile('thumbnail');
        $file_name = "";
        if ($file) {
            $newFile = $request->file('thumbnail');
            $file_name = $newFile->store('public/thumbnails');
        }
    
        $compare = preg_replace("/\s+/", "", $result);
        if ($compare == "Beasiswa") {
            BeasiswaEksternal::where('id_scholarship', $id_article)->update([
                'title' => $request->title,
                'tags' => $result,
                'caption' => $request->caption,
                'thumbnail' => $file_name,
                'registration_link' => $request->regist,
                'description' => $request->description,
                'updated_at' => now()
            ]);
    
            $blog = BeasiswaEksternal::where('id_scholarship', $id_article)->first();
        } else {
            Posts::where('id_article', $id_article)->update([
                'title' => $request->title,
                'tags' => $result,
                'caption' => $request->caption,
                'thumbnail' => $file_name,
                'description' => $request->description,
                'updated_at' => now()
            ]);
    
            $blog = Posts::where('id_article', $id_article)->first();
        }
    
        Alert::success('Sukses', 'Dokumen Anda Sudah Diupdate.');
        return redirect()->route('home', compact('blog'));
    }    
}