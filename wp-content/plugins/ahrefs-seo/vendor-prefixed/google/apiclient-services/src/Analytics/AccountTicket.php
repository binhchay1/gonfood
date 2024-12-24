<?php

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
namespace ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics;

class AccountTicket extends \ahrefs\AhrefsSeo_Vendor\Google\Model
{
    protected $accountType = \ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics\Account::class;
    protected $accountDataType = '';
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $kind;
    protected $profileType = \ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics\Profile::class;
    protected $profileDataType = '';
    /**
     * @var string
     */
    public $redirectUri;
    protected $webpropertyType = \ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics\Webproperty::class;
    protected $webpropertyDataType = '';
    /**
     * @param Account
     */
    public function setAccount(\ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics\Account $account)
    {
        $this->account = $account;
    }
    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }
    /**
     * @param string
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }
    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }
    /**
     * @param Profile
     */
    public function setProfile(\ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics\Profile $profile)
    {
        $this->profile = $profile;
    }
    /**
     * @return Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }
    /**
     * @param string
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }
    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }
    /**
     * @param Webproperty
     */
    public function setWebproperty(\ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics\Webproperty $webproperty)
    {
        $this->webproperty = $webproperty;
    }
    /**
     * @return Webproperty
     */
    public function getWebproperty()
    {
        return $this->webproperty;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ahrefs\AhrefsSeo_Vendor\Google\Service\Analytics\AccountTicket::class, 'ahrefs\\AhrefsSeo_Vendor\\Google_Service_Analytics_AccountTicket');
