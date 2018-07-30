<script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('AdminLte/js/adminlte.min.js') }}"></script>
<script src="{{ asset('datatables/datatables.js') }}"></script>
<script src="{{ asset('select2/js/select2.js') }}"></script>
<script src="{{ asset('iCheck/icheck.min.js') }}"></script>

<script>
    function notifikasi(notif) {
        new PNotify({
            title: notif.title,
            text: notif.text,
            type: notif.type,
            desktop: {
                desktop: true
            }
        }).get().click(function(e) {
            if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
        });
    }
</script>

@yield('js')