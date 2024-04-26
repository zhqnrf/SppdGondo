@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/zh-TW.min.js"></script>
    <select id="listemployee" multiple style="width: 300px;">

    </select>

    <script>
        $(document).ready(function() {
            var listemployee = [{
                    'name': "Bayyu",
                    "id": "123"
                },
                {
                    'name': "John",
                    "id": "456"
                },
                {
                    'name': "Emma",
                    "id": "789"
                },
                {
                    'name': "Michael",
                    "id": "321"
                },
            ];

            $('#listemployee').select2({
                data: listemployee.map(function(item) {
                    return {
                        id: item.id,
                        text: item.name
                    };
                }),
                placeholder: "Select employees"
            });
        });
    </script>
@endsection
