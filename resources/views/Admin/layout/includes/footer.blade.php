				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>Agência L.A.* Web - 2019</p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Treeview JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-treeview/src/js/bootstrap-treeview.js') }}"></script>
    
    <!-- Treeview Init JavaScript -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/treeview-data.js') }}"></script>
    
    <!-- Data table JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        {{-- CONFIGS --}}
            <script src="{{ asset('Admin_Theme/Theme/dist/js/dataTables-data.js') }}"></script>
        {{-- CONFIGS --}}
    <!-- Data table JavaScript -->

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/jquery.slimscroll.js') }}"></script>
    
    <!-- simpleWeather JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('Admin_Theme/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('Admin_Theme/Theme/dist/js/simpleweather-data.js') }}"></script>
    
    <!-- EChartJS JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/echarts/dist/echarts-en.min.js') }}"></script>
    <script src="{{ asset('Admin_Theme/vendors/echarts-liquidfill.min.js') }}"></script>
    
    <!-- Progressbar Animation JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('Admin_Theme/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>
    
    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/dropdown-bootstrap-extended.js') }}"></script>
    
    <!-- Sparkline JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>
    
    <!-- Owl JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    
    <!-- Toast JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    
    <!-- Piety JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('Admin_Theme/Theme/dist/js/peity-data.js') }}"></script>
    
    <!-- Switchery JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
    
    <!-- FullCalender JavaScripts -->
    @php
        $action = \Request::route()->action['as'] ?? '';

        $view_calendar = false;
        if ($action == 'admin.calendar.index') $view_calendar = true;
    @endphp

    @if ($view_calendar)
        <script src='{{ asset('node_modules/fullcalendar/packages/core/main.js') }}'></script>
        <script src='{{ asset('node_modules/fullcalendar/packages/core/locales-all.js') }}'></script>
        <script src='{{ asset('node_modules/fullcalendar/packages/interaction/main.js') }}'></script>
        <script src='{{ asset('node_modules/fullcalendar/packages/bootstrap/main.js') }}'></script>
        <script src='{{ asset('node_modules/fullcalendar/packages/daygrid/main.js') }}'></script>
        <script src='{{ asset('node_modules/fullcalendar/packages/timegrid/main.js') }}'></script>
        <script src='{{ asset('node_modules/fullcalendar/packages/list/main.js') }}'></script>
        <script src='{{ asset('node_modules/fullcalendar/demos/js/theme-chooser.js') }}'></script>

        <script src='{{ asset('js/calendar/config.js') }}'></script>
    @endif
    <!-- FullCalender JavaScripts -->

    <!-- Data table JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/FooTable/compiled/footable.min.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('Admin_Theme/Theme/dist/js/footable-data.js') }}"></script> --}}

    <!-- Select2 JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Bootstrap Select JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Moment JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>
    
    <!-- Bootstrap Colorpicker JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    
    <!-- Bootstrap Tagsinput JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    
    <!-- Bootstrap Touchspin JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    
    <!-- Multiselect JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
    
     
    <!-- Bootstrap Switch JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>
    
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Form Picker Init JavaScript -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/form-picker-data.js') }}"></script>
    
    <!-- Form Advance Init JavaScript -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/form-advance-data.js') }}"></script>

    <!-- Bootstrap Daterangepicker JavaScript -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('Admin_Theme/vendors/bower_components/dropify/dist/js/dropify.min.js') }}"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/form-file-upload-data.js') }}"></script>

    <!-- Sweet-Alert  -->
    <script src="{{ asset('Admin_Theme/vendors/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('Admin_Theme/Theme/dist/js/sweetalert-data.js') }}"></script>

    <!-- Gallery JavaScript -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/isotope.js') }}"></script>
    <script src="{{ asset('Admin_Theme/Theme/dist/js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('Admin_Theme/Theme/dist/js/froogaloop2.min.js') }}"></script>
    <script src="{{ asset('Admin_Theme/Theme/dist/js/gallery-data.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('Admin_Theme/Theme/dist/js/init.js') }}"></script>
    <script src="{{ asset('Admin_Theme/Theme/dist/js/dashboard-data.js') }}"></script>


	{{-- MY JS --}}
		{{-- FILEMANAGER --}}
		<script src="{{ asset('js/fileManager/reactions_all_folders.js') }}"></script>
		
		{{-- Mask Jquery --}}
	    <script src="{{ asset('node_modules/jquery-mask-plugin/dist/jquery.mask.min.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('js/JMasks/mascaras_inputs.js') }}" type="text/javascript"></script>
		
		{{-- DEVELOPER --}}
		<script src="{{ asset('js/developer/btns_list_groups.js') }}"></script>
		<script src="{{ asset('js/developer/btns_list_permissions.js') }}"></script>
		<script src="{{ asset('js/developer/btns_list_users.js') }}"></script>
	{{-- MY JS --}}

</body>

</html>