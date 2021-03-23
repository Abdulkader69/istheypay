<div class="fade" id="reviews-form-popup">
    <div class="modal-dialog modal-pay">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php the_title(); ?></h4>
                <span id="close"><i class="icofont-close"></i></span>
            </div>
            <div class="modal-body">
                <form method="POST" role="form" class="reviews-networks-form" id="submit-review-form">

                    <div class="rating-area">

                        <div class="ovarall-rat">
                            <label for="ovarall-rating">Your overall rating of this network *</label>
                            <div class='rating-stars text-center'>
                                <ul id='stars' class='pay-rat'>
                                    <li class='star pay-rat-li' data-title='Terrible' data-value='1'><i class='icofont-star'></i></li>
                                    <li class='star pay-rat-li' data-title='Poor' data-value='2'><i class='icofont-star'></i></li>
                                    <li class='star pay-rat-li' data-title='Average' data-value='3'><i class='icofont-star'></i></li>
                                    <li class='star pay-rat-li' data-title='Very Good' data-value='4'><i class='icofont-star'></i></li>
                                    <li class='star pay-rat-li' data-title='Excellent' data-value='5'><i class='icofont-star'></i></li>
                                </ul>
                                <div class="message-box">

                                </div>
                            </div>
                            <input type="text" name="ovarall-rating" id="ovarall-rating" required style="display:none">
                            <div class="error-wrapper"></div>
                        </div>

                        <div class="little-more-rat">
                            <label>Could you say a little more about it? *</label>
                            <div class="little-more-rat-item">
                                <p>Offers</p>
                                <ul id='offers' class='pay-rat'>
                                    <li class='offer pay-rat-li' data-value='1'></li>
                                    <li class='offer pay-rat-li' data-value='2'></li>
                                    <li class='offer pay-rat-li' data-value='3'></li>
                                    <li class='offer pay-rat-li' data-value='4'></li>
                                    <li class='offer pay-rat-li' data-value='5'></li>
                                </ul>
                                <input type="text" name="offers-rating" id="offers-rating" required style="display:none">
                            </div>
                            <div class="little-more-rat-item">
                                <p>Payout</p>
                                <ul id='payout' class='pay-rat'>
                                    <li class='pay pay-rat-li' data-value='1'></li>
                                    <li class='pay pay-rat-li' data-value='2'></li>
                                    <li class='pay pay-rat-li' data-value='3'></li>
                                    <li class='pay pay-rat-li' data-value='4'></li>
                                    <li class='pay pay-rat-li' data-value='5'></li>
                                </ul>
                                <input type="text" name="payout-rating" id="payout-rating" required style="display:none">
                            </div>
                            <div class="little-more-rat-item">
                                <p>Tracking</p>
                                <ul id='tracking' class='pay-rat'>
                                    <li class='track pay-rat-li' data-value='1'></li>
                                    <li class='track pay-rat-li' data-value='2'></li>
                                    <li class='track pay-rat-li' data-value='3'></li>
                                    <li class='track pay-rat-li' data-value='4'></li>
                                    <li class='track pay-rat-li' data-value='5'></li>
                                </ul>
                                <input type="text" name="tracking-rating" id="tracking-rating" required style="display:none">
                            </div>
                            <div class="little-more-rat-item">
                                <p>Support</p>
                                <ul id='support' class='pay-rat'>
                                    <li class='supt pay-rat-li' data-value='1'></li>
                                    <li class='supt pay-rat-li' data-value='2'></li>
                                    <li class='supt pay-rat-li' data-value='3'></li>
                                    <li class='supt pay-rat-li' data-value='4'></li>
                                    <li class='supt pay-rat-li' data-value='5'></li>
                                </ul>
                                <input type="text" name="support-rating" id="support-rating" required style="display:none">
                            </div>
                            <div class="error-wrapper"></div>
                        </div>
                    </div>

                    <div class="your-review">
                        <label for="your-review">Your review *</label>
                        <textarea name="your-review" id="your-review"></textarea>
                        <div class="error-wrapper"></div>
                    </div>

                    <div class="your-name">
                        <label for="your-name">Name *</label>
                        <input type="text" name="your-name" id="your-name"></input>
                        <div class="error-wrapper"></div>
                    </div>

                    <div class="your-email">
                        <label for="your-email">Email *</label>
                        <input type="text" name="your-email" id="your-email">
                        <div class="error-wrapper"></div>
                    </div>

                    <div class="your-file">
                        <div class="upload-field">
                            <label for="your-review">Upload your payment screenshot! <span>(optional)</span></label>
                            <input type='file' id="file-input" />
                            <p><i class="icofont-cloud-upload"></i> Upload Image</p>
                        </div>
                        <div id='img_contain'>
                            <img id="image-preview" src="" alt="your image" title=''/>
                        </div>
                    </div>

                    <?php wp_nonce_field( 'program_form_nonce', 'program_wpnonce' ); ?>

                    <input type="hidden" name="network_id" value="<?php get_the_ID(); ?>"/>
                    <div class="review-submit-btn">
                        <button type="submit">Submit Review</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog login -->
</div><!-- /.modal -->