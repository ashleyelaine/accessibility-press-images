<script language="javascript" type="text/javascript">
jQuery( document ).ready(function() {
	var totalPages = jQuery('#pageImageScan tbody tr.page').length;
	function clearTables() {
		jQuery('.image-count, .error-count,.blank-count').text('0');
		jQuery('.image-thumbs-blank,.image-thumbs').text(' ');
		var counter = 0;
		jQuery('#progress-bar').css('transition','none');
		jQuery('#progress-bar').css('width','0');

		jQuery('.count').text('0 out of '+totalPages+' pages');
		jQuery('#pleaseWait').css('display','block');
		jQuery('#clearTables').css('display','none');
		jQuery('table.previous-builds-table tr:nth-child(even)').css('background','#f9f9f9');
		jQuery('table.previous-builds-table tr:nth-child(odd)').css('background','#fff');
		jQuery('.pagesText').text('Pages ready for scan:');
		jQuery('.hiddenUntilStarted').css('display','none');
	}
	jQuery('#clearTables').click(function(){
		clearTables();
		setTimeout(function(){
		  jQuery('#startImageScan').click();
	  	}, 1000);
	});
	jQuery('#progress-div').append('<span class="count">0 out of '+totalPages+' pages</span>');
	jQuery('#startImageScan').on( "click", function() {
		//jQuery('.hiddenUntilStarted').fadeIn();
		jQuery('#startImageScan').css('display','none');
		jQuery('#pleaseWait').css('display','block');
		jQuery('#progress-bar').css('transition','width linear 1s');
		jQuery('.hiddenUntilStarted').css('display','none');

		$hideme = jQuery('#hidden');
		var counter = 0;
		jQuery(".page").each(function() {
			var myRow = jQuery(this);
			var myCounter = counter++;
			myCounterFix = myCounter + 1
			var progressPercent = (myCounterFix/totalPages) * 100 + '%';
			jQuery('.progress').css('width', progressPercent);
			jQuery('.count').text(myCounterFix+' out of '+totalPages+' pages');
			jQuery.ajax(myRow.find(".url .urlToGrabForScan").text(), {async: false}).done(function(data) {
				html = jQuery.parseHTML( data );//.find('img'),
				$hideme.append(html);
				jQuery(myRow).find(".image-count").text($hideme.find("img").length);

				//myRow;
				$hideme.find("img").each(function() {
					//ALT ATTRIBUTE MISSING
					if(jQuery(this).attr('alt') == undefined) {
						jQuery(myRow).find(".error-count").text(parseInt(jQuery(myRow).find(".error-count").text()) + 1);
						var imageSrc = jQuery(this).attr('src');
						jQuery(myRow).find('.image-thumbs').append( "<img width='100' src='"+imageSrc+"'/> " );
					}
					//ALT ATTRIBUTE EMPTY
					if(jQuery(this).attr('alt') == "") {
						jQuery(myRow).find(".blank-count").text(parseInt(jQuery(myRow).find(".blank-count").text()) + 1);
						var imageSrc = jQuery(this).attr('src');
						jQuery(myRow).find('.image-thumbs-blank').append('<img width="100" class="noAltUrl" src="'+imageSrc+'"/>');
					}
				});
				//COLORING OF ROWS
				if (!jQuery(myRow).find(".error-count").text() == '0') {
					jQuery(myRow).css('background', '#e3b0b0');
				}
				if (jQuery(myRow).find(".error-count").text() == '0' && !jQuery(myRow).find(".blank-count").text() == '0') {
					jQuery(myRow).css('background', '#f4d879');
				}
				if (jQuery(myRow).find(".error-count").text() == '0' && jQuery(myRow).find(".blank-count").text() == '0') {
					jQuery(myRow).css('background', '#b5d39d');
				}
				$hideme.html("");
			});
		});
		jQuery('#pleaseWait').css('display','none');
		jQuery('#clearTables').css('display','block');
		jQuery('.pagesText').text('Scan Complete.');
		jQuery('.hiddenUntilStarted').css('display','block');
		//html = jQuery.parseHTML( str );//.find('img'),
	});
});
</script>

<div id="hidden" style="display: none;">
</div>

