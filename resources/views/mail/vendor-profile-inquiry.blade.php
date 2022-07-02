<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <table>
        <thead>
            
        </thead>
        <tbody>
            <tr>
                <td style="font-size: 15px;">Dear {{ $userName }},</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">We have received new inquiry on your profile. Please read inquiry details below:</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">
                    <span><strong>User Name:</strong> {{ $inquiryUserName }}</span><br />
                    <span><strong>Email:</strong> {{ $inquiryEmail }}</span><br />
                    <span><strong>Mobile:</strong> {{ $inquiryMobile }}</span><br />
                    <span><strong>Message:</strong> {{ $inquiryMessage }}</span><br />
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>