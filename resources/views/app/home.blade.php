
<!--creata view con la index in vue.js alla quale estendo il layout base che mi permetterà di inserire vue-->

@extends('layouts.app')


@section('content')
    <div class="container">
        CIAONE
            <div id="app"> <!--in questo modo attivi vue.js-->

            <post-list/> <!--dopo averlo registrato in app.js, richiama il componente-->

            </div>
    </div>
@endsection