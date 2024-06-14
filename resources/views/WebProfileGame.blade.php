@extends('welcome')
@section('content_profile')

<table border="1">

    @foreach($profilegame as $Get)
    <tr>
        <td>
            <a href="{{ $Get->link_profile }}" target="_blank">{{ $Get->judul_profile }}</a>
            <br>
            <br>
            <a href="{{ $Get->link_profile }}" target="_blank">
                <img src="{{ $Get->gambar_profile }}" alt="{{ $Get->judul_profile }}" style="width:200px; height:auto;">
                <br>
            </a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
