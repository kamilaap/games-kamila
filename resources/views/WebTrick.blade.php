@extends('welcome')
@section('content_trick')

<table border="1">

    @foreach($trick as $Get)
    <tr>
        <td>
            <a href="{{ $Get->link_trick }}" target="_blank">{{ $Get->judul_trick }}</a>
            <br>
            <br>
            <a href="{{ $Get->link_trick }}" target="_blank">
                <img src="{{ $Get->gambar_trick }}" alt="{{ $Get->judul_trick }}" style="width:200px; height:auto;">
                <br>
            </a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
