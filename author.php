<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="profile wrap clearfix">

						<div id="main" class="clearfix" role="main">

						    <?php
						    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

						    //Variables
						    $id = 'user_' . $curauth->ID;
						    $organization = $curauth->organization_name;
						    $name = $curauth->first_name . " " . $curauth->last_name;
						    $email = $curauth->user_email;
						    $phone = $curauth->phone;
						    $website = $curauth->user_url;
						    $about = $curauth->user_description;
						    $date = $curauth->date_founded;
						    $additional_services = $curauth->additional_services;
						    $address1 = $curauth->address_line_1;
						    $address2 = $curauth->address_line_2;
						    $logo = get_field('logo', $id);

						    ?>

						    <h1 class="profile-title eightcol first clearfix">

						    <?php 
						    	if($organization){
						    		echo $organization; 
						    	}
						    	else {
						    		echo $name; 
						    	}?>
						    </h1>

						     <div class="org-info eightcol first clearfix">

						<!-- Basic organization information -->
					    	<?php if($about){ ?>
					    		<h4 class="box-title">About <?php echo $organization; ?></h4>

					    		<?php if($date){ ?>
									<p><strong>Date Founded:</strong> <?php echo $date; ?></p>
								<?php }?>

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

							<h4 class="box-title">Recent News &amp; Events</h4>

						    <ul>
						<!-- The Loop -->

						    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						        <li>
						            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
						            <?php the_title(); ?></a>,
						            <?php the_time('M d Y'); ?>
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
						        <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>

						        <?php if($phone) { ?>
						        	<h4 class="box-title">Phone</h4>
						        	<p><?php echo $phone; ?></p>
						        <?php }?>

						    <!-- Additional Contacts -->

						    	<?php if(get_field('new_contact', $id)): ?>

							    	<div class="more-contacts">
							    		<h4 class="box-title">Additional Contacts</h4>

							    		<?php while(has_sub_fields('new_contact', $id)): ?>
							    			<p><strong>Name: </strong><?php the_sub_field('name'); ?></p>
							    			<p><strong>Email: </strong><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
							    			<p><strong>Phone: </strong><?php the_sub_field('phone'); ?></p>
							    			<p><strong>Division: </strong><?php the_sub_field('division'); ?></p>
							    			<p>&nbsp;</p>
							    		<?php endwhile; ?>
							    	</div>
							    <?php endif; ?>

							</div>

							<div class="sidebar fourcol last clearfix">
						    	<?php if( !empty($logo)) { ?>
							     	<img src="<?php echo $logo['url']; ?>" class="org-logo">
							     <?php } ?>
							</div>
						</div>
					</div>

				</div>

<?php get_footer(); ?>
