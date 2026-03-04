<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invitation</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <table width="500" cellpadding="0" cellspacing="0" 
                       style="background:#ffffff; padding:30px; border-radius:8px;">

                    <tr>
                        <td align="center">
                            <h2 style="margin:0; color:#333;">
                                {{ $name }} You're Invited 🎉
                            </h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top:20px; color:#555; font-size:15px;">
                            <p>Hello {{ $name ?? 'Guest' }},</p>

                            <p>
                                We are pleased to invite you to join us.
                                Click the button below to accept the invitation.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding-top:25px;">
                            <a href="{{ $link ?? '#' }}"
                               style="background:#4f46e5; color:#ffffff; 
                                      padding:10px 20px; text-decoration:none; 
                                      border-radius:5px; font-weight:bold;">
                                Accept Invitation
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top:30px; font-size:13px; color:#888;" align="center">
                            © {{ date('Y') }} Your Application
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>