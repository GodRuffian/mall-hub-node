<?php

/**
 * Hub Server API for Authorization.
 *
 * @author Jinlin Li
 */
namespace Gini\Controller\API;

class Mall extends \Gini\Controller\API\Base
{
    private static $_sessionKey = 'mall-hub-node.id';

    public function __construct()
    {
    }
    /**
     * 根据clientId和clientSecret验证App身份.
     *
     * @param string $clientId
     * @param string $clientSecret
     *
     * @return string|false
     */
    public function actionAuthorize($clientId, $clientSecret)
    {
        $node = an('node', ['client_id' => $clientId, 'client_secret' => $clientSecret]);

        if ($node->id) {
            $this->setCurrentApp($clientId);
            return session_id();
        }
        $confs = \Gini\Config::get('auth.node');
        if (array_key_exists($clientId, $confs) && ($confs[$clientId] == $clientSecret)) {
            $this->setCurrentApp($clientId);
            return session_id();
        }
        return false;
    }
}
