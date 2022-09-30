@extends('mail.layouts.base')

@section('title', 'Booking anda menunggu persetujuan !')

@section('content')
<center style="width: 100%; background-color: #f5f6fa;">
     <h1>Hallo, {{ $nama }}</h1>
    <a href="{{ $website }}">{{ $website }}</a>
   
    <p>Thank you</p>
</center>
@endsection