<div class="footer">
    <div class="foter-content">

        <div class="footer-section about">
            <a href="<?php echo BASE_URL . ''?>" class="logo">
            <h1 class="logo-text"><span>Jean</span>Forteroche</h1>
            </a>                
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
            <div class="contact">
                <span><i class="fas fa-phone"></i>&nbsp; 00.00.00.00.00</span>
                <span><i class="fas fa-envelope"></i>&nbsp; jeanforteroche@blog.com</span>
            </div>
            <div class="socials">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/?hl=fr"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/?lang=fr"><i class="fab fa-twitter"></i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-section links">
            <h2>Quick Links</h2>
            <br>
            <ul>
                <a href="#"><li>Events</li></a>
                <a href="#"><li>Team</li></a>
                <a href="#"><li>Writters</li></a>
                <a href="#"><li>Gallery</li></a>
                <a href="<?php echo BASE_URL . '/index.php?notice' ?>"><li>Terms and conditions</li></a>
            </ul>
        </div>

        <div class="footer-section contact-form">
            <h2>Nous Contacter</h2>
            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>
            <br>
            <form action="https://formsubmit.co/slbjorck@icloud.com" method="POST">
                <input type="text" name="name" class="text-input contact-input" placeholder="Votre nom...">
                <input type="email" name="email" class="text-input contact-input" placeholder="Votre email...">
                <textarea name="message" class="text-input contact-input" placeholder="Votre message..."></textarea>
                <!-- <input type="hidden" name="_cc" value="another@email.com,yetanother@email.com"> -->
                <input type="text" name="_honey" style="display:none">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_next" value="http://localhost:8888/blog/index.php?contactSuccess">
                <button type="submit" name="contactform" class="btn btn-big contact-btn">
                    <i class="fas fa-envelope"></i>
                    Envoyer
                </button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; copyright-informations / Designed by Ana Bjorck
    </div>
</div>