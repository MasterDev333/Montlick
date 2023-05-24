<?php
global $post;
if ( have_rows( 'modules' ) ) :
	while ( have_rows( 'modules' ) ) :
		the_row();
		?>
		<?php
		if ( 'banner' == get_row_layout() ) :
			$type  = get_sub_field( 'type' );
			$image = get_sub_field( 'image' );
			$video = get_sub_field( 'video' );
			?>
			<!-- Banner -->
			<section class="banner banner--<?php echo esc_attr( $type ); ?>">
				<div class="container">
					<div class="banner-media a-op">
						<?php
						get_template_part(
							'template-parts/content-modules',
							'media',
							array(
								'image' => $image,
								'video' => $video,
							)
						);
						?>
					</div>
					<div class="banner-content">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h1',
								'tc' => 'banner-heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								't'  => 'div',
								'tc' => 'banner-copy a-up a-delay-1',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v' => 'cta',
								'c' => 'btn btn-primary a-up a-delay-2',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'description',
								't'  => 'div',
								'tc' => 'banner-desc a-up a-delay-3',
							)
						);
						?>
					</div>
				</div>
			</section>
			<?php
		elseif ( 'card_slider' == get_row_layout() ) :
			$enable_top = get_sub_field( 'enable_top_section' );
			$cards      = get_sub_field( 'cards' );
			$limit_cnt  = $enable_top ? 4 : 6;
			?>
			<!-- Cards Slider -->
			<section class="cards-slider <?php echo $enable_top ? 'cards-slider--full' : 'cards-slider--compact'; ?>">
				<?php if ( $enable_top ) : ?>
				<div class="container">
					<div class="cards-slider__left">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h3',
								'tc' => 'cards-slider__heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								't'  => 'div',
								'tc' => 'cards-slider__content d-md-only a-up a-delay-1',
							)
						);
						?>
					</div>
					<div class="cards-slider__right">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'description',
								't'  => 'div',
								'tc' => 'cards-slider__desc a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v' => 'cta',
								'c' => 'btn btn-download a-up a-delay-1',
							)
						);
						?>
					</div>
				</div>
				<?php endif; ?>
				<?php if ( have_rows( 'cards' ) ) : ?>
					<div class="cards-slider__carousel">
						<?php
						while ( have_rows( 'cards' ) ) :
							the_row();
							?>
							<div class="cards-slider__slide">
								<?php
								get_template_part_args(
									'template-parts/content-modules-image',
									array(
										'v'     => 'icon',
										'v2x'   => false,
										'is'    => false,
										'is_2x' => false,
										'c'     => 'cards-slider__slide__icon',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'sub_heading',
										't'  => 'p',
										'tc' => 'cards-slider__slide__subheading',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'heading',
										't'  => 'h3',
										'tc' => 'cards-slider__slide__heading',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'content',
										't'  => 'p',
										'tc' => 'cards-slider__slide__content',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-cta',
									array(
										'v' => 'cta',
										'c' => 'link cards-slider__slide__cta',
									)
								);
								?>
							</div>
						<?php endwhile; ?>
					</div>
					<?php if ( count( $cards ) > $limit_cnt ) : ?>
						<div class="cards-slider__showmore d-sm-only">
							<button class="btn-show-more"><?php echo esc_html__( 'Show More' ); ?></button>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</section>
			<?php
		elseif ( 'content_image' == get_row_layout() ) :
			$image = get_sub_field( 'image' );
			$video = get_sub_field( 'video' );
			$type  = get_sub_field( 'options' );
			?>
			<!-- Content Image -->
			<section class="content-image content-image--<?php echo esc_attr( $type ); ?>">
				<div class="container">
					<div class="content-image__media">
						<?php
						get_template_part(
							'template-parts/content-modules',
							'media',
							array(
								'image' => $image,
								'video' => $video,
								'size'  => 'content-image-' . $type,
							)
						);
						?>
<<<<<<< HEAD
						<?php if ( $type == 'experience-testimonial' ) : ?>
						<div class="content-image__experience">
							<?php
							get_template_part_args(
								'template-parts/content-modules-text',
								array(
									'v'  => 'experience_heading',
									't'  => 'h5',
									'tc' => 'content-image__experience__heading'
								)
							);
							?>
							<?php if ( have_rows( 'experience_cities' ) ) : ?>
							<div class="content-image__experience__cities">
								<?php  while ( have_rows( 'experience_cities' ) ) : 
									the_row();
									get_template_part_args(
										'template-parts/content-modules-text',
										array(
											'v'  => 'city',
											't'  => 'h5',
											'tc' => 'content-image__experience__cities__item'
										)
									);
								endwhile; ?>
							</div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
=======
>>>>>>> c267a5242cc17b18abb12f14ccf0337551fa6715
					</div>
					<div class="content-image__content">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'content-image__heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								't'  => 'div',
								'tc' => 'content-image__copy a-up a-delay-1',
							)
						);
						?>
						<?php if ( have_rows( 'cards' ) ) : ?>
							<div class="content-image__cards a-up a-delay-2">
								<?php
								while ( have_rows( 'cards' ) ) :
									the_row();
									get_template_part_args(
										'template-parts/content-modules-text',
										array(
											'v'  => 'text',
											't'  => 'div',
											'tc' => 'content-image__card',
										)
									);
								endwhile;
								?>
							</div>
						<?php endif; ?>
						<?php if ( have_rows( 'ctas' ) ) : ?>
							<div class="content-image__ctas a-up a-delay-2">
								<?php
								while ( have_rows( 'ctas' ) ) :
									the_row();
									$style = get_sub_field( 'style' );
									get_template_part_args(
										'template-parts/content-modules-cta',
										array(
											'v' => 'cta',
											'c' => 'btn btn-' . $style,
										)
									);
								endwhile;
								?>
							</div>
						<?php endif; ?>
