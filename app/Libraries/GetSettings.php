<?php namespace App\Libraries;

class GetSettings {
    public function getSettings($user_id, $explode_sport_autofill = false) {
        $settings_model = new \App\Models\Settings();
        $settings_entities = new \App\Entities\Settings();

        $settings = $settings_model->getSettingsByUserId($user_id);

        if ($settings == null):
            $settings = $settings_entities->attributes;
        else:
            $settings = $settings->toArray();
        endif;

        if ($explode_sport_autofill == true):
            $settings['sport_autofill'] = (explode("; ", $settings['sport_autofill']));
        endif;

        return $settings;
    }
}