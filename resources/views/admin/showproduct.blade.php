
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

             @if(session()->has('success'))
                 
                 <div class="alert alert-success">

                 <button type="button" class="close" data-dismiss = "alert">x</button>

                 {{session()->get('success')}}
                  </div>
               
                  @endif
                <table>
                  
                  <tr style="background-color:gray;">
                    
                  <td style="padding:20px;">Title</td>
                  <td style="padding:20px;">Price</td>
                  <td style="padding:20px;">Description</td>
                  <td style="padding:20px;">Quantity</td>
                  <td style="padding:20px;">Image</td>
                  <td style="padding:20px;">Edit</td>
                  <td style="padding:20px;">Delete</td>

                  </tr>
                 
                 @foreach($products as $product)
                 
                  <tr align="center" style="background-color:black;">
                    
                  <td >{{$product->title}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->description}}</td>
                  <td>{{$product->quantity}}</td>
                  <td><img height="100px" width="100px"src="/images/{{$product->image}}"></td>

                  <td><a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</td>
                  <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete')" href="{{url('deleteproduct',$product->id)}}">Delete</td>  
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