@extends('mail.layouts.base')

@section('title', 'Booking anda menunggu persetujuan !')

@section('content')
<center style="width: 100%; background-color: #f5f6fa;">
     <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['url'] }}</p>
   
    <p>Thank you</p>
</center>
@endsection