{{-- email body for registration confirmation --}}
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height: 100vh; background-color:#aeaeae">
    <tr>
        <td align="center">
            <div style="width:500px; max-width:100%; background-color:white; padding: 1rem; border-radius: 10px; text-align:start;">
                <img src="{{ asset('assets/img/banner.png') }}" alt="Dsl Invitation" style="width: 100%; margin-top: .1rem; margin-bottom: .2rem;">
                <p style="margin-bottom:0">Halo! {{$participant->name}}</p>
                <p style="margin-botton:0">Terima kasih sudah mendaftar.</p>
                <p style="margin-bottom: 1rem">Berikut adalah detail informasi registrasi Anda:</p>
                <div style="text-align: center;">
                    <div style="">Nomor Peserta</div>
                    <div><b style="font-size: 4rem">{{$participant->participant_number}}</b></div>
                </div>
                <div>Nama : {{$participant->name}}</div>
                <div>NIK : {{$participant->nik}}</div>
                @if ($participant->customer_code)
                    <div>ID Pelanggan : {{$participant->customer_code}}</div>
                    @if ($participant->additional_participant)
                        <div>Tambahan Pendamping : {{count($participant->additional_participant)}}</div>
                    @endif
                @endif
                <p style="text-align:center; margin-bottom:0;">Kami tunggu kehadirannya!</p>
            </div>
        </td>
    </tr>
</table>