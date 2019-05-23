<?php

namespace backend\models;

use Yii;
use backend\models\Ruangan;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tbl_gambar_ruangan".
 *
 * @property int $id_gambar_ruangan
 * @property int $id_ruangan
 * @property string $gambar
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblRuangan $ruangan
 */
class GambarRuangan extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_gambar_ruangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ruangan', 'gambar'], 'required'],
            [['id_ruangan'], 'integer'],
            [['gambar'], 'string', 'max' => 200],
            [['id_ruangan'], 'exist', 'skipOnError' => true, 'targetClass' => Ruangan::className(), 'targetAttribute' => ['id_ruangan' => 'id_ruangan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gambar_ruangan' => 'Id Gambar Ruangan',
            'id_ruangan' => 'Id Ruangan',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuangan()
    {
        return $this->hasOne(Ruangan::className(), ['id_ruangan' => 'id_ruangan']);
    }
}
