<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $comment
 * @property string $created
 * @property string $updated
 * @property integer $author
 * @property integer $news_id
 * @property integer $parent_id
 *
 * The followings are the available model relations:
 * @property Comment $parent
 * @property Comment[] $comments
 * @property News $news
 */
class Comment extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'comment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('comment, news_id, author', 'required'),
            array('news_id', 'numerical', 'integerOnly' => true),
            array('author', 'length', 'max' => 225),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, comment, created, updated, news_id, author', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parent' => array(self::BELONGS_TO, 'Comment', 'parent_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'parent_id'),
            'news' => array(self::BELONGS_TO, 'News', 'news_id'),
            'likeCount' => array(self::STAT, 'CommentLike', 'comment_id'),
            'replyCount' => array(self::STAT, 'Comment', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'comment' => 'Comment',
            'created' => 'Created',
            'updated' => 'Updated',
            'author' => 'Author',
            'news_id' => 'News',
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
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('news_id', $this->news_id);
        $criteria->compare('parent_id', $this->parent_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getUrl($news = null) {
        if ($news === null)
            $news = $this->news;
        return $news->url . '#c' . $this->id;
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

    public function getIsLike() {
        $rest = CommentLike::model()->findByPk(array(
            'comment_id' => $this->id,
            'author' => Yii::app()->user->username
        ));

        return ($rest === NULL) ? FALSE : TRUE;
    }

}
