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
 * @property string $slug
 * @property integer $menu_link
 * @property integer $file_type
 * @property string $updated
 * @property string $created
 * @property integer $author
 * @property integer $category_id
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property User $author
 * @property Category $category
 */
class News extends CActiveRecord {

    public $file;

    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_ARCHIVED = 3;
    const TYPE_PICTURE = 1;
    const TYPE_VIDEO = 2;
    const TYPE_DOCUMENT = 3;
    const TYPE_PICTURES = 4;

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
            array('title, content, category_id, menu_link', 'required'),
            array('status, file_type, is_banner, category_id', 'numerical', 'integerOnly' => true),
            array('image', 'length', 'max' => 150),
            array('title', 'length', 'max' => 225),
            array('author', 'length', 'max' => 225),
            array('slug', 'length', 'max' => 255),
            array('file', 'file', 'types' => 'png, jpg, jpeg, mp4, pdf', 'allowEmpty' => true),
            array('file', 'required', 'on' => 'insert'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, image, title, content, status, file_type, is_banner, created, updated, author, category_id, menu_link, slug', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comments' => array(self::HAS_MANY, 'Comment', 'news_id'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'commentCount' => array(self::STAT, 'Comment', 'news_id'),
            'likeCount' => array(self::STAT, 'NewsLike', 'news_id'),
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
            'is_banner' => 'Banner',
            'slug' => 'Slug',
            'menu_link' => 'Menu Link',
            'file_type' => 'File Type',
            'updated' => 'Updated',
            'created' => 'Created',
            'author' => 'Author',
            'category_id' => 'Category',
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
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('menu_link', $this->menu_link);
        $criteria->compare('file_type', $this->file_type);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('category_id', $this->category_id);

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

    public function getBannerOptions() {
        return array(
            TRUE => 'YES',
            FALSE => 'NO',
        );
    }

    public function getBannerText($banner = null) {
        $value = ($banner === null) ? $this->is_banner : $banner;
        $bannerOptions = $this->getBannerOptions();
        return isset($bannerOptions[$value]) ?
                $bannerOptions[$value] : "unknown banner ({$value})";
    }
    
    public function getStatusValue($status = null) {
        $statusOptions = $this->getStatusOptions();
        return array_search($status, $statusOptions);
    }

    public function getTypeOptions() {
        return array(
            self::TYPE_PICTURE => 'PICTURE',
            self::TYPE_VIDEO => 'VIDEO',
            self::TYPE_DOCUMENT => 'DOCUMENT',
            self::TYPE_PICTURES => 'PICTURES',
        );
    }

    public function getTypeText($type = null) {
        $value = ($type === null) ? $this->type : $type;
        $typeOptions = $this->getStatusOptions();
        return isset($typeOptions[$value]) ?
                $typeOptions[$value] : "unknown type ({$value})";
    }

    public function getTypeValue($type = null) {
        $typeOptions = $this->getStatusOptions();
        return array_search($type, $typeOptions);
    }

    public function getImageThumb() {
        if ($this->file_type == self::TYPE_PICTURE)
            return CHtml::image(Yii::app()->baseUrl . Yii::app()->params['uploads_pictures'] . $this->image, $this->title, array('width' => '150px', 'height' => '150px'));
        else if ($this->file_type == self::TYPE_DOCUMENT)
            return CHtml::image(Yii::app()->baseUrl . '/images/pdf-tmb.jpg', $this->title, array('width' => '150px', 'height' => '150px'));
        else if ($this->file_type == self::TYPE_VIDEO)
            return CHtml::image(Yii::app()->baseUrl . '/images/video-tmb.jpg', $this->title, array('width' => '150px', 'height' => '150px'));
    }

    /**
     * @return string the URL that shows the detail of the news
     */
    public function getUrl() {
        return Yii::app()->createUrl('news/view', array(
                    'slug' => $this->slug,
        ));
    }

    public function getImageHtml() {
        return CHtml::image(Yii::app()->baseUrl . Yii::app()->params['uploads_pictures'] . $this->image, $this->title, array('width' => '150px', 'height' => '150px'));
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

    public function addComment($comment) {
        $comment->news_id = $this->id;
        $comment->author = Yii::app()->user->username;
        return $comment->save();
    }

    public static function getBanner() {
        return News::model()->findAll(array(
                    'condition' => 'is_banner=:is_banner AND status=:status AND file_type=:file_type',
                    'order' => 'updated DESC',
                    'limit' => 5,
                    'params' => array(
                        ':is_banner' => 1,
                        ':file_type' => News::TYPE_PICTURE,
                        ':status' => News::STATUS_PUBLISHED
                    )
        ));
    }

    public static function getLastTwoNews() {
        return News::model()->findAll(array(
                    'condition' => 'status=:status AND file_type=:file_type',
                    'order' => 'updated DESC',
                    'limit' => 2,
                    'params' => array(
                        ':file_type' => News::TYPE_PICTURE,
                        ':status' => News::STATUS_PUBLISHED
                    )
        ));
    }

    public function getIsLike() {
        $rest = NewsLike::model()->findByPk(array(
            'news_id' => $this->id,
            'author' => Yii::app()->user->username
        ));

        return ($rest === NULL) ? FALSE : TRUE;
    }

}
