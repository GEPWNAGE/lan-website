<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @property Page $Page
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
			return;
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		if($page == "home"){
			$language = $this->request->param("language") ?: "nl";
			$page = $this->Page->find( "first", array( "conditions" => array( "Page.homepage" => 1 , "Page.language" => $language) ) );
		} else {
			$page = $this->Page->find( "first", array( "conditions" => array( "Page.slug" => $path[0] ) ) );
		}
        if($page){
            $title_for_layout = $page['Page']['title'];
			$this->request->params['language'] = $page['Page']['language'];
            $this->set(compact('page', 'title_for_layout'));
        } else {
            try{
                $this->render(implode('/', $path));
            } catch (MissingViewException $e){
                if(Configure::read('debug')){
                    throw $e;
                }
                throw new NotFoundException();
            }
        }
	}

	public function beforeFilter(){
		$title_for_layout = "Pages";
		$icon_for_layout = "file-o";
		$this->set(compact(array("title_for_layout", "icon_for_layout")));
		parent::beforeFilter();
	}

	public function admin_index(){
		$pages = $this->Page->find('all', array("orderby" => array("Page.title")));
		$this->set(compact(array("pages")));
	}
	public function admin_add(){
        if($this->request->is('post')){
            if($this->Page->save($this->request->data)){
				$this->Page->saveReverseTranslation($this->request->data);
                $this->redirect(array("controller" => "pages", "action" => "index", "admin" => true));
                return;
            }
        }
		$originals = $this->Page->getOriginals();
		$this->set(compact(array("originals")));
	}
	public function admin_edit($id){
		if($this->request->is('put')){
			if($this->Page->save($this->request->data)){
				$this->Page->saveReverseTranslation($this->request->data);
                $this->redirect(array("controller" => "pages", "action" => "index", "admin" => true));
                return;
            }
        } else {
            $page = $this->Page->find('first', array("conditions" => array("Page.id" => $id)));
            $this->request->data = $page;
        }

		$originals = $this->Page->getOriginals($id);
		$this->set(compact(array("page", "originals")));
	}
}
