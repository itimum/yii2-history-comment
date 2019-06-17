<?php


namespace itimum\historyComment\models;


use yii\db\ActiveRecord;

class HistoryComment extends ActiveRecord
{
    public static function tableName() {
        return 'model_history_model_comment';
    }
}