<!----JS-->	  
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<!-- to provide pagination -->
<script>
    
        $(document).ready(function() {
                $('#taxView').DataTable( {
                        "pagingType": "simple"
                } );
        } );

</script>
<script>
jQuery(function(){
    jQuery("#msg").show("slow", function(){
            setTimeout(function(){ jQuery("#msg").hide("slow"); }, 2000);
    });
});
</script>
</body>

</html>
