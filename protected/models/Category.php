<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property News[] $news
 */
class Category extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'news' => array(self::HAS_MANY, 'News', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created' => 'Created',
            'updated' => 'Updated',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the URL that shows the detail of the news
     */
    public function getUrl() {
        return Yii::app()->createUrl('category/view', array(
                    'slug' => $this->slug,
        ));
    }

    public function getLastImageNews() {
        $news = News::model()->find(array(
            'condition' => 'status=:status AND category_id=:id AND file_type=:file_type',
            'order' => 'updated',
            'params' => array(
                ':id' => $this->id,
                ':file_type' => News::TYPE_PICTURE,
                ':status' => News::STATUS_PUBLISHED
            )
        ));

        if ($news === NULL)
            return CHtml::image(Yii::app()->baseUrl . '/images/no_photo.jpg', 'No Image');
        else
            return CHtml::image(Yii::app()->baseUrl . Yii::app()->params['uploads_pictures'] . $news->image, $news->title);
    }

    public function getLatestNews() {
        return News::model()->find(array(
                    'condition' => 'status=:status AND category_id=:id AND file_type=:file_type',
                    'order' => 'updated DESC',
                    'params' => array(
                        ':id' => $this->id,
                        ':file_type' => News::TYPE_PICTURE,
                        ':status' => News::STATUS_PUBLISHED
                    )
        ));
    }

    public function behaviors() {
        return array(
            'sluggable' => array(
                'class' => 'ext.behaviors.SluggableBehavior.SluggableBehavior',
                'columns' => array('name'),
                'unique' => true,
                'update' => true,
            ),
            'timestamps' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'updated',
                'setUpdateOnCreate' => true,
            ),
        );
    }

}
