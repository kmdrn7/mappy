<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tbl_bangunan".
 *
 * @property int $id_bangunan
 * @property string $bangunan
 * @property string $deskripsi
 * @property string $gambar
 * @property double $lat
 * @property double $long
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TblRuangan[] $tblRuangans
 */
class Bangunan extends \yii\db\ActiveRecord
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
        return 'tbl_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bangunan', 'deskripsi', 'gambar', 'lat', 'long'], 'required'],
            [['deskripsi'], 'string'],
            [['lat', 'long'], 'number'],
            [['bangunan'], 'string', 'max' => 250],
            [['gambar'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bangunan' => 'Id Bangunan',
            'bangunan' => 'Bangunan',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'Gambar',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuangan()
    {
        return $this->hasMany(Ruangan::className(), ['id_bangunan' => 'id_bangunan']);
    }
}
