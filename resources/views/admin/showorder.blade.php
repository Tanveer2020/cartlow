
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css')
  </head>
  <body>
   

      @include('admin.sidebar') 

      <!-- partial -->

 
      @include('admin.navbar')


        <!-- partial -->
       
 <div style="padding-bottom: 30px;"  class="container-fluid page-body-wrapper">

             

            <div class="container" align="center">

              <table>
                
                <tr style="background-color: gray;">
                  
                  <td style="padding:20px;">Customer Name</td>
                  <td style="padding:20px;">Phone</td>
                  <td style="padding:20px;">Address</td>
                  <td style="padding:20px;">Product title</td>
                  <td style="padding:20px;">Price</td>
                  <td style="padding:20px;">Quantity</td>
                  <td style="padding:20px;">Status</td>
                  <td style="padding:20px;">Action</td>


                </tr>


              @foreach($orders as $order)
                <tr align="center" style="background-color:black;">
                  
                
                 <td style="padding:20px;">{{$order->name}}</td>
                 <td style="padding:20px;">{{$order->phone}}</td>
                 <td style="padding:20px;">{{$order->phone}}</td>
                 <td style="padding:20px;">{{$order->address}}</td>
                 <td style="padding:20px;">{{$order->product_name}}</td>
                 <td style="padding:20px;">{{$order->price}}</td>
                 <td style="padding:20px;">{{$order->quantity}}</td>
                 <td style="padding:20px;">{{$order->status}}</td>
                 <td style="padding:20px;"><a class= "btn btn-success" href="{{url('updatestatus',$order->id)}}}">Delivered</a></td>



                </tr>

              @endforeach

              </table>

            </div>

          </div>


          <!-- partial -->
       @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>