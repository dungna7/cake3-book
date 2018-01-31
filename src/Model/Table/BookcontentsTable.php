<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookcontents Model
 *
 * @method \App\Model\Entity\Bookcontent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bookcontent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bookcontent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bookcontent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookcontent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bookcontent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bookcontent findOrCreate($search, callable $callback = null, $options = [])
 */
class BookcontentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('bookcontents');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('content')
            ->maxLength('content', 4294967295)
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->scalar('logo')
            ->maxLength('logo', 100)
            ->requirePresence('logo', 'create')
            ->notEmpty('logo');

        return $validator;
    }

    /**
     * get Book content method
     * input BookType
     * return object
     */
    public function getBookContent($bookName = null)
    {
        $result = $this->find()
            ->where(['bookName' => $bookName])->toArray();
        return $result;
    }

}
