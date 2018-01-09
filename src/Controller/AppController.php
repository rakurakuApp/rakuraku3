<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {

        //未承認のログイン画面へのリダイレクト処理
//        parent::initialize();
//        /*controllerがlogin
//        またはactionがforgetなら
//        loginにredirectしない*/
//        if ($this->name === "Login" or $this->request->param('action') === "forget") {
//
//        }else{
//        $session = $this->request->session();
//        // セッション情報取得
//        if (!empty($session->read('username'))) {
//            if ($session->read('role') == 'patron') {
//                $this->redirect(['controller' => '????', 'action' => '????', 'id' => $session->read('id')]);
//            } else {
//                $this->set("id", $session->read('id'));
//                $this->set("username", $session->read('username'));
//            }
//        } else {
//            $this->redirect(['controller' => 'Login', 'action' => 'login']);
//        }
//    }
    }



    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(Event $event) {

    }



    public function beforeRender(Event $event)
    {
        $this->loadComponent('Flash');
        $this->loadComponent('TOOL');
        $this->set('sessionData',$this->TOOL->loadSessinUser());

//        empty($this->protectAuthRedirect) && $this->Auth->redirectUrl();
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

    }
}
