@include('frontend.header')
{{-- @include('backend.header') --}}
@include('frontend.navbar')
<div class="container">
    <x-flash-message/>
    @yield('content')
</div>
@include('frontend.footer')
{{-- @include('backend.footer') --}}
