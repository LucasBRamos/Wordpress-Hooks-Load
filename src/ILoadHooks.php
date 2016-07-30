<?php namespace LucasBRamos\WordpressHooksLoad;

/**
 * @package LucasBRamos\WordpressHooksLoad
 */
interface ILoadHooks
{

  /**
   * @param $hook
   * @param $component
   * @param $callback
   * @param $priority
   * @param $accepted_args
   * @return mixed
     */
  public function add_action($hook, $component, $callback, $priority, $accepted_args);

  /**
   * @param $hook
   * @param $component
   * @param $callback
   * @param $priority
   * @param $accepted_args
   * @return mixed
     */
  public function add_filter($hook, $component, $callback, $priority, $accepted_args);

  /**
   * @param $hooks
   * @param $hook
   * @param $component
   * @param $callback
   * @param $priority
   * @param $accepted_args
   * @return mixed
     */
  public function add($hooks, $hook, $component, $callback, $priority, $accepted_args);

  /**
   * @return mixed
   */
  public function run();
}

