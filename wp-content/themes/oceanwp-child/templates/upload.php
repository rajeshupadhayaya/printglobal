<?php
/**
 * Template Name: Upload Page
 *
 * @package OceanWP WordPress theme
 */ 

get_header(); ?>
	<div class="container">
		<div class="upload-form">
			<form id="upload-file-form">
				
				
				<label>Email</label>
				<input name="email" class="form-input" id="email" type="email">
			
				<label>Message</label><textarea class="form-input" name="message" id="message"></textarea>
			
			
				<label class="form-file-upload" for="file-to-upload">
					<i class="fa fa-cloud-upload"></i>Please Select File
				</label>

				<input type="file" name="file-to-upload" id="file-to-upload" class="form-input">
			
				<div class="progress gradient gloss stripe animate hidden" id="progressBar">
					<span id='uploadProgressBar'></span>
					<!-- <div id="loaded_n_total"></div> -->
				</div>
					
				<input type="button" class="upload-btn form-input " value="Upload" name="upload-file" id='upload-file'></button>
				
			</form>
			
			<div class="Success-div">
			</div>

		</div>
	</div>
<?php get_footer(); ?>