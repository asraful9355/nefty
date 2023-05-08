<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{asset('frontend/assets/images/favicon-32x32.png ')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('frontend/assets/plugins/OwlCarousel/css/owl.carousel.min.css ')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/plugins/simplebar/css/simplebar.css ')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css ')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/plugins/metismenu/css/metisMenu.min.css ')}}" rel="stylesheet" />
    <!-- loader-->
     <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="{{asset('frontend/assets/css/pace.min.css ')}}" rel="stylesheet" /> --}}
    <script src="{{asset('frontend/assets/js/pace.min.js ')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('frontend/assets/css/bootstrap.min.css ')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('frontend/assets/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/css/app.css ')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/icons.css ')}}" rel="stylesheet">
    <title>{{ get_setting('site_name')->value ?? 'null'}}</title>
    <!-- front awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Sweetalert css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
    <!-- Toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}" />
    <!-- Sweetalert css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
</head>
<body class="bg-theme bg-theme1">
    <b class="screen-overlay"></b>
    <!--wrapper-->
    <div class="wrapper">
        <!-- Header -->
        @include('frontend.body.header')
        <!--/ Header -->
        @yield('content-frontend')
        <!--end page wrapper -->
        <!-- Footer -->
        @include('frontend.body.footer')
        <!--/ Footer -->
        <!--start quick view product-->
        <!-- Modal -->
        @include('frontend.common.quickView')
        <!--end quick view product-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->
    <!-- switch theme -->
    @include('frontend.common.switchtheme')
    <!-- Bootstrap JS -->
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js ')}}"></script>
    <!--plugins-->
    <script src="{{asset('frontend/assets/js/jquery.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/plugins/simplebar/js/simplebar.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/plugins/metismenu/js/metisMenu.min.js ')}}"></script>
    <script src="{{asset('frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js ')}}"></script>

    <script src="{{asset('frontend/assets/plugins/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/price-slider.js')}}"></script>

    <!--app JS-->
    <script src="{{asset('frontend/assets/js/app.js ')}}"></script>
    <script src="{{asset('frontend/assets/js/index.js ')}}"></script>

    <!-- Toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Image Show -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!-- sweetalert js-->
    <script type="text/javascript">
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                  title: 'Are you sure?',
                  text: "Delete This Data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = link
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
            })

          });
        });
    </script>

    <!-- all toastr message show  Update-->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>

    <!-- all toastr message show  old-->
    <script type="text/javascript">
        @if(Session::has('success'))
          toastr.success("{{Session::get('success')}}");
        @endif
    </script>



