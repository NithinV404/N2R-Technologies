<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href=".Css/bill.css">
    <link rel="icon" href="../Assets/logo.png">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <title>Invoice.!</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="top">
            <div class="header">
                <image class="logo" src="../Assets/logo.png"></image>
                <h1 id="logo-name">N2R SOLUTIONS</h1>
                    <h2>E-mail: n2r@hmail.com<br>
                        Phone:  25412365</h2>
            </div>
        </div>  
                <h3>Billing Invoice</h3> 
                <h4>Billed To :</h4>
                <div id='bill_details'>(customer details)</div>
                <div class="prd-details">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Product id</th>
                            <th>Product Name</th>
                            <th>Product price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                   <tbody id='tbody'>
                       <!--    <tr>
                            <td>(No)</td>
                            <td>(prd name)</td>
                            <td>(prd price)</td>
                            <td>(prd total)</td>
                        </tr>
                        <tr class="active-row">
                            <td>(No)</td>
                            <td>(prd name)</td>
                            <td>(prd price)</td>
                            <td>(prd total)</td> 
                        </tr>-->
                    </tbody> 
                </table>
                </div>
                <h6>Payment Status</h6>
                <h7>Payment Method: COD</h7>
                <div class="info">
                <p>Thank you for shopping with N2R SOLUTIONS</p> 
            </div>
           </div>
           <script>
               $(document).ready(function(){  
         $.ajax({  
         type:"POST",  
         url:"bill_prd_details.php",  
         success: function(data){  
            $('#tbody').html(data);
         }  
        });  
         $.ajax({  
         type:"POST",  
         url:"bill_details.php",  
         success: function(data){  
            $('#bill_details').html(data);
         }  
        });
   });  
     </script>












</body>
</html>