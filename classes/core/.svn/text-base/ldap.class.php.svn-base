<?php

class ldap {

	function ldap($ldap_server,$base_dn,$version) {	
		$this->ldap_server = $ldap_server;
		$this->base_dn = $base_dn;
		$this->version	= $version;	
		$this->_set_ldap_version();	
	}
	

	function connect() {			
			$this->con=ldap_connect($this->ldap_server);  										
			$this->bind=ldap_bind($this->con);													
	}


	function search_object_class($objectClass,$cn) {	
		$this->filter = "(&(objectClass=".$objectClass.")(cn=".$cn."))";	
		$this->_search();	
		return $this->results;	
	}

	function search_cn($cn) {	
		$this->filter = "cn=".$cn;
		$this->_search();	
		return $this->results;	
	}


	function entries_count() {
		$this->entries = ldap_count_entries($this->con,$this->search);
		return $this->entries;
	}


	function _set_ldap_version() {	
		ldap_set_option($this->con, LDAP_OPT_PROTOCOL_VERSION, $this->version);		
	}


	function _search() {	
		$this->search = ldap_search($this->con, $this->base_dn, $this->filter);		
		$this->results =  ldap_get_entries($this->con, $this->search);
	}


}

?>