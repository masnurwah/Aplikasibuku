<script>
    @if(Session::has('message'))
        toastr.options.timeOut = "{{ Session::get('time', '2000') }}";
        toastr.options.closeButton = true;

        $context = "{{ Session::get('alert', 'info') }}";
        $message = "{{ Session::get('message') }}";
        $position = "{{ Session::get('position', 'top-right') }}";

        if ($context === '') {
            $context = 'info';
        }

        if ($position === '') {
            $positionClass = 'toast-top-right';
        } else {
            $positionClass = 'toast-' + $position;
        }

        toastr.remove();
        toastr[$context]($message, '', {
            positionClass: $positionClass
        });
    @endif
</script>