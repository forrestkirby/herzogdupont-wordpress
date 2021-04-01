<?php

/**
 * Herzog Dupont
 *
 * @package           Herzog Dupont
 * @author            Thomas Weidlich https://herzog-dupont.de
 * @copyright         Copyright (C) Thomas Weidlich
 * @license           GNU General Public License version 3, see LICENSE.txt
 *
 */

// If this file is not called by WordPress, die.
if ( !defined( 'WPINC' ) )
	die;

class Herzogdupont_Loader {

    // The array of actions registered with WordPress.
    protected $actions;

    // The array of filters registered with WordPress.
    protected $filters;

    // Initialize the collections used to maintain the actions and filters.
    public function __construct() {
        $this->actions = array();
        $this->filters = array();
    }

    // Add a new action to the collection to be registered with WordPress.
    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
    }

    // Add a new filter to the collection to be registered with WordPress.
    public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
    }

    // A utility function that is used to register the actions and hooks into a single collection.
    private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

        $hooks[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args
        );

        return $hooks;

    }

    // Register the filters and actions with WordPress.
    public function run() {
        foreach ( $this->filters as $hook ) {
            add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
        }
        foreach ( $this->actions as $hook ) {
            add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
        }
    }

}
