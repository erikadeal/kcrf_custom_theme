<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="profile wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

						    <?php
						    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

						    //Variables
						    $organization = $curauth->organization_name;
						    $name = $curauth->first_name . " " . $curauth->last_name;
						    $email = $curauth->user_email;
						    $phone = $curauth->phone;
						    $website = $curauth->user_url;
						    $about = $curauth->user_description;
						    $additional_services = $curauth->additional_services;
						    $address1 = $curauth->address_line_1;
						    $address2 = $curauth->address_line_2;

						    ?>

						    <h2 class="profile-title">
						    <?php 
						    	if($organization){
						    		echo $organization; 
						    	}
						    	else {
						    		echo $name; 
						    	}?>
						    </h2>

						    <div class="org-info">
						    	<?php if($about){ ?>
						    		<h4 class="box-title">About <?php echo $organization; ?></h4>
						       		<p><?php echo $about; ?></p>
						        <?php }?>

						        <?php if($curauth->member_services) { ?>
							        <h4 class="box-title">Services</h4>
							        <p>
								        <?php 
								        	$array = $curauth->member_services;
								        	echo implode(', ', $array);
								        ?>
							        </p>
							     <?php }?>

						        <?php if($additional_services){ ?>
							        <h4 class="box-title">Additional Services</h4>
							        <p><?php echo $additional_services; ?></p>
							   	<?php }?>
						    </div>

						    <h4 class="box-title">Recent News &amp; Events</h4>

						    <ul>
						<!-- The Loop -->

						    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						        <li>
						            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
						            <?php the_title(); ?></a>,
						            <?php the_time('d M Y'); ?> in <?php the_category('&');?>
						        </li>

						    <?php endwhile; else: ?>
						        <p><?php _e('This member has not posted any events or news items.'); ?></p>

						    <?php endif; ?>

						<!-- End Loop -->

						    </ul>
						</div>

					<div class="sidebar fourcol last clearfix sidebar-box" role="complimentary">

						<h4 class="widgettitle">Contact Details</h4>

						<?php if($organization) { ?>
							<h4 class="box-title">Name</h4>
					        <p><?php echo $name; ?></p>
				        <?php }?>

				        <h4 class="box-title">Email</h4>
				        <p><?php echo $email; ?></p>

				        <?php if($phone) { ?>
				        	<h4 class="box-title">Phone</h4>
				        	<p><?php echo $phone; ?></p>
				        <?php }?>

				        <?php if($address1) { ?>
					        <h4 class="box-title">Address</h4>
					        <p><?php echo $address1; ?></p>
					        <p><?php echo $address2; ?></p>
				        <?php }?>

				        <?php if($website) { ?>
				        	<h4 class="box-title">Website</h4>
							<p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
						<?php }?>

						</div>
					</div>

				</div>

<?php get_footer(); ?>
