<?php

namespace Pms\Api;

class Application {

    protected static $app;

    public static function &build($app = null)
    {
        if (!self::$app) {
            if ($app == null) {
                self::$app = new \Silex\Application();
            }
            else {
                self::$app = $app;
            }
        }
        return self::$app;
    }

}
