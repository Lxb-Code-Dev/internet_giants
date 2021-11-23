<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IgUserUser]].
 *
 * @see IgUserUser
 */
class IgUserUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IgUserUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IgUserUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
