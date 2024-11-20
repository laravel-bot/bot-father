<?php

namespace Ispahbod\BotFather\Plugin;

class TextBuilder
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public static function create($text)
    {
        return new self($text);
    }

    public function line($line)
    {
        $this->text .= "\n" . $line;
        return $this;
    }

    public function bold($text)
    {
        $this->text .= "<b>$text</b>";
        return $this;
    }

    public function italic($text)
    {
        $this->text .= "<i>$text</i>";
        return $this;
    }

    public function underline($text)
    {
        $this->text .= "<u>$text</u>";
        return $this;
    }

    public function strikethrough($text)
    {
        $this->text .= "<s>$text</s>";
        return $this;
    }

    public function spoiler($text)
    {
        $this->text .= "<tg-spoiler>$text</tg-spoiler>";
        return $this;
    }

    public function inlineUrl($text, $url)
    {
        $this->text .= "<a href=\"$url\">$text</a>";
        return $this;
    }

    public function inlineMention($text, $userId)
    {
        $this->text .= "<a href=\"tg://user?id=$userId\">$text</a>";
        return $this;
    }

    public function emoji($text, $emojiId)
    {
        $this->text .= "<tg-emoji emoji-id=\"$emojiId\">$text</tg-emoji>";
        return $this;
    }

    public function inlineCode($text)
    {
        $this->text .= "<code>$text</code>";
        return $this;
    }

    public function preformattedCode($text)
    {
        $this->text .= "<pre>$text</pre>";
        return $this;
    }

    public function preformattedCodeWithLanguage($text, $language)
    {
        $this->text .= "<pre><code class=\"language-$language\">$text</code></pre>";
        return $this;
    }

    public function blockquote($text)
    {
        $this->text .= "<blockquote>$text</blockquote>";
        return $this;
    }

    public function expandableBlockquote($text)
    {
        $this->text .= "<blockquote expandable>$text</blockquote>";
        return $this;
    }

    public function retrieveText()
    {
        return $this->text;
    }
}