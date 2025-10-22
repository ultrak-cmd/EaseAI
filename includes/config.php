<?php
return [
    // Update these values or provide environment variables to enable Google Analytics and Google Ads conversion tracking.
    'google_analytics_measurement_id' => getenv('GOOGLE_ANALYTICS_MEASUREMENT_ID') ?: '',
    'google_ads_conversion_id'       => getenv('GOOGLE_ADS_CONVERSION_ID') ?: 'AW-17662486687',
    'google_ads_conversion_label'    => getenv('GOOGLE_ADS_CONVERSION_LABEL') ?: '',
    'google_ads_conversion_value'    => getenv('GOOGLE_ADS_CONVERSION_VALUE') ?: '',
    'google_ads_conversion_currency' => getenv('GOOGLE_ADS_CONVERSION_CURRENCY') ?: 'GBP',

    // Advertiser & Affise integration credentials. Environment variables fall back to legacy WordPress keys for compatibility.
    'advertiser_api_token'           => getenv('ADVERTISER_API_TOKEN') ?: '',
    'advertiser_affiliate_id'        => getenv('ADVERTISER_AFFILIATE_ID') ?: '396',
    'advertiser_funnel'              => getenv('ADVERTISER_FUNNEL') ?: 'cryptocfdtrader',
    'affise_postback_base_url'       => getenv('AFFISE_POSTBACK_BASE_URL') ?: 'https://offers-alphanetwork.affise.com/postback',
    'affise_registration_action_id'  => getenv('AFFISE_REGISTRATION_ACTION_ID') ?: '1',
];
