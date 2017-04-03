@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Peliculas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($movie,['route' => ['ratings.store', 'movie_id' => $movie->id], 'method' => 'post']) !!}
                        
                        <!-- Title Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('title', 'Pelicula:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'disabled' => true]) !!}
                        </div>
                        <!-- Title Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('title', 'Categoria:') !!}
                            {!! Form::text('categorie', $movie->categorie->name, ['class' => 'form-control','disabled' => true]) !!}
                        </div>

                        <!-- Rating Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('rating', 'Rating:') !!}
                            {!! Form::selectRange('rating', 0, 10) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                              <a href="{!! route('movies.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
