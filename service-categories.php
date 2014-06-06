<?php
/*
Template Name: Services Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
									</article>

							<?php endif; ?>

					<!-- Start grid of categories -->

							<div class="categories-grid">

								<?php
									//Get 'Service Areas' field by key using Advanced Custom Fields

									$field_key = "field_53025fd551115";
									$field = get_field_object($field_key);

									//Start counter to enable grid layout
									$i = 0;

									if( $field )
									{
									   foreach( $field['choices'] as $k => $v )
									        {
									        	//Convert field options to lower case
									        	$id = strtolower($v);
									        	//Replace strings and special characters
												$id = str_replace(' ', '_', $id);
												$id = str_replace('&', 'and', $id);
												
												//Create a row div every 3 categories
												if($i % 3 == 0) {
													echo '<div class="row clearfix">';
												}

												//Div for first row
												elseif($i == 0) {
													echo 'div class="row clearfix">';
												}

												//Div for category with id for category name
									        	echo '<div id="'. $id .'" class="fourcol clearfix">';

									        	//Category title based on value of category field
									            echo '<div class="cat-title"><p class="title">' . $v . '</p></div>';
									           

									           	//Category examples

									           	echo '<div class="service-details">';

												if($v == 'Adult Education'){
									           		echo '<p class="small examples"><strong>Examples: </strong>External Diploma Program (GED), Life Skills Classes, Computer Literacy, Digital Literacy</p>';
									           	}
									           	elseif ($v == 'Children & Youth Services') {
									           		echo '<p class="small examples icon-leaf"><strong>Examples: </strong>Early Childhood Education, Youth Programs, School Registration Assistance</p>';
									           	}
									           	elseif ($v == 'Citizenship & Naturalization Services') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Immigration, Citizen Exam Preparation</p>';
									           	}
									           	elseif ($v == 'Disability Services') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Transportation, Mobility Assistance, Long Term Care</p>';
									           	}
									           	elseif ($v == 'Emergency Preparedness') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Disaster Education and Preparation</p>';
									           	}
									           	elseif ($v == 'Employment Services') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Employment Assistance, Job Placement, Job Skills & Training, Comprehensive Employment Services</p>';
									           	}
									           	elseif ($v == 'Environmental Health') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Environmental Services</p>';
									           	}
									           	elseif ($v == 'ESL Classes') {
									           		echo '<p class="small examples"><strong>Examples: </strong>English Classes</p>';
									           	}
									           	elseif ($v == 'Family Reconnection Services') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Family Tracing</p>';
									           	}
									           	elseif ($v == 'Financial Empowerment') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Banking & Financing, Small Business Support, Financial Literacy</p>';
									           	}
									            elseif ($v == 'Housing Assistance') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Emergency Housing, Affordable Housing Services</p>';
									           	}
									            elseif ($v == 'Interpretation Services') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Multi-Language Services</p>';
									           	}
									           	elseif ($v == 'Housing Assistance') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Emergency Housing, Affordable Housing Services</p>';
									           	}
									          	elseif ($v == 'Medical Assistance') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Healthcare, Clinics, Emergency Health Services</p>';
									           	}
									           	elseif ($v == 'Mental Health Services') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Behavioral Health, Counseling, Emergency Mental Health Services</p>';
									           	}
									            elseif ($v == 'Refugee Resettlement') {
									           		echo '<p class="small examples"><strong>Examples: </strong>VOLAG, MAA</p>';
									           	}
									           	elseif ($v == 'Safety') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Domestic & Relationship Violence, Sexual Assault, Anti-Human Trafficking</p>';
									           	}
									           	elseif ($v == 'Senior Services') {
									           		echo '<p class="small examples"><strong>Examples: </strong>Long Term Care, Mobility Assistance</p>';
									           	}

									           	//Retrieve members who checked the current service category
									            $args = array(
														'role' => 'forum_member',
														'meta_query' => array(
															array(
																'key' => 'member_services',
																'value' =>  $v, //Remember the double quotes!
																'compare' => 'LIKE')
															)
														);

												$user_query = new WP_User_Query( $args );
												// Show users who checked that box

												echo '<ul class="members">';

												foreach ( $user_query->results as $user ) 
													{
														echo '<li><a href="' . home_url() . '/?author=' . $user->ID . '">' . $user->organization . '</a></li>';
													}

									           	echo '</ul></div></div>';

									           //Close row div after third category
									           if(($i+1) % 3 == 0) {
													echo '</div>';
												}

											   //Increase counter
									           $i++;
									        }

									      echo '</div>';
									}

								?>

							</div>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
