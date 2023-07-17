<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Specialty</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($doctors as $doctor)
        <tr>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->specialty }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
