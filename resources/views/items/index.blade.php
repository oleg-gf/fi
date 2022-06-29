@extends('layouts.main')

@section('content')

<table>
    {{ asset('storage/file.txt');}}
    @foreach ($items as $item)
        <tr>
            <td style="border: 1px solid black">{{ $item['id'] }}</td>
            <td style="border: 1px solid black">{{ $item->selectioner->abbreviation }}-{{ $item['name'] }}</td>
            <td style="border: 1px solid black">{{ $item['price'] }}</td>
            <td style="border: 1px solid black">{{ $item['description'] }}</td>
       </tr>
        
    @endforeach    
</table>


@endsection