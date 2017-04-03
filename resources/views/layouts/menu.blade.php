

<li class="{{ Request::is('movies*') ? 'active' : '' }}">
    <a href="{!! route('movies.index') !!}"><i class="fa fa-edit"></i><span>Peliculas</span></a>
</li>

<li class="{{ Request::is('ratings*') ? 'active' : '' }}">
    <a href="{!! route('ratings.index') !!}"><i class="fa fa-edit"></i><span>Valoraciones</span></a>
</li>

