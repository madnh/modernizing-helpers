<?php
/**
 * | String helpers
 * |--------------------------------------------------------------------------
 */

if (!function_exists('str_after')) {
    /**
     * Return the remainder of a string after a given value.
     *
     * @param  string $subject
     * @param  string $search
     *
     * @return string
     */
    function str_after($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }

        $array_reversed = array_reverse(explode($search, $subject, 2));

        return $array_reversed[0];
    }
}
if (!function_exists('str_chars_array')) {
    /**
     * Returns the replacements for the ascii method.
     *
     * Note: Adapted from Stringy\Stringy.
     *
     * @see https://github.com/danielstjules/Stringy/blob/3.1.0/LICENSE.txt
     *
     * @return array
     */
    function str_chars_array()
    {
        static $charsArray;

        if (isset($charsArray)) {
            return $charsArray;
        }

        return $charsArray = array(
            '0' => array('°', '₀', '۰', '０'),
            '1' => array('¹', '₁', '۱', '１'),
            '2' => array('²', '₂', '۲', '２'),
            '3' => array('³', '₃', '۳', '３'),
            '4' => array('⁴', '₄', '۴', '٤', '４'),
            '5' => array('⁵', '₅', '۵', '٥', '５'),
            '6' => array('⁶', '₆', '۶', '٦', '６'),
            '7' => array('⁷', '₇', '۷', '７'),
            '8' => array('⁸', '₈', '۸', '８'),
            '9' => array('⁹', '₉', '۹', '９'),
            'a' => array('à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ā', 'ą', 'å', 'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ', 'ἇ', 'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ', 'ά', 'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ', 'အ', 'ာ', 'ါ', 'ǻ', 'ǎ', 'ª', 'ა', 'अ', 'ا', 'ａ', 'ä'),
            'b' => array('б', 'β', 'ب', 'ဗ', 'ბ', 'ｂ'),
            'c' => array('ç', 'ć', 'č', 'ĉ', 'ċ', 'ｃ'),
            'd' => array('ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ', 'д', 'δ', 'د', 'ض', 'ဍ', 'ဒ', 'დ', 'ｄ'),
            'e' => array('é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ', 'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э', 'є', 'ə', 'ဧ', 'ေ', 'ဲ', 'ე', 'ए', 'إ', 'ئ', 'ｅ'),
            'f' => array('ф', 'φ', 'ف', 'ƒ', 'ფ', 'ｆ'),
            'g' => array('ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ဂ', 'გ', 'گ', 'ｇ'),
            'h' => array('ĥ', 'ħ', 'η', 'ή', 'ح', 'ه', 'ဟ', 'ှ', 'ჰ', 'ｈ'),
            'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į', 'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ', 'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ', 'ῗ', 'і', 'ї', 'и', 'ဣ', 'ိ', 'ီ', 'ည်', 'ǐ', 'ი', 'इ', 'ی', 'ｉ'),
            'j' => array('ĵ', 'ј', 'Ј', 'ჯ', 'ج', 'ｊ'),
            'k' => array('ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك', 'က', 'კ', 'ქ', 'ک', 'ｋ'),
            'l' => array('ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل', 'လ', 'ლ', 'ｌ'),
            'm' => array('м', 'μ', 'م', 'မ', 'მ', 'ｍ'),
            'n' => array('ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن', 'န', 'ნ', 'ｎ'),
            'o' => array('ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő', 'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό', 'о', 'و', 'θ', 'ို', 'ǒ', 'ǿ', 'º', 'ო', 'ओ', 'ｏ', 'ö'),
            'p' => array('п', 'π', 'ပ', 'პ', 'پ', 'ｐ'),
            'q' => array('ყ', 'ｑ'),
            'r' => array('ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر', 'რ', 'ｒ'),
            's' => array('ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص', 'စ', 'ſ', 'ს', 'ｓ'),
            't' => array('ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط', 'ဋ', 'တ', 'ŧ', 'თ', 'ტ', 'ｔ'),
            'u' => array('ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у', 'ဉ', 'ု', 'ူ', 'ǔ', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'უ', 'उ', 'ｕ', 'ў', 'ü'),
            'v' => array('в', 'ვ', 'ϐ', 'ｖ'),
            'w' => array('ŵ', 'ω', 'ώ', 'ဝ', 'ွ', 'ｗ'),
            'x' => array('χ', 'ξ', 'ｘ'),
            'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ', 'ϋ', 'ύ', 'ΰ', 'ي', 'ယ', 'ｙ'),
            'z' => array('ź', 'ž', 'ż', 'з', 'ζ', 'ز', 'ဇ', 'ზ', 'ｚ'),
            'aa' => array('ع', 'आ', 'آ'),
            'ae' => array('æ', 'ǽ'),
            'ai' => array('ऐ'),
            'ch' => array('ч', 'ჩ', 'ჭ', 'چ'),
            'dj' => array('ђ', 'đ'),
            'dz' => array('џ', 'ძ'),
            'ei' => array('ऍ'),
            'gh' => array('غ', 'ღ'),
            'ii' => array('ई'),
            'ij' => array('ĳ'),
            'kh' => array('х', 'خ', 'ხ'),
            'lj' => array('љ'),
            'nj' => array('њ'),
            'oe' => array('ö', 'œ', 'ؤ'),
            'oi' => array('ऑ'),
            'oii' => array('ऒ'),
            'ps' => array('ψ'),
            'sh' => array('ш', 'შ', 'ش'),
            'shch' => array('щ'),
            'ss' => array('ß'),
            'sx' => array('ŝ'),
            'th' => array('þ', 'ϑ', 'ث', 'ذ', 'ظ'),
            'ts' => array('ц', 'ც', 'წ'),
            'ue' => array('ü'),
            'uu' => array('ऊ'),
            'ya' => array('я'),
            'yu' => array('ю'),
            'zh' => array('ж', 'ჟ', 'ژ'),
            '(c)' => array('©'),
            'A' => array('Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Å', 'Ā', 'Ą', 'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ', 'Ἇ', 'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ', 'Ᾱ', 'Ὰ', 'Ά', 'ᾼ', 'А', 'Ǻ', 'Ǎ', 'Ａ', 'Ä'),
            'B' => array('Б', 'Β', 'ब', 'Ｂ'),
            'C' => array('Ç', 'Ć', 'Č', 'Ĉ', 'Ċ', 'Ｃ'),
            'D' => array('Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ', 'Ｄ'),
            'E' => array('É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ', 'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э', 'Є', 'Ə', 'Ｅ'),
            'F' => array('Ф', 'Φ', 'Ｆ'),
            'G' => array('Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ', 'Ｇ'),
            'H' => array('Η', 'Ή', 'Ħ', 'Ｈ'),
            'I' => array('Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į', 'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ', 'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї', 'Ǐ', 'ϒ', 'Ｉ'),
            'J' => array('Ｊ'),
            'K' => array('К', 'Κ', 'Ｋ'),
            'L' => array('Ĺ', 'Ł', 'Л', 'Λ', 'Ļ', 'Ľ', 'Ŀ', 'ल', 'Ｌ'),
            'M' => array('М', 'Μ', 'Ｍ'),
            'N' => array('Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν', 'Ｎ'),
            'O' => array('Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ø', 'Ō', 'Ő', 'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ', 'Ὸ', 'Ό', 'О', 'Θ', 'Ө', 'Ǒ', 'Ǿ', 'Ｏ', 'Ö'),
            'P' => array('П', 'Π', 'Ｐ'),
            'Q' => array('Ｑ'),
            'R' => array('Ř', 'Ŕ', 'Р', 'Ρ', 'Ŗ', 'Ｒ'),
            'S' => array('Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ', 'Ｓ'),
            'T' => array('Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ', 'Ｔ'),
            'U' => array('Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Û', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У', 'Ǔ', 'Ǖ', 'Ǘ', 'Ǚ', 'Ǜ', 'Ｕ', 'Ў', 'Ü'),
            'V' => array('В', 'Ｖ'),
            'W' => array('Ω', 'Ώ', 'Ŵ', 'Ｗ'),
            'X' => array('Χ', 'Ξ', 'Ｘ'),
            'Y' => array('Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ', 'Ы', 'Й', 'Υ', 'Ϋ', 'Ŷ', 'Ｙ'),
            'Z' => array('Ź', 'Ž', 'Ż', 'З', 'Ζ', 'Ｚ'),
            'AE' => array('Æ', 'Ǽ'),
            'Ch' => array('Ч'),
            'Dj' => array('Ђ'),
            'Dz' => array('Џ'),
            'Gx' => array('Ĝ'),
            'Hx' => array('Ĥ'),
            'Ij' => array('Ĳ'),
            'Jx' => array('Ĵ'),
            'Kh' => array('Х'),
            'Lj' => array('Љ'),
            'Nj' => array('Њ'),
            'Oe' => array('Œ'),
            'Ps' => array('Ψ'),
            'Sh' => array('Ш'),
            'Shch' => array('Щ'),
            'Ss' => array('ẞ'),
            'Th' => array('Þ'),
            'Ts' => array('Ц'),
            'Ya' => array('Я'),
            'Yu' => array('Ю'),
            'Zh' => array('Ж'),
            ' ' => array("\xC2\xA0", "\xE2\x80\x80", "\xE2\x80\x81", "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84", "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87", "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A", "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80", "\xEF\xBE\xA0"),
        );
    }
}
if (!function_exists('str_language_specific_chars_array')) {
    /**
     * Returns the language specific replacements for the ascii method.
     *
     * Note: Adapted from Stringy\Stringy.
     *
     * @see https://github.com/danielstjules/Stringy/blob/3.1.0/LICENSE.txt
     *
     * @param  string $language
     *
     * @return array|null
     */
    function str_language_specific_chars_array($language)
    {
        static $languageSpecific;

        if (!isset($languageSpecific)) {
            $languageSpecific = array(
                'bg' => array(
                    array('х', 'Х', 'щ', 'Щ', 'ъ', 'Ъ', 'ь', 'Ь'),
                    array('h', 'H', 'sht', 'SHT', 'a', 'А', 'y', 'Y'),
                ),
                'de' => array(
                    array('ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü'),
                    array('ae', 'oe', 'ue', 'AE', 'OE', 'UE')
                )
            );
        }

        return is_null($languageSpecific[$language]) ? $languageSpecific[$language] : null;
    }
}
if (!function_exists('str_ascii')) {
    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @param  string $value
     * @param  string $language
     *
     * @return string
     */
    function str_ascii($value, $language = 'en')
    {
        $languageSpecific = str_language_specific_chars_array($language);

        if (!is_null($languageSpecific)) {
            $value = str_replace($languageSpecific[0], $languageSpecific[1], $value);
        }

        foreach (str_chars_array() as $key => $val) {
            $value = str_replace($val, $key, $value);
        }

        return preg_replace('/[^\x20-\x7E]/u', '', $value);
    }
}
if (!function_exists('str_before')) {
    /**
     * Get the portion of a string before a given value.
     *
     * @param  string $subject
     * @param  string $search
     *
     * @return string
     */
    function str_before($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }

        $arr = explode($search, $subject);

        return $arr[0];
    }
}
if (!function_exists('str_camel')) {
    /**
     * Convert a value to camel case.
     *
     * @param  string $value
     *
     * @return string
     */
    function str_camel($value)
    {
        static $camelCache;

        if (is_array($camelCache)) {
            $camelCache = array();
        }
        if (isset($camelCache[$value])) {
            return $camelCache[$value];
        }

        return $camelCache[$value] = lcfirst(str_studly($value));
    }
}
if (!function_exists('str_contains')) {
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string       $haystack
     * @param  string|array $needles
     *
     * @return bool
     */
    function str_contains($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_ends_with')) {
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string       $haystack
     * @param  string|array $needles
     *
     * @return bool
     */
    function str_ends_with($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if (mb_substr($haystack, -mb_strlen($needle)) === (string)$needle) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_finish')) {
    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string $value
     * @param  string $cap
     *
     * @return string
     */
    function str_finish($value, $cap)
    {
        $quoted = preg_quote($cap, '/');

        return preg_replace('/(?:' . $quoted . ')+$/u', '', $value) . $cap;
    }
}
if (!function_exists('str_is')) {
    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string|array $pattern
     * @param  string       $value
     *
     * @return bool
     */
    function str_is($pattern, $value)
    {
        $patterns = is_array($pattern) ? $pattern : (array)$pattern;

        if (empty($patterns)) {
            return false;
        }

        foreach ($patterns as $pattern) {
            // If the given value is an exact match we can of course return true right
            // from the beginning. Otherwise, we will translate asterisks and do an
            // actual pattern match against the two strings to see if they match.
            if ($pattern == $value) {
                return true;
            }

            $pattern = preg_quote($pattern, '#');

            // Asterisks are translated into zero-or-more regular expression wildcards
            // to make it convenient to check if the strings starts with the given
            // pattern such as "library/*", making any string check convenient.
            $pattern = str_replace('\*', '.*', $pattern);

            if (preg_match('#^' . $pattern . '\z#u', $value) === 1) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_kebab')) {
    /**
     * Convert a string to kebab case.
     *
     * @param  string $value
     *
     * @return string
     */
    function str_kebab($value)
    {
        return str_snake($value, '-');
    }
}
if (!function_exists('str_length')) {
    /**
     * Return the length of the given string.
     *
     * @param  string $value
     * @param  string $encoding
     *
     * @return int
     */
    function str_length($value, $encoding = null)
    {
        if ($encoding) {
            return mb_strlen($value, $encoding);
        }

        return mb_strlen($value);
    }
}
if (!function_exists('str_limit')) {
    /**
     * Limit the number of characters in a string.
     *
     * @param  string $value
     * @param  int    $limit
     * @param  string $end
     *
     * @return string
     */
    function str_limit($value, $limit = 100, $end = '...')
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
    }
}
if (!function_exists('str_lower')) {
    /**
     * Convert the given string to lower-case.
     *
     * @param  string $value
     *
     * @return string
     */
    function str_lower($value)
    {
        return mb_strtolower($value, 'UTF-8');
    }
}
if (!function_exists('str_words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string $value
     * @param  int    $words
     * @param  string $end
     *
     * @return string
     */
    function str_words($value, $words = 100, $end = '...')
    {
        preg_match('/^\s*+(?:\S++\s*+){1,' . $words . '}/u', $value, $matches);

        if (!isset($matches[0]) || str_length($value) === str_length($matches[0])) {
            return $value;
        }

        return rtrim($matches[0]) . $end;
    }
}
if (!function_exists('str_random')) {
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int $length
     *
     * @return string
     */
    function str_random($length = 16)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}
if (!function_exists('str_replace_array')) {
    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param  string $search
     * @param  array  $replace
     * @param  string $subject
     *
     * @return string
     */
    function str_replace_array($search, array $replace, $subject)
    {
        foreach ($replace as $value) {
            $subject = str_replace_first($search, $value, $subject);
        }

        return $subject;
    }
}
if (!function_exists('str_replace_first')) {
    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string $search
     * @param  string $replace
     * @param  string $subject
     *
     * @return string
     */
    function str_replace_first($search, $replace, $subject)
    {
        if ($search == '') {
            return $subject;
        }

        $position = mb_strpos($subject, $search);

        if ($position !== false) {
            return mb_substr($subject, 0, $position) . $replace . mb_substr($subject, $position + mb_strlen($search));
        }

        return $subject;
    }
}
if (!function_exists('str_replace_last')) {
    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string $search
     * @param  string $replace
     * @param  string $subject
     *
     * @return string
     */
    function str_replace_last($search, $replace, $subject)
    {
        $position = mb_strrpos($subject, $search);

        if ($position !== false) {
            return mb_substr($subject, 0, $position) . $replace . mb_substr($subject, $position + mb_strlen($search));
        }

        return $subject;
    }
}
if (!function_exists('str_start')) {
    /**
     * Begin a string with a single instance of a given value.
     *
     * @param  string $value
     * @param  string $prefix
     *
     * @return string
     */
    function str_start($value, $prefix)
    {
        $quoted = preg_quote($prefix, '/');

        return $prefix . preg_replace('/^(?:' . $quoted . ')+/u', '', $value);
    }
}
if (!function_exists('str_upper')) {
    /**
     * Convert the given string to upper-case.
     *
     * @param  string $value
     *
     * @return string
     */
    function str_upper($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }
}
if (!function_exists('str_title')) {
    /**
     * Convert the given string to title case.
     *
     * @param  string $value
     *
     * @return string
     */
    function str_title($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }
}
if (!function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string $title
     * @param  string $separator
     * @param  string $language
     *
     * @return string
     */
    function str_slug($title, $separator = '-', $language = 'en')
    {
        $title = str_ascii($title, $language);

        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator . 'at' . $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}
if (!function_exists('str_snake')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string $value
     * @param  string $delimiter
     *
     * @return string
     */
    function str_snake($value, $delimiter = '_')
    {
        static $snakeCache;

        if (!is_array($snakeCache)) {
            $snakeCache = array();
        }

        $key = $value;

        if (isset($snakeCache[$key][$delimiter])) {
            return $snakeCache[$key][$delimiter];
        }

        if (!ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = str_lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
        }

        return $snakeCache[$key][$delimiter] = $value;
    }
}
if (!function_exists('str_starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string       $haystack
     * @param  string|array $needles
     *
     * @return bool
     */
    function str_starts_with($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && mb_substr($haystack, 0, mb_strlen($needle)) === (string)$needle) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_studly')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string $value
     *
     * @return string
     */
    function str_studly($value)
    {
        static $studlyCache;

        if (!is_array($studlyCache)) {
            $studlyCache = array();
        }

        $key = $value;

        if (isset($studlyCache[$key])) {
            return $studlyCache[$key];
        }

        $value = ucwords(str_replace(array('-', '_'), ' ', $value));

        return $studlyCache[$key] = str_replace(' ', '', $value);
    }
}
if (!function_exists('str_substr')) {
    /**
     * Returns the portion of string specified by the start and length parameters.
     *
     * @param  string   $string
     * @param  int      $start
     * @param  int|null $length
     *
     * @return string
     */
    function str_substr($string, $start, $length = null)
    {
        return mb_substr($string, $start, $length, 'UTF-8');
    }
}
if (!function_exists('str_ucfirst')) {
    /**
     * Make a string's first character uppercase.
     *
     * @param  string $string
     *
     * @return string
     */
    function str_ucfirst($string)
    {
        return str_upper(str_substr($string, 0, 1)) . str_substr($string, 1);
    }
}


/**
 * | Array helpers
 * |--------------------------------------------------------------------------
 */

if (!function_exists('array_first_item')) {
    /**
     * Get the first element of an array. Useful for method chaining.
     *
     * @param  array $array
     *
     * @return mixed
     */
    function array_first_item($array)
    {
        return reset($array);
    }
}
if (!function_exists('array_last_item')) {
    /**
     * Get the last element from an array.
     *
     * @param  array $array
     *
     * @return mixed
     */
    function array_last_item($array)
    {
        return end($array);
    }
}
if (!function_exists('array_is_accessible')) {
    /**
     * Determine whether the given value is array accessible.
     *
     * @param  mixed $value
     *
     * @return bool
     */
    function array_is_accessible($value)
    {
        return is_array($value) || $value instanceof \ArrayAccess;
    }
}
if (!function_exists('array_add')) {
    /**
     * Add an element to an array using "dot" notation if it doesn't exist.
     *
     * @param  array  $array
     * @param  string $key
     * @param  mixed  $value
     *
     * @return array
     */
    function array_add($array, $key, $value)
    {
        if (is_null(array_get($array, $key))) {
            array_set($array, $key, $value);
        }

        return $array;
    }
}
if (!function_exists('array_collapse')) {
    /**
     * Collapse an array of arrays into a single array.
     *
     * @param  array $array
     *
     * @return array
     */
    function array_collapse($array)
    {
        $results = array();

        foreach ($array as $values) {
            if (!is_array($values)) {
                continue;
            }

            $results = array_merge($results, $values);
        }

        return $results;
    }
}
if (!function_exists('array_cross_join')) {
    /**
     * Cross join the given arrays, returning all possible permutations.
     *
     * @param  array $arrays
     *
     * @return array
     */
    function array_cross_join($arrays = array())
    {
        $arrays = func_get_args();
        $results = array(array());

        foreach ($arrays as $index => $array) {
            $append = array();

            foreach ($results as $product) {
                foreach ($array as $item) {
                    $product[$index] = $item;

                    $append[] = $product;
                }
            }

            $results = $append;
        }

        return $results;
    }
}
if (!function_exists('array_divide')) {
    /**
     * Divide an array into two arrays. One with keys and the other with values.
     *
     * @param  array $array
     *
     * @return array
     */
    function array_divide($array)
    {
        return array(array_keys($array), array_values($array));
    }
}
if (!function_exists('array_dot')) {
    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  array  $array
     * @param  string $prepend
     *
     * @return array
     */
    function array_dot($array, $prepend = '')
    {
        $results = array();

        foreach ($array as $key => $value) {
            if (is_array($value) && !empty($value)) {
                $results = array_merge($results, array_dot($value, $prepend . $key . '.'));
            } else {
                $results[$prepend . $key] = $value;
            }
        }

        return $results;
    }
}
if (!function_exists('array_except')) {
    /**
     * Get all of the given array except for a specified array of items.
     *
     * @param  array        $array
     * @param  array|string $keys
     *
     * @return array
     */
    function array_except($array, $keys)
    {
        array_forget($array, $keys);

        return $array;
    }
}
if (!function_exists('array_exists')) {
    /**
     * Determine if the given key exists in the provided array.
     *
     * @param  \ArrayAccess|array $array
     * @param  string|int         $key
     *
     * @return bool
     */
    function array_exists($array, $key)
    {
        if ($array instanceof \ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }
}
if (!function_exists('array_first')) {
    /**
     * Return the first element in an array passing a given truth test.
     *
     * @param  array         $array
     * @param  callable|null $callback
     * @param  mixed         $default
     *
     * @return mixed
     */
    function array_first($array, $callback = null, $default = null)
    {
        if (is_null($callback)) {
            if (empty($array)) {
                return $default;
            }

            foreach ($array as $item) {
                return $item;
            }
        }

        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                return $value;
            }
        }

        return $default;
    }
}
if (!function_exists('array_last')) {
    /**
     * Return the last element in an array passing a given truth test.
     *
     * @param  array         $array
     * @param  callable|null $callback
     * @param  mixed         $default
     *
     * @return mixed
     */
    function array_last($array, $callback = null, $default = null)
    {
        if (is_null($callback)) {
            return empty($array) ? $default : end($array);
        }

        return array_first(array_reverse($array, true), $callback, $default);
    }
}
if (!function_exists('array_flatten')) {
    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  array $array
     * @param  int   $depth
     *
     * @return array
     */
    function array_flatten($array, $depth = INF)
    {
        return array_reduce($array, function ($result, $item) use ($depth) {
            if (!is_array($item)) {
                return array_merge($result, array($item));
            } elseif ($depth === 1) {
                return array_merge($result, array_values($item));
            } else {
                return array_merge($result, array_flatten($item, $depth - 1));
            }
        }, array());
    }
}
if (!function_exists('array_forget')) {
    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param  array        $array
     * @param  array|string $keys
     *
     * @return void
     */
    function array_forget(&$array, $keys)
    {
        $original = &$array;

        $keys = (array)$keys;

        if (count($keys) === 0) {
            return;
        }

        foreach ($keys as $key) {
            // if the exact key exists in the top-level, remove it
            if (array_exists($array, $key)) {
                unset($array[$key]);

                continue;
            }

            $parts = explode('.', $key);

            // clean up before each pass
            $array = &$original;

            while (count($parts) > 1) {
                $part = array_shift($parts);

                if (isset($array[$part]) && is_array($array[$part])) {
                    $array = &$array[$part];
                } else {
                    continue 2;
                }
            }

            unset($array[array_shift($parts)]);
        }
    }
}
if (!function_exists('array_get')) {
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  \ArrayAccess|array $array
     * @param  string             $key
     * @param  mixed              $default
     *
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        if (!array_is_accessible($array)) {
            return $default;
        }

        if (is_null($key)) {
            return $array;
        }

        if (array_exists($array, $key)) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return isset($array[$key]) ? $array[$key] : $default;
        }

        foreach (explode('.', $key) as $segment) {
            if (array_is_accessible($array) && array_exists($array, $segment)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }
}
if (!function_exists('array_has')) {
    /**
     * Check if an item or items exist in an array using "dot" notation.
     *
     * @param  \ArrayAccess|array $array
     * @param  string|array       $keys
     *
     * @return bool
     */
    function array_has($array, $keys)
    {
        if (is_null($keys)) {
            return false;
        }

        $keys = (array)$keys;

        if (!$array) {
            return false;
        }

        if ($keys === array()) {
            return false;
        }

        foreach ($keys as $key) {
            $subKeyArray = $array;

            if (array_exists($array, $key)) {
                continue;
            }

            foreach (explode('.', $key) as $segment) {
                if (array_is_accessible($subKeyArray) && array_exists($subKeyArray, $segment)) {
                    $subKeyArray = $subKeyArray[$segment];
                } else {
                    return false;
                }
            }
        }

        return true;
    }

}
if (!function_exists('array_is_assoc')) {
    /**
     * Determines if an array is associative.
     *
     * An array is "associative" if it doesn't have sequential numerical keys beginning with zero.
     *
     * @param  array $array
     *
     * @return bool
     */
    function array_is_assoc(array $array)
    {
        $keys = array_keys($array);

        return array_keys($keys) !== $keys;
    }
}
if (!function_exists('array_only')) {
    /**
     * Get a subset of the items from the given array.
     *
     * @param  array        $array
     * @param  array|string $keys
     *
     * @return array
     */
    function array_only($array, $keys)
    {
        return array_intersect_key($array, array_flip((array)$keys));
    }
}
if (!function_exists('array_pluck')) {
    /**
     * Pluck an array of values from an array.
     *
     * @param array[]      $array Multi direction array
     * @param array|string $valueField
     * @param array|string $keyField
     *
     * @return array
     */
    function array_pluck($array, $valueField, $keyField = null)
    {
        $result = array();

        if (is_array($valueField)) {
            $valueField = implode('.', $valueField);
        }
        if (is_array($keyField)) {
            $keyField = implode('.', $keyField);
        }

        foreach ($array as $item) {
            if ($keyField && !array_has($item, $keyField)) {
                continue;
            }

            if (is_null($valueField)) {
                $value = $item;
            } else if (!array_has($item, $valueField)) {
                continue;
            }else{
                $value = array_get($item, $valueField);
            }

            if ($keyField) {
                $result[array_get($item, $keyField)] = $value;
            } else {
                $result[] = $value;
            }
        }

        return $result;
    }
}
if (!function_exists('array_prepend')) {
    /**
     * Push an item onto the beginning of an array.
     *
     * @param  array $array
     * @param  mixed $value
     * @param  mixed $key
     *
     * @return array
     */
    function array_prepend($array, $value, $key = null)
    {
        if (is_null($key)) {
            array_unshift($array, $value);
        } else {
            $array = array($key => $value) + $array;
        }

        return $array;
    }
}
if (!function_exists('array_pull')) {
    /**
     * Get a value from the array, and remove it.
     *
     * @param  array  $array
     * @param  string $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    function array_pull(&$array, $key, $default = null)
    {
        $value = array_get($array, $key, $default);

        array_forget($array, $key);

        return $value;
    }
}
if (!function_exists('array_random')) {
    /**
     * Get one or a specified number of random values from an array.
     *
     * @param  array    $array
     * @param  int|null $number
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    function array_random($array, $number = null)
    {
        $requested = is_null($number) ? 1 : $number;

        $count = count($array);

        if ($requested > $count) {
            throw new \InvalidArgumentException(
                "You requested {$requested} items, but there are only {$count} items available."
            );
        }

        if (is_null($number)) {
            return $array[array_rand($array)];
        }

        if ((int)$number === 0) {
            return array();
        }

        $keys = array_rand($array, $number);

        $results = array();

        foreach ((array)$keys as $key) {
            $results[] = $array[$key];
        }

        return $results;
    }
}
if (!function_exists('array_set')) {
    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param  array  $array
     * @param  string $key
     * @param  mixed  $value
     *
     * @return array
     */
    function array_set(&$array, $key, $value)
    {
        if (is_null($key)) {
            return $array = $value;
        }

        $keys = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            // If the key doesn't exist at this depth, we will just create an empty array
            // to hold the next value, allowing us to create the arrays to hold final
            // values at the correct depth. Then we'll keep digging into the array.
            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = array();
            }

            $array = &$array[$key];
        }

        $array[array_shift($keys)] = $value;

        return $array;
    }
}
if (!function_exists('array_shuffle')) {
    /**
     * Shuffle the given array and return the result.
     *
     * @param  array $array
     *
     * @return array
     */
    function array_shuffle($array)
    {
        shuffle($array);

        return $array;
    }
}
if (!function_exists('array_sort_recursive')) {
    /**
     * Recursively sort an array by keys and values.
     *
     * @param  array $array
     *
     * @return array
     */
    function array_sort_recursive($array)
    {
        foreach ($array as &$value) {
            if (is_array($value)) {
                $value = array_sort_recursive($value);
            }
        }

        if (array_is_assoc($array)) {
            ksort($array);
        } else {
            sort($array);
        }

        return $array;
    }
}
if (!function_exists('array_where')) {
    /**
     * Filter the array using the given callback.
     *
     * @param  array    $array
     * @param  callable $callback
     *
     * @return array
     */
    function array_where($array, $callback)
    {
        if(version_compare(PHP_VERSION, '5.6.0') >= 0){
            return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
        }

        return array_filter($array, $callback);
    }
}
if (!function_exists('array_wrap')) {
    /**
     * If the given value is not an array, wrap it in one.
     *
     * @param  mixed $value
     *
     * @return array
     */
    function array_wrap($value)
    {
        return !is_array($value) ? array($value) : $value;
    }
}
if (!function_exists('array_key_by')) {
    /**
     * Re-index array with item field value
     *
     * @param array  $array
     * @param string $keyField Array field name
     *
     * @return array
     */
    function array_key_by($array, $keyField)
    {
        $result = array();

        foreach ($array as $item) {
            if (!array_key_exists($keyField, $item))
                continue;

            $result[$item[$keyField]] = $item;
        }

        return $result;
    }
}
if (!function_exists('array_group_by')) {
    /**
     * Group array items by it's a field value
     *
     * @param array  $array
     * @param string $groupByKey
     * @param bool   $reserve_key
     *
     * @return array
     * @throws Exception All array's items must be is an array
     */
    function array_group_by($array, $groupByKey, $reserve_key = true)
    {
        $result = array();

        foreach ($array as $key => $item) {
            if (!is_array($item)) {
                throw new Exception('Array item must be an array');
            }
            if (!array_key_exists($groupByKey, $item)) {
                continue;
            }

            $groupValue = $item[$groupByKey];

            if (!array_key_exists($groupValue, $result)) {
                $result[$groupValue] = array();
            }

            if ($reserve_key) {
                $result[$groupValue][$key] = $item;
            } else {
                $result[$groupValue][] = $item;
            }
        }

        return $result;
    }
}


/**
 * | Others helpers
 * |--------------------------------------------------------------------------
 */

if (!function_exists('is_php_version_from_5_3')) {
    function is_php_version_from_5_3()
    {
        static $checked;

        if (is_bool($checked)) {
            return $checked;
        }

        return $checked = (version_compare(PHP_VERSION, '5.3.0') >= 0);
    }
}
if (!function_exists('is_blank')) {
    /**
     * Determine if the given value is "blank".
     *
     * @param  mixed $value
     *
     * @return bool
     */
    function is_blank($value)
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if (is_php_version_from_5_3() ? ($value instanceof \Countable) : ($value instanceof Countable)) {
            return count($value) === 0;
        }

        return empty($value);
    }
}
if (!function_exists('class_basename')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object $class
     *
     * @return string
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}
if (!function_exists('escape_html')) {
    /**
     * Escape HTML special characters in a string.
     *
     * @param string $value
     *
     * @return string
     */
    function escape_html($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
}
if (!function_exists('object_get')) {
    /**
     * Get an item from an object using "dot" notation.
     *
     * @param  object $object
     * @param  string $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) == '') {
            return $object;
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_object($object) || !isset($object->{$segment})) {
                return $default;
            }

            $object = $object->{$segment};
        }

        return $object;
    }
}
if (!function_exists('preg_replace_array')) {
    /**
     * Replace a given pattern with each value in the array in sequentially.
     *
     * @param  string $pattern
     * @param  array  $replacements
     * @param  string $subject
     *
     * @return string
     */
    function preg_replace_array($pattern, array $replacements, $subject)
    {
        return preg_replace_callback($pattern, function () use (&$replacements) {
            foreach ($replacements as $key => $value) {
                return array_shift($replacements);
            }
        }, $subject);
    }
}
if (!function_exists('retry')) {
    /**
     * Retry an operation a given number of times.
     *
     * @param  int      $times
     * @param  callable $callback
     * @param  int      $sleep
     *
     * @return mixed
     *
     * @throws \Exception
     */
    function retry($times, callable $callback, $sleep = 0)
    {
        $times--;

        beginning:
        try {
            return $callback();
        } catch (Exception $e) {
            if (!$times) {
                throw $e;
            }

            $times--;

            if ($sleep) {
                usleep($sleep * 1000);
            }

            goto beginning;
        }
    }
}
if (!function_exists('create_class_dynamic')) {
    /**
     * @param string $class Class name
     * @param array  $parameters
     *
     * @return object
     */
    function create_class_dynamic($class, $parameters = array())
    {
        if (is_php_version_from_5_3()) {
            $reflection = new \ReflectionClass($class);
        } else {
            $reflection = new ReflectionClass($class);
        }

        return $reflection->newInstanceArgs($parameters);
    }
}
if (!function_exists('throw_if')) {
    /**
     * Throw the given exception if the given boolean is true.
     *
     * @param  bool              $boolean
     * @param  \Throwable|string $exception \Throwable instance or \Throwable class name
     * @param  array             $parameters
     *
     * @return void
     * @throws Throwable
     */
    function throw_if($boolean, $exception, $parameters = array())
    {
        if ($boolean) {
            if (is_string($exception)) {
                $exception = create_class_dynamic($exception, $parameters);
            }

            throw $exception;
        }
    }
}
if (!function_exists('throw_unless')) {
    /**
     * Throw the given exception unless the given boolean is true.
     *
     * @param  bool              $boolean
     * @param  \Throwable|string $exception \Throwable instance or \Throwable class name
     * @param  array             $parameters
     *
     * @return void
     * @throws Throwable
     */
    function throw_unless($boolean, $exception, $parameters = array())
    {
        if (!$boolean) {
            if (is_string($exception)) {
                $exception = create_class_dynamic($exception, $parameters);
            }

            throw $exception;
        }
    }
}
if (!function_exists('transform_when_present')) {
    /**
     * Transform the given value if it is present.
     *
     * @param  mixed    $value
     * @param  callable $callback
     * @param  mixed    $default
     *
     * @return mixed|null
     */
    function transform_when_present($value, callable $callback, $default = null)
    {
        if (!is_blank($value)) {
            return $callback($value);
        }

        if (is_callable($default)) {
            return $default($value);
        }

        return $default;
    }
}
if (!function_exists('is_windows_os')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function is_windows_os()
    {
        return strtolower(substr(PHP_OS, 0, 3)) === 'win';
    }
}
if (!function_exists('with')) {
    /**
     * Return the given object. Useful for chaining.
     *
     * @param  mixed $object
     *
     * @return mixed
     */
    function with($object)
    {
        return $object;
    }
}