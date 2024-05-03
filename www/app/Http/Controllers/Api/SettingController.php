<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends BaseController
{
    /**
     * Get s3 setting
     *
     * @return string
     */
    public function getS3Setting(Request $request)
    {
        try {
            $apiKey = env('S3_KEY');
            $apiSecret = env('S3_PASSWORD');
            $apiBucket = env('S3_BUCKET');
            $apiRegion = env('S3_REGION');

            $reps = ['s3_api_key' => $apiKey, 's3_api_secret' => $apiSecret, 's3_api_bucket' => $apiBucket, 's3_api_region' => $apiRegion];
            return $this->getJsonResponse(true, 'OK', $reps);
        } catch (\Exception $ex) {
            return $this->getJsonResponse(false, 'Chưa cài đặt đủ thông tin S3 API', null);
        }


    }

    // Set or apply setting
    private function setSetting($key, $value){
        $setting = Setting::where('name', $key)->first();

        if ($setting == null){
            $setting = new Setting();
            $setting->name = $key;
            $setting->value = $value;
            $setting->save();
            return;
        }

        $setting->value = $value;
        $setting->save();
    }

    public function getStorageTypeSetting()
    {
        $setting = Setting::where('name', 'storage_type')->first();
        if ($setting == null)
            return $this->getJsonResponse(true, 'OK', 's3');

        return $this->getJsonResponse(true, 'OK', $setting->value);
    }

}
