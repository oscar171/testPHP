<table class="table table-responsive" id="movies-table">
    <thead>
        <th>Titulo</th>
        <th>Categoria</th>
        <th>Mi Valoracion</th>
        <th>CantClientes</th>
        <th>Promedio</th>
    </thead>
    <tbody>
    @foreach($movies as $movie)
        <tr>
            <td>{!! ucfirst($movie->title) !!}</td>
            <td>{!! ucfirst($movie->categorie->name) !!}</td>
            <td>
            @if(!$movie->valoracion->isEmpty())
                @foreach($movie->valoracion as $valoracion)
                {!! $valoracion->rating !!}
                {!! Form::open(['route' => ['ratings.destroy', $valoracion->id], 'method' => 'delete']) !!}
                    
                        <a href="{!! route('ratings.edit', [$valoracion->id]) !!}" class='btn btn-default btn-xs'>Cambiar</a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    {!! Form::close() !!}
                @endforeach
            @else
            <a href="{!! route('ratings.create',['movie_id' => $movie->id]) !!}" class='btn btn-default btn-xs'>Valorar</a>
            @endif
            </td>
            <td>{!! $movie->clientes !!}</td>
            <td>{!! $movie->promedio !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>