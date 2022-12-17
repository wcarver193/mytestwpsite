<?php

  function ale_add_scripts($hook) {
			wp_enqueue_script( 'bebe_metaboxes', get_template_directory_uri()  . '/js/admin/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
		}
  add_action( 'admin_enqueue_scripts', 'ale_add_scripts', 10 );

  //в админке на странице Home просм.код подкл. есть
  <script src='http://wpredux/wp-content/themes/bebe/js/admin/metaboxes.js?ver=6.1.1' id='bebe_metaboxes-js'></script>

  //в файле metaboxes.js . файл я взял из  bebe.zip скрипт есть

  $('.ale_upload_file').change(function () {
		formfield = $(this).attr('name');
		$('#' + formfield + '_id').val("");
	});