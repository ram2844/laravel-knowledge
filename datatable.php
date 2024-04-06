<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
	  $(document).ready(function () {
	    $(".datatable").DataTable({
	        "responsive": true,
	        "lengthChange": true,
	        "autoWidth": false,
	        "lengthMenu": [10, 20, 50, 100, 250, 500],
	        "buttons": ["csv", "excel", "pdf", "print","colvis"]
	    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
	});
	</script>



	<!-- datatable manupulation -->


	var table = $("table#document_table_"+download_type_id);
    table.DataTable().destroy();
    table.find('.getInkProfiles').html(html);
    table.DataTable();