<<<<<<< HEAD

						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'testimonial',
								't'  => 'div',
								'tc' => 'content-image__testimonial a-up a-delay-1',
							)
						);
						?>
=======
>>>>>>> c267a5242cc17b18abb12f14ccf0337551fa6715
					</div>
				</div>
			</section>
			<?php
		elseif ( 'testimonials' == get_row_layout() ) :
			$testimonials = get_sub_field( 'testimonials' );
			?>
			<!-- Testimonials -->
			<?php if ( have_rows( 'testimonials' ) ) : ?>
				<section class="testimonials">
					<div class="testimonials-desktop d-md-only a-up">
						<div class="testimonials-main-slider">
							<?php
							while ( have_rows( 'testimonials' ) ) :
								the_row();
								?>
								<div class="testimonial-main__slide">
									<div class="testimonial-main__slide__inner">
										<div class="testimonial-main__content">
											<?php
											get_template_part_args(
												'template-parts/content-modules-text',
												array(
													'v'  => 'content',
													't'  => 'div',
													'tc' => 'testimonial-main__slide__content',
												)
											);
											?>
											<?php
											get_template_part_args(
												'template-parts/content-modules-cta',
												array(
													'v' => 'cta',
													'c' => 'link',
												)
											);
											?>
										</div>
										<div class="testimonial-main__media">
											<?php
											get_template_part_args(
												'template-parts/content-modules-image',
												array(
													'v'   => 'image',
													'v2x' => false,
													'is'  => 'testimonial-large',
													'is_2x' => 'testimonial-large-2x',
													'w'   => 'div',
													'wc'  => 'testimonial-main__slide__img',
												)
											);
											?>
											<div class="testimonial-main__controls">
												<div class="testimonial-main__pagination">
													<?php echo esc_html( get_row_index() ); ?> / <?php echo count( $testimonials ); ?>
												</div>
												<button class="link testimonial-next"><?php echo esc_html__( 'Next' ); ?></button>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<div class="testimonials-next-slider">
							<?php
							while ( have_rows( 'testimonials' ) ) :
								the_row();
								if ( get_row_index() > 1 ) :
									?>
									<div class="testimonial-next__slide">
										<?php
										get_template_part_args(
											'template-parts/content-modules-image',
											array(
												'v'     => 'image',
												'v2x'   => false,
												'is'    => 'testimonial-large',
												'is_2x' => 'testimonial-large-2x',
												'w'     => 'div',
												'wc'    => 'testimonial-next__slide__img',
											)
										);
										?>
										<div class="testimonial-next__content">
											<?php
											get_template_part_args(
												'template-parts/content-modules-text',
												array(
													'v'  => 'content',
													't'  => 'div',
													'tc' => 'testimonial-next__slide__content',
												)
											);
											?>
										</div>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
							<?php
							while ( have_rows( 'testimonials' ) ) :
								the_row();
								if ( 1 == get_row_index() ) :
									?>
									<div class="testimonial-next__slide">
										<?php
										get_template_part_args(
											'template-parts/content-modules-image',
											array(
												'v'     => 'image',
												'v2x'   => false,
												'is'    => 'testimonial-large',
												'is_2x' => 'testimonial-large-2x',
												'w'     => 'div',
												'wc'    => 'testimonial-next__slide__img',
											)
										);
										?>
										<div class="testimonial-next__content">
											<?php
											get_template_part_args(
												'template-parts/content-modules-text',
												array(
													'v'  => 'content',
													't'  => 'div',
													'tc' => 'testimonial-next__slide__content',
												)
											);
											?>
										</div>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					</div>
					<div class="testimonials-mobile d-sm-only">
						<?php
						while ( have_rows( 'testimonials' ) ) :
							the_row();
							?>
							<div class="testimonial-card">
								<?php
								get_template_part_args(
									'template-parts/content-modules-image',
									array(
										'v'   => 'image',
										'v2x' => false,
										'is'  => 'testimonial-large',
										'w'   => 'div',
										'wc'  => 'testimonial-card__img',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'content',
										't'  => 'div',
										'tc' => 'testimonial-card__content',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-cta',
									array(
										'v' => 'cta',
										'c' => 'link',
									)
								);
								?>
							</div>
						<?php endwhile; ?>
					</div>
				</section>
			<?php endif; ?>
			<?php
		elseif ( 'awards' == get_row_layout() ) :
			$awards = get_sub_field( 'awards' );
			?>
			<!-- Awards -->
			<section class="awards">
				<div class="container">
					<?php if ( $awards ) : ?>
						<div class="awards-gallery">
							<?php foreach ( $awards as $image ) : ?>
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php
					get_template_part_args(
						'template-parts/content-modules-cta',
						array(
							'v'  => 'cta',
							'c'  => 'link',
							'w'  => 'div',
							'wc' => 'awards-cta',
						)
					);
					?>
				</div>
			</section>
			<?php
		elseif ( 'map' == get_row_layout() ) :
			?>
			<!-- Map -->
			<section class="map">
				<div class="container">
					<div class="map-content">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h2',
								'tc' => 'map-heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								't'  => 'div',
								'tc' => 'map-copy a-up a-delay-1',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v' => 'cta',
								'c' => 'link link-white a-up a-delay-2',
							)
						);
						?>
					</div>
					<?php
					get_template_part_args(
						'template-parts/content-modules-image',
						array(
							'v'     => 'image',
							'v2x'   => false,
							'is'    => false,
							'is_2x' => false,
							'c'     => 'map-image',
							'w'     => 'div',
							'wc'    => 'd-md-only',
						)
					);
					?>
				</div>
			</section>
			<?php
		elseif ( 'posts_slider' == get_row_layout() ) :
			$posts = get_sub_field( 'posts' );
			?>
			<!-- Posts -->
			<section class="posts-slider">
				<div class="container">
					<div class="posts-slider__content">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
