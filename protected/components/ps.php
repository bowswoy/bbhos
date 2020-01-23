<?php
class ps
{
    public static function subStr($text, $length = 60)
    {
        $text = str_replace('&nbsp;', '', $text);
        $text_cut = mb_substr($text, 0, $length, "utf-8");
        $strlen = mb_strlen($text, "utf-8");
        if ($strlen > $length) {
            $text_cut = $text_cut . '...';
        }
        return str_replace("\r\n", " ", $text_cut);
    }

    public static function dateOut($date, $date_format = 'medium', $time_format = 'short')
    {
        if ($date == '0000-00-00 00:00:00' || $date == '')
            return '-';

        $date = Yii::app()->dateFormatter->formatDateTime($date, $date_format, $time_format);
        $language = strtolower(Yii::app()->language);
        if ($language == 'en') {
            return $date;
        }
        $chk = explode(', ', $date);
        if (count($chk) > 1) {
            $temp = str_replace(substr($chk[0], -4), ((int) substr($chk[0], -4) + 543), $chk[0]);
            $temp = str_replace('ค.ศ.', 'พ.ศ.', $temp);

            $temp .= ' ' . $chk[1] . ' น.';
        } else {
            $temp = str_replace(substr($date, -4), (substr($date, -4) + 543), $date);
            $temp = str_replace('ค.ศ.', 'พ.ศ.', $temp);
        }
        return $temp;
    }

    public static function getNewsFromCategory($category_id = 0, $limit = 4)
    {
        $news = News::model()->findAll(array(
            'condition' => 'n_status = 1 AND c_id = :cid',
            'params' => array('cid' => $category_id),
            'order' => 'n_ispin DESC, n_id DESC',
            'limit' => $limit
        ));

        return $news;
    }

    public static function validUrl($url = '') {
        $url = strip_tags($url);
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }

        return false;
    }
}
