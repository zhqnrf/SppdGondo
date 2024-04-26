<!DOCTYPE html>
<html>

<body>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">No</th>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['name'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
