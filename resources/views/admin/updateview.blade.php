
<!DOCTYPE html>
<html lang="en">
  <head>


<base href="/public"> 

    @include('admin.css')

  <style type="text/css">
    
    .title{
 color:white; 
 padding-top:25px;
 font-size: 25px;"

    }

    label{
      display: inline-block;
      width:200px;
    }
  </style> 

  </head>
 
  <body>
   

      @include('admin.sidebar') 

      <!-- partial -->

 
      @include('admin.navbar')


        <!-- partial -->
       


             <div class="container-fluid page-body-wrapper">

             

            <div class="container" align="center">
            <h1 class="title">Update Product</h1>

            @if(session()->has('success'))

            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss = "alert">x</button>
     
           {{session()->get('success')}}

           </div>
           
            @endif
            <form action="{{url('updateproduct',$products->id)}}" method="post" enctype = "multipart/form-data">

              @csrf

            <div style="padding:15px;">

              <label>Product title</label>

              <input style="color:black;" type="text" name="title" value = "{{$products->title}}">
              

            </div>

            

            <div style="padding:15px;">

              <label>Price</label>

              <input style="color:black;" type="number" name="price" value = "{{$products->price}}">
              

            </div> 
            <div style="padding:15px;">

              <label>Description</label>

              <input style="color:black;" type="text" name="desc" value = "{{$products->description}}">
              

            </div>
            <div style="padding:15px;">

              <label>Quantity</label>

              <input style="color:black;" type="text" name="quantity" value = "{{$products->quantity}}">
              

            </div>

                      <div style="padding:15px;">

              <label>Old Image</label>
            
               <img width="100" height="100" src="/images/{{$products->image}}">
              
              

            </div>




            <div style="padding:15px;">

              <label>Change the Image</label>

              <input type="file" name="file">
            </div>

              <div style="padding:15px;">
            
              <input class="btn btn-success" type="submit">
       
       </div>
     </form>
             </div>
        </div>    

          <!-- partial -->
       @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>