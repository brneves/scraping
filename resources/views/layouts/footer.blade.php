</div>
</div>

<!-- SCRIPTS - REQUIRED START -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<!-- Popper.js - Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
<!-- Velocity -->
<script type="text/javascript" src="{{ asset('plugins/velocity/velocity.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/velocity/velocity.ui.min.js') }}"></script>
<!-- Custom Scrollbar -->
<script type="text/javascript" src="{{ asset('plugins/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- jQuery Visible -->
<script type="text/javascript" src="{{ asset('plugins/jquery_visible/jquery.visible.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script type="text/javascript" src="{{ asset('js/misc/ie10-viewport-bug-workaround.js') }}"></script>

<!-- SCRIPTS - REQUIRED END -->

<!-- SCRIPTS - OPTIONAL START -->

<!-- SCRIPTS - DEMO - START -->
<!-- Image Placeholder -->
<script type="text/javascript" src="{{ asset('js/misc/holder.min.js') }}"></script>
<!-- SCRIPTS - DEMO - END -->

<script src="{{ asset("plugins/jquery-mask/jquery.mask.min.js") }}"></script>
<!-- SCRIPTS - OPTIONAL END -->

<!-- QuillPro Scripts -->
<script type="text/javascript" src="{{ asset('js/scripts-jquery.js') }}"></script>

@toastr_js
@toastr_render

@yield('scripts')

</body>
</html>
