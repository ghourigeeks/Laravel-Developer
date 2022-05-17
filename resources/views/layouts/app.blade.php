<!DOCTYPE html>
<html lang="en">

@include('layouts.head_script')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
 
            @include('layouts.navbar')
            @yield('content') 
            @include('layouts.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


@include('layouts.footer_script')

</body>

</html>