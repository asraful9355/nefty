@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
<div class="list-group list-group-flush">
   <a href="{{ route('dashboard') }}" class="list-group-item d-flex justify-content-between align-items-center {{ ($route == 'dashboard')? 'active':'' }}">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
   <a href="{{ route('user.orders.index') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a>
  <!--  <a href="#" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Downloads <i class='bx bx-download fs-5'></i></a> -->
   <a href="{{ route('user.address') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
   <!-- <a href="#" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a> -->
   <a href="{{ route('user.profile.index') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent {{ ($route == 'user.profile.index')? 'active':'' }}">Account Details <i class='bx bx-user-circle fs-5'></i></a>
   <a href="{{ route('user.change.password') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent {{ ($route == 'user.change.password')? 'active':'' }}">Password Change <i class="fa-solid fa-lock fs-5"></i></a>
   <a  href="{{ route('user.logout') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
   </form>
</div>