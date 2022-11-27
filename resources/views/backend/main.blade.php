@include('backend.header')
@include('backend.sidebar')

<!-- ====================================
——— PAGE WRAPPER
===================================== -->
<div class="page-wrapper">
    @include('backend.content-header')
    <!-- ====================================
    ——— CONTENT WRAPPER
    ===================================== -->
    <div class="content-wrapper">
        <div class="content">
            @yield('content')
        </div>
    </div>

    @include('backend.content-footer')

</div>
@include('backend.footer')