<!-- Strt Add to Cart script -->
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })


   /* ============= Start Product View With Modal ========== */
    function productView(id){
        // alert(id)
        $.ajax({
            type:'GET',
            url: '/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
                console.log(data);
                $('#product_name').text(data.product.name_en);
                $('#pname').val(data.product.name_en);
                $('#product_id').val(id);
                $('#product_code').text(data.product.product_code);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.category_name_en);
                $('#pbrand').text(data.product.brand.brand_name_en);
                $('#pimage').attr('src', '/' + data.product.product_thumbnail);

                $('#pavailable').hide();
                $('#pstockout').hide();

                /* =========== Start Product Price ========= */
                var discount = 0;
                if(data.product.discount_price>0){
                    if(data.product.discount_type==1){
                        discount = data.product.discount_price;
                        $('#pprice').text(data.product.regular_price - discount);
                        $('#oldprice').text(data.product.regular_price);
                    }else if(data.product.discount_type==2){
                        discount = data.product.discount_price*data.product.regular_price/100;
                        $('#pprice').text(data.product.regular_price - discount);
                        $('#oldprice').text(data.product.regular_price);
                    }
                }else{
                    $('#pprice').text(data.product.regular_price);
                    $('#oldprice').text('');
                }

                $('#discount_amount').val(discount);

                if(data.product.stock_qty > 0){
                    $('#pavailable').show();
                }else{
                    $('#pstockout').show();
                }
                /* =========== End Product Price ========= */

                /* ============ Start Color ============= */
                /* ============ Color empty ============= */
                // $('select[name ="color"]').empty();
                //console.log(data.attributes);
                var i = 0;
                var html = '';
                $.each(data.attributes, function(key,value){
                    i++;

                    html +='<div class="col-12">';
                    html +=    '<label class="form-label">'+value.name+'</label>';
                    html +=    '<select class="form-select form-select-md">';
                    $.each(value.values, function(key,attr_value){
                        if(key==0){
                            html += '<option id="attr_val_li_'+value.id+value.name+'_'+attr_value+'" class="attr_val_li_'+value.id+value.name+'">';
                            html +=  '<a id="attr_'+value.id+value.name+'_'+attr_value+'" onclick="selectAttributeModal(this.id)" style="border: 1px solid #7E7E7E;">'+attr_value+'</a>';
                        }else{
                            html += '<option id="attr_val_li_'+value.id+value.name+'_'+attr_value+'" class="attr_val_li_'+value.id+value.name+'" style="margin-right: 5px;">';
                            html +=  '<a id="attr_'+value.id+value.name+'_'+attr_value+'" onclick="selectAttributeModal(this.id)" style="border: 1px solid #7E7E7E;">'+attr_value+'</a>';
                        }

                    });
                    html +='</select>';
                    html +='</div>';
                });
                html += '<input type="hidden" id="total_attributes" value="'+data.attributes.length+'">';
                $('#attributes').html(html);


                /* ========== Start Stock Option ========= */
                if(data.product.product_qty > 0){
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#aviable').text('aviable');

                }else{
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#stockout').text('stockout');
                }
                /* ========== End Stock Option ========== */

                /* ========= Start Add To Cart Product id ======== */
                $('#product_id').val(id);
                $('#qty').val(1);
                /* ========== End Add To Cart Product id ======== */
            }
        });
    }
    /* ============= End Product View With Modal ========== */

    function addToCart(){
        $('.size-filter li').removeClass("active");
        var product_name = $('#pname').val();
        var id = $('#product_id').val();
        var price = $('#product_price').val();
        var color = $('#color option:selected').val();
        var size = $('#size option:selected').val();
        var quantity = $('#qty').val();
        var varient = $('#pvarient').val();

        // alert(varient);

        var options = $('#choice_form').serializeArray();
        var jsonString = JSON.stringify(options);
        //console.log(options);

        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 1200
        });

        $.ajax({
        type:'POST',
        url:'/cart/data/store/'+id,
        dataType:'json',
        data:{
          color:color,size:size,quantity:quantity,product_name:product_name,product_price:price,product_varient:varient,options:jsonString,
        },
            success:function(data){
                console.log(data);
                miniCart();
                $('#closeModel').click();

                // Start Sweertaleart Message
                const Toast = Swal.mixin({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1200
                })

                if($.isEmptyObject(data.error)){
                    Toast.fire({
                      type:'success',
                      title: data.success
                    })
                }else{
                    Toast.fire({
                      type:'error',
                      title: data.error
                    })
                }
                // Start Sweertaleart Message


            }
        });
    }

    /* =========== Add to cart direct ============ */
    function addToCartDirect(id){
        var product_name = $('#'+id+'-product_pname').val();
        //var id = $('#product_product_id').val();
        //alert(id);
        // var color = $('#color option:selected').val();
        // var size = $('#size option:selected').val();
        var quantity = 1;

        // alert(product_name);

        // Start Message
        const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success',
              showConfirmButton: false,
              timer: 1200
        });

        $.ajax({
        type:'POST',
        url:'/cart/data/store/'+id,
        dataType:'json',
        data:{
          quantity:quantity,product_name:product_name
        },
            success:function(data){
                // console.log(data);
                miniCart();
                $('#closeModel').click();

                // Start Sweertaleart Message
                const Toast = Swal.mixin({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1200
                })

                if($.isEmptyObject(data.error)){
                    Toast.fire({
                      type:'success',
                      title: data.success
                    })
                }else{
                    Toast.fire({
                      type:'error',
                      title: data.error
                    })
                }
                // Start Sweertaleart Message


            }
        });
    }
    /* ============= Start AddToCart View With Modal ========== */

</script>

