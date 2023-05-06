<a href="{{ route('compare') }}" class="nav-link cart-link">
	<i class="fa-solid fa-code-compare"></i>
	<span class="flex-grow-1 ml-1 alert-count">
        @if(Session::has('compare'))
            <span class="badge badge-primary badge-inline badge-pill">{{ count(Session::get('compare'))}}</span>
        @else
            <span class="badge badge-primary badge-inline badge-pill">0</span>
        @endif
    </span>
</a>