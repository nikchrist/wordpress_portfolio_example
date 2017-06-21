<?php 
	
	class getQuery{

		public  function __construct($term)
		{

			$this->term = $term;

		}

		public   function queryResults(){

			$args = array('tax_query' => array(

				array(

					'taxonomy' => 'portfolio_categories',
					'terms' => $this->term,
					'field' => 'slug',
					'include_children' => 'false'

					),

				'posts_per_page'=> 12,
				'post_type' => 'portfolioitems'

				));



			$query = new WP_Query($args);
			$count = $query->post_count;
			$counter = 1;

			?>
			<div class="row-fluid clearfix">
			<?php
			if($query->have_posts()):
				while($query->have_posts()):
					 $query->the_post();
					 ?>
					 			<div class="col-xs-12 col-sm-4">
		 	  				<a href=<?php the_permalink();?> >
	 								<?php the_post_thumbnail("port-post-thumbnail",array("class" => "img-responsive")); ?>
							  </a>
		 				 
		 				
		 				 	<h2 class="port-title"><?php echo get_the_title(); ?></h2>
		 				 	</div>
		 				
		 	<?php
	
					if($counter % 3 == 0)
					{
						 ?> </div><div class="row-fluid clearfix"><?php
					}

					$counter++;

				endwhile;
				else: 
					echo "<p class='no-results-message'>Nothing found</p>";
			endif;

			wp_reset_postdata();

			if($counter == $count)
			{
				?></div><?php
			}
      
				
		}

}

?>