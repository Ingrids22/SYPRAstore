@extends('cliente.plantilla.app')

@section('Titulo', 'Ordenes')

@section('contenido')

<div class="container orders-container">
    <br><br>
    <div class="row title-row">
      <div class="page-title">
        <h1>Your Orders</h1>
      </div>
    
    <div class="row order_sorter">
      <ul id="toggle-orders">
        <li class="first"></li>
        <li class="oh selected"><a href="#">Order History</a></li>
        <li class="fo"><a href="#">Pending/Future Orders</a></></li>
        <li class="ed"><a href="#">Edited (recent on top)</a></></li>
        <li class="com"><a href="#">Completed/Delivered</a></li>

      </ul>
    </div>
  
    <div class="row" id="order-history">
  
      <div class="row order-summary">
        <div class="totalspent-orders">
          <h2>$525.50</h2>
          <h3>Overall Total Spent</h3>
        </div>
        <div class="printqty-orders">
          <h2>15</h2>
          <h3>Overall Total Orders</h3>
        </div>
        <div class="mtd-orders">
          <h2>$30.00</h2>
          <h3>Month to Date Spent</h3>
        </div>
      </div>
      
  <!--     <div class="row download-all">
        <a href="#" class="all-history">Download All Order History</a>
      </div> -->
      
      <div class="row post-sorter">
        <span class="order-number">Export Order History<span>
        <select class="order-sorter">
          <option value="0">Select Year</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
        </select>
      </div>       
  
          
      <div class="order-container">
        
        <div class="header">
          <div class="row">
            <div class="col-1"><span>ORDERS PLACED</span><span>04/22/2017</span></div>
            <div class="col-2"><span>TOTAL</span><span>$150.50</span></div>
            <div class="col-3"><span>SHIP TO</span><span>James Doe</span></div>
            <div class="col-4"><span>ORDER#</span><span>791075</span></div>
          </div>
        </div>
        
        <div class="box">
          <div class="row">
            <div class="col-1">
              <img src="https://corefact.s3.amazonaws.com/store/prod_imgs/8217241/preview4060-0_catalog.jpg" alt="">
            </div>
            <div class="col-2">
              <div class="error-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Oops! We are unable to process your request at this time. Please try again later.</div>
              <span class="product-title">7224 S Perth Way - JS Postcard Global Luxury 3 Photo <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
              <p>Order Status: Delivered <br>
              Total Quantity 120 <br>
              Target Date: Aug 09, 2017 <br>
              Billed On: Aug 09, 2017 <br>
              Mailed: August 10, 2017</p>
              <a href="#" class="btn-default"><i class="fa fa-repeat" aria-hidden="true"></i> Re-Order</a>
            </div>
            <div class="col-3">
              <a href="#" class="btn-default"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
              <a href="#" class="btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
              <a href="#" class="btn-default"><i class="fa fa-truck" aria-hidden="true"></i> Track</a>
              <a href="#" class="btn-default"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
            </div>
          </div>
        </div>
        
      </div><!-- end of order-container -->        
  
          
      
    </div><!-- end of Order History -->  
  
        
        
        
    <div id="future-orders">
      
      <div class="order-container">
        
        <div class="header">
          <div class="row">
            <div class="col-1"><span>ORDERS PLACED</span><span>04/22/2017</span></div>
            <div class="col-2"><span>TOTAL</span><span>$150.50</span></div>
            <div class="col-3"><span>SHIP TO</span><span>James Doe</span></div>
            <div class="col-4"><span>ORDER#</span><span>791075</span></div>
          </div>
        </div>
        
        <div class="box">
          <div class="row">
            <div class="col-1">
              <img src="https://corefact.s3.amazonaws.com/store/prod_imgs/8217241/preview4060-0_catalog.jpg" alt="">
            </div>
            <div class="col-2">
              <span class="product-title">7224 S Perth Way - JS Postcard Global Luxury 3 Photo <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
              <p>Order Status: Delivered <br>
              Total Quantity 120 <br>
              Target Date: Aug 09, 2017 <br>
              Billed On: Aug 09, 2017 <br>
              Mailed: August 10, 2017</p>
              <a href="#" class="btn-default">Re-Order</a>
            </div>
            <div class="col-3">
              <a href="#" class="btn-default">Download</a>
              <a href="#" class="btn-default">Edit</a>
              <a href="#" class="btn-default">Track</a>
              <a href="#" class="btn-default">Cancel</a>
            </div>
          </div>
        </div>
        
      </div><!-- end of order-container -->
      
      
      
    </div><!-- end of future-orders -->    
    
  </div><!-- container ends -->
  

@endsection