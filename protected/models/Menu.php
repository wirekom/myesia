<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $description
 * @property integer $published
 * @property integer $priority
 * @property string $created
 * @property string $updated
 * @property integer $parent_id
 *
 * The followings are the available model relations:
 * @property Menu $parent
 * @property Menu[] $menus
 */
class Menu extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, url', 'required'),
            array('published, priority, parent_id', 'numerical', 'integerOnly' => true),
            array('title, url', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, url, description, published, priority, created, updated, parent_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parent' => array(self::BELONGS_TO, 'Menu', 'parent_id'),
            'menus' => array(self::HAS_MANY, 'Menu', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'description' => 'Description',
            'published' => 'Published',
            'priority' => 'Priority',
            'created' => 'Created',
            'updated' => 'Updated',
            'parent_id' => 'Parent',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('priority', $this->priority);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('parent_id', $this->parent_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPriorityOptions() {
        $data = array();
        $range = range(50, -50);
        foreach ($range as $val) {
            $data[$val] = "$val";
        }
        return $data;
    }

    public function getMenuOptions($parent = NULL, $level = 0) {
        $criteria = new CDbCriteria;
        $criteria->condition = ($parent == NULL) ? 'parent_id is null' : 'parent_id=:pid';
        $criteria->params = array(':pid' => $parent);
        $model = $this->findAll($criteria);
        $result = array();
        foreach ($model as $key) {
            $result[$key->id] = str_repeat(' — ', $level) . $key->title;
            $result += $this->getMenuOptions($key->id, $level + 1);
        }
        return $result;
    }

    public function behaviors() {
        return array(
            'timestamps' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'updated',
                'setUpdateOnCreate' => true,
            ),
        );
    }

}
