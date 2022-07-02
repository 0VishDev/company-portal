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
                <td style="font-size: 15px;">Dear <?php echo e($userName); ?>,</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">We have received new inquiry on your profile. Please read inquiry details below:</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">
                    <span><strong>User Name:</strong> <?php echo e($inquiryUserName); ?></span><br />
                    <span><strong>Email:</strong> <?php echo e($inquiryEmail); ?></span><br />
                    <span><strong>Mobile:</strong> <?php echo e($inquiryMobile); ?></span><br />
                    <span><strong>Message:</strong> <?php echo e($inquiryMessage); ?></span><br />
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/mail/vendor-profile-inquiry.blade.php ENDPATH**/ ?>