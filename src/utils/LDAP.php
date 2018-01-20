<?php

namespace WebDrinkAPI\Utils;


use Exception;

class LDAP {
    private $userDn;
    private $conn;

    public function __construct() {
        // LDAP connection info
        $ldapUser = LDAP_USER;
        $ldapPass = LDAP_PASS;
        $ldapHost = "ldap.csh.rit.edu";
        $appDn = "ou=Apps,dc=csh,dc=rit,dc=edu";
        $this->userDn = "ou=Users,dc=csh,dc=rit,dc=edu";

        // Append the appropriate dn to the username
        if (LDAP_APP) {
            $ldapUser .= "," . $appDn;
        } else {
            $ldapUser .= "," . $this->userDn;
        }

        // Connect to LDAP and bind the connection
        try {
            $this->conn = ldap_connect($ldapHost);
            if (!ldap_bind($this->conn, $ldapUser, $ldapPass)) {
                die ('LDAP Bind Error...');
            }
        }
        catch (Exception $e) {
            die ('LDAP Connection Failed: ' . $e->getMessage());
        }
    }

    function ldap_lookup($uid, $fields = null) {
        try {
            // Make the search
            $filter = "(uid=" . $uid . ")";
            if (is_array($fields))
                $search = ldap_search($this->conn, $this->userDn, $filter, $fields);
            else
                $search = ldap_search($this->conn, $this->userDn, $filter);
            // Grab the results
            if ($search)
                return ldap_get_entries($this->conn, $search);
            else
                return false;
        } catch (Exception $e) {
            return false;
        }
    }

    function ldap_lookup_uid($uid, $fields = null) {
        return $this->ldap_lookup($uid, $fields);
    }

    function ldap_lookup_ibutton($ibutton, $fields = null) {
        try {
            // Make the search
            $filter = "(ibutton=" . $ibutton . ")";
            if (is_array($fields))
                $search = ldap_search($this->conn, $this->userDn, $filter, $fields);
            else
                $search = ldap_search($this->conn, $this->userDn, $filter);
            // Grab the results
            if ($search)
                return ldap_get_entries($this->conn, $search);
            else
                return false;
        } catch (Exception $e) {
            return false;
        }
    }

    function ldap_update($uid, $replace) {
        try {
            // Form the dn
            $dn = "uid=" . $uid . "," . $this->userDn;
            // Make the update
            return ldap_mod_replace($this->conn, $dn, $replace);
        } catch (Exception $e) {
            return false;
        }
    }
}