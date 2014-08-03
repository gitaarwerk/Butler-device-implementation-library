<?php

namespace Framework\Core;

/**
 * Class CoreFunctions
 * @package Framework\Core
 */
class CoreFunctions
    extends \Framework\Defaults\DefaultClass
{

    /**
     * @param $url
     * @return string
     */
    public static function cleanURI($url)
    {
        $url = trim(rawurldecode($url));

        return $url;
    }

    /**
     * @param $value
     * @return array|string
     */
    private static function stripSlashesDeep($value)
    {
        $value = is_array($value) ? array_map("stripSlashesDeep", $value) : stripslashes($value);

        return $value;
    }

    /**
     *
     */
    public static function removeMagicQuotes()
    {
        if (get_magic_quotes_gpc() === true)
        {
            $_GET = self::stripSlashesDeep($_GET);
            $_POST = self::stripSlashesDeep($_POST);
            $_COOKIE = self::stripSlashesDeep($_COOKIE);
        }
    }

    /**
     *
     */
    public static function unregisterGlobals()
    {
        if (ini_get('register_globals'))
        {
            $global_functions = array(
                '_SESSION',
                '_POST',
                '_GET',
                '_COOKIE',
                '_REQUEST',
                '_SERVER',
                '_ENV',
                '_FILES'
            );

            foreach ($global_functions as $value)
            {
                foreach ($GLOBALS[$value] as $key => $var)
                {
                    if ($var === $GLOBALS[$key])
                    {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
}