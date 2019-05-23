<?php

namespace backend\models;

use Yii;
use backend\models\Bangunan;
use backend\models\GambarRuangan;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tbl_ruangan".
 *
 * @property int $id_ruangan
 * @property int $id_bangunan
 * @property string $ruangan
 * @property string $deskripsi
 * @property double $lat
 * @property double $long
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblGambarRuangan[] $tblGambarRuangans
 * @property TblBangunan $bangunan
 */
class Ruangan extends \yii\db\ActiveRecord
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
        return 'tbl_ruangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bangunan', 'ruangan', 'deskripsi', 'lat', 'long'], 'required'],
            [['id_bangunan'], 'integer'],
            [['deskripsi'], 'string'],
            [['lat', 'long'], 'number'],
            [['ruangan'], 'string', 'max' => 250],
            [['id_bangunan'], 'exist', 'skipOnError' => true, 'targetClass' => Bangunan::className(), 'targetAttribute' => ['id_bangunan' => 'id_bangunan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ruangan' => 'Id Ruangan',
            'id_bangunan' => 'Id Bangunan',
            'ruangan' => 'Ruangan',
            'deskripsi' => 'Deskripsi',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGambarRuangan()
    {
        return $this->hasMany(GambarRuangan::className(), ['id_ruangan' => 'id_ruangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBangunan()
    {
        return $this->hasOne(Bangunan::className(), ['id_bangunan' => 'id_bangunan']);
    }
}
