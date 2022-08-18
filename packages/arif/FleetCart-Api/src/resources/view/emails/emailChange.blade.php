@section('title', "Email Verification | " . env('app.name'))

@section('content')

    <!-- Action -->
    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <h1>Please verify your email</h1>
                                        <p>You're almost there! We sent an email to {{$email}}</p>
                                        <h1 style="font-size:60px">{{$code}}</h1>
                                        <p>All you have to do is copy the confirmation code and paste it to your form to complete the email verification process</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

@endsection
