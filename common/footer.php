   </main>
    <footer role="contentinfo">
        <div class="container">
            <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
            <div class="row row-centered">
                <div class="col-sm-4 col-centered">
                    <div class="row footer-link">
                        <div class="col-sm-11 foot-col-title">
                            <h4><?php echo __('The United Church of Canada') ?></h4>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="https://united-church.ca" target="_blank"><?php echo __('The United Church of Canada') ?></a>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="https://www.unitedchurcharchives.ca/about-us/united-church-of-canada-archives-network" target="_blank"><?php echo __('Archives Network') ?></a>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="https://www.united-church.ca/privacy-statement"><?php echo __('Privacy Statement') ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-centered">
                    <div class="row footer-link">
                        <div class="col-sm-11  foot-col-title">
                            <h4><?php echo __('Online Collections') ?></h4>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="https://thechildrenremembered.ca/" target="_blank"><?php echo __('The Children Remembered') ?></a>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="http://upanddownthecoast.ca" target="_blank"><?php echo __('Up and Down the Coast') ?></a>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="http://www.ucheritage.ca/" target="_blank"><?php echo __('Honouring Our Heritage') ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-centered">
                    <div class="row footer-link">
                        <div class="col-sm-11 foot-col-title">
                            <h4><?php echo __('Resources<') ?>/h3>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="https://www.unitedchurcharchives.ca/archives-101" target="_blank"><?php echo __('Archives 101') ?></a>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="https://www.unitedchurcharchives.ca/wp-content/uploads/2018/02/Archeion-Searching-Tips.pdf" target="_blank"><?php echo __('Archeion Searching Tips') ?></a>
                        </div>
                    </div>
                    <div class="row footer-link">
                        <div class="col-sm-11">
                            <a href="https://www.unitedchurcharchives.ca/contact-us/" target="_blank"><?php echo __('Contact Us') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer-link">
                <div id="copyright" class="text-left col-xs-6"><?php echo __('Copyright &copy; ') . date('Y') . ' UCC'?></div>
                <div id="footer-info-links" class="col-xs-6 text-right"><a href="https://www.unitedchurcharchives.ca/contact-us/">Contact Us</a> | <a href="https://www.unitedchurcharchives.ca/">About Us</a></div>
            </div>
        </div>
    </footer>
</body>
</html>
