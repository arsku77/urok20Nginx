<?php

namespace frontend\models;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthdate
 * @property integer $rating
 */
class Author extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{author}}';
    }

    /**
     * @return string
     * full name from last and first names
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    /**
     * @return ActiveQuery
     */
    public function getAuthorToBookRelations()
    {
        return $this->hasMany(BookToAuthor::className(), ['author_id' => 'id']);
    }

    /**
     * @return Author[]
     */
    public function getBooks()
    {//get all books with where one author id from table book_to_author
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->via('AuthorToBookRelations')->all();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthdate' => 'Birthdate',
            'rating' => 'Rating',
        ];
    }



}
