<div class="rsidebar closed pt-0 mbs" id="sidebarr">
   <div class="sb-box p-4">
      <div class="w-100 d-flex flex-wrap justify-content-between">
        <span class="rtop text-dgreen"><svg xmlns="http://www.w3.org/2000/svg" width="19px" height="24px" viewBox="0 0 23.786 30"><g data-name="shopping-bag (3)" transform="translate(-53.023)"><g data-name="Group 2704"><g data-name="Group 17" transform="translate(53.023 5.918)"><g data-name="Group 16"><path data-name="Path 3" d="M76.8,119.826l-1.34-16.881A2.109,2.109,0,0,0,73.362,101H70.716v3.921a.879.879,0,1,1-1.757,0V101H60.875v3.921a.879.879,0,1,1-1.757,0V101H56.472a2.109,2.109,0,0,0-2.094,1.937l-1.34,16.886a4.885,4.885,0,0,0,4.87,5.259H71.926a4.884,4.884,0,0,0,4.87-5.261Zm-7.92-8.6-4.544,4.544a.878.878,0,0,1-1.243,0l-2.13-2.13A.878.878,0,0,1,62.2,112.4l1.509,1.508,3.923-3.923a.879.879,0,1,1,1.242,1.243Z" transform="translate(-53.023 -101.005)" fill="currentColor"></path></g></g><g data-name="Group 19" transform="translate(59.118)"><g data-name="Group 18"><path data-name="Path 4" d="M162.838,0a5.806,5.806,0,0,0-5.8,5.8v.119H158.8V5.8a4.042,4.042,0,1,1,8.083,0v.119h1.757V5.8A5.806,5.806,0,0,0,162.838,0Z" transform="translate(-157.039)" fill="currentColor"></path></g></g></g></g></svg>
        <span class="ic">1</span>Item
        </span>
        <span class="cols"><a class="text-dark" id="cartcls"><i class="fas fa-times"></i></a></span>
      </div>
      @php
          $total = 0;
      @endphp
      @if ($cart != null)
          @foreach($cart as $item)
      @php
          $total += $item->product->price * $item->quantity;
      @endphp
        <div class="d-flex flex-wrap justify-content-between py-2 bb">
          <div class="counter-area">
            <a href="{{ route('cart.increase',$item->id) }}" class="btn bg-gr d-block cart-increase"><i class="fas fa-plus"></i></a>
            <span class="icnt d-block px-3">{{ $item->quantity }}</span>
            <a href="{{ route('cart.decrease',$item->id) }}" class="btn bg-gr d-block cart-decrease"><i class="fas fa-minus"></i></a>
          </div>
          <div class="img-area">
            @if ($image = $item->product->images->first())
              <img src='{{ asset("/product_image/".$image->image) }}' alt="" class="img-fluid sbimg">
            @else
              <img class="img-fluid sbimg" src="{{ asset("product_image/product-image.jpg") }}" alt="Card image cap">
            @endif
          </div>
          <div class="iitemdt-area">
            <span class="d-block pname font-weight-bold py-1">{{ $item->product->title }}</span>
            <span class="d-block pprice text-dgreen font-weight-bold py-1"> ${{ $item->product->price }}</span>
            <span class="d-block pq py-1 text-secondary">1x{{ $item->quantity }}pc(s)</span>
          </div>
          <div class="prc-area text-dgreen py-3 my-auto font-weight-bold pl-4">${{ $item->product->price * $item->quantity }}</div>
          <div class="cls-area my-auto"><i class="fas fa-times p-3"></i></div>
        </div>
      @endforeach
      @endif
      
      <div class="rck pt-3">
        <button class="mbs cbtn w-100 mx-2 bg-dgreen p-2 mx-5 btn-block cartop " id="cartop">
          <span class="float-left text-white"><span class="citems p-1">{{ $cart != null ? $cart->count() : 0 }}</span> items</span>
          <span class="float-right"><span class="c-price bg-white text-dgreen p-1 mr-1">{{ $total }}$</span></span>
      </button>
      </div>
  </div>
</div>