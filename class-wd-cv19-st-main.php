<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; 
// enque style sheet
wp_enqueue_style( 'wd-cv19-st', WD_CV19_ST_URL . '/css/wd-cv19-st.css', false);
function wd_covid19_update($atts) {
    // third party api used to get data
    $request = wp_remote_get( 'https://disease.sh/v2/countries' );
	if( is_wp_error( $request ) ) {
		return false; 
	}
	$body = wp_remote_retrieve_body( $request );
	$vcdata = json_decode( $body );

	 ob_start();
	if(!empty($vcdata)) { $inc = 1; ?>
	<div class="wd_covid19 display nowrap" id="wd_covid19">
		<div class="container">
			<div class="wd_covid19_main">
				<?php
				foreach($vcdata as $wd_covid_data){?>
				<div class="countryInfo-box">
					<div class="countryname">
						<div class="image" style="background-image: url(<?php echo $wd_covid_data->countryInfo->flag; ?>);">
						</div>
						<span><?php echo $wd_covid_data->country; ?></span>
					</div>
					<div class="countryInfo">
						<div class="info">
							<span class="title">Cases</span>
							<span class="number"><?php echo number_format($wd_covid_data->cases); ?></span>
						</div>
						<div class="info">
							<span class="title">Deaths</span>
							<span class="number"><?php echo number_format($wd_covid_data->deaths); ?></span>
						</div>
						<div class="info">
							<span class="title">Active</span>
							<span class="number"><?php echo number_format($wd_covid_data->active); ?></span>
						</div>
						<div class="info">
							<span class="title">Recovered</span>
							<span class="number"><?php echo number_format($wd_covid_data->recovered); ?></span>
						</div>
					</div>
				</div>
				<?php $inc++; } ?>
			</div>	
		</div>
	</div>


	<?php }
	$vcinc = ob_get_clean();
    return $vcinc;
    ob_end_clean();
}
add_shortcode( 'wd_covid19', 'wd_covid19_update' );
   