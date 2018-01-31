<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
/**
 * Books Controller
 *
 *
 * @method \App\Model\Entity\Book[] paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
    private $category;
    private $book;
//    public $paginate ;
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->category = TableRegistry::get('Category');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($type = null)
    {
        $memu = $this->category->getMenu();
//        echo "<pre>";
//        var_dump($memu);die;
        $this->set('memu',$memu);
        return $this->render('/Book/home');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function getBookByType($type = null)
    {
        $memu = $this->category->getMenu();
        $books = $this->category->getBookByType($type);
        $this->paginate = [
            'limit' => 5,
        ];
        if (!empty($books)){

        }
        $this->set('books', $this->paginate(null,$books));
        $this->set('type',$type);
        $this->set('memu',$memu);
        return $this->render('/Book/home');
    }
    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($bookName = null)
    {
        $memu = $this->category->getMenu();
        $this->set('memu',$memu);
        $this->book = TableRegistry::get('bookcontents');
        $a = $this->book->getBookContent($bookName);
        var_dump($a);die;

        return $this->render('/Bookcontents/view');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $this->set(compact('book'));
        $this->set('_serialize', ['book']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $this->set(compact('book'));
        $this->set('_serialize', ['book']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
