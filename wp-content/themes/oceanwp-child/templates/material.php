<?php
/**
 * Template Name: Material Page
 *
 * @package OceanWP WordPress theme
 */ 

get_header(); ?>
	<div class="container">
		<div class="header-image"></div>
		<div class="banner-product">
			

			<?php
			if(isset($_GET['type'])){
				$type = $_GET['type'];
			}else{
				$type = '';
			}

			if(isset($_GET['id']))
			{
				$productId = (int)$_GET['id'];
				$product = wc_get_product( $productId );
				?>
				<div class='banner-product-content'>
					<div class="left-area">
						<div class="banner-product-image">
							<?php

							$attachmentIds = $product->get_gallery_image_ids();

				    		if (wp_get_attachment_url($attachmentIds[0])) 
				    			echo '<img src="'. wp_get_attachment_url($attachmentIds[0]) .'" alt="Placeholder" />'; 	
				    			
				    			
				    		else 
				    			echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" />'; ?>
						</div>
						<div class="finishes">
							<h3>Finishes for &nbsp;<?php echo $product->get_title(); ?></h3>
							<div class="rows">
								<div class="cols">
									<img src="../wp-content/uploads/2019/01/img-2.jpg">
								</div>
								<div class="cols">
									<h3>Welding means joining two parts together</h3>
									<p>We fold all edges and weld them,  and then eyeletted at equal distributions along the hem.  The eyelets are distributed evenly but If you require a different distribution or specific placement of eyelets, that is no problem at all - simply let us know what you need when you place your order.

									</p>
								</div>
								<hr>
							</div>
						
							<div class="rows">
								<div class="cols">
									<img src="../wp-content/uploads/2019/01/img-2.jpg">
								</div>
								<div class="cols">
									<h3>Trimmed With Eyelets</h3>
									<p>Same as Trimmed to Size but with the addition of eyelets.
									</p>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<div class="right-area">
						<div class="banner-product-info">
							<h2 style="text-align: center;"><?php echo $product->get_title(); ?></h2>
							<div class="product-desc">
								<?php echo $product->get_description();?>
							</div>
							<div class="product-price">
								<?php echo $product->get_price_html();?>
							</div>
							<div class="product-price-calculator">
								<form action="/calculation/" method="post" class="form-calculator">
									<ol class="form">
										<li class="form-item material-width">
											<label for="material-width">Width</label>
											<input name="material-width" id="material-width" type="number" min="0" step="any">
										</li>
										<li class="form-item material-height">
											<label for="material-height">Height</label>
											<input name="material-height" id="material-height" type="number" min="0" step="any">
										</li>
										<li class="form-item material-scale">
											<label for="material-scale">Scale</label>
											<select name="material-scale" id="material-scale">
												<option selected="" value="m">Metres (m)</option>
												<option value="cm">Centimetres (cm)</option>
												<option value="mm">Millimetres (mm)</option>
												<option value="ft">Feet (ft)</option>
												<option value="in">Inches (in)</option>
												<option value="pa">Paper Sizes</option>
											</select>
										</li>
										<li class="form-item material-quantity calc-quantity">
											<label for="material-qty">Quantity</label>
											<select name="material-qty" id="material-qty">
												<option selected="" value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<!-- <option value="More">More</option> -->
											</select>
											<!-- <input type="number" class="quantity-more" id="material-quantity-more" name="material-quantity-more" min="1" step="1"> -->
										</li>
										<li class="form-item material-finish">
											<label for="material-finish">Finish</label>
											<select name="material-finish" id="material-finish">
												<option value="2134">Welded Hems &amp; Eyelets</option>
												<option value="2135">Welded Hems Only</option>
												<option value="2137">Pole Pocket(s)</option>
												<option value="2136">Trimmed to Size</option>
												<option value="2138">Trimmed With Eyelets</option>
											</select>
										</li>
										<li class="form-item material-action">
											<ul class="buttons buttons-flex">
												<li class="button">
													<button class="button-action">
														<div class="button-inner">
															<span class="button-text"><i class="fa fa-calculator" aria-hidden="true"></i>Calculate Price</span>
														</div>
													</button>
												</li>
											</ul>
										</li>
									</ol>
									
								</form>
							</div>
							<div class="product-description">
								<?php echo $product->post->post_excerpt;?>
							</div>
						</div>
				
					</div>
					
				<?php
			} else
			{
				?>
				<div class="product_list_widget">
				<?php
				$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4,'product_cat' => $type, 'orderby' =>'date','order' => 'ASC' );
				$loop = new WP_Query( $args );
				// print_r($loop);
				echo '<div class="rows">';
				if($loop->have_posts()){
					while ($loop->have_posts()) : $loop->the_post(); global $product;?>
						<div class="cols" style="max-width: 30%;">
							<div class="banner-products">
								<a href="material?id=<?php echo esc_attr(get_the_iD()); ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
								<div>
						    	<?php
									$attachmentIds = $product->get_gallery_image_ids();

						    		if (wp_get_attachment_url($attachmentIds[0])) 
						    			echo '<img src="'. wp_get_attachment_url($attachmentIds[0]) .'" alt="Placeholder" />'; 	
						    			
						    			
						    		else 
						    			echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" />'; ?>
						    	</div>
						    	<div class="banner-product-title">
						    		<?php if ( get_the_title() ) the_title(); else the_ID(); ?><br>
						    		<?php echo $product->get_description();?><br>
						    		<div style="text-align: center;"> <?php echo $product->get_price_html(); ?></div>
						    	</div>	
						    	</a>
						    	
				    		</div>
				    	</div>
				    	<?php 
					endwhile; 
					?>
					</div>
					<?php
					echo '</div>';
				}
			}
			?>
		</div>
	</div>
<?php get_footer(); ?>