<!Doctype html>

<html <?php language_attributes(); ?> >

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width initial-scale=1" />
	<title><?php bloginfo("name"); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="bd-image">
	<div class="container">

		<!-- Header   -->
		<div class="row-fluid clearfix" id="header-row">

			<div class="col-sm-6 ">
				<?php Output_custom_logo(); ?>
			</div>

			<div class="col-sm-6 ">
				<div class="text-center vertical-top-plus">
				<?php
					$args = array(

						'theme_location' => 'primary'

						);

					wp_nav_menu($args);

				?>
				</div>

			</div>

		</div>



	<!-- Sub Header -->
	<div class="row-fluid clearfix" id="sub-row">
		<div class="col-sm-offset-4 col-sm-4 sub-col">
			<div class="text-center">
				<?php if(is_front_page()) {?>

					<h2 class="sub-header-title">WELCOME TO MY PORTFOLIO </h2>

				<?php } else if(is_page("portfolio")) { ?>

					<h2 class="sub-header-title">MY WORK</h2>

				<?php } else if(is_page("contact")) { ?>

					<h2 class="sub-header-title">CONTACT ME NOW</h2>

				<?php } else {
						?>
						<h2 class="sub-header-title"><?php the_title(); ?></h2>
					<?php } ?>

			</div>
		</div>
	</div>




	