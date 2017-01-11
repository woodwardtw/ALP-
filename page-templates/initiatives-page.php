<?php
/**
 * Template Name: Initiatives Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">
				
				<div class="container">

					<div id="init" class="row">

						<div class="col-md-12">						
						</div>
						<?php 			

							function cleanState($state) {
								$state = str_replace(' ', '', $state);
								$state = urlencode($state);
								return $state;
							}				

							$json = file_get_contents('https://spreadsheets.google.com/feeds/list/1fRwJnMS6yECZj0DTSjQD7lQ19V-65A3aI4AnjorQpak/1/public/values?alt=json');
							$obj = json_decode($json, true);
							$feed = $obj{'feed'}['entry'];	
							//var_dump($feed[0]['gsx$state']);
							// figure out usort to do ordering . . . 
							//var_dump($feed);
						    //var_dump($obj{'feed'}['entry'][0]['gsx$state']);

						    $state_unique = array();
						    $dist_html = "";

							foreach($feed as $item) { 

							array_push($state_unique, $item{'gsx$state'}{'$t'});

						    $state = $item{'gsx$state'}{'$t'}; //etc						    
						    $district = $item{'gsx$districtname'}{'$t'};
						    $size = $item{'gsx$studentenrollmentdistrictsize'}{'$t'};
						    $model = $item{'gsx$accessmodel'}{'$t'};

						    $dist_html .=  '<div class="col-md-4 district '. cleanState($state) .'" >';
					    	$dist_html .= '<div class="district-pad">';
						    $dist_html .=   '<h2 class="district-title">'.$district.'</h2>';
						    $dist_html .=   $state;
						    $dist_html .=   '<div class="size">Enrollment: ';
						    $dist_html .=    $size;
						    $dist_html .=    '</div><div class="model">Model:  ';
						    $dist_html .=    $model;
						    $dist_html .=    '</div></div></div>';							

							}

							$state_unique = array_unique($state_unique);
							sort($state_unique);
							echo '<div class="dropdown states"><button class="btn btn-default dropdown-toggle" type="button" id="states" data-toggle="dropdown">Browse by state<span class="caret"></span></button><div id="show">Showing: <div class="selected">All states</div></div><ul class="dropdown-menu" role="menu" aria-labelledby="states">';
							echo '<a href="#" onclick="searchState(\'district\')""><li>All States</li></a>';
							foreach ($state_unique as $state) {
								echo '<a class="state-item" role="menu_item" href="#'.$state.'" onclick="searchState(\''.cleanState($state).'\')"><li role="state" value="'. $state .'">'.$state.'</li></a>';
							}
							echo '</ul></div>';
							echo $dist_html;
						?>

						<script>
						function searchState (state) {
					        var divsToHide = document.getElementsByClassName('district');
					        for(var i = 0; i < divsToHide.length; i++){
						        divsToHide[i].style.display = "none";
						    	}
						    var divsToShow = document.getElementsByClassName(state);
					    	for (var s = 0; s <divsToShow.length; s++){
					    		divsToShow[s].style.display = "block";
					    	}
						}

						jQuery(".dropdown a li").click(function(){

						  jQuery(this).parents(".states").find('.selected').text(jQuery(this).text());
						  jQuery(this).parents(".states").find('.selected').val(jQuery(this).text());

						});
						</script>
						
					</div>
				</div>

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->



<?php get_footer(); ?>
