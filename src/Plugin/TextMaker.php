<?php

namespace Ispahbod\BotFather\Plugin;

class TextMaker
{
    
    public static function persianNumbers($string): string
    {
        $persianNumbers = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $englishNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($persianNumbers, $englishNumbers, $string);
    }

    public static function englishNumbers($string): string
    {
        $englishNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $persianNumbers = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        return str_replace($englishNumbers, $persianNumbers, $string);
    }

    public static function truncate($string, $maxChars, $ellipsis = '...'): string
    {
        if ($maxChars < 1) {
            return '';
        }
        $textLength = mb_strlen($string, 'utf-8');
        if ($textLength <= $maxChars) {
            return $string;
        }
        $truncatedText = mb_substr($string, 0, $maxChars, 'utf-8');
        $truncatedText = rtrim($truncatedText);
        $truncatedText .= $ellipsis;
        return $truncatedText;
    }

    public static function random($array): string
    {
        return $array[array_rand($array)];
    }

    public static function newLine(): string
    {
        return "\n";
    }

    public static function newDoubleLine(): string
    {
        return "\n\n";
    }

    public static function multiLine($array): string
    {
        return implode("\n", $array);
    }

    public static function repeat($text, $number): string
    {
        return str_repeat($text, $number);
    }

    public static function repeatLine(string $text, $number): string
    {
        $output = '';
        for ($i = 1; $i <= $number; $i++) {
            $output .= ($i === $number) ? $text : $text . "\n";
        }
        return $output;
    }

    public static function line(...$string): string
    {
        return implode(' ', $string) . "\n";
    }

    public static function lineLn(...$string): string
    {
        return implode(' ', $string) . "\n\n";
    }

    public static function lineBln(...$string): string
    {
        return "\n" . implode(' ', $string) . "\n";
    }

    public static function text(...$string): string
    {
        return implode(' ', $string);
    }
    public static function empty(): string
    {
        return '';
    }

    public static function each(array $array, $callble, ?int $count = null): string
    {
        $array = array_map($callble, $array);
        if ($count !== null) {
            $array = array_slice($array, 0, $count);
        }
        return implode(' ', $array);
    }

    public static function bold(...$string): string
    {
        $string = implode(' ', $string);
        return "<b>$string</b>";
    }

    public static function italic(...$string): string
    {
        $string = implode(' ', $string);
        return "<i>$string</i>";
    }

    public static function underline(...$string): string
    {
        $string = implode(' ', $string);
        return "<u>$string</u>";
    }

    public static function strike(...$string): string
    {
        $string = implode(' ', $string);
        return "<strike>$string</strike>";
    }

    public static function spoiler(...$string): string
    {
        $string = implode(' ', $string);
        return "<tg-spoiler>$string</tg-spoiler>";
    }

    public static function link(string $string, string $href): string
    {
        $string = is_array($string) ? implode(' ', $string) : $string;
        $href = urldecode($href);
        return "<a href='$href'>$string</a>";
    }

    public static function emoji($string, $emojiId): string
    {
        return "<tg-emoji emoji-id='$emojiId'>$string</tg-emoji>";
    }

    public static function code($string, $language = ''): string
    {
        return "<code class='language-$language'>$string</code>";
    }

    public static function pre(...$string): string
    {
        $string = implode(' ', $string);
        return "<pre>$string</pre>";
    }

    public static function blockquote(...$string): string
    {
        $string = implode(' ', $string);
        return "<blockquote>$string</blockquote>";
    }

    public static function make($array): string
    {
        return implode('', $array);
    }

    public static function sortByLength($array): string
    {
        usort($array, function ($a, $b) {
            $textA = strip_tags($a);
            $textB = strip_tags($b);
            return strlen($textA) <=> strlen($textB);
        });
        return self::Make($array);
    }

    public static function shuffle($array): string
    {
        shuffle($array);
        return self::Make($array);
    }

    public static function capitalizeFirstLetter($text): string
    {
        return strip_tags(ucfirst($text));
    }

    public static function conditional(bool $condition, string $if, $else = null)
    {
        return $condition ? $if : $else;
    }
    public static function generateUserLink(int $userId): string
    {
        return "tg://user?id=$userId";
    }
    public static function generateNameForUser(?string $firstName, ?string $lastName, ?string $username, ?int $userId): string
    {
        if (!empty($firstName)) {
            return "$firstName $lastName";
        } elseif (!empty($username)) {
            return $username;
        } else {
            return (string)$userId;
        }
    }
    public static function generateTelegramLink(string $username, ?int $messageId = null): string
    {
        if ($messageId !== null) {
            return "https://t.me/$username/$messageId";
        }
        return "https://t.me/$username";
    }
    public static function generateInviteLink(string $username, string $parameter): string
    {
        return "https://telegram.me/share/url?url=https://t.me/$username?start=$parameter";
    }
    public static function generateTelegraphLink(string $path): string
    {
        return "https://telegra.ph/$path";
    }

    public static function conditionalText(bool $condition, string $trueText, string $falseText): string
    {
        return $condition ? $trueText : $falseText;
    }
    public static function generateFileLink(string $token, string $filePath): string
    {
        return "https://api.telegram.org/file/bot$token/$filePath";
    }
}