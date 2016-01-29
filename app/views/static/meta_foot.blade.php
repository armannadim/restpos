




<!-- BEGIN CORE JS FRAMEWORK-->
{{ HTML::script('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'); }}
{{ HTML::script('plugins/jquery-1.8.3.min.js'); }}
{{ HTML::script('plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'); }}
{{ HTML::script('plugins/bootstrap/js/bootstrap.min.js'); }}
{{ HTML::script('plugins/breakpoints.js'); }}
{{ HTML::script('plugins/jquery-unveil/jquery.unveil.min.js'); }}
<!-- DATATABLES -->
{{ HTML::script('js/datatables/jquery.datatables.min.js'); }}
{{ HTML::script('js/datatables/jquery.jeditable.js'); }}
{{ HTML::script('js/datatables/jquery.dataTables.editable.js'); }}
{{ HTML::script('js/datatables/dataTables.tableTools.js'); }}
{{ HTML::script('js/datatables/jquery.validate.js'); }}
<!-- END CORE JS FRAMEWORK -->

<!--[if lt IE 9]>
{{ HTML::script('plugins/excanvas.js'); }}
{{ HTML::script('plugins/respond.js'); }}
<![endif]-->

<!-- BEGIN PAGE LEVEL JS -->
 {{ HTML::script('plugins/pace/pace.min.js'); }}
 {{ HTML::script('plugins/jquery-slimscroll/jquery.slimscroll.min.js'); }}
 {{ HTML::script('plugins/jquery-numberAnimate/jquery.animateNumbers.js'); }}
 {{ HTML::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); }}
 {{ HTML::script('plugins/jquery-slimscroll/jquery.slimscroll.min.js'); }}
 {{ HTML::script('plugins/jquery-block-ui/jqueryblockui.js'); }}
 {{ HTML::script('plugins/bootstrap-select2/select2.min.js'); }}
 
 
 {{ HTML::script('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'); }}

 @if(Route::getCurrentRoute()->getPath()=='dashboard') 
 {{ HTML::script('plugins/jquery-ricksaw-chart/js/raphael-min.js'); }}
 {{ HTML::script('plugins/jquery-ricksaw-chart/js/d3.v2.js'); }}
 {{ HTML::script('plugins/jquery-ricksaw-chart/js/rickshaw.min.js'); }}
 {{ HTML::script('plugins/jquery-morris-chart/js/morris.min.js'); }}
 {{ HTML::script('plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js'); }}
@endif

 {{ HTML::script('plugins/jquery-slider/jquery.sidr.min.js'); }}
 {{ HTML::script('plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js'); }}
 {{ HTML::script('plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js'); }}
 {{ HTML::script('plugins/jquery-sparkline/jquery-sparkline.js'); }}
 {{ HTML::script('plugins/jquery-flot/jquery.flot.min.js'); }}
 {{ HTML::script('plugins/jquery-flot/jquery.flot.animator.min.js'); }}
 {{ HTML::script('plugins/skycons/skycons.js'); }}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45776281-1', 'revox.io');
  ga('send', 'pageview');

</script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- PAGE JS -->
@if(Route::getCurrentRoute()->getPath()=='dashboard')
{{ HTML::script('js/dashboard.js'); }}
@endif

<!-- BEGIN CORE TEMPLATE JS -->
{{ HTML::script('js/core.js'); }}
{{ HTML::script('js/custom_scripts.js'); }}
<!--{{ HTML::script('js/demo.js'); }}-->
<!-- END CORE TEMPLATE JS -->
{{ HTML::script('js/tabs_accordian.js'); }}
