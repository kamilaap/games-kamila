@extends('welcome')
@section('content_news')

<table border="1">

    @foreach($news as $Get)
    <tr>
        <td>
            <a href="{{ $Get->link_news }}" target="_blank">{{ $Get->judul_news }}</a>
            <br>
            <br>
            <a href="{{ $Get->link_news }}" target="_blank">
                <img src="{{ $Get->gambar_news }}" alt="{{ $Get->judul_news }}" style="width:200px; height:auto;">
                <br>
            </a>
        </td>
    </tr>
    @endforeach
</table>

@endsection


