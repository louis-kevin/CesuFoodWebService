<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 26 May 2018 00:17:17 -0300.
 */

namespace App\Entities;

use App\Entities\Entity as Eloquent;
use App\Traits\StatusScope;

/**
 * Class Pedido
 *
 * @property int $id
 * @property int $status
 * @property float $valor_total
 * @property string $pagamento_id
 * @property int $cartao_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property Cartao $cartao
 * @property \Illuminate\Database\Eloquent\Collection $clientesProdutos
 * @package App\Entities
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido ativos()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido inativos()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido whereCartaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido wherePagamentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Pedido whereValorTotal($value)
 * @mixin \Eloquent
 */
class Pedido extends Eloquent
{
    use StatusScope;
	public static $snakeAttributes = false;

	protected $casts = [
		'status' => 'int',
		'valor_total' => 'float',
		'cartao_id' => 'int'
	];

	protected $fillable = [
		'status',
		'valor_total',
		'pagamento_id',
		'cartao_id'
	];

	public function cartao()
	{
		return $this->belongsTo(Cartao::class, 'cartao_id');
	}

	public function clientesProdutos()
	{
		return $this->hasMany(ClientesProduto::class);
	}
}