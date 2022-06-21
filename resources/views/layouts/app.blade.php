@include('layouts.header')

<livewire:frontend.product-modal-shared />

<!-- Main content -->
<div class="container">
    @yield('content')
</div>

@include('layouts.footer')