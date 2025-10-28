<table class="min-w-full text-sm">
    <thead>
        <tr>
            <th class="px-2 py-1">ID</th>
            <th class="px-2 py-1">Título</th>
            <th class="px-2 py-1">Capítulo</th>
            <th class="px-2 py-1">Gestión</th>
            <th class="px-2 py-1">Grado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requisitos as $req)
            <tr>
                <td class="px-2 py-1">{{ $req->id }}</td>
                <td class="px-2 py-1">{{ $req->req_titulo }}</td>
                <td class="px-2 py-1">{{ $req->rec_capitulo }}</td>
                <td class="px-2 py-1">{{ $req->req_gestion }}</td>
                <td class="px-2 py-1">{{ $req->rasc_grado }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
