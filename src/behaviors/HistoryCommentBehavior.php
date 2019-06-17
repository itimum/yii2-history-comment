<?php

namespace itimum\historyComment\behaviors;

use itimum\historyComment\models\HistoryComment;
use itimum\modelHistory\behaviors\ModelHistoryBehavior;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class HistoryCommentBehavior
 *
 * @package itimum\historyComment\behaviors
 *
 * @property ActiveRecord $owner
 */
class HistoryCommentBehavior extends Behavior
{
    protected $_historyCommentClass = HistoryComment::class;

    /**
     * TODO
     *
     * @param \yii\base\Component $owner
     */
    public function attach($owner) {

        parent::attach($owner);

        $this->owner->on(ModelHistoryBehavior::EVENT_AFTER_HISTORY_RECORD, [$this, 'afterHistoryRecord']);

    }

    /**
     * TODO
     * 
     * @param $event
     */
    public function afterHistoryRecord($event) {
        if ($this->owner->getBehavior('modelComment')) {
            foreach ($this->owner->getCommentItems() as $comment) {
                $model = new $this->_historyCommentClass;
                $model->model_history_id = $event->historyModel->id;
                $model->model_comment_id = $comment->id;
                $model->save();
            }
        }
    }
}