    
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/jquery-validation/dist/jquery.validate.js"></script>
    <script src="/DataTables/datatables.js"></script>
    <script src="/DataTables/Data/js/dataTables.bootstrap4.min.js"></script>
    <script src="/node_modules/popper/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/boostrap-typeahead.js"></script>
    <script src="/toastr/toastr.js"></script>
    <script src="/argon-design/assets/js/argon.js"></script>
    <script src="/jQuery-Mask/dist/jquery.mask.js"></script>
    <script src="/jquery/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/_script.js"></script>
    @yield('scripts')
    <script>
            paceOptions = {
              // Disable the 'elements' source
              elements: false,

              // Only show the progress on regular and ajax-y page navigation,
              // not every request
              restartOnRequestAfter: false,
            }

            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
            @if(Session::has('repeat'))
                toastr.warning('{{ Session::get('repeat') }}');
            @endif
    </script>