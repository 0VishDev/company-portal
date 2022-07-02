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
                <td style="font-size: 15px;">Dear <?php echo e($product['user']['name']); ?>,</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">We have received new inquiry for <strong><?php echo e($product['product_name']); ?></strong>. Please read inquiry details below:</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">
                    <span><strong>User Name:</strong> <?php echo e($productInquiry['name']); ?></span><br />
                    <span><strong>Email:</strong> <?php echo e($productInquiry['email']); ?></span><br />
                    <span><strong>Mobile:</strong> <?php echo e($productInquiry['mobile']); ?></span><br />
                    <span><strong>Product Name:</strong> <?php echo e($product['product_name']); ?></span><br />
                    <span><strong>Location:</strong> <?php echo e($productInquiry['location']); ?></span><br />
                    <span><strong>Quantity:</strong> <?php echo e($productInquiry['quantity']); ?></span><br />
                    <p style="margin-top: 0;"><strong>Requirement type:</strong> <?php echo e($productInquiry['requirement_type']); ?><br><strong>Want to Buy:</strong> <?php echo e($productInquiry['want_to_buy']); ?><br><strong>I want to Buy:</strong> <?php echo e($productInquiry['i_want_to_buy']); ?><br><strong>Purpose:</strong> <?php echo e($productInquiry['purpose']); ?><br><strong>Description:</strong> <?php echo e($productInquiry['buying_request_description']); ?></p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html><?php /**PATH /home/a0yq2z3dupoj/public_html/demo/resources/views/mail/product-inquiry.blade.php ENDPATH**/ ?>