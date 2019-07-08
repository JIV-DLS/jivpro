<!DOCTYPE html>
<html class="no-js" lang="en">

@include('.admin/layout/cpanel/header')

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
{{-- Start Left menu area --}}
<div class="left-sidebar-pro">
@include('.admin/layout/cpanel/aside')
</div>
{{-- End Left menu area --}}

	@include('.admin/layout/cpanel/nav')
        @yield('contenu')
{{-- </div></div> --}}
@include('.admin/layout/cpanel/footer')
@include('.admin/layout/cpanel/link')
</body>

</html>

