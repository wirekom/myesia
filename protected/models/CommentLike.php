<?php

/**
 * This is the model class for table "comment_like".
 *
 * The followings are the available columns in table 'comment_like':
 * @property integer $comment_id
 * @property string $author
 *
 * The followings are the available model relations:
 * @property Comment $comment
 */
class CommentLike extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function primaryKey() {
        return array('comment_id', 'author');
    }

    public function tableName() {
        return 'comment_like';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('comment_id, author', 'required'),
            array('comment_id', 'numerical', 'integerOnly' => true),
            array('author', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('comment_id, author', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comment' => array(self::BELONGS_TO, 'Comment', 'comment_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'comment_id' => 'Comment',
            'author' => 'Author',
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

        $criteria->compare('comment_id', $this->comment_id);
        $criteria->compare('author', $this->author, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CommentLike the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
