<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;
use Illuminate\Support\Str;
use Auth;
use DataTables;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){ 
        // $data = Cms::get();
        // dd($data);
        if ($request->ajax()) {
            $data = Cms::where('writer_id', Auth::user()->id)->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editArticle">Edit</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('cms.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $url = $request->title;
        $link = str_replace(' ', '-', strtolower($url));
        $excsS = Cms::where('id', '!=', $request->artikel_id)->select('url')->first();
        $excs = Cms::where('id', '!=', $request->artikel_id)->pluck('url');
        $excP = str_replace('["', '', $excs);
        $excP = str_replace('"]', '', $excP);
        $exca = Cms::where('id', '=', $request->artikel_id)->select('url')->first();

        $published = Cms::where('id', '=', $request->artikel_id)->where('status', '=', 'Terverifikasi')->first();

        if (empty($published)){
            $url = $request->title;
            $link = str_replace(' ', '-', strtolower($url));

            // Create if Exist
            if ($request->artikel_id == '' && !empty($excsS)) {
                $urls = $request->title;
                $links = str_replace(' ', '-', strtolower($urls));

                $random = Str::random(2);  
                $excRandom = $links .'-'. $random;
                $content = $request->contents;
                $noImage = '<img src="/storage/photos/1/default.jpg" style="display: none !important; visibility: hidden !important;"/>';

                Cms::create(
                    [
                        'title' => $request->title,
                        'keyword' => $request->keyword,
                        'description' => $request->description,
                        'category' => $request->category,
                        'content' => $request->contents . $noImage,  
                        'writer' => Auth::user()->name . ' Angkatan ' . Auth::user()->angkatan,
                        'writer_id' => Auth::user()->id,
                        'url' => $excRandom,
                    ]
                );

                $id = Cms::orderBy('updated_at','desc')->limit(1)->pluck('id');
                $string = Cms::where('id', $id)->select('content')->get();
                $display = explode('src=', $string);
                $display = explode('"', $display[1]);
                $imgData = stripslashes($display[1]);

                Cms::where('id', $id)->update([
                    'thumbnail' => $imgData,
                ]);

                $idUp = Cms::orderBy('updated_at', 'desc')->limit(1)->pluck('id');
                $stringUp = Cms::where('id', $id)->select('content')->get();            

                Cms::where('id', $idUp)->update([
                    'content' => $content
                ]);

                return response()->json(['success'=>'Artikel Disimpan.']); 
            } elseif ($request->artikel_id == '' && empty($excsS)) { // Create if Not Exist
                $urls = $request->title;
                $links = str_replace(' ', '-', strtolower($urls));

                $content = $request->contents;
                $noImage = '<img src="/storage/photos/1/default.jpg" style="display: none !important; visibility: hidden !important;"/>';

                Cms::create(
                    [
                        'title' => $request->title,
                        'keyword' => $request->keyword,
                        'description' => $request->description,
                        'category' => $request->category,
                        'content' => $request->contents . $noImage,  
                        'writer' => Auth::user()->name . ' Angkatan ' . Auth::user()->angkatan,
                        'writer_id' => Auth::user()->id,
                        'url' => $links,
                    ]
                );

                $id = Cms::orderBy('updated_at','desc')->limit(1)->pluck('id');
                $string = Cms::where('id', $id)->select('content')->get();
                $display = explode('src=', $string);
                $display = explode('"', $display[1]);
                $imgData = stripslashes($display[1]);

                Cms::where('id', $id)->update([
                    'thumbnail' => $imgData,
                ]);

                $idUp = Cms::orderBy('updated_at', 'desc')->limit(1)->pluck('id');
                $stringUp = Cms::where('id', $id)->select('content')->get();            

                Cms::where('id', $idUp)->update([
                    'content' => $content
                ]);

                return response()->json(['success'=>'Artikel Disimpan.']); 
            } elseif ($request->artikel_id != '' && $excP == $link && $excsS == $exca) { // Update if Exist
                $urls = $request->title;
                $links = str_replace(' ', '-', strtolower($urls));

                $random = Str::random(2);  
                $excRandom = $links .'-'. $random;

                $content = $request->contents;
                $noImage = '<img src="/storage/photos/1/default.jpg" style="display: none !important; visibility: hidden !important;"/>';

                Cms::where('id', $request->artikel_id)->update(
                    [
                        'title' => $request->title,
                        'keyword' => $request->keyword,
                        'description' => $request->description,
                        'category' => $request->category,
                        'content' => $request->contents . $noImage,
                        'url' => $excRandom,
                    ]
                );

                $id = Cms::orderBy('updated_at','desc')->limit(1)->pluck('id');
                $string = Cms::where('id', $id)->select('content')->get();
                $display = explode('src=', $string);
                $display = explode('"', $display[1]);
                $imgData = stripslashes($display[1]);

                Cms::where('id', $id)->update([
                    'thumbnail' => $imgData,
                ]);

                $idUp = Cms::orderBy('updated_at', 'desc')->limit(1)->pluck('id');
                $stringUp = Cms::where('id', $id)->select('content')->get();            

                Cms::where('id', $idUp)->update([
                    'content' => $content
                ]);

                return response()->json(['success'=>'Artikel Disimpan.']); 
            } elseif ($request->artikel_id != '' && $excP != $link) { // Update if Exist
                $urls = $request->title;
                $links = str_replace(' ', '-', strtolower($urls));

                $content = $request->contents;
                $noImage = '<img src="/storage/photos/1/default.jpg" style="display: none !important; visibility: hidden !important;"/>';

                Cms::where('id', $request->artikel_id)->update([
                    'title' => $request->title,
                    'keyword' => $request->keyword,
                    'description' => $request->description,
                    'category' => $request->category,
                    'content' => $request->contents . $noImage,
                    'url' => $links,
                ]);

                $id = Cms::orderBy('updated_at','desc')->limit(1)->pluck('id');
                $string = Cms::where('id', $id)->select('content')->get();
                $display = explode('src=', $string);
                $display = explode('"', $display[1]);
                $imgData = stripslashes($display[1]);

                Cms::where('id', $id)->update([
                    'thumbnail' => $imgData,
                ]);

                $idUp = Cms::orderBy('updated_at', 'desc')->limit(1)->pluck('id');
                $stringUp = Cms::where('id', $id)->select('content')->get();            

                Cms::where('id', $idUp)->update([
                    'content' => $content
                ]);

                return response()->json(['success'=>'Artikel Disimpan.']); 
            } elseif ($request->artikel_id != '' && $excP == $link && $excsS != $exca) { // Update if Not Exist & Exist
                $urls = $request->title;
                $links = str_replace(' ', '-', strtolower($urls));

                $random = Str::random(2);  
                $excRandom = $links .'-'. $random;

                $content = $request->contents;
                $noImage = '<img src="/storage/photos/1/default.jpg" style="display: none !important; visibility: hidden !important;"/>';

                Cms::where('id', $request->artikel_id)->update([
                    'title' => $request->title,
                    'keyword' => $request->keyword,
                    'description' => $request->description,
                    'category' => $request->category,
                    'content' => $request->contents . $noImage,
                ]);

                $id = Cms::orderBy('updated_at','desc')->limit(1)->pluck('id');
                $string = Cms::where('id', $id)->select('content')->get();
                $display = explode('src=', $string);
                $display = explode('"', $display[1]);
                $imgData = stripslashes($display[1]);

                Cms::where('id', $id)->update([
                    'thumbnail' => $imgData,
                ]);

                $idUp = Cms::orderBy('updated_at', 'desc')->limit(1)->pluck('id');
                $stringUp = Cms::where('id', $id)->select('content')->get();            

                Cms::where('id', $idUp)->update([
                    'content' => $content
                ]);

                return response()->json(['success'=>'Artikel Disimpan.']); 
            }            
            
        } else {
            return response()->json(['success'=>'Artikel Tidak Dapat Diedit Karena Sudah Dipublish.']);
        }     
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = Cms::find($id);
        return response()->json($user);
    }

    public function show($id){
        $user = Cms::find($id);
        return response()->json($user);   
    }
}