<div class="wrap">
    <h2>AccessibilityPress: Images</h2>
    <h3>This tool can be used to help assess where you have images missing alternative text.</h3>
	<style type="text/css">
		p {margin: 15px 0;}
		h3 {font-size: 16px; font-weight: normal;}
        table.previous-builds-table { padding: 0; width: 100%;}
        table.previous-builds-table tr:nth-child(even) {background: #f9f9f9}
        table.previous-builds-table tr:nth-child(odd) {background: #FFF}
        table.previous-builds-table th { padding: 0 10px; }
		table.previous-builds-table th a {color: #444;}
		table.previous-builds-table th a[data-title]:hover:after {content: attr(data-title); padding: 4px 10px; color: #333;position: absolute;right: 0px;top: 20px;z-index: 20;-moz-border-radius: 4px;-webkit-border-radius: 4px;border-radius: 4px;background: #fff;border: 1px solid #bbbaba; font-weight: normal;width: 180px;}
		table.previous-builds-table th a:hover {cursor: pointer; position: relative;}
        table.previous-builds-table td { padding: 0 2px; }
        table.previous-builds-table #date { max-width: 150px; }
        table.previous-builds-table #build-number p { text-align: center; }
        table.previous-builds-table #status p { text-align: center; }
        table.previous-builds-table td {vertical-align: middle; padding: 0 10px;}
        table.previous-builds-table td > p {margin-top: 0; margin-bottom: 0;}
		table.previous-builds-table th.postPage {width: 500px;}
		table.previous-builds-table th.numberCol {width: 100px;}
		.ulListing {list-style: disc; padding-left: 30px;}
		button {background: #8cc747 none repeat scroll 0 0;border: medium none;border-radius: 4px; color: #fff;font-size: 15px; padding: 11px 20px;text-transform: uppercase;}
    	button:hover {cursor: pointer; opacity: 0.7;}
		.progress {background: #cfcfcf; height: 20px; transition: width linear 1s; width: 0;}
		.progressContainer {background: #fff; border: 1px solid #bbbaba; width: 100%; height: 20px; border-radius: 4px; margin-bottom: 40px;}
		.count {display: block; text-align: center; font-style: italic; padding: 5px 0;}
		.hiddenUntilStarted {display: none;}
		.clearT {display: none; background: #A39E9E;}
		.wait {display: none; background: #fff; color: #444;}
		.wait:hover {cursor: default;}
		.buttons {padding:15px 0 20px;}
		.sr-only {position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); border: 0;}

    </style>
    <div class="buttons">
        <button id="startImageScan">Start Image Scan</button>
        <button id="pleaseWait" class="wait">Please Wait...</button>
        <button id="clearTables" class="clearT">Rescan</button>
    </div>
    <div id="progress-div" class="progressContainer"><div id="progress-bar" class="progress"></div></div>


	<div class="hiddenUntilStarted">
    	<p class="pagesText">Pages ready for scan:</p>
        <?php
			$customPostTypeArgs = array(
			   'public'   => true
			 );
			$customPostTypes = get_post_types($customPostTypeArgs);
			$allPostsList = array();
			foreach ( $customPostTypes  as $post_type ) {
				$allPostsList[] = $post_type;
			}
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$args = array(
				'post_type' => $allPostsList,
				'posts_per_page' => '-1',
				'paged'=>$paged
			);
			$posts = get_posts($args);
		?>

        <table id="pageImageScan" class="previous-builds-table"><tbody>
            <tr valign="top">
                <th class="postPage"><p>Page</p></th>
                <th class="numberCol"><p><a data-title="Total images on the page">Total&nbsp;Image&nbsp;Count</a></p></th>
                <th class="numberCol"><p><a data-title='Number of images that are missing an alt="" attribute.'>Error&nbsp;Count</a></p></th>
                <th><p><a data-title='Images that are missing an alt="" attribute.'>Error&nbsp;Image&nbsp;Thumbs</a></p></th>
                <th class="numberCol"><p><a data-title='Number of images that have an empty alt="" attribute. '>Blank&nbsp;Count</a></p></th>
                <th><p><a data-title='Images that have an empty alt="" attribute.'>Blank&nbsp;Image&nbsp;Thumbs</a></p></th>
            </tr>
            	<?php foreach($posts as $post): ?>
                <tr class="page">
                    <td class="url"><a target="_blank" href="<?php echo get_permalink($post) ?>"><span class="urlToGrabForScan"><?php echo get_permalink($post) ?></span> <span class="sr-only">Opens in new window</span></a></td>
                    <td class="image-count">0</td>
                    <td class="error-count">0</td>
                    <td data-thumbs="" class="image-thumbs"></td>
                    <td class="blank-count">0</td>
                    <td data-thumbs="" class="image-thumbs-blank"></td>
                </tr>
            	<?php endforeach ?>
            <?php wp_reset_query(); ?>
        </tbody></table>
	</div>
</div>
