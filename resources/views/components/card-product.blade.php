{{-- cardProd --}}
{{-- @dd($product) --}}
<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
    ma card
    <div class="  bg-gray-300 h-64 flex items-center justify-center">
        <img src="{{$product->image}}" alt="">
        
       
         
        
    </div>
    <div class=" p-4">
            
        <span class="text-xs text-orange-600 font-semibold">{{$product->category->name}}
            
            
            
            category
        
        </span>
        <h3 class="text-lg font-bold mt-2 mb-2 text-gray-800">{{$product ->name}}
            Nom Product
        </h3>
        
        <p class="text-gray-600 text-sm mb-4 ">{{$product ->description}}
            
            Description
            
        </p>
        
        <div class="flex items-center justify-between">
            
    
            
            <span class="text 2-xl font-bold text-blue-600">{{$product->price}}
                
                Prix
                
            </span>
            
            <a  href="{{route('show',$product->id)}}"   class="bg-blue-600 text-white px-4 rounded-lg hover:bg-blue-700 transition-colors">
                
                Voir
                
            </a>
            
        </div>
        
     </div>
</div>

