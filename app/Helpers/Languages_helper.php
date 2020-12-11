<?php
if (!function_exists('display')) {
    function display($text = null)
    {
        $db = db_connect('default');
        $session = session();
        $table = 'languages';
        $phrase = 'phrase';
        $user_id = $session->get('user_id');
        if (!empty($user_id)) {
            $default_lang = 'english';
            $setting_table = 'user_registration';
            $data = $db->table($setting_table)->where('user_id', $user_id)->get()->getRow();
        } else {
            $default_lang = 'turkish';
            $setting_table = 'languages';
            $data = $db->table($setting_table)->get()->getRow();
        }
        if (!empty($data->languages)) {
            $language = $data->languages;
        } else {
            $language = $default_lang;
        }
        if (!empty($text)) {
            if ($db->tableExists($table)) {
                if ($db->fieldExists($phrase, $table)) {
                    if ($db->fieldExists($language, $table)) {
                        $row = $db->table($table)->select($language)
                            ->where($phrase, $text)
                            ->get()
                            ->getRow();
                        if (!empty($row->$language)) {
                            return $row->$language;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
