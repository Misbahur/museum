@extends('mail.layouts.base')

@section('title', 'Booking anda menunggu persetujuan !')

@section('content')
<center style="width: 100%; background-color: #f5f6fa;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
        <tr>
           <td style="padding: 40px 0;">
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; padding-bottom:25px">
                                <a href="#"><img style="height: 40px" src="{{ asset('dist/images/logo2.png') }}" alt="logo"></a>
                                <h3 style="color: #222222; padding-top: 12px;">Museum Blambangan</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody>
                        <tr>
                            <td style="padding: 30px 30px 15px 30px;">
                                <h2 style="color: black; font-weight: 600; margin: 0;">Booking Anda Berhasil</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0 30px 20px;word-wrap: break-word">
                                <p style="margin-bottom: 10px;">Hi {{  $mailData['nama'] }},</p>
                                <p style="margin-bottom: 10px;">Selamat ! Booking anda untuk tanggal kunjungan {{ date('d-m-Y', strtotime($mailData['tanggal_berkunjung'])) }} telah kami terima, <strong> Tunggu persetujuan terlebih dahulu dan cek secara berkala</strong></p>
                                <div style="margin-top: 10px">
                                    <ul style="list-style-type: none; padding-left: 0; color: black;">
                                        <li>Nama : {{ $mailData['nama'] }}</li>
                                        <li>Alamat : {{ $mailData['alamat'] }}</li>
                                        {{-- <li>Kategori Kunjungan : {{ $mailData['kategori'] }}</li>
                                        <li>Sesi Kunjungan : {{ $mailData['sesi'] }}</li> --}}
                                        <li>Jumlah Pengunjung : {{ $mailData['jumlah_pengunjung'] }}</li>
                                        <li>Status Verif Kunjungan: {{ $mailData['status'] }}</li>
                                    </ul>
                                </div>
                                <center>
                                    <h2 style="color: black; margin-top:20px;">Kode Booking Anda : {{ $mailData['barcode'] }}</h2>
                                    <p style="color: black; margin-top:10px; margin-bottom: 10px;">Atau Pindai Kode QR Berikut : </p>
                                    {{-- {{ QrCode::size(250)->generate($mailData['barcode']); }} --}}
                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate($mailData['barcode'])) !!} ">
                                    <img src="{!!$message->embedData(QrCode::format('png')->size(250)->generate($mailData['barcode']), 'QrCode.png', 'image/png')!!}">
                                    <p style="color: black; margin-top:10px; margin-bottom: 10px;">A/n. {{ $mailData['nama'] }}</p>
                                    <a href="{{ route('cekkode',['kode' => $mailData['barcode']] )}}" style="background-color:#50C594;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px; margin-bottom: 30px;">Cek Status Booking</a>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0 30px 20px">
                                <center style="margin-top: 20px;">
                                    <p style="margin-bottom: 10px;">Follow Instagram Kami :</p>
                                    <img src="{{ asset('dist/images/instagram.png')}}" alt="" style="max-width: 15px;display: inline-block;margin-bottom: -2px;"> <span><a
                                href="https://www.instagram.com/museumblambangan/"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">Museumblambangan</a></span>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; padding:25px 20px 0;">
                                <p style="font-size: 13px;">&copy; {{ '2021 by Odete Jaya Kreatif' }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
           </td>
        </tr>
    </table>
</center>
@endsection
