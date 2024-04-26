<!DOCTYPE html>
<html>

<body>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="background-color: salmon; border: 1px solid black; padding: 8px; text-align: left;">No</th>
                <th style="background-color: yellow;border: 1px solid black; padding: 8px; text-align: left;">Nama Akun</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style="background-color: salmon;border: 1px solid black; padding: 8px; text-align: left;">{{ $loop->iteration }}</td>
                    <td style="background-color: yellow ;border: 1px solid black; padding: 8px; text-align: left;">{{ $item['name'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
