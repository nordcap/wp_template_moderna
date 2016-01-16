<?php
/**
 * Страница контактов.
 */

get_header(); ?>


    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="map">
            <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
            </iframe>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4><?php esc_html_e('Get in touch with us by filling contact form below','moderna')?></strong></h4>
                    <form id="contactform" action="<?php echo get_template_directory_uri()?>/contact/contact.php" method="post" class="validateform" name="send-contact">
                        <div id="sendmessage">
                            <?php esc_html_e('Your message has been sent. Thank you!','moderna');?>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 field">
                                <input type="text" name="name" placeholder=" * <?php esc_html_e('Enter your full name','moderna')?>" data-rule="maxlen:4" data-msg="<?php esc_html_e('Please enter at least 4 chars','moderna')?>" />
                                <div class="validation">
                                </div>
                            </div>
                            <div class="col-lg-4 field">
                                <input type="text" name="email" placeholder="* <?php esc_html_e('Enter your email address','moderna')?>" data-rule="email" data-msg="<?php esc_html_e('Please enter a valid email','moderna')?>" />
                                <div class="validation">
                                </div>
                            </div>
                            <div class="col-lg-4 field">
                                <input type="text" name="subject" placeholder="<?php esc_html_e('Enter your subject','moderna')?>" data-rule="maxlen:4" data-msg="<?php esc_html_e('Please enter at least 4 chars','moderna')?>" />
                                <div class="validation">
                                </div>
                            </div>
                            <div class="col-lg-12 margintop10 field">
                                <textarea rows="12" name="message" class="input-block-level" placeholder="* <?php esc_html_e('Your message here...','moderna')?>" data-rule="required" data-msg="<?php esc_html_e('Please write something','moderna')?>"></textarea>
                                <div class="validation">
                                </div>
                                <p>
                                    <button class="btn btn-theme margintop10 pull-left" type="submit"><?php esc_html_e('Submit message','moderna')?></button>
                                    <span class="pull-right margintop20">* <?php esc_html_e('Please fill all required form field, thanks!','moderna')?></span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