<<<<<<< HEAD
								't'  => 'h2',
=======
								't'  => 'h3',
>>>>>>> c267a5242cc17b18abb12f14ccf0337551fa6715
								'tc' => 'posts-slider__heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								't'  => 'div',
<<<<<<< HEAD
								'tc' => 'posts-slider__content a-up a-delay-1',
=======
								'tc' => 'posts-slider__copy a-up a-delay-1',
>>>>>>> c267a5242cc17b18abb12f14ccf0337551fa6715
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v' => 'cta',
								'c' => 'link a-up a-delay-2',
							)
						);
						?>
					</div>
					<?php if ( $posts ) : ?>
<<<<<<< HEAD
						<div class="posts-slider__carousel">
							<?php
							foreach ( $posts as $post ) :
								setup_postdata( $post );
								get_template_part( 'template-parts/loop', 'post' );
							endforeach;
							?>
=======
						<div class="posts-slider__right">
							<div class="posts-slider__carousel">
								<?php
								foreach ( $posts as $post ) :
									setup_postdata( $post );
									get_template_part( 'template-parts/loop', 'post' );
								endforeach;
								?>
							</div>
							<div class="slider-controls d-md-only">
								<div class="slider-pagination">1 / 2</div>
								<button class="link slider-next" tabindex="0">Next</button>
							</div>
