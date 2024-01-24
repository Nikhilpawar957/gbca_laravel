<div class="social_media_div">
    <ul class="icons_list">
        <li>
            <a href="tel:+912233213737">
                <img src="{{ asset('assets/img/icons/sticky/call-white.png') }}" class="img-fluid">
            </a>
        </li>
        <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                <i class="fa fa-user-o white"></i>
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com/company/13635177/" target="_blank">
                <img src="{{ asset('assets/img/icons/sticky/linkedin-white.png') }}" class="img-fluid"></a>
        </li>
    </ul>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="footer-contact-info">
                    <div class="footer-logo">
                        <img src="{{ asset('assets/img/gbc-llp-logo.png') }}" class="img-fluid">
                    </div>
                    <div class="contact-listing">
                        <ul>
                            <li><a href="tel:+91 22 3321 37 37"><img src="{{ asset('assets/img/call.svg') }}"
                                        class="img-fluid footer-icon">+91 22 3321 37 37</a></li>
                            <li><a href="mailto:reachus@gbcaindia.com"><img src="{{ asset('assets/img/mail.svg') }}"
                                        class="img-fluid footer-icon">reachus@gbcaindia.com</a></li>
                            <li><a href="https://www.linkedin.com/company/13635177/" target="_blank"><img
                                        src="{{ asset('assets/img/linkdin.svg') }}"
                                        class="img-fluid footer-icon">gbca-associates</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="footer-list services-list">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="transaction-business-structuring.php">Transaction and Business Structuring</a></li>
                        <li><a href="audit-assurance.php">Audit and Assurance</a></li>
                        <li><a href="direct-tax.php">Direct Tax</a></li>
                        <li><a href="corporate-regulatory-laws.php">Corporate and Regulatory Laws</a></li>
                        <li><a href="indirect-tax.php">Indirect Tax</a></li>
                        <li><a href="fema-international-taxation.php">FEMA and International Taxation</a></li>
                        <li><a href="safe.php">SAFE</a></li>
                        <li><a href="doing-business-india.php">Doing Business in India</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="footer-list footer-resou-list">
                    <h4>Resources</h4>
                    <ul>
                        <li>
                            <a href="resources.php?cat_name">adasdasd</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="footer-list footer-contact">
                    <h4>Get in touch</h4>
                    <ul>
                        <li><a href="about-us.php">About us</a></li>
                        <li><a href="contact-us.php">Contact us</a></li>

                    </ul>
                    <ul class="main-list">
                        <li><a href="industries.php" target="_blank">Industries</a>
                        </li>
                        <li><a href="https://www.gbcauae.com/" target="_blank">UAE Connect</a>
                        </li>
                        <li><a href="careers.php">Careers</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
    </div>
</footer>
<div class="footer-copyright">
    <div class="container">
        <div class="row">
            <p class="d-none d-lg-block d-md-block">GBCA and Associates LLP Chartered Accountants<span class="blue-dot">
                    . </span> Copyright
                <script>
                    document.write(new Date().getFullYear());
                </script> <span class="blue-dot"> . </span> Powered by <a href="http://onerooftech.com/"
                    target="_blank" class="logo-orange comp-name"> OneRoof Technologies LLP.</a>
            </p>

            <p class="d-block d-lg-none d-md-none">GBCA and Associates LLP Chartered Accountants<br /> Copyright
                <script>
                    document.write(new Date().getFullYear());
                </script> <br /> Powered by <a href="http://onerooftech.com/" target="_blank"
                    class="logo-orange comp-name"> OneRoof Technologies LLP.</a>
            </p>
        </div>
    </div>
</div>
<div class="modal fade profile-modal" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">Our Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <section class="contact-us modal-form">
                    <div class="row">
                        <div class="alert alert-danger errmsg2 text-center" style="display:none;"></div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-section">
                                <form id="contact" class="contact-form1" action="" method="post">
                                    <div class="contact-form__two">
                                        <div class="row">
                                            <div class="field contact-inner text-left col-lg-12">
                                                <input type="text" name="p_name" id="p_name"
                                                    placeholder="Enter Name">
                                                <label for="p_name">Name</label>
                                            </div>
                                            <div class="field contact-inner text-left col-lg-12 mb-0">
                                                <input type="email" name="p_email" id="p_email"
                                                    placeholder="Enter E-mail">
                                                <label for="p_email">E-mail</label>
                                            </div>
                                            <div class="field contact-inner text-left col-lg-12 mb-0">
                                                <input type="tel" name="p_phone" id="p_phone"
                                                    placeholder="Enter Contact Number">
                                                <label for="p_phone">Contact Number</label>
                                            </div>
                                        </div>
                                        <div class="comment-submit-btn modal-btn">
                                            <button type="submit" id="profile_form_submit"
                                                class="button orange-btn">Submit <img
                                                    src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                                    class="img-fluid btn-arrow"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- Back to top button -->
<a id="button"></a>
