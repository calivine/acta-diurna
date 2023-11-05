<?php


namespace App\Services;

use App\Exceptions\RejectTags;
use Log;

class Formatter
{

    public static function title($filename)
    {
        $output = preg_replace('/_/', ' ', $filename);
        $output = preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $output);
        $output = preg_replace('/\s+/', ' ', $output);
        $output = preg_replace('/^\s/', '', $output);
        $output = preg_replace('/&/', 'and', $output);
        $output = preg_replace('/\s-\s\s?/', ' ', $output);
        return $output;
    }

    public static function tokenize($filename)
    {

        Log::channel('upload')->info($filename);
        $words = explode(' ', $filename);

        // Convert to lower case for all words.
        // remove any common words from the list.
        $lower_case = array_map('strtolower', $words);

        return array_filter($lower_case, function ($word) {
            return RejectTags::check($word);
        });
    }

    public static function format($string)
    {
        if (Formatter::check_prefix($string) && Formatter::check_suffix($string) ) {
            $string = preg_replace('/^(montage[0-9a-zA-Z]*_[0-9a-z]*_?-?)/', '', $string);

            $string = preg_replace('/-([a-zA-Z0-9]+)$/', '', $string);

        }
        else {
            $string = preg_replace('/^(montage[0-9a-zA-Z]*_[0-9a-z]*_?-?)/', '', $string);

        }
        $string = Formatter::replace_hyphen(Formatter::replace_and($string));
        $string = Formatter::serialize($string);
        return preg_replace('/[\'\.()\d]+/', '', $string);
    }

    private static function check_prefix($string)
    {
        return preg_match('/^montage[0-9a-zA-Z]*_[0-9a-z]*_?-?/', $string);
    }

    private static function check_suffix($string)
    {
        return preg_match('/-[a-zA-Z0-9]+$/', $string);
    }

    public static function file_extension($string)
    {
        preg_match('/\.?mp4|wav|avi|webm$/', $string, $output);
        return $output[0];
    }

    private static function replace_hyphen($string)
    {
        return preg_replace('/-/', ' ', $string);
    }

    private static function replace_and($string)
    {
        return preg_replace('/&/', 'and', $string);
    }

    /**
     * serialize
     * format filename into string with spaces replaced by underscores
     * @param $string
     * @return $string
     */
    private static function serialize($string)
    {
        return preg_replace('/\s\s?/', '_', $string);
    }

    /**
     * insert_spaces
     * replaces underscores with white space
     * @param $string
     * @return string|string[]|null
     */
    public static function insert_spaces($string)
    {
        return preg_replace('/_+/', ' ', $string);
    }

    /**
     * search and replace [url=]Text[/url]
     * with anchor tags.
     * @param $string
     * @return string
     */
    public static function url_shortcode(String $text): String
    {
        return preg_replace_callback(
            '/\[url=(.*?)\](.*?)\[\/url\]/',
            function ($matches) {
                return '<a href="'. $matches[1] .'">'. $matches[2] .'</a>';
            },
            $text
        );
    }

}
