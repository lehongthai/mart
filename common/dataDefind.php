<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 6/22/2017
 * Time: 12:20 AM
 */

class SlugConfigList {
    const SLUG_MOBILE_PHONE = 'slug_mobile_phone';
    const SLUG_FAX = 'slug_fax';
    const SLUG_CONTACT = 'slug_contact';
    const SLUG_LINK_LINKEDIN = 'slug_linkedin';
    const SLUG_LINK_TWITTER = 'slug_twitter';
    const SLUG_LINK_FACEBOOK = 'slug_facebook';
    const SLUG_LINK_SKYPE = 'slug_skype';
    const SLUG_LINK_GOOGLE_PLUG = 'slug_google_plug';
    const SLUG_LINK_YOUTUBE = 'slug_youtube';
}

/**
 * @return array
 */
function switchStringSlugToArraySlug(){
    $arrSlug = [
        SlugConfigList::SLUG_MOBILE_PHONE => 'Mobile Phone',
        SlugConfigList::SLUG_FAX => 'Fax',
        SlugConfigList::SLUG_CONTACT => 'Contact',
        SlugConfigList::SLUG_LINK_LINKEDIN => 'Link LinkedIn',
        SlugConfigList::SLUG_LINK_TWITTER => 'Link Twitter',
        SlugConfigList::SLUG_LINK_SKYPE => 'Link Skype',
        SlugConfigList::SLUG_LINK_GOOGLE_PLUG => 'Link Google Plug',
        SlugConfigList::SLUG_LINK_FACEBOOK => 'Link Facebook',
        SlugConfigList::SLUG_LINK_YOUTUBE => 'Link Youtube'
    ];

    return $arrSlug;
}