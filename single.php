<?php 
	get_header();

?>

<div class="row-fluid clearfix single-row">

<?php if(have_posts()):while(have_posts()):the_post(); ?>

			<div class="text-center">
				<h4 class="single-title"><?php the_title(); ?></h4>
			</di>

		  <a href="<?php the_permalink(); ?>" >

				<?php the_post_thumbnail('medium_large',array("class"=>"img-responsive")) ?>
					
			</a>

			<div class="text-center single-text">
				<?php echo get_the_content(); ?>
			</div>

			
	
</div>

<div class="row-fluid clearfix">

	<?php

		$args = array(

			'author_email' => 'nikchrist@gmail.com',

			);

	 get_comments($args); 

	 ?>

</div>

<?php 
endwhile;
				else :
					echo "Nothing found";
endif;

?>

<?php 
	get_footer();
?>