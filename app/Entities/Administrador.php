<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 26 May 2018 00:17:16 -0300.
 */

namespace App\Entities;

use App\Entities\Entity as Eloquent;

/**
 * Class Administrador
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property int $cargo
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $clientesProdutos
 *
 * @package App\Entities
 */
class Administrador extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public static $snakeAttributes = false;

	protected $casts = [
		'cargo' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'senha'
	];

	protected $fillable = [
		'nome',
		'email',
		'senha',
		'cargo',
		'status'
	];

	public function clientesProdutos()
	{
		return $this->hasMany(\App\Entities\ClientesProduto::class, 'administrador_id');
	}
}
