<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cobardia (firebrick)</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Invoicebus Invoice Template">
    <meta name="author" content="Invoicebus">

    <meta name="template-hash" content="baadb45704803c2d1a1ac3e569b757d5">

    <link rel="stylesheet" href="{{asset('invoice/css/template.css')}}">
    <style>
      section.product-total-sum {
    display: flex;
    flex-direction: inherit;
    justify-content: flex-end;
    padding-right: 34px;
}
    </style>
  </head>
  <body>
    <div id="container">
      <section id="memo">
        <!-- 
          <div class="logo">
          <img data-logo="{company_logo}" />
        </div> -->
        
        <div class="company-info">
          <div>company_name</div>

          <br />
          
          <span>{company_address}</span>
          <span>{company_city_zip_state}</span>

          <br />
          
          <span>{company_phone_fax}</span>
          <span>{company_email_web}</span>
        </div>

      </section>

      <section id="invoice-title-number">
      
        <span id="title">Invioce</span>
        <span id="number">{invoice_number}</span>
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="client-info">
        <span>{bill_to_label}</span>
        <div>
          <span class="bold">Buyer Name: {{$CustomerInvoice->name}}</span>
        </div>
        
        <div>
          <span>Buyer E-mail: {{$CustomerInvoice->email}}</span>
        </div>
        
        <div>
          <span>Buyer Address: {{$CustomerInvoice->address}}</span>
        </div>
        
        <div>
          <span>Buyer Phone: 1011012445</span>
        </div>
        
        
        
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="items">
        
        <table>
        
          <tr>
            <th>#</th> <!-- Dummy cell for the row number and row commands -->
            <th>Product Name</th>
            
            <th>Brand</th>
            <th>Quantity</th>
            <th>Price </th>
            <th>Total Price</th>
            
          </tr>
          @php
              $totalPrice = 0;
          @endphp
          @foreach ($CustomerInvoice->confirmProducts as $confirmProduc)
          <tr>
            <td>{{$loop->index +1 }}</td> <!-- Don't remove this column as it's needed for the row commands -->
            <td>{{$confirmProduc->product->name}}</td> <!-- Don't remove this column as it's needed for the row commands -->
           
            <td>{{$confirmProduc->product->brand}}</td>
            <td>{{$confirmProduc->quantity}}</td>
            <td>{{$confirmProduc->product->price}}</td>
            <td>{{$confirmProduc->quantity * $confirmProduc->product->price}}</td>
          </tr>
          @php
              $totalPrice = $totalPrice + $confirmProduc->quantity * $confirmProduc->product->price;
          @endphp
          @endforeach
        </table>
        
      </section>
      
      <section class="product-total-sum" >
      
        <table>
          <tr>
            <th>Subtotal</th>
            <td>{{number_format($totalPrice)}}</td>
          </tr>
          
          <tr >
            <th>Tex: </th>
            <td>10%</td>
          </tr>
          
          <tr >
            <th>GrantTotal:</th>
            <td>{{$grandtotal = $totalPrice * 0.10 + $totalPrice}}</td>
          </tr>
          
          <!-- You can use attribute data-hide-on-quote="true" to hide specific information on quotes.
               For example Invoicebus doesn't need amount paid and amount due on quotes  -->
          <tr>
            <th>Paid</th>
            <td>{amount_paid}</td>
          </tr>
          
          <tr >
            <th>{amount_due_label}</th>
            <td>{amount_due}</td>
          </tr>
          
        </table>

        <div class="clearfix"></div>
        
      </section>
      
      <div class="clearfix"></div>

      <section id="invoice-info">
        <div>
          <span>Issue Date: </span> <span>{{$CustomerInvoice->date}}</span>
        </div>
        

        <br />

        <div>
          <span>Currency</span> <span>BDT</span>
        </div>
        
      </section>
      
      <section id="terms">

        <div class="notes">Thank you very much for buying product form us. </div>

        <br />

        <div class="payment-info">
          <div>{payment_info1}</div>
          
        </div>
        
      </section>

      <div class="clearfix"></div>

      <div class="thank-you">{terms_label}</div>

      <div class="clearfix"></div>
    </div>
    <script src="http://cdn.invoicebus.com/generator/generator.min.js?data=data.js"></script>
    <script src="{{asset('invoice/data.js')}}"></script>
  </body>
</html>
