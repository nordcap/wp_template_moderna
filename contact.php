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

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8724.570335362972!2d37.61551138463631!3d55.757548081461124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCw!5e0!3m2!1sru!2sru!4v1452915085900" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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
