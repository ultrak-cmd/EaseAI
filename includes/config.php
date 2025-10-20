<?php
return [
    // Update these values or provide environment variables to enable Google Analytics and Google Ads conversion tracking.
    'google_analytics_measurement_id' => getenv('GOOGLE_ANALYTICS_MEASUREMENT_ID') ?: '',
    'google_ads_conversion_id'       => getenv('GOOGLE_ADS_CONVERSION_ID') ?: '',
    'google_ads_conversion_label'    => getenv('GOOGLE_ADS_CONVERSION_LABEL') ?: '',
    'google_ads_conversion_value'    => getenv('GOOGLE_ADS_CONVERSION_VALUE') ?: '',
    'google_ads_conversion_currency' => getenv('GOOGLE_ADS_CONVERSION_CURRENCY') ?: 'GBP',
];
