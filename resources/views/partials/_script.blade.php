    
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/jquery-validation/dist/jquery.validate.js"></script>
    <script src="/DataTables/datatables.js"></script>
    <script src="/DataTables/Data/js/dataTables.bootstrap4.min.js"></script>
    <script src="/node_modules/popper/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/toastr/toastr.js"></script>
    <script src="/argon-design/argon-design/assets/js/argon.js"></script>
    <script src="/jQuery-Mask/dist/jquery.mask.js"></script>
    <script src="/js/_script.js"></script>
    @yield('scripts')
    <script>
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
            @if(Session::has('repeat'))
                toastr.warning('{{ Session::get('repeat') }}');
            @endif
    </script>