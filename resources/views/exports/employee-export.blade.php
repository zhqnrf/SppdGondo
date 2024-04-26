<!DOCTYPE html>
<html>

<body>
    <table style="border-collapse: collapse; width: 100%;">
        {{-- @dd($data) --}}
        <thead>
            <tr>
                <th style="background-color: salmon; border: 1px solid black; padding: 8px; text-align: left;">No</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">NAMA</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">NIP</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">PANGKAT</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">GOLONGAN</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">JABATAN</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">UANG HARIAN</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">UANG MAKAN</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">UANG TRANSPORT</th>
                <th style="background-color: yellow; border: 1px solid black; padding: 8px; text-align: left;">STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style="background-color: salmon; border: 1px solid black; padding: 8px; text-align: left;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['name'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['nip'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['rank'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['group'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['position'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['daily_money'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['food_money'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">{{ $item['transport_money'] }}</td>
                    <td style="border: 1px solid black; padding: 8px; text-align: left;">
                        @if ($item['isInstructions'])
                            Bertugas
                        @else
                            Tidak Bertugas
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
