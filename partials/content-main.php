<?php

	if(have_posts()):

		while(have_posts()):the_post(); ?>
	
			<div class="row-fluid clearfix main-content">
			<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
			</div>
					
		<?php 
		endwhile;

	else:
		echo "<p>Nothing found</p>";

	endif;


?>