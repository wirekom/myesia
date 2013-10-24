<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $image
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property integer $is_banner
 * @property string $created
 * @property string $updated
 * @property integer $author_id
 * @property integer $category_id
 * @property string $slug
 *
 * The followings are the available model relations:
 * @property User $author
 * @property Category $category
 */
class News extends CActiveRecord {

    public $file;

    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_ARCHIVED = 3;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, content, author_id, category_id', 'required'),
            array('status, is_banner, author_id, category_id', 'numerical', 'integerOnly' => true),
            array('image', 'length', 'max' => 150),
            array('title', 'length', 'max' => 225),
            array('slug', 'length', 'max' => 255),
            array('file', 'file', 'types' => 'png, jpg, jpeg', 'allowEmpty' => true),
            array('file', 'required', 'on' => 'insert'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, image, title, content, status, is_banner, created, updated, author_id, category_id, slug', 'safe', 'on' => 'search'),
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
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'image' => 'Image',
            'title' => 'Title',
            'content' => 'Content',
            'status' => 'Status',
            'is_banner' => 'Is Banner',
            'created' => 'Created',
            'updated' => 'Updated',
            'author_id' => 'Author',
            'category_id' => 'Category',
            'slug' => 'Slug',
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
        $criteria->compare('image', $this->image, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('is_banner', $this->is_banner);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('author_id', $this->author_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('slug', $this->slug, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getCategoryOptions() {
        return CHtml::listData(Category::model()->findAll(), 'id', 'name');
    }

    public function getStatusOptions() {
        return array(
            self::STATUS_DRAFT => 'DRAFT',
            self::STATUS_PUBLISHED => 'PUBLISHED',
            self::STATUS_ARCHIVED => 'ARCHIVED',
        );
    }

    public function getStatusText($status = null) {
        $value = ($status === null) ? $this->status : $status;
        $statusOptions = $this->getStatusOptions();
        return isset($statusOptions[$value]) ?
                $statusOptions[$value] : "unknown status ({$value})";
    }

    public function getStatusValue($status = null) {
        $statusOptions = $this->getStatusOptions();
        return array_search($status, $statusOptions);
    }

    /**
     * @return string the URL that shows the detail of the post
     */
    public function getUrl() {
        return Yii::app()->createUrl('news/view', array(
                    'slug' => $this->slug,
        ));
    }

    public function getImageHtml() {
        return CHtml::image(Yii::app()->baseUrl . Yii::app()->params['uploads'] . $this->image, $this->title, array('width' => '150px', 'height' => '150px'));
    }

    public function behaviors() {
        return array(
            'sluggable' => array(
                'class' => 'ext.behaviors.SluggableBehavior.SluggableBehavior',
                'columns' => array('title'),
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
