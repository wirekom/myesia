<?php

/**
 * This is the model class for table "shoutbox".
 *
 * The followings are the available columns in table 'shoutbox':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $type
 * @property string $created
 * @property string $updated
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property User $author
 */
class Shoutbox extends CActiveRecord {

    const TYPE_GOOD = 1;
    const TYPE_BAD = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'shoutbox';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, content, author_id', 'required'),
            array('type, author_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 100),
            array('content', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, content, type, created, updated, author_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'type' => 'Type',
            'created' => 'Created',
            'updated' => 'Updated',
            'author_id' => 'Author',
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
        $criteria->compare('title',$this->title,true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('author_id', $this->author_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Shoutbox the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getTypeOptions() {
        return array(
            self::TYPE_BAD => 'BAD NEWS',
            self::TYPE_GOOD => 'GOOD NEWS',
        );
    }

    public function getTypeText($type = null) {
        $value = ($type === null) ? $this->type : $type;
        $typeOptions = $this->getTypeOptions();
        return isset($typeOptions[$value]) ?
                $typeOptions[$value] : "unknown type ({$value})";
    }

    public function getTypeValue($type = null) {
        $typeOptions = $this->getTypeOptions();
        return array_search($type, $typeOptions);
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
