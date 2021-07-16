<div class="footer">
    <div class="container">
        <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
    </div>
</div>
<script src="{{ asset('scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/EnableDisableAgent.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
</script>