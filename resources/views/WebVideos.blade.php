@extends('welcome')
@section('content_videos')

<table border="1">

    @foreach($videos as $Get)
    <tr>
        <td>
            <a href="{{ $Get->link_videos }}" target="_blank">{{ $Get->judul_videos }}</a>
            <br>
            <br>
            <a href="{{ $Get->link_videos }}" target="_blank">
                <img src="{{ $Get->gambar_videos }}" alt="{{ $Get->judul_videos }}" style="width:200px; height:auto;">
                <br>
            </a>
        </td>
    </tr>
    @endforeach
</table>



@endsection
