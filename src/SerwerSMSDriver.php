<?php
namespace KDuma\SMS\Drivers\SerwerSMS;

use Exception;
use KDuma\SMS\Drivers\SMSSenderDriverInterface;
use KDuma\SMS\Drivers\SMSChecksBalanceDriverInterface;
use SerwerSMS\SerwerSMS;

class SerwerSMSDriver implements SMSSenderDriverInterface, SMSChecksBalanceDriverInterface
{
    /**
     * @var SerwerSMS
     */
    private $api;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $config;

    /**
     * SerwerSMSDriver constructor.
     *
     * @param $login
     * @param $password
     * @param array $config
     * @throws \SerwerSMS\Exception
     */
    public function __construct($login, $password, array $config = [])
    {
        $this->api = new SerwerSMS($login, $password);

        $this->config = collect($config);
    }

    /**
     * @param $to      string   Recipient phone number
     * @param $message string   Message to send
     *
     * @return string
     * @throws Exception
     */
    public function send($to, $message)
    {
        $result = $this->api->messages->sendSms($to, $message,
            $this->config->get('eco', true) ? null : $this->config->get('sender'),
            array(
                'details' => true,
                'test' => $this->config->get('test', false),
                'flash' => $this->config->get('flash', false),
                'dlr_url' => $this->config->get('dlr_url', null),
            )
        );

        if(!$result->success)
            throw new Exception('Something went wrong!');

        return collect($result->items)->first()->id;
    }

    /**
     * @return int
     */
    public function balance()
    {
        $result = collect($this->api->account->limits()->items)
            ->where('type', $this->config->get('eco', true) ? 'eco' : 'full')
            ->first()
            ->value;

        return $result;
    }
}