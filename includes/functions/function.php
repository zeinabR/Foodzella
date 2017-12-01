
<?php
	
	/*
	Title Function That Echo the Page Title In Case The Page Has The Variable $pageTitle And Echo default Title For Other Pages
	*/

	function getTitle(){
		global $pageTitle;
		if (isset($pageTitle)) {
			echo $pageTitle;
		} else {
			echo 'Defualt';
		}
    }

    function get_css() {
        global $css_files;
        if (isset($css_files)) {
            echo $css_files;
        } else {
            echo '';
        }
    }

    function get_js() {
        global $js_files;
        if (isset($js_files)) {
            echo $js_files;
        } else {
            echo '';
        }
    }
    
?>