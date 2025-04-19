<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use \yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'QuickLinker';
?>


    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s"
                                 data-wow-delay="1s">
                                <h6>Welcome to QuickLinker</h6>
                                <h2>We Simplify <em>Your Online Experience </em> <span>with</span> Shortened URLs</h2>
                                <p>
                                    QuickLinker is a powerful, user-friendly platform that allows you to easily shorten,
                                    track, and manage your links. Save time, improve sharing, and get insights into your
                                    link performance. Start shortening your URLs with us today!
                                </p>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'url-form',
                                    'options' => ['class' => 'form-inline'],
                                    'action' => Url::to(['site/create-link']),
                                    'enableAjaxValidation' => false,
                                ]); ?>

                                <?= $form->field($model, 'url')->textInput(['placeholder' => 'Enter URL link'])->label(false) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Shorten link', ['class' => 'btn btn-primary', 'id' => 'submit-btn']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                                <div class="loader hide">
                                    <div class="lds-spinner">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div id="result"></div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="tmpl/assets/images/about-left-image.png" alt="person graphic">
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="services">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="tmpl/assets/images/service-icon-01.png" alt="reporting">
                                    </div>
                                    <div class="right-text">
                                        <h4>Short URL and QR Code:</h4>
                                        <p>Shorten long URLs and generate QR codes in seconds for easy and fast link sharing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                    <div class="icon">
                                        <img src="tmpl/assets/images/service-icon-02.png" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>Click Analytics:</h4>
                                        <p>Get detailed statistics on clicks and scans of your links for precise tracking of their performance.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                    <div class="icon">
                                        <img src="tmpl/assets/images/service-icon-03.png" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>Custom Links with Expiration Date:</h4>
                                        <p>Create unique short links with the ability to set an expiration date during registration.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="tmpl/assets/images/service-icon-04.png" alt="">
                                    </div>
                                    <div class="right-text">
                                        <h4>API for Integration</h4>
                                        <p>Use our API to integrate link shortening and QR code generation into your application or service</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="portfolio" class="our-portfolio section">
        <section class="stats-section">
            <div class="container">
                <div class="section-title">
                    <h2>Powerful Stats</h2>
                    <p>Millions of links, billions of connections – see how we're growing every month.</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-card">
                        <img src="tmpl/assets/images/service-icon-01.png" alt="Links icon">
                        <h3>256M</h3>
                        <p>Links & QR Codes<br>created monthly</p>
                    </div>
                    <div class="stat-card">
                        <img src="tmpl/assets/images/service-icon-03.png" alt="Integrations icon">
                        <h3>800+</h3>
                        <p>App<br>integrations</p>
                    </div>
                    <div class="stat-card">
                        <img src="tmpl/assets/images/service-icon-04.png" alt="Connections icon">
                        <h3>10B</h3>
                        <p>Connections<br>(clicks & scans monthly)</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="left-image">
                        <img src="tmpl/assets/images/services-left-image.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="section-heading">
                        <h2>Grow your reach with our <em>URL Shortener</em> &amp; <span>QR Code Generator</span></h2>
                        <p>Our tools help you simplify sharing and boost visibility with short links and custom QR codes.
                            Feel free to use and customize this template for your projects, but redistribution of the ZIP
                            file on third-party websites is not allowed. Contact us for more details.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Short Links Created</h4>
                                <span>84%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="second-bar progress-skill-bar">
                                <h4>QR Codes Generated</h4>
                                <span>88%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="third-bar progress-skill-bar">
                                <h4>User Satisfaction</h4>
                                <span>94%</span>
                                <div class="filled-bar"></div>
                                <div class="full-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <div class="section-heading">
                        <h2>Generate Short Links & QR Codes Right from Telegram</h2>
                        <p>Use our Telegram bot to quickly create short links and QR codes — anytime, anywhere. It's fast, easy, and free to use. No need to open a browser!</p>
                        <div class="phone-info">
                            <h4>Linker Telegram Bot:
                                <span><i class="fa fa-android"></i>
                    <a href="https://t.me/quick_linker_bot" target="_blank">@quick_linker_bot</a>
                </span>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="name" name="name" id="name" placeholder="Name" autocomplete="on"
                                           required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="surname" name="surname" id="surname" placeholder="Surname"
                                           autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                           placeholder="Your Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" type="text" class="form-control" id="message"
                                              placeholder="Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button ">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                        <div class="contact-dec">
                            <img src="tmpl/assets/images/contact-decoration.png" alt="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
$script = <<< JS
    

    $(document).on('click', '.copy-btn', function () {
      const link = $(this).data('link');
      navigator.clipboard.writeText(link).then(function () {
      }, function (err) {
      });
    });

    $('#url-form').on('beforeSubmit', function(e) {
        var form = $(this);
        e.preventDefault(); // предотвращаем стандартную отправку
       
        
        if (!form.find('.has-error').length) {
          $('.loader').removeClass('hide');
        }
    
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                $('.loader').addClass('hide');
                if (response.status == 'success') {
                    $('#result').html('<div class="link-result-container"><div class="link-info"><h3>Your short Link:</h3><a href="' + response.shortUrl +'" target="_blank" id="shortLink">' + response.shortUrl+'</a>'
                    + '<button class="copy-btn" data-link="'+ response.shortUrl +'"><i class="fa fa-copy"></i></button>'
    + '</div><div class="qr-code"><h3>QR-code:</h3><img src="'+ response.qrCode + '" alt="QR code"><a href="'+response.qrCode+'" style="display:block" download=1>Download PNG</a></div></div>');
                } else {
                    $('#result').html('<div class="alert alert-danger">Ошибка: ' + response.message + '</div>');
                }
            }
        });
        return false;  // предотвращаем отправку формы
    });
   

JS;
$this->registerJs($script);
?>