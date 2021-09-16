<?php

namespace App\Http\Controllers;

use App\Post;    // collegati al model
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); //all'interno di index, crei una variabile alla quale passi i dati 
       // dump($posts);
       return view('posts.index', compact('posts'));// invii i dati al template della rotta di resources del controller specifico 
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');//MOSTRA UN FORM VUOTO PER POPOLARE TUTTI I DATI DEL NOSTRO MODELLO, 
                                    //AL SALVATAGGIO, STORE->RICEVE I DATI DALLA FORM E SALVA L'OGGETTO
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //qui arrivano le coppie name-value che ti invia il form
                                            
    {
        $data = $request->all();//ha un metodo interno all(), che ti torna in array associativo i dati inviati

        $post = new Post();
        $post->title = $data['title'];
        $post->cover = $data['cover'];
        $post->author = $data['author'];
        $post->content = $data['content'];
        $post->date = $data['date'];
        $post->save();
       
       return redirect()->route('posts.show', $post->id);//fai la redirect sulla rotta show, passando anche come parametro id che salva
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //id inviato a questo metodo in automatico, dopo la creazione della resource, che lo riceve
    {
        $post = Post::find($id); //trova id specifico con variabile creata appositamente
        return view('posts.show', compact('post')); // e lo invia alla rotta show [template singolo post di dettaglio]
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
