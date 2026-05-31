<?php

namespace App\Libraries;

class Midtrans
{
    /** @var string Midtrans server key (base64) */
    public static string $serverKey = '';

    /** @var bool Whether to use production endpoints */
    public static bool $isProduction = false;

    /** @var array CURL option overrides */
    public static array $curlOptions = [];

    const SANDBOX_BASE_URL = 'https://api.sandbox.veritrans.co.id/v2';
    const PRODUCTION_BASE_URL = 'https://api.veritrans.co.id/v2';
    const SNAP_SANDBOX_BASE_URL = 'https://app.sandbox.midtrans.com/snap/v1';
    const SNAP_PRODUCTION_BASE_URL = 'https://app.midtrans.com/snap/v1';

    public function __construct()
    {
        // prefer environment variables for configuration
        self::$serverKey = getenv('MIDTRANS_SERVER_KEY') ?: 'SB-Mid-server-ACb3fhrTl9FqCZlBhskSB2Wm';
        self::$isProduction = getenv('MIDTRANS_IS_PRODUCTION') === '1';
    }

    /**
     * Configure runtime options
     *
     * @param array $params
     * @return void
     */
    public static function config(array $params): void
    {
        if (isset($params['server_key'])) self::$serverKey = $params['server_key'];
        if (isset($params['production'])) self::$isProduction = $params['production'];
    }

    public static function getBaseUrl(): string
    {
        return self::$isProduction ? self::PRODUCTION_BASE_URL : self::SANDBOX_BASE_URL;
    }

    public static function getSnapBaseUrl(): string
    {
        return self::$isProduction ? self::SNAP_PRODUCTION_BASE_URL : self::SNAP_SANDBOX_BASE_URL;
    }

    /**
     * POST wrapper
     *
     * @param string $url
     * @param string $server_key
     * @param mixed $data_hash
     * @return mixed
     */
    public static function post(string $url, string $server_key, $data_hash)
    {
        return self::remoteCall($url, $server_key, $data_hash, true);
    }

    /**
     * GET wrapper
     *
     * @param string $url
     * @param string $server_key
     * @return mixed
     */
    public static function get(string $url, string $server_key)
    {
        return self::remoteCall($url, $server_key, false, false);
    }

    /**
     * Execute remote cURL call to Midtrans
     *
     * @param string $url
     * @param string $server_key
     * @param mixed $data_hash
     * @param bool $post
     * @return mixed
     * @throws \Exception
     */
    public static function remoteCall(string $url, string $server_key, $data_hash, bool $post = true)
    {
        $ch = curl_init();

        $headerOptions = [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Basic ' . base64_encode($server_key . ':'),
        ];

        $curl_options = [
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headerOptions,
            CURLOPT_RETURNTRANSFER => 1,
        ];

        if ($post) {
            $curl_options[CURLOPT_POST] = 1;
            $curl_options[CURLOPT_POSTFIELDS] = $data_hash ? json_encode($data_hash) : '';
        }

        // allow global overrides for curl options
        if (!empty(self::$curlOptions) && is_array(self::$curlOptions)) {
            $curl_options = $curl_options + self::$curlOptions;
        }

        curl_setopt_array($ch, $curl_options);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);

        if ($result === false) {
            throw new \Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
        }

        $result_array = json_decode($result);
        if ($info['http_code'] != 201 && !in_array($result_array->status_code ?? null, [200, 201, 202, 407])) {
            $message = 'Midtrans Error (' . ($info['http_code'] ?? '0') . '): ' . (is_array($result_array->error_messages ?? null) ? implode(',', $result_array->error_messages) : ($result_array->status_message ?? ''));
            throw new \Exception($message, $info['http_code'] ?? 0);
        }

        return $result_array;
    }

    /**
     * Request snap token
     *
     * @param array $params
     * @return string|null
     */
    public static function getSnapToken(array $params): ?string
    {
        $result = self::post(self::getSnapBaseUrl() . '/transactions', self::$serverKey, $params);
        return $result->token ?? null;
    }

    /**
     * VTWeb charge - returns redirect URL
     *
     * @param array $payloads
     * @return string|null
     */
    public static function vtweb_charge(array $payloads): ?string
    {
        $result = self::post(self::getBaseUrl() . '/charge', self::$serverKey, $payloads);
        return $result->redirect_url ?? null;
    }

    /**
     * vtdirect charge - returns parsed response
     *
     * @param array $payloads
     * @return mixed
     */
    public static function vtdirect_charge(array $payloads)
    {
        $result = self::post(self::getBaseUrl() . '/charge', self::$serverKey, $payloads);
        return $result;
    }

    /**
     * Get transaction status
     *
     * @param string $id
     * @return mixed
     */
    public static function status(string $id)
    {
        return self::get(self::getBaseUrl() . '/' . $id . '/status', self::$serverKey);
    }
}
