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
                <td style="padding-top: 10px;font-size: 15px;">We have send inquiry for <strong><?php echo e((isset($productInquiry->product) ? $productInquiry->product->product_name : $productInquiry->product_name)); ?></strong>. Please read inquiry details below:</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">
                    <span><strong>User Name:</strong> <?php echo e((isset($productInquiry->user) ? $productInquiry->user->name : $productInquiry->name)); ?></span><br />
                    <span><strong>Email:</strong> <?php echo e((isset($productInquiry->user) ? $productInquiry->user->email : $productInquiry->email)); ?></span><br />
                    <span><strong>Mobile:</strong> <?php echo e((!empty($productInquiry->user->mobile) ? $productInquiry->user->mobile : (!empty($productInquiry->user->user_phone) ? $productInquiry->user->user_phone : $productInquiry->mobile))); ?></span><br />
                    <span><strong>Product Name:</strong> <?php echo e((isset($productInquiry->product) ? $productInquiry->product->product_name : $productInquiry->product_name)); ?></span><br />
                    <span><strong>Location:</strong> <?php echo e($productInquiry->location); ?></span><br />
                    <span><strong>Quantity:</strong> <?php echo e($productInquiry->quantity); ?></span><br />
                    <p style="margin-top: 0;"><strong>Requirement type:</strong> <?php echo e($productInquiry->requirement_type); ?><br><strong>Want to Buy:</strong> <?php echo e($productInquiry->want_to_buy); ?><br><strong>I want to Buy:</strong> <?php echo e($productInquiry->i_want_to_buy); ?><br><strong>Purpose:</strong> <?php echo e($productInquiry->purpose); ?><br><strong>Description:</strong> <?php echo e($productInquiry->buying_request_description); ?></p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html><?php /**PATH /home/ltqh13w2vszk/public_html/resources/views/mail/send-seller-product-inquiry.blade.php ENDPATH**/ ?>