<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

return [
    'class' => \yii\authclient\Collection::class,
    'clients' => [
        'facebook' => [
            'class' => \yii\authclient\clients\Facebook::class,
            'clientId' => 'facebook_client_id',
            'clientSecret' => 'facebook_client_secret',
        ],
        'linkedin' => [
            'class' => \yii\authclient\clients\LinkedIn::class,
            'clientId' => 'linkedin_client_id',
            'clientSecret' => 'linkedin_client_secret',
        ],
        'twitter' => [
            'class' => \yii\authclient\clients\Twitter::class,
            'attributeParams' => [
                'include_email' => 'true'
            ],
            'consumerKey' => 'twitter_consumer_key',
            'consumerSecret' => 'twitter_consumer_secret',
        ],
        'live' => [
            'class' => \yii\authclient\clients\Live::class,
            'clientId' => 'live_client_id',
            'clientSecret' => 'live_client_secret',
        ],
        'github' => [
            'class' => 'yii\authclient\clients\GitHub',
            'clientId' => 'github_client_id',
            'clientSecret' => 'github_client_secret',
        ],
    ],
];