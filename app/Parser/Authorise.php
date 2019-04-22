<?php
/**
 * Created by PhpStorm.
 * User: komp
 * Date: 01.04.2019
 * Time: 21:31
 */

namespace App\Parser;


class Authorise
{
    protected $url = 'https://oauth.vk.com/authorize';

    protected $clientId;

    protected $redirectUri;

    const REDIRECT_URI_BLANK = 'https://oauth.vk.com/blank.html';

    protected $display;

    const DISPLAY_PAGE   = 'page';
    const DISPLAY_POPUP  = 'popup';
    const DISPLAY_MOBILE = 'mobile';

    /**
     * @url https://vk.com/dev/permissions
     */
    protected $scope;

    const SCOPE_NOTIFY        = 'notify';
    const SCOPE_FRIENDS       = 'friends';
    const SCOPE_PHOTOS        = 'photos';
    const SCOPE_AUDIO         = 'audio';
    const SCOPE_VIDEO         = 'video';
    const SCOPE_DOCS          = 'docs';
    const SCOPE_NOTES         = 'notes';
    const SCOPE_PAGE          = 'pages';
    const SCOPE_STATUS        = 'status';
    const SCOPE_OFFERS        = 'offers';
    const SCOPE_QUESTIONS     = 'questions';
    const SCOPE_WALL          = 'wall';
    const SCOPE_GROUPS        = 'groups';
    const SCOPE_MESSAGES      = 'messages';
    const SCOPE_EMAIL         = 'email';
    const SCOPE_NOTIFICATIONS = 'notifications';
    const SCOPE_STATS         = 'stats';
    const SCOPE_ADS           = 'ads';
    const SCOPE_OFFLINE       = 'offline';
    const SCOPE_NO_HTTPS      = 'nohttps';

    protected $responseType;

    const RESPONSE_TYPE_CODE  = 'code';
    const RESPONSE_TYPE_TOKEN = 'token';

    protected $version;

    protected $state;

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    public function setDisplay($display)
    {
        $this->display = $display;

        return $this;
    }

    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;

        return $this;
    }

    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    public function getAuthorizeUrl($debug = false)
    {
        $camelCaseToUnderscore = function($value) {
            return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $value));
        };

        $parameters = [];
        foreach (['clientId', 'redirectUri', 'display', 'scope', 'responseType', 'version', 'state'] as $property) {
            if (!is_null($this->{$property}))
                $parameters[$camelCaseToUnderscore($property)] = is_array($this->{$property}) ? implode(',', $this->{$property}) : $this->{$property};
        }

        if ($debug) {
            print_r($parameters);
            exit();
        }

        return $this->url . '?' . urldecode(http_build_query($parameters));
    }

}