{{-- email body for registration confirmation --}}
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height: 100vh; background-color:#aeaeae">
    <tr>
        <td align="center">
            <div style="width:50%; max-width:100%; background-color:white; padding: 2rem; border-radius: 10px">
                <p style="margin-bottom: 1rem">Dear {{ $participant->name }},</p>
                <p style="margin-bottom: 1rem">Thank you for submit RSVP for The Kick Off Day at Football Dept Concept Store, 18 Oktober 2025
                </p>
                <p style="margin-bottom: 1rem">Here is your RSVP number <b style="font-size: 4rem">{{$participant->participant_number}}</b>
                </p>
                <p style="margin-bottom: 1rem">Prepare your best at the Kick Off Day at FDCS!</p>
                <p style="">Sincerely, Football Dept Team</p>
            </div>
        </td>
    </tr>
</table>
