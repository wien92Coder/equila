<?php


namespace Eqila_Theme\Inc\Traits;

trait Singleton {
    public function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public function __clone()
    {
        throw new \Exception('Not implemented');
    }

    final public static function get_instance() {
        static $instance = [];

        $called_class = get_called_class();

        if ( !isset( $instance[ $called_class ] ) ) {
            $instance[ $called_class ] = new $called_class();

            do_action( sprintf( 'equila_theme_singleton_init%s', $called_class ) );
        }

        return $instance[ $called_class ];
    }
}