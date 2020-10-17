<?php


namespace App\Services;

use App\Exceptions\RejectTags;


class Formatter
{

    public static function clean($filename)
    {
        // Video name clean-up, first pass
        $file_name = preg_replace('/-[a-zA-Z0-9]+$/', '', $filename);
        // Second pass
        $file_name = preg_replace('/^montage[0-9a-zA-Z]*_[0-9a-z]*_?-?/', '', $file_name);
        // Third pass
        return preg_replace('/[^a-zA-Z_]/', '', $file_name);
    }

    public static function title($filename)
    {
        $output = preg_replace('/_/', ' ', $filename);
        $output = preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $output);
        return preg_replace('/\s+/', ' ', $output);
    }

    public static function tokenize($filename)
    {
        $words = explode(" ", $filename);

        // Convert to lower case for all words.
        // remove any common words from the list.
        $lower_case = array_map('strtolower', $words);

        return array_filter($lower_case, function ($word) {
            return RejectTags::check($word);
        });
    }

}