>>>>>>> c267a5242cc17b18abb12f14ccf0337551fa6715
						</div>
						<?php
					endif;
					wp_reset_postdata();
					?>
				</div>
			</section>
			<?php
		elseif ( 'masonry' == get_row_layout() ) :
			$gallery = get_sub_field( 'gallery' );
			?>
			<!-- Gallery -->
			<section class="masonry">
				<div class="container">
					<?php if ( $gallery ) : ?>
					<div class="masonry-gallery">
						<?php
						foreach ( $gallery as $index => $image ) :
							$size = 'masonry-' . $index + 1;
							if ( 0 == ( $index + 1 ) % 4 ) :
								$size = 'masonry-1';
							endif;
							?>
							<img class="a-up a-delay-<?php echo esc_attr( $index ); ?>"
								src="<?php echo esc_url( $image['sizes'][ $size ] ); ?>"
								srcset="<?php echo esc_url( $image['sizes'][ $size . '-2x' ] ); ?> 2x"
								alt="<?php echo esc_attr( $image['alt'] ); ?>">
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<div class="masonry-content">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h3',
								'tc' => 'masonry-heading a-up',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								't'  => 'div',
								'tc' => 'masonry-copy a-up a-up-delay-1',
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v' => 'cta',
								'c' => 'link a-up a-delay-2',
							)
						);
						?>
					</div>
				</div>
			</section>
