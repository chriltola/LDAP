<?php
$ldap_host = 'ldap.example.com'; // LDAP server hostname or IP address
$ldap_port = 389; // LDAP server port number
$ldap_protocol = 3; // LDAP protocol version (2 or 3)
$ldap_bind_dn = 'cn=admin,dc=example,dc=com'; // LDAP bind DN (username with admin privileges)
$ldap_bind_password = '********'; // LDAP bind password

$ldap_conn = ldap_connect($ldap_host, $ldap_port);
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, $ldap_protocol);

$ldap_bind = ldap_bind($ldap_conn, $ldap_bind_dn, $ldap_bind_password);
if (!$ldap_bind) {
   die('Could not bind to LDAP server');
}

$ldap_search_base = 'ou=users,dc=example,dc=com'; // LDAP search base DN
$ldap_search_filter = '(cn=John Doe)'; // LDAP search filter
$ldap_search_result = ldap_search($ldap_conn, $ldap_search_base, $ldap_search_filter);

$ldap_search_entries = ldap_get_entries($ldap_conn, $ldap_search_result);
// do something with the search results array

ldap_close($ldap_conn);

?>