<script type="text/javascript">
    /* ============= Start MiniCart Add ========== */
    function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType:'json',
            success:function(response){
                // alert(response);

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('.cartQty').text(Object.keys(response.carts).length);
                $('#total_cart_qty').text(Object.keys(response.carts).length);

                var miniCart = "";

                if(Object.keys(response.carts).length > 0){
                    $.each(response.carts, function(key,value){
                        var slug = value.options.slug;
                        var base_url = window.location.origin;
                      miniCart += `
                        <a class="dropdown-item" href="javascript:;">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="cart-product-title">${value.name}</h6>
                                    <p class="cart-product-price">${value.qty} X  ${value.price}</p>
                                </div>
                                <div class="position-relative">
                                    <div class="cart-product-cancel position-absolute" id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                        <i class='bx bx-x'></i>
                                    </div>
                                    <div class="cart-product">
                                        <img src="/${value.options.image}" class="" alt="product image">
                                    </div>
                                </div>
                            </div>
                        </a>
                        `
                    });

                    $('#miniCart').html(miniCart);
                    $('#miniCart_empty_btn').hide();
                    $('#miniCart_btn').show();
                }else{
                    html = '<h4 class="text-center pt-4">Cart empty!</h4>';
                    $('#miniCart').html(html);
                    $('#miniCart_btn').hide();
                    $('#miniCart_empty_btn').show();
                }
            }
        });
    }
    /* ============ Function Call ========== */
    miniCart();

    /* ==================== Start MiniCart Remove =============== */
    function miniCartRemove(rowId){
        $.ajax({
           type:'GET',
           url: '/minicart/product-remove/' +rowId,
           dataType: 'json',
           success:function(data){

            cart();
            miniCart();
            couponCalculation();



            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 2000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    title: data.error
                })
            }
            // End Message
           }
        });
    }
    /* ==================== End MiniCart Remove =============== */

    /* ==================== Start My Cart Function  =============== */
    function cart(){
        $.ajax({
            type: 'GET',
            url: '/get-cart-product',
            dataType:'json',
            success:function(response){
            // console.log(response);
            var rows = "";
            // alert(Object.keys(response.carts).length);
            $('#total_cart_qty').text(Object.keys(response.carts).length);
                if(Object.keys(response.carts).length > 0){
                    $.each(response.carts, function(key,value){
                        console.log(response.carts);
                        var slug = value.options.slug;
                        var base_url = window.location.origin;
                        rows += `
                            <div class="col-12 col-lg-6">
                                <div class="d-lg-flex align-items-center gap-2">
                                    <div class="cart-img text-center text-lg-start">
                                        <img src="/${value.options.image}" width="130" alt="">
                                    </div>
                                    <div class="cart-detail text-center text-lg-start">
                                        <h6 class="mb-2">${value.name}</h6>

                                        <p class="mb-0">Size: <span>Regular</span>
                                        </p>
                                        <p class="mb-2">Color: <span>White & Blue</span>
                                        </p>

                                        <h5 class="mb-0">৳${value.price}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="cart-action text-center">
                                    ${value.qty > 1

                                        ? `<button type="submit" style="margin-right: 5px; background-color: #2dc5cc !important; font-size: 12px;" class="btn btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button>`

                                        : `  <button type="submit" style="margin-right: 5px;" class="btn btn-danger btn-sm" disabled >-</button> `

                                    }

                                    <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width: 34px;height: 29px;text-align: center;padding-left: 0px;">

                                    <button type="submit" style="margin-left: 5px; font-size: 12px;" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="text-center">
                                    <div class="d-flex gap-2 justify-content-center justify-content-lg-end">
                                        <a id="${value.rowId}" onclick="cartRemove(this.id)" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-x-circle'></i> Remove</a>
                                        <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-heart me-0'></i></a>
                                    </div>
                                </div>
                            </div>

                        `
                    });

                    $('#cartPage').html(rows);

                }else{
                    html = '<tr><td class="text-center" style="font-size: 18px; font-weight: bold;">Cart empty!</td></tr>';
                    $('#cartPage').html(html);
                }
            }
        });
    }
    cart();
    /* ==================== End My Cart Function  =============== */

    /* ==================== Start  cartIncrement ================== */
    function cartIncrement(rowId){
      $.ajax({
          type:'GET',
          url: "/cart-increment/"+rowId,
          dataType:'json',
          success:function(data){
            // console.log(data)
            cart();
            miniCart();
            couponCalculation();
          }
      });
    }
    /* ==================== End  cartIncrement ================== */

    /* ==================== Start  Cart Decrement ================== */
        function cartDecrement(rowId){
          $.ajax({
              type:'GET',
              url: "/cart-decrement/"+rowId,
              dataType:'json',
              success:function(data){
                // console.log(data)
                cart();
                miniCart();
                couponCalculation()
              }
          });
        }
    /* ==================== End  Cart Decrement ================== */

    /* ================ Start My Cart Remove Product =========== */
    function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/cart-remove/'+id,
            dataType:'json',
            success:function(data){
            cart();
            miniCart();
            couponCalculation()


            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 2000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message
            }
        });
    }

/* ==================== End My Cart Remove Product ================== */
</script>

<!--==================== Start Add To Wishlist Product ===================== -->
<script type="text/javascript">

  function addToWishList(product_id){

    $.ajax({
      type:"POST",
      dataType:'json',
      url: "/add-to-wishlist/"+product_id,

      success:function(data){

        // Start Message
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success
        })
        }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
           })
        }
      // End Message
      }
    })
  }
</script>
<!--==================== End Add To Wishlist Product ===================== -->

<!--==================== Start Add To Compare Product ===================== -->
<script type="text/javascript">
    function addToCompare(id){

        $.ajax({
          type:"POST",
          dataType:'json',
          url: '/compare/addToCompare/'+id,

          success:function(data){

            location.reload();

            $('#compare_list').html(data);
            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 2000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    title: data.error
                })
            }
            // End Message
          }

        })
    }
</script>
<!--==================== End Add To Compare Product ===================== -->

<!--================== Start All Coupon Calculation  =================== -->
<script type="text/javascript">
    /*--==================== Start Coupon Apply  ===================== --*/
    function applyCoupon(){

      var coupon_name = $('#coupon_name').val();
      $.ajax({
        type:'POST',
        dataType:'json',
        data:{coupon_name:coupon_name},
        url:"{{ url('/coupon-apply') }}",
        success:function(data){

            couponCalculation();
            $('#couponField').hide();

            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message
        }
     })
    }
    /*--==================== End Coupon Apply  ===================== --*/

    /* ==================== Start couponCalculation  ===================== */
    function couponCalculation(){
        $.ajax({
            type:'GET',
            url:"{{ url('/coupon-calculation') }}",
            dataType:'json',
            success:function(data){
                // console.log(data);

                if(data.total){

                    $('#couponCalField').html(
                        `
                        <p class="mb-2">Total: <span class="float-end">৳${data.total}</span>
                        </p>
                        <p class="mb-2">SubTotal: <span class="float-end">৳${data.total}</span>
                        </p>
                        <div class="my-3 border-top"></div>

                        `
                    )
                }else{
                    $('#couponCalField').html(
                        `

                        <p class="mb-2">Total: <span class="float-end">৳${data.subtotal}</span>
                        </p>
                        <p class="mb-2">SubTotal: <span class="float-end">৳${data.subtotal}</span>
                        </p>
                        <div class="my-3 border-top"></div>
                        <div class="cart-sub-total">
                            Coupon Name: <span class="inner-left-md">${data.coupon_name}</span>
                            <button type="submit" class="btn btn-light rounded-0 btn-ecomm" style="float:right;" onclick="couponRemove()"> <i class="fa fa-times"></i></button>
                        </div>

                        <p class="mb-2 mt-3">Coupon Discount Amount: <span class="float-end">৳${data.discount_amount}</span>
                        </p>
                        <div class="my-3 border-top"></div>
                        <h5 class="mb-0">Grand Total: <span class="float-end">৳${data.total_amount}</span></h5>

                        `
                    )
                } //end else
            }
        });


    }
    couponCalculation();
    /* ==================== End couponCalculation  ===================== */

    /* ==================== Start Coupon Remove  ===================== */
    function couponRemove(){
        $.ajax({
            type:'GET',
            url:"{{ url('/coupon-remove') }}",
            dataType:'json',
            success:function(data){

                $('#couponField').show();
                $('#coupon_name').val('');

                couponCalculation();

                // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',

                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message


            }
        })
    }
    /* ==================== End Coupon Remove  ===================== */

</script>
<!--================== End All Coupon Calculation  =================== -->

@stack('footer-script')

</body>

</html>
