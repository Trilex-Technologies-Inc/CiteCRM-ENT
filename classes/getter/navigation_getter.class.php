<?php

class navigation_getter {


	function getPageSetupID() {
		return $this->fields['page_setup_id'];
	}
	
	function getPageSetupName() {
		return $this->fields['page_setup_name'];
	}
	
	function getPageSetupDisplayName() {
		return $this->fields['page_setup_display_name'];
	}
	
	function getPageSetupPageTitle() {
		return $this->fields['page_setup_page_title'];
	}
	
	function getPageSetupDescription() {
		return $this->fields['page_setup_description'];
	}
	
	function getPageSetupKeywords() {
		return $this->fields['page_setup_keywords'];
	}
	
	function getPageSetupOrder() {
		return $this->fields['page_setup_order'];
	}
	
	function getPageSetupMenu() {
		return $this->fields['page_setup_menu'];
	}

    function get_page_setup_active() {
        return $this->fields['page_setup_active'];
    }

    function get_page_setup_static_page() {
        return $this->fields['page_setup_static_page'];
    }

    function get_page_views() {
        return $this->fields['page_views'];
    }

    function get_last_modified() {
        return $this->fields['last_modified'];
    }
}