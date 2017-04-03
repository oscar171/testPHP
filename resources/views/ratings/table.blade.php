<table class="table table-responsive" id="ratings-table">
    <thead>
        <th>Valoracion</th>
        <th>Pelicula</th>
        <th>Cliente</th>
    </thead>
    <tbody>
    @foreach($ratings as $rating)
        <tr>
            <td>{!! $rating->rating !!}</td>
            <td>{!! $rating->movie->title !!}</td>
            <td>{!! $rating->user->name !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>