<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $accessToken
 * @property string|null $authKey
 * @property int $perfil_id
 * @property int $huellas_idRegis
 *
 * @property Entradas[] $entradas
 * @property Huellas $huellasIdRegis
 * @property Perfil $perfil
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'perfil_id', 'huellas_idRegis'], 'required'],
            [['perfil_id', 'huellas_idRegis'], 'integer'],
            [['username', 'password', 'accessToken', 'authKey'], 'string', 'max' => 45],
            [['huellas_idRegis'], 'exist', 'skipOnError' => true, 'targetClass' => Huellas::class, 'targetAttribute' => ['huellas_idRegis' => 'idRegis']],
            [['perfil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['perfil_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'accessToken' => 'Access Token',
            'authKey' => 'Auth Key',
            'perfil_id' => 'Perfil',
            'huellas_idRegis' => 'Huella',
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::class, ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[HuellasIdRegis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHuellasIdRegis()
    {
        return $this->hasOne(Huellas::class, ['idRegis' => 'huellas_idRegis']);
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::class, ['id' => 'perfil_id']);
    }
}
