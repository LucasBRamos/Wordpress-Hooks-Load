<?php namespace LucasBRamos\WordpressHooksLoad;

/**
 *
 * Registra todas as actions e filters que os plugins irão carregar
 *
 * @author Lucas Bernieri Ramos
 * @package LucasBRamos\WordpressHooksLoad
 */
class LoadHooks implements ILoadHooks
{
  /**
   *
   * Armazena todas as actions
   *
   * @var array
   */
  protected $actions = [];

  /**
   *
   * Armazena todos os filters
   *
   * @var array
   */
  protected $filters = [];

  /**
   *
   * Adiciona uma nova action a coleção para ser registrada com o WordPress
   *
   * @param $hook
   * @param $component
   * @param $callback
   * @param $priority
   * @param $accepted_args
   * @return mixed
   */
  public function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1)
  {
    $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
  }

  /**
   *
   * Adiciona um novo filtro a coleção para ser registrada pelo WordPress
   *
   * @param $hook
   * @param $component
   * @param $callback
   * @param $priority
   * @param $accepted_args
   * @return mixed
   */
  public function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1)
  {
    $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $accepted_args);
  }

  /**
   *
   * Uma função utilitária que é utilizada para registrar as ações e hooks dentro de
   * uma única coleção
   *
   * @param $hooks
   * @param $hook
   * @param $component
   * @param $callback
   * @param $priority
   * @param $accepted_args
   * @return mixed
   */
  public function add($hooks, $hook, $component, $callback, $priority, $accepted_args)
  {
    $hooks[] = array(
      'hook'          => $hook,
      'component'     => $component,
      'callback'      => $callback,
      'priority'      => $priority,
      'accepted_args' => $accepted_args
    );

    return $hooks;
  }

  /**
   *
   * Registra os filtros e ações com o WordPress
   *
   * @return mixed
   */
  public function run()
  {
    foreach ( $this->filters as $hook )
      add_filter($hook['hook'], array($hook['component'], $hook['callback']), $hook['priority'], $hook['accepted_args']);

    foreach ($this->actions as $hook)
      add_action($hook['hook'], array($hook['component'], $hook['callback']), $hook['priority'], $hook['accepted_args']);
  }
}
