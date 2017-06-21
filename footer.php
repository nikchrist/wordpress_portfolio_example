<footer class="site-footer">

	<div class="row" id="footer-row">

		<div class=" col-xs-12 col-sm-4 col-md-4 footer-col ">
			<div class="text-center">
			<?php if(is_active_sidebar('footer-sidebar-1'))
						{
							dynamic_sidebar('footer-sidebar-1');
						} ?>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 footer-col ">
			<div class="text-center">
			<?php if(is_active_sidebar('footer-sidebar-2'))
						{
							dynamic_sidebar('footer-sidebar-2');
						} ?>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4  col-md-4 footer-col  ">
			<div class="text-center">
			<?php if(is_active_sidebar('footer-sidebar-3'))
						{

							dynamic_sidebar('footer-sidebar-3');

						} ?>
			</div>
		</div>
</div>

</footer>

</div><!-- /Container -->

<?php wp_footer(); ?>
</body>
</html>