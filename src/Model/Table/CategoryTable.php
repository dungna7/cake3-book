<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Category Model
 *
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryTable extends Table
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

        $this->setTable('category');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('level')
            ->requirePresence('level', 'create')
            ->notEmpty('level');

        $validator
            ->integer('parentId')
            ->requirePresence('parentId', 'create')
            ->notEmpty('parentId');

        return $validator;
    }

    /**
     * get bigCategory method
     *
     * @param array $config The configuration for the Table.
     * @return array
     */
    public function getBigCategory()
    {
        $returnResult = array();
        $result =  $this->find()
            ->where(['level ='=> 0])->toArray();
        foreach ($result as $key => $val){
            $returnResult[$key]['id'] = $val['id'];
            $returnResult[$key]['name'] = $val['name'];
            $returnResult[$key]['level'] = $val['level'];
            $returnResult[$key]['parentId'] = $val['parentId'];
            $returnResult[$key]['alias'] = $val['alias'];
        }
        return $returnResult;
    }
    /**
     * get bigCategory method
     *
     * @param array $config The configuration for the Table.
     * @return array
     */
    public function getMediumCategory()
    {
        $returnResult = array();
        $result =  $this->find()
            ->where(['level ='=> 1])->toArray();
        foreach ($result as $key => $val){
            $returnResult[$key]['id'] = $val['id'];
            $returnResult[$key]['name'] = $val['name'];
            $returnResult[$key]['level'] = $val['level'];
            $returnResult[$key]['parentId'] = $val['parentId'];
            $returnResult[$key]['alias'] = $val['alias'];
        }
        return $returnResult;
    }

    /**
     * get menu method
     * input category
     * return array menu phan cap
     */
    public function getMenu(){
        $bigCategory = $this->getBigCategory();
        $medCategory = $this->getMediumCategory();
        foreach($bigCategory as $bigKey => $value){
            foreach($medCategory as $medKey => $val){
                if($val['parentId'] == $value['id']){
                    $bigCategory[$bigKey]['subCategory'][] = $val;
                }
            }
        }
        return $bigCategory;
    }
    /**
     * check BookType method
     * input BookType
     * return array
     */
    public function checkBookType($type = null){
        $result =  $this->find()
            ->where(['alias'=> $type]) ->first();;
        return $result;
    }

    /**
     * get Book By Type method
     * input BookType
     * return array
     */
    public function getBookByType($type = null){
        $typeBook   = $this->checkBookType($type);
        $books = TableRegistry::get('books');
        $result = array();
        if (!empty($typeBook)){
            $result =  $books->getBookByType($typeBook['id']);
        }
        return $result;
    }
}
