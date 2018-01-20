<?php

namespace WebDrinkAPI\Utils;


use Exception;

class LDAP {
    private $userDn;
    private $conn;

    public function __construct(string $user) {
        // LDAP connection info
        // TODO: Get a password for LDAP
        $ldapUser = "uid=" . $user;
        $ldapPass = "";
        $ldapHost = "ldap.csh.rit.edu";
        $userDn = "ou=Users,dc=csh,dc=rit,dc=edu";

        // Append the appropriate dn to the username
        $ldapUser .= "," . $userDn;

        // Connect to LDAP and bind the connection
        try {
            $conn = ldap_connect($ldapHost);
            if (!ldap_bind($conn, $ldapUser, $ldapPass)) {
                die ('LDAP Bind Error...');
            }
        }
        catch (Exception $e) {
            die ('LDAP Connection Failed: ' . $e->getMessage());
        }
        $this->conn = $conn;
        $this->userDn = $userDn;
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