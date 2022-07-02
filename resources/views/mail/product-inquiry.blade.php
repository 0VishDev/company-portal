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
                <td style="font-size: 15px;">Dear {{ $product['user']['name'] }},</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">We have received new inquiry for <strong>{{ $product['product_name'] }}</strong>. Please read inquiry details below:</td>
            </tr>
            <tr>
                <td style="padding-top: 10px;font-size: 15px;">
                    <span><strong>User Name:</strong> {{ $productInquiry['name'] }}</span><br />
                    <span><strong>Email:</strong> {{ $productInquiry['email'] }}</span><br />
                    <span><strong>Mobile:</strong> {{ $productInquiry['mobile'] }}</span><br />
                    <span><strong>Product Name:</strong> {{ $product['product_name'] }}</span><br />
                    <span><strong>Location:</strong> {{ $productInquiry['location'] }}</span><br />
                    <span><strong>Quantity:</strong> {{ $productInquiry['quantity'] }}</span><br />
                    <p style="margin-top: 0;"><strong>Requirement type:</strong> {{ $productInquiry['requirement_type'] }}<br><strong>Want to Buy:</strong> {{ $productInquiry['want_to_buy'] }}<br><strong>I want to Buy:</strong> {{ $productInquiry['i_want_to_buy'] }}<br><strong>Purpose:</strong> {{ $productInquiry['purpose'] }}<br><strong>Description:</strong> {{ $productInquiry['buying_request_description'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>