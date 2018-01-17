<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookcontents Controller
 *
 *
 * @method \App\Model\Entity\Bookcontent[] paginate($object = null, array $settings = [])
 */
class BookcontentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $bookcontents = $this->paginate($this->Bookcontents);

        $this->set(compact('bookcontents'));
        $this->set('_serialize', ['bookcontents']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookcontent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookcontent = $this->Bookcontents->get($id, [
            'contain' => []
        ]);

        $this->set('bookcontent', $bookcontent);
        $this->set('_serialize', ['bookcontent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookcontent = $this->Bookcontents->newEntity();
        if ($this->request->is('post')) {
            $bookcontent = $this->Bookcontents->patchEntity($bookcontent, $this->request->getData());
            if ($this->Bookcontents->save($bookcontent)) {
                $this->Flash->success(__('The bookcontent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookcontent could not be saved. Please, try again.'));
        }
        $this->set(compact('bookcontent'));
        $this->set('_serialize', ['bookcontent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookcontent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookcontent = $this->Bookcontents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookcontent = $this->Bookcontents->patchEntity($bookcontent, $this->request->getData());
            if ($this->Bookcontents->save($bookcontent)) {
                $this->Flash->success(__('The bookcontent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookcontent could not be saved. Please, try again.'));
        }
        $this->set(compact('bookcontent'));
        $this->set('_serialize', ['bookcontent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookcontent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookcontent = $this->Bookcontents->get($id);
        if ($this->Bookcontents->delete($bookcontent)) {
            $this->Flash->success(__('The bookcontent has been deleted.'));
        } else {
            $this->Flash->error(__('The bookcontent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
