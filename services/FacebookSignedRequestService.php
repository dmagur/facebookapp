<?php
namespace SSH\Services;

/**
 * Class FacebookSignedRequestService
 * @package SSH\Services
 */
class FacebookSignedRequestService{
    /**
     * @param $signed_request
     * @return mixed|null
     */
    public static function parse_signed_request(string $signed_request,string $secret): ?array {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2);

        // decode the data
        $sig = self::base64_url_decode($encoded_sig);
        $data = json_decode(self::base64_url_decode($payload), true);

        // confirm the signature
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
            return null;
        }

        return $data;
    }

    private static function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }
}