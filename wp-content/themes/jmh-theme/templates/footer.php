<footer id="footer" class="content-info">
  <div class="container-fluid">
    <div class="copyright">copyright © <?php echo date("Y"); ?></div>
    <div class="link-footer">
        <a href="<?= get_field('url_instagram', 'option'); ?>" target="_blank">
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <span>instagram</span>
        </a>
        <a href="<?= get_field('url_flickr', 'option'); ?>" target="_blank">
            <i class="fa fa-flickr" aria-hidden="true"></i>
            <span>flickr</span>
        </a>
    </div>
  </div>
</footer>