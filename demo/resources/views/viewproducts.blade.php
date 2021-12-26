<!doctype html>
 <html lang="{{ app()->getLocale() }}">
     <head> 
         <title>View Products 1 Product Store</title>
     <!-- Styles etc. -->
     </head>
      <body>
           <div class="flex-center position-ref full-height"› 
                <div class="content"> 
                <hl>Here's a list of available products</hl> 
                <table>
                    <thead> 
                        <td>Name</td> 
                        <td>Description</td> 
                        <td>Count</td>
                    <td>Price</td> </thead>
                 <tbody> @foreach ($allProducts as Sproduct) <tr> 
                    <td>{{ $product->name }1</td>
                    <td class="inner-table">{{ Sproduct->description }}</td>
                    <td class="inner-table">{{ Sproduct->count }}</td>
                    <td class="inner-table">{{ $product->price }}</td> 
                    </tr> 
                    @endforeach
 </tbody>
 </table>
 </div>
 </div>
 </body>
  </html> 
