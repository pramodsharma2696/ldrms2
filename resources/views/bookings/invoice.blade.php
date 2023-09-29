<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laptop & Desktop Rental Management System-Invoice</title>
</head>
<body>

<div style="margin-left:50px;">


<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="8" >Invoice of #{{ $booking->BookingNumber }}</th> 
  </tr>
  <tr>
    <th colspan="3">Booking Date :</th>
<td colspan="5">  </b> {{$booking->DateofBooking}}</td>
  </tr>
  

<th>Booking Number</th>
<th>Booking Date</th>
<th>From  Date</th>
<th>To Date</th>
<th>Product Image</th>  
<th>Product Name</th> 
<th>Quantity</th>    
<th>Rental Price</th>   
<th>Total Price</th>   

</tr>



<tr>
<td>{{ $booking->BookingNumber }}</td>
<td>{{$booking->DateofBooking}}</td>
<td>{{$booking->FromDate}}</td>
<td>{{$booking->ToDate}}</td>
<td>
<img class="b-goods-f__img img-scale"
                          src="{{ asset('products/images/' . $booking->product->Image) }}"
                          alt="{{ $booking->product->Image }}"
                          width="300"
                          height="250">
</td>
<td>{{$booking->product->ProductName}}</td> 
<td>{{$booking->Quantity}}</td> 
<td>{{$booking->product->RentalPrice}} </td> 
<td>Rs.{{$booking->TotalCost}}
</td>
    
</tr>

</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Close" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

