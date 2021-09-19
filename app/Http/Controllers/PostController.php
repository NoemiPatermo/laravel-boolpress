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
       $request->validate([  //se i dati non sono in linea non vengono validati
            'cover'=> 'url',
            'title' => 'required|unique:posts|max:255',
            'author' => 'required'
        ]);

        $data = $request->all();//ha un metodo interno all(), che ti torna in array associativo i dati inviati

        $post = new Post(); //crei oggetto vuoto

        $this->fillAndSavePost($post, $data);//richiami la funzione che fa il match tra le proprietà del data e le salva 

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
    public function edit(Post $post)//metti l'oggetto di tipo model, così richiama l' id che riceve
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();//dalla request prendi tutti i dati

       // $post->update($data);  //update = fill + save [dopo aver definito le proprietà nel model]

        $this->fillAndSavePost($post, $data);//richiama allo stesso modo la funzione

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    private function fillAndSavePost(Post $post, $data) { //function privata che viene richiamata in store e in update
        
        $post->title = $data['title'];
        $post->cover = $data['cover'];
        $post->author = $data['author'];
        $post->content = $data['content'];
        $post->date = $data['date'];
        $post->save();
    }
}
