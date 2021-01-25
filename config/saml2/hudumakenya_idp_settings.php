<?php

// If you choose to use ENV vars to define these values, give this IdP its own env var names
// so you can define different values for each IdP, all starting with 'SAML2_'.$this_idp_env_id
$this_idp_env_id = 'HUDUMAKENYA';

//This is variable is for simplesaml example only.
// For real IdP, you must set the url values in the 'idp' config to conform to the IdP's real urls.
$idp_host = env('SAML2_' . $this_idp_env_id . '_IDP_HOST', 'http://localhost:2356');

return $settings = array(

    /*****
     * One Login Settings
     */

    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => true, //@todo: make this depend on laravel config

    // Enable debug mode (to print errors)
    'debug' => env('APP_DEBUG', true),

    // Service Provider Data that we are deploying
    'sp' => array(

        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.+
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        'x509cert' => env('SAML2_' . $this_idp_env_id . '_SP_x509', '
        -----BEGIN CERTIFICATE-----
MIIDxTCCAq2gAwIBAgIUBgg4m6pRb+3UBruNcPbVIVrgq0kwDQYJKoZIhvcNAQEL
BQAwcjELMAkGA1UEBhMCS0UxEDAOBgNVBAgMB05haXJvYmkxEDAOBgNVBAcMB05h
aXJvYmkxFTATBgNVBAoMDEh1ZHVtYSBLZW55YTEMMAoGA1UECwwDSUNUMRowGAYD
VQQDDBFodWR1bWFrZW55YS5nby5rZTAeFw0yMDEyMTQxMTUzNDVaFw00MDEyMDkx
MTUzNDVaMHIxCzAJBgNVBAYTAktFMRAwDgYDVQQIDAdOYWlyb2JpMRAwDgYDVQQH
DAdOYWlyb2JpMRUwEwYDVQQKDAxIdWR1bWEgS2VueWExDDAKBgNVBAsMA0lDVDEa
MBgGA1UEAwwRaHVkdW1ha2VueWEuZ28ua2UwggEiMA0GCSqGSIb3DQEBAQUAA4IB
DwAwggEKAoIBAQDXx5Kg8WL7eU30JbeM/Jf9ADl8UzuWLwjfrdJaJGD/P9f8I7se
N+qI3OxlwkSTygBKKmxhTUZXHctxKjtgz+zJF6vEXXIK18aAntybALuw5UacAWkN
P6KWyie/13sNmWbXqHEWjhj4lNRK0wGkbfhld79SO09+avhv2WrJlWtkC5eKn4b4
vtaBevzx33t5SBdUbvtsqmIKoIb/yIIZuSarQMEa7etQeuQkC1/ccALEkiMbKdL0
n/teP5RDLeVfOgr82Ik1YsGbnxek7m0BaLIzKTV8xRpcCWRizjVpaF7fjfOc1sLx
ZWLxjwfysc5ldHHj88q10APVVrEw8/JVvhYVAgMBAAGjUzBRMB0GA1UdDgQWBBTx
nxf63RG8F9rprJ5zII27RnxwmDAfBgNVHSMEGDAWgBTxnxf63RG8F9rprJ5zII27
RnxwmDAPBgNVHRMBAf8EBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQBZCZ8xoeCO
rK80gCfBYEZOMUsfIBTNZZiKKbSMzauasdPU5Fhm4nedRXkZDpcTjEIMuTdyafK8
KKQn+Pip1/bLS7rFZ0cGIFqKasQ1owNcpnFFOujgWdL7tOHSJZZQafr9wDBLQVqi
8TOesTQ3+HqJFZ6oYS8h3fuMDQet/4VU8Rd2CDwWcvpw0d3z3iuBMvHMxpSNypHC
CeflwPFYMkb4tgeB0kkfK3ET2Grw5MR+bYc/vQAQV51beDQC/kCLctkyK83izUXl
ZkWIZndSmfxGdzSlhfI5pY0m74B7BC+3QBfionVv7k3CSOUZiJAhrbQ4wHZLYesw
0yFwbRoLQpaO
-----END CERTIFICATE-----
        '),
        'privateKey' => env('SAML2_' . $this_idp_env_id . '_SP_PRIVATEKEY', '-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDXx5Kg8WL7eU30
JbeM/Jf9ADl8UzuWLwjfrdJaJGD/P9f8I7seN+qI3OxlwkSTygBKKmxhTUZXHctx
Kjtgz+zJF6vEXXIK18aAntybALuw5UacAWkNP6KWyie/13sNmWbXqHEWjhj4lNRK
0wGkbfhld79SO09+avhv2WrJlWtkC5eKn4b4vtaBevzx33t5SBdUbvtsqmIKoIb/
yIIZuSarQMEa7etQeuQkC1/ccALEkiMbKdL0n/teP5RDLeVfOgr82Ik1YsGbnxek
7m0BaLIzKTV8xRpcCWRizjVpaF7fjfOc1sLxZWLxjwfysc5ldHHj88q10APVVrEw
8/JVvhYVAgMBAAECggEAP7neERAZFoG1xwQYmFfFH2AgmhoOwAT2DvFL7XlO+DNH
u1xmF7+V0YPFgSwFiswel8i9p2LmAjZ3bd12GdpuaNlHzj92vcMKCdRg/JoT1GNy
HgLAnrwLbZMYeCzQV6zVVZ2WgH3I3ClAJTT6CDC+KmFaLJP9ny1CX+4K/qvVQn8r
Eat2QwkinDVph0JbW90FkTCIw1vqL1STcxEz4H/fJ7bx3cYPA+Lsnh6lKqbVi+Be
pgnvr4UGCH0GZRR/YUgU3e4dZiUXTLTV2qaYml/cm1k9j0a9iBcOyjSmDwakbJ+/
5XMHGVayGZ8ZZQnlsnifbTfdrzkSrB/mGoZxQE4CZQKBgQDvfMNAYR4hM+gWTyvz
ijLhjY/HQEFGVW3YzObidL2PlPDR+pKAyo1l4RjtibkDEbIaXioydFFSWmCH9+dA
QyoKdFnu6E30PjIaVyNOS0DmZ/Cgci5WAE8yM1e/Td4XH84L1ILOtTWPXmluSKog
H5BvJLUUqK7WHLrcKnSTnhHWTwKBgQDmqFbwkst5b2Fv5FHboO9xSyY7JTFxlafi
RsP1Cf9PuN2ERdQ0LQvJ4I0dODIRvltdZWQty2KSdQKukbw5E/mYJifEG1fJ8SNc
8E1bx2jzSRmlgGg5rhuVstK2jTnzDkzC532fqN9FW9FLQV1JWXmXWXnZLgpdOnI+
rGrfLViYWwKBgGQKuUG+kCiMl2oiXpjY5VJloWc5x0rLSxzi05xL6hf9vu/ofaTB
eHnTo2cvPhMzJDRxm60B/CqryGFkRL0KkZhWbG8pqc7a4HEyb3Q4aX8WcmWD7SlN
7cdpvUEUFS+RwLAecRpKhnpClUZVooPSy7IyIlbj9E1LKR/puFMmGAtvAoGBAN38
S1fS31Lqt+q44XMvauItQgkQHYrETkO+eV8+FOJD96USk0z3wW2z1/u0FrPu8P1s
1EIiiKaNSFx705tXNxKQPhtFeXLXyYHrn3fh7Yae5rjaYPSKNPAYnySjvI7IR2YY
5lUfcGnPGRmFOeOa4iOgMF2tKrpYwpTA2UYa3TYbAoGBAOFWqlRQ42fOoHeLJZA9
TZ+JuxXuTO3PRDpe6kGy5ojrEjlqqBxQx+bi3D9jRJW/RVnDTlFWiCHoMGRaY5ba
kZBXE7iru2nNc3+qHOS2OWErv9uW4b3aiMMZ1EW144rJkMWbVDuShJorKBVSVqEb
lH3pdQK5HqeyXCS4AntYpnG+
-----END PRIVATE KEY-----'),

        // Identifier (URI) of the SP entity.
        // Leave blank to use the '{idpName}_metadata' route, e.g. 'test_metadata'.
        'entityId' => env('SAML2_' . $this_idp_env_id . '_SP_ENTITYID', ''),

        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array(
            // URL Location where the <Response> from the IdP will be returned,
            // using HTTP-POST binding.
            // Leave blank to use the '{idpName}_acs' route, e.g. 'test_acs'
            'url' => '',
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        // Remove this part to not include any URL Location in the metadata.
        'singleLogoutService' => array(
            // URL Location where the <Response> from the IdP will be returned,
            // using HTTP-Redirect binding.
            // Leave blank to use the '{idpName}_sls' route, e.g. 'test_sls'
            'url' => '',
        ),
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array(
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => env('SAML2_' . $this_idp_env_id . '_IDP_ENTITYID', $idp_host . '/saml/metadata'),
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array(
            // URL Target of the IdP where the SP will send the Authentication Request Message,
            // using HTTP-Redirect binding.
            'url' => env('SAML2_' . $this_idp_env_id . '_IDP_SSO_URL', $idp_host . '/login'),
        ),
        // SLO endpoint info of the IdP.
        'singleLogoutService' => array(
            // URL Location of the IdP where the SP will send the SLO Request,
            // using HTTP-Redirect binding.
            'url' => env('SAML2_' . $this_idp_env_id . '_IDP_SL_URL', $idp_host . '/saml/logout'),
        ),
        // Public x509 certificate of the IdP
        'x509cert' => env(
            'SAML2_' . $this_idp_env_id . '_IDP_x509',
            "-----BEGIN CERTIFICATE-----
MIIDxTCCAq2gAwIBAgIUBgg4m6pRb+3UBruNcPbVIVrgq0kwDQYJKoZIhvcNAQEL
BQAwcjELMAkGA1UEBhMCS0UxEDAOBgNVBAgMB05haXJvYmkxEDAOBgNVBAcMB05h
aXJvYmkxFTATBgNVBAoMDEh1ZHVtYSBLZW55YTEMMAoGA1UECwwDSUNUMRowGAYD
VQQDDBFodWR1bWFrZW55YS5nby5rZTAeFw0yMDEyMTQxMTUzNDVaFw00MDEyMDkx
MTUzNDVaMHIxCzAJBgNVBAYTAktFMRAwDgYDVQQIDAdOYWlyb2JpMRAwDgYDVQQH
DAdOYWlyb2JpMRUwEwYDVQQKDAxIdWR1bWEgS2VueWExDDAKBgNVBAsMA0lDVDEa
MBgGA1UEAwwRaHVkdW1ha2VueWEuZ28ua2UwggEiMA0GCSqGSIb3DQEBAQUAA4IB
DwAwggEKAoIBAQDXx5Kg8WL7eU30JbeM/Jf9ADl8UzuWLwjfrdJaJGD/P9f8I7se
N+qI3OxlwkSTygBKKmxhTUZXHctxKjtgz+zJF6vEXXIK18aAntybALuw5UacAWkN
P6KWyie/13sNmWbXqHEWjhj4lNRK0wGkbfhld79SO09+avhv2WrJlWtkC5eKn4b4
vtaBevzx33t5SBdUbvtsqmIKoIb/yIIZuSarQMEa7etQeuQkC1/ccALEkiMbKdL0
n/teP5RDLeVfOgr82Ik1YsGbnxek7m0BaLIzKTV8xRpcCWRizjVpaF7fjfOc1sLx
ZWLxjwfysc5ldHHj88q10APVVrEw8/JVvhYVAgMBAAGjUzBRMB0GA1UdDgQWBBTx
nxf63RG8F9rprJ5zII27RnxwmDAfBgNVHSMEGDAWgBTxnxf63RG8F9rprJ5zII27
RnxwmDAPBgNVHRMBAf8EBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQBZCZ8xoeCO
rK80gCfBYEZOMUsfIBTNZZiKKbSMzauasdPU5Fhm4nedRXkZDpcTjEIMuTdyafK8
KKQn+Pip1/bLS7rFZ0cGIFqKasQ1owNcpnFFOujgWdL7tOHSJZZQafr9wDBLQVqi
8TOesTQ3+HqJFZ6oYS8h3fuMDQet/4VU8Rd2CDwWcvpw0d3z3iuBMvHMxpSNypHC
CeflwPFYMkb4tgeB0kkfK3ET2Grw5MR+bYc/vQAQV51beDQC/kCLctkyK83izUXl
ZkWIZndSmfxGdzSlhfI5pY0m74B7BC+3QBfionVv7k3CSOUZiJAhrbQ4wHZLYesw
0yFwbRoLQpaO
-----END CERTIFICATE-----"
        ),
        /*
         *  Instead of use the whole x509cert you can use a fingerprint
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it)
         */
        // 'certFingerprint' => '',
    ),



    /***
     *
     *  OneLogin advanced settings
     *
     *
     */
    // Security settings
    'security' => array(

        /** signatures and encryptions offered */

        // Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
        // will be encrypted.
        'nameIdEncrypted' => false,

        // Indicates whether the <samlp:AuthnRequest> messages sent by this SP
        // will be signed.              [The Metadata of the SP will offer this info]
        'authnRequestsSigned' => false,

        // Indicates whether the <samlp:logoutRequest> messages sent by this SP
        // will be signed.
        'logoutRequestSigned' => false,

        // Indicates whether the <samlp:logoutResponse> messages sent by this SP
        // will be signed.
        'logoutResponseSigned' => false,

        /* Sign the Metadata
         False || True (use sp certs) || array (
                                                    keyFileName => 'metadata.key',
                                                    certFileName => 'metadata.crt'
                                                )
        */
        'signMetadata' => false,


        /** signatures and encryptions required **/

        // Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
        // <samlp:LogoutResponse> elements received by this SP to be signed.
        'wantMessagesSigned' => false,

        // Indicates a requirement for the <saml:Assertion> elements received by
        // this SP to be signed.        [The Metadata of the SP will offer this info]
        'wantAssertionsSigned' => false,

        // Indicates a requirement for the NameID received by
        // this SP to be encrypted.
        'wantNameIdEncrypted' => false,

        // Authentication context.
        // Set to false and no AuthContext will be sent in the AuthNRequest,
        // Set true or don't present thi parameter and you will get an AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
        // Set an array with the possible auth context values: array ('urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509'),
        'requestedAuthnContext' => true,
    ),

    // Contact information template, it is recommended to suply a technical and support contacts
    'contactPerson' => array(
        'technical' => array(
            'givenName' => 'name',
            'emailAddress' => 'no@reply.com'
        ),
        'support' => array(
            'givenName' => 'Support',
            'emailAddress' => 'no@reply.com'
        ),
    ),

    // Organization information template, the info in en_US lang is recomended, add more if required
    'organization' => array(
        'en-US' => array(
            'name' => 'Name',
            'displayname' => 'Display Name',
            'url' => 'http://url'
        ),
    ),

    /* Interoperable SAML 2.0 Web Browser SSO Profile [saml2int]   http://saml2int.org/profile/current

   'authnRequestsSigned' => false,    // SP SHOULD NOT sign the <samlp:AuthnRequest>,
                                      // MUST NOT assume that the IdP validates the sign
   'wantAssertionsSigned' => true,
   'wantAssertionsEncrypted' => true, // MUST be enabled if SSL/HTTPs is disabled
   'wantNameIdEncrypted' => false,
*/

);
