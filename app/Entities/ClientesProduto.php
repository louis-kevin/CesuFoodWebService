<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 26 May 2018 00:17:17 -0300.
 */

namespace App\Entities;

use App\Entities\Entity as Eloquent;
use App\Traits\StatusScope;

/**
 * Class ClientesProduto
 *
 * @property int $id
 * @property int $status
 * @property int $cliente_id
 * @property int $produto_id
 * @property int $pedido_id
 * @property int $administrador_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property Administrador $administrador
 * @property Cliente $cliente
 * @property Pedido $pedido
 * @property Produto $produto
 * @package App\Entities
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto ativos()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto inativos()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto whereAdministradorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto wherePedidoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\ClientesProduto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientesProduto extends Eloquent
{
    use StatusScope;
	public static $snakeAttributes = false;

	protected $casts = [
		'status' => 'int',
		'cliente_id' => 'int',
		'produto_id' => 'int',
		'pedido_id' => 'int',
		'administrador_id' => 'int'
	];

	protected $fillable = [
		'status',
		'cliente_id',
		'produto_id',
		'pedido_id',
		'administrador_id'
	];

	public function administrador()
	{
		return $this->belongsTo(Administrador::class, 'administrador_id');
	}

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class);
	}

	public function produto()
	{
		return $this->belongsTo(Produto::class);
	}
}