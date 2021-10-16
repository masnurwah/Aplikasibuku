<!-- Javascript -->
<script src="{{ url('assets/backend') }}/bundles/libscripts.bundle.js"></script>
<script src="{{ url('assets/backend') }}/bundles/vendorscripts.bundle.js"></script>
<!-- alert toastr -->
<script src="{{ url('assets/plugin') }}/toastr/toastr.js"></script>
@include('layouts.alert')

@yield('script')

<script src="{{ url('assets/backend') }}/bundles/mainscripts.bundle.js"></script>
<script src="{{ url('assets/backend') }}/bundles/morrisscripts.bundle.js"></script>