<<<<<<< HEAD
		<?php elseif ( 'contact_form' == get_row_layout() ) : ?>
			<!-- Contact Form -->
			<section class="contact-form">
				<div class="container">
					<div class="contact-form__main">
						<?php if ( have_rows( 'cards' ) ) : ?>
						<div class="contact-form__cards">
							<?php while ( have_rows( 'cards' ) ) : 
								the_row();
								$type = get_sub_field( 'type' );
								?>
							<div class="contact-form__cards__item <?php echo esc_attr( $type ); ?> a-up a-delay-1">
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'eyebrow',
										't'  => 'h5',
										'tc' => 'item-eyebrow'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-image',
									array(
										'v'     => 'badge',
										'v2x'   => false,
										'is'    => false,
										'is_2x' => false,
										'c'     => 'item-badge__img',
										'w'     => 'div',
										'wc'    => 'item-badge',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-image',
									array(
										'v'     => 'award',
										'v2x'   => false,
										'is'    => false,
										'is_2x' => false,
										'c'     => 'item-award__img',
										'w'     => 'div',
										'wc'    => 'item-award',
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'content',
										't'  => 'h5',
										'tc' => 'item-content'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'sub_title',
										't'  => 'h5',
										'tc' => 'item-sub_title'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-cta',
									array(
										'v'  => 'cta',
										'c'  => 'contact-form__cards__item__cta link'
									)
								);
								?>
							</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
						<div class="contact-form__content">
							<?php
							get_template_part_args(
								'template-parts/content-modules-text',
								array(
									'v'  => 'sub_heading',
									't'  => 'h5',
									'tc' => 'contact-form__content__sub_heading a-up a-delay-1'
								)
							);
							?>
							<?php
							get_template_part_args(
								'template-parts/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h3',
									'tc' => 'contact-form__content__heading a-up a-delay-1'
								)
							);
							?>
							<?php
							get_template_part_args(
								'template-parts/content-modules-text',
								array(
									'v'  => 'content',
									'w'  => 'div',
									'wc' => 'contact-form__content__content'
								)
							);
							?>
						</div>
					</div>
					<div class="contact-form__form"></div>
				</div>
			</section>
		<?php elseif ( 'cards_content' == get_row_layout() ) : ?>
			<!-- Two Cards and Content -->
			<section class="cards-content">
				<div class="container">
					<div class="cards-content__cards">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'cards_heading',
								't'  => 'h5',
								'tc' => 'cards-content__cards__heading'
								)
							);
						?>
						<?php if ( have_rows( 'cards' ) ) : ?>
							<div class="cards-content__cards__items">
								<?php while ( have_rows( 'cards' ) ) : 
									the_row();
									$color = get_sub_field( 'background_color' );
									?>
								<div class="cards-content__cards__item" style="background-color: <?php echo esc_attr( $color ); ?>">
									<?php
									get_template_part_args(
										'template-parts/content-modules-text',
										array(
											'v'  => 'heading',
											't'  => 'h5',
											'tc' => 'cards-content__cards__item__heading'
										)
									);
									?>
									<?php
									get_template_part_args(
										'template-parts/content-modules-text',
										array(
											'v'  => 'content',
											'w'  => 'div',
											'wc' => 'cards-content__cards__item__content'
										)
									);
									?>
								</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="cards-content__content">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content_heading',
								't'  => 'h5',
								'tc' => 'cards-content__content__heading'
								)
							);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								'w'  => 'div',
								'wc' => 'cards-content__content__content'
							)
						);
						?>
					</div>
				</div>
			</section>
		<?php elseif ( 'testimonials_slider' == get_row_layout() ) : ?>
			<!-- Testimonial Slider -->
			<section class="testimonial-slider">
				<?php if ( have_rows( 'testimonials' ) ) : ?>
				<div class="testimonial-slider__items">
					<?php while ( have_rows( 'testimonials' ) ) :
						the_row(); ?>
					<div class="testimonial-slider__item">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'content',
								'w'  => 'div',
								'wc' => 'testimonial-slider__item__content'
							)
						);
						?>
						<div class="testimonial-slider__item__info">
							<?php
							get_template_part_args(
								'template-parts/content-modules-text',
								array(
									'v'  => 'name',
									't'  => 'h5',
									'tc' => 'testimonial-slider__item__name'
								)
							);
							?>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</section>
		<?php elseif ( 'milestone_cards' == get_row_layout() ) : ?>
			<!-- Milestone Cards -->
			<section class="milestone-cards">
				<div class="container">
					<?php
					get_template_part_args(
						'template-parts/content-modules-text',
						array(
							'v'  => 'heading',
							't'  => 'h3',
							'tc' => 'milestone-cards__heading'
						)
					);
					?>
					<?php if ( have_rows( 'cards' ) ) : ?>
						<div class="milestone-cards__items">
							<?php while ( have_rows( 'cards' ) ) : 
								the_row();
								$color = get_sub_field( 'background_color' );
								?>
							<div class="milestone-cards__item" style="background-color: <?php echo esc_attr( $color ); ?>">
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'heading',
										't'  => 'h3',
										'tc' => 'milestone-cards__item__heading'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'sub_heading',
										't'  => 'h6',
										'tc' => 'milestone-cards__item__sub_heading'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'content',
										'w'  => 'div',
										'wc' => 'milestone-cards__item__content'
									)
								);
								?>
							</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif ( 'podcasts' == get_row_layout() ) : ?>
		<!-- Podcasts -->
			<section class="podcasts">
				<div class="container">
					<?php
					get_template_part_args(
						'template-parts/content-modules-text',
						array(
							'v'  => 'sub_heading',
							't'  => 'h5',
							'tc' => 'podcasts-sub_heading'
							)
						);
					?>
					<div class="podcasts-info">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h3',
								'tc' => 'podcasts-heading'
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-cta',
							array(
								'v'  => 'cta',
								'c'  => 'podcasts-cta link'
							)
						);
						?>
					</div>
					<?php if ( have_rows( 'podcasts' ) ) : ?>
						<div class="podcasts-items">
							<?php while ( have_rows( 'podcasts' ) ) :
								the_row();
								$image = get_sub_field( 'image' );
								$video = get_sub_field( 'video' );
								?>
							<div class="podcasts-item">
								<div class="podcasts-item__media">
									<?php
									get_template_part(
										'template-parts/content-modules',
										'media',
										array(
											'image' => $image,
											'video' => $video,
										)
									);
									?>
								</div>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'heading',
										't'  => 'h6',
										'tc' => 'podcasts-item__heading'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'content',
										'w'  => 'div',
										'wc' => 'podcasts-item__content'
									)
								);
								?>
							</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php elseif ( 'video_content' == get_row_layout() ) :
			$image = get_sub_field( 'image' );
			$video = get_sub_field( 'video' );
			?>
			<!-- Section Video Content -->
			<section class="video-content">
				<div class="container">
					<div class="video-content__wrapper">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h5',
								'tc' => 'video-content__heading'
								)
							);
							?>
						<div class="video-content__main">
							<div class="video-content__video">
								<?php
								get_template_part(
									'template-parts/content-modules',
									'media',
									array(
										'image' => $image,
										'video' => $video,
									)
								);
								?>
							</div>
							<div class="video-content__content">
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'content',
										'w'  => 'div',
										'wc' => 'video-content__text'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-cta',
									array(
										'v'  => 'cta',
										'c'  => 'video-content__cta link'
									)
								);
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php elseif ( 'accordion' == get_row_layout() ) : ?>
			<!-- Accordion -->
			<section class="accordion">
				<div class="container">
					<div class="accordion-info">
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'sub_heading',
								't'  => 'h5',
								'tc' => 'accordion-sub_heading'
							)
						);
						?>
						<?php
						get_template_part_args(
							'template-parts/content-modules-text',
							array(
								'v'  => 'heading',
								't'  => 'h3',
								'tc' => 'accordion-heading'
							)
						);
						?>
					</div>
					<?php if ( have_rows( 'accordions' ) ) : ?>
					<div class="accordion-items">
						<?php while ( have_rows( 'accordions' ) ) : 
							the_row(); ?>
						<div class="accordion-item">
							<?php
							get_template_part_args(
								'template-parts/content-modules-text',
								array(
									'v'  => 'heading',
									't'  => 'h5',
									'tc' => 'accordion-item__heading'
								)
							);
							?>
							<div class="accordion-item__main">
								<?php
								get_template_part_args(
									'template-parts/content-modules-text',
									array(
										'v'  => 'content',
										'w'  => 'div',
										'wc' => 'accordion-item__content'
									)
								);
								?>
								<?php
								get_template_part_args(
									'template-parts/content-modules-cta',
									array(
										'v'  => 'cta',
										'c'  => 'accordion-item__cta link',
									)
								);
								?>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
			</section>
=======
		<?php else : ?>
>>>>>>> c267a5242cc17b18abb12f14ccf0337551fa6715
		<?php endif; ?>
		<?php
	endwhile;
endif;
?>
<section class="content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